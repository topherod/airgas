<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
<?php
	$hero_background_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>



<div class="hero" id="hero">
	<div class="hero-background-image" style="background-image: url('<?php echo $hero_background_url; ?>');"></div>
	<div class="hero-content-container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<h2 class="page-subtitle"><?php the_field('subtitle'); ?></h2>

		<a class="button cta-btn" href="<?php the_field('cta_button_one_URL'); ?>"><?php the_field('cta_button_one'); ?><span class="fa fa-long-arrow-right"></span></a>
	</div>
</div>

<?php if( get_field('video') ) { ?>
<div class="feature-video row" id="video">
	<?php the_field('video'); ?>
</div>
<?php } ?>


<div class="benefits row" id="benefits">
	<div class="benefits-intro">
		<h3><?php the_field('value_add_title'); ?></h3>
		<?php the_field('value_add_description'); ?>
	</div>
	<?php 
		$total_hover_blocks = count( get_field('hover_blocks') );
		$block_percent_width = (( 1 / $total_hover_blocks ) * 100) - 1;
	?>
	<?php if( have_rows('hover_blocks') ): ?>
	<div class="hover-blocks">
		<?php while( have_rows('hover_blocks') ): the_row(); 

			$value_add = get_sub_field('value_add');
			$value_add_image = get_sub_field('value_add_image');
			$value_add_icon = get_sub_field('value_add_icon');

		?>
		<div class="block click-to-hover" style="width: <?php echo $block_percent_width; ?>%;">
			<div class="hover-image" style="background-image: url('<?php echo $value_add_image; ?>');"></div>
			<img src="<?php echo $value_add_icon; ?>" class="value-icon">
			<p class="value-add"><?php echo $value_add; ?></p>

		
			<?php if( have_rows('value_add_bullets') ): ?>
				<ul class="value-bullets">
				<?php while( have_rows('value_add_bullets') ): the_row(); 
					$value_bullet = get_sub_field('value_bullet');
				?>
				
				<li class="value-bullet"><?php echo $value_bullet; ?></li>

				<?php endwhile; ?>
				</ul>
			<?php endif; ?>

		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</div>


<?php if( have_rows('testimonials') ): ?>
<div class="testimonials" id="testimonials">

	<div class="orbit" role="region" data-orbit>
  <ul class="orbit-container" data-options="swipe:false;">
    <button class="orbit-previous fa fa-chevron-circle-left" aria-label="previous"></button>
    <button class="orbit-next fa fa-chevron-circle-right" aria-label="next"></button>

    <?php $counter = 0; ?>
		<?php while( have_rows('testimonials') ): the_row(); 

			$testimonial = get_sub_field('testimonial');
			$persons_name = get_sub_field('persons_name');
			$persons_title = get_sub_field('persons_title');
			$background_image = get_sub_field('testimonial_background_image');

		?>

	    <li class="<?php if($counter < 1) { ?>is-active <?php } ?>orbit-slide">
	    	<div class="testimonial-container">
		      <div class="testimonial-<?php echo $counter; ?> testimonial">
		      	<div class="testimonial-background-image" style="background-image: url('<?php echo $background_image; ?>');" ></div>
		      	<p>"<?php echo $testimonial; ?>"</p>
		        <h4 class="person"><?php echo $persons_name; ?></h4>
		        <h4 class="person-title"><?php echo $persons_title; ?></h4>
		      </div>
		    </div>
	    </li>

	  <?php $counter++; ?>
		<?php endwhile; ?>

	  </ul>
	  <nav class="orbit-bullets">
  	<?php $counter = 0; ?>
  	<?php while( have_rows('testimonials') ): the_row(); ?>
		<button class="<?php if($counter < 1) { ?>is-active <?php } ?>" data-slide="<?php echo $counter; ?>"></button>
	  <?php $counter++; ?>
		<?php endwhile; ?>
	 </nav>
	</div>

</div>
<?php endif; ?>



