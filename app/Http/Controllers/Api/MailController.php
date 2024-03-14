<?php

namespace App\Http\Controllers;
use App\Models\Mail as CustomMail;
use App\Mail\NewContact as NewContact;
use Illuminate\Http\Request;
//use Illuminate\Support\Facade\Validator;
use Illuminate\Support\Facade\Mail;


class MailController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $newMail = new CustomMail();
        $newMail->fill($data);
        $newMail->save();

        Mail::to('')->send(new NewContact($newMail));

        return response()->json([
            'success' => true,
        ]);
    }
}
