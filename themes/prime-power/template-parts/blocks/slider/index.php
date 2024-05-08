<?php


$slider = get_field('slider');
?>

<div class="slider-wrapper">

    <div class="slider" dir="rtl">
		<?php if( $slider ):?>
			<?php foreach( $slider as $image ):?>
                <div class="slide">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>

</div>
