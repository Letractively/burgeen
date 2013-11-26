

		<div class="clear"><!-- --></div>

					</div><!-- end content -->

				</div><!-- end wrapper -->

			</div><!-- end layout -->

			<?php

				// DATA
				global
					$theme_options,
					$panda_sb;

				$copyrights = $theme_options['copyrights'];
				$dev_copyright = $theme_options['dev_copyright'];
				$dev_copyright_data = $theme_options['dev_copyright_data'];

			?>

			<div id="footer">

				<div id="footerarea">

					<?php
						// FOOTER SIDEBARS
						include(TEMPLATEPATH."/inc/footer_sidebars.php");
					?>

				</div><!-- end footerarea -->

			</div><!-- end footer -->

			<div id="subfooter"><!-- --></div>

			<div id="copyrights">

				<?php

					// Company copyrights
					if ($dev_copyright != 'remove') : echo '<div class="f11">'; else : echo '<div class="f11">'; endif;

						if ($copyrights) : echo $copyrights; else : echo date('Y') . ' &copy; ' . get_bloginfo('sitename'); endif;

					echo '</div>';

					// Developer copyrights
					if ( $dev_copyright != 'remove' && $dev_copyright_data ) : echo '<div class="f11">'.$dev_copyright_data.'</div>'; endif;

				?>

				<div class="clear"><!-- --></div>

			</div><!-- end copyrights -->

			<?php

				wp_footer();

				do_action('cufon');

			?>

		</div><!-- end #wrapper -->

	</body>

</html>