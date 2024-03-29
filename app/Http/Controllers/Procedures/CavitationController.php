<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RF;
use App\Models\Cavitation;

class CavitationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cavitations = Cavitation::paginate('30');
        return view('cavitation.index', compact('cavitations'));
    }

    public function create()
    {
        return view('cavitation.create');
    }

    public function store(Request $request)
    {
        $cavitation = new Cavitation($request->toArray());
        $cavitation->save();

        return redirect()->route('cavitation.show', $cavitation);
    }

    public function edit(Cavitation $cavitation)
    {
        return view('cavitation.edit', $cavitation, compact('cavitation'));
    }

    public function update(Request $request, Cavitation $cavitation)
    {
        $cavitation->update($request->only(['comment']));
        if(Auth::user()->isAdmin()) {
            $cavitation->update($request->only(['date', 'stomach', 'ass', 'hips', 'id_user', 'id_visitor']));
        }
        return redirect()->route('cavitation.show', $cavitation)->with('status', 'Информация изменена');
    }

    public function show(Cavitation $cavitation)
    {
        $visitor = Visitor::where('id', $cavitation->id_visitor)->first();
        $user = User::find($cavitation->id_user);
        if($user) {
            $cavitation->userName = $user->name;
        } else {
            $cavitation->userName = 'Сотрудник удалён';
        }

        return view('cavitation.show', compact('visitor', 'cavitation'));
    }


    public function destroy(Cavitation $cavitation)
    {
        $id = $cavitation->id_visitor;
        if(Auth::user()->isAdmin()) {
            $cavitation->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}
