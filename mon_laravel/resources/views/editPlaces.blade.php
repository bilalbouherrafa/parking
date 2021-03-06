@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/home') }}">Menu</a> </div>

                <div class="panel-body">
		<center> <p font-size="111 px"><b> Editer des places : </b></p> </center>
		
			<table class="table">
				<tr> 
					<td> idPlace</td>
					<td> numPlace </td>
					<td> Etat </td>
					<td> </td>
					<td> </td>
					
				</tr>

			
			@foreach($places as $place)
			<tr> 
				<td>{{ $place->idPlace }}</td>
				<td>{{ $place->numPlace }}</td>
				
				@if($place->etat)
					@php
					$statut = 'Reservée'
					@endphp
				@else
					@php
					$statut = 'Libre'
					@endphp
				@endif

				<td>{{ $statut }}</td>
				<td> <a href="{{ route('supprimerPlaces', $place->idPlace) }}"><u> Supprimer </u></a> </td>
				@if($statut == 'Reservée')
				<td> <a href="{{ route('premodifDatePlaces', $place->idPlace) }}"><u> Modifier Date </u></a> </td>
				<td> {{ $join }}
				@else
				<td> <a href="{{ route('preattribuerPlaces', $place->idPlace) }}"><u> Attribuer </u></a> </td></td>
				
				@endif

			</tr> 
			@endforeach
			</table>
			<center>
			<form class="form-horizontal" method="POST" action="{{ route('creerPlaces') }}">
				{{ csrf_field() }}
				

				
					<label for="password" >Entrez le nombre de places a créer </label>

					
					<input id="nbp" type="integer" name="nbp" size="1px">
					
				
			
				<button type="submit" class="btn btn-primary" value="Submit Button">
		                       Creer places.
		                </button>
			</center>
			</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
