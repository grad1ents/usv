
        <!-- SUB BANNER -->        
        <?php $imageBanner = '../../theme_costume/images/'.$selectRoom->pluck("banner")->first()?>
        <section class="section-sub-banner" style="background-image: url(<?= $imageBanner ?>);">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Puri Lotus</h2>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ROOM DETAIL -->
        <section class="section-room-detail bg-white">
            <div class="container">
                
                <!-- DETAIL -->
                <div class="room-detail">
                    <div class="row">
                        <div class="col-lg-9">
                            <!-- LAGER IMGAE -->
                            <div class="room-detail_img">
                                <?php foreach ($selectRoom->pluck("photoroom")->first() as $ph): ?>

                                   
                                    <div class="room_img-item">
                                        <img src="<?php echo $this->common->theme_custome()."images/".$ph["photo"] ?>" alt="villa lotus">    
                                        <h6><?php echo $ph["title"] ?></h6>
                                    </div>
                                    
                                <?php endforeach ?>
                              
                            </div>
                            <!-- END / LAGER IMGAE -->
                            
                            <!-- THUMBNAIL IMAGE -->
                            <div class="room-detail_thumbs">
                               <?php foreach ($selectRoom->pluck("photoroom")->first() as $th): ?>
                                    <a href="#"><img src="<?php echo $this->common->theme_custome()."images/".$th["thumb"]  ?>" alt=""></a>

                                <?php endforeach ?>
                               
                               
                            </div>
                            <!-- END / THUMBNAIL IMAGE -->

                        </div>

                        <div class="col-lg-3">

                            <!-- FORM BOOK -->
                            <div class="room-detail_book">

                                <div class="room-detail_total">
                                    <img src="<?php echo $this->common->theme_custome(); ?>images/icon-logo.png" alt="" class="icon-logo">
                                    
                                    <h6>STARTING ROOM FROM</h6>
                                    
                                    <p class="price">
                                        <span class="amout">$ <?=$selectRoom->pluck("startprice")->first() ?></span>  /night
                                    </p>
                                </div>
                                
                                <div class="room-detail_form">
                                   

                                    <a href="<?= site_url("book/now/3") ?>" class="awe-btn awe-btn-default">BOOK NOW!</a>
                                </div>

                            </div>
                            <!-- END / FORM BOOK -->

                        </div>
                    </div>
                </div>
                <!-- END / DETAIL -->
                
                <!-- TAB -->
                <div class="room-detail_tab">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="room-detail_tab-header">
                                <li class="active"><a href="#overview" data-toggle="tab">OVERVIEW</a></li>
                                <li ><a href="#facilities" data-toggle="tab">FACILITY</a></li>
                                <li><a href="#Activities" data-toggle="tab">Activities</a></li>
                               
                            </ul>
                        </div>
                                        
                        <div class="col-md-9">
                            <div class="room-detail_tab-content tab-content">
                                
                                <!-- OVERVIEW -->
                                <div class="tab-pane fade active in" id="overview">

                                    <div class="room-detail_overview">
                                        <h5 class='text-uppercase'>Lotus Room</h5>
                                        <p>Peaceful boutique villa that offers tranquility for a family or a honeymooner couple. Very private with large swimming pool to cool down after a busy day at Ubud. Guests could enjoy the well cared garden and balinese open living room ~ bale~ with functional kitchen and dining area. The bali atmosphere is genuine and strong throughout the villa. Each bedroom is accompanied with a handcrafted bathroom and custom bathtub for ultimate relaxation close to nature.
Nature warning: guest will hear frogs and crickets singing at night and prepare to be awaken by the sound of cocks and birds. As village living entails, all friendly butterflies, geckos, etc will roam around the villa as their home.


</p>

                                       

                                    </div>

                                </div>
                                <!-- END / OVERVIEW -->

                                <!-- facilities -->
                                <div class="tab-pane fade " id="facilities">
                                    
                                    <div class="room-detail_facilities">
                                                                               
                                        <div class="row">
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>MASTER ROOM</h6>
                                                <ul>
                                                    <li>Oversized room area</li>
                                                    <li>16 m2</li>
                                                    <li>Bathroom 10 m2</li>
                                                    <li>High-speed Internet access</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>TWIN ROOM</h6>
                                                <ul>
                                                    <li>Oversized room area</li>
                                                    <li>14 m2</li>
                                                    <li>Bathroom 8 m2</li>
                                                    <li>High-speed Internet access</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>OPEN DINING & LIVING ROOM</h6>
                                                <ul>
                                                    <li>Refrigerator</li>
                                                    <li>Micro Wave</li>
                                                    <li>Water Dispenser</li>
                                                    <li>Stove, Dining Tools</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>SWIMMING POOL </h6>
                                                <ul>
                                                    <li>15 m2</li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-4">
                                                <h6>CONCIERGE SERVICE</h6>
                                                <ul>
                                                    <li>24 hours Butler Service</li>
                                                </ul>
                                            </div>
                                            
                                        </div>

                                    </div>

                                </div>
                                <!-- END / facilities -->

                                <!-- Activities -->
                                <div class="tab-pane fade" id="Activities">

                                    <div class="room-detail_rates">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Activities</th>
                                                    <th>Price</th>
                                                    <th>Duration</th>
                                                    <th>Location</th>
                                                    
                                                </tr>
                                            </thead>
                                            
                                            <tr>
                                                <td>
                                                    <h6>Balinese Cooking Class  <a href="<?php site_url('/activities/1') ?>">(See Details)</a></h6>
                                                    <ul>
                                                        <li>detail Cooking Class</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">2 Hours</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">Ubud Serendipity Villa</span></p>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Balinese Cooking Class  <a href="<?php site_url('/activities/1') ?>">(See Details)</a></h6>
                                                    <ul>
                                                        <li>detail Cooking Class</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">2 Hours</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">Ubud Serendipity Villa</span></p>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Yoga Class  <a href="<?php site_url('/activities/1') ?>">(See Details)</a></h6>
                                                    <ul>
                                                        <li>detail Cooking Class</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">2 Hours</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">Ubud Serendipity Villa</span></p>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Balinese traditional healings  <a href="<?php site_url('/activities/1') ?>">(See Details)</a></h6>
                                                    <ul>
                                                        <li>detail Cooking Class</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">2 Hours</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">Ubud Serendipity Villa</span></p>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Balinese blessing ceremony  <a href="<?php site_url('/activities/1') ?>">(See Details)</a></h6>
                                                    <ul>
                                                        <li>detail Cooking Class</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">$320</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">2 Hours</span></p>
                                                </td>
                                                <td>
                                                    <p class="price"><span class="amout">Ubud Serendipity Villa</span></p>
                                                </td>
                                                
                                            </tr>

                                        </table>
                                    </div>

                                </div>
                                <!-- END / Activities -->

                                

                            </div>
                        </div>

                    </div>

                </div>
                <!-- END / TAB -->

            </div>
        </section>
        <!-- END / SHOP DETAIL -->