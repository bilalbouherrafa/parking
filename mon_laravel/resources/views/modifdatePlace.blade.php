@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Redéfinition de mot de passe  </div>

                <div class="panel-body">
                    
			Insérer les nouvelles dates :
			<br></br>
			<form class="form-horizontal" method="POST" action="{{ route('modifDatePlace', $place->idPlace) }}">
				{{ csrf_field() }}
				<input type="hidden" name="method" value="PUT">

				<div class="form-group{{ $errors->has('datef') ? ' has-error' : '' }}">
				    <label for="datef" class="col-md-4 control-label">Date de fin :</label>

		                    <div class="col-md-6">
		                        <input id="datef" type="date"  name="datef" size="5" required>
		                    </div>
		                </div>

				<br> </br>
				<center>
				<button type="submit" class="btn btn-primary" value="Submit Button">
		                       Modifier
		                </button>
				</center>
			</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
