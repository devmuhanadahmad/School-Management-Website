<?php
namespace App\Http\Traits;

use MacsiDigital\Zoom\Facades\Zoom;

trait MeetingZoomTrait
{
  public function creatMeetingZoom($request)
  {
    $user = Zoom::user()->first();
    $meeting = Zoom::meeting()->make([
      'topic' => $request->topic,
      'duration' => $request->duration,
      'password' => $request->password,
      'start_at' => $request->start_at,
      //'timezone'=>config('zoom.timezone'),
      'timezone' => 'Asia/Gaza'
      //'start_time' => new Carbon('2020-08-12 10:00:00'), // best to use a Carbon instance here.
    ]);


    $meeting->settings()->make([
      'join_before_host' => false,
      'host_video' => false,
      'approval_type' => 1,
      'registration_type' => 2,
      'enforce_login' => false,
      'waiting_room' => false,
      'audio' => config('zoom.audio'), //get setting
      'auto_recording' => config('zoom.auto_recording')
    ]);

    return $user->meetings()->save($meeting);
  }
}
