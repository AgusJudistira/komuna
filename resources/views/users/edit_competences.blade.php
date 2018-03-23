@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="form-group">
				<div class="card">
					<div class="card-header">  
						<h4>Creeer een competentie</h4>                      
					</div>
					<form class="form-group" method="POST" action="{{route('users.update_competences', $user)}}">
						{{csrf_field()}}
						
						<div class="form-group">
							<select class="form-control" multiple>
								@foreach ($competences as $competence)
								<option name='competence' value='{{ $competence->id }}' >{{ $competence->competence }}</option>
								@endforeach
							</select>
						</div>
						<!-- <button type="submit" class="btn btn-default">Voeg toe</button> -->
						<div class="form-group">
							@if(count($errors))
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error) 
									<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
							@endif
						</div >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection





