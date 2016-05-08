@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading col-md-12"><div class="col-md-4">Add Voting Result
				</div>
				<div class="col-md-6">
				<form action="{{url('view/candidate_by_category')}}" method="post" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<select name="cat" class="form-control span-left" >
				@if(count($categories) > 0)
					@foreach($categories as $categories)
				<option value="{{$categories->id}}">{{$categories->name}}</option>
				@endforeach
				@endif
				</select>
				</div>
				<div class="col-md-2"><input type="submit" value="View" class="btn btn-md btn-primary" >
				</div>
				</form>
				<div class="panel-body">			
		<table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th>Full Name</th>
      <th>Category</th>
      <th>Number of Votes</th>
    </tr>
  </thead>
  <tbody>
  @if(count($candidates) > 0) 
	
	  @foreach($candidates as $voted)
      
    <tr >
	 <th scope="row">{{$index++}}</th>
      <th scope="row"><img style="height:40px; width:40px;" src='{{url ("upload/$voted->image") }}'></img></th>
     
      <td>{{$voted->candname}}</td>
      <td>{{$voted->catname}}</td>
      <td>{{$voted->numvotes}}</td>
    </tr>
	@endforeach
	
	@else
		 <tr >
	 <th class="text-info">No </th>
      <th class="text-info">Candidate</th>
     
      <td class="text-info"><b>In</b></td>
      <td class="text-info"><b>This</b></td>
      <td class="text-info"><b>Category</b></td>
    </tr>
	@endif
   
  </tbody>
</table>
<div class="col-md-7"></div><div class="col-md-5" > {!! $candidates->render() !!}</div>
</div>
</div>
</div>
</div>
</div>
@endsection