<?php
	if(function_exists('get_field')){
		// Footer Contact Information
		$office = get_field('office' , 'option');
		$location = get_field('location' , 'option');
		$phone = get_field('phone' , 'option');
		$address = get_field('address' , 'option');
		$email = get_field('email' , 'option');
	}
 ?>

<ul>
    <li>Contact us</li>
    <li><strong class="text-orange"><?php if( $email ) : 
		
		echo '<a href="mailto:' . $email . '">' . $office . '</a>'; 
	else :
		echo $office; 
	endif;		

	?></strong></li>
    <li class="small"><?php echo $location; ?></li>
    <li class="small"><?php echo $phone; ?></li>
    <li class="small"><?php echo $address; ?></li>
</ul>
