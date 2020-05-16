<?php

namespace App\Http\Controllers\Visitors;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Weight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {
        $visitor = Visitor::where('id', $_GET['visitor'])->first();
        return view('weights.create', compact('visitor'));
    }

    public function store(Request $request)
    {
        $weight = new Weight($request->toArray());

        

        $weight->save();

        return redirect()->route('visitors.show', $weight->id_visitor);
    }

    public function edit(Visitor $visitor)
    {

    }

    public function update(Request $request, Visitor $visitor)
    {

    }

    public function show(Visitor $visitor)
    {

    }


    public function destroy(Weight $weight)
    {   
        $id = $weight->id_visitor;
        if(Auth::user()->isAdmin()) {
            $weight->delete();
        }
        
        return redirect()->route('visitors.show', $id);
    }

}