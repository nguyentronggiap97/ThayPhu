<?php
    wp_logout();
    echo '<script>window.location="'.home_url().'"</script>';
    die();