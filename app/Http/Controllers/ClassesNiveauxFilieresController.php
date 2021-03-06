<?php

namespace App\Http\Controllers;

use App\AnneeScolaire;
use App\Classe;
use App\ClasseNiveauFiliere;
use App\Filiere;
use App\Matiere;
use App\niveaux;
use App\Prof;
use App\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesNiveauxFilieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $search='';
        if(isset($request) && null !==$request->get('search')) {
            $search = $request->get('search');
            //dd($search);
            $datas = DB::table('v_classesniveauxfilieres')->where('classes', 'like', '%'. $search . '%')->Orwhere('profs', 'like', '%'. $search . '%')->Orwhere('matieres', 'like', '%'. $search . '%')->Orwhere('filieres', 'like', '%'. $search . '%')->Orwhere('semestres', 'like', '%'. $search . '%')->Orwhere('anneesscolaire', 'like', '%'. $search . '%')->paginate(10);
            //dd($datas->toSql(),$datas->getBindings());
        } 
        else {
            $datas = DB::table('v_classesniveauxfilieres')->paginate(10);

        }   
        return view('Administrations.Affectations.ClassesNiveauxFilieres.index')->with('datas', $datas )->with('search', $search );
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $classes = Classe::all();
        $matieres = Matiere::all();
        $niveaux = niveaux::all();
        $semestres = Semestre::all();
        $anneesscolaire = AnneeScolaire::all();
        $filieres= Filiere::all();
        $profs = Prof::all();
        
        return view('Administrations.affectations.classesniveauxfilieres.create')->with('Classe',$classes)->with('Matiere',$matieres)->with('Semestre',$semestres)->with('profs',$profs)->with('filieres',$filieres)->with('anneesscolaire',$anneesscolaire)->with('niveaux',$niveaux);


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'semestres_id'=> 'required',
            'niveaux_id'=> 'required',
            'profs_id'=> 'required',
            'matieres_id'=> 'required',
            'classes_id'=> 'required',
            'anneesscolaire_id'=> 'required',
            'semestres_id'=> 'required',

            ]);
        $input = $request->all();
        $data = ClasseNiveauFiliere::create($input);
        return redirect(route('classesniveauxfilieres.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('classesniveauxfilieres.index'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ClasseNiveauFiliere::find($id);

        if (empty($data)) {
            return redirect(route('classesniveauxfilieres.index'));
        }


        $classes = Classe::all();
        $matieres = Matiere::all();
        $niveaux = niveaux::all();
        $semestres = Semestre::all();
        $anneesscolaire = AnneeScolaire::all();
        $filieres= Filiere::all();
        $profs = Prof::all();
        return view('Administrations.Affectations.ClassesNiveauxFilieres.edit')->with('data', $data)->with('profs', $profs)->with('classes', $classes)->with('matieres', $matieres)->with('filieres', $filieres)->with('semestres', $semestres)->with('anneesscolaire', $anneesscolaire);
        //
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $request->validate([

            'semestres_id'=> 'required',
            'niveaux_id'=> 'required',
            'profs_id'=> 'required',
            'matieres_id'=> 'required',
            'classes_id'=> 'required',
            'anneesscolaire_id'=> 'required',

            ]);
        $data = ClasseNiveauFiliere::find($id);

        if (empty($data)) {
            return redirect(route('classesniveauxfilieres.index'));
        }

        $data = ClasseNiveauFiliere::where('id', $id)->update(request()->except(['_token', '_method']));

        return redirect(route('classesniveauxfilieres.index'));

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ClasseNiveauFiliere::find($id);

        if (empty($data)) {
            return redirect(route('classesniveauxfilieres.index'));
        }

        $data->delete();

        return redirect(route('classesniveauxfilieres.index'));
        //
    }
}
