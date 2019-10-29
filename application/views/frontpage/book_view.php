<!-- SUB BANNER -->        

        <?php $imageBanner = '../../theme_costume/images/banner/bougenville-banner.jpg'?>
        <section class="section-sub-banner" style="background-image: url(<?= $imageBanner ?>);">

    <div class="awe-overlay"></div>

    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>RESERVATION</h2>
                <p>Please fill out this form below</p>
            </div>
        </div>

    </div>

</section>
<!-- END / SUB BANNER -->

<!-- RESERVATION -->
<section class="section-reservation-page bg-white" id="bigApp">
    <input type="hidden" value="<?=$idroom?>" id="idroomselected">
    <div class="container">
        <div class="reservation-page">
            <!-- STEP -->
            <div class="reservation_step">
                <ul>
                    <li :class="{'active': step1}"><a href="#"><span>1.</span> Choose Room</a></li>
                    <li :class="{'active': step2}"><a href="#"><span>2.</span> Make a Reservation</a></li>
                    <li :class="{'active': step3}"><a href="#"><span>3.</span> Final Booking</a></li>
                </ul>
            </div>
            <!-- END / STEP -->

            <div class="row">

                                <!-- CONTENT -->
                <div class="col-md-8 col-lg-9" v-if="step1">

                    <div class="reservation_content">

                        <!-- RESERVATION ROOM -->
                        <div class="reservation-room">

                           
                                <!-- ITEM -->
                                <div class="reservation-room_item" v-for="room in rooms">

                                    <div class="reservation-room_img">
                                        <a :href="linkRoom(room.id)"><img :src="linkImageRoom(room.img_background)" alt=""></a>
                                    </div>

                                    <div class="reservation-room_text">
                                        <h2 class="reservation-room_name"><a :href="linkRoom(room.id)">{{room.name}}</a></h2>            
                                        <div class="reservation-room_desc">
                                            {{room.short_desc}}
                                        </div>

                                        <a :href="linkRoom(room.id)" class="reservation-room_view-more">View More Infomation</a>

                                        <div class="clear"></div>
                                            <p class="reservation-room_price">
                                                <span class="reservation-room_amout">$ {{room.startprice}}</span> / days
                                            </p>
                                            <button class="awe-btn awe-btn-default"  @click = "selectIdRoom(room);updateNewBookingRoomName()">Book Now!</button>


                                    </div>

                                </div>
                                <!-- END / ITEM -->


                        </div>
                        <!-- END / RESERVATION ROOM -->

                    </div>

                </div>
                <!-- END / CONTENT -->

                <!-- CONTENT -->
                <div class="col-md-8 col-lg-9" v-if="step2">

                    <div class="reservation_content">

                        <div class="reservation-billing-detail">
                            <div v-if="bookingFormActive">
                                <h4>FINALIZING BOOKING</h4>

                                

                                <div>

                                    <label>Villa to Rent? <sup>*</sup></label>
                                    <div class="has-text-danger" v-html="formValidate.idroom"> </div>

                                    <vue-multiselect 
                                            v-model="selectRoom"
                                            :allow-empty="false" 
                                            :options="option_room_villa" 
                                            :custom-label="name_room" 
                                            placeholder="Select Your Preferred Villa" 
                                            label="name" 
                                            track-by="name"
                                            @input="(isShowInfoRoom = true);updateNewBookingRoomName()"
                                            :class="{'invalid': formValidate.idroom}">
                                    </vue-multiselect>    


                                    <div class="infoRoom" v-show="isShowInfoRoom">
                                        <div class="row" style="border: 2px solid #232323; padding: 5px;margin: 0px;">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="img" style="display: inline-block;">
                                                    <a href="" ref="#">
                                                        <img :src="linkImageRoom(selectRoom.img_background)" alt="room villa"></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="text">
                                                    <h5 style="margin-top: 0px;padding-bottom: 0px"><a href="#">{{selectRoom.name}}</a></h5>
                                                    <p><span> {{selectRoom.short_desc| readMore(160, '.')}} </span>
                                                        <br/><b>$ {{selectRoom.startprice}}/night</b></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="datepicker-trigger col-sm-12 col-md-12">
                                            <label>How long you would stay?</label>
                                            <div class="has-text-danger" v-html="formValidate.arrivaldate"> </div>
                                            <div class="has-text-danger" v-html="formValidate.departuredate"> </div>
                                            <input 
                                                style="width: 100%" 
                                                class="col-sm-12 col-md-12" 
                                                type="text" id="datepicker-input-trigger" 
                                                :value="formatDates(newBooking.arrivaldate, newBooking.departuredate)" 
                                                placeholder="Select date Range of your stay " 
                                                :class="{'invalid': errors.first('step1.arrivaldeparture')}" v-validate="'required'" name="arrivaldeparture" data-vv-scope="step1"/>
                                                <span class="has-text-danger">{{ errors.first('step1.arrivaldeparture') }}</span>

                                            <airbnb-style-datepicker :trigger-element-id="'datepicker-input-trigger'" :mode="'range'" :date-one="newBooking.arrivaldate" :date-two="newBooking.departuredate" :min-date="new Date(new Date().setDate(new Date().getDate()-1))" :end-date="'2080-12-10'" v-on:date-one-selected="function(val) { newBooking.arrivaldate = val }" v-on:date-two-selected="function(val) { newBooking.departuredate = val }" v-on:closed="onClosed"  v-on:next-month="onMonthChange"></airbnb-style-datepicker>


                                        </div>
                                    </div>

                                    <label>Full Name</label>
                                    <div class="has-text-danger" v-html="formValidate.fullname"> </div>
                                    <input type="text" class="input-text" v-model="newBooking.fullname" :class="{'invalid': errors.first('step1.fullname')}" v-validate="'required'" name="fullname" data-vv-scope="step1">
                                    <span class="has-text-danger">{{ errors.first('step1.fullname') }}</span>

                                    <label>Country <sup>*</sup></label>



                                    <vue-multiselect 
                                            v-model="selectCountry"
                                            :allow-empty="false" 
                                            :options="option_country" 
                                            :custom-label="name_country" 
                                            placeholder="Select Your Origin Country" 
                                            label="name" 
                                            track-by="name"
                                            @input="updateNewBookingCountry"
                                            :class="{invalid: errors.first('step1.country')}"
                                            v-validate data-vv-rules="required" data-vv-scope="step1" name="country"
                                             >
                                    </vue-multiselect>    
                                    <span class="has-text-danger">{{ errors.first('step1.country') }}</span>
                                    

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email Address<sup>*</sup></label>
                                            <input type="text" class="input-text" name="email" v-model="newBooking.email" :class="{'invalid': errors.first('step1.email')}" v-validate="'required'" name="email" data-vv-scope="step1">
                                            <span class="has-text-danger">{{ errors.first('step1.email') }}</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Phone/Whatsapp<sup>*</sup></label>
                                            <input type="text" class="input-text" name="contact" v-model="newBooking.contact" :class="{'invalid': errors.first('step1.contact')}" v-validate="'required'" name="contact" data-vv-scope="step1">
                                            <span class="has-text-danger">{{ errors.first('step1.contact') }}</span>
                                        </div>
                                    </div>

                                    <label>Order Notes</label>
                                    <textarea class="input-textarea" placeholder="Notes about your order, eg. special notes for delivery" name="ordernote" v-model="newBooking.ordernote"></textarea>

                                    <button class="awe-btn awe-btn-13" @click="addBooking">PLACE ORDER</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8 col-lg-9" v-if="step3">

                    <div class="reservation_content">

                        <div class="reservation-billing-detail">
                                <div  v-if="isLoading">
                                        <img src="<?=  $this->common->theme_custome(); ?>/images/loading.gif" style="display: block;margin-left: auto;margin-right: auto;height: 100px!important">
                                </div>
                            <div v-if="successBookingMessage">
                                <h4>BOOKING SUCCESS!</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END / CONTENT -->

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
                                <h6>Please Contact Our Team</h6>
                                <span>Putu Aristya (+62 815 5845 5967)</span>
                            </div>
                            <!-- CURRENT -->

                        </div>
                        <!-- END / ROOM SELECT -->

                    </div>

                </div>
                <!-- END / SIDEBAR -->

            </div>
        </div>
    </div>

</section>
<!-- END / RESERVATION -->