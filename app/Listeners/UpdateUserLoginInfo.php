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
            $ipAddress = $this->getServerIp();
            $user->login_ip = $ipAddress;
            $user->browser_info = $agent->browser();
            $user->last_login = Carbon::now();
            $user->save();
        }
    }

    public function getServerIp() {
        // Lấy địa chỉ IP từ interface mạng trên UNIX/Linux
        $ip = shell_exec("hostname -I");
        
        if ($ip) {
            // Cắt khoảng trắng và lấy IP đầu tiên (nếu có nhiều IP)
            $ip = explode(' ', trim($ip))[0];
        } else {
            // Lấy địa chỉ IP từ interface mạng trên Windows
            $ip = gethostbyname(trim(`hostname`));
        }
    
        return $ip;
    }
}
