<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RF;
use App\Models\Cavitation;

class RFController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rfs = RF::paginate('30');
        return view('rf.index', compact('rfs'));
    }

    public function create()
    {
        return view('rf.create');
    }

    public function store(Request $request)
    {
        $rf = new RF($request->toArray());
        $rf->save();

        return redirect()->route('rf.show', $rf);
    }

    public function edit(RF $rf)
    {
        return view('rf.edit', $rf, compact('rf'));
    }

    public function update(Request $request, RF $rf)
    {
        $rf->update($request->only(['comment']));
        if(Auth::user()->isAdmin()) {
            $rf->update($request->only(['date', 'stomach', 'ass', 'hips', 'id_user', 'id_visitor']));
        }
        return redirect()->route('rf.show', $rf)->with('status', 'Информация изменена');
    }

    public function show(RF $rf)
    {
        $visitor = Visitor::where('id', $rf->id_visitor)->first();
        $user = User::find($rf->id_user);
        if($user) {
            $rf->userName = $user->name;
        } else {
            $rf->userName = 'Сотрудник удалён';
        }
        return view('rf.show', compact('visitor', 'rf'));
    }


    public function destroy(RF $rf)
    {
        $id = $rf->id_visitor;
        if(Auth::user()->isAdmin()) {
            $rf->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}
