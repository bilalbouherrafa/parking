@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Bienvenue sur l'espace administrateur !</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté !
                </div>

		<div class="panel-body">
                  	<UL TYPE="circle">
				<LI><a class="btn btn-link" href="/EditMembres">Editer les membres</a>
				<br/><LI><a class="btn btn-link" href="/EditPlaces">Editer des Places</a>
				<br/><LI><a class="btn btn-link" href="/EditListe">Liste d'attente</a>
				<br/><LI><a class="btn btn-link" href="/Historique">Historique</a>
			</UL>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
