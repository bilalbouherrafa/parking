@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		@php
			$prenom = Auth::user()->prenom;
		@endphp
                <div class="panel-heading"> Bienvenue sur votre espace utilisateur {{ $prenom }} !</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                  	<UL TYPE="circle">
				<LI><a class="btn btn-link" href="/ReserverPlace">Reserver une place</a>
				@if($existReserv != NULL)
				<LI><a class="btn btn-link" href="/AfficherPlace">Votre place</a>
				@endif
				@if($existRang != 'faux')
				<LI><a class="btn btn-link" href="/AfficherRang">Votre Rang</a>
				@endif
				<LI><a class="btn btn-link" href="/AfficherHistorique">Votre Historique</a>
			</UL>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
