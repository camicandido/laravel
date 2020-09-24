<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoProduto;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resourceArray = TipoProduto::all();
        return view('tipoproduto.index')->with('resources', $resourceArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tipoproduto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoProduto = new TipoProduto();
        //objeto->atributoDoBanco = requisição->'campo name que veio pelo post';
        $tipoProduto->descricao = $request->descricao;
        // Salva os dados no banco
        $tipoProduto->save();
        //depois que salvar, retorna uma view
        return redirect()->route('tipoproduto.index');;
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
        $resourceArray = TipoProduto::find($id);
        return view('tipoproduto.edit')->with('tipoproduto', $resourceArray);
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
        $tipoproduto = TipoProduto::find($id);
        $tipoproduto->descricao = $request->descricao;
        $tipoproduto->update();
        return redirect()->route('tipoproduto.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoproduto = TipoProduto::find($id);
        if(isset($tipoproduto))
        {
            $tipoproduto->delete();
        }
        return redirect()->route('tipoproduto.index');
    }}
