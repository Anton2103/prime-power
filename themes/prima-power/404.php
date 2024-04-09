<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>
			<div class="error-404">
					<div class="accountant-404">
						<h1>Такої сторінки не існує</h1>
						<p>На нашій сторінці поки що бракує того, що ви шукаєте.</p>
						<p> Ми постійно працюємо над новими послугами та новою інформацією. А поки що...</p>
						<p class="accountant-404--home">
							<a href="<?php echo get_home_url(); ?>" class="">Поверніться на головну або прочитайте статті нижче</a>
						</p>
					</div>

					<div class="slider-main">
						<?php
						$args = array('posts_per_page' => 23);
						$lastposts = get_posts($args);
						get_template_part( 'template-parts/slick', 'slider', ['posts_slider' => $lastposts] );
						?>
					</div>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->
<?php
get_footer();
