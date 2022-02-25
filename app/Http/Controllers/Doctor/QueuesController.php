<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueuesController extends Controller
{
    public function index()
    {
        return view('doctor.queues');
    }
}
