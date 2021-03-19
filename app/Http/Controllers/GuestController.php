<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * @var Guest
     */
    public $guest;

    /**
     * Guest constructor.
     */
    public function __construct()
    {
        $this->guest = new Guest();
    }

    /**
     * Create guest access.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $guest = $this->guest->create($request);

        return redirect()
            ->route('home')
            ->with($guest['status'], $guest['message']);
    }
}
