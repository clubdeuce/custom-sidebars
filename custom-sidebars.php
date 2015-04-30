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

require_once( 'includes/class-custom-sidebars.php' );
require_once 'includes/class-sidebar-details.php';

$Custom_Sidebars = new Custom_Sidebars();

add_action( 'admin_init', 'custom_sidebars_admin_init' );

function custom_sidebars_admin_init() {

	$custom_sidebar_details = new Custom_Sidebars_Details();

}