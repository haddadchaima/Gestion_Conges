@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Gestion Congés des Employés Wijaa Technologies</h3>
            </div></br>
            <div class="pull-right">
                <a class="btn btn-success" href=""> Retour</a>
                <a class="btn btn-info" href=""> Ajouter Employé</a>
            </div></br>

        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>-</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Etat de Congé</th>


        </tr>
        <input type="hidden" value="{{ $i= 0 }}">
        @foreach ($conges as $congesEmploye)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $congesEmploye->employes->first_name }}</td>
            <td>{{ $congesEmploye->employes->last_name }}</td>
            @if($congesEmploye->status == "approuvé")
            <td  class="text-primary">{{ $congesEmploye->status }}</td>
            @elseif($congesEmploye->status == "refusé")
            <td  class="text-danger">{{ $congesEmploye->status }}</td>
            @elseif($congesEmploye->status == "demande en attente")
            <td  class="text-success">{{ $congesEmploye->status }}</td>
            @endif


        </tr>
        @endforeach
    </table>

@endsection
