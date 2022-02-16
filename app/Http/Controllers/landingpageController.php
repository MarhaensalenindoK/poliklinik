<?php

namespace App\Http\Controllers;

use App\Service\Database\ClinicService;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index(Request $request)
    {
        $DBclinic = new ClinicService;

        $clinics = $DBclinic->index(['per_page' => 8]);

        return view('landingpage')
        ->with('clinics', $clinics);
    }
}
