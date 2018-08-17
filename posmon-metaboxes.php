<?php
/*
Plugin Name: Posmon Metaboxes
Plugin URI:
Description: Agrega MetaBoxes al sitio Posmon con CMB2
Version: 1.0
Author: Jose Daniel Posada
Author URI:
License: GLP3
Licence URI: https://www.gnu.org/licenses/gpl.html
*/

if( file_exists(dirname(__FILE__) . '/CMB2/init.php') ) {
    require_once dirname(__FILE__) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'campos_lineas' );

function campos_lineas() {
    $prefix = 'posmon_campos_lineas_';

    // METABOX COLOR CONFIGURATION
    $metabox_color = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_color',
        'title'         => __('Configuración de color', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_color->add_field( array(
        'name'      => __('Color Principal', 'cmb2'),
        'desc'      => __('Seleccione el color principal de esta línea.', 'cmb2'),
        'id'      => $prefix . 'color_principal',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));

    $metabox_color->add_field( array(
        'name'      => __('Color Secundario', 'cmb2'),
        'desc'      => __('Seleccione el color secundario de esta línea (color barra inferior del slider).', 'cmb2'),
        'id'      => $prefix . 'color_secundario',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));

    $metabox_color->add_field( array(
        'name'      => __('Color Catálogo', 'cmb2'),
        'desc'      => __('Seleccione el color del título y barras del catálogo.', 'cmb2'),
        'id'      => $prefix . 'color_catalogo',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));

    $metabox_color->add_field( array(
        'name'      => __('Color Texto Catálogo', 'cmb2'),
        'desc'      => __('Seleccione el color del texto interno de las barras del catálogo.', 'cmb2'),
        'id'      => $prefix . 'color_texto_catalogo',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));


    // METABOX INDEX VIEW
    $metabox_index = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_index',
        'title'         => __('Vista en Página Principal', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_index->add_field( array(
        'name'    => 'Fondo',
        'desc'    => 'Imagen cuadrada de fondo para la página principal.',
        'id'      => $prefix . 'index_bg_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $metabox_index->add_field( array(
        'name'    => 'Imagen Modelo',
        'desc'    => 'Imagen con modelo del cuadrado en la página principal.',
        'id'      => $prefix . 'index_modelo_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );


    $metabox_index->add_field( array(
        'name'    => 'Ubicación Modelo',
        'desc'    => 'Corrección de la posicioón de la imagen modelo. Numero negativo para mover a la izquierda, positivo para la derecha.',
        'default' => '0',
        'id'      => $prefix . 'index_pos_modelo',
        'type'    => 'text_small'
    ) );

    // METABOX MAIN SLIDER
    $metabox_slider_principal = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_slider_principal',
        'title'         => __('Slider Principal', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_slider_principal->add_field( array(
        'name' => '<img src="' . get_template_directory_uri() . '/img/main_slider.jpg' . '" style="width: 100%;">',
        'desc' => 'Ejemplo',
        'type' => 'title',
        'id'   => 'wiki_test_title'
    ) );

    $metabox_slider_principal->add_field( array(
        'name'      => __('Color Título', 'cmb2'),
        'id'      => $prefix . 'color_titulo_slider_principal',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#000', '#fff'),
            ) ),
        ),
    ));

    $metabox_slider_principal->add_field( array(
        'name' => 'Descripción',
        'id' => $prefix . 'slider_principal_desc',
        'type' => 'textarea_small'
    ) );

    $metabox_slider_principal->add_field( array(
        'name'      => __('Color Descripción', 'cmb2'),
        'id'      => $prefix . 'color_desc_slider_principal',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#000', '#fff'),
            ) ),
        ),
    ));

    $metabox_slider_principal->add_field( array(
        'name'    => 'Imagen Modelo',
        'desc'    => 'Imagen con modelo del slider principal de la línea.',
        'id'      => $prefix . 'slider_principal_modelo_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ));

    $metabox_slider_principal->add_field( array(
        'name'    => 'Imagen Fondo Difuminada',
        'desc'    => 'Imagen difuminada para el fondo del slider principal.',
        'id'      => $prefix . 'slider_principal_fondo_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ));

    // METABOX SLIDERS
    $metabox_sliders = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_sliders',
        'title'         => __('Sliders', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_sliders->add_field( array(
        'id'          => $prefix . 'sliders_group',
        'type'        => 'group',
        'description' => '<img src="' . get_template_directory_uri() . '/img/slider_guide_type.png' . '" style="width: 100%;">',
        'object_types'  => array('lineas'),
        'options'     => array(
            'group_title'   => __( 'Slider {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Agregar otro Slider', 'cmb2' ),
            'remove_button' => __( 'Eliminar Slider', 'cmb2' ),
            'sortable'      => true, // beta
            'closed'     => true, // true to have the groups closed by default
        ),
    ) );


    // Id's for group's fields only need to be unique for the group. Prefix is not needed.

    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name'    => 'Tipo',
        'id'      => 'type',
        'type'    => 'radio_inline',
        'options' => array(
            'image-right'  => __( 'Tipo 1', 'cmb2' ),
            'image-left'  => __( 'Tipo 2', 'cmb2' ),
        ),
        'default' => 'image-right',
    ));




    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name' => 'Título',
        'id'   => 'title',
        'type' => 'textarea_small',
    ));

    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name'      => __('Color Título', 'cmb2'),
        'id'      => 'color_title',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#000', '#fff'),
            ) ),
        ),
    ));

    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name' => 'Descripción',
        'id'   => 'desc',
        'type' => 'textarea_small',
    ));

    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name'      => __('Color Descripción', 'cmb2'),
        'id'      => 'color_desc',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#000', '#fff'),
            ) ),
        ),
    ));


    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name'    => 'Imagen',
        'id'      => 'image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ));

    $metabox_sliders->add_group_field($prefix . 'sliders_group', array(
        'name'    => 'Imagen Modelo',
        'id'      => 'image_modelo',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Subir Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ));


}

