<?php
/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 *
 * 
 */
global $post;

$posts_field = get_field( 'news' );
?>

<section  <?php echo ( ! $is_preview ) ? get_block_wrapper_attributes() : ''; ?>>
<?php if ( $posts_field ) : ?>
		<div class="is-carousel bg-white rounded border rounded-2xl shadow-2xl">
			<?php foreach ( $posts_field as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<div class="wp-block-acf-carousel--item flex items-center   p-16 gap-4 flex-wrap sm:flex-nowrap">
				
                <div class="flex flex-col order-2 gap-4 w-full sm:w-1/2 sm:order-1">
					<h2 class="capitalize  text-4xl font-bold" ><a  style="color:black;"  href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title( ) ?></a></h2>
                     <p><?php the_excerpt( ) ?></p>
                    <button class="bg-teal-400 p-4 rounded-full w-3/4"> <a  style="color:white;"  href="<?php the_permalink()   ?>">Читать</a>
                    </button>
                     
                </div>
                <img class="rounded order-1 w-full sm:w-1/2 sm:order-2" src="<?php the_post_thumbnail_url()?>" alt="">	
                
				</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p>No posts selected.</p>
	<?php endif; ?>
</section>