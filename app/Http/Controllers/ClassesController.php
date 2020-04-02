<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Salle;
use App\niveaux;
use Illuminate\Http\Request;

class ClassesController extends Controller
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
            $datas =Classe::where('libelle', 'like', '%'. $search . '%')->paginate(10);
            //dd($datas->toSql(),$datas->getBindings());
        } 
        else {
            $datas = Classe::paginate(10);

        }   
        return view('Administrations.Classes.index')->with('datas', $datas )->with('search', $search );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaux = niveaux::all();
        return view('Administrations.Classes.create')->with('niveaux',$niveaux);
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
        $input = $request->all();
        $data = Classe::create($input);
        return redirect(route('classes.index'));
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
        return redirect(route('classes.index'));
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
        $data = Classe::find($id);

        if (empty($data)) {
            return redirect(route('classes.index'));
        }

        return view('Administrations.Classes.edit')->with('data', $data);
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
        $data = Classe::find($id);

        if (empty($data)) {
            return redirect(route('classes.index'));
        }

        $data = Classe::where('id', $id)->update(request()->except(['_token', '_method']));

        return redirect(route('classes.index'));

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
        $data = Classe::find($id);

       if (empty($data)) {
           return redirect(route('classes.index'));
        }

        $data->delete();

        return redirect(route('classes.index'));
        //
    }
}
