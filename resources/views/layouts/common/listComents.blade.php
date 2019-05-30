@foreach ($topic->coments->reverse() as $coment)
	<div class="container listComent">
		<div class="container py-2 px-0">
			<div class="row mt-2 mb-0">
				<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0 
							d-none d-sm-block">
					<div id="divImgListComent">
						<img id="imgListComent" src="{{$coment->user->imgProf}}">
					</div>
				</div>
				<div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11">
					<div class="container">
						<div class="row p-0">
							<div class="col p-0">
								<?php
									$date = new DateTime('2000-01-01');
									$datetime1 = new DateTime($coment->created_at);
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
									}else{
										$r = $r.$interval->s.' s';
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
								<p id="textarea" class="titleTopic" data-toggle="modal" data-target="#modalListComents">{{$coment->coment}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0"></div>
				<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
					@if($coment->images->count() > 0)
						<div class="mt-0 showListImg" id="showListImgComent" onclick="clickTopic()">
							<div id="contenImgs">
								@foreach($coment->images as $image)
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
								<div id="options" class="container">
									<div class="row" style="width: 100px !important">
										<div class="contLike col" onclick="like(2, {{Auth::User()->id}}, {{$coment->id}} , '{{ csrf_token() }}', this);">
										@if(App\LikesComents::ComentsOfUser($coment->id,Auth::User()->id)->get()->first()!==null)
											<svg version="1.1" id="withlike" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 426.668 426.668" style="enable-background:new 0 0 426.668 426.668;" xml:space="preserve">
										@else
											<svg version="1.1" id="like" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 426.668 426.668" style="enable-background:new 0 0 426.668 426.668;" xml:space="preserve">
										@endif
											<path  d="M401.788,74.476c-63.492-82.432-188.446-33.792-188.446,49.92
												c0-83.712-124.962-132.356-188.463-49.92c-65.63,85.222-0.943,234.509,188.459,320.265
												C402.731,308.985,467.418,159.698,401.788,74.476z"/>
											</svg>
										</div>
									</div>
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