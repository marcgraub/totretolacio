<?php
/**
 * Post types for totretolacio theme
 *
 * @package totretolacio
 */

 // Register Custom Post Type
 function totretolacio_serveis() {

 	$labels = array(
 		'name'                  => _x( 'serveis', 'Post Type General Name', 'text_totretolacio' ),
 		'singular_name'         => _x( 'servei', 'Post Type Singular Name', 'text_totretolacio' ),
 		'menu_name'             => __( 'Serveis', 'text_totretolacio' ),
 		'name_admin_bar'        => __( 'Serveis', 'text_totretolacio' ),
 		'archives'              => __( 'Serveis', 'text_totretolacio' ),
 		'parent_item_colon'     => __( 'Servei pare:', 'text_totretolacio' ),
 		'all_items'             => __( 'Tots els serveis', 'text_totretolacio' ),
 		'add_new_item'          => __( 'Afegir nou servei', 'text_totretolacio' ),
 		'add_new'               => __( 'Afegir nou servei', 'text_totretolacio' ),
 		'new_item'              => __( 'Nou servei', 'text_totretolacio' ),
 		'edit_item'             => __( 'Editar servei', 'text_totretolacio' ),
 		'update_item'           => __( 'Actualitzar servei', 'text_totretolacio' ),
 		'view_item'             => __( 'Veure servei', 'text_totretolacio' ),
 		'search_items'          => __( 'Buscar servei', 'text_totretolacio' ),
 		'not_found'             => __( 'No trobat', 'text_totretolacio' ),
 		'not_found_in_trash'    => __( 'No trobat en la basura', 'text_totretolacio' ),
 		'featured_image'        => __( 'Imatge destacada', 'text_totretolacio' ),
 		'set_featured_image'    => __( 'Assignar imatge destacada', 'text_totretolacio' ),
 		'remove_featured_image' => __( 'Eliminar imatge destacada', 'text_totretolacio' ),
 		'use_featured_image'    => __( 'Utilitzar com imatge destacada', 'text_totretolacio' ),
 		'insert_into_item'      => __( 'Inserir en el servei', 'text_totretolacio' ),
 		'uploaded_to_this_item' => __( 'Pujat a aquest servei', 'text_totretolacio' ),
 		'items_list'            => __( 'Llista de serveis', 'text_totretolacio' ),
 		'items_list_navigation' => __( 'Navegació de la llista de serveis', 'text_totretolacio' ),
 		'filter_items_list'     => __( 'Filtrar llista de serveis', 'text_totretolacio' ),
 	);
 	$args = array(
 		'label'                 => __( 'servei', 'text_totretolacio' ),
 		'description'           => __( 'Serveis', 'text_totretolacio' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'thumbnail', 'page-attributes', 'editor'),
 		'taxonomies'            => array( 'category', 'post_tag' ),
 		'hierarchical'          => false,
 		'public'                => true,
 		'show_ui'               => true,
 		'show_in_menu'          => true,
 		'menu_position'         => 5,
 		'menu_icon'             => 'dashicons-list-view',
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => true,
 		'exclude_from_search'   => false,
 		'publicly_queryable'    => true,
 		'capability_type'       => 'page',
 	);
 	register_post_type( 'serveis', $args );

 }
 add_action( 'init', 'totretolacio_serveis', 0 );

 /**
  * Register custom post type textos totretolacio
  */
 function textos_totretolacio() {

  $labels = array(
    'name'                  => _x( 'Textos totretolacio', 'Post Type General Name', 'totretolacio' ),
    'singular_name'         => _x( 'Texto totretolacio', 'Post Type Singular Name', 'totretolacio' ),
    'menu_name'             => __( 'Textos totretolacio', 'totretolacio' ),
    'name_admin_bar'        => __( 'Textos smarweb', 'totretolacio' ),
    'archives'              => __( 'Archivo de textos de smarweb', 'totretolacio' ),
    'parent_item_colon'     => __( 'Elemento padre:', 'totretolacio' ),
    'all_items'             => __( 'Todos los textos', 'totretolacio' ),
    'add_new_item'          => __( 'Añadir nuevo texto', 'totretolacio' ),
    'add_new'               => __( 'Añadir nuevo', 'totretolacio' ),
    'new_item'              => __( 'Nuevo texto', 'totretolacio' ),
    'edit_item'             => __( 'Editar texto', 'totretolacio' ),
    'update_item'           => __( 'Actualizar texto', 'totretolacio' ),
    'view_item'             => __( 'Ver texto', 'totretolacio' ),
    'search_items'          => __( 'Buscar texto', 'totretolacio' ),
    'not_found'             => __( 'No encontrado', 'totretolacio' ),
    'not_found_in_trash'    => __( 'No encontrado en la papelera', 'totretolacio' ),
    'featured_image'        => __( 'Imagen destacada', 'totretolacio' ),
    'set_featured_image'    => __( 'Assignar imagen destacada', 'totretolacio' ),
    'remove_featured_image' => __( 'Eliminar imagen destacada', 'totretolacio' ),
    'use_featured_image'    => __( 'Utilizar como imagen destacada', 'totretolacio' ),
    'insert_into_item'      => __( 'Insertar en el texto', 'totretolacio' ),
    'uploaded_to_this_item' => __( 'Subido a este texto', 'totretolacio' ),
    'items_list'            => __( 'Lista de textos', 'totretolacio' ),
    'items_list_navigation' => __( 'Navegación de la lista de textos', 'totretolacio' ),
    'filter_items_list'     => __( 'Filtrar la lista de textos', 'totretolacio' ),
  );
  $args = array(
    'label'                 => __( 'Texto totretolacio', 'totretolacio' ),
    'description'           => __( 'Textos de les webs creades amb el tema totretolacio', 'totretolacio' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'page-attributes', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 25,
    'menu_icon'             => 'dashicons-media-text',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'textos_totretolacio', $args );

 }
 add_action( 'init', 'textos_totretolacio', 0 );
