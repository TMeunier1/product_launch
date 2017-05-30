<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Tibau Emails
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Anyway, how is your sexlife ?
Author: Tommy Wiseau
Version: 0.1
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'tibau_emails_menu' );

function tibau_emails_menu() {
    add_menu_page( "List of Emails", "Emails", "manage_options", "menu-tibau-emails", "tibau_emails");
}

function tibau_emails() {
    global $wpdb;
    $result = $wpdb->get_results("SELECT * FROM email");

    ?>
    <table>
        <?php
    foreach ($result as $print) {?>
        <?php
            echo "<tr>";
            echo "<td>".$print->name."</td>";
            echo "<td>".$print->email."</td>";
            echo "<td>".$print->format."</td>";
            echo "</tr>";
    }
    ?>
    </table>
    <?php
}
?>
