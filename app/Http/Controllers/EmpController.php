<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function getAllEmployees()
    {   
        $data['employees'] = Employee::all();
        return view('employee.index', $data);
    }
}
