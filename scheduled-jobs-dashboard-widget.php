<?php
/*
Plugin Name: scheduled jobs dashboard widget
Plugin URI: http://staude.net/wordpress/plugins/ScheduledJobsDashboardWidget
Description: Implements a Widget to show the Wordpress Cronjobs in the Dashboard
Text Domain: scheduled_jobs_dashboard_widget
Domain Path: languages
Author: Frank Staude
Version: 0.2.1
Author URI: http://www.staude.net/
Compatibility: WordPress 3.5
*/

/*  Copyright 2012  Frank Staude  (email : frank@staude.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include_once dirname( __FILE__ ) .'/class-scheduled-jobs-dashboard-widget.php';

$z8n_fs_scheduled_jobs_dashboard_widget = new z8n_fs_scheduled_jobs_dashboard_widget();

?>
