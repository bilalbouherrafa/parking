@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Modification du rang </div>

                <div class="panel-body">
                    
			Insérer le nouveau rang :
			<br></br>
			<form class="form-horizontal" method="POST" action="{{ route('modifRang', $user->id) }}">
				{{ csrf_field() }}
				<input type="hidden" name="method" value="PUT">
				<center>
				
		                    <label for="rang" class="col-md-4 control-label">Rang :</label>

		                    <div class="col-md-6">
		                        <input id="rang" type="integer" class="form-control" name="rang" size="1" required>
		                    </div>
				</center>
				<br></br>
		                <center>Attention, Si vous entrez le rang 0, l'utilisateur ne sera plus sur la file d'attente.</center>
				
				<br></br>
				<center>
				
				<button type="submit" class="btn btn-primary" value="Submit Button">
		                       Modifier
		                </button>
				</center>
			</form>	
				<center>
				<br></br>
				{{ $message }}
				</center>
		
			

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
