<?php

namespace App\Http\Controllers\Visitors;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Contraindication;
use App\Models\LaserEpilation;
use App\Models\Miostimulation;
use App\Models\Massage;
use App\Models\Weight;
use App\Http\Controllers\Controller;
use App\Models\Cryolipoliz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cavitation;
use App\Models\RF;

class VisitorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $visitors = Visitor::where('surname', 'LIKE', '%' . $request->search . '%')->orWhere('name', 'LIKE', '%' . $request->search . '%')->orWhere('patronymic', 'LIKE', '%' . $request->search . '%')->orWhere('phone', 'LIKE', '%' . $request->search . '%')->paginate(50);
        } else {
            $visitors = Visitor::orderBy('id', 'asc')->paginate(50);
        }
        

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
        $massage = Massage::where('id_visitor', $visitor->id)->get();
        $miostimulation = Miostimulation::where('id_visitor', $visitor->id)->get();
        $laserepilation = LaserEpilation::where('id_visitor', $visitor->id)->get();
        $contraindication = Contraindication::where('id_visitor', $visitor->id)->get();
        $cryolipoliz = Cryolipoliz::where('id_visitor', $visitor->id)->get();
        $cavitation = Cavitation::where('id_visitor', $visitor->id)->get();
        $rf = RF::where('id_visitor', $visitor->id)->get();
        return view('visitors.show', compact('visitor', 'weights', 'massage', 'miostimulation', 'laserepilation', 'contraindication', 'cryolipoliz', 'cavitation', 'rf'));

    }


    public function destroy(Visitor $visitor)
    {   
        if(Auth::user()->isAdmin()) {
            $visitor->delete();
        }
        
        return redirect()->route('visitors.index');
    }

}