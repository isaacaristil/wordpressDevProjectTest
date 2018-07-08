<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *  Template Name: MOdelProduuit
 * * Template Post Type: post, page, event
 * description: >-
  Un model pour les produits
  
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				echo "<h1>hola mundo</h1>";
				
				query_posts(
					array( 
							'post_type' => 'produits',
							'showposts' => 10 
					) 
				);  	
				echo "query_posts OK.<br>";
				
				while ( have_posts() ) : the_post();				
					echo "<br>";
					echo the_title() +  " : ";
					the_content();
					
					echo "<br>";
					
					echo  get_field('prix');
					echo "<br>";
					echo  get_field('en_stock');
				endwhile;
				get_search_form();				
			?>			

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php //get_footer();
