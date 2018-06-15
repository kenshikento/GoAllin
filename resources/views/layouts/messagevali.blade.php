@if(Session::get('errors'))

		<ul>
				@if($errors->has('email'))
					<strong><li>{{$errors->first('email')}}</li>
				@endif

				@if($errors->has('message'))
					<strong><li>{{$errors->first('message')}}</li>
				@endif


		<ul>
	
@endif

