<?php

namespace App\Listeners\Auth;

use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class AddUserDefaultRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->role = new Role;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->user->assignRole('user');
    }
}
