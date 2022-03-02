<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientManagementController extends Controller
{
    public function index(){
        return view('receptionist.patient_management');
    }

}
