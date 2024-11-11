 <div class="checkout  box-shadow1">
        <div class="additional-fields">
            <h3>Booking information</h3>
                 <table class="table" >
                       
                             <tr>
                                 <td>Location</td>
                                 <td><b><?php echo $booking[0]->title; ?></b> <br><?php echo $booking[0]->location_title; ?>, <?php echo $booking[0]->city_title; ?></td>
                             </tr>
                          
                             <tr>
                                 <td>Booking Date</td>
                                 <td><?php echo date ('D, d  m, Y' ,strtotime($_SESSION['booking']['date'])) ;; ?></td>
                             </tr>
                             <tr>
                                 <td>Booking Slots </td>
                                 <td><?php echo $slots[0]->title; ?></td>
                             </tr>
                             <tr>
                                 <td>Basic  Amount</td>
                                 <td>₹ <span id="amount"><?php echo $amount; ?></span> </td>
                             </tr>
                             
                </table>
                <table  class="table" id="table">
                    
                </table>
        </div>
    </div>