add_action( 'cmb2_admin_init', 'campos_productos' );

function campos_productos() {
    $prefix = 'posmon_campos_productos_';

    // METABOX CONTENIDO
    $metabox_producto = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_producto',
        'title'         => __('Información del producto', 'cmb2'),
        'object_types'  => array('productos'),
    ));

    $metabox_producto->add_field( array(
        'name'    => 'Género',
        'id'      =>  $prefix . 'genero_producto',
        'type'    => 'radio_inline',
        'options' => array(
            'unisex'     => __( 'Unisex', 'cmb2' ),
            'femenino'   => __( 'Femenino', 'cmb2' ),
            'masculino'  => __( 'Masculino', 'cmb2' ),
        ),
        'default' => 'unisex',
    ));

    $metabox_producto->add_field( array(
        'name' => 'Descripción',
        'id'   => $prefix . 'desc_producto',
        'type' => 'textarea_small',
    ));

    $metabox_producto->add_field( array(
        'name'      => __('Opciones', 'cmb2'),
        'id'        => $prefix . 'opciones_producto',
        'type'      => 'text',
        'repeatable'=> true,
        'text' => array(
            'add_row_text' => 'Añadir otra opción',
        ),
    ));

    $metabox_producto->add_field( array(
        'name' => 'Galería',
        'desc' => 'Máximo 10 imágenes.',
        'id'   => $prefix . 'galeria_producto',
        'type' => 'file_list',
        'query_args' => array( 'type' => 'image' ), 
        'text' => array(
            'add_upload_files_text' => 'Agregar Imágenes',
            'remove_image_text' => 'Quitar Imagen', 
            'file_text' => 'Imagen:', 
            'file_download_text' => 'Descargar', 
            'remove_text' => 'Quitar', 
        ),
    ));

    $metabox_producto->add_field( array(
        'name'    => 'Imagen Destacada',
        'desc'    => 'Imagen que se muestra en la galería general de todos los productos.',
        'id'      => $prefix . 'imagen_destacada_producto',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );

}

add_action( 'cmb2_admin_init', 'campos_telas' );

