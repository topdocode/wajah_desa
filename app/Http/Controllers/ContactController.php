<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        return view('guest.contact.index');
    }
}
