<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AreaAdmin;
use App\Models\DeptAdmin;
use Session;

class DeptAdminController extends Controller
{
    
    public function viewDeptadminLogin()
    {
        return view ('DeptAdminLogin');
    }

    public function viewDeptadminDashboard()
    {
        return view ('CommonDashboard');
    }
    public function checkDeptAdmin(Request $request)
    {
        $request->validate([

            'email'=>'required',

            'password'=>'required'
        ]);

       $deptAdmin=DeptAdmin::where('email',$request->email)->first();

       if (!$deptAdmin || !Hash::check($request->password,$deptAdmin->password)) {
           
        return back()->with('faild','unauthorised admin login');
        
       }else {

            $request->session()->put('deptAdmin',$deptAdmin);
           return redirect('/common_dashboard');
       }
    }

}
