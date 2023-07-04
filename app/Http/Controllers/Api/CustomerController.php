<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function read(Request $request){

        $customers = new Customer();

        $data = $customers->all();

        return response()->json($data);
    }

    public function create(){

        return true;
    }

    public function update(){

        return true;
    }

    public function delete(){

        return true;
    }
}
