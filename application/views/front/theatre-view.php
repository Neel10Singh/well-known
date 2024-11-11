  <?php $slots=0; foreach($theatre as $key=>$value){ ?>
   <div class="col-md-4 col-lg-4 col-12 mb-30">
  <?php  $slots =   $this->theatre_model->get_active_slots_by_theatre_id($value->id) ;?>
   <?php
        $slots_booked_total =0 ; $remain_slots = $total_slots=0;
        foreach($slots as $key=>$value2){ 
            $slots_booked =  $this->booking_model->check_slots_booking_on_that_date($value2->id ,date( 'Y-m-d' , strtotime( $date)) )  ;
            // echo $value2->title.'-'.$slots_booked. "<bR>";   
            $slots_booked_total = $slots_booked + $slots_booked_total ;
          
         }
     
         $remain_slots = count($slots)  - $slots_booked_total ; 
     ?>
 
        <div class="featured-imagebox featured-imagebox-team ttm-team-box-view-overlay box-card theatre-card" style="padding:10px; background-color:white;">
            <div class="featured-thumbnail">
                <a href="<?php echo base_url('theatre-page/').$value->url_slug ; ?>?date=<?php echo $date; ?>">
                     <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/theatre/').$value->image; ?>" class="img-fluid"><?php } ?>
                </a>
            </div>
            
            <div class="featured-content featured-content-team">
                                   
                <div class="featured-title   ">
                    <h3><a href="<?php echo base_url('theatre-page/').$value->url_slug ; ?>?date=<?php echo $date; ?>"> <?php echo $value->title; ?></a></h3>
                </div>
                    <div class="featured-desc">
                    <p><?php echo $value->short_description; ?></p>
                    <h5><?php echo $remain_slots ;?> slots available on  <?php echo date( 'd M, Y' , strtotime( $date)) ; ?>.</h5>
                </div>
                <div class="row">
                    <div class="col-sm-5"> <h6><i class="flaticon flaticon-man-in-a-party-dancing-with-people"></i> <?php echo $value->person_range; ?> </h6></div>
                    <div class="col-sm-7">   <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black" href="<?php echo base_url('theatre-page/').$value->url_slug ; ?>?date=<?php echo $date; ?>" title="">Check Slots</a></div>
                </div>
            </div>
          
        </div>
    </div>
<?php } ?>