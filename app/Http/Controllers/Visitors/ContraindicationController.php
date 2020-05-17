<?php

namespace App\Http\Controllers\Visitors;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Contraindication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContraindicationController extends Controller
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
        return view('contraindication.create', compact('visitor'));
    }

    public function store(Request $request)
    {
        $contraindication = new Contraindication($request->toArray());

        

        $contraindication->save();

        return redirect()->route('visitor.show', $contraindication->id_visitor);
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


    public function destroy(Contraindication $weight)
    {   
        $id = $weight->id_visitor;
        if(Auth::user()->isAdmin()) {
            $weight->delete();
        }
        
        return redirect()->route('visitors.show', $id);
    }

}