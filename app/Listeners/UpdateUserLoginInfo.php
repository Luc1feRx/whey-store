<?php

namespace App\Listeners;

use App\Helpers\Common;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
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
            $ipAddress = Common::getIp();
            $ipInfo = $this->getCountryByIp($ipAddress);
            $user->login_ip = $ipAddress;
            $user->browser_info = $agent->browser();
            $user->last_login = Carbon::now();
            $user->save();
        }
    }

    private function getCountryByIp(String $ip)
    {
        try {
            $ipdat = @json_decode(file_get_contents(
                "http://www.geoplugin.net/json.gp?ip=" . $ip));
            return $ipdat;
        } catch (Exception $exception) {
            Log::error('[LogAccessListener][handle] error: ' . $exception->getMessage());
        }
    }
}
