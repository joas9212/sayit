<div class="card">	
    <div class="card-body">
    	@foreach(App\User::all() as $user)
    		<div class="container">
    			<div class="row">
    				<div class="col-2">
    					<img width="20px" height="20px" class='imgRedonda' src="{{$user->imgProf}}">
    				</div>
    				<div class="col-6">
    					<label class="grosor">{{$user->name}}</label>
    				</div>
    				<div class="col-4">
    					<button type="button" class="border" style='width:50px; height:25px'>Seguir</button> 
    				</div>
    			</div>
    		</div>
    	@endforeach
    </div>
</div>