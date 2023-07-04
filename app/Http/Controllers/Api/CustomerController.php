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

    public function create(Request $request){

        $customer = new Customer();

        $customer->numeroIdentificacion = $request->input("numeroIdentificacion");
        $customer->nombres = $request->input("nombres");
        $customer->apellidos = $request->input("apellidos");
        $customer->tipoIdentificacion = $request->input("tipoIdentificacion");
        $customer->telefono = $request->input("telefono");
        $customer->email = $request->input("email");
        $customer->profesion = $request->input("profesion");
        $customer->rol = $request->input("rol");

        $customer->save();
        
        $message=["mensaje" => "Registro Exitoso"];

        return response()->json($message);
    }

    public function update(){

        return true;
    }

    public function delete(){

        return true;
    }
}