function campos_telas() {
    $prefix = 'posmon_campos_telas_';

    // METABOX CONTENIDO
    $metabox_telas = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_producto',
        'title'         => __('Información del insumo', 'cmb2'),
        'object_types'  => array('telas'),
    ));

    $metabox_telas->add_field( array(
        'name'    => 'Descripción corta',
        'desc'      => __('ej. antifluidos', 'cmb2'),
        'id'      =>  $prefix . 'descripcion_tela',
        'type'    => 'text',
    ));

    $metabox_telas->add_field( array(
        'name'      => __('Color Barra', 'cmb2'),
        'desc'      => __('Seleccione el color de la barra del catálogo.', 'cmb2'),
        'id'      => $prefix . 'color_barra',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));

    $metabox_telas->add_field( array(
        'name' => 'Galería',
        'id'   => $prefix . 'galeria_tela',
        'type' => 'file_list',
        'query_args' => array( 'type' => 'image' ), 
        'text' => array(
            'add_upload_files_text' => 'Agregar Imágenes',
            'remove_image_text' => 'Quitar Imagen', 
            'file_text' => 'Imagen:', 
            'file_download_text' => 'Descargar', 
            'remove_text' => 'Quitar', 
        ),
    ));

}


add_action( 'cmb2_admin_init', 'campos_insumos' );

