<?php 
if( function_exists('acf_add_local_field_group') ):
    $list_page = get_pages();
    $list_post = get_posts();
    $list_cate = get_categories();
    $res_page = [];
    $res_post = [];
    $res_cate = [];

    foreach ($list_page as $key => $value) {
        $res_page[($value->ID ?? 1)] = $value->post_title ?? "";
    }
    foreach ($list_post as $key => $value) {
        $res_post[($value->ID ?? 1)] = $value->post_title ?? "";
    }
    foreach ($list_cate as $key => $value) {
        $res_cate[($value->term_id ?? 1)] = $value->name ?? "";
    }


    acf_add_local_field_group(array(
        'key' => 'group_5daefab805e6b',
        'title' => 'list page un remove',
        'fields' => array(
            array(
                'key' => 'field_5daefac41da21',
                'label' => 'Danh sách page chống xóa',
                'name' => 'list_page_unremove',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $res_page,
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5daefbd11da22',
                'label' => 'Danh sách Post chống xóa',
                'name' => 'list_post_unremove',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $res_post,
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5daefbf81da23',
                'label' => 'Danh sách Category chống xóa',
                'name' => 'list_cate_unremove',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $res_cate,
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-hiden-page-option',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;