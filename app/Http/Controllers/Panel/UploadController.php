<?php

namespace App\Http\Controllers\Panel;

use App\Actor;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function Add()
    {
        $query = request()->c;
        $actors = Actor::all();
        $member = auth()->user();
        return view('Panel.Files.Upload', compact(['member', 'query','actors']));
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
        if ($request->hasFile('trailer')) {
            $picextension = $request->file('trailer')->getClientOriginalExtension();
            $fileName = 'trailer_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('trailer')->move($destinationPath, $fileName);
            $trailer = "$destinationPath/$fileName";
        } else {
            $trailer = '';
        }

        $post = new Post;
        $post->name = $request->title;
        $post->type = $request->type;
        $post->description = $request->desc;
        $post->short_description = $request->short_desc;
        $post->poster = $Poster;
        $post->age_rate = $request->age_rate;
        $post->awards = $request->awards;
        $post->save();

        foreach ($request->category as $key => $category) {
            $post->categories()->create(['name' => $category]);
        }
        foreach ($request->category as $key => $category) {
            $post->actors()->create([
                'name' => $category,

                ]);
        }
        foreach ($request->category as $key => $category) {
            $post->categories()->create(['name' => $category]);
        }
        foreach ($request->category as $key => $category) {
            $post->categories()->create(['name' => $category]);
        }

    }
}
