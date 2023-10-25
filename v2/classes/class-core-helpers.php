<?php
/**
 * The basic helpers functions
 *
 * @package    Athemes Starter Sites
 * @subpackage Core
 * @version    1.0.0
 * @since      1.0.0
 */

class ATSS_Core_Helpers {

	/**
	 * Output error message.
	 *
	 * @param string $message The error message.
	 */
	public static function atss_alert_warning( $message ) {
		if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
			?>
			<p class="atss-alert atss-alert-warning" role="alert">
				<object>
					<?php call_user_func( 'printf', '%s', $message ); ?>
				</object>

				<?php esc_html_e( ' Don’t worry, this error is visible to site admins only, and your site visitors won’t see it.', 'athemes-starter-sites' ); ?>
			</p>
			<?php
		}
	}

	/**
	 * Processing path of style.
	 *
	 * @param string $path URL to the stylesheet.
	 */
	public static function atss_style( $path ) {
		// Check RTL.
		if ( is_rtl() ) {
			return $path;
		}

		// Check Dev.
		$dev = ATSS_PATH . 'assets/css/athemes-starter-sites-dev.css';

		if ( file_exists( $dev ) ) {
			return str_replace( '.css', '-dev.css', $path );
		}

		return $path;
	}

	public static function atss_import_helper( $theme, $demo_id ) {
		if( get_option( 'atts_current_starter' ) == $demo_id ) {
			return false;
		}
		
		wp_remote_get( 'https://www.athemes.com/reports/starters.php?theme='. $theme .'&demo_id='. $demo_id,
			array(
				'timeout'     => 30,
				'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . ';'
			)
		);
		update_option( 'atts_current_starter', $demo_id );
	}

	/**
	 * Get page by title
	 * The core WordPress function 'get_page_by_title' were deprecated since 6.2.0
	 * More info: https://make.wordpress.org/core/2023/03/06/get_page_by_title-deprecated/
	 * 
	 * @param string $page_title The title of the page.
	 */
	public static function atss_get_page_by_title( $page_title ) {
		$query = new WP_Query(
			array(
				'post_type'              => 'page',
				'title'                  => $page_title,
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);
		
		if ( ! empty( $query->post ) ) {
			$page_got_by_title = $query->post;
		} else {
			$page_got_by_title = null;
		}

		return $page_got_by_title;
	}
}