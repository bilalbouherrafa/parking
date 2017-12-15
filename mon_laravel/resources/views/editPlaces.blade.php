@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/home') }}">Menu</a> </div>

                <div class="panel-body">
		Editer des places :
		<br>
		</br>
			<table class="table">
				<tr> 
					<td> idPlace</td>
					<td> numPlace </td>
					<td> </td>
					<td> </td>
				</tr>

			
			@foreach($places as $place)
			<tr> 
				<td>{{ $place->idPlace }}</td>
				<td>{{ $place->numPlace }}</td>
				<td><a href="{{ route('supprimerPlaces', $place->idPlace) }}"><u> Supprimer </u></a></td>
				<td> </td>

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
