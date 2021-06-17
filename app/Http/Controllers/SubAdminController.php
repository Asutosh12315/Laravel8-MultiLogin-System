<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AreaAdmin;
use App\Models\DeptAdmin;

use Session;

class SubAdminController extends Controller
{
    public function viewAreaAdminLogin()
    {
        return view('AreaAdminLogin');
    }

    public function viewAreaAdminDashboard()
    {
        return view('AreaAdminDashboard');
    }
    public function checkareaadmin(Request $request)
    {
        $request->validate([

            'email'=>'required',

            'password'=>'required'
        ]);

        $areaadmin=AreaAdmin::where('email',$request->email)->first();

        if (!$areaadmin || !Hash::check($request->password,$areaadmin->password)) {
         
            return back()->with('failed','this admin doesnot exsists');
        }else {

            $request->session()->put('areaadmin',$areaadmin);
            return redirect('/areaadmin_dashboard');
        }

    }

    public function storeDeptAdmin(Request $request)
    {
        $deptAdmin= new DeptAdmin;

        $deptAdmin->name=$request->name;
        $deptAdmin->email=$request->email;
        $deptAdmin->password=Hash::make($request->password);
        $deptAdmin->designation=$request->designation;
        $deptAdmin->shifttime=$request->shifttime;
        $result=$deptAdmin->save();

        if ($result) {

            return back()->with('success','new departmental-admin created successfully');
    
        }
    }

    public function viewAllDeptAdmins()
    {
        $allDeptAdmins=DeptAdmin::all();
        return view('DeptAdmin',['allDeptAdmins'=>$allDeptAdmins]);
    }

    public function deleteDeptAdmin($id)
    {
        DeptAdmin::find($id)
        ->delete();
        return back();
    }

}
