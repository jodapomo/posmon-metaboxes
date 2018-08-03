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
            'blur-bg'   => __( 'Tipo 1', 'cmb2' ),
            'full-bg'   => __( 'Tipo 2', 'cmb2' ),
            'half-img'  => __( 'Tipo 3', 'cmb2' ),
        ),
        'default' => 'blur-bg',
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
        'desc'    => '<h3>Según el tipo de slider:</h3>- Tipo 1: imagen fondo slider (se recomienda sea desenfocada). <br> - Tipo 2: imagen fondo slider (imagen mucho más ancha que alta). <br> - Tipo 3: imagen a la derecha del slider.',
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
        'desc'    => 'Imagen con modelo. Sólo aplica para slider Tipo 1',
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