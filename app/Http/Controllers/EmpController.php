<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class EmpController extends Controller
{
    public function getAllEmployees()
    {
        $data['employees'] = Employee::all();
        return view('employee.index', $data);
    }


    public function downloadPdf()
    {
        $data['employees'] = Employee::all();
        $pdf = PDF::loadView('employee.index', $data);

        return $pdf->download('employee.pdf');
    }
}
