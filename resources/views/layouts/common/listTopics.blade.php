@foreach (Auth::User()->topics->reverse() as $topic)
	<div class="container listComent">
		<div class="container py-2 px-0">
			<div class="row mt-2 mb-0">
				<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0 
							d-none d-sm-block">
					<div id="divImgListComent">
						<img id="imgListComent" src="{{ Auth::User()->imgProf}}">
					</div>
				</div>
				<div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11">
					<div class="container">
						<div class="row p-0">
							<div class="col p-0">
								<?php
									$date = new DateTime('2000-01-01');
									$datetime1 = new DateTime($topic->created_at);
									$datetime2 = new DateTime();
									$interval = $datetime1->diff($datetime2);
									$r="";
									if($interval->y > 0){
										if ($interval->y == 1) {
											$r = $r.$interval->y.' a, ';
										}else{
											$r = $r.$interval->y.' a, ';
										}
									}
									if($interval->m > 0){
										if ($interval->m == 1) {
											$r = $r.$interval->m.' m, ';
										}else{
											$r = $r.$interval->m.' m, ';
										}
									}
									if($interval->d > 0){
										if ($interval->d == 1) {
											$r = $r.$interval->d.' d, ';
										}else{
											$r = $r.$interval->d.' d, ';
										}
									}
									if($interval->h > 0){
										if ($interval->h == 1) {
											$r = $r.$interval->h.' h, ';
										}else{
											$r = $r.$interval->h.' h, ';
										}
									}
									if($interval->i > 0){
										if ($interval->i == 1) {
											$r = $r.$interval->i.' m';
										}else{
											$r = $r.$interval->i.' m';
										}
									}
								?>
								<p id="textarea">
									<strong>{{Auth::User()->name}}</strong>  
									<em>{{Auth::User()->email}} - {{$r}}</em> 
								</p>
							</div> 
						</div>
						<div class="row p-0">
							<div class="col p-0">
								<p id="textarea">{{$topic->topic}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0"></div>
				<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
					@if($topic->images->count() > 0)
						<div class="mt-0 showListImg" id="showListImgComent">
							<div id="contenImgs">
								@foreach($topic->images as $image)
									<div id="contentOnlyOneImg">
										<img src="{{$image->path}}">
									</div>
								@endforeach
							</div>
			            </div>
					@endif
				</div>
				<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pr-3 pl-0"></div>
			</div>
			<div class="row mb-1 mt-0">
				<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<div class="container">
						<div class="row">
							<div class="col">
								<div id="options">
									aaaa aaaa
								</div>
							</div>
						</div>
					</div>
				</div>
		 		<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		 		</div>
			</div>
		</div>
	</div>

@endforeach

