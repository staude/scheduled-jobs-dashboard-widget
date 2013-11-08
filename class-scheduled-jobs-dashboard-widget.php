<?php

/*  Copyright 2012-2013  Frank Staude  (email : frank@staude.net)

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


class z8n_fs_scheduled_jobs_dashboard_widget {

    function __construct() {
        add_action( 'wp_dashboard_setup', array( 'z8n_fs_scheduled_jobs_dashboard_widget', 'registerWidget' ) );
        add_action( 'plugins_loaded',     array( 'z8n_fs_scheduled_jobs_dashboard_widget', 'load_translations' ) );
    }
    /**
     * Register the widget
     */
    static public function registerWidget () {
        wp_add_dashboard_widget( 'z8n_fs_scheduled_jobs_dashboard_widget',
                                 apply_filters ( 'scheduled_jobs_dashboard_widget_title', __( 'Scheduled Jobs', 'scheduled-jobs-dashboard-widget' ) ),
                                 array( 'z8n_fs_scheduled_jobs_dashboard_widget',
                                        'scheduled_jobs_widget' )
                               );
        
    }
    
    static public function load_translations() {
        load_plugin_textdomain( 'scheduled-jobs-dashboard-widget', false, dirname( plugin_basename( __FILE__ )) . '/languages/'  ); 
    }
    
    /**
     * the widget content
     */
    static public function scheduled_jobs_widget() {
        $cron = _get_cron_array();
        $schedules = wp_get_schedules();
        $date_format = 'M j, Y @ G:i';
    ?>    
<table>
    <tr>
        <th scope="col"><?php echo apply_filters ( 'scheduled_jobs_dashboard_widget_next_run', __( 'Next Run (UTC)', 'scheduled-jobs-dashboard-widget' ) ); ?></th>
        <th scope="col"><?php echo apply_filters ( 'scheduled_jobs_dashboard_widget_schedule', __( 'Schedule', 'scheduled-jobs-dashboard-widget' ) ); ?></th>
        <th scope="col"><?php echo apply_filters ( 'scheduled_jobs_dashboard_widget_hook', __( 'Hook', 'scheduled-jobs-dashboard-widget' ) ); ?></th>
    </tr>
    <tbody>
    <?php foreach ( $cron as $timestamp => $cronhooks) { ?>
        <?php foreach ( (array) $cronhooks as $hook => $events ) { ?>
            <?php foreach ( (array) $events as $event ) { ?>
            <tr>
                <td><?php echo date_i18n ( $date_format, wp_next_scheduled( $hook ) ); ?></td>
                <td>
                <?php if ($event [ 'schedule' ] ) {
                    echo $schedules[ $event[ 'schedule' ]][ 'display' ];
                } else {
                    echo apply_filters ( 'scheduled_jobs_dashboard_widget_once', __( 'once', 'scheduled-jobs-dashboard-widget' ) );
                } ?>
                </td>
                <td><?php echo $hook; ?></td>
            </tr>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    </tbody>
</table>

    <?php
    }
}
