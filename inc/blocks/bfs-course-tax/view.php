<?php
/**
 * View of BFS Course tax
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 2.0.0
 * @package beflex-sensei
 *
 */

// That block only works with courses custom post types.
if ( is_admin() ) :
	esc_html_e( 'Display course categories', 'beflex' );
	return;
endif;

if ( 'course' != get_post_type( get_the_ID() ) ) :
	return;
endif;

$classes = 'bfs-course-tax';
if ( !empty( $block['className'] ) ) :
	$classes .= sprintf( ' %s', $block['className'] );
endif;
if ( !empty( $block['align'] ) ) :
	$classes .= sprintf( ' align%s', $block['align'] );
endif;


$terms_list = get_the_terms( get_the_ID(), 'course-category' );

if ( ! empty( $terms_list ) ) :
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<?php foreach( $terms_list as $term ) : ?>
			<a href="<?php echo get_term_link( $term->slug, 'course-category'); ?>" rel="tag" class="bfs-course-tax__id-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
		<?php endforeach; ?>
	</div>
<?php
endif;
