<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushTokenController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'token' => ['required', 'string', 'max:4096'],
        ]);

        $request->user()->update(['fcm_token' => $data['token']]);

        return response()->json(['message' => 'Token push enregistré.']);
    }
}