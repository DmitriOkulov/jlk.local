<?php

namespace App\Http\Controllers\Visitors;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Weight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = Visitor::orderBy('id', 'asc');
        $visitors = $query->get();

        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        return view('visitors.create');
    }

    public function store(Request $request)
    {
        $visitor = new Visitor($request->toArray());

        $visitor->save();

        return redirect()->route('visitors.show', $visitor);
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        if(Auth::user()->isAdmin()) {
            $visitor->update($request->only(['surname', 'name', 'patronymic', 'birthday', 'skin_color', 'hair_color', 'gormons', 'contraindication', 'phone']));
        }
        return redirect()->route('visitors.show', $visitor)->with('status', 'Информация изменена');
    }

    public function show(Visitor $visitor)
    {
        $weights = Weight::where('id_visitor', $visitor->id)->get();
        return view('visitors.show', compact('visitor', 'weights'));

    }


    public function destroy(Visitor $visitor)
    {   
        if(Auth::user()->isAdmin()) {
            $visitor->delete();
        }
        
        return redirect()->route('visitors.index');
    }

}