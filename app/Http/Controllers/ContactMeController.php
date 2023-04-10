<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests\ContactMeRequest;
use App\Mail\ContactMeMail;

class ContactMeController extends Controller
{
  public function __invoke(ContactMeRequest $request)
  {
    $validated = $request->validated();

    Mail::to(env('DEFAULT_TO_EMAIL'))->send(new ContactMeMail($validated));

    return redirect()->back();
  }
}