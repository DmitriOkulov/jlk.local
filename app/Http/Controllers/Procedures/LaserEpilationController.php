<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
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
        $laserepilations = LaserEpilation::paginate('30');
        return view('laserepilation.index', compact('laserepilations'));
    }

    public function create()
    {
        return view('laserepilation.create');
    }

    public function store(Request $request)
    {
        $laserepilation = new LaserEpilation($request->toArray());
        $laserepilation->save();

        return redirect()->route('laserepilation.show', $laserepilation);
    }

    public function edit(LaserEpilation $laserepilation)
    {
        return view('laserepilation.edit', $laserepilation, compact('laserepilation'));
    }

    public function update(Request $request, LaserEpilation $laserepilation)
    {
        $laserepilation->update($request->only(['comment']));
        if(Auth::user()->isAdmin()) {
            $laserepilation->update($request->only(['date', 'percent', 'id_user', 'id_visitor', 'zone', 'ms', 'gc']));
        }
        return redirect()->route('laserepilation.show', $laserepilation)->with('status', 'Информация изменена');
    }

    public function show(LaserEpilation $laserepilation)
    {
        $visitor = Visitor::where('id', $laserepilation->id_visitor)->first();
        $user = User::find($laserepilation->id_user);
        if($user) {
            $laserepilation->userName = $user->name;
        } else {
            $laserepilation->userName = 'Сотрудник удалён';
        }
        return view('laserepilation.show', compact('visitor', 'laserepilation'));
    }


    public function destroy(LaserEpilation $laserepilation)
    {
        $id = $laserepilation->id_visitor;
        if(Auth::user()->isAdmin()) {
            $laserepilation->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}
