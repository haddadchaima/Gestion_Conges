@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Gestion Congés des Employés Wijaa Technologies</h3>
            </div>
            @if($status_employe->status == 'not_admin')
            <div class="pull-right">
                <a  class="btn btn-success " data-toggle="modal" data-target="#demoModal"> Soumettre Demande de Congés</a>
            </div><br>
            @endif
        </div>
        <!-- Modal Example Start-->
			<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-
            labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Soumettre Demande de Congé</h5>
								<button type="button" class="close" data-dismiss="modal" aria-
                                label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
                        <form method="POST" action="{{ action('CongesController@ajouterConge')}}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="texte">Date Début de Congé : </label>
                                <input id="texte" type="date" name="startdate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="texte">Date Fin de Congé : </label>
                                <input id="texte" type="date" name="enddate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="texte">Commentaire : </label>
                                <input id="texte" type="text" name="comments" class="form-control">
                            </div>
                        </form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-success">Enregistrer Demande de Congé</button>
						</div>
					</div>
				</div>
			</div>
	 <!-- Modal Example End-->
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
