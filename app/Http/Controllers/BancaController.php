<?php

namespace App\Http\Controllers;

use App\Models\banca;
use App\Http\Requests\StorebancaRequest;
use App\Http\Requests\UpdatebancaRequest;

class BancaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $tccs = \App\Models\Tcc::all();
        return view('bancas.create', compact('tccs'));
    }

    public function store(StorebancaRequest $request)
    {
        \App\Models\Banca::create($request->all());
        return redirect()->route('tccs.index');
    }

    public function show(banca $banca)
    {
        //
    }

    public function edit(banca $banca)
    {
        //
    }

    public function update(UpdatebancaRequest $request, banca $banca)
    {
        //
    }
    public function destroy(banca $banca)
    {
        //
    }
}
