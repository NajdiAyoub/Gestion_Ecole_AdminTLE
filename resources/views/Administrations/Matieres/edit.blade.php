
@extends('layouts.master')
@section('title')

@endsection

@section('css')

@endsection
@section('content')
{{ Breadcrumbs::render('admin.parametre.matieres.edit',$data->id) }}


<!-- start edit Modal -->



            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="font-style:italic; color: #007bff; ">{{__('text.Matieres.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>


            </div>
            <form action="{{ route('matieres.update', [$data->id]) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label>{{__('text.libelle.lbl')}}</label>
                        <input type="text" name="libelle" id="libelle" value="{{ $data->libelle}}" class="form-control">
                    </div>
                    <label>{{__('text.Niveaux.lbl')}}</label></br>
                    <select style="border: 2px solid lightgray; width: 1068px;HEIGHT: 40px;" name="niveaux_id">
                        <option ></option>
                        @foreach ($niveaux as $item)
                    <option value="{{$item->id}}"  @if ($data->niveaux_id==$item->id) selected 
                        
                        
              @endif>{{$item->libelle}}</option>
                        @endforeach
                    </select></br>
                  </div>
                    <button style="margin-left:16px;" type="submit"  class="btn btn-primary">{{__('text.Editer.btn')}}</button>
                    <input type="button" class="btn btn-primary" value="{{__('text.revenir.btn')}}" onclick="history.back()">


                </div>
        </form>


<!-- End add Modal -->
@endsection
@section('js')

@endsection
