<div class="container addComent">
	<form method="POST" action="{{route('topics.store')}}" aria-label="" enctype="multipart/form-data">
        {{ csrf_field() }}
		<div class="container py-2 px-0">
			<div class="row mt-2 mb-0">
				<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0 
							d-none d-sm-block">
					<div id="divImgComent">
						<div id="imgComent" style="background-image: url({{ Auth::User()->imgProf}});">
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11">
					<textarea class="form-control" maxlength="200" placeholder="Comentario"
					          name="coment"></textarea>
					<input id="inputImgNewTopic" type="file" name="inputImgNewTopic[]" 
                            class="form-control" 
                            accept="image/x-png,image/jpeg"
                            value=""
                            multiple="multiple">
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0"></div>
				<div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11">
					<div class="col mt-0 showPreviewImg" id="previewImgNewTopic">
	                </div>
				</div>
			</div>
			<div class="row mb-1 mt-0">
				<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<div class="container">
						<div class="row">
							<div class="col">
								<div id="svgAddImg">
									<svg height="25pt" 
										width="25pt" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 58 58" style="enable-background:new 0 0 1 1;" xml:space="preserve" >
									<g> <path d="M57,6H1C0.448,6,0,6.447,0,7v44c0,0.553,0.448,1,1,1h56c0.552,0,1-0.447,1-1V7C58,6.447,57.552,6,57,6z M56,50H2V8h54V50z" /><path d="M16,28.138c3.071,0,5.569-2.498,5.569-5.568C21.569,19.498,19.071,17,16,17s-5.569,2.498-5.569,5.569
											C10.431,25.64,12.929,28.138,16,28.138z M16,19c1.968,0,3.569,1.602,3.569,3.569S17.968,26.138,16,26.138s-3.569-1.601-3.569-3.568
											S14.032,19,16,19z"/><path d="M7,46c0.234,0,0.47-0.082,0.66-0.249l16.313-14.362l10.302,10.301c0.391,0.391,1.023,0.391,1.414,0s0.391-1.023,0-1.414
											l-4.807-4.807l9.181-10.054l11.261,10.323c0.407,0.373,1.04,0.345,1.413-0.062c0.373-0.407,0.346-1.04-0.062-1.413l-12-11
											c-0.196-0.179-0.457-0.268-0.72-0.262c-0.265,0.012-0.515,0.129-0.694,0.325l-9.794,10.727l-4.743-4.743
											c-0.374-0.373-0.972-0.392-1.368-0.044L6.339,44.249c-0.415,0.365-0.455,0.997-0.09,1.412C6.447,45.886,6.723,46,7,46z"/></g></svg>
								</div>

							</div>
						</div>
					</div>
				</div>
		 		<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		 			<button type="submit" class="btn btn-info">Comentar</button>
		 		</div>
			</div>
		</div>
	</form>
</div>