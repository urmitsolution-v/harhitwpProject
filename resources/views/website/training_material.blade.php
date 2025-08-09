@extends('website.layout.layout')
@section('content')


								<div class="main-page-wrapper">
		
		
		<!-- MAIN CONTENT AREA -->
				<div class="container">
			<div class="row content-layout-wrapper align-items-start">
		
		


<div class="site-content col-lg-12 col-12 col-md-12" role="main">

								<article id="post-10076" class="post-10076 page type-page status-publish hentry">

					<div class="entry-content">
						<div class="vc_row wpb_row vc_row-fluid vc_custom_1535371634793 vc_row-o-content-top vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1504590037037"><div class="wpb_wrapper">		
		<div id="wd-61065587a1eae" class="title-wrapper wd-wpb set-mb-s reset-last-child  wd-title-color-primary wd-title-style-default wd-width-100 text-center vc_custom_1627805069028">
							<div class="title-subtitle  subtitle-color-primary font-default subtitle-style-default wd-font-weight- wd-fontsize-xs">{{ env('APP_NAME') }}</div>
			
			<div class="liner-continer">
				<h4 class="woodmart-title-container title  wd-font-weight- wd-fontsize-xl" >VIDEO TRAINING MATERIAL</h4>
							</div>
			
			
					</div>
		
		<div class="vc_row wpb_row vc_inner vc_row-fluid traning_videos">
			
			
			@foreach ($video_tranning ?? [] as $item)
				
			
		<div class="wpb_column vc_column_container vc_col-sm-4">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
	<div class="wpb_video_widget wpb_content_element vc_clearfix vc_video-aspect-ratio-169 vc_video-el-width-100 vc_video-align-left" >
		<div class="wpb_wrapper">
			<h2 class="wpb_heading wpb_video_heading">{{ $item['title'] ?? "" }}</h2>
			<div class="wpb_video_wrapper"><iframe title="{{ $item['title'] ?? "" }}" width="500" height="281" src="{{ $item['description'] ?? "" }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
		</div>
	</div>
</div>
</div>
</div>
@endforeach


</div>
</div>
</div>
</div>
</div>


<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">		
		<div id="wd-610655907bf89" class="title-wrapper wd-wpb set-mb-s reset-last-child  wd-title-color-primary wd-title-style-default wd-width-100 text-center vc_custom_1627805077568">
							<div class="title-subtitle  subtitle-color-primary font-default subtitle-style-default wd-font-weight- wd-fontsize-xs">{{ env('APP_NAME') }}</div>
			
			<div class="liner-continer">
				<h4 class="woodmart-title-container title  wd-font-weight- wd-fontsize-xl" >PDF TRAINING MATERIAL</h4>
							</div>
			
			
					</div>
		
		</div></div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner"><div class="wpb_wrapper">			<div class="info-box-wrapper ">
				<div id="wd-610696c2486d7" class=" wd-info-box wd-wpb text-center box-icon-align-top box-style-border color-scheme- wd-bg-none with-btn box-btn-static vc_custom_1627821799345"  >
										<div class="info-box-content">
						<h4 class="info-box-title title wd-font-weight- box-title-style-default wd-fontsize-m">Franchise Site Selection</h4>						<div class="info-box-inner set-cont-mb-s reset-last-child">
													</div>

						<div class="info-btn-wrapper"><div id="wd-6892fe3b64603" class="wd-button-wrapper text-center"><a href="../wp-content/uploads/hh-assets/Franchise_Site_Selection.pdf" title="pdf" target="_blank" class="btn btn-color-primary btn-style-default btn-shape-rectangle btn-size-default">Click to view PDF</a></div></div>						
					</div>

									</div>
			</div>
		</div></div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner"><div class="wpb_wrapper">			<div class="info-box-wrapper ">
				<div id="wd-6106983acd638" class=" wd-info-box wd-wpb text-center box-icon-align-top box-style-border color-scheme- wd-bg-none with-btn box-btn-static vc_custom_1627822150482"  >
										<div class="info-box-content">
						<h4 class="info-box-title title wd-font-weight- box-title-style-default wd-fontsize-m">Planogram</h4>						<div class="info-box-inner set-cont-mb-s reset-last-child">
													</div>

						<div class="info-btn-wrapper"><div id="wd-6892fe3b6477c" class="wd-button-wrapper text-center"><a href="../wp-content/uploads/hh-assets/Planogram.pdf" title="pdf" target="_blank" class="btn btn-color-primary btn-style-default btn-shape-rectangle btn-size-default">Click to view PDF</a></div></div>						
					</div>

									</div>
			</div>
		</div></div></div></div>
											</div>

					
				</article><!-- #post -->

				
		
</div><!-- .site-content -->



			</div><!-- .main-page-wrapper --> 
			</div> <!-- end row -->
	</div> <!-- end container -->

@endsection