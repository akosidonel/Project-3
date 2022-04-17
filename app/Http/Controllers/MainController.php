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
    Public function fetchAllDept(){
       $department = Department::all();
       $output = "";
       if($department->count() > 0){
           $output .= '<table id="example" class="table table-striped dt-responsive nowrap text-center align-middle" style="width:100%">
           <thead>
           <tr>
               <th>Department</th>
               <th>Code</th>
               <th>Status</th>
               <th>Action</th>        
           </tr>
       </thead>
       <tbody>';
        foreach($department as $data){
            $output .='
            <tr>
                <td>'.$data->department_name.'</td>
                <td>'.$data->department_code.'</td>
                <td>'.$data->status.'</td>
                <td>
                <a href="#" id="'.$data->id.'" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editDepartmentModal" ><i class="bi bi-pencil-square h4"></i></a>
                <a href="#" id="'.$data->id.'" class="text-danger mx-1 deleteIcon"><i class="bi bi-trash h4"></i></a>
                </td>
            </tr>
            ';
        }
        $output .='</tbody>
        <tfoot>
            <tr>
                <th>Department</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
            </table>';
            echo $output;
       }else{
           echo '<h1 class="text-center text-secondary my-5">No records found in the database!</h1>';
       }
    }

    Public function editDept(Request $request){
        $id = $request->id;
        $dept_id = Department::find($id);
        return response() ->json($dept_id);
    }

    Public function updateDept(Request $request){
        $dept_update = Department::find($request->dept_id);
        $update_dept = [
            'edit_department_name'=>$request->department_name,
            'edit_department_code'=>$request->department_code,
            'edit_department_status'=>$request->status
        ];
        $dept_update->update($update_dept);
            return response()->json([
                'status'=> 200
        ]);
    }
    Public function deleteDept(Request $request){
        $id = $request->id;
        $dept_id = Department::destroy($id);
    }
}
