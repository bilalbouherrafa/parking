@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Benvenue sur l'espace utilisateur !</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                  	<UL TYPE="circle">
				<LI><a class="btn btn-link" href="/ReserverPlace">Reserver une place</a>
			</UL>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
