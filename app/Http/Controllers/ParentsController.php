<?php

namespace App\Http\Controllers;

use App\Parente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentsController extends Controller
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
            $datas = DB::table('parents')->where('libelle', 'like', '%'. $search . '%')->paginate(10);
            //dd($datas->toSql(),$datas->getBindings());
        } 
        else {
            $datas = DB::table('parents')->paginate(10);

        }   
        return view('Administrations.parents.index')->with('datas', $datas )->with('search', $search );

      // $datas = Parente::paginate(10);
        //return view('Administrations.Parents.index')->with('datas',$datas);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrations.Parents.create');
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

            'nom'=> 'required',
            'prenom'=> 'required',
            'cin'=> 'required',
            'adresse'=> 'required',
            'sexe'=> 'required',
            'tel'=> 'required',
            'email'=> 'required',
            

            ]);

        $input = $request->all();
        $data = Parente::create($input);
        $data->save();
        return redirect(route('parents.index'))->with('success', 'Item added succesfully' );
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
        return redirect(route('parents.index'));

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
        $data = Parente::find($id);

        if (empty($data)) {
            return redirect(route('parents.index'));
        }

        return view('Administrations.parents.edit')->with('data', $data);
    }
        //
    

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

            'nom'=> 'required',
            'prenom'=> 'required',
            'cin'=> 'required',
            'adresse'=> 'required',
            'sexe'=> 'required',
            'tel'=> 'required',
            'email'=> 'required',
            

            ]);
        $data = Parente::find($id);

        if (empty($data)) {
            return redirect(route('parents.index'));
        }

        $data = Parente::where('id', $id)->update(request()->except(['_token', '_method']));

        return redirect(route('parents.index'));
        //
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
        $data = Parente::find($id);

        if (empty($data)) {
            return redirect(route('parents.index'));
        }

        $data->delete();

        return redirect(route('parents.index'));
        //
        //
    }
}
