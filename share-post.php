<?php
/*
Plugin Name: Reza Share Button
Author: rezadeveloper
*/ 
  

function reza_share_post_css() {
  	 	wp_enqueue_style( 'reza_share_post', plugins_url( '/share_post.css', __FILE__ ) );  
}
add_action( 'wp_enqueue_scripts', 'reza_share_post_css' ); 

add_action('init', 'reza_share_post_lang');
function reza_share_post_lang() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'reza', false, $path);
 
} 
/********************************************************************
Share Post
*********************************************************************/
function reza_share_post(  $facebook =false, $google=false,$twitter=false,$linkedin=false,$telegram=false,$whatsapp=false){
	 $url ='http://twitter.com/share?text='.urlencode(get_the_title()).'&url='.get_permalink();$title = str_replace("#",'' ,'send?text='.get_the_title());$per =get_permalink();

	
	if( !empty($twitter) || !empty($facebook) || !empty($google )|| !empty($linkedin )||!empty( $telegram)||!empty( $whatsapp)) { 
	?>
    
	<ul class="rd-share-post">
 		<?php if( !empty($facebook)){ ?>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><img alt="facebook" width="64" height="64" src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/facebook.jpg"/></a>
				<a class="rd-facebook rd-share-social" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><?php echo esc_html__('Facebook','reza');?></a>
			</li>
 		<?php } ?> 
        
		<?php if(  !empty($google)){ ?>
			<li>
				<a href="https://plus.google.com/share?url=<?php the_permalink() ?>"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/googleplus.jpg" alt="googleplus" width="64" height="64" /></a>
				<a class="rd-google rd-share-social" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><?php echo esc_html__('GooglePlus','reza');?></a>
			</li>
 		<?php } ?>
        
		<?php if( !empty($twitter)){ ?>
			<li>
				<a href="<?php echo esc_url($url);?>"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/twitter.jpg" alt="twitter" width="64" height="64"/></a>
				<a class="rd-twitter rd-share-social" href="<?php echo esc_url($url);?>"><?php echo esc_html__('Twitter','reza');?></a>
			</li>
 		<?php } ?> 
        
		<?php if( !empty($linkedin)){ ?>
			<li>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/linkedin.jpg" alt="linkedin" width="64" height="64"/></a>
				<a class="rd-linkedin rd-share-social" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><?php echo esc_html__('Linkedin','reza');?></a>
			</li>
 		<?php } ?>	
        
		<?php if( !empty($telegram)){ ?>
			<li>
				<a href="https://telegram.me/share/url?url=<?php the_permalink() ?>"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/telegram.jpg" alt="linkedin" width="64" height="64"/></a>
				<a class="rd-telegram rd-share-social" href="https://telegram.me/share/url?url=<?php the_permalink() ?>"><?php echo esc_html__('Telegram','reza');?></a>
			</li>
 		<?php } ?>	

		<?php if( !empty($whatsapp)){ ?>
			<li class="rd-whats">
				<a href="whatsapp://<?php echo esc_attr($title.' '.$per)  ?>"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/images/whatsapp.jpg" alt="linkedin" width="64" height="64"/></a>
				<a class="rd-whatsapp rd-share-social" href="whatsapp://<?php echo esc_attr($title.' '.$per) ?>"><?php echo esc_html__('WhatsApp','reza');?></a>
			</li>
 		<?php } ?>
                
        </ul>
        
	<?php 
	} 
}
?>