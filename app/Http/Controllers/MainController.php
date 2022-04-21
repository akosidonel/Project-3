<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\GeneralFundInventory;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //view login ui
    Public function login(){
        return view('auth.login');
    }
    Public function check(Request $request){
        //validate login input
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:8',

        ]);
        $users = User::where('email','=', $request->email)->first();

        if($users){
           if(Hash::check($request->password, $users->password)){
                $request->session()->put('LoggedUser', $users->id);
                return redirect('/admin/dashboard');
           }else{
               return back()->with('fail',' password not matches!');
           }
            
        }else{
           return back()->with('fail', ' we do not recognize this email!');
        }
    }

    Public function logout(){
        if(session()->has('LoggedUser')){
            session()->put('LoggedUser');
            return redirect('/auth/login');
        }
    }

    //view register ui
    Public function register(){
        return view('auth.register');
    }
    Public function save_register(Request $request){
        
        //validate request
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'password'=>'required|min:8|max:12'
        ]);

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email = $request->email;
        $user->phonenumber = $request->phone;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success', 'Successfully Added!');
        }else{
            return back()->with('fail', 'Something went wrong');
        }

    }

    //view dashboard ui
    Public function dashboard(){
        return view('admin.dashboard');
    }
    //view department ui
    Public function department(){
        return view('admin.department');
    }
    //add department ajax request
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
    //fetch dapartment ajax request
    //view all department data in the dataTable
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
    //view specific department in modal using ajax request
    Public function editDept(Request $request){
        $id = $request->id;
        $dept_id = Department::find($id);
        return response() ->json($dept_id);
    }
    //update department data ajax request
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
    //delete department ajax request
    Public function deleteDept(Request $request){
        $id = $request->id;
        $dept_id = Department::destroy($id);
    }


    //view general fund inventory ui
    Public function generalFundInventory(){
        return view('admin.gen-inventory');
    }
    //add gen-inventory ajax request
    Public function saveGenInventory(Request $request){
        $general_inventory = GeneralFundInventory::all();
        $output = "";
        if($general_inventory->count() > 0){
            $output .= '<table id="example" class="table table-striped dt-responsive  align-middle width:100%">
            <thead>
            <tr>
                <th>Article</th>
                <th>Description</th>
                <th>Property Number</th>
                <th>Unit Value</th>    
                <th>Total Value</th>  
                <th>Location</th>    
                <th>Department</th>    
                <th>End User</th>    
                <th>Supplier</th> 
                <th>Code</th>
                <th>Date</th> 
                <th>Status</th>   
                <th>Action</th>        
            </tr>
        </thead>
        <tbody>';
         foreach($general_inventory as $data){
             $output .='
             <tr>
                 <td>'.$data->article.'</td>
                 <td>'.$data->description.'</td>
                 <td>'.$data->property_number.'</td>
                 <td>'.$data->unit_value.'</td>
                 <td>'.$data->total_value.'</td>
                 <td>'.$data->location.'</td>
                 <td>'.$data->department.'</td>
                 <td>'.$data->enduser.'</td>
                 <td>'.$data->supplier.'</td>
                 <td>'.$data->account_code.'</td>
                 <td>'.$data->date.'</td>
                 <td>Serviceable</td>
                 
                
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
             <th>Article</th>
             <th>Description</th>
             <th>Property Number</th>
             <th>Unit Value</th>    
             <th>Total Value</th> 
             <th>Location</th>    
             <th>Department</th>    
             <th>End User</th>    
             <th>Supplier</th> 
             <th>Code</th> 
             <th>Date</th>   
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



    //view sef fund inventory ui
    Public function sefInventory(){
        return view('admin.sef-inventory');
    }
    // view return item ui
    Public function returnItem(){
        return view('admin.return-item');
    }
    //view archive item ui
    Public function archived(){
        return view('admin.archived');
    }
    //view user-management ui
    Public function userManagement(){
        return view('admin.user-management');
    }
    Public function saveUser(Request $request){
        $user_data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => $request->password
        ];

        User::create($user_data);
        return response()->json([
            'status'=> 200
        ]);
    }
    Public function fetchAllUser(){
        $users = User::all();
        $output = "";
        if($users->count() > 0){
            $output .= '<table id="userTable" class="table table-striped dt-responsive nowrap text-center align-middle" style="width:100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th> 
                <th>Status</th>
                <th>Action</th>           
            </tr>
        </thead>
        <tbody>';
         foreach($users as $data){
             $output .='
             <tr>
                 <td>'.$data->id.'</td>
                 <td>'.$data->firstname.' '.$data->lastname.'</td>
                 <td>'.$data->email.'</td>
                 <td>'.$data->phonenumber.'</td>
                 <td>Active</td>
                 <td>
                    <a href="#" id="'.$data->id.'" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editUserModal" ><i class="bi bi-pencil-square h4"></i></a>
                    <a href="#" id="'.$data->id.'" class="text-danger mx-1 deleteIcon"><i class="bi bi-trash h4"></i></a>
                 </td>
             </tr>
             ';
         }
         $output .='</tbody>
         <tfoot>
             <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th> 
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



    Public function activityLog(){
        return view('admin.activity-log');
    }
}
