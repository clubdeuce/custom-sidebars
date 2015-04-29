<?php
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Class Custom_Sidebars
 */
class Custom_Sidebars {

	/**
	 * The class constructor
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'init' ) );
		add_action( 'custom_sidebar', array( $this, 'custom_sidebar' ) );

	}

	/**
	 * The WP admin_init action callback
	 *
	 * Get all pages and posts and add sidebars for each individual post
	 */
	public function init() {

		$posts = array();

		if ( ! $posts = wp_cache_get( 'posts', 'custom_sidebars' ) ) {
			$args = array(
				'post_type' => apply_filters( 'custom_sidebar_post_types', array_values( get_post_types() ) ),
			);

			$query = new WP_Query( $args );

			if( $query->have_posts() ) {
				$posts = $query->posts;
			}

			wp_cache_set( 'posts', 'custom_sidebars' );
		}

		foreach( $posts as $post ) {
			$args = apply_filters( 'custom_sidebar_args', array(
				'name'          => sprintf( __( 'Sidebar: %s', 'custom_sidebars' ), $post->post_title ),
				'id'            => $this->get_sidebar_id( $post->ID ),
				'description'   => sprintf( __( 'This sidebar will appear on the %s single page.', 'cd-sidebar' ), $post->post_title ),
				'class'         => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );

			register_sidebar( $args );
		}

	}

	/**
	 * Render the sidebar
	 *
	 * This method is hooked to the custom_sidebar action
	 */
	public function custom_sidebar() {

		$post = get_post();
		$sidebar = $this->get_sidebar_id( $post->ID );

		if ( is_active_sidebar( $sidebar ) ) {
			dynamic_sidebar( $sidebar );
		}

	}

	/**
	 * Get the sidebar id for a specific post
	 *
	 * @param  int|null The WP post id
	 * @return string   The sidebar id
	 */
	public function get_sidebar_id( $post_id = null ) {

		$post = get_post( $post_id );

		return "sidebar-{$post->ID}";

	}
	
}
