<?php

namespace App\Http\Controllers;

use App\AbsenceProf;
use App\Prof;
use Illuminate\Http\Request;

class AbsencesProfsController extends Controller
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
            $datas =AbsenceProf::where('nom', 'like', '%'. $search . '%')->paginate(10);
            //dd($datas->toSql(),$datas->getBindings());
        } 
        else {
            $datas = AbsenceProf::paginate(10);

        }   
        return view('Administrations.Profs.AbsencesProfs.index')->with('datas', $datas )->with('search', $search );
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profs = Prof::all();
        return view('Administrations.Profs.AbsencesProfs.create')->with('profs',$profs);

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
        $data = AbsenceProf::create($input);
        return redirect(route('absencesprofs.index'))->with('success', 'Item added succesfully' );
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
        return redirect(route('absencesprofs.index'));

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
        $data = AbsenceProf::find($id);

        if (empty($data)) {
            return redirect(route('absencesprofs.index'));
        }
  
        return view('Administrations.Profs.AbsencesProfs.edit')->with('data', $data);
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
        $data = AbsenceProf::find($id);

        if (empty($data)) {
            return redirect(route('absencesprofs.index'));
        }
  
        $data = AbsenceProf::where('id', $id)->update(request()->except(['_token', '_method']));
  
        return redirect(route('absencesprofs.index'));
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
        $data = AbsenceProf::find($id);

        if (empty($data)) {
            return redirect(route('absencesprofs.index'));
        }

        $data->delete();

        return redirect(route('absencesprofs.index'));
        //
    }
}
