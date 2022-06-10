<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
	<div class="swiper-container swiper-parent">
		
		<div class="swiper-wrapper">
			<?php 
				$sent_slider = new WP_Query(array(
					'post_type'	=> 'sent_sliders',
					'posts_per_page'=> 3,
					'orderby'   => 'meta_value',
        			'order' => 'ASC',
				));
			?>
			<!-- single slide -->
			<?php if($sent_slider->have_posts()) : ?>
				<?php while($sent_slider->have_posts()) : $sent_slider->the_post();

					if ( has_post_thumbnail() ) {
						$attachment_image = wp_get_attachment_url( get_post_thumbnail_id() );
					} else {
						$attachment_image = get_theme_file_uri() . '/images/slider/swiper/1.jpg';
					}
				
				?>

					<div class="swiper-slide dark" style="background-image: url('<?php echo $attachment_image; ?>">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?php the_title(); ?></h2>
								<!-- 								<p data-caption-animate="fadeInUp" data-caption-delay="200">Any paragarah goes here</p> -->
								<?php the_content(); ?>
								<div class="slider-caption-meta">
									<?php 
										$btn_one = get_field('button_one');
									?>
									<a href="<?php echo esc_url( $btn_one['url'] ); ?>" target="<?php echo esc_attr( $btn_one['target'] ); ?>">
										<?php echo esc_html( $btn_one['title'] ); ?>
									</a>

									<?php 
										$btn_two = get_field('button_two');
									?>
									<a href="<?php echo esc_url( $btn_two['url'] ); ?>" target="<?php echo esc_attr( $btn_two['target'] ); ?>">
										<?php echo esc_html( $btn_two['title'] ); ?>
									</a>
								</div>
							</div>
						</div>
						<div data-caption-animate="fadeInUp" class="home-down-arrow">
							<div class="slider-learn-more">
								<a class="text-white page-scroll hide-on-mobile" href="#content">Learn More</a>

								<a class="text-white show-on-mobile" href="#content">Learn More</a>
                                <a href="#content" class="btn btn-circle show-on-mobile">
				               	 <i class="icon-angle-down animated"></i>
				             	</a>
							</div>
							<a href="#content" class="btn btn-circle page-scroll hide-on-mobile">
				                <i class="icon-angle-down animated"></i>
				             </a>
						</div>
					</div>
					<!-- /end single slide -->
				<?php endwhile;  wp_reset_query();?>
			<?php else : ?>
				<div class="container">
					<div class="slider-caption slider-caption-center">
						<h2 class="text-center" style="color: #fff;">No Slider Found</h2>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php if($sent_slider->have_posts()) : ?>
	<script>
	jQuery(document).ready(function($) {
		var swiperSlider = new Swiper('.swiper-parent', {
			paginationClickable: false,
			slidesPerView: 1,
			grabCursor: true,
			onSwiperCreated: function(swiper) {
				$('[data-caption-animate]').each(function() {
					var $toAnimateElement = $(this);
					var toAnimateDelay = $(this).attr('data-caption-delay');
					var toAnimateDelayTime = 0;
					if(toAnimateDelay) {
						toAnimateDelayTime = Number(toAnimateDelay) + 750;
					} else {
						toAnimateDelayTime = 750;
					}
					if(!$toAnimateElement.hasClass('animated')) {
						$toAnimateElement.addClass('not-animated');
						var elementAnimation = $toAnimateElement.attr('data-caption-animate');
						setTimeout(function() {
							$toAnimateElement.removeClass('not-animated').addClass(elementAnimation + ' animated');
						}, toAnimateDelayTime);
					}
				});
			},
			onSlideChangeStart: function(swiper) {
				$('#slide-number-current').html(swiper.activeIndex + 1);
				$('[data-caption-animate]').each(function() {
					var $toAnimateElement = $(this);
					var elementAnimation = $toAnimateElement.attr('data-caption-animate');
					$toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
				});
			},
			onSlideChangeEnd: function(swiper) {
				$('#slider .swiper-slide').each(function() {
					if($(this).find('video').length > 0) {
						$(this).find('video').get(0).pause();
					}
				});
				$('#slider .swiper-slide:not(".swiper-slide-active")').each(function() {
					if($(this).find('video').length > 0) {
						if($(this).find('video').get(0).currentTime != 0) $(this).find('video').get(0).currentTime = 0;
					}
				});
				if($('#slider .swiper-slide.swiper-slide-active').find('video').length > 0) {
					$('#slider .swiper-slide.swiper-slide-active').find('video').get(0).play();
				}
				$('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function() {
					var $toAnimateElement = $(this);
					var toAnimateDelay = $(this).attr('data-caption-delay');
					var toAnimateDelayTime = 0;
					if(toAnimateDelay) {
						toAnimateDelayTime = Number(toAnimateDelay) + 300;
					} else {
						toAnimateDelayTime = 300;
					}
					if(!$toAnimateElement.hasClass('animated')) {
						$toAnimateElement.addClass('not-animated');
						var elementAnimation = $toAnimateElement.attr('data-caption-animate');
						setTimeout(function() {
							$toAnimateElement.removeClass('not-animated').addClass(elementAnimation + ' animated');
						}, toAnimateDelayTime);
					}
				});
			}
		});
		$('#slider-arrow-left').on('click', function(e) {
			e.preventDefault();
			swiperSlider.swipePrev();
		});
		$('#slider-arrow-right').on('click', function(e) {
			e.preventDefault();
			swiperSlider.swipeNext();
		});
		$('#slide-number-current').html(swiperSlider.activeIndex + 1);
		$('#slide-number-total').html(swiperSlider.slides.length);
	});
	</script>
<?php endif; ?>
</section>