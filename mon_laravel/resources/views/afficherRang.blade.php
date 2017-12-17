@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Reservation de place</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

				<center>
					{{ $message }}{{ $rang }} sur la file d'attente
					<br></br>
					<a href="/home"> Retour à la page d'accueil </a>
				
				</center>
			
		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
