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

    public function update(Request $request, Weight $weight)
    {
        $weight->update($request->only(['comment']));
        if(Auth::user()->isAdmin()) {
            $weight->update($request->only(['date', 'weight', 'left_triceps', 'right_triceps', 'waist', 'sides', 'ass', 'left_hip', 'right_hip', 'left_calf', 'right_calf']));
        }
        return redirect()->route('weights.show', $weight)->with('status', 'Информация изменена');
    }

    public function show(Weight $weight)
    {
        $visitor = Visitor::where('id', $weight->id_visitor)->first();
        $user = User::find($weight->id_user);
        if($user) {
            $weight->userName = $user->name;
        } else {
            $weight->userName = 'Сотрудник удалён';
        }
        return view('weights.show', compact('visitor', 'weight'));
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
