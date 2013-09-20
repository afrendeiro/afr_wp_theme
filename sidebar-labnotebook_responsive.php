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

		<?php endif; ?>
		</aside> <!-- /#sidebar-responsive -->