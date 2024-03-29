<?php

namespace App\Http\Controllers\Procedures;

use App\Models\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Massage;

class MassageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $massage = Massage::all();
        return view('massage.index', compact('massage'));
    }

    public function create()
    {
        return view('massage.create');
    }

    public function store(Request $request)
    {
        $massage = new Massage($request->toArray());
        $massage->save();

        return redirect()->route('massage.show', $massage);
    }

    public function edit(Massage $massage)
    {
        return view('massage.edit', compact('massage'));
    }

    public function update(Request $request, Massage $massage)
    {
        $massage->update($request->only(['comment']));
        if(Auth::user()->isAdmin()) {
            $massage->update($request->only(['date', 'power', 'length', 'id_visitor']));
        }
        return redirect()->route('massage.show', $massage)->with('status', 'Информация изменена');
    }

    public function show(Massage $massage)
    {
        $visitor = Visitor::where('id', $massage->id_visitor)->first();
        $user = User::find($massage->id_user);
        if($user) {
            $massage->userName = $user->name;
        } else {
            $massage->userName = 'Сотрудник удалён';
        }
        return view('massage.show', compact('visitor', 'massage'));
    }


    public function destroy(Massage $massage)
    {
        $id = $massage->id_visitor;
        if(Auth::user()->isAdmin()) {
            $massage->delete();
        }
        return redirect()->route('visitors.show', $id);
    }

}
