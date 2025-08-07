@extends('website.layout.layout')
@section('content')
		<div class="main-page-wrapper">
		
		
		<!-- MAIN CONTENT AREA -->
				<div class="container">
			<div class="row content-layout-wrapper align-items-start">
		
		


<div class="site-content col-lg-12 col-12 col-md-12" role="main">

								<article id="post-9680" class="post-9680 page type-page status-publish hentry">

					<div class="entry-content">
						<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			
		</div>
	</div>
</div></div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_content_element wpb_raw_html" >
		<div class="wpb_wrapper">
			<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>


    <title>Document</title>
    <link href="../../cdn.jsdelivr.net/npm/bootstrap%405.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Harhith | Fresh </title>
    <script>
        async function generateSignature(requestData) {
            let dataString = '';
            if (!(typeof requestData === 'undefined')) {
                let sortedRequestData = Object.keys(requestData).sort().reduce((acc, key) => {
                    acc[key] = requestData[key];
                    return acc;
                }, {});

                dataString = Object.entries(sortedRequestData)
                    .map(([key, value]) => `${key}=${encodeURIComponent(value)}`)
                    .join('&');
            }
            const currentDate = new Date(); 
            let nonce = currentDate. getTime(); //Math.floor(Date.now() / 1000)
            let publicKey = 'NK@D0P3N#EPr0d';
            let apiKey = 'PeB6c75axZDByrASjDqw87RzaZVAMSHI';
            let signature = await sha1(dataString + apiKey + nonce + publicKey);
            return [nonce, publicKey, apiKey, signature];
        }

    </script>

    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        .main-page-wrapper {
            background-color: #f6f6f6 !important;
        }

        .topHeader {
            height: 60px;
            width: 100%;
            background-color: #262f40;
        }

        #logo {
            width: 150px;
            margin-left: 10px;
            margin-top: 4px;
            margin-bottom: 4px;
        }

        .bgcol {
            background-color: #f6f6f6;
        }

        .locationBar {
            color: #fff;
            margin-left: 20px;
            width: 200px;
            display: flex;
        }

        .locationBar>i {
            color: #fff;
            margin-top: 10px;
            font-size: 30px;
        }

        #locationText {
            width: 200px;
            margin-left: 10px;
            line-height: 0.5;
            color: #fff;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .searchBox {
            border-radius: 10px;
            background-color: red;
            height: 50px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .categoryNavBar {
            height: 50px;
            width: 100%;
            display: flex;
            border-style: solid;
            border-top-width: 6px;
            border-top-color: #77bc1f;
            border-bottom-color: transparent;
            border-radius: 0px;
            border-left-color: transparent;
            border-right-color: transparent;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        .categoryNavBar>ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;

        }

        .categoryNavBar>ul>li {
            -webkit-transition: all 0.3s ease-out;
            display: flex;
            float: left;
            transition: all 0.3s ease-out;
            padding: 5px 20px;
        }

        .line {
            border-top: 1px solid #000;
        }

        #categoryName {
            text-align: center;
        }

        .textArea>p {
            text-align: center;
        }

        .mainImage {
            height: 100px;
            width: 100px;
            margin-top: 15px;
        }

        .main {
            margin-top: 8px;
        }
    </style>
</head>

