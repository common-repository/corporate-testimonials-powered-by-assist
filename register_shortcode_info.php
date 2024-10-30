<?php

function capwp_portfolio_shortcode( $atts ) {
	extract( shortcode_atts( array( 'limit' => -1, 'type' => 'post', 'width' => '400px', 'height' => '300px', 'column' => '3'), $atts ) );

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	query_posts(  array ( 
	    'posts_per_page' => $limit, 
	    'post_type' => capwp_portfolio,  
	    'order' => 'ASC', 
	    'orderby' =>'menu_order', 
	    'paged' => $paged ) );

	$data = ' ';   

	while ( have_posts() ) :
	    the_post();

	    $terms = get_the_terms( $post->ID, 'capwp_register_custom_category' );

	    $terms_string = '';
	    if ( $terms ) {
	        foreach ( $terms as $term )
	            $terms_string .= $term->slug . ' ';
	    }
	    
	    
	    $string = get_the_content('');
	    $newString = substr($string, 0, 50);
	    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	   
	    $data .= '<li class="mix all  '. $terms_string .'">' 
	    .'<div class="hovereffect">'
	    
	    . '<a href="'. $feat_image . '" data-gal="prettyPhoto[gallery]"><img src="'. $feat_image . '" style="width:'. $width.';height:'. $height.';"/></a>'
	    . '<a href="' . get_permalink() . '">'
	    .'<div class="overlay">'
	    .'<p> </p>'
	    .'<p> </p>'
	    . '<h4>'. get_the_title() .'</h4>'
	    .'</div>'
	    .'</div>'
	    . '</a>'
	    . '</li>';
	     
	endwhile;

	function capwp_get_filters(){
	    $capwp_terms = get_terms('capwp_register_custom_category');
	    if ( $capwp_terms ) {
	        ob_start();
	        ?>
	        <ul id="portfolioFilter">
	            <li class="filter" data-filter="all">All</li>
	            <?php foreach ( $capwp_terms as $capwp_term ): ?>
	            <li class="filter" data-filter="<?php echo $capwp_term->slug; ?>"><?php echo esc_html($capwp_term->name); ?></li>
	            <?php endforeach; ?>
	        </ul>
	        <?php
	        return ob_get_clean();
	    }
	    return false;
	}


	return 
	'<div class="listings clearfix">' 
	. '<div class="inner-div preview-wrap">'
	. '<div id="item_container" class="clearfix"></div>'
	. '<div id="filter" class="clearfix">'
	. '<div id="filter_wrapper">'
	. '<div class="container">'
	. capwp_get_filters()
	. '</div>'
	. '</div>'
	. '<div id="portfolio-wrap">'
	. '<div id="portfolio_thumbs" class="columns-'. $column . '">'
	. '<ul id="grid" class="sortablePortfolio clearfix">'
	. $data 
	. '</ul>'
	. '</div>'
	. '</div>'
	. '</div>'.

	wp_reset_query();

	}
	add_shortcode( 'assist-portfolio', 'capwp_portfolio_shortcode' );