@extends('layout')

@section('content')
<div class='jumbotron'>
			  <div class='container'>
			  <h1><small>Installing HorizontCMS</small></h1>   




<div class='progress'>
			<div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='min-width: 40em;'>
						    40%
						  </div>
					</div>
					<hr/>

  		<h2>Step 2: Database</h2>
		</br>
					

		@include('messages')

		</br>

		<form action='admin/install/check-connection' method='POST'>

		{{ csrf_field() }}
			<div class='container'>

				 <div class='form-group'>
			      <label class='control-label col-md-2' for='server'>Database Driver:</label>
			      <div class='col-md-5'>
			      	<select  class='form-control' name='db_driver'>
			     
			      	@foreach($db_drivers as $driver => $alias){
			      		<option value='{{$alias}}'>{{$driver}}</option>
					@endforeach

			      	</select>          
			      
			      </div>
			    </div>
			    </br></br>
			  
			    <div class='form-group'>
			      <label class='control-label col-sm-2' for='server'>Server:</label>
			      <div class='col-sm-5'>          
			        <input type='text' class='form-control' id='server' name='server' value="{{ old('server', 'localhost') }}" required>
			      </div>
			    </div>
			    </br></br>
			    <div class='form-group'>
			      <label class='control-label col-sm-2' for='username'>Username:</label>
			      <div class='col-sm-5'>          
			        <input type='text' class='form-control' id='username' name='username' placeholder='username' value="{{ old('username') }}" required autofocus>
			      </div>
			    </div>

			    </br></br>
			    <div class='form-group'>
			      <label class='control-label col-sm-2' for='pwd'>Password:</label>
			      <div class='col-sm-5'>          
			        <input type='password' class='form-control' id='pwd' name='password' placeholder='password' value=''>
			      </div>
			    </div>

			  	</br></br>
			    <div class='form-group'>
			      <label class='control-label col-sm-2' for='data'>Create database:</label>
			      <div class='col-sm-5'>          
			        <input type='text' class='form-control' id='data' name='database' placeholder='database name' value="{{ old('database') }}" required>
			      </div>
			    </div>

			    </br></br>
			    <div class='form-group'>
			      <label class='control-label col-sm-2' for='prefix'>Table prefix:</label>
			      <div class='col-sm-5'>          
			        <input type='text' class='form-control' id='prefix' name='prefix' placeholder='prefix' value="{{ old('prefix','hcms_') }}">
			      </div>
			    </div>

			</div>
			</br>
			</br>
					<a href='admin/install/step1'><button type='button' class='btn btn-default btn-md'><span class='glyphicon glyphicon-menu-left' aria-hidden='true'></span> Previous</button></a>
					<button type='submit' class='btn btn-primary btn-md'>&nbsp&nbspNext&nbsp&nbsp&nbsp&nbsp<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span>&nbsp&nbsp</button>
					
						
		</form>

</div>
  	</div>
@endsection