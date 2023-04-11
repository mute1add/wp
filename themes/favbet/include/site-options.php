<?php
defined('ABSPATH') || exit;

function add_department_metabox() {
    $cmb = new_cmb2_box( array(
        'id'           => 'employee_metabox',
        'title'        => 'Employee Details',
        'object_types' => array( 'vacancies' ),
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true,
    ) );

    $cmb->add_field( array(
        'name'    => 'department',
        'desc'    => 'Choose the department of the employee',
        'id'      => '_employee_department',
        'type'    => 'select',
        'options' => array(
            'Art designer' => 'Art designer',
            'Developers' => 'Developers',
            'Marketing' => 'Marketing',
            'Manager' => 'Manager',
        ),
    ) );
}

add_action( 'cmb2_admin_init', 'add_department_metabox' );


function custom_vacancies_fields() {
    $cmb = new_cmb2_box( array(
        'id'            => 'vacancies_meta',
        'title'         => __( 'Vacancies Information', 'cmb2' ),
        'object_types'  => array( 'vacancies' ),
        'context'       => 'normal',
        'priority'      => 'high',
    ) );

    // Location field
    $cmb->add_field( array(
        'name'    => 'Location',
        'desc'    => 'Enter the location of the empl',
        'id'      => '_vacancy_location',
        'type'    => 'text',
    ) );

    // Salary field
    $cmb->add_field( array(
        'name'    => 'Salary',
        'desc'    => 'Enter the salary for the empl',
        'id'      => '_vacancy_salary',
        'type'    => 'text',
    ) );

    // Phone field
    $cmb->add_field( array(
        'name'    => 'Phone',
        'desc'    => 'Enter the phone number for the empl',
        'id'      => '_vacancy_phone',
        'type'    => 'text',
    ) );
}
add_action( 'cmb2_admin_init', 'custom_vacancies_fields' );

function add_vacancies_post_type()
{
    $labels = array(
        'name' => _x('vacancies', 'Post Type General Name', 'favbet'),
        'singular_name' => _x('vacancies', 'Post Type Singular Name', 'favbet'),
        'menu_name' => __('vacancies', 'favbet'),
        'name_admin_bar' => __('vacancies', 'favbet'),
        'archives' => __('vacancies Archives', 'favbet'),
        'attributes' => __('vacancies Attributes', 'favbet'),
        'parent_item_colon' => __('Parentvacancies:', 'favbet'),
        'all_items' => __('All vacancies', 'favbet'),
        'add_new_item' => __('Add New vacancies', 'favbet'),
        'add_new' => __('Add New', 'favbet'),
        'new_item' => __('Newvacancies', 'favbet'),
        'edit_item' => __('Editvacancies', 'favbet'),
        'update_item' => __('Updatevacancies', 'favbet'),
        'view_item' => __('Viewvacancies', 'favbet'),
        'view_items' => __('View vacancies', 'favbet'),
        'search_items' => __('Searchvacancies', 'favbet'),
        'not_found' => __('Not found', 'favbet'),
        'not_found_in_trash' => __('Not found in Trash', 'favbet'),
        'featured_image' => __('Featured Image', 'favbet'),
        'set_featured_image' => __('Set featured image', 'favbet'),
        'remove_featured_image' => __('Remove featured image', 'favbet'),
        'use_featured_image' => __('Use as featured image', 'favbet'),
        'insert_into_item' => __('Insert intovacancies', 'favbet'),
        'uploaded_to_this_item' => __('Uploaded to thisvacancies', 'favbet'),
        'items_list' => __('vacancies list', 'favbet'),
        'items_list_navigation' => __('vacancies list navigation', 'favbet'),
        'filter_items_list' => __('Filter vacancies list', 'favbet'),
    );
    $args = array(
        'label' => __('vacancies', 'favbet'),
        'description' => __('vacancies Description', 'favbet'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => array('vacancies_type'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_vacancies' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('vacancies', $args);
}

add_action('init', 'add_vacancies_post_type', 0);
