<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class Guest extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $sessionPrefix = 'bookmark-app-guest';

    /**
     * Create guest access with dummy data.
     *
     * @return array [status] - error or success, [message] - status message
     */
    public function create(): array
    {
        $user = $this->store();

        Auth::login($user);

        $this->populateDummyData();

        return [
            'status' => 'success',
            'message' => 'We have created temporary access for you and populate it with dummy data'
        ];
    }

    public function populateDummyData() {
        Artisan::call( 'db:seed', [
                '--class' => 'GuestSeeder',
                '--force' => true
            ]
        );
    }

    /**
     * Create new guest user.
     *
     * @return User
     */
    public function store(): User
    {
        $guestId = $this->generateGuestId();

        $user = User::create([
            'name' => 'Guest',
            'email' => $guestId . '@guest',
            'password' => 'password',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->assignRole('guest');

        return $user;
    }

    /**
     * Generate unique id.
     *
     * @return string
     */
    public function generateGuestId(): string
    {
        return uniqid($this->sessionPrefix . '-');
    }
}
