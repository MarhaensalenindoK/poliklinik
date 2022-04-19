<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Service\Database\ActionService;
use App\Service\Database\MedicalHistoryService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class HistoryPaymentController extends Controller
{
    public function index()
    {
        $DBmedicalHistory = new MedicalHistoryService;
        $DBaction = new ActionService;

        $medicalHistories = $DBmedicalHistory->index(Auth::user()->id, [
            'with_queue' => true,
        ]);

        foreach ($medicalHistories['data'] as $key => $medicalHistory) {
            $actions = $DBaction->index($medicalHistory['id'])['data'];
            $medicalHistories['data'][$key]['action'] = $actions;
            $medicalHistories['data'][$key]['total_payment'] = 0;
            $totalPayment = 0;

            foreach ($actions as $action) {
                $totalPayment += $action['medicine']['price'] * $action['count'];
            }

            $medicalHistories['data'][$key]['total_payment'] = $totalPayment;
        }

        return view('patient.history_payment', compact('medicalHistories'));
    }

    public function print(Request $request)
    {
        $DBmedicalHistory = new MedicalHistoryService;
        $DBaction = new ActionService;

        $medicalHistoryId = $request->medical_history_id;

        $medicalHistory = $DBmedicalHistory->detail($medicalHistoryId);
        $actions = $DBaction->index($medicalHistory['id'])['data'];
        $medicalHistory['action'] = $actions;
        $medicalHistory['total_payment'] = 0;
        $totalPayment = 0;

        foreach ($actions as $action) {
            $totalPayment += $action['medicine']['price'] * $action['count'];
        }

        $medicalHistory['total_payment'] = $totalPayment;

        $pdf = PDF::loadview('print_payment',['medicalHistory' => $medicalHistory]);

        return $pdf->download('struk-payment.pdf');
    }
}
