<?php
add_action( 'wp_enqueue_scripts', 'themesflat_portfolios_scripts' );
/**
  * Load the scripts
*/
function themesflat_portfolios_scripts() {  
    wp_enqueue_script( 'themesflat-isotope', plugin_dir_url( __FILE__ ) . '/lib/js/isotope.min.js', array('jquery'), true );
    wp_enqueue_script( 'themesflat-imagesloaded', plugin_dir_url( __FILE__ ) . '/lib/js/imagesloaded.min.js', array('jquery'), true );    
}

add_action('init', 'register_portfolio_post_type');

/**
  * Register Portfolios post type
*/
function register_portfolio_post_type() {
    $labels = array(
        'name'                  => esc_html__( 'Khóa học', 'finance' ),
        'singular_name'         => esc_html__( 'Khóa học', 'finance' ),
        'rewrite'               => array( 'slug' => esc_html__( 'khoa-hoc' ) ),
        'menu_name'             => esc_html__( 'Khóa học', 'finance' ),
        'add_new'               => esc_html__( 'Thêm khóa học', 'finance' ),
        'add_new_item'          => esc_html__( 'Thêm khóa học', 'finance' ),
        'new_item'              => esc_html__( 'Thêm khóa học', 'finance' ),
        'edit_item'             => esc_html__( 'Cập nhật khóa học', 'finance' ),
        'view_item'             => esc_html__( 'Xem thông tin khóa học', 'finance' ),
        'all_items'             => esc_html__( 'Toàn bộ khóa học', 'finance' ),
        'search_items'          => esc_html__( 'Tìm kiếm', 'finance' ),
        'not_found'             => esc_html__( 'Không tìm thấy thông tin khóa học', 'finance' ),
        'not_found_in_trash'    => esc_html__( 'Không tìm thấy thông tin khóa học', 'finance' ),
        'parent_item_colon'     => esc_html__( 'Khóa học', 'finance' ),
        'not_found'             => esc_html__( 'Không tìm thấy thông tin khóa học', 'finance' ),
        'not_found_in_trash'    => esc_html__( 'Không tìm thấy thông tin khóa học', 'finance' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-format-gallery',
    );
    register_post_type( 'portfolios', $args );

    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'portfolios_updated_messages' );

/**
  * Portfolios update messages.
*/
function portfolios_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'portfolios' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Portfolios Updated. <a href="%s">View portfolios</a>', 'finance' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'finance' ),
        3  => esc_html__( 'Custom Field Deleted.', 'finance' ),
        4  => esc_html__( 'Portfolios Updated.', 'finance' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Portfolios Restored To Revision From %s', 'finance' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Portfolios Published. <a href="%s">View Portfolios</a>', 'finance' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Portfolios Saved.', 'finance' ),
        8  => sprintf( esc_html__('Portfolios Submitted. <a target="_blank" href="%s">Preview Portfolios</a>', 'finance' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Portfolios Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolios</a>', 'finance' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'finance' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Portfolios Draft Updated. <a target="_blank" href="%s">Preview Portfolios</a>', 'finance' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'register_portfolios_taxonomy' );

/**
  * Register portfolios taxonomy
*/
function register_portfolios_taxonomy() {
    $labels = array(
        'name'                       => esc_html__( 'Categories', 'finance' ),
        'singular_name'              => esc_html__( 'Categories', 'finance' ),
        'search_items'               => esc_html__( 'Search Categories', 'finance' ),
        'menu_name'                  => esc_html__( 'Categories', 'finance' ),
        'all_items'                  => esc_html__( 'All Categories', 'finance' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'finance' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'finance' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'finance' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'finance' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'finance' ),
        'update_item'                => esc_html__( 'Update Categories', 'finance' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'finance' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'finance' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolios_category', 'portfolios', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'register_portfolios_tag' );

/**
 * Register tag taxonomy
 */
function register_portfolios_tag() {
    $labels = array(
        'name'                       => esc_html__( 'Thẻ', 'finance' ),
        'singular_name'              => esc_html__( 'Thẻ', 'finance' ),
        'search_items'               => esc_html__( 'Tìm kiếm', 'finance' ),        
        'all_items'                  => esc_html__( 'Toàn bộ thẻ', 'finance' ),
        'new_item_name'              => esc_html__( 'Thêm thẻ mới', 'finance' ),
        'add_new_item'               => esc_html__( 'Thêm thẻ mới', 'finance' ),
        'edit_item'                  => esc_html__( 'Sửa thẻ', 'finance' ),
        'update_item'                => esc_html__( 'Sửa thẻ', 'finance' ),
        'menu_name'                  => esc_html__( 'Tags' ),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolios_tag', 'portfolios', $args );
    flush_rewrite_rules();
}

