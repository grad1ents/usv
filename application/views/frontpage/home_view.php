 <!-- BANNER SLIDER -->
        <section class="section-slider">

            <div class="banner-slider" id="banner-slider">

                <!-- ITEM -->
                <div class="slider-item text-center" data-image="<?php echo $this->common->theme_custome(); ?>/images/slider/1.jpg">
                    <div class="slider-text">
                        <span class="slider-caption-sub slider-caption-sub-1">Quiet Villa</span>
                        <h2 class="slider-caption slider-caption-1">promising a peaceful break</h2>
                        <a href="<?= site_url("book/now") ?>" class="awe-btn awe-btn-12 awe-btn-slider">BOOK NOW</a>
                    </div>
                </div>
                <!-- ITEM -->                

                <div class="slider-item text-center" data-image="<?php echo $this->common->theme_custome(); ?>/images/slider/2.jpg">
                    <div class="slider-text">
                        <span class="slider-caption-sub slider-caption-sub-1">TAKE A BREAK</span>
                        <h2 class="slider-caption slider-caption-1">FROM THE HUSTLE AND BUSTLE</h2><br/>
                        <span class="slider-caption-sub slider-caption-sub-1">OF THE CITY</span><br/>
                        <a href="<?= site_url("book/now") ?>" class="awe-btn awe-btn-12 awe-btn-slider">BOOK NOW</a>
                    </div>
                </div>
                <!-- ITEM -->           

                <div class="slider-item text-center" data-image="<?php echo $this->common->theme_custome(); ?>/images/slider/3.jpg">
                    <div class="slider-text">
                        <span class="slider-caption-sub slider-caption-sub-1">A PEACEFUL BREAK</span>
                        <h2 class="slider-caption slider-caption-1">IN THE NATURAL ATMOSPHERE</h2>
                        <a href="<?= site_url("book/now") ?>" class="awe-btn awe-btn-12 awe-btn-slider">BOOK NOW</a>
                    </div>
                </div>
                <!-- ITEM -->

                


            </div>

        </section>
        <!-- END / BANNER SLIDER -->

        <!-- ACCOMD ODATIONS -->
        <section class="section-accomd awe-parallax bg-14">
            <div class="container">
                <div class="accomd-modations">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accomd-modations-header">
                                <h2 class="heading">ROOMS & RATES</h2>
                                <img src="<?php echo $this->common->theme_custome(); ?>images/icon-accmod.png" alt="icon">
                                <p>These are the 3 villa types of Ubud Serendipity's. Each with a reasonable price. Book now and get our best offer</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="accomd-modations-content owl-single">
                                
                                <div class="row">
                                    <?php foreach ($roomOptions as $key=>$room) { 
                                           $site =  'room/detail/'.$room->id;
                                           $img = 'images/room/'.$room->img_background;
                                           $price = $room->startprice;
                                           $nameVilla = $room->name;

                                        ?>
                                        <div class="col-xs-4">
                                            <div class="accomd-modations-room">
                                                <div class="img">
                                                    <a href="<?= site_url($site) ?>"><img src="<?php echo $this->common->theme_custome().$img; ?>" alt=""></a>
                                                </div>
                                                <div class="text">
                                                    <h2><a href="<?= site_url($site) ?>"><?=$nameVilla?></a></h2>
                                                    <p class="price">
                                                        <span class="amout">$ <?=$price?></span>/night

                                                    </p>
                                                </div>

                                            </div>
                                        </div>   


                                    <?php } ?>
                                    <!-- ITEM -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END / ACCOMD ODATIONS -->

        <!-- ABOUT -->
        <section class="section-home-about bg-white">
            <div class="container">
                <div class="home-about">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img">
                                <a href="#"><img src="<?php echo $this->common->theme_custome(); ?>images/room/lotus/lotus-01.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text">
                                <h2 class="heading">ABOUT US</h2>
                                <span class="box-border"></span>
                                <p>Ubud Serendipity Villa & Café is operating as a quiet and peaceful getaway in the middle of rice fields in a traditional Balinese living. We want to offer you an authentic Bali experience guided by our Host Aris who will make sure you get varieties of activities for an unforgetable Bali excursion. 
Situated in Gianyar and only a short distance away from the crowded center of Ubud, UBUD SERENDIPITY VILLA & CAFE features accommodation with a PRIVATE outdoor pool, garden and a terrace with complementary breakfast and Wi-Fi. The accommodation, consisting of two rooms per each private villa, is air conditioned and has a hot tub in each bathroom.

</p>
                                <a href="<?= site_url("book/now") ?>" class="awe-btn awe-btn-default">BOOK NOW!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / ABOUT -->

        <!-- OUR BEST -->
        <section class="section-our-best bg-white">
            <div class="container">

                <div class="our-best">
                    <div class="row">

                        <div class="col-md-6 col-md-push-6">
                            <div class="img">
                                <img src="<?php echo $this->common->theme_custome(); ?>images/room/jasmine/1.jpg" alt="">
                            </div>
                        </div>

                        <div class="col-md-6 col-md-pull-6 ">
                            <div class="text">
                                <h2 class="heading">Our Best</h2>
                                <p>Our villas are designed and maintained wholeheartedly. They are also equipped with facilities like :</p>
                                <ul>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon"> Private Swimming Pool</li>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon">Luxurious Bathroom</li>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon">Spacious Family Room</li>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon">Spacious Family Room</li>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon"> High-speed WiFi</li>
                                    <li><img src="<?php echo $this->common->theme_custome(); ?>images/home/ourbest/check.png" alt="icon">Cable TV</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- END / OUR BEST -->

        <!-- HOME GUEST BOOK -->  
        <?php $imageBanner = '../../theme_costume/images/banner/review-banner.jpg'?> 
        <div class="section-home-guestbook awe-parallax bg-13">
            <div class="container">
                <div class="home-guestbook"> 
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="guestbook-content owl-single">
                                <!-- ITEM -->
                                <div class="guestbook-item">
                                    <div class="img">
                                        
                                    </div>
                                
                                    <div class="text">
                                        <p>This Villa was absolutely lovely! So peaceful and beautiful! It is quite far out of Ubud, about a 25-30min drive, so the hosts were able to organise us a scooter to rent. This is the perfect place to stay if you just want to relax and escape the craziness of Ubud</p>
                                        <span><strong>Kirsten</strong></span><br>
                                        <span>From Los Angeles, California</span>
                                    </div> 
                                </div>

                                <div class="guestbook-item">
                                    <div class="img">
                                        
                                    </div>
                                
                                    <div class="text">
                                        <p>Quiet Retreat The friendly and helpful staff, always smiling and happy The location was a bit further from Ubud than expected but the it was extremely quiet, no distractions or noise</p>
                                        <span><strong>Anonymous on Booking.com</strong></span><br>
                                        <span>From London</span>
                                    </div> 
                                </div>

                                <div class="guestbook-item">
                                    <div class="img">
                                        
                                    </div>
                                
                                    <div class="text">
                                        <p>Everything especially the very characteristic style of the villa so authentic and the staff are very nice and polite The place is far from the city center so be ready to go after you are done with all your activities</p>
                                        <span><strong>Anonymous on Booking.com</strong></span><br>
                                        <span>From United Emirate Arab</span>
                                    </div> 
                                </div>
                                <!-- ITEM -->

                                <!-- ITEM -->
                               
                                <!-- ITEM -->
                            
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- END / HOME GUEST BOOK -->
