<?php 
class shd_fullpageinfo_widget extends WP_Widget { 
	function __construct() { 
		parent::__construct( 
		"shd_fullpageinfo_widget", 
		esc_html__( "SHD Fullpage Info", "textdomain" ), 
		array( "description" => esc_html__( "Display fullpage info block", "textdomain" ), ) 
		);
	}
	public function widget( $args, $instance ) { 
		if(isset($instance["page_id"])){ 
			$post = get_post($instance["page_id"]);
			$instance["page_title"] = $post->post_title;
			$instance["page_excerpt"] = $post->post_excerpt;
			$instance["page_thumbnail"] = get_the_post_thumbnail_url($post->ID);
			$instance["page_url"] = ($post->guid);
		}
		if(isset($instance["category_id"])){
			$instance["category_page_url"] = get_category_link($instance["category_id"]);
		}
		get_template_part("widgets/shd_fullpageinfo_widget","template",$instance);
	}
	public function form( $instance ) { 
		?>
		<p>
		<label for="<?php echo $this->get_field_id( "title" ); ?>"><?php _e( "Title:" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( "title" ); ?>" name="<?php echo $this->get_field_name( "title" ); ?>" type="text" value="<?php echo !isset($instance["title"]) ? "" :  esc_attr( $instance["title"] ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( "subtitle" ); ?>"><?php _e( "Subtitle:" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( "subtitle" ); ?>" name="<?php echo $this->get_field_name( "subtitle" ); ?>" type="text" value="<?php echo !isset($instance["subtitle"]) ? "" :  esc_attr( $instance["subtitle"] ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( "description" ); ?>"><?php _e( "Description:" ); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id( "description" ); ?>" name="<?php echo $this->get_field_name( "description" ); ?>" ><?php echo !isset($instance["description"]) ? "" :  esc_attr( $instance["description"] ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( "btn_text" ); ?>"><?php _e( "Button Text:" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( "btn_text" ); ?>" name="<?php echo $this->get_field_name( "btn_text" ); ?>" type="text" value="<?php echo !isset($instance["btn_text"]) ? "" :  esc_attr( $instance["btn_text"] ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( "btn_url" ); ?>"><?php _e( "Button URL:" ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( "btn_url" ); ?>" name="<?php echo $this->get_field_name( "btn_url" ); ?>" type="text" value="<?php echo !isset($instance["btn_url"]) ? "" :  esc_attr( $instance["btn_url"] ); ?>" />
		</p>
		<?php $img_url = wp_get_attachment_url($instance["bg_image"]); ?>
		<p>		<label for="<?= $this->get_field_id( "bg_image" ); ?>"><?php _e( "Background Image" ); ?></label>
		<img class="<?= $this->id ?>_img" src="<?= (!empty($img_url)) ? $img_url : ""; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
		<input style="display: none;" class="widefat  <?= $this->id ?>_url" id="<?php echo $this->get_field_id( "bg_image" ); ?>_url" name="<?php echo $this->get_field_name( "bg_image" ); ?>" type="text" value="<?php echo !isset($instance["bg_image"]) ? "" :  esc_attr( $instance["bg_image"] ); ?>" />
		<input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance ) { 
		$instance = array();
		$instance["title"] = ( ! empty($new_instance["title"]) ) ? strip_tags($new_instance["title"]) : ""; 
		$instance["subtitle"] = ( ! empty($new_instance["subtitle"]) ) ? strip_tags($new_instance["subtitle"]) : ""; 
		$instance["description"] = ( ! empty($new_instance["description"]) ) ? strip_tags($new_instance["description"]) : ""; 
		$instance["btn_text"] = ( ! empty($new_instance["btn_text"]) ) ? strip_tags($new_instance["btn_text"]) : ""; 
		$instance["btn_url"] = ( ! empty($new_instance["btn_url"]) ) ? strip_tags($new_instance["btn_url"]) : ""; 
		$instance["bg_image"] = ( ! empty($new_instance["bg_image"]) ) ? strip_tags($new_instance["bg_image"]) : ""; 
		return $instance;
	}
} 
function register_shd_fullpageinfo_widget() {
	register_widget( "shd_fullpageinfo_widget" );
}
add_action( "widgets_init", "register_shd_fullpageinfo_widget" );
?>