<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;

class UpdateUserLoginInfo
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
    public function handle(Login $event): void
    {
        $agent = new Agent();
        $user = $event->user;
        if ($user instanceof \App\Models\User) {
            $user->login_ip = request()->ip();
            $user->browser_info = $agent->browser();
            $user->last_login = Carbon::now();
            $user->save();
        }
    }
}
