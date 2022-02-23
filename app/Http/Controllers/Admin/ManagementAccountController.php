<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementAccountController extends Controller
{
    public function index(){
        return view('admin.account_admin_management');
    }
}
