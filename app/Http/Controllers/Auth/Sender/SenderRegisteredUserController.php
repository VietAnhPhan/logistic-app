<?php

namespace App\Http\Controllers\Auth\Sender;

use App\Http\Controllers\Controller;
use App\Services\SenderService;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SenderRegisteredUserController extends Controller
{
    //

    protected $senderService;

    public function __construct(SenderService $senderService)
    {
        $this->senderService = $senderService;
    }

    public function create(): Response
    {

        $response = Inertia::render('Auth/SenderRegister');

        return $response;
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'company_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255|unique:senders,email',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $sender = $this->senderService->register($validate);


        // // Log the user in
        Auth::guard('sender')->login($sender);

        // // Redirect to sender dashboard or intended page
        return redirect()->route('sender.dashboard');
    }
}
