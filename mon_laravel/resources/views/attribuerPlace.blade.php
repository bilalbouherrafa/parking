@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Attribution d'une place </div>

                <div class="panel-body">
                    
			Insérer les paramètres :
			<br></br>
			<form class="form-horizontal" method="POST" action="{{ route('attribuerPlace', $place->idPlace) }}">
				{{ csrf_field() }}
				<input type="hidden" name="method" value="PUT">

				<div class="form-group{{ $errors->has('dated') ? ' has-error' : '' }}">
				    <label for="dated" class="col-md-4 control-label">Date de début :</label>

		                    <div class="col-md-6">
		                        <input id="dated" type="date"  name="dated" size="7" required>
		                    </div>
		                </div>

				<br> </br>
			
				<div class="form-group{{ $errors->has('datef') ? ' has-error' : '' }}">
				    <label for="datef" class="col-md-4 control-label">Date de fin :</label>

		                    <div class="col-md-6">
		                        <input id="datef" type="date"  name="datef" size="7" required>
		                    </div>
		                </div>
				
				<br></br>

				<div class="form-group{{ $errors->has('iduser') ? ' has-error' : '' }}">
				    <label for="iduser" class="col-md-4 control-label">ID de l'utilisateur :</label>
				@php
					$test = $firstrang
				@endphp
		                    <div class="col-md-6">
		                        <input id="iduser" type="integer"  name="iduser" size="1" value= "{{ $test }}" required>
		                    </div>
		                </div>

				<center>
				<button type="submit" class="btn btn-primary" value="Submit Button">
		                       Attribuer
		                </button>
				</center>
			</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
