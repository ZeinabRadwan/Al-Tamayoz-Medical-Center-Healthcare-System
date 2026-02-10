<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
public function showContactForm(Request $request)
{
    // Get the 'type' query parameter, if any
    $selectedSubject = $request->query('type');
    
    // Pass the selected subject to the view
    return view('UI.contact-us', compact('selectedSubject'));
}


    public function submitMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'subject' => 'required|in:thanks,complaint,suggestion',
            'message_content' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function showMessages()
    {
        $messages = Message::all();
        return view('contacts.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('contacts.show', compact('message'));
    }

    public function toggleReadStatus($id)
    {
        $message = Message::findOrFail($id);
        $message->is_read = !$message->is_read;
        $message->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
