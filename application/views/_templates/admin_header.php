<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
    <title><?php echo $this->title ?> </title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $this->keywords ?>" />
    <meta name="description" content="<?php echo $this->description ?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/images/favicon.png">

    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google fonts - witch you want to use - (rest you can just remove)-->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- ######### CSS STYLES ######### -->

    <link rel="stylesheet" href="<?php echo URL ?>public/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL ?>public/css/style.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo URL ?>public/css/font-awesome/css/font-awesome.min.css">

    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="<?php echo URL ?>public/css/responsive-leyouts.css" type="text/css" />

    <!-- just remove the below comments witch color skin you want to use -->
    <!--<link rel="stylesheet" href="public/css/colors/orange.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/lightgreen.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/blue.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/green.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/red.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/cyan.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/purple.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/pink.css" />-->
    <!--<link rel="stylesheet" href="public/css/colors/brown.css" />-->

    <!-- just remove the below comments witch bg patterns you want to use -->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-default.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-one.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-two.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-three.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-four.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-five.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-six.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-seven.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-eight.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-nine.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-ten.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-eleven.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-twelve.css" />-->
    <!--<link rel="stylesheet" href="public/css/bg-patterns/pattern-thirteen.css" />-->


    <!-- sticky menu -->
    <link rel="stylesheet" href="<?php echo URL ?>public/js/sticky-menu/core.css">

    <!-- REVOLUTION SLIDER -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/revolutionslider/css/fullwidth.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/revolutionslider/rs-plugin/css/settings.css" media="screen" />

    <!-- jquery jcarousel -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/jcarousel/skin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/jcarousel/skin2.css" />

    <!-- faqs -->
    <link rel="stylesheet" href="<?php echo URL ?>public/js/accordion/accordion.css" type="text/css" media="all">

    <!-- tabs css -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/tabs/tabs.css" />

    <!-- testimonials -->
    <link rel="stylesheet" href="<?php echo URL ?>public/js/testimonials/fadeeffect.css" type="text/css" media="all">


    <!-- fancyBox -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/js/portfolio/source/jquery.fancybox.css" media="screen" />

    <script type="text/javascript" src="public/js/mainmenu/jquery-1.7.1.min.js"></script>

    <!-- Main site javascript stuff -->
    <script type="text/javascript" src="<?php echo URL ?>public/js/custom/custom.js"></script>



    <style>
        .bodyOverlay {
            background-color: rgba(0, 0, 0, 0.5);
            color: #333;
            position: fixed;
            width: 100%;
            z-index: 900;
            height: 100%;
            top: 0px;
            display:none;
        }

        .alertDialog{
            display: none;
            z-index: 1000;
            position: fixed;
            background-color: #ffffff;
            width:97%;
            margin: 15% auto;
            left: 0;
            right: 0;
            max-width: 400px;
        }

        .alertDialog span{
            padding:10px;
            font-size: 18px;
            line-height: 30px;
            font-family: 'PT Sans Narrow', Calibri, 'Myriad Pro', Tahoma, Arial;
            display: block;
            text-align: center;

        }

        .alertDialog a{
            display: block !important;
            text-align: center;
            border-radius: 0 0 0 0 !important;
        }

        .loading{
            display: none;
            position: fixed;
            width: 200px;
            text-align: center;
            margin: 15% auto;
            left: 0;
            right: 0;
            z-index: 1200;
        }
    </style>


    <script>
        function alert(message) {
            console.info(message);
            showAlert(message);
        }
    </script>

</head>


<body>

<div id="bodyOverlay" name="bodyOverlay" class="bodyOverlay">
</div>

<div class="loading">
    <img src="<?php echo URL ?>public/img/facebook.gif" alt="Loading" />
</div>

<div class="alertDialog">
<span>
    this is an alert dialog
</span>
    <a href="#" class="but_phone"><i class="fa fa-times fa-lg"></i> close</a>
</div>

<div class="wrapper_boxed">

    <div class="site_wrapper">


        <!-- HEADER -->
        <header id="header">

            <!-- Top header bar -->
            <div id="topHeader">

                <div class="wrapper">

                    <div class="top_contact_info">

                        <div class="container">


                            <div class="center_sec">

                                <!-- Logo -->

                            </div><!-- end section -->



                        </div>

                    </div><!-- end top contact info -->

                </div>

            </div>


            <div id="trueHeader">

                <div class="wrapper">

                    <div class="container">

                        <!-- Menu -->
                        <nav id="access" class="access" role="navigation">

                            <div id="menu" class="menu">

                                <ul id="tiny" class="navlinks">
                                    <li><a id="addbooks" href="<?php echo URL ?>admin" data-scroll="false" >Add Book</a></li>
                                    <li><a id="managebooks" href="<?php echo URL ?>manage" data-scroll="false" >Manage books</a></li>
                                    <li><a id="" href="<?php echo URL ?>logout" data-scroll="false">logout</a></li>
                                </ul>

                            </div>

                        </nav><!-- end nav menu -->

                    </div>

                </div>

            </div>

        </header><!-- end header -->


        <div class="clearfix"></div>
