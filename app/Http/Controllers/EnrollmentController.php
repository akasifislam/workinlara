<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class EnrollmentController extends Controller
{
    public function testNotification()
    {
        $user = User::first();

        $enrolmentData = [
            "body" => "Test Notification",
            "enrolmentText" => "send an enroll",
            "url" => url('/'),
            "thankyou" => "Message djsfjsf",
        ];

        // $user->notify(new TestNotification($enrolmentData));

        Notification::send($user, new TestNotification($enrolmentData));
    }
}
