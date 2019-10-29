<!-- SUB BANNER -->
<section class="section-sub-banner bg-16">

    <div class="awe-overlay"></div>

    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>RESERVATION</h2>
                <p>Lorem Ipsum is simply dummy text of the printing</p>
            </div>
        </div>

    </div>

</section>
<!-- END / SUB BANNER -->

<!-- RESERVATION -->
<section class="section-reservation-page bg-white">

    <div class="container">
        <div class="reservation-page">

            <!-- STEP -->
            <div class="reservation_step">
                <ul>
                    <li class="active"><a href="#"><span>1.</span> Choose Room</a></li>
                    <li><a href="#"><span>2.</span> Make a Reservation</a></li>
                    <li><a href="#"><span>3.</span> Confirmation</a></li>
                </ul>
            </div>
            <!-- END / STEP -->

            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-md-4 col-lg-3">

                    <div class="reservation-sidebar">

                        <!-- ROOM SELECT -->
                        <div class="reservation-room-selected bg-gray">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Need a Help?</h2>
                            <!-- END / HEADING -->

                            <!-- CURRENT -->
                            <div class="reservation-room-seleted_current bg-blue">
                                <h6>YOU ARE BOOKING ROOM 2</h6>
                                <span>2 Adult, 1 Chirld</span>
                            </div>
                            <!-- CURRENT -->

                            <!-- ITEM -->
                            <div class="reservation-room-seleted_item reservation_disable">
                                <h6>ROOM 2</h6> <span class="reservation-option">2 Adult, 1 Child</span>
                            </div>
                            <!-- END / ITEM -->

                        </div>
                        <!-- END / ROOM SELECT -->

                    </div>

                </div>
                <!-- END / SIDEBAR -->

                <!-- CONTENT -->
                <div class="col-md-8 col-lg-9">

                    <div class="reservation_content">

                        <!-- RESERVATION ROOM -->
                        <div class="reservation-room">

                            <?php foreach ($allRoom as $value): ?>

                                <!-- ITEM -->
                                <div class="reservation-room_item">

                                    <h2 class="reservation-room_name"><a :href="<?= site_url('room/detail/'). $value["id"]?>"><?= $value["name"] ?></a></h2>

                                    <div class="reservation-room_img">
                                        <a href="<?= site_url('room/detail/'). $value["id"]?>"><img src="<?= $this->common->theme_custome()."/images/room/".$value["img_background"] ?>" alt=""></a>
                                    </div>

                                    <div class="reservation-room_text">

                                        <div class="reservation-room_desc">
                                            <?= $value["short_desc"] ?>
                                        </div>

                                        <a href="<?= site_url('room/detail/'). $value["id"]?>" class="reservation-room_view-more">View More Infomation</a>

                                        <div class="clear"></div>
                                        <?php  
                                                    $attributes = array('class' => 'checkout', 'name' => 'checkout', 'id'=>'checkoutform', 'enctype' => 'multipart/form-data');
                                                    $hidden = array('room' => $value["id"]);                                                             

                                                 ?>

                                            <?= form_open(site_url('book/step/2'), $attributes, $hidden);   ?>

                                                <p class="reservation-room_price">
                                                    <span class="reservation-room_amout"><?= $value["startprice"] ?></span> / days
                                                </p>

                                                <button class="awe-btn awe-btn-default">Book Now!</button>

                                                <?=  form_close(); ?>

                                    </div>

                                </div>
                                <!-- END / ITEM -->

                                <?php endforeach ?>

                        </div>
                        <!-- END / RESERVATION ROOM -->

                    </div>

                </div>
                <!-- END / CONTENT -->

            </div>
        </div>
    </div>

</section>
<!-- END / RESERVATION -->