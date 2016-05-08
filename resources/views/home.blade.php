@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		  @if(Auth::user()->type==1)
			<div class="panel panel-default">
				<div class="panel-heading">Add Voter</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
						@if(isset($message))
					<div class="alert alert-danger">
				
					{{$message}}
				
					</div>
						@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('add/voters') }}" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						
					

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add Voters
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	@else
		<div class="col-md-3 well" style="height:460px;">
	<ul class="nav nav-pills nav-stacked">
	@if(count ($categories) > 0)
		@foreach($categories as $categories)
  <li><a href="{{ url('viewcat/') }}/{{$categories->id}}">{{$categories->name}}</a></li>
 @endforeach
 @endif
</ul>
</div>
<div class="col-md-9">
@if(count($candidates) > 0 )
	@foreach($candidates as $voted)
		<div class="col-md-4">
		<b><p class="text-center">{{$voted->candname}}</p></b><br>
        <img src="{{url ('upload/') }}/{{$voted->image}}" class="img-responsive img-thumbnail"></img><br><br>
		<a class="btn btn-primary btn-md center-block" href="{{ url('votecand/' )}}/{{$voted->candid}}/{{$voted->candcatid}}/{{Auth::user()->id}} "> Vote </a>
		</div>
		@endforeach
		{!! $candidates->render() !!}
		@else
			<p class="text-success text-center" style="font-size:40px; padding-top:30px;"><b>No Candidate In This Category</b> </p>
		@endif
		
		<div class="text-warning" style="font-size:20px; " >
		@if(isset($message))
		<div class="col-md-12"> <p class="text-center" > <strong>{{$message}} </strong></p></div>
	@endif
			</div>
</div>
</div>
	@endif
	</div>
</div>
@endsection
