@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Gestion Congés des Employés Wijaa Technologies</h3>
            </div></br>
            <div class="pull-right">
                <a class="btn btn-info" href=""> Voir Employés</a>
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
            <th>Action</th>
        </tr>
        <input type="hidden" value="{{ $i= 0 }}">
        @foreach ($conges as $congesEmploye)
        <tr>
            <td>{{ $congesEmploye->employes->id}}</td>
            <td>{{ $congesEmploye->employes->first_name }}</td>
            <td>{{ $congesEmploye->employes->last_name }}</td>
            <td>{{ $congesEmploye->status }}</td>
            <td><form action="" method="">
            <a name="all-conges" class="btn btn-info" href="{{route('employes_conges', ['userid'=> $congesEmploye->id,'id'=> $congesEmploye->employe_id] )}}">Voir Congés</a>
            <a  class="btn btn-primary" href="{{ route('employes_conges_action', ['id'=> $congesEmploye->employe_id, 'action'=>'approuvé' ]) }}">Approuver</a>
            <a  class="btn btn-danger" href="{{ route('employes_conges_action', ['id'=> $congesEmploye->employe_id, 'action'=>'refusé']) }}">Refuser</a>
            @csrf

            </form></td>
        </tr>
        @endforeach
    </table>

@endsection
