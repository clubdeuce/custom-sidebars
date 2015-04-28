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

		add_action( 'admin_init', array( $this, 'admin_init' ) );

	}

	/**
	 * The WP admin_init action callback
	 *
	 * Get all pages and posts and add sidebars for each individual post
	 */
	public function admin_init() {

		if( ! $pages = wp_cache_get( 'posts', 'custom_sidebars' ) ) {
			$args       = array(
				'post_type' => apply_filters( 'custom_sidebar_post_types', array_values( get_post_types() ) ),
			);

			$query = new WP_Query( $args );

			if( $query->have_posts() ) {
				$posts = $query->posts;
			}

			wp_cache_set( 'posts', 'custom_sidebars' );
		}

		foreach( $posts as $post ) {
			$args = array(
				'name'          => sprintf( __( 'Sidebar: %s', 'custom_sidebars' ), $post->post_title ),
				'id'            => "sidebar-{$post->post_name}",
				'description'   => sprintf( __( 'This sidebar will appear on the %s single page.', 'cd-sidebar' ), $post->post_title ),
			    'class'         => '',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
			);

			register_sidebar( $args );
		}

	}
	
}

global $Custom_Sidebars;
$Custom_Sidebars = new Custom_Sidebars();
