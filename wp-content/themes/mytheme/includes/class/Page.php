<?php

class WP_Pages {

    //page property
    public $args;
    public $pages_folder = TFT_PATH.'/includes/wppages/';

    //initialization page
    public function __construct($page_args) {
        $this->args = $page_args;

        add_action( 'admin_menu',function () {
            extract($this->args);
            add_menu_page(
                $title,
                $name, 
                'manage_options', 
                $slug,
                array(&$this, 'load_parent'),   
                $icon,
                $order
            );
        });
    }

    //add subpage to the menu
    public function add_subpage($args) {
        add_action( 'admin_menu',function() use ($args) {   
            extract($args);
            $parent_slug = $this->args['slug'];
            add_submenu_page(
                $parent_slug,
                $title,
                $name,
                'manage_options', 
                $parent_slug.'_'.$slug,
                array('WP_Pages','tw_load_page')
            );
        });
    }

    //load content page from file
    public function load_parent() {
        //check folder is exists
        tw_folder_exists($this->pages_folder);
        $path = $this->pages_folder.$this->args['slug'].'.php';
        tw_file_exists($path);
        require $path;
    }

    //add subpage to the menu
    
    public static function add_submenu($args) {

        add_action( 'admin_menu',function() use ($args) {   
            extract($args);
            add_submenu_page(
                $parent,
                $title,
                $name,
                'manage_options', 
                $slug,
                array('WP_Pages','tw_load_page')
            );
        });
    }

    public static function tw_load_page() {
        $pages_folder = TFT_PATH.'/includes/wppages/';
        tw_folder_exists($pages_folder);
        tw_file_exists($pages_folder.$_GET['page'].'.php');
        require $pages_folder.$_GET['page'].'.php';
    }
}

