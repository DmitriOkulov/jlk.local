<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cryolipoliz;

class CryolipolizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cryolipolizes = Cryolipoliz::paginate('30');
        return view('cryolipoliz.index', compact('cryolipolizes'));
    }

    public function create()
    {
        return view('cryolipoliz.create');
    }

    public function store(Request $request)
    {
        $cryolipoliz = new Cryolipoliz($request->toArray());
        $cryolipoliz->save();

        return redirect()->route('cryolipoliz.show', $cryolipoliz);
    }

    public function edit(Cryolipoliz $cryolipoliz)
    {
        $visitors = Visitor::all();
        return view('cryolipoliz.edit', $cryolipoliz, compact('cryolipoliz', 'visitors'));
    }

    public function update(Request $request, Cryolipoliz $cryolipoliz)
    {
        if(Auth::user()->isAdmin()) {
            $cryolipoliz->update($request->only(['date', 'zone', 'id_user', 'id_visitor']));
        }
        return redirect()->route('cryolipoliz.show', $cryolipoliz)->with('status', 'Информация изменена');
    }

    public function show(Cryolipoliz $cryolipoliz)
    {
        $visitor = Visitor::where('id', $cryolipoliz->id_visitor)->first();
        return view('cryolipoliz.show', compact('visitor', 'cryolipoliz'));
    }


    public function destroy(Cryolipoliz $cryolipoliz)
    {   
        $id = $cryolipoliz->id_visitor;
        if(Auth::user()->isAdmin()) {
            $cryolipoliz->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}