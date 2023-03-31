<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    //
    public function removeNewCommmentNotification(Request $notification)
    {
        $post_id = $notification->post_id;
        $notification = auth()->user()->notifications()->where('id',$notification->notification_id)->firstorFail();
        $notification->delete();

        return Redirect::route('post.show', $post_id);
    }
}
