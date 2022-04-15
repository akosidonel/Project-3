<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class MainController extends Controller
{
    Public function department(){
        return view('admin.department');
    }
    Public function save(Request $request){
        $department_data = [
            'department_name'=> $request->department_name,
            'department_code'=> $request->department_code
        ];

        Department::create($department_data);
            return response() ->json([
                'status' => 200
            ]);
    }
}
