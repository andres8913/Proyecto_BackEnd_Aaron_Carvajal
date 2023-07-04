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

    public function update(Request $request){

        $numeroIdentificacionCustomer = $request->query("numeroIdentificacion");

        $customer = new Customer();

        $customerParticular = $customer->find($numeroIdentificacionCustomer);

        $customerParticular->nombres = $request->input("nombres");
        $customerParticular->apellidos = $request->input("apellidos");
        $customerParticular->tipoIdentificacion = $request->input("tipoIdentificacion");
        $customerParticular->telefono = $request->input("telefono");
        $customerParticular->email = $request->input("email");
        $customerParticular->profesion = $request->input("profesion");
        $customerParticular->rol = $request->input("rol");
        
        $customerParticular->save();

        $message=[
            "message" => "Actualizacion Exitosa",
            "Numero Identificacion" => $request->query("numeroIdentificacion"),
            "Nombre" =>$customerParticular->nombres
        ];

        return $message;
    }

    public function delete(Request $request){

        $numeroIdentificacionCustomer = $request->query("numeroIdentificacion");

        $customer = new Customer();

        $customerParticular = $customer->find($numeroIdentificacionCustomer);

        $customerParticular->delete();

        $message=[
            "message" => "Eliminacion Exitosa",
            "Numero Identificacion" => $request->query("numeroIdentificacion")
        ];

        return $message;        

    }
}
