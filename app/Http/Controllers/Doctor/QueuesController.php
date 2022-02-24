<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueuesController extends Controller
{
    public function index()
    {
        return view('doctor.queues');
    }
}
