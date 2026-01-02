<?php

namespace App\Services;

use App\Models\Sender;

class SenderService
{
    // Service methods for sender-related operations can be added here
    public function register(array $data): Sender
    {
        // Logic to register a sender user
        $sender = Sender::create([
            'name' => $data['company_name'],
            'phone' => $data['mobile'],
            'email' => $data['contact_email'],
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
        ]);

        return $sender;
    }
}
