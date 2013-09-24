<?php
/*
Template Name: Lab Notebook page
*/
?>
<?php get_header(); ?>
		<div id="content" class="wrapper">
		<?php get_sidebar( 'labnotebook' ); ?>
			
			<div id="main" class="post">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<header class="posthead">
						<h2 class="bigger"><?php the_title(); ?></h2>
					</header>

					<?php the_content(); ?>
					
					<?php 
			        $type = 'labnotebook';
			        $args = array (
			         'post_type' => $type,
			         'post_status' => 'publish',
			         'paged' => $paged,
			         'posts_per_page' => 20,
			         'ignore_sticky_posts'=> 1
			        );
			        $temp = $wp_query; // assign ordinal query to temp variable for later use  
			        $wp_query = null;
			        $wp_query = new WP_Query($args); ?>

			        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" class="post postbrdr" role="article">
							<header class="posthead">
							<?//** TO HAVE POST LABNOTEBOOK TAXONOMY**//?>
							<?php $type = get_post_type(); ?>
							   	<?php if ($type == 'labnotebook') : ?>
							   		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php which_taxonomy_is_post();?>: <?php the_title(); ?></a></h2>
							   		<?php else : ?>
							   			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							   	<?php endif?>
								<span class="meta">
									<i>Published <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time> by <?php the_author_posts_link(); ?>.</i>
								</span>
							</header>
							
							<section class="post-content clearfix">
								<?php the_excerpt(); ?>
							</section>
						</article>

					<?php endwhile; ?>

			        <?php else : ?>
			            <h2>No entries, yet</h2>
			        <?php endif; ?>

			        <?php $wp_query = $temp; ?>

				<?php endwhile; // end of the loop. ?>
				
			</div> <!-- /#main -->
			
		</div> <!-- /#content -->
		
		<br style="clear:both;">

		<?php get_sidebar( 'labnotebook_responsive' ); ?>
		
<?php get_footer(); ?>