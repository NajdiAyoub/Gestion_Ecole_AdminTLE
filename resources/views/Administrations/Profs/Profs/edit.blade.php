
@extends('layouts.master')
@section('title')

@endsection

@section('css')

@endsection
@section('content')

<!-- start edit Modal -->
{{ Breadcrumbs::render('admin.prof.profs.edit',$data->id) }}


            <div class="modal-header">
                <h5 style= "font-style:italic ;color: #007bff;" class="modal-title" id="editModalLabel">{{__('text.Profs.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>


            </div>
            <form action="{{ route('profs.update',$data->id) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">

                     

                        <label>{{__('text.Nom.lbl')}}</label>
                        <input type="text" name="nom" id="nom" value="{{ $data->nom}}" class="form-control">

                        <label>{{__('text.Prenom.lbl')}}</label>
                        <input type="text" name="prenom" id="prenom" value="{{ $data->prenom}}" class="form-control">

                        <label>{{__('text.CIN.lbl')}}</label>
                        <input type="text" name="cin" id="cin" value="{{ $data->cin}}" class="form-control">

                        <label>{{__('text.Adresse.lbl')}}</label>
                        <input type="text" name="adresse" id="adresse" value="{{ $data->adresse}}" class="form-control">

                        <label>{{__('text.Date_Naissance.lbl')}}</label>
                        <input type="date" name="date_naissance" id="date_naissance" value="{{ $data->date_naissance}}" class="form-control">
                        
                        
                        <label>{{__('text.RIB.lbl')}}</label>
                        <input type="text" name="rib" id="rib" value="{{ $data->rib}}" class="form-control">

                        <label>{{__('text.Telephone.lbl')}}</label>
                        <input type="text" name="tel" id="tel" value="{{ $data->tel}}" class="form-control">
                        
                        <label>{{__('text.Type_Contrat.lbl')}}</label>
                        <input type="text" name="type_contrat" id="type_contrat" value="{{ $data->type_contrat}}" class="form-control">
                        
                        <label>{{__('text.Salaire.lbl')}}</label>
                        <input type="text" name="salaire" id="salaire" value="{{ $data->salaire}}" class="form-control">
                        
                        <label>{{__('text.Montant_Par_Heure.lbl')}}</label>
                        <input type="text" name="montant_par_Heure" id="montant_par_Heure" value="{{ $data->montant_par_Heure}}" class="form-control">
                        
                        


                    </div>
                    <button type="submit" class="btn btn-primary">{{__('text.Editer.btn')}}</button>
                    <input type="button" class="btn btn-primary" value={{__('text.revenir.btn')}} onclick="history.back()">


                </div>
        </form>


<!-- End add Modal -->
@endsection
@section('js')

@endsection
