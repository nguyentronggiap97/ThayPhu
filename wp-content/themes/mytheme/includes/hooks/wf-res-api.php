<?php 

//register api
add_action( 'rest_api_init', function () {
    register_rest_route( 'worldfoody/v1', 'products', array(
        'methods' => 'GET',
        'callback' => 'wf_get_all_products',
    ) );
} );

//the api get all products for search
function wf_get_all_products($data) {
    $products = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'product'
    ));
    
    $arr_return = null;

    while($products->have_posts()) {
        $products->the_post();

        $prd = wc_get_product(get_the_ID());
        $status = true;

        if($prd->get_stock_status() == 'instock') {
            $status = true;
        }

        $arr_return[] = array(
            'id' => get_the_ID(),
            'label' => get_the_title(),
            'price' => wc_price($prd->get_price()),
            'isHave' => $status,
            'thumbnail' => get_the_post_thumbnail_url(get_the_ID(),'tw_post_thumbnail'),
            'url' => get_permalink(get_the_ID())
        );
    }

    return $arr_return;
}