<?php if( have_rows('products') ): ?>
<div class="machines row" id="machines">

	<h3><?php the_field('product_title'); ?></h3>


  <?php $counter = 0; ?>
	<?php while( have_rows('products') ): the_row(); 

		$product_name = get_sub_field('product_name');
		$product_image = get_sub_field('product_image');
		$popup_image = get_sub_field('popup_image');
		$external_link = get_sub_field('external_link');

	?>
	<div class="machine columns small-12 medium-6" data-open="machineModal<?php echo $counter; ?>">
		<div class="row">
			<img class="product-image" src="<?php echo $product_image; ?>">
		</div>
		<div class="row">
			<div class="button expanded machine-btn"><?php echo $product_name; ?></div>
		</div>
	</div>

	<div class="reveal machine-modal" id="machineModal<?php echo $counter; ?>" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
	  <div class="row">
	  	<div class="columns small-12 medium-5 modal-img">

			<?php if( $popup_image ): ?>
		    <div class="modal-img">
					<div id="slider-<?php echo $counter; ?>" class="product-slider">
					  <div class="control_next"> > </div>
					  <div class="control_prev"> < </div>
					  <ul>

		        <?php foreach( $popup_image as $single_popup_image ): ?>

		          <li>
								<a href="<?php echo $single_popup_image['url']; ?>" target="_blank"><img src="<?php echo $single_popup_image['url']; ?>" /></a>
		          </li>

		        <?php endforeach; ?>
					  </ul>
					</div>
				</div>
				<script type="text/javascript">

jQuery(document).ready(function ($) {
  
	var slideCount = $('#slider-<?php echo $counter; ?> ul li').length;
	var slideWidth = $('#slider-<?php echo $counter; ?> ul li').offsetWidth;
	var slideHeight = $('#slider-<?php echo $counter; ?> ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider-<?php echo $counter; ?>').css({ width: slideWidth, height: slideHeight });
	
	$('#slider-<?php echo $counter; ?> ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider-<?php echo $counter; ?> ul li:last-child').prependTo('#slider-<?php echo $counter; ?> ul');

    function moveLeft() {
        $('#slider-<?php echo $counter; ?> ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider-<?php echo $counter; ?> ul li:last-child').prependTo('#slider-<?php echo $counter; ?> ul');
            $('#slider-<?php echo $counter; ?> ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider-<?php echo $counter; ?> ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider-<?php echo $counter; ?> ul li:first-child').appendTo('#slider-<?php echo $counter; ?> ul');
            $('#slider-<?php echo $counter; ?> ul').css('left', '');
        });
    };

    $('#slider-<?php echo $counter; ?> .control_prev').click(function () {
        moveLeft();
    });

    $('#slider-<?php echo $counter; ?> .control_next').click(function () {
        moveRight();
    });

});  


				</script>
			<?php endif; ?>

			</div>
			<div class="columns small-12 medium-7 modal-machine-details">
			  <h4><?php echo $product_name; ?></h4>

			  <?php if( have_rows('popup_bullet_points') ): ?>
			  <ul class="popup-bullets">
			  	<?php while( have_rows('popup_bullet_points') ): the_row(); 
						$bullet = get_sub_field('bullet');
					?>
					<li class="popup-bullet"><?php echo $bullet; ?></li>
					<?php endwhile; ?>
			  </ul>
			  <?php endif; ?>

			  <?php if( $external_link ) { ?>
				  <a class="button cta-btn" href="<?php echo $external_link; ?>" target="_blank">See more info <span class="fa fa-long-arrow-right"></span></a>
			  <?php } ?>
			</div>
		</div>
	  <button class="close-button" data-close aria-label="Close reveal" type="button">
	    <span aria-hidden="true" class="fa fa-times-circle-o"></span>
	  </button>
	</div>
	<?php $counter++; ?>
	<?php endwhile; ?>

</div>
<?php endif; ?>

<div class="chart row" id="chart">
	<a href="<?php the_field('chart_external_link'); ?>" target="_blank" class="button cta-btn chart-link"><?php the_field('alternate_text'); ?> <span class="fa fa-long-arrow-right"></span></a>
	<a href="<?php the_field('chart_external_link'); ?>" target="_blank"><img src="<?php the_field('chart_or_image'); ?>" class="chart-or-image"></a>
