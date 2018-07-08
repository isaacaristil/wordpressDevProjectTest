<?php
// this is just a wrapper for gallery-slider.php partial
set_query_var('fields', get_query_var('fields'));
get_template_part('partials/gallery', 'slider');
