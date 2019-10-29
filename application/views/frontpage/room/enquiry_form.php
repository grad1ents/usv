                                     

                                        <div class="tourmaster-tour-booking-bar-inner" >
                                             <div class="tourmaster-booking-tab-content tourmaster-active" data-tourmaster-tab="enquiry">
                                                <div class="tourmaster-tour-booking-enquiry-wrap">
                                                    <form class="tourmaster-enquiry-form tourmaster-form-field tourmaster-with-border clearfix" id="tourmaster-enquiry-form"  method="post" action="<?=base_url("/home/submitTour");?>" id="bookingForm">
                                                        <input type="hidden" name="tour-id" value="<?php echo $id ?>" />
                                                        <input type="hidden" name="tour-name" value="<?php echo $name ?>" />
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-full-name tourmaster-type-text clearfix">
                                                            <div class="tourmaster-head">Full Name<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix"> 
                                                                <input type="text" name="full-name" value="" data-validation="required" />
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Country<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <select name="country" data-required>
                                                                    <?php foreach ($country as $cnt) {?>
                                                                        <option value="<?= $cnt["name"] ?>"><?=  $cnt["name"] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-email-address tourmaster-type-email clearfix">
                                                            <div class="tourmaster-head">Email Address<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <input type="email" name="email" value="" data-validation="required" />
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-travel-date tourmaster-type-datepicker clearfix">
                                                            <div class="tourmaster-head">Travel Date<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <input type="text" class="tourmaster-datepicker" name="travel-date" value="" data-validation="required" data-date-format="d/m/yy"/><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Package<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <select name="activity" data-required>
                                                                    <?php foreach ($package as $pack) {?>
                                                                        <option value="<?= $pack["name"] ?>"><?=  $pack["name"] ?> pax</option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Person<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <select name="person-number" data-validation="required">
                                                                    <option value="">Adult</option>
                                                                    <?php for ($i=1; $i < 21; $i++) {?>
                                                                        <option value="<?= $i ?>"><?= $i ?> pax</option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Pick Up?<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <select name="pickup-service" id="pickup-service">
                                                                    <?php foreach ($pickup as $pick) {?>
                                                                        <option value="<?= $pick["area"] ?>"><?=  $pick["area"] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="pickuparea" class="hiddenDode">
                                                            <div class="tourmaster-enquiry-field tourmaster-enquiry-field-full-name tourmaster-type-text clearfix">
                                                            <div class="tourmaster-head">Pickup Area<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <input type="text" name="pickup-area" value="" />
                                                            </div>
                                                            </div>    
                                                            
                                                        </div>
                                                        
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-your-enquiry tourmaster-type-textarea clearfix">
                                                            <div class="tourmaster-head">Food Request<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <textarea name="food-request"></textarea>
                                                            </div>
                                                        </div>
                                                        

                                                        <input type="submit" class="tourmaster-button" value="Submit Booking" />
                                                    </form>
                                                </div>
                                            </div>

                                        </div>