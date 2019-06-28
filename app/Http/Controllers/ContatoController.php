<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @return mixed
     */
    public function indexjson(Request $request)
    {
        $pesq = $request->input("q");

        if($pesq){
            return Contato::where("nome", "LIKE", "%$pesq%")
                ->orWhere("telefone", "like", "%$pesq%")
                ->orWhere("email", "like", "%$pesq%")
                ->orWhere("cep", "like", "%$pesq%")
                ->orWhere("logradouro", "like", "%$pesq%")
                ->orWhere("complemento", "like", "%$pesq%")
                ->orWhere("localidade", "like", "%$pesq%")
                ->orWhere("uf", "like", "%$pesq%")
                ->orWhere("bairro", "like", "%$pesq%")
                ->paginate(10);
        }else{
            return Contato::paginate(10);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ContatoStoreRequest $request)
    {
        $data = $request->all();
        return Contato::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contato::find((int)$id);
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
    }
}
