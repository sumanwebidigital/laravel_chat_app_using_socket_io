<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageCOntroller extends Controller
{
    
    public function conversation($userID) {
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userID);
        $myInfo = User::find(Auth::id());

        $data['users'] = $users;
        $data['friendInfo'] = $friendInfo;
        $data['myInfo'] = $myInfo;
        $data['userID'] = $userID;

        return view('message.conversation', $data);
    }
}
