@extends('website.layout.layout')
@section('content')
<div class="main-page-wrapper">

    <!-- MAIN CONTENT AREA -->
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">

            <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                <article id="post-8190" class="post-8190 page type-page status-publish hentry">

                    <div class="entry-content">
                        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                            class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner vc_custom_1624091051340">
                                    <div class="wpb_wrapper">
                                        <!-- START Grocery REVOLUTION SLIDER 6.5.5 -->
                                        <p class="rs-p-wp-fix"></p>
                                        <rs-module-wrap id="grocery_wrapper" data-source="gallery"
                                            style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
                                            <rs-module id="grocery" style="" data-version="6.5.5">
                                                
                                                <rs-slides>
    @foreach($banners as $index => $val)
    <rs-slide 
        style="position: absolute;" 
        data-key="rs-{{ 100 + $index }}" 
        data-title="Slide {{ $index + 1 }}"
        data-thumb="{{ url('uploads/' . $val->image) }}"
        data-duration="4000ms"
        data-anim="d:10;ms:910;f:center;"
        data-in="o:0;x:cyc(-10|10);y:cyc(-10|10);sx:4;sy:4;row:20;col:20;" 
        data-out="a:false;"
        data-hsom="on">

        <img 
            decoding="async" 
            src="{{ url('uploads/' . $val->image) }}" 
            title="Banner Image {{ $index + 1 }}" 
            alt="Slide Image {{ $index + 1 }}" 
            class="rev-slidebg tp-rs-img rs-lazyload" 
            data-lazyload="{{ url('uploads/' . $val->image) }}"
            data-parallax="off" 
            data-no-retina>
    </rs-slide>
    @endforeach
