<?php


 
function wp_catalogue_breadcumb(){
	
    $catalogue_page_url	=	get_option('catalogue_page_url');
	 $terms	=	get_terms('wpccategories');
		global $post;
		$terms1 = get_the_terms($post->id, 'wpccategories');
		if($terms1){
		foreach( $terms1 as $term1 ){
			$slug	= $term1->slug;
			$tname	=	$term1->name;
			$cat_url	=	get_bloginfo('siteurl').'/wpccategories/'.$slug;
		};
	}

		if(is_single()){
			$pname	=	'>> '.get_the_title();	
		}
	
	echo '<div class="wp-catalogue-bradcrumb"> <a href="'.$catalogue_page_url.'">All Products</a> >> <a href="'.$cat_url.'">'.$tname.'</a>  ' . $pname . '</div>' ;
	
}

function wp_catalogue(){
	global $post;
	$post_data = get_post($post->ID, ARRAY_A);
	if(get_queried_object()->taxonomy){
		$slug	=	get_queried_object()->taxonomy.'/'.get_queried_object()->slug;
	}else{
		$slug = $post_data['post_name'];
	}
	$crrurl	=	get_bloginfo('wpurl').'/'.$slug;
	if(get_query_var('paged')){
		$paged	=	get_query_var('paged');	
	}else{
		 $paged	=	1;	
	}
	$args1 = array(
			'orderby' => 'term_order',
			'order' => 'ASC',
			'hide_empty' => true,
		);

	$terms	=	get_terms('wpccategories',$args1);
	$count	=	count($terms);
	$post_content	=	get_queried_object()->post_content;
	
		if(strpos($post_content,'[wp-catalogue]')!==false){
		
		
		 $siteurl	=	get_bloginfo('siteurl');
		 global $post;
		 $pid	= $post->ID;
		 $guid	=	 $siteurl.'/?page_id='.$pid;
		 if(get_option('catalogue_page_url')){
			update_option( 'catalogue_page_url', $guid );	 
		}else{
			add_option( 'catalogue_page_url', $guid );	
		}
	}
	$term_slug	=	get_queried_object()->slug;
	if(!$term_slug){
		$class	=	"active-wpc-cat";	
	}

echo '<div id="wpc-catalogue-wrapper">'; ?>
<?php  wp_catalogue_breadcumb();
		echo '<div id="wpc-col-1">';
        echo   '<ul class="wpc-categories">';
		if($count>0){
			echo '<li class="wpc-category ' . $class . '"><a href="'. get_option('catalogue_page_url') .'">All Products</a></li>';	
       		foreach($terms as $term){
				if($term_slug==$term->slug){
				$class	=	'active-wpc-cat';
			}else{
				$class	=	'';
			}
			echo '<li class="wpc-category '. $class .'"><a href="'.get_term_link($term->slug, 'wpccategories').'">'. $term->name .'</a></li>'; 	
			}
            }else{
			echo '<li class="wpc-category"><a href="#">No category</a></li>';	
				}
        echo '</ul>
        </div>';
$per_page	=	get_option('pagination');
if($per_page==0){
	$per_page	=	"-1";
}
$term_slug	=	get_queried_object()->slug;
if($term_slug){
$args = array(
	'post_type'=> 'wpcproduct',
	'order'     => 'ASC',
    'orderby'   => 'menu_order',
	'posts_per_page'	=> $per_page,
	'paged'	=> $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'wpccategories',
			'field' => 'slug',
			'terms' => get_queried_object()->slug
		)
	)
);

}else{
	$args = array(
	'post_type'=> 'wpcproduct',
	'order'     => 'ASC',
    'orderby'   => 'menu_order',
	'posts_per_page'	=> $per_page,
	'paged'	=> $paged,
	);
}
$products	=	new WP_Query($args); 
if($products->have_posts()){
	$tcropping	=	get_option('tcroping');
	if(get_option('thumb_height')){
	$theight	=	get_option('thumb_height');
	}else{
		$theight	=	142;
	}
	if(get_option('thumb_width')){
		$twidth		=	get_option('thumb_width');
	}else{
		$twidth		=	205;
	}
	$i = 1;
	echo '  <!--col-2-->
				<div id="wpc-col-2">
        		<div id="wpc-products">';
        while($products->have_posts()): $products->the_post();
  		$title		=	get_the_title(); 
		$permalink	=	get_permalink(); 
		$img		=	get_post_meta(get_the_id(),'product_img1',true);
	  	$price		=	get_post_meta(get_the_id(),'product_price',true); 
		 echo '<!--wpc product-->';
         echo '<div class="wpc-product">';
         echo '<div class="wpc-img" style="width: '. $twidth . 'px; height:' . $theight . 'px"><a href="'. $permalink .'" class="wpc-product-link"><img src="'. $img .'" alt="" height="' . $theight . '" width="' . $twidth . '" /></a></div>';
		 echo '<p class="wpc-title"><a href="'. $permalink .'">' . $title . '</a></p>';
		 echo '</div>';
         echo '<!--/wpc-product-->';
		if($i == get_option('grid_rows'))
    {
        echo '<br clear="all" />';
        $i = 0; // reset counter
	}
		$i++;
		endwhile; wp_reset_postdata;
		echo '</div>';
	    if(get_option('pagination')!=0){
		$pages	=	ceil($products->found_posts/get_option('pagination'));
		}

	if($pages>1){
	echo '<div class="wpc-paginations">';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	for($p=1; $p<=$pages; $p++){
		$cpage	=	'active-wpc-page';
		if($paged==$p){
				echo    '<a href="' . $crrurl . '/page/'. $p .'" class="pagination-number '. $cpage .'">'. $p .'</a>';
			}else{
				echo    '<a href="' . $crrurl . '/page/'. $p .'" class="pagination-number">'. $p .'</a>';	
			}
}
 echo '</div>'; 
}
}else{
echo 'No Products';
}
 echo  ' </div><div class="clear"></div></div>
       <!--/col-2-->';
}
add_shortcode('wp-catalogue','wp_catalogue');