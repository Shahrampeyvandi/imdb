<?php

namespace App\Http\Controllers\Panel;

use App\Actor;
use App\Category;
use App\Director;
use App\Http\Controllers\Controller;
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
        $posts = Post::latest()->get();

        return view('Panel.Files.List', compact('posts'));
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

            foreach ($request->language as $key => $language) {
                if ($id = Language::check($language)) {
                    $post->languages()->attach($id);
                } else {
                    $post->languages()->create(['name' => $language]);
                }
            }

            if ($request->type == 'series') {
                $season = $post->seasons()->create(['number' => $request->season]);
                $season->sections()->create(['number' => $request->section]);
            }
            foreach ($request->awards as $key => $award) {
                $post->awards()->create(['title' => $award]);
            }

            if ($request->hasFile('trailer')) {
                $picextension = $request->file('trailer')->getClientOriginalExtension();
                $fileName = 'trailer_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
                $request->file('trailer')->move($destinationPath, $fileName);
                $trailer = "$destinationPath/$fileName";

                $post->trailer()->create(['name' => $post->name, 'poster' => $post->poster, 'url' => $trailer]);
            }

        } else {
            return back();
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

            $videos = Post::find($id)->videos;
        } else {
            $videos = [];
        }
        return view('Panel.Files.UploadVideo', compact(['id', 'videos']));
    }

    public function SaveVideo(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required',
            'quality' => 'required',
        ], [
            'file.required' => 'فایل را وارد نمایید',
            'quality.required' => 'کیفیت فیلم را وارد نمایید',
        ]);

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
        $post->videos()->create([
            'url' => $url,
            'quality' => $quality_id,
            'description' => null,
        ]);

        return response()->json('ویدئو با موفقیت آپلود شد', 200);
    }

    public function DeletePost(Request $request)
    {

        foreach ($request->array as $key => $id) {
            $post = Post::find($id);
            File::delete(public_path() . $post->poster);
            File::delete(public_path() . $post->trailer);
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

    public function EditPost(Request $request)
    {
        dd($request->all());
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

        foreach ($request->language as $key => $language) {
            if ($post->languages()->pluck('name')->contains($language)) {
                continue;
            }
                if ($id = Language::check($language)) {
                    $post->languages()->attach($id);
                } else {
                    $post->languages()->create(['name' => $language]);
                }
            }

            if ($request->type == 'series') {
                $post->season()->delete();
                $season = $post->seasons()->create(['number' => $request->season]);
                $season->sections()->create(['number' => $request->section]);
            }
            foreach ($request->awards as $key => $award) {
                $post->awards()->create(['title' => $award]);
            }

    }
}
