@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/home') }}">Menu</a> </div>

                <div class="panel-body">
		Editer la Liste d'attente :
		<br>
		</br>
			<table class="table">
			<tr> 
				<td> Rang </td>
				<td> eMail </td>
				<td> idUser </td>
				<td> </td>
				<td> </td>
			</tr>

			
			@foreach($users as $user)
			<tr> 
				<td>{{ $user->rang }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->id }}</td>
				<td><a href="{{ route('premodifRang', $user->id) }}"><u> Modifier Rang </u></a></td>
				@if($user->rang == 1)
					<td><a href="{{ route('prefileattribuerPlaces', $user->id) }}"><u> Attribuer une Place </u></a></td>
				@else
					<td></td>
				@endif
			</tr> 
			@endforeach
				
		        
		</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
