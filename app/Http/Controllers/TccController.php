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
            $cda = $request->file('arquivo_pdf')->store('pdf', 'public');
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
        return view('tccs.edit', compact('tcc'));
    }
    public function update(UpdatetccRequest $request, tcc $tcc)
    {
        $dados = $request->all();
        if($request->hasFile('arquivo_pdf') && $request->file('arquivo_pdf')->isValid()){
            $cda = $request->file('arquivo_pdf')->store('tccs', 'public');
            $dados['arquivo_pdf'] = $cda;
        }else{
            unset($dados['arquivo_pdf']);
        }

        $dados = array_filter($dados, function($value){
            return !is_null($value) && $value !== '';
        });

        $tcc->update($dados);
        return redirect()->route('tccs.index');
    }

    public function destroy(tcc $tcc)
    {
        $tcc->delete();
        return redirect()->route('tccs.index');
    }
}
