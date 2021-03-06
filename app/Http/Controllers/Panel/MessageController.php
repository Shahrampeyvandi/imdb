<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function Add()
    {
        $users = User::latest()->get();

        return view('Panel.payams.send', ['users' => $users]);
    }

    public function Send(Request $request)
    {

        if ($request->type == "email") {
            $content = nl2br($request->content);
            if ($request->for == 'user') {
                foreach ($request->users as $key => $user) {
                    Mail::to($user->email)->send(
                        new SendMail($request->title, $content)
                    );
                }

            }

            if ($request->for == 'all') {
                foreach (User::all() as $key => $user) {
                    Mail::to($user->email)->send(
                        new SendMail($request->title, $content)
                    );
                }
            }

             if ($request->for == 'email') {
                    Mail::to($request->email)->send(
                        new SendMail($request->title, $content)
                    );
            }
        }

        if ($request->type == "noty") {
            if ($request->for == 'email') {
                return back();
            }

            if ($request->for == 'user') {
                foreach ($request->users as $key => $user) {
                    $content = nl2br($request->content);
                    $notification = new Notification;
                    $notification->subject = $request->title;
                    $notification->content = $request->content;
                    $notification->sender = 'admin';
                    $notification->reciver_id = $user;
                    $notification->save();
                }
            }

            if ($request->for == 'all') {
                foreach (User::all() as $key => $user) {
                    $content = nl2br($request->content);
                    $notification = new Notification;
                    $notification->subject = $request->title;
                    $notification->content = $request->content;
                    $notification->sender = 'admin';
                    $notification->reciver_id = $user->id;
                    $notification->save();
                }
            }

        }

    }
}
