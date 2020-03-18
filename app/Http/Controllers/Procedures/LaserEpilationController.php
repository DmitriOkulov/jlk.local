<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Weight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LaserEpilation;

class LaserEpilationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laserEpilations = LaserEpilation::all();
        return view('laserepilation.index', compact('laserEpilations'));
    }

    public function create()
    {
        $visitors = Visitor::all();
        return view('laserepilation.create', compact('visitors'));
    }

    public function store(Request $request)
    {
        $laserEpilation = new LaserEpilation($request->toArray());
        $laserEpilation->save();

        return redirect()->route('laserepilation.show', $laserEpilation->id_visitor);
    }

    public function edit(LaserEpilation $laserEpilation)
    {
        $visitors = Visitor::all();
        return view('visitors.edit', compact('laserEpilation', 'visitors'));
    }

    public function update(Request $request, LaserEpilation $laserEpilation)
    {
        if(Auth::user()->isAdmin()) {
            $laserEpilation->update($request->only(['date', 'percent', 'comment', 'id_user', 'id_visitor', 'zone', 'ms', 'gc']));
        }
        return redirect()->route('laserepilation.show', $laserEpilation)->with('status', 'Информация изменена');
    }

    public function show(LaserEpilation $laserEpilation)
    {
        $visitor = Visitor::where('id', $laserEpilation->id_visitor)->first();
        return view('laserepilation.show', compact('visitor', 'laserEpilation'));
    }


    public function destroy(LaserEpilation $laserEpilation)
    {   
        $id = $laserEpilation->id_visitor;
        if(Auth::user()->isAdmin()) {
            $laserEpilation->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}