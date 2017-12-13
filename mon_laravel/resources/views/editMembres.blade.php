@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/home') }}">Menu</a> </div>

                <div class="panel-body">
		Liste des membres :
		<br>
		</br>
		<table class="table">
			<tr> 
				<td> Nom</td>
				<td> Prenom </td>
				<td> Telephone </td>
				<td> Email </td>
				<td> Rang </td>
			
			</tr>

			
			@foreach($users as $user)
			<tr> 
				<td>{{ $user->nom }}</td>
				<td>{{ $user->prenom }}</td>
				<td>0{{ $user->tel }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->rang }}</td>
				<td><a href="{{ route('editmembres', $user->id) }}"><u> Supprimer </u></a></td>

			</tr> 
			@endforeach
				
		        
		</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