<body>

    <div class="bgcol">
        <div class="topHeader">
            <div class="container" style="display:flex;">
                <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2021/07/Final-Har-hith-Logo-With-yellow-Background.png"
                    alt="Logo" id="logo">
                <div class="locationBar">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                    <span id="locationText" data-bs-toggle="modal" onclick="handlePinCode()"
                        data-bs-target="#deliverBox">
                        <h6 id="pincode">Deliver to</h6>
                        <p id="location">Select Your Location</p>
                    </span>
                </div>

                <div class="w-100 mt-1">
                    <div class="row">
                        <div class="col-3 center">
                            <select style="background-color: aliceblue;" class="form-select"
                                aria-label="Default select example" id="dropdown">
                                <option selected disabled value="" class="cat">Category</option>
                            </select>
                        </div>
                        <div class="col-8 center">
                            <select style="background-color: aliceblue;" class="form-select"
                                aria-label="Default select example" id="subDropdown" >
                                <option selected disabled>Sub Category</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <i class="fa-solid fa-magnifying-glass bg-light p-3 searchBox" onclick="myFunction()"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Category Nav Bar -->
    <div class="categoryNavBar">
        <h6 style="margin-left:20px;margin-top:4px;color:#77bc1f; font-size: larger;"> <a
                href="/" style="text-decoration:none;">Category</a> </h6>
        <ul>
            <!-- <li>
                <select style="border: none; margin-top: -5px;" class="form-select" aria-label="Menuexample">
                    <option selected>Dairy & Bakery</option>
                    <option value="Baby Care">Cakes & Muffins</option>
                    <option value="Home Care">Breads & Buns</option>
                    <option value="Health & Personal Care">Baked Cookies</option>
                    <option value="Food & Grocery">Cheese</option>
                    <option value="Food & Grocery">Paneer</option>
                    <option value="Food & Grocery">Ghee</option>
                </select>w 
            </li> -->
            <li><a href="#dairy">Dairy & Bakery</a></li>
            <li><a href="#myBeverages">Beverages</a></li>
            <li><a href="#myfood">Food & Grocery</a></li>
            <li> <a href="#myStaples">Staples</a></li>
            <li> <a href="#myHealth">Health & Personal Care</a></li>
            <li> <a href="#myBaby">Baby Care</a></li>
            <li> <a href="#myHomeCare">Home Care</a></li>
        </ul>
    </div>
    </br></br>
   

    <!-- carousel -->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></bustatustton>

            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/04/4-8.png" class="d-block w-100"
                        alt="Slider1" />
                </div>
                <div class="carousel-item">
                    <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/04/1-8.png" class="d-block w-100"
                        alt="Slider2" />
                </div>
                <div class="carousel-item">
                    <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/04/2-8.png" class="d-block w-100"
                        alt="Slider3" />
                </div>


            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </br></br>
    <div class="row text-center" style="display:none;" id="searchResults" >
        <div class="col-10 col-md-10 mx-auto" style="background-color: white; height: 50px; text-align: center;" >
            <h3 >Your Search Results</h3>
        </div>
    </div>
    <br><br><br><br>
    <div class="container" id="categoryShop">
        <div class="row no-gutters" id="cardRowItems">
        </div>
    </div>
    <br /><br />
    <nav aria-label="Page navigation example2">
        <ul class="pagination justify-content-center">
            <li class="page-item">

                <a id="prev" class="page-link" style="display:none;" onclick="myFunction(1)">Previous</a>

            </li>



            <li class="page-item">
                <a id="next" class="page-link" style="display:none;" onclick="myFunction(2)">Next</a>
            </li>

        </ul>
    </nav>



    <div class="row text-center">
        <div class="col-10 col-md-10 mx-auto" style="background-color: white; height: 50px; text-align: center;">
            <h3>Our Category</h3>
        </div>
    </div>
    </br>
    <div class="container" id="categoryShop">
        <div class="row no-gutters" id="cardRow">
        </div>
    </div>

    </br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

                <a class="page-link" onclick="GetData(1)">Previous</a>

            </li>



            <li class="page-item">
                <a class="page-link" onclick="GetData(2)">Next</a>
            </li>

        </ul>
    </nav>


    </br>


    </br></br>

    <div class="row">
        <div style="display: flex; justify-content: center; align-items: center;">
            <h3 style="text-align: center;">Access Quality Products at Unbeatable Prices</h2>
        </div>
        <br><br>
        <div class="row text-center mb-2">
            <p>We ensure that a wide range of best quality and fast-moving products are provided to franchisee partners
                and<br> customers at the best prices.</p><br>

        </div>
        <div class="row text-center mb-2">
            <div style="display: flex; justify-content: space-evenly; padding-left: 0px;">
                <h6>FOOD & GROCERY</h6>
                <h6>FMCG</h6>
                <span style="flex-grow: 0.02;"></span>
                <h6>HOME CARE</h6>
                <h6>PERSONAL CARE<h6>
            </div>
           
        </div>
        <div class=" row mt-3 ">
            <div class=" d-flex justify-content-center">
                <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/1_Grocery-1.jpg" style=" border-radius: 8%; "
                    class="mx-4">
                <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/2_Images-1.jpg" style="border-radius: 8%; ">
            </div>
            <div class=" d-flex justify-content-center pt-4">
                <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/3_Home_care-1.jpg" style=" border-radius: 5%;"
                    class="mx-4">
                <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/4_Personal_care-1.jpg"
                    style="border-radius: 5%; ">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-12 mx-auto px-md-6 text-center mt-5"
                style="background-color:white; height: 350px;">
                <h2>Featured Categories</h2>

                <div class="carousel-item active">
                    <div class="row d-flex">
                        <div class="col-md-3">
                            <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/Beverages.png"
                                class="img-fluid carousel-img" />
                        </div>
                        <div class="col-md-3">
                            <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/Dairy-bakery.png"
                                class="img-fluid carousel-img" />
                        </div>
                        <div class="col-md-3">
                            <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/front-view-cooked-mushrooms-with-seasonings-grey-table-food-mushroom-ripe-copy-2.png"
                                class="img-fluid carousel-img" />
                        </div>
                        <div class="col-md-3">
                            <img decoding="async" src="{{ url('website') }}/wp-content/uploads/2023/05/Stapples.png"
                                class="img-fluid carousel-img">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </br>

        <div id="dairy" class="col-12 col-md-12 mx-auto px-md-6"
            style="background-color: white; height: 350px; margin-top: 50px;text-align: center;">
            <h3 class="text-start">Dairy & Bakery</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3" style="padding-top: 40px;">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/8-2.png">
                                <h6>Vanilla Icecream</h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-3.png">
                                <h6>Daily Health Toned Milk</h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/7-2.png">
                                <h6>Goodday chochips</h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/6-3.png">
                                <h6>Unbic chochips<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/5-3.png">
                                <h6>Muffs<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/4-2.png">
                                <h6>Cake<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-2.png">
                                <h6>Amul Icecream</h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/2-2.png">
                                <h6>Amul Panner</h6>
                            </div>


                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <div id="myBeverages" class="col-12 col-md-12 mx-auto px-md-6">
            <h3 class="text-start">Beverages</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel1" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/6-5.png">
                                <h6>Mimmute Maid</h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-5.png">
                                <h6>CocaCola Soft Drink<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-5.png">
                                <h6>Fizz</h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/10-5.png">
                                <h6>Mountain Dew Soft drink<<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/8-4.png">
                                <h6>Frooti<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/7-4.png">
                                <h6>Catch Apple Juice<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/2-4.png">
                                <h6>Slice Soft Drink</h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/1-4.png">
                                <h6>Thumsup</h6>
                            </div>

                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel1" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel1" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 mx-auto px-md-6" id="myfood">
            <h3 class="text-start">Food & Grocery</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel2" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/8-3.png">
                                <h6>Aashirvaad Aata<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/7-3.png">
                                <h6>Masala Karam powder <h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/6-4.png">
                                <h6>Aashirvaad Koora Karam<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-4.png">
                                <h6>Kurkure<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/5-4.png">
                                <h6>Salt<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/4-3.png">
                                <h6>ToorDal<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-4.png">
                                <h6>Sugar<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/1-3-1.png">
                                <h6>Chana Dal</h6>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel2" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel2" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <div id="myStaples" class="col-12 col-md-12 mx-auto px-md-6"
            style="background-color: white; height: 350px; margin-top: 50px;text-align: center;">
            <h3 class="text-start">Staples</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel3" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/06/11-1.png">
                                <h6>Wheat Chapati<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/06/14-1.png">
                                <h6>Chapati</h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/06/13-1.png">
                                <h6>Corn Flour<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/06/12-2.png">
                                <h6>Nutrela<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/05/9-9.png">
                                <h6>Veg Hakka Noodies<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/05/10-9.png">
                                <h6>Foxtail Millet<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/05/4-9.png">
                                <h6>Toor Dal<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/8-3.png">
                                <h6>Aashirvaad Aata<h6>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel3" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel3" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 mx-auto px-md-6">
            <h3 class="text-start" id="myHealth">Health & Personal Care</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel4" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/7-6.png">
                                <h6>Plam Soft Blend</h6>
                            </div>

                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/4-6.png">
                                <h6>FaceMask <h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/5-7.png">
                                <h6>Vitamin C serum <h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-7.png">
                                <h6>Dove Oil<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/6-7.png">
                                <h6>Clean & clear Facewash<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/2-6.png">
                                <h6>tresemme shampoo<h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/1-6.png">
                                <h6>Dove shampoo <h6>
                            </div>
                            <div class="col-md-3 center">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-7.png">
                                <h6>EyeMakeup <h6>
                            </div>

                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel4" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel4" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="myBaby" class="col-12 col-md-12 mx-auto px-md-6"
            style="background-color: white; height: 350px; margin-top: 50px;text-align: center;">
            <h3 class="text-start">Baby Care</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel7" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/10-2.png">
                                <h6>Johnson's Baby soap <h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-2.png">
                                <h6>Pampers Baby dry <h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/8-1.png">
                                <h6>sebamed lotion<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/7-1.png">
                                <h6>Atogla<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/4-1.png">
                                <h6>Himalaya baby shampoo<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-1-1.png">
                                <h6>Baby Oil<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/2-1.png">
                                <h6>Himalaya baby Cream <h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/1-1-1.png">
                                <h6>Pampers<h6>
                            </div>


                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#multi-item-carousel7" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel7" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="myHomeCare" class="col-12 col-md-12 mx-auto px-md-6"
            style="background-color: white; height: 350px; margin-top: 50px;text-align: center;">
            <h3 class="text-start">HomeCare</h3>
            <div class="line"></div>
            </br>
            <div id="multi-item-carousel8" class="carousel slide1" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/10-6.png">
                                <h6>Comfort<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/9-6.png">
                                <h6>White Phenyl<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/6-6.png">
                                <h6>Tide <h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/5-6.png">
                                <h6>lizol<h6>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/4-5-1.png">
                                <h6>Safewash<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/3-6.png">
                                <h6>Pril<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/2-5.png">
                                <h6>Odonil<h6>
                            </div>
                            <div class="col-md-3">
                                <img decoding="async" class="img-fluid mx-auto d-block"
                                    src="{{ url('website') }}/wp-content/uploads/2023/04/1-5.png">
                                <h6>hand sanitizer<h6>
                            </div>
                        </div>
                    </div>


                    <a class="carousel-control-prev" href="#multi-item-carousel8" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#multi-item-carousel8" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <script src="../../cdn.jsdelivr.net/npm/bootstrap%405.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

        <script>
            async function GetData(page) {
                let count = 1;
                if (page === 1) {
                    // For previous page.
                    let pagecount = localStorage.getItem('pagecount');
                    if (pagecount > 1) {
                        count = parseInt(pagecount) - 1;
                        localStorage.setItem('pagecount', count);
                    } else {
                        alert("You are viewing the first page.");
                    }
                } if (page === 2) {
                    //For next page.
                    let pagecount = localStorage.getItem('pagecount');
                    if (pagecount > 1) {
                        count = parseInt(pagecount) + 1;
                    } else {
                        count = count + 1;
                    }
                    localStorage.setItem('pagecount', count);
                    console.log(count);

                    //count = count + 1;
                    // localStorage.setItem('pagecount', count);
                }
                //console.log(typeof (count));

                let [myNonce, myPublicKey, myApiKey, mySignature] = await generateSignature({ pageNo: count.toString() });

                //get item master
                const rawResponse = await fetch('https://cors-anywhere.herokuapp.com/https://openapis.nukkadshops.com/v1/harhith/itemMasterList', {
                    method: 'POST',
                    headers: {
                        'Accept': '*/*',
                        'Accept-Encoding': 'gzip, deflate, br',
                        'Connection': 'keep-alive',
                        'Content-Type': 'application/json',
                        "X-Nukkad-Api-Token": myApiKey,
                        "X-Nukkad-Signature": mySignature,
                        "X-Nukkad-Nonce": myNonce
                    },
                    body: JSON.stringify({ pageNo: count.toString() }),
                });
                const content = await rawResponse.json();
                console.log('my api key' + mySignature);

                //get Category & subcategory 
                [myNonce, myPublicKey, myApiKey, mySignature] = await generateSignature();
                const ResForCategory = await fetch('https://cors-anywhere.herokuapp.com/https://openapis.nukkadshops.com/v1/harhith/catSubcatList', {
                    method: 'POST',
                    headers: {
                        'Accept': '*/*',
                        'Accept-Encoding': 'gzip, deflate, br',
                        'Connection': 'keep-alive',
                        'Content-Type': 'application/json',
                        "X-Nukkad-Api-Token": myApiKey,
                        "X-Nukkad-Signature": mySignature,
                        "X-Nukkad-Nonce": myNonce
                    },
                });
                //for category list.
                var newCategory = [];
                const response = await ResForCategory.json();
                const categoryData = response?.data?.list;
                for (let i = 0; i < categoryData.length; i++) {
                    let catData = { [categoryData[i].id]: categoryData[i].name }
                    newCategory.push(catData);
                    console.log('my signatre' + mySignature);
                    console.log(myNonce)
                }

                selectEl = document.getElementById('dropdown');

                for (var i = 0; i < newCategory.length; i++) {
                    var optionEl = document.createElement("option");
                    var id = Object.keys(newCategory[i]);
                    var value = Object.values(newCategory[i]);
                    optionEl.setAttribute("id", id);
                    optionEl.setAttribute("value", value);
                    optionEl.text = Object.values(newCategory[i]);
                    selectEl.add(optionEl);
                }

                // for aws pics from api.
                const myData = content?.data?.items;
                const picBaseUrl = content?.data?.picBaseUrl

                const container = document.getElementById('cardRow');
                document.getElementById('cardRow').innerHTML = "";
                for (let i = 0; i < myData?.length; i++) {
                    // console.log(myData[i]); // here i represents index
                    // console.log(myData);
                    var card = document.createElement('div');
                    card.className = "col-md-3";
                    const content = `
                 <div class="col-md-3">
                <div class="card" style="margin-top:10px; height:20px}>
                     <div class="card" style="background-color:white; text-align: center;">
                    <a href="#">
                        <div style="height:50%" class="d-flex justify-content-center pb-2 ">
                        <img decoding="async" id="categoryImg" class="mainImage" src="${picBaseUrl + myData[i].pic}" alt="img" onerror="this.src='https://harhith.com/wp-content/uploads/2023/05/default-images.png'">
                        </div>

                        <div class="textArea">
                            <h6 id="categoryName">${myData[i].category}</h6>
                            <p > Brand ~ ${myData[i].brand}</p>
                          
                        </div>
                    </a>
                </div>
                
                </div>
                </div>
                `
                    container.innerHTML += content;
                    //console.log(myData[i].id);
                }

            }

            function handleSubCat(subcat, subcatid) {
    
                selectSubEl = document.getElementById('subDropdown');

                //Remove the existing options
                var length = selectSubEl.options.length;
                for (i = length - 1; i >= 0; i--) {
                    selectSubEl.options[i] = null;
                }

                // Add new options as from Category
                for (var i = 0; i < subcat?.length; i++) {
                    // selectSubEl.options.add(new Option(subcat[i]));
                    var optionEl = document.createElement("option");
                    var id = subcatid;
                    var value = subcatid;
                    optionEl.setAttribute("id", id);
                    optionEl.setAttribute("value", value);
                    optionEl.setAttribute("label", subcat[i].name);
                    // optionEl.text = subcat[i];
                    // console.log(optionEl)
                    selectSubEl.add(optionEl);
                    // selectSubEl.options.add(new Option(optionEl));
                }
            }
            document.getElementById('dropdown').addEventListener("change", async function () {
                var selectedOption = selectEl.options[selectEl.selectedIndex];
                var selectedId = selectedOption.id;

                // Make API call with selectedId parameter
                let [myNonce, myPublicKey, myApiKey, mySignature] = await generateSignature({ id: selectedId });
                // console.log(myNonce);
                //console.log('my signatre ' + mySignature);
                
                // ...
                await fetch('https://cors-anywhere.herokuapp.com/https://openapis.nukkadshops.com/v1/harhith/catSubcatList', {
                    method: 'POST',
                    headers: {
                        'Accept': '*/*',
                        'Accept-Encoding': 'gzip, deflate, br',
                        'Content-Type': 'application/json',
                        "X-Nukkad-Api-Token": myApiKey,
                        "X-Nukkad-Signature": mySignature,
                        "X-Nukkad-Nonce": myNonce,
                    },
                    // body: JSON.stringify({ categoryId: "5f9465e50effc812d238393a" })
                    body: JSON.stringify({ id: selectedId })

                }).then(response => response.json())
                    .then(function (res) {
                        const arr = res.data?.list[0].name;
                        const subid = res.data?.list[0].id;
                         //console.log(subid);
                        resData = arr?.split(",");
                        handleSubCat(res.data.list, subid);
                    })
                // .catch(error => console.log("error"));
                //console.log(response);
                //console.log("Selected option id:", selectedId);
                //console.log('my signatre ' + mySignature);
                //console.log(myNonce);
            });

            // window.onload = function () {
            //     GetData();

            // };
            window.addEventListener("load", function () {
                GetData();
            });

            async function myFunction(pages) {
                //console.log('i am here in my funct');
                let count = 1;
                if (pages === 1) {
                    // For previous page.
                    let pagescount = localStorage.getItem('pagescount');
                    if (pagescount > 1) {
                        count = parseInt(pagescount) - 1;
                        localStorage.setItem('pagescount', count);
                    } else {
                        alert("You are viewing the first page.");
                    }
                } if (pages === 2) {
                    //For next page.
                    let pagescount = localStorage.getItem('pagescount');
                    if (pagescount > 1) {
                        count = parseInt(pagescount) + 1;
                    } else {
                        count = count + 1;
                    }
                    localStorage.setItem('pagescount', count);
                    console.log(count);

                    //count = count + 1;
                    // localStorage.setItem('pagecount', count);
                }

                const catElement = document.getElementById('dropdown');
                const catselectedOption = catElement.options[catElement.selectedIndex];
                const catselectedOptionId = catselectedOption.getAttribute('id');
                //console.log(catselectedOptionId);

                const subcatselectElement = document.getElementById('subDropdown');
                const subcatselectedOption = subcatselectElement.options[subcatselectElement.selectedIndex];
                const subcatselectedOptionId = subcatselectedOption.getAttribute('id');
               // console.log(subcatselectedOptionId);


                if (!catselectedOptionId || !subcatselectedOptionId) {
                    alert('Please select both a category and subcategory');
                    return;
                }


                const requestBody = {
                    catId: catselectedOptionId,
                    subcatId: subcatselectedOptionId,
                    pageNo: count.toString(),

                };

                const [myNonce, myPublicKey, myApiKey, mySignature] = await generateSignature(requestBody);

                const mycatsub = await fetch('https://cors-anywhere.herokuapp.com/https://openapis.nukkadshops.com/v1/harhith/itemMasterList', {
                    method: 'POST',
                    headers: {
                        'Accept': '*/*',
                        'Accept-Encoding': 'gzip, deflate, br',
                        'Content-Type': 'application/json',
                        "X-Nukkad-Api-Token": myApiKey,
                        "X-Nukkad-Signature": mySignature,
                        "X-Nukkad-Nonce": myNonce,
                    },
                    body: JSON.stringify(requestBody)

                }).then(response => response.json())
                    .then(function (res) {
                        console.log(res);
                        // for aws pics from api.
                        const myData = res.data?.items;
                        // console.log(myData);

                        const picBaseUrl = res.data.picBaseUrl
                        const container = document.getElementById('cardRowItems');
                        container.innerHTML = ''; // clear previous search results
                        for (let i = 0; i < myData?.length; i++) {
                            var card = document.createElement('div');
                            card.className = "col-md-3";
                            const content = `
                     <div class="col-md-3">
                        <div class="card" style="margin-top:10px; height:250px"}>
                            <div class="card" style="background-color:white; text-align: center;">
                                <a href="#">
                                <div style="height:50%" class="d-flex justify-content-center pb-2 ">
                                    <div style="height:100px">
                                    <img decoding="async" id="categoryImg"  class="main"  src="${picBaseUrl + myData[i].pic}" alt="img" onerror="this.src='https://harhith.com/wp-content/uploads/2023/05/default-images.png'">
</div>
                                    <div class="textArea">
                                        <h6 id="categoryName">${myData[i].category}</h6>
                                        <p> Brand ~ ${myData[i].brand}</p>
                                        <p> MRP ~ ${myData[i].mrp}</p>
                                        <p> Selling Price ~ ${myData[i].sp}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                            container.innerHTML += content;
                            console.log(myData[i].id);
                        }
                        // show search results
                        document.getElementById("searchResults").style.display = "block";
                        document.getElementById("prev").style.display = "block";
                        document.getElementById("next").style.display = "block";
                        //console.log("Selected option id:", catselectedOptionId, subcatselectedOptionId);
                    });
            }

            async function handlePinCode() {
                var pin = prompt("Please enter your PIN Code");
                if (pin != null) {
                    //  pin = document.getElementById("getPIN").value;
                    if (pin.length == "6") {
                        const myApi = `https://api.postalpincode.in/pincode/${pin}`
                        const response = await fetch(myApi);
                        const myJson = await response.json();
                        const location = myJson[0].PostOffice[0].Name;
                        document.getElementById("pincode").innerHTML = "Deliver to " + pin;
                        document.getElementById("location").innerHTML = location;
                        // const myModal = bootstrap.Modal.getOrCreateInstance("#deliverBox")
                        //  myModal.hide()
                    } else alert("Please Enter Correct PIN")
                }
            }

        </script>

</body>


<!-- Mirrored from harhith.com/harhith-product-catalogue/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Aug 2025 07:04:50 GMT -->
</html>
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