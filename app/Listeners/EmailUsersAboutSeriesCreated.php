<?php

namespace App\Listeners;

use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $userList = User::all();
        foreach ($userList as $index => $user) {

            $email = new SeriesCreated(
                $event->nome,
                $event->id,
                $event->seasonsQty,
                $event->episodesPerSeason
            );
            $when = now($index * 5);
            Mail::to($user)->later($when, $email);
        }
    }
}
