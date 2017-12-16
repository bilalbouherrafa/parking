@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/home') }}">Menu</a> </div>

                <div class="panel-body">
		Historique des reservations :
		<br>
		</br>
			<table class="table">
			<tr> 
				<td> idUser </td>
				<td> numPlace </td>
				<td> Début Reservation </td>
				<td> Fin Reservation </td>
			</tr>

			
			@foreach($reservations as $reservation)
			<tr> 
				<td>{{ $reservation->idUser }}</td>
				<td>{{ $reservation->idPlace }}</td>
				<td>{{ $reservation->DebutPeriode}}</td>
				<td>{{ $reservation->finPeriode }}</td>
				
				
			</tr> 
			@endforeach
		
		</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
