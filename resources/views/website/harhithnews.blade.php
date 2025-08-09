@extends('website.layout.layout')
@section('content')

<div class="main-page-wrapper">

    <div class="page-title page-title-default title-size-default title-design-centered color-scheme-dark"
        style="background-image: url(../wp-content/uploads/2021/07/Hero-BG_1.jpg);">
        <div class="container">
            <h1 class="entry-title title">Har-Hith News</h1>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                <article id="post-107" class="post-107 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div
                            class="vc_row wpb_row vc_row-fluid hh-news-section vc_custom_1628230195776 vc_row-o-content-top vc_row-flex">
                            <div class="wpb_column vc_column_container vc_col-sm-1">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-10">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div id="gallery_881"
                                            class="wd-images-gallery wd-justify-center wd-items-middle view-grid wpb_animate_when_almost_visible wpb_fadeIn fadeIn photoswipe-images">
                                            <div class="gallery-images row wd-spacing-30">
                                                
                                              @foreach ($news as $val)
    <div class="wd-gallery-item col-6">
        <a href="{{ asset('uploads/publications/' . $val->image) }}"
            data-elementor-open-lightbox="no" data-index="1"
            data-width="2560" data-height="1941">

            <img decoding="async" width="2560" height="1941"
                src="{{ asset('uploads/publications/' . $val->image) }}"
                class="wd-gallery-image image-1 attachment-full wd-lazy-load wd-lazy-fade"
                alt="" srcset="" sizes="(max-width: 2560px) 100vw, 2560px"
                data-wood-src="{{ asset('uploads/publications/' . $val->image) }}"
                data-srcset="{{ asset('uploads/publications/' . $val->image) }} 2560w, {{ asset('uploads/publications/' . $val->image) }} 300w, {{ asset('uploads/publications/' . $val->image) }} 1024w, {{ asset('uploads/publications/' . $val->image) }} 768w, {{ asset('uploads/publications/' . $val->image) }} 1536w, {{ asset('uploads/publications/' . $val->image) }} 2048w" />
        </a>
    </div>
@endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-1">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </article><!-- #post -->

            </div><!-- .site-content -->

        </div><!-- .main-page-wrapper -->
    </div> <!-- end row -->
</div> <!-- end container -->

@endsection