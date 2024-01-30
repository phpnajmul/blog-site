<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenancyRegister;
use App\Models\News;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Domain;

class TenancyRegisterController extends Controller
{
    public function create(){
        return view('tenancy-register');
    }

    public function store(StoreTenancyRegister $request){
        $tenant = Tenant::create($request->validated());
//        dd($request->all());
        $tenant->createDomain(['domain' => $request->domain]);

        $notification = array([
            'message' => 'Tenancy Register Successfully!',
            'alert-type' => 'success'
        ]);


        return redirect()->route('dashboard')->with($notification);

    }




}
