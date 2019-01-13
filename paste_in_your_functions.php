/////////////////////////////////////////////////////////////////////////
function cptui_register_my_cpts_trabajos() {

	/**
	 * Post Type: Trabajo.
	 */

	$labels = array(
		"name" => __( "Trabajo", "" ),
		"singular_name" => __( "Trabajos", "" ),
		"menu_name" => __( "Porfolio", "" ),
		"all_items" => __( "Todos los trabajos", "" ),
		"add_new" => __( "Añadir trabajo", "" ),
		"add_new_item" => __( "Añadir nuevo trabajo", "" ),
		"edit_item" => __( "Editar trabajo", "" ),
		"new_item" => __( "Nuevo trabajo", "" ),
		"view_item" => __( "Ver trabajo", "" ),
		"view_items" => __( "Ver trabajos", "" ),
		"search_items" => __( "Buscar trabajo", "" ),
		"not_found" => __( "No se ha encontrado ningun trabajo", "" ),
		"not_found_in_trash" => __( "No se ha encontrado en la papelera ningun trabajo", "" ),
		"parent_item_colon" => __( "Trabajo padre", "" ),
		"featured_image" => __( "Imagen del trabajo", "" ),
		"set_featured_image" => __( "Fijar la imagen del trabajo", "" ),
		"remove_featured_image" => __( "Eliminar la imagen del trabajo", "" ),
		"use_featured_image" => __( "Usar como imagen del trabajo", "" ),
		"archives" => __( "Porfolio", "" ),
		"insert_into_item" => __( "Insertar trabajo", "" ),
		"uploaded_to_this_item" => __( "Subido a este trabajo", "" ),
		"filter_items_list" => __( "Filtrar lista de trabajos", "" ),
		"items_list_navigation" => __( "Navegacion de lista de trabajos", "" ),
		"items_list" => __( "Lista de trabajos", "" ),
		"attributes" => __( "Atributos de trabajos", "" ),
		"name_admin_bar" => __( "Trabajo", "" ),
		"parent_item_colon" => __( "Trabajo padre", "" ),
	);

	$args = array(
		"label" => __( "Trabajo", "" ),
		"labels" => $labels,
		"description" => "<h1>This is a description, and it shows in frontend.</h1>",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "porfolioABC",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "porfolio",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "porfolio", "with_front" => false ),
		"query_var" => "slug-query",
		"menu_position" => 33,
		"menu_icon" => "dashicons-screenoptions",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "tipos_trabajos" ),
	);

	register_post_type( "trabajos", $args );
}

add_action( 'init', 'cptui_register_my_cpts_trabajos' );







/////////////////////////////////////////////////////////////////////////
function cptui_register_my_taxes_tipos_trabajos() {

	/**
	 * Taxonomy: Tipos de trabajos.
	 */

	$labels = array(
		"name" => __( "Tipos de trabajos", "" ),
		"singular_name" => __( "Tipo trabajo", "" ),
		"menu_name" => __( "Tipos", "" ),
		"all_items" => __( "Todos los tipos de trabajos", "" ),
		"edit_item" => __( "Editar tipo de trabajo", "" ),
		"view_item" => __( "Ver tipo de trabajo", "" ),
		"update_item" => __( "Actualizar tipo de trabajo", "" ),
		"add_new_item" => __( "Añadir tipo de trabajo", "" ),
		"new_item_name" => __( "Tipo de trabajo", "" ),
		"parent_item" => __( "Tipo de trabajo superior", "" ),
		"parent_item_colon" => __( "Tipo de trabajo padre:", "" ),
		"search_items" => __( "Buscar tipo de trabajo", "" ),
		"popular_items" => __( "Buscar tipos de trabajos populares", "" ),
		"separate_items_with_commas" => __( "Separar tipos con comas", "" ),
		"add_or_remove_items" => __( "Añadir o eliminar tipos", "" ),
		"choose_from_most_used" => __( "Elige de los más usados", "" ),
		"not_found" => __( "No encontrado", "" ),
		"no_terms" => __( "No hay terminos", "" ),
		"items_list_navigation" => __( "Navegación de lista", "" ),
		"items_list" => __( "Lista", "" ),
	);

	$args = array(
		"label" => __( "Tipos de trabajos", "" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'tipos_trabajos', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "tipos_trabajos",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "tipos_trabajos", array( "trabajos" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_tipos_trabajos' );
/////////////////////////////////////////////////////////////////////////
