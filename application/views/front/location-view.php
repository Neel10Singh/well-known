  <?php $slots=0; foreach($location as $key=>$value){ ?>
  <?php  $theatre =   $this->theatre_model->get_active_theatre_by_location_id($value->id) ;?>
  <?php 
        $total_slots=0;
        foreach($theatre as $key=>$record){
            $slots_booked_total =0 ; $remain_slots =0;
            $slots =    $this->theatre_model->get_active_slots_by_theatre_id($record->id);
            foreach($slots as $key=>$value2){
                $slots_booked =  $this->booking_model->check_slots_booking_on_that_date($value2->id ,date( 'Y-m-d' , strtotime( $date)) )  ;
                $slots_booked_total = $slots_booked + $slots_booked_total ;
                
            } 
            $remain_slots = count($slots)  - $slots_booked_total ; 
           $total_slots =  $remain_slots + $total_slots ; 
        }
        
?>
    <div class="col-md-4 col-lg-4 col-6 mb-30">
        <div class="featured-imagebox featured-imagebox-team ttm-team-box-view-overlay box-card" style="padding: 10px; background-color:white;">
            <div class="featured-thumbnail">
                <a href="<?php echo base_url('theatre/').$value->url_slug ; ?>?date= <?php echo $date; ?>">
                     <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/location/').$value->image; ?>" class="img-fluid"><?php } ?>
                </a>
            </div>
            <div class="featured-content featured-content-team">
                <div class="featured-title">
                    <h5><a href="<?php echo base_url('theatre/').$value->url_slug ; ?>?date= <?php echo $date; ?>"> <?php echo $value->title; ?></a></h5>
                </div>
                <span class="category"><?php echo $total_slots ;?> slots available on <?php echo date( 'd M, Y' , strtotime( $date)) ; ?></span>
            </div>
        </div>
    </div>
<?php } ?>