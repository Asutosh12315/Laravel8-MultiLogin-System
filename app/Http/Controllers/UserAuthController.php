<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AreaAdmin;
use App\Models\DeptAdmin;

use Session;

class UserAuthController extends Controller
{

    public function viewLogin()
    {
        return view('Login');
    }

    public function viewSignup()
    {
        return view('Signup');
    }

    public function viewDashboard()
    {
        
        return view('Dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            
            'email'=>'required',

            'password'=>'required'
        ]);

        $user=new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $result=$user->save();

        if ($result) {
            
            return back()->with('success','new admin registration successfull');
        }
    }
    public function check(Request $request)
    {

        $request->validate([

            'email'=>'required',

            'password'=>'required'
        ]);

        $user=User::where('email',$request->email)->first();

        if (!$user || !Hash::check($request->password,$user->password)) {
            
            return back()->with('failed','incorrect email or password');
        }
        else{

            $request->session()->put('user',$user);
            return redirect('/dashboard');
        }

    }

    public function logOut()
    {
        if (session()->has('user')) {
            
            session()->pull('user');

          
        }
        return redirect('/');
    }

    public function createAreaAdmin(Request $request)
    {
        
        $areaadmin= new AreaAdmin;

        $areaadmin->name=$request->name;
        $areaadmin->email=$request->email;
        $areaadmin->password=Hash::make($request->password);
        $areaadmin->zone=$request->zone;
        $areaadmin->department=$request->department;
        $areaadmin->category=$request->category;
        $result=$areaadmin->save();

        if ($result) {
            
            return back()->with('success','new area-admin created successfully');
        }

    }

    public function viewAllAdmins()
    {
        $alladmin=AreaAdmin::all();
        return view('AreaAdmin',['alladmins'=>$alladmin]);
    }

    public function deleteAreaAdmin($id)
    {
        AreaAdmin::find($id)
        ->delete();
        return back();
    }

    public function viewAllDeptAdmin()
    {
        $allDeptAdmin=DeptAdmin::all();

        return view('DeptAdminDetails',['allDeptAdmins'=>$allDeptAdmin]);
    }

    public function deleteDeptAdmin($id)
    {
        DeptAdmin::find($id)
        ->delete();

        return back();
       
    }
}