function campos_insumos() {
    $prefix = 'posmon_campos_insumos_';

    $metabox_color = new_cmb2_box( array(
        'id'           => $prefix . 'metabox_color',
        'title'        => 'Color',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'insumos.php' ),
    ));

    $metabox_color->add_field( array(
        'name'      => __('Color Títulos Catálogo', 'cmb2'),
        'id'      => $prefix . 'color_titulo_catalogo',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode( array(
                // Iris Options set here as values in the 'data-colorpicker' array
                'palettes' => array( '#0070B8', '#ED3237', '#F58634', '#754598', '#67BD50', '#FFCC29'),
            ) ),
        ),
    ));

    $metabox_principal = new_cmb2_box( array(
        'id'           => $prefix . 'metabox_principal',
        'title'        => 'Textos Principales',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'insumos.php' ),
    ));

    $metabox_principal->add_field( array(
        'name'    => 'Párrafo 1',
        'id'      =>  $prefix . 'principal_parrafo_1',
        'type' => 'textarea'
    ));

    $metabox_principal->add_field( array(
        'name'    => 'Párrafo 2',
        'id'      =>  $prefix . 'principal_parrafo_2',
        'type' => 'textarea'
    ));

    $metabox_principal->add_field( array(
        'name'    => 'Párrafo 3',
        'id'      =>  $prefix . 'principal_parrafo_3',
        'type' => 'textarea'
    ));

    $metabox_principal->add_field( array(
        'name'    => 'Imagen Fondo Grande',
        'desc'    => 'Imagen que se muestra a la derecha.',
        'id'      => $prefix . 'principal_fondo_1',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );

    $metabox_principal->add_field( array(
        'name'    => 'Imagen Fondo Pequeña',
        'desc'    => 'Imagen que se muestra a la izquierda.',
        'id'      => $prefix . 'principal_fondo_2',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );

    $metabox_insumos = new_cmb2_box( array(
        'id'           => $prefix . 'metabox_insumos',
        'title'        => 'Insumos',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'insumos.php' ),
    ));

    $metabox_insumos->add_field( array(
        'name'    => 'Texto',
        'id'      =>  $prefix . 'insumos_desc',
        'type' => 'textarea'
    ));

    $metabox_insumos->add_field( array(
        'name'    => 'Imagen Marcas',
        'id'      => $prefix . 'insumos_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );


    $metabox_tecnologias = new_cmb2_box( array(
        'id'           => $prefix . 'metabox_tecnologias',
        'title'        => 'Tecnologías Textiles',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'insumos.php' ),
    ));

    $metabox_tecnologias->add_field( array(
        'name'    => 'Texto',
        'id'      =>  $prefix . 'tecnologias_desc',
        'type' => 'textarea'
    ));

    $metabox_tecnologias->add_field( array(
        'name'    => 'Imagen Tecnologías Textiles',
        'id'      => $prefix . 'tecnologias_image_1',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );

    $metabox_tecnologias->add_field( array(
        'name'    => 'Imagen Beneficios Adicionales',
        'id'      => $prefix . 'tecnologias_image_2',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );

    $metabox_tecnologias->add_field( array(
        'name'    => 'Logo Lafayette',
        'id'      => $prefix . 'tecnologias_logo',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ) );
}


/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function posmon_register_main_options_metabox() {

    $prefix = 'posmon_admin_';
    /**
    * Registers main options page menu item and form.
    */
   $main_options = new_cmb2_box( array(
       'id'           => $prefix . 'main_options_page',
       'title'        => esc_html__( 'Posmon', 'cmb2' ),
       'object_types' => array( 'options-page' ),
       'option_key'   => $prefix . 'main_options', 
       'icon_url'        => 'dashicons-welcome-widgets-menus', 
       'position'        => 20,
       'save_button'     => esc_html__( 'Guardar Cambios', 'cmb2' ), 
   ) );

    $main_options->add_field( array(
        'name'    => 'Logo',
        'id'      => 'logo',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, 
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen'
        ),
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ));

    $main_options->add_field( array(
        'name' => 'Email',
        'id'   => 'email',
        'type' => 'text_email',
    ));

    $main_options->add_field( array(
        'name' => 'Teléfono Fijo',
        'id'   => 'telefono',
        'type' => 'text_medium',
    ));

    $main_options->add_field( array(
        'name' => 'Celular',
        'id'   => 'celular',
        'type' => 'text_small',
    ));

    $main_options->add_field( array(
        'name' => 'Ciudad - País',
        'id'   => 'ciudad_pais',
        'type' => 'text_medium',
    ));

    $main_options->add_field( array(
        'name'    => 'Fondo Contáctenos',
        'id'      => 'fondo_contacto',
        'type'    => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' 
        ),
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ));

   $empresa_options = new_cmb2_box( array(
       'id'           => $prefix . 'empresa_options_page',
       'title'        => esc_html__( 'La Empresa', 'cmb2' ),
       'object_types' => array( 'options-page' ),
       'option_key'   => $prefix . 'empresa_options',
       'parent_slug'  => $prefix . 'main_options',
   ) );


   $empresa_options->add_field( array(
        'name' => '¿Quienes Somos?',
        'id' => 'quienes_somos',
        'type' => 'textarea'
    ));

    $empresa_options->add_field( array(
        'name' => 'Nuesta Historia',
        'id' => 'historia',
        'type' => 'textarea'
    ));

    $empresa_options->add_field( array(
        'id'          => 'nuestros_valores',
        'type'        => 'group',
        'title'       => 'Valores',
        'description' => 'Valores: Máximo 6',
        'options'     => array(
            'group_title'   => __( 'Valor {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Agregar otro Valor', 'cmb2' ),
            'remove_button' => __( 'Eliminar Valor', 'cmb2' ),
            'sortable'      => true, // beta
            'closed'     => true, // true to have the groups closed by default
        ),
    ) );


    // Id's for group's fields only need to be unique for the group. Prefix is not needed.

    $empresa_options->add_group_field('nuestros_valores', array(
        'name' => 'Valor',
        'id' => 'valor',
        'type' => 'text_medium',
    ));

    $empresa_options->add_group_field('nuestros_valores', array(
        'name' => 'Descripción',
        'id'   => 'desc',
        'type' => 'textarea_small',
    ));

    $empresa_options->add_field( array(
        'name' => 'Misión',
        'id' => 'mision',
        'type' => 'textarea'
    ));

    $empresa_options->add_field( array(
        'name' => 'Visión',
        'id' => 'vision',
        'type' => 'textarea'
    ));

    $empresa_options->add_field( array(
        'name'    => 'Fondo La Empresa',
        'id'      => 'fondo_empresa',
        'type'    => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar Imagen' 
        ),
        'query_args' => array(
            'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
    ));

    
}
add_action( 'cmb2_admin_init', 'posmon_register_main_options_metabox' );