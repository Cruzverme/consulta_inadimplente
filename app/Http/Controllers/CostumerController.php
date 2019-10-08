<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;
use GuzzleHttp\Client;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $costumers = Costumer::all();
        
        $client = new Client();
        $response = $client->request('GET','http://192.168.80.5/sisspc/demos/get_pendente_pagamento.php');
        $body = $response->getBody();
        $retorno_json = json_decode($body);
        $sucesso = $retorno_json->success;
        $dados = $retorno_json->dados;
        
        return view('costumers/index',compact('costumers','sucesso','dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('costumers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $costumer = new Costumer;
        // $costumer->name = $request->name;
        // $costumer->street = $request->street;
        // $costumer->streetNumber = $request->streetNumber;
        // $costumer->neighborhood = $request->neighborhood;

        // $costumer->save();
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'street' => 'required',
            'streetNumber' => 'required|numeric',
            'neighborhood' => 'required'
        ]);
        $costumer = Costumer::create($validateData);
        return redirect('/costumers')->with('message', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $costumer = Costumer::findOrFail($id);

        return view('costumers/edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'street' => 'required',
            'streetNumber' => 'required|numeric',
            'neighborhood' => 'required'
        ]);

        Costumer::whereId($id)->update($validateData);

        return redirect('/costumers')->with('message', 'Product is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $costumer = Costumer::findOrFail($id);
        $costumer->delete();

        return redirect('/costumers')->with('success', 'Costumer is successfully deleted');
    }
}
