<?php

namespace App\Http\Controllers;

use App\Models\tcc;
use App\Http\Requests\StoretccRequest;
use App\Http\Requests\UpdatetccRequest;

class TccController extends Controller
{
    public function index()
    {
        $tccs = \App\Models\Tcc::all();
        return view('tccs.index', compact('tccs'));
    }

    public function create()
    {
        return view('tccs.create');
    }

    public function store(StoretccRequest $request)
    {
        $dados = $request->all();
        if($request->hasFile('arquivo_pdf') && $request->file('arquivo_pdf')->isValid()){
            $cda = $request->file('arquivo_pdf')->store('tccs', 'public');
            $dados['arquivo_pdf'] = $cda;
        } 
        \App\Models\Tcc::create($dados);
        
        return redirect()->route('tccs.index');
    }

    public function show(tcc $tcc)
    {
        return view('tccs.show', compact('tcc'));
    }

    public function edit(tcc $tcc)
    {
        //
    }
    public function update(UpdatetccRequest $request, tcc $tcc)
    {
        //
    }

    public function destroy(tcc $tcc)
    {
        $tcc->delete();
        return redirect()->route('tccs.index');
    }
}
