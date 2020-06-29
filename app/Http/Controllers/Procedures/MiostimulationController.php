<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Miostimulation;

class MiostimulationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $miostimulation = Miostimulation::all();
        return view('miostimulation.index', compact('miostimulation'));
    }

    public function create()
    {
        return view('miostimulation.create');
    }

    public function store(Request $request)
    {
        $miostimulation = new Miostimulation($request->toArray());
        $miostimulation->save();

        return redirect()->route('miostimulation.show', $miostimulation);
    }

    public function edit(Miostimulation $miostimulation)
    {
        return view('miostimulation.edit', compact('miostimulation'));
    }

    public function update(Request $request, Miostimulation $miostimulation)
    {
        if(Auth::user()->isAdmin()) {
            $miostimulation->update($request->only(['date', 'power', 'comment', 'id_visitor', 'zone', 'program', 'comment']));
        }
        return redirect()->route('miostimulation.show', $miostimulation)->with('status', 'Информация изменена');
    }

    public function show(Miostimulation $miostimulation)
    {
        $visitor = Visitor::where('id', $miostimulation->id_visitor)->first();
        $user = User::where('id', $miostimulation->id_user)->first();
        return view('miostimulation.show', compact('visitor', 'miostimulation', 'user'));
    }


    public function destroy(Miostimulation $miostimulation)
    {   
        $id = $miostimulation->id_visitor;
        if(Auth::user()->isAdmin()) {
            $miostimulation->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}