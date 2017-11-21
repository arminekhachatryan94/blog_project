<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index( Message $messages){ // display all users whom you have messages with
    	$messages = Message::latest()->get();
    	return view('messages.index', compact('messages'));
    }

    public function show(){ // show individual chats
    	;
    }

    public function store(){ // send message to existing chat
    	;
    }

    public function create(){ // send message to new/existing chat
    	return view('messages.create');
    }
}
