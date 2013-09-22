<?php get_header(); ?>
		<div id="content" class="wrapper">
			<?//** TO SUPORT LABNOTEBOOK-ONLY SEARCH**//?>
			<?php
				$type = get_post_type();
			    if ($type == 'labnotebook') {
			    	get_sidebar('labnotebook');
			    } else {
			    	get_sidebar();
			    };
			?>
			
			<div id="main" class="post">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?//** TO HAVE LABNOTEBOOK TITLE**//?>
					<?php
						$type = get_post_type();
				    	if ($type == 'labnotebook') {
				    		echo "<header class='posthead'>";
							echo "<h2 class='bigger'>Lab Notebook</h2>";
							echo "</header>";
				    	};
					?>

				<article id="post-<?php the_ID(); ?>" class="post" role="article">
					<header class="posthead">
						<?//** TO HAVE POST LABNOTEBOOK TAXONOMY**//?>
						<?php $type = get_post_type(); ?>
					    	<?php if ($type == 'labnotebook') : ?>
					    		<h2 class="bigger"><?php which_taxonomy_is_post();?>: <?php the_title(); ?></h2>
					    		<?php else : ?>
					    			<h2 class="bigger"><?php the_title(); ?></h2>
					    		}
					    	<?php endif?>
						<span class="meta">
							<i>Published <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time> by <?php the_author_posts_link(); ?>.</i>
						</span>
					</header>
					
					<section class="post-content clearfix">
						<?php the_content(); ?>
					</section>
					
					<?php the_tags('<p class="tags"><span>Post Tags:</span> ', ', ', '</p>'); ?>
					
					<?//** TO DISABLE COMMENTS ON LABNOTEBOOK POSTS **//?>
					<?php
						$type = get_post_type();
					    if($type !== 'labnotebook') {comments_template();};
					?>
				</article><!-- /.post -->
				<?php endwhile; ?>
				
				<?php else : ?>
					<article id="post-not-found" class="post">
						<header class="posthead">
					  	<h2>Whoops! Looks like we can't find this post.</h2>
					  </header>
					  
					  <section class="post-content">
					  	<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
					  </section>
					</article>
				<?php endif; ?>
			</div> <!-- /#main -->
			
		</div> <!-- /#content -->
		
		<br style="clear:both;">

		<?//** TO SUPORT LABNOTEBOOK-ONLY SEARCH**//?>
			<?php
				$type = get_post_type();
			    if($type == 'labnotebook') {
			    	get_sidebar('labnotebook_responsive');
			    } else {
			    	get_sidebar('responsive');
			    };
			?>
<?php get_footer(); ?>