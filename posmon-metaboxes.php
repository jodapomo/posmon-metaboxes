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


    $metabox_index = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_index',
        'title'         => __('Pantalla Principal', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_slider_principal = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_slider_principal',
        'title'         => __('Slider Principal', 'cmb2'),
        'object_types'  => array('lineas'),
    ));

    $metabox_sliders = new_cmb2_box( array(
        'id'            => $prefix . 'metabox_sliders',
        'title'         => __('Sliders', 'cmb2'),
        'object_types'  => array('lineas'),
    ));


    $metabox_sliders->add_field( array(
        'id'          => 'wiki_test_repeat_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'object_types'  => array('lineas'),
        'options'     => array(
            'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Entry', 'cmb2' ),
            'remove_button' => __( 'Remove Entry', 'cmb2' ),
            'sortable'      => true, // beta
            'closed'     => true, // true to have the groups closed by default
        ),
    ) );


    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $metabox_sliders->add_group_field('wiki_test_repeat_group', array(
    'name' => 'Entry Title',
    'id'   => 'title',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $metabox_sliders->add_group_field('wiki_test_repeat_group', array(
    'name' => 'Description',
    'description' => 'Write a short description for this entry',
    'id'   => 'description',
    'type' => 'textarea_small',
    ) );

    $metabox_sliders->add_group_field('wiki_test_repeat_group', array(
    'name' => 'Entry Image',
    'id'   => 'image',
    'type' => 'file',
    ) );

    $metabox_sliders->add_group_field('wiki_test_repeat_group', array(
    'name' => 'Image Caption',
    'id'   => 'image_caption',
    'type' => 'text',
    ) );

}

