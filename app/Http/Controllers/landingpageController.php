<?php

namespace App\Http\Controllers;

use App\Service\Database\ClinicService;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index()
    {
        $DBclinic = new ClinicService;

        $clinics = $DBclinic->index(['per_page' => 8]);

        return view('landingpage')
        ->with('clinics', $clinics);
    }

    public function detailClinic($clinicId)
    {
        $DBclinic = new ClinicService;

        $clinicDetail = $DBclinic->detail($clinicId);

        $totalService = count($clinicDetail['service']);

        return view('detail_clinic')
        ->with('clinicDetail', $clinicDetail)
        ->with('totalService', $totalService);
    }

    public function accountManagement2(){
        return view('admin.account_management');
    }

}
