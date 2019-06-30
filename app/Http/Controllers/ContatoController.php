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
     * ContatoController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

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
     * @param \App\Http\Requests\ContatoRequest $request
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $contato = Contato::findOrFail((int)$id);
            return view("edit")->with('contato', $contato);
        } catch (ModelNotFoundException $e) {
            $request->session()->flash("msgError", "Esse contato não existe.");
        }catch (Exception $e) {
            $request->session()->flash("msgError", "Erro ao buscar o contato.");
            Log::error($e->getMessage());
        }
        return redirect('/');
    }

    /**
     * @param \App\Http\Requests\ContatoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(\App\Http\Requests\ContatoRequest $request, $id)
    {
        $id = (int)$request->input("id");
        $msgError = "Erro ao editar contato.";
        try {
            $contato = Contato::findOrFail((int)$id);
            $data = $request->all();
            $contato->update($data);
            $request->session()->flash("msg", "Contato editado com sucesso.");
        } catch (ModelNotFoundException $e) {
            $request->session()->flash("msgError", $msgError);
            Log::error($e->getMessage());
        }catch (Exception $e) {
            $request->session()->flash("msgError", $msgError);
            Log::error($e->getMessage());
        }
        return redirect("/contato/{$id}/edit");
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $id = (int)$request->input("id");
        $msgError = "Erro ao excluir contato.";
        if($request->getMethod() === "DELETE" && $id){
            try {
                $contato = Contato::findOrFail((int)$id);
                $contato->delete();
                $request->session()->flash("msg", "Contato excluído com sucesso.");
            } catch (ModelNotFoundException $e) {
                $request->session()->flash("msgError", $msgError);
                Log::error($e->getMessage());
            }catch (Exception $e) {
                $request->session()->flash("msgError", $msgError);
                Log::error($e->getMessage());
            }
        }
        return redirect("/");
    }
}
