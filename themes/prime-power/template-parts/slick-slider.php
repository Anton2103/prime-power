<?php
/**
 * @var $args
 */
global $post;
$posts_slider = $args['posts_slider'];


if ($posts_slider): ?>
	<div class="slider-wrapper">
		<div class="slider">
			<?php foreach ($posts_slider as $post): setup_postdata($post); ?>
				<div class="slider-item">
                    <div class="slider-img">
                        <?php the_post_thumbnail('slider'); ?>
                        <div class="slider-title">
                            <p><?php the_title(); ?></p>
                        </div>
                    </div>
					<div class="slider-content"><?php the_excerpt(); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php wp_reset_postdata();
endif; ?>