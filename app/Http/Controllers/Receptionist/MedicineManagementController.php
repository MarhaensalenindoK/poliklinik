<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Service\Database\MedicineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineManagementController extends Controller
{
    public function index()
    {
        $DBmedicine = new MedicineService;

        $medicines = $DBmedicine->index(Auth::user()->clinic_id);

        return view('receptionist.medicine_management')
        ->with('medicines', $medicines);
    }

    public function createMedicine(Request $request)
    {
        $DBmedicine = new MedicineService;

        $name = $request->name;
        $amount = $request->amount;
        $otherAmount = $request->otherAmount;
        $type = $request->typeCreate;
        $otherType = $request->otherType;
        $price = $request->price;
        $stock = $request->stock;

        $payload = [
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
        ];

        if ($amount === null && $otherAmount === null) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi amount dari obat tersebut!.');
        }

        if ($type === null && $otherType === null) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi tipe dari obat tersebut!.');
        }

        if ($amount !== null) {
            $payload['amount'] = $amount;
        } else {
            if ($otherAmount === null) {
                return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi amount dari obat tersebut!.');
            }
            $payload['amount'] = strtoupper($otherAmount);
        }

        if ($type !== null) {
            $payload['type'] = $type;
        } else {
            if ($otherType === null) {
                return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi tipe dari obat tersebut!.');
            }

            $payload['type'] = strtoupper($otherType);
        }

        $createMedicine = $DBmedicine->create(Auth::user()->clinic_id, $payload);

        if (isset($createMedicine['id'])) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Berhasil menambahkan obat!.');
        }

        return redirect('receptionist/medicine-management')->with('messageMedicine', 'Gagal menambahkan obat!.');
    }

    public function updateMedicine(Request $request)
    {
        $DBmedicine = new MedicineService;

        $medicine_id = $request->medicine_id;
        $name = $request->name;
        $amount = $request->amount;
        $otherAmount = $request->otherAmount;
        $type = $request->typeCreate;
        $otherType = $request->otherType;
        $price = $request->price;
        $stock = $request->stock;

        $payload = [
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
        ];

        if ($amount === null && $otherAmount === null) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi amount dari obat tersebut!.');
        }

        if ($type === null && $otherType === null) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi tipe dari obat tersebut!.');
        }

        if ($amount !== null) {
            $payload['amount'] = $amount;
        } else {
            if ($otherAmount === null) {
                return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi amount dari obat tersebut!.');
            }
            $payload['amount'] = strtoupper($otherAmount);
        }

        if ($type !== null) {
            $payload['type'] = $type;
        } else {
            if ($otherType === null) {
                return redirect('receptionist/medicine-management')->with('messageMedicine', 'Mohon untuk mengisi tipe dari obat tersebut!.');
            }

            $payload['type'] = strtoupper($otherType);
        }

        $updateMedicine = $DBmedicine->update($medicine_id, $payload);

        if (isset($updateMedicine['id'])) {
            return redirect('receptionist/medicine-management')->with('messageMedicine', 'Berhasil mengubah obat!.');
        }

        return redirect('receptionist/medicine-management')->with('messageMedicine', 'Gagal mengubah obat!.');
    }

    public function deleteMedicine(Request $request)
    {
        $DBmedicine = new MedicineService;

        $medicineId = $request->medicine_id;

        return response()->json(
            $DBmedicine->destroy($medicineId)
        );
    }
}
