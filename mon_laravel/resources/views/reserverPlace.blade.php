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

			

		<form class="form-horizontal" method="POST" action="{{ route('reserverPlace') }}">
				{{ csrf_field() }}
				<input type="hidden" name="method" value="PUT">     
				<center>
				@if($message == '')
					<button type="submit" class="btn btn-primary" value="Submit Button">
				               Reserver
				        </button>
				
				@else
					{{ $message }}<br></br>
					Votre numéro est : {{ $numPlace }}
					<br></br>
					<a href="/home"> Retour à la page d'accueil </a>
				@endif
				</center>
			</form>
		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
