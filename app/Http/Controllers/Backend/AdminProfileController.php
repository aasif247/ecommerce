<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    
    public function AdminProfile()
    {
        $adminData  = Admin::find(1);
        // dd($adminDatas);
        return view('admin.admin_profile_view', compact('adminData'));
    }



}
