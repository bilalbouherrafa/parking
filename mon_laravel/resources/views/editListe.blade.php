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
				
			</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
