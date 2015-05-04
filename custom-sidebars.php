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

/*
Plugin Name: Custom Sidebars
Plugin URI: http://github.com/clubduece/custom-sidebars
Description: Allows users to create custom sidebars on a page/post basis.
Version: 0.3
Author: clubDuece
Author URI: http://github.com/clubduece
License: GPLv2 or later
*/
if ( ! defined( 'CUSTOM_SIDEBARS' ) ) {
	define( 'CUSTOM_SIDEBARS', true );
}

if ( CUSTOM_SIDEBARS ) {
	require_once 'includes/class-custom-sidebars.php';
	require_once 'includes/class-sidebar-details.php';

	$Custom_Sidebars = new Custom_Sidebars();
}
