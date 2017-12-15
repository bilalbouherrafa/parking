@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Redéfinition de mot de passe  </div>

                <div class="panel-body">
                    
			Insérer le nouveau mot de passe :
			
			<form class="form-horizontal" method="POST" action="{{ route('editmembresMdp', $user->id) }}">
				{{ csrf_field() }}
				<input type="hidden" name="method" value="PUT">

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                    <label for="password" class="col-md-4 control-label">Password</label>

		                    <div class="col-md-6">
		                        <input id="password" type="password" class="form-control" name="password" required>

		                        @if ($errors->has('password'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('password') }}</strong>
		                            </span>
		                        @endif

		                    </div>
		                </div>

				<button type="submit" class="btn btn-primary" value="Submit Button">
		                       Modifier
		                </button>

			</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
