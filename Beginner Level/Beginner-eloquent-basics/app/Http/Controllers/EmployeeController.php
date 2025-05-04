<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function show(){
        $employes = Employee::all();
        $employe = new Employee();
        $data['employee_data'] = $employes;
        $data['test_info'] = $employe->genarateInfo();
        $data['general_info'] = $employe->getFullNameAttribute();
        return $data;
    }
}
