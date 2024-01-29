<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenancyRegister;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenancyRegisterController extends Controller
{
    public function create(){
        return view('tenancy-register');
    }

    public function store(StoreTenancyRegister $request){
        $tenant = Tenant::create($request->validated());
//        dd($request->all());
        $tenant->createDomain(['domain' => $request->domain]);


        return "done";

    }




}
