<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $newMail = new Mail();
        $newMail->fill($data);
        $newMail->save();

        Mail::to('')->send(new NewContact($newMail));
    }
}
