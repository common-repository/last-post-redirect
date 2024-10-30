<?php
function last_post_redirect_register_settings() {
	add_option('last_post_redirect_get_name', 'lastpost');
	add_option('last_post_redirect_way', 'wordpress_function');
	add_option('last_post_redirect_post_status', array("publish"));
	add_option('last_post_redirect_post_type', 'post');
	register_setting('last_post_redirect_options', 'last_post_redirect_get_name');
	register_setting('last_post_redirect_options', 'last_post_redirect_way');
	register_setting('last_post_redirect_options', 'last_post_redirect_post_status');
	register_setting('last_post_redirect_options', 'last_post_redirect_post_type');
}
add_action('admin_init', 'last_post_redirect_register_settings');

function last_post_redirect_register_options_page() {
	add_options_page(__('Last Post Redirect Options Page', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Last Post Redirect', LAST_POST_REDIRECT_TEXT_DOMAIN), 'manage_options', LAST_POST_REDIRECT_TEXT_DOMAIN.'-options', 'last_post_redirect_options_page');
}
add_action('admin_menu', 'last_post_redirect_register_options_page');

function last_post_redirect_get_select_option($select_option_name, $select_option_value, $select_option_id){
	?>
	<select name="<?php echo $select_option_name; ?>" id="<?php echo $select_option_name; ?>">
		<?php
		for($num = 0; $num < count($select_option_id); $num++){
			$select_option_value_each = $select_option_value[$num];
			$select_option_id_each = $select_option_id[$num];
			?>
			<option value="<?php echo $select_option_id_each; ?>"<?php if (get_option($select_option_name) == $select_option_id_each){?> selected="selected"<?php } ?>>
				<?php echo $select_option_value_each; ?>
			</option>
		<?php } ?>
	</select>
	<?php
}

function last_post_redirect_get_checked($checkbox_name, $check_value){
	if(is_array($checkbox_name)){
		if(in_array($check_value, $checkbox_name)){
			?> checked="checked"<?php
		}
	}
}

function last_post_redirect_get_checkbox_option($checkbox_name, $checkbox_value, $checkbox_id){
	for($num = 0; $num < count($checkbox_id); $num++){
		$checkbox_value_each = $checkbox_value[$num];
		$checkbox_id_each = $checkbox_id[$num];
		?>
		<input type="checkbox" name="<?php echo $checkbox_name; ?>[]" id="<?php echo $checkbox_id_each; ?>" value="<?php echo $checkbox_id_each; ?>"<?php last_post_redirect_get_checked(get_option($checkbox_name), $checkbox_id_each); ?>><label for="<?php echo $checkbox_id_each; ?>"><?php echo $checkbox_value_each; ?></label>
	<?php
	}
}

$last_post_redirect_url = home_url().'/?'.get_option('last_post_redirect_get_name');

function last_post_redirect_options_page() {
	global $last_post_redirect_url;
?>
<div class="wrap">
	<h2><?php _e("Last Post Redirect Options Page", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields('last_post_redirect_options'); ?>
		<h3><?php _e("General Options", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></h3>
			<p><?php printf(__('You can go to your latest post by %s or using function %s', LAST_POST_REDIRECT_TEXT_DOMAIN), '<a href='.$last_post_redirect_url.' target="_blank">'.$last_post_redirect_url.'</a>', '<code>get_last_post_redirect_url()</code>'); ?></p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="last_post_redirect_get_name"><?php _e("You can go to your latest post by: ", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></label></th>
					<td>
						<?php echo get_option("siteurl"); ?>/?<input type="text" name="last_post_redirect_get_name" id="last_post_redirect_get_name" value="<?php echo get_option('last_post_redirect_get_name'); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="last_post_redirect_way"><?php _e("Way you want to get for the latest post: ", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></label></th>
					<td>
						<?php last_post_redirect_get_select_option("last_post_redirect_way", array(__('Use Wordpress Function', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Use MYSQL Command', LAST_POST_REDIRECT_TEXT_DOMAIN)), array('wordpress_function', 'mysql_command')); ?>
						<?php _e("(If you don't know what it means, leave it as default)", LAST_POST_REDIRECT_TEXT_DOMAIN); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e("Status of post you want to get for the latest post: ", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></label></th>
					<td>
						<?php last_post_redirect_get_checkbox_option("last_post_redirect_post_status", array(__('Publish Post', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Draft', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Future Post', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Private Post', LAST_POST_REDIRECT_TEXT_DOMAIN)), array('publish', 'draft', 'future', 'private')); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="last_post_redirect_post_type"><?php _e("Type you want to get for the latest post: ", LAST_POST_REDIRECT_TEXT_DOMAIN); ?></label></th>
					<td>
						<?php last_post_redirect_get_select_option("last_post_redirect_post_type", array(__('Post', LAST_POST_REDIRECT_TEXT_DOMAIN), __('Page', LAST_POST_REDIRECT_TEXT_DOMAIN)), array('post', 'page')); ?>
					</td>
				</tr>
			</table>
		<?php submit_button(); ?>
	</form>
</div>
<?php
}
?>