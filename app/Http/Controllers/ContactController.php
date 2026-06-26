<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email|max:200',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|min:5|max:3000',
        ]);
        ContactMessage::create($data);
        return response()->json(['success' => true]);
    }
}