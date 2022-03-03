<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\MedicalHistoryService;
use Carbon\Carbon;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientManagementController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;

        $patients = $DBuser->index([
            'role' => User::PATIENT,
            'clinic_id' => Auth::user()->clinic_id,
            'status' => true,
            'with_clinic' => true,
            'with_medical_patient' => true,
            'with_queue' => true,
        ]);

        return view('receptionist.patient_management')
        ->with('patients', $patients);
    }

    public function createPatient(Request $request)
    {
        $DBuser = new UserService;
        $DBmedicalHistory = new MedicalHistoryService;

        $name = $request->name;
        $username = $request->username;
        $nik = $request->nik;
        $email = $request->email;

        $allergic = $request->allergic;
        $been_diagnosed = array_filter($request->diagnosed);
        $hospitalization_surgery = array_filter($request->hospitalization_surgery);
        $anamnesis = $request->anamnesis;

        $payloadUser = [
            'name' => $name,
            'username' => $username,
            'password' => $username,
            'nik' => $nik,
            'email' => $email,
            'role' => User::PATIENT,
            'status' => true,
        ];

        $createUser = $DBuser->create(Auth::user()->clinic_id, $payloadUser);

        $payloadMedicalHistory = [
            'patient_id' => $createUser['id'],
            'date_checkup' => Carbon::now()->format('Y-m-d'),
            'allergic' => implode(", ", array_filter($allergic)),
            'anamnesis' => $anamnesis,
            'been_diagnosed' => [],
            'hospitalization_surgery' => [],
        ];

        if ($been_diagnosed !== []) {
            $payloadMedicalHistory['been_diagnosed'] = [];

            foreach ($been_diagnosed as $key => $item) {
                $payloadMedicalHistory['been_diagnosed'][$key] = $item;
            }
        }

        if ($hospitalization_surgery !== []) {
            $payloadMedicalHistory['hospitalization_surgery'] = [];

            foreach ($hospitalization_surgery as $key => $item) {
                $payloadMedicalHistory['hospitalization_surgery'][$key]['reason'] = $item;
            }
        }

        $createMedicalHistory = $DBmedicalHistory->create(Auth::user()->clinic_id, null, $payloadMedicalHistory);

        if (isset($createMedicalHistory['id'])) {
            $message = "
                Membuat Pasien : <br>
                <ul>
                    <li>Name : <strong>" .$createUser['name']. "</strong></li>
                    <li>NIK : <strong>" .$createUser['nik']. "</strong></li>
                    <li>Email : <strong>" .$createUser['email']. "</strong></li>
                    <li>Anamnesis : " .$createMedicalHistory['anamnesis']. "</li>
                </ul>
            ";

            return redirect('receptionist/patient-management')
            ->with('message', $message);
        }

        $message = "Gagal membuat pasien";

        return redirect('receptionist/patient-management')
        ->with('message', $message);
    }

    public function updatePatient(Request $request)
    {
        $DBuser = new UserService;
        $DBmedicalHistory = new MedicalHistoryService;

        $patientId = $request->user_id;
        $name = $request->name;
        $username = $request->username;
        $nik = $request->nik;
        $email = $request->email;

        $medicalHistoryId = $request->medical_history_id;
        $allergic = $request->allergic;
        $been_diagnosed = array_filter($request->diagnosed);
        $hospitalization_surgery = array_filter($request->hospitalization_surgery);
        $anamnesis = $request->anamnesis;

        $payloadUser = [
            'name' => $name,
            'username' => $username,
            'password' => $username,
            'nik' => $nik,
            'email' => $email,
        ];

        $updateUser = $DBuser->update($patientId, $payloadUser);

        $payloadMedicalHistory = [
            'allergic' => implode(", ", array_filter($allergic)),
            'anamnesis' => $anamnesis,
            'been_diagnosed' => [],
            'hospitalization_surgery' => [],
        ];

        if ($been_diagnosed !== []) {
            $payloadMedicalHistory['been_diagnosed'] = [];

            foreach ($been_diagnosed as $key => $item) {
                $payloadMedicalHistory['been_diagnosed'][$key] = $item;
            }
        }

        if ($hospitalization_surgery !== []) {
            $payloadMedicalHistory['hospitalization_surgery'] = [];

            foreach ($hospitalization_surgery as $key => $item) {
                $payloadMedicalHistory['hospitalization_surgery'][$key]['reason'] = $item;
            }
        }

        $updateMedicalHistory = $DBmedicalHistory->update($medicalHistoryId, $payloadMedicalHistory);

        if (isset($updateMedicalHistory['id'])) {
            $message = "
                Membuat Pasien : <br>
                <ul>
                    <li>Name : <strong>" .$updateUser['name']. "</strong></li>
                    <li>NIK : <strong>" .$updateUser['nik']. "</strong></li>
                    <li>Email : <strong>" .$updateUser['email']. "</strong></li>
                    <li>Anamnesis : " .$updateMedicalHistory['anamnesis']. "</li>
                </ul>
            ";

            return redirect('receptionist/patient-management')
            ->with('message', $message);
        }

        $message = "Gagal membuat pasien";

        return redirect('receptionist/patient-management')
        ->with('message', $message);
    }

    public function deletePatient(Request $request)
    {
        $DBuser = new UserService;
        $DBmedicalHistory = new MedicalHistoryService;
        $patient = $DBuser->detail($request->user_id);

        if ($patient['medical_history_patient'] !== null) {
            $DBmedicalHistory->destroy($patient['medical_history_patient']['id']);
        }

        $deletePatient = $DBuser->destroy($request->user_id);

        return response()->json($deletePatient);
    }
}
