<?php

/**
 * 
 * create table for attendee of courses
 * 
 */
function cours_database()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'cours';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT,
        firstname varchar(255) not null,
        lastname varchar(255) not null,
        phone varchar(20) not null,
        email varchar(100) not null,
        cours_id int not null,
        primary key(id)
    )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'cours_database');

/**
 * 
 * 
 * create table for contacts
 * 
 */
function contact_database()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'contacts';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT,
        firstname varchar(255) not null,
        lastname varchar(255) not null,
        phone varchar(20) not null,
        email varchar(100) not null,
        comment text not null,
        primary key(id)
    )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'contact_database');

/**
 * 
 * create table for subscribe
 * 
 */
function abonnement_database()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'abonnements';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT,
        firstname varchar(255) not null,
        lastname varchar(255) not null,
        phone varchar(20) not null,
        abonnement text not null,
        primary key(id)
    )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'abonnement_database');