</rs-slides>


                                                <rs-static-layers>
                                                    <!--
					-->
                                                </rs-static-layers>
                                            </rs-module>
                                            <script type="text/javascript">
                                                setREVStartSize({
                                                    c: 'grocery',
                                                    rl: [1240, 1024, 778, 480],
                                                    el: [1300, 480, 480, 340],
                                                    gw: [3840, 1380, 776, 478],
                                                    gh: [1300, 670, 450, 340],
                                                    type: 'standard',
                                                    justify: '',
                                                    layout: 'fullwidth',
                                                    mh: "0"
                                                });
                                                if (window.RS_MODULES !== undefined && window.RS_MODULES.modules !==
                                                    undefined && window.RS_MODULES.modules["grocery"] !== undefined) {
                                                    window.RS_MODULES.modules["grocery"].once = false;
                                                    window.revapi3 = undefined;
                                                    window.RS_MODULES.checkMinimal()
                                                }
                                            </script>
                                        </rs-module-wrap>
                                        <!-- END REVOLUTION SLIDER -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                            class="vc_row wpb_row vc_row-fluid hh-commitment-section vc_custom_1627871701347 vc_row-has-fill vc_row-o-content-middle vc_row-flex">
                            <div class="wpb_column satya11 vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_single_image wpb_content_element vc_align_center">

                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper vc_box_shadow  vc_box_border_grey">
                                                      @if ($aboutdata->image)
                                                    <img loading="lazy" decoding="async" width="516" height="700"
                                                        src="{{ url('uploads') }}/{{ $aboutdata->image ?? "" }}"
                                                        class="vc_single_image-img attachment-full" alt=""
                                                        srcset="{{ url('uploads') }}/{{ $aboutdata->image ?? "" }}"
                                                        sizes="auto, (max-width: 516px) 100vw, 516px" /></div>
                                                    @endif
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column hh-commitment-content vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element vc_custom_1627677015958">
                                            <div class="wpb_wrapper">
                                                <h1 class="bla" style="text-align: left;">{{ $aboutrow->titleone ?? "" }}</h1>
                                                <h1 class="bla" style="text-align: right;">{{ $aboutrow->titletwo ?? "" }}</h1>
                                                <ul class="p-0">
                                                     @if(!empty($aboutrow->headline))
                                                    @foreach(json_decode($aboutrow->headline) as $todo)
                                                    <li style="color: #000000;">{{ $todo ?? "" }}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_single_image wpb_content_element vc_align_center">

                                            
                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper vc_box_shadow  vc_box_border_grey">
                                                     @if ($aboutdata->image_2)
                                                    <img loading="lazy" decoding="async" width="516" height="700"
                                                        src="{{ url('uploads') }}/{{ $aboutdata->image_2 ?? "" }}"
                                                        class="vc_single_image-img attachment-full" alt=""
                                                        srcset="{{ url('uploads') }}/{{ $aboutdata->image_2 ?? "" }}"
                                                        sizes="auto, (max-width: 516px) 100vw, 516px" />
                                                    @endif
                                                    </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="false"
                            class="vc_row wpb_row vc_row-fluid hh-gradient-bg vc_custom_1627680523467 vc_row-o-equal-height vc_row-o-content-top vc_row-flex">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1627680542332">
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <h1 style="color: #ffffff;text-align: center"
                                                            class="vc_custom_heading vc_custom_1627667438827">
                                                            {{ $storerow->titleone ?? "" }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="vc_row wpb_row vc_inner vc_row-fluid vc_column-gap-15 vc_row-o-content-middle vc_row-flex">
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_text_column wpb_content_element">
                                                            <div class="wpb_wrapper">
                                                                <ul>
                                                                      @if(!empty($storerow->headline))
                                                    @foreach(json_decode($storerow->headline) as $todo)
                                                                    <li style="color: #ffffff; margin-bottom: 18px;">
                                                                       {{$todo ?? ""}}</li>
                                                    @endforeach
                                                    @endif
                                                                   
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div
                                                            class="wpb_single_image wpb_content_element vc_align_center">

                                                            <figure class="wpb_wrapper vc_figure">
                                                                <div
                                                                    class="vc_single_image-wrapper   vc_box_border_grey">
                                                                      @if ($store->image)
                                                                    <img loading="lazy" decoding="async" width="697"
                                                                        height="598"
                                                                        src="{{ url('uploads') }}/{{$store->image}}"
                                                                        class="vc_single_image-img attachment-full"
                                                                        alt=""
                                                                        srcset="{{ url('uploads') }}/{{$store->image}}"
                                                                        sizes="auto, (max-width: 697px) 100vw, 697px" />
                                                                    @endif
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                       <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5"
    class="vc_row wpb_row vc_row-fluid hht-check-eligibility-section vc_custom_1626468528859 vc_row-has-fill vc_row-o-equal-height vc_row-o-content-middle vc_row-flex vc_general vc_parallax vc_parallax-content-moving wd-bg-center-center"
    @if(!empty($eligibility->image))
        style="background-image: url('{{ asset('uploads/' . $eligibility->image) }}') !important;"
    @endif>

    <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h1 style="font-size: 34px;color: #ffffff;text-align: center;font-family:Roboto;font-weight:700;font-style:normal"
                                            class="vc_custom_heading"><?= $eligibilityrow->titleone ?? "" ?></h1>
                                        <div class="vc_empty_space" style="height: 50px"><span
                                                class="vc_empty_space_inner"></span></div>
                                        <h4 style="color: #ffffff;text-align: center;font-family:Roboto;font-weight:400;font-style:normal"
                                            class="vc_custom_heading"><?= $eligibilityrow->titletwo ?? "" ?></h4>
                                        <div id="wd-6098f7c4bbadf" class="wd-button-wrapper text-center"><a href="#123"
                                                title=""
                                                class="btn btn-color-default btn-style-default btn-shape-rectangle btn-size-default wd-open-popup ">{{ $eligibilityrow->buttonName ?? "" }}</a></div>
                                        <div id="123" class="mfp-with-anim wd-popup mfp-hide" style="max-width:800px;">
                                            <div class="wd-popup-inner">
                                                <div class="wpb_text_column wpb_content_element">
                                                    <div class="wpb_wrapper">
                                                        <div id="eligibilityModal" class="modal eligibility_modal show"
                                                            style="display: block; padding-right: 17px;" role="dialog"
                                                            aria-modal="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <h4>Eligibility Criteria for Franchisee Partner
                                                                        </h4>
                                                                        <div class="eligibilty_in">
                                                                            <p>In order to increase entrepreneurship,
                                                                                business resources and self-employment
                                                                                in the State of Haryana,the HAICL has
                                                                                fixed the minimum eligibility criteria
                                                                                to apply for either an urban or rural
                                                                                franchisee as below:</p>
                                                                            <div
                                                                                class="eliginilty_table table-responsive">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Eligibility Criteria
                                                                                            </th>
                                                                                            <th>Rural Franchisee</th>
                                                                                            <th>Small Urban Franchisee
                                                                                            </th>
                                                                                            <th>Large Urban Franchisee
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="heading">Age
                                                                                                Limit</td>
                                                                                            <td>Preferably 21-35 Years
                                                                                            </td>
                                                                                            <td>Preferably 21-35 Years
                                                                                            </td>
                                                                                            <td>Preferably 21-35 Years
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">Maximum
                                                                                                Age for<br />
                                                                                                Ex-servicemen</td>
                                                                                            <td>50 Years</td>
                                                                                            <td>50 Years</td>
                                                                                            <td>50 Years</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">
                                                                                                Education Qualification
                                                                                            </td>
                                                                                            <td>12th Pass</td>
                                                                                            <td>12th Pass</td>
                                                                                            <td>12th Pass</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">
                                                                                                Non-Criminal Background
                                                                                            </td>
                                                                                            <td>Neither convicted
                                                                                                nor<br />
                                                                                                pending criminal case
                                                                                            </td>
                                                                                            <td>Neither convicted
                                                                                                nor<br />
                                                                                                pending criminal case
                                                                                            </td>
                                                                                            <td>Neither convicted
                                                                                                nor<br />
                                                                                                pending criminal case
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">No
                                                                                                Financial Defaults</td>
                                                                                            <td>Zero liability in Govt.
                                                                                                run projects</td>
                                                                                            <td>Zero liability in Govt.
                                                                                                run projects</td>
                                                                                            <td>Zero liability in Govt.
                                                                                                run projects</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">Haryana
                                                                                                Domicile</td>
                                                                                            <td>Same village</td>
                                                                                            <td>Same ward</td>
                                                                                            <td>Same ward</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="heading">Retail
                                                                                                Space Requirements</td>
                                                                                            <td>Minimum 200 sq.ft.
                                                                                                preferably on Ground
                                                                                                Floor<br />
                                                                                                and Centrally Located
                                                                                            </td>
                                                                                            <td>200 &#8211; 800 sq.ft.
                                                                                                preferably on Ground
                                                                                                Floor<br />
                                                                                                and Centrally Located
                                                                                            </td>
                                                                                            <td>Equal and above 800
                                                                                                sq.ft. preferably on
                                                                                                Ground Floor<br />
                                                                                                and Centrally Located
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                            class="vc_row wpb_row vc_row-fluid vc_custom_1627022024236 vc_row-no-padding">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element">
                                            <div class="wpb_wrapper">
                                                <section class="hh-gradient-bg page3 sha">
                                                    <div class="d-flex flex-column justify-content-center p-0 m-0 ">
                                                        <div class="container ">
                                                            <h1 class="h1" style="text-align: center;"><span
                                                                    style="color: #fff;">{{ $entrepreneurship_row->titleone ?? "" }}</span></h1>
                                                            <p class=""
                                                                style="color: #fff; text-align: center; margin-bottom: 20px;">
                                                               {{ $entrepreneurship_row->titletwo ?? "" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="page3-image d-lg-block">
                                                                    @if (isset($entrepreneurship->image))
                                                                        
                                                                    
                                                                    <p><img loading="lazy" decoding="async"
                                                                            class="size-medium wp-image-9739 aligncenter"
                                                                            src="{{ url('uploads') }}/{{ $entrepreneurship->image }}"
                                                                            alt="" width="300" height="267"
                                                                            srcset="{{ url('uploads') }}/{{ $entrepreneurship->image }}"
                                                                            sizes="auto, (max-width: 300px) 100vw, 300px" />
                                                                    </p>@endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 pr-0">
                                                                <div
                                                                    class="page3-text d-flex justify-content-between h-100 flex-wrap">
                                                                    <div class="row m-0 w-100">
                                                                       
                                                                       @foreach($entrepreneurship_lists as $index => $value)
                                                                        <div id="page3-border"
                                                                            class="d-flex col-sm-6 col-lg-4 flex-column ">

                                                                            <p style="text-align: center;">
                                                                                @if($value->image)
                                                                                <img
                                                                                    loading="lazy" decoding="async"
                                                                                    class="alignnone size-full wp-image-7600"
                                                                                    src="{{ url('uploads') }}/{{ $value->image }}"
                                                                                    alt="" width="40"
                                                                                    height="34" /><br />
                                                                                    @endif
                                                                                <strong><span
                                                                                        style="color: #000000;"><b><?= $value->title ?></b></span></strong><br />
                                                                                <span style="color: #000000;"><?= $value->short_description ?></span></p>
                                                                        </div>
                                                                        @endforeach
                                                                  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h2 style="font-size: 28px;color: #000000;text-align: center;font-family:Roboto;font-weight:500;font-style:normal"
                                            class="vc_custom_heading">{{ $quality_row->title ?? "" }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-8">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element text-larger">
                                            <div class="wpb_wrapper">
                                                <p style="text-align: center;"><span style="color: #000000;">{{ $quality_row->description ?? ""}}</span></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>

                            @foreach ($quality_todos as $todo)
    <div class="wpb_column vc_column_container vc_col-sm-2">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                        <h4 style="text-align: center;">
                            <span style="color: #000000;">{{ $todo ?? ""}}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid hh-section-wrapper vc_custom_1627678322707">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                    @foreach (collect($quality_images)->chunk(2) as $imagePair)
    <div class="vc_row wpb_row vc_inner vc_row-fluid">
        @foreach ($imagePair as $index => $img)
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="wpb_single_image wpb_content_element {{ $index % 2 == 0 ? 'vc_align_right' : 'vc_align_left' }}">
                            <figure class="wpb_wrapper vc_figure">
                                <div class="vc_single_image-wrapper vc_box_border_grey">
                                    <img loading="lazy" decoding="async" width="500" height="300"
                                        src="{{ asset('uploads/' . $img) }}"
                                        class="vc_single_image-img attachment-full" alt=""
                                        sizes="auto, (max-width: 500px) 100vw, 500px" />
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach


                                        <div
                                            class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1620629480784 vc_row-has-fill">
                                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill">
                                                <div class="vc_column-inner vc_custom_1620629381972">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_text_column wpb_content_element">
                                                            <div class="wpb_wrapper">
                                                                <div class="page4_right_block_top">
                                                                    <h2 class="homepage_heading">{{ $become_row->title ?? "" }} <img
                                                                            loading="lazy" decoding="async"
                                                                            class="alignnone wp-image-8524"
                                                                            src="{{ url('website') }}/wp-content/uploads/2021/07/harhith-logo-plain.svg"
                                                                            alt="" width="156" height="75" /></h2>
                                                                    <div
                                                                        class="page4-button d-flex flex-row align-items-center justify-content-between">
                                                                        <p class="mb-0" style="color: #000;">{{ $become_row->form_title ?? "" }}</p>
                                                                        <p><button class="btn"><a
                                                                                    href="/franchise-registration">Apply
                                                                                    Now</a></button></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid hh-section-wrapper">
                        
                         @foreach ($become_images as $index => $img)
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_single_image wpb_content_element vc_align_left">

                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper   vc_box_border_grey"><img
                                                        loading="lazy" decoding="async" width="375" height="375"
                                                         src="{{ asset('uploads/' . $img) }}"
                                                         Wclass="vc_single_image-img attachment-full" alt=""
                                                        srcset="{{ asset('uploads/' . $img) }}"
                                                        sizes="auto, (max-width: 375px) 100vw, 375px" /></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                            class="vc_row wpb_row vc_row-fluid vc_custom_1621575470399 vc_row-no-padding">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div
                                            class="wpb_text_column wpb_content_element vc_custom_1626334152132 text-larger">
                                            <div class="wpb_wrapper">
                                                <h1 style="text-align: center;">{{ $best_row->title ?? "" }}</h1>
                                                <p style="text-align: center;"><span style="color: #000000;">{{ $best_row->short_description ?? "" }}</span></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div class="vc_row wpb_row vc_row-fluid hht-tablular-section">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div
                                            class="wpb_single_image wpb_content_element vc_align_center hht-tablular-section-img">

                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                    @if ($best->image)
                                                    <img
                                                        loading="lazy" decoding="async" width="4458" height="3285"
                                                        src="{{ url('uploads') }}/{{ $best->image }}"
                                                        class="vc_single_image-img attachment-full" alt="" />
                                                        @endif
                                                    
                                                    </div>
                                            </figure>
                                        </div>
                                        <div id="wd-610512fcd42bd" class="wd-button-wrapper text-center"><a
                                                href="/franchise-registration" title="Register"
                                                class="btn btn-color-black btn-style-default btn-shape-semi-round btn-size-large">{{ $best_row->button_name ?? "" }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h2 style="font-size: 26px;text-align: center;font-family:Roboto;font-weight:500;font-style:normal"
                                            class="vc_custom_heading">{{ $best_row->e_title ?? "" }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h5 style="font-size: 16px;color: #000000;text-align: center;font-family:Roboto;font-weight:400;font-style:normal"
                                            class="vc_custom_heading">{{ $best_row->e_short_description ?? "" }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div
                                            class="wpb_single_image wpb_content_element vc_align_center wpb_animate_when_almost_visible wpb_fadeIn fadeIn">

                                              @if ($best->image_2)
                                            <figure class="wpb_wrapper vc_figure">
                                                <div class="vc_single_image-wrapper   vc_box_border_grey"><img
                                                        loading="lazy" decoding="async" width="1200" height="370"
                                                        src="{{ url('uploads') }}/{{ $best->image_2 }}"
                                                        class="vc_single_image-img attachment-full" alt=""
                                                        srcset="{{ url('uploads') }}/{{ $best->image_2 }}"
                                                        sizes="auto, (max-width: 1200px) 100vw, 1200px" /></div>
                                            </figure>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="vc_empty_space" style="height: 32px"><span
                                                class="vc_empty_space_inner"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h2 style="font-size: 26px;text-align: center" class="vc_custom_heading">{{ $partners_best_row->title ?? "" }} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-8">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element">
                                            <div class="wpb_wrapper">
                                                <p style="text-align: center; color: #000000;"><?= $partners->aboutlongtext ?></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid hh-brands-slider">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div id="gallery_408"
                                            class="wd-images-gallery wd-justify-center wd-items-middle view-carousel wpb_animate_when_almost_visible wpb_fadeIn fadeIn wd-carousel-spacing-20 wd-carousel-container"
                                            data-owl-carousel data-speed="1000" data-wrap="yes" data-autoplay="yes"
                                            data-hide_pagination_control="yes" data-hide_prev_next_buttons="no"
                                            data-scroll_per_page="no" data-center_mode="yes" data-desktop="7"
                                            data-tablet_landscape="4" data-tablet="3" data-mobile="2">
                                            <div
                                                class="gallery-images owl-carousel owl-items-lg-7 owl-items-md-4 owl-items-sm-3 owl-items-xs-2">
                                              
                                                @foreach ($partners_todo_images as $image)
    <div class="wd-gallery-item">
        <img loading="lazy" decoding="async" width="800" height="400"
            src="{{ asset('uploads/' . $image) }}"
            class="wd-gallery-image image-1 attachment-full wd-lazy-load wd-lazy-fade"
            alt=""
            srcset=""
            sizes="auto, (max-width: 800px) 100vw, 800px"
            data-wood-src="{{ asset('uploads/' . $image) }}"
            data-srcset="{{ asset('uploads/' . $image) }} 800w, {{ asset('uploads/' . $image) }} 300w, {{ asset('uploads/' . $image) }} 768w" />
    </div>
@endforeach

                                            </div>
                                        </div>
                                        <div id="gallery_784"
                                            class="wd-images-gallery wd-justify-center wd-items-middle view-carousel wpb_animate_when_almost_visible wpb_fadeIn fadeIn wd-carousel-spacing-20 wd-carousel-container"
                                            data-owl-carousel data-speed="1000" data-wrap="yes" data-autoplay="yes"
                                            data-hide_pagination_control="yes" data-hide_prev_next_buttons="no"
                                            data-scroll_per_page="no" data-center_mode="yes" data-desktop="6"
                                            data-tablet_landscape="4" data-tablet="3" data-mobile="2">
                                            <div
                                                class="gallery-images owl-carousel owl-items-lg-6 owl-items-md-4 owl-items-sm-3 owl-items-xs-2">
                                             
                                               @foreach ($second_todo_images as $image)
    @if (!empty($image))
        <div class="wd-gallery-item">
            <img loading="lazy" decoding="async" width="1625" height="580"
                src="{{ asset('uploads/' . $image) }}"
                class="wd-gallery-image image-2 attachment-full wd-lazy-load wd-lazy-fade"
                alt=""
                srcset=""
                sizes="auto, (max-width: 1625px) 100vw, 1625px"
                data-wood-src="{{ asset('uploads/' . $image) }}"
                data-srcset="{{ asset('uploads/' . $image) }} 1625w, {{ asset('uploads/' . $image) }} 300w, {{ asset('uploads/' . $image) }} 1024w, {{ asset('uploads/' . $image) }} 768w, {{ asset('uploads/' . $image) }} 1536w" />
        </div>
    @endif
@endforeach

                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="vc_empty_space" style="height: 32px"><span
                                                class="vc_empty_space_inner"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div id="wd-6105131609d83" class="wd-button-wrapper text-center"><a
                                                href="/franchise-registration" title=""
                                                class="btn btn-color-black btn-style-default btn-shape-rectangle btn-size-default">{{ $partners_best_row->button_name ?? "" }}</a></div>
                                    </div>
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