</div>

<div class="team row" id="team">
	<h3 class="team-title"><?php the_field('team_section_title'); ?></h3>
	<div class="columns small-12 medium-8">

  <?php if( have_rows('team_images') ): ?>
  	<?php 
  		$total_team_images = count( get_field('team_images') );
  		if( $total_team_images > 1 ) {
		?>

		<div class="orbit" role="region" data-orbit>
		  <ul class="orbit-container">
		    <button class="orbit-previous fa fa-chevron-circle-left" aria-label="previous"></button>
		    <button class="orbit-next fa fa-chevron-circle-right" aria-label="next"></button>

		    <?php $counter = 0; ?>
		  	<?php while( have_rows('team_images') ): the_row(); 
					$team_image = get_sub_field('team_image');
					$team_caption = get_sub_field('team_image_caption');
				?>

				<li class="<?php if($counter < 1) { ?>is-active <?php } ?>orbit-slide">
					<div class="team-image">
						<img src="<?php echo $team_image; ?>">
						<div class="team-caption">
							<?php echo $team_caption; ?>
						</div>
					</div>
				</li>

				<?php $counter++; ?>
				<?php endwhile; ?>

		  </ul>

		  <nav class="orbit-bullets">
		  	<?php $counter = 0; ?>
		  	<?php while( have_rows('team_images') ): the_row(); ?>
					<button class="<?php if($counter < 1) { ?>is-active <?php } ?>" data-slide="<?php echo $counter; ?>"></button>
			  <?php $counter++; ?>
				<?php endwhile; ?>
			</nav>
		</div>
		<?php } else { ?>
	  	<?php while( have_rows('team_images') ): the_row(); 
				$team_image = get_sub_field('team_image');
				$team_caption = get_sub_field('team_image_caption');
			?>
			<div class="team-image">
				<img src="<?php echo $team_image; ?>">
				<div class="team-caption">
					<?php echo $team_caption; ?>
				</div>
			</div>

			<?php endwhile; ?>
		<?php } ?>

  <?php endif; ?>

	</div>
	<div class="columns small-12 medium-4">
		<?php if( have_rows('contacts') ): ?>
		<ul class="contacts">
		<?php while( have_rows('contacts') ): the_row(); 
			$contact_name = get_sub_field('contact_name');
			$contact_title = get_sub_field('contact_title');
			$phone = get_sub_field('phone');
			$email = get_sub_field('email');
		?>
		<li class="list-contact">
			<h4 class="contact-name"><?php echo $contact_name; ?></h4>
			<h4 class="contact-title"><?php echo $contact_title; ?></h4>
			<p><span class="fa fa-phone"></span> <?php echo $phone; ?></p>
			<p><a href="mailto:<?php echo $email; ?>" target="_blank"><span class="fa fa-envelope"></span> <?php echo $email; ?></a></p>
		</li>
		<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>

<div class="contact" id="contact">
	<div class="row">
		<h3 class="contact-title"><?php the_field('contact_form_title'); ?></h3>
		<?php the_field('contact_form_shortcode'); ?>
	</div>
</div>

<footer class="footer" role="contentinfo">
	<div id="inner-footer" class="row">
			<div class="columns small-12 medium-6">
				<a href="http://www.airgas.com/"><img src="/wp-content/themes/airgas/assets/images/airgas-full-logo.png" class="footer-logo" alt="Airgas"></a>
				<div class="small-print">
					<div class="legal-links"><?php the_field('legal'); ?></div>
					<div class="source-org copyright">&copy; <?php echo date('Y'); ?> Airgas, Inc, All Rights Reserved.</div>
				</div>
			</div>
			<div class="columns small-12 medium-6 footer-cta">
				<a class="button cta-btn" href="<?php the_field('footer_cta_url'); ?>" target="_blank"><?php the_field('footer_cta_text'); ?> <span class="fa fa-long-arrow-right"></span></a>
			</div>

	</div> <!-- end #inner-footer -->
</footer> <!-- end .footer -->
					
</article> <!-- end article -->