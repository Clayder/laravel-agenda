<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $pesq = trim($request->input("q"));
        $pesqNome = trim($request->input("pesquisaNome"));
        $pesqEmail = trim($request->input("pesquisaEmail"));

        if ($pesq) {
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
        } elseif ($pesqNome && $pesqEmail) {
            return Contato::where("nome", "LIKE", "%$pesqNome%")
                ->where("email", "like", "%$pesqEmail%")
                ->paginate(10);
        } else {
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
        return view("create");
    }

    /**
     * @param \App\Http\Requests\ContatoStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\App\Http\Requests\ContatoRequest $request)
    {
        try {
            $data = $request->all();
            Contato::create($data);
            $request->session()->flash("msg", "Contato cadastrado com sucesso.");
        } catch (ModelNotFoundException $e) {
            $request->session()->flash("msgError", "Erro ao cadastrar o contato");
            Log::error($e->getMessage());
        }catch (Exception $e) {
            $request->session()->flash("msgError", "Erro ao cadastrar o contato");
            Log::error($e->getMessage());
        }
        return redirect('/contato/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contato::find((int)$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::find((int)$id);
        return view("edit")->with('contato', $contato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ContatoRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
