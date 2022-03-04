<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuequeManagementController extends Controller
{
    public function index(){
        return view('receptionist.queque_management');
    }
}
