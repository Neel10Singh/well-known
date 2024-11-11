  <?php foreach($slots as $key=>$value){ ?>
 <?php  $booked =  $this->booking_model->check_slots_booking_on_that_date($value->id ,date( 'Y-m-d' , strtotime( $date)) )   ; ?>
 <div class="col-sm-6 col-6">
      <input type="radio" class="btn-check radioBtnClass" name="slots_id" id="option<?php echo $value->id; ?>" value="<?php echo $value->id; ?>" autocomplete="off"  <?php echo($booked == True)? "disabled" : "" ;?> >
    <label class="btn <?php echo($booked > 0)? "btn-light" : "btn-avail" ;?>   option_button" for="option<?php echo $value->id; ?>"><?php echo $value->title; ?> </label>
 </div>
 <?php } ?>