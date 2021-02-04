<?php

namespace App\Listeners;

use App\Events\ProfileInformationUpdated;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfileInformationUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProfileInformationUpdated  $event
     * @return void
     */
    public function handle(ProfileInformationUpdated $event)
    {
        $notification = Notification::create([
            'title' => 'Profile updated',
            'text' => 'Your profile updated successfully',
            'link' => route('profile.show'),
            'icon' => 'favicon.ico',
            'status' => 1,
        ]);

        $event->user->notifications()->sync($notification, false);
    }
}
