<?php

namespace App\Http\Controllers\Panel;

use App\Actor;
use App\Category;
use App\Director;
use App\Episode;
use App\Http\Controllers\Controller;
use App\Image;
use App\Language;
use App\Post;
use App\Quality;
use App\Video;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class UploadController extends Controller
{

    function list(Request $request) {

        $movies = Post::where('type', 'movies')->latest()->get();
        $series = Post::where('type', 'series')->latest()->get();

        return view('Panel.Files.List', compact(['movies', 'series']));
    }
    public function Add()
    {
        $actors = Actor::all();
        $writers = Writer::all();
        $directors = Director::all();
        $languages = Language::all();

        return view('Panel.Files.Upload', compact(['writers', 'directors', 'actors', 'languages']));
    }
    public function SavePost(Request $request)
    {
        if(!$request->has('category')) return back()->withErrors(['category', 'لطفا یک دسته بندی انتخاب کنید']);
        if(!$request->has('language')) return back()->withErrors(['language', 'لطفا زبان فیلم را وارد نمایید']);

        $destinationPath = "files/posts/$request->title";
        if ($request->hasFile('poster')) {
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move($destinationPath, $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = '';
        }
        $post = new Post;
        $post->name = $request->title;
        $post->type = $request->type;
        $post->description = $request->desc;
        $post->short_description = $request->short_desc;
        $post->poster = $Poster;
        $post->product_year = $request->year;
        $post->age_rate = $request->age_rate;
        $post->awards = $request->awards;
        if ($post->save()) {

            foreach ($request->category as $key => $category) {
                if ($id = Category::check($category)) {
                    $post->categories()->attach($id);
                } else {
                    $post->categories()->create(['name' => $category]);
                }
            }
            foreach ($request->actors as $key => $actor) {
                $post->actors()->attach($actor);
            }
            foreach ($request->writers as $key => $writer) {
                $post->writers()->attach($writer);
            }
            foreach ($request->directors as $key => $director) {
                $post->directors()->attach($director);
            }

            if ($id = Language::check($request->language)) {
                $post->languages()->attach($id);
            } else {
                $post->languages()->create(['name' => $request->language]);
            }

            // if ($request->type == 'series') {
            //     $season = $post->seasons()->create(['number' => $request->season]);
            //     $season->sections()->create(['number' => $request->section]);
            // }
            if ($request->awards) {
                foreach ($request->awards as $key => $award) {
                    $post->awards()->create(['title' => $award]);
                }
            }

            if ($request->hasFile('trailer')) {
                $picextension = $request->file('trailer')->getClientOriginalExtension();
                $fileName = 'trailer_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                $request->file('trailer')->move($destinationPath, $fileName);
                $trailer = "$destinationPath/$fileName";

                $post->trailer()->create(['name' => $post->name, 'poster' => $post->poster, 'url' => $trailer]);
            }
            if ($request->hasFile('images')) {
                foreach ($request->images as $key => $image) {
                    $picextension = $image->getClientOriginalExtension();
                    $fileName = 'image_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                    $image->move($destinationPath, $fileName);
                    $imageUrl = "$destinationPath/$fileName";
                    $post->images()->create([
                        'url' => $imageUrl,
                    ]);
                }
            }

        } else {
            return back();
        }
        if ($post->type == "series") {
            return Redirect::route('Panel.UploadEpisode', ['id' => $post->id]);
        }
        return Redirect::route('Panel.UploadVideo', ['id' => $post->id]);

    }

    public function Edit(Post $post)
    {
        $actors = Actor::all();
        $writers = Writer::all();
        $directors = Director::all();

        return view('Panel.Files.Upload', compact(['post', 'writers', 'directors', 'actors']));
    }

    public function UploadVideo(Request $request)
    {

        $id = request()->id;

        if ($id) {
            $post = Post::find($id);
            if (isset(request()->episode)) {
                $episode = Episode::find(request()->episode);
                $videos = $episode->videos;
            } else {
                $videos = $post->videos;
            }
            $episode_id = request()->episode;

        } else {
            $videos = [];
            $post = null;
            $episode_id = null;
        }
        return view('Panel.Files.UploadVideo', compact(['id', 'videos', 'post', 'episode_id']));
    }

    public function SaveVideo(Request $request)
    {
        if (!$request->has('post') && $request->post == '') {

            return response()->json('پست مورد نظر یافت نشد', 404);
        }

        if (request()->hasFile('file')) {
            $destinationPath = 'files/videos';
            $picextension = request()->file('file')->getClientOriginalExtension();
            $fileName = 'video' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            request()->file('file')->move($destinationPath, $fileName);
            $url = "$destinationPath/$fileName";
        } else {
            return response()->json('فایلی یافت نشد', 404);
        }

        if ($id = Quality::check($request->quality)) {
            $quality_id = $id;
        } else {
            $new_quality_obj = Quality::create(['quality' => $request->quality]);
            $quality_id = $new_quality_obj->id;
        }

        $post = Post::find($request->post);

        if (isset($request->episode)) {
            $episode = Episode::find($request->episode);
            $episode->videos()->create([
                'url' => $url,
                'quality' => $quality_id,
                'description' => null,
            ]);
        } else {
            $post->videos()->create([
                'url' => $url,
                'quality' => $quality_id,
                'description' => null,
            ]);
        }

        return response()->json('ویدئو با موفقیت آپلود شد', 200);
    }

    public function AddEpisode()
    {
        $id = request()->id;
        if ($id) {
            $post = Post::find($id);
            $episodes = $post->episodes;
        } else {
            $episodes = [];
            $post = null;
        }
        return view('Panel.Files.AddEpisode', compact(['id', 'episodes', 'post']));
    }

    public function SaveEpisode(Request $request)
    {

        $post = Post::find($request->post);
        if (request()->hasFile('thumb')) {
            $destinationPath = 'files/series/thumbs';
            $picextension = request()->file('thumb')->getClientOriginalExtension();
            $fileName = $post->name . '-' . $request->season . '-' . $request->section . date("Y-m-d") . '_' . time() . '.' . $picextension;
            request()->file('thumb')->move($destinationPath, $fileName);
            $thumb = "$destinationPath/$fileName";
        } else {
            $thumb = '';
        }

        $episode = $post->episodes()->create(['name' => $request->name,
            'duration' => '00',
            'description' => $request->description,
            'poster' => $thumb,
            'season' => $request->season,
            'section' => $request->section,
        ]);

        return Redirect::route('Panel.UploadVideo', ['id' => $post->id, 'episode' => $episode->id]);
    }

    public function EditPost(Request $request)
    {

        $post = Post::find($request->post_id);

        $destinationPath = "files/posts/$request->title";
        if ($request->hasFile('poster')) {
            File::delete(public_path() . $post->poster);
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move($destinationPath, $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = $post->poster;
        }

        $post->name = $request->title;
        $post->type = $request->type;
        $post->description = $request->desc;
        $post->short_description = $request->short_desc;
        $post->poster = $Poster;
        $post->age_rate = $request->age_rate;
        $post->awards = $request->awards;
        $post->save();

        foreach ($request->category as $key => $category) {
            if ($post->categories()->pluck('name')->contains($category)) {
                continue;
            }

            if ($id = Category::check($category)) {
                $post->categories()->attach($id);
            } else {
                $post->categories()->create(['name' => $category]);
            }
        }

        foreach ($request->actors as $key => $actor) {
            if ($post->actors()->pluck('name')->contains($actor)) {
                continue;
            }
            $post->actors()->attach($actor);
        }

        foreach ($request->writers as $key => $writer) {
            if ($post->writers()->pluck('name')->contains($writer)) {
                continue;
            }
            $post->writers()->attach($writer);
        }
        foreach ($request->directors as $key => $director) {
            if ($post->directors()->pluck('name')->contains($director)) {
                continue;
            }
            $post->directors()->attach($director);
        }

        $post->languages()->detach();
        if ($id = Language::check($request->language)) {

            $post->languages()->attach($id);
        } else {
            $post->languages()->create(['name' => $request->language]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $image) {
                $picextension = $image->getClientOriginalExtension();
                $fileName = 'image_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                $image->move($destinationPath, $fileName);
                $imageUrl = "$destinationPath/$fileName";
                $post->images()->create([
                    'url' => $imageUrl,
                ]);
            }
        }

        if ($request->hasFile('trailer')) {

            if ($post->trailer) {
                File::delete(public_path() . $post->trailer->url);
                $post->trailer()->delete();
            }

            $picextension = $request->file('trailer')->getClientOriginalExtension();
            $fileName = 'trailer_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('trailer')->move($destinationPath, $fileName);
            $trailer = "$destinationPath/$fileName";

            $post->trailer()->create(['name' => $post->name, 'poster' => $post->poster, 'url' => $trailer]);
        }

        return Redirect::route('Panel.FileList');

    }

    public function DeletePost(Request $request)
    {

        foreach ($request->array as $key => $id) {
            $post = Post::find($id);
            File::delete(public_path() . $post->poster);
            if ($post->trailer) {
                File::delete(public_path() . $post->trailer->url);
            }
            foreach ($post->images as $key => $obj) {
                File::delete(public_path() . $obj->url);
            }
            $post->delete();
        }
        return back();
    }

    public function DeleteVideo(Request $request)
    {
        $video = Video::find($request->video_id);
        File::delete(public_path() . $video->url);
        $video->delete();
        return back();
    }

    public function DeleteImage(Request $request)
    {
        $image = Image::find($request->id);
        File::delete(public_path() . $image->url);
        $image->delete();
        return response()->json('تصویر با موفقیت حذف شد');

    }
}
