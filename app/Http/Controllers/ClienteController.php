<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$clientes = Cliente::where("active","=",1);

        $name=$request->get('textSearch');
        $dateIni=$request->get('dateIni');
        $dateEnd=$request->get('dateEnd');

        //var_dump($textSearch);

        $clientes = Cliente::orderBy('id', 'DESC') 
        -> where('active', 1)
        -> name($name)
        -> dateIni($dateIni)
        -> dateEnd($dateEnd)
        -> paginate(4);
        

        return view('clientes.clientList', [
            'clientes'  => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes.clientAdd');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.clientAdd',[
            'cliente' => $cliente
        ]);
    }


    public function store(Request $request)
    {
        //
        $cliente = Cliente::create([
            'name' => $request->name, 
            'document'=> $request->document,
            'date'=> $request->date, 
            'email'=> $request->email, 
            'active'=> 1,
        ]);
        return back();
    }

    public function update(Request $request, Cliente $cliente)
    {
        //
        //var_dump($cliente);

        $id = $cliente->id;
        $cliente = Cliente::where("id","=",$id)->first();
        $cliente->name = $request->name;
        $cliente->date = $request->date;
        $cliente->document = $request->document;
        $cliente->email = $request->email;
        $cliente->save();

        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente-> delete();
        return back();
    }
}
