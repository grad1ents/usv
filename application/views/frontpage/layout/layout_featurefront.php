<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Ubud Serendipity Villa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.png"/>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/lib/bootstrap-select.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->common->theme_custome(); ?>css/style.css">
    <?php echo $cssincludes; ?>
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
    
    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header">
            
            
            
            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">

                <div class="container">
                    <!-- HEADER LOGO -->
                    <div class="header_logo">
                        <a href="#"><img src="<?php echo $this->common->theme_custome(); ?>images/logo-header.png" alt=""></a>
                    </div>
                    <!-- END / HEADER LOGO -->
                    
                    <!-- HEADER MENU -->
                    <nav class="header_menu">
                        <ul class="menu">
                            <li <?php if(isset($activeLink['home'])) echo "current-menu-item" ?>>
                                <a href="<?php echo site_url('/') ?>">Home </span></a>
                            </li>
                            
                            
                            <li <?php if(isset($activeLink['room'])) echo "current-menu-item" ?>>
                                <a href="<?php echo site_url('/') ?>">Villas <span class="fa fa-caret-down"></span></a>
                                <ul class="sub-menu">
                                    <li <?php if(isset($activeLink['room']['1'])) echo "current-menu-item" ?>><a href="<?php echo site_url('/room/detail/1') ?>">Puri Bougenville</a></li>
                                    <li><a href="<?php echo site_url('/room/detail/2') ?>">Puri Jasmine</a></li>
                                    <li><a href="<?php echo site_url('/room/detail/3') ?>">Puri Lotus</a></li>
                                </ul>
                            </li>

                            <li><a href="http://ubudserendipityvilla.com/book/now">Book Us!</a></li>
                            <li><a href="<?= site_url('home/about') ?>">About</a></li>
                           
                        </ul>
                    </nav>
                    <!-- END / HEADER MENU -->

                    <!-- MENU BAR -->
                    <span class="menu-bars">
                        <span></span>
                    </span>
                    <!-- END / MENU BAR -->

                </div>
            </div>
            <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->
        
        <!-- BANNER SLIDER -->





        <?php  echo $content;?>


        <!-- FOOTER -->
        <footer id="footer">

            <!-- FOOTER TOP -->
            <div class="footer_top">
                <div class="container">
                    <div class="row">

                      
                        <!-- WIDGET SOCIAL -->
                        <div class="col-lg-3">
                            <div class="social">
                                <div class="social-content">
                                    <a href="https://facebook.com/ubudserendipity"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/ubudserendipity"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET SOCIAL -->

                    </div>
                </div>
            </div>
            <!-- END / FOOTER TOP -->

            <!-- FOOTER CENTER -->
            <div class="footer_center">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-lg-5">
                            <div class="widget widget_logo">
                                <div class="widget-logo">
                                    <div class="img">
                                        <a href="#"><img src="<?php echo $this->common->theme_custome(); ?>images/logo-footer.png" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <p><i class="lotus-icon-location"></i> Jl Raya Pejeng Kangin, Pejeng Kangin, Tampaksiring, Kabupaten Gianyar, Bali - 80552</p>
                                        <p><i class="lotus-icon-phone"></i> Putu Aristya (+62 815 5845 5967)</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="mailto:ubudserendipityvillas@gmail.com">ubudserendipityvillas@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Page site</h4>
                                <ul>
                                    <li><a href="<?php echo site_url('/') ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('/room/detail/1') ?>#">Puri Bougenville</a></li>
                                    <li><a href="<?php echo site_url('/room/detail/2') ?>">Puri Jasmine</a></li>
                                    <li><a href="<?php echo site_url('/room/detail/3') ?>">Puri Lotus</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">ABOUT</h4>
                                <ul>
                                    <li><a href="http://ubudserendipityvilla.com/book/now">BOOK NOW</a></li>
                                    <li><a href="<?= site_url('home/about') ?>">About</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-3">
                            <div class="widget widget_tripadvisor">
                                <h4 class="widget-title">Tripadvisor</h4>
                                <div class="tripadvisor">
                                    <p>Now with hotel reviews by</p>
                                    <img src="<?php echo $this->common->theme_custome(); ?>images/tripadvisor.png" alt="">
                                    <span class="tripadvisor-circle">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i class="part"></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- END / FOOTER CENTER -->

            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom">
                <div class="container">
                    <p>&copy; 2019 Ubud Serendipity Villa All rights reserved.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.magnific-popup.min.js"></script>
    
    <!-- validate -->
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/lib/jquery.validate.min.js"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/scripts.js"></script>


    <?php echo $jsincludes;?>
            <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6287750203090", // WhatsApp number 
                email: "ubudserendipityvillas@gmail.com", 
                call: "+6287750203090", // Call phone number
                greeting_message: "Hello, how may we help you? Just send us a message now to get assistance.", // Text of greeting message
                call_to_action: "Hi! Welcome to Bali! Need Help? Just ask Our Team", // Call to action
                button_color: "#A18B61", // Color of button
                position: "right", // Position may be 'right' or 'left'
                order: "facebook,whatsapp,call" // Order of buttons
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->
</bOdy>

</html>