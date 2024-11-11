
<?php $product_images = $this->product_model->select_product_images($item->pro_id);
$product_data = $this->product_model->get_product_by_id($item->pro_id); ?>
<?php  $url = $this->product_model->get_product_url($item->pro_id) ; ?>
<?php $custom_option = json_decode($item->custom_options)  ; ?>
<?php $offer = json_decode($item->offer)  ; ?>
<?php $offer_discount = json_decode($item->offer_discount)  ; ?> 
 <tr>
    <th scope="row" >
      <ul class="cart_list">
        <a href="#"><?php if(count($product_images)>0){ ?>
            <img src="<?php echo base_url('uploads/product/'.$product_images[0]->image); ?>" width="90">
            <?php }  ?></a>
      
      </ul>
     
    </th>
    <td style="width:30%">
          
            <a class="cart_title" href="<?php echo $url; ?>"><?php echo  $product_data[0]->title; ?></a>
            <br><?php echo $custom_option->cartdata->weight  ?>&nbsp; <?php echo $custom_option->cartdata->unit ?>
           <br>
           <?php echo CURRENCY_SYMBOL.number_format( (!empty($custom_option->pricedata->special_price))?$custom_option->pricedata->special_price:$custom_option->pricedata->price); ?>
           <br>
           <?php if ( $custom_option->cartdata->pisai){ ?>
            Pisai : <b><?php echo  $custom_option->cartdata->pisai ?></b>
                <br> 
           <?php }  ?>
            <?php if ( $custom_option->cartdata->remarks){ ?>
            Remarks : <b> <?php echo $custom_option->cartdata->remarks  ?></b>;
           <?php }  ?>
                 <p style='color:black;font-size: 12px;'>
                <?php if($offer){ ?>
                    You Got an offer <br>
                    <span style="color: red; "><?php print_r($offer->title) ; ?> </span>
               <?php   } ?>
             </p>
    </td>
    <td><?php echo $item->qty; ?></td>
    <td><?php echo $custom_option->cartdata->weight * $item->qty  ?>&nbsp; <?php echo $custom_option->cartdata->unit ?> </td>
    <td class="text-thm" style="width:20%">
        <p style='color:black;font-size: 12px;'>
        <?php if($offer_discount){ ?>
             <?php echo CURRENCY_SYMBOL.number_format( (!empty($custom_option->pricedata->special_price))?$custom_option->pricedata->special_price*$item->qty:$custom_option->pricedata->price*$item->qty); ?>
             <br>
            <span style="color: red; "><?php print_r($offer_discount->title) ; ?> </span>

       <?php   }else{ ?>

             <?php echo CURRENCY_SYMBOL.number_format( (!empty($custom_option->pricedata->special_price))?$custom_option->pricedata->special_price*$item->qty:$custom_option->pricedata->price*$item->qty); ?>

       <?php } ?>
     </p>
    </td>
    <td class="text-thm"><?php echo CURRENCY_SYMBOL." ".$item->sub_total; ?></td>
  </tr>

