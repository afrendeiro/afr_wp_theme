		<aside id="sidebar-responsive" class="wrapper" role="complementary">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
				<div class="widget">
					<h3 class="wtitle">PGP key</h3>
					<p><a href="pgp.pgp">Public PGPkey</a> - learn more <a href='#'>here</a><p>
				</div>

				<div class="widget">
					<h3 class="wtitle">Links</h3>
				</div>
		<?php endif; ?>
		</aside> <!-- /#sidebar-responsive -->