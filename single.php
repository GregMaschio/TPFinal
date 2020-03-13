<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
         
		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

        endwhile; // End of the loop.
/////////////////////////////////DESCRIPTION
        $query1 = new WP_Query();
        
        $query1->the_post();
        echo '<h3> <a href ="' . get_permalink($id) . '">' . get_the_title() ." - ". get_the_date() . '</a></h3>';
        echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>'; 
        echo '<p>' .get_the_author_meta( 'display_name', $post->post_author ) . '</p>';
        
        /* Restore original Post Data 
        * NB: Because we are using new WP_Query we aren't stomping on the 
        * original $wp_query and it does not need to be reset with 
        * wp_reset_query(). We just need to set the post data back up with
        * wp_reset_postdata().
        */
        wp_reset_postdata();
        ?>
        
