		<aside id="sidebar-responsive" class="wrapper" role="complementary">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
				
				<div class="widget">
					<h3>Search the notebook</h3>
					<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" name="s" id="s" placeholder="Enter keywords...">
					<input type="hidden" name="post_type" value="labnotebook" />
					<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
					</form>
				</div>

				<div class="widget">
					<h3 class="wtitle">Browse by category</h3>
					<ul>
						<?php $cat_name = 'Lab Notebook';
						$cat_id = get_cat_ID($cat_name);
						wp_list_categories(
							array(
								'orderby' => id,
								'use_desc_for_title' => 0,
								'child_of' => $cat_id,
								'title_li' => __( '' )
								)
							);
						?>
					</ul>
				</div>

				<div class="widget">
					<h3 class="title">Recent entries</h3>
					<ul>
						<?php
							  $temp_query = $wp_query;
							  query_posts('cat='.$cat_id);
							  while (have_posts()) {
							     the_post();
							?>
							<li>
							  <?php the_time('m/d'); ?>:
							  <a href="<?php the_permalink(); ?>" >
							  <?php the_title(); ?></a>
							</li>
							<?php
							} // end custom loop
							$wp_query = $temp_query;
						?>
					</ul>
				</div>

		<?php endif; ?>
		</aside> <!-- /#sidebar-responsive -->