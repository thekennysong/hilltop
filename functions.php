<?php
	// =========================================================================
	// REMOVE JUNK FROM HEAD
	// =========================================================================
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action('wp_head', 'rel_canonical');



	// =========================================================================
	// THEME SETUP
	// =========================================================================
	function wideeyecreative_setup() {
		// Theme Settings
		add_theme_support('automatic-feed-links');
		register_nav_menus();
		add_theme_support('post-thumbnails');
		add_theme_support('html5');

		// Image Resizing
		add_image_size('feed_size', '700', '257', true);
		add_image_size('single_size', '700', '317', true);
	}
	add_action('after_setup_theme', 'wideeyecreative_setup');



	// =========================================================================
	// DYNAMIC ASSETS
	// =========================================================================
	function dynamic_assets() {

		$current_url = $_SERVER['REQUEST_URI'];
		$current_url = explode('?', $current_url);
		$current_url = $current_url[0];
		$current_url = trim($current_url, '/');

		if (!is_admin()) {

			wp_deregister_script('jquery');

			// Use latest jQuery
			wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', FALSE, '1.9.1', FALSE); // Don't put jQuery in footer because of plugins
			wp_enqueue_script('jquery');



			// Home Only
			if ($current_url == '') {

				// wp_enqueue_style('magnific-css', get_template_directory_uri() . '/css/popup.css', false, '1.0', 'all');
				// wp_register_script('magnific-js', get_template_directory_uri().'/js/popup.js', array('jquery'), '1.0', TRUE);
				// wp_enqueue_script('magnific-js');

			}

			// About Only
			if ($current_url == 'about') {

			}

			wp_register_script('jquery-plugins', get_template_directory_uri() . '/build/jquery.plugins.min.js', array('jquery'), '1', TRUE);
			wp_enqueue_script('jquery-plugins');

			wp_register_script('scripts', get_template_directory_uri() . '/build/scripts.min.js', array('jquery'), '1', TRUE);
			wp_enqueue_script('scripts');
		}
	}
	add_action('wp_enqueue_scripts', 'dynamic_assets');



	// =========================================================================
	// THUMBNAILS IN THE RSS FEED
	// =========================================================================
	function insertThumbnailRSS($content) {
		global $post;
		if (has_post_thumbnail($post->ID ))
			$content = '' . get_the_post_thumbnail($post->ID, 'post-thumbnail') . '' . $content;

		return $content;
	}
	add_filter('the_excerpt_rss', 'insertThumbnailRSS');
	add_filter('the_content_feed', 'insertThumbnailRSS');



	// =========================================================================
	// HTML5 STYLE TAGS
	// =========================================================================
	function html5_style_tag($tag) {
		$tag = str_replace("type='text/css'", '', $tag);
		$tag = str_replace("'", '"', $tag);
		$tag = str_replace(" />", '>', $tag);

		return $tag;
	}
	add_filter('style_loader_tag', 'html5_style_tag');


	// =========================================================================
	// REMOVE UNWANTED MENU ITEMS
	// =========================================================================
	function remove_menus () {
		// Remove the Editor
		remove_action('admin_menu', '_add_themes_utility_last', 101);

		 remove_menu_page( 'edit.php' );

		// Remove Comments
		remove_menu_page('edit-comments.php');

		// Remove Theme Options
		global $submenu;
        unset($submenu['themes.php'][5]); // Switch Themes
        unset($submenu['themes.php'][6]); // Customize
	}
	add_action('admin_menu', 'remove_menus');


	function get_feeds() {
		// Don't call this function twice or move the require
		require_once('includes/grabfeeds/feeds.php');
		return $feeds;
	}

	if(function_exists('register_field_group'))
	{
		register_field_group(array (
			'id' => 'acf_splash-popup',
			'title' => 'Splash Popup',
			'fields' => array (
				array (
					'key' => 'field_5345c4b236133',
					'label' => 'Turn popup on?',
					'name' => 'turn_popup_on',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5345bf6e4280f',
					'label' => 'Is cookied?',
					'name' => 'is_cookied',
					'type' => 'true_false',
					'instructions' => 'If it\'s "cookied", a user will only see the popup once versus every single page load.',
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5345bfab42810',
					'label' => 'Cookie Name',
					'name' => 'cookie_name',
					'type' => 'text',
					'instructions' => 'It will reference to see if this cookie is set. Must all be one word with or without underscores. For example: cookie1, cookie2, issue_cookie_3.',
					'required' => 1,
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf6e4280f',
								'operator' => '==',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => 'has_seen_homepage',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5345bf284280e',
					'label' => 'Lightbox Type',
					'name' => 'lightbox_type',
					'type' => 'radio',
					'choices' => array (
						'image' => 'Image',
						'video' => 'Video',
						'html' => 'HTML',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_5345c0f00c94b',
					'label' => 'Popup Image',
					'name' => 'popup_image',
					'type' => 'image',
					'instructions' => 'Images should be 600px wide.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'image',
							),
						),
						'allorany' => 'all',
					),
					'save_format' => 'url',
					'preview_size' => 'full',
					'library' => 'all',
				),
				array (
					'key' => 'field_5345c1070c94c',
					'label' => 'Is image linkable?',
					'name' => 'is_image_linkable',
					'type' => 'true_false',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'image',
							),
						),
						'allorany' => 'all',
					),
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5345c15b0c94d',
					'label' => 'Image URL',
					'name' => 'image_url',
					'type' => 'text',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'image',
							),
							array (
								'field' => 'field_5345c1070c94c',
								'operator' => '==',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5345c1948289a',
					'label' => 'Popup Video ID',
					'name' => 'popup_video_id',
					'type' => 'text',
					'instructions' => 'If the URL is: "http://www.youtube.com/watch?v=0O2aH4XLbto", you would input "0O2aH4XLbto". Only supports youtube.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'video',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5345c2448289b',
					'label' => 'Autoplay Video?',
					'name' => 'autoplay_video',
					'type' => 'true_false',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'video',
							),
						),
						'allorany' => 'all',
					),
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5345c2738289c',
					'label' => 'Inline Popup',
					'name' => 'inline_popup',
					'type' => 'wysiwyg',
					'instructions' => 'Use this if you want full control over the lightbox. Requires custom code and styles. Mostly for advanced users only.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5345bf284280e',
								'operator' => '==',
								'value' => 'html',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page',
						'operator' => '==',
						'value' => '7',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (),
			),
			'menu_order' => 0,
		));
	}


	// Plain Shortcode
	function example_static_shortcode_function($atts) {

		extract(shortcode_atts(array(
			'title' => '',
		), $atts));


		$text = 'The title is: '.$title;

		return $text;
	}
	add_shortcode('example_static_shortcode_tag', 'example_static_shortcode_function');


	//  Content Shortcode
	function example_wrap_shortcode_function($atts, $content = NULL) {
		return '<div class="content-wrap">'.$content.'</div>';
	}
	add_shortcode('example_wrap_shortcode_tag', 'example_wrap_shortcode_function');



	function get_slice($slice, $data = array()) {
		extract($data);
		// is_object($object) ? get_object_vars($object) : $object;
		include(locate_template('slices/'.$slice.'.php'));
	}

/**
 * Create a web friendly URL slug from a string.
 *
 * Although supported, transliteration is discouraged because
 *     1) most web browsers support UTF-8 characters in URLs
 *     2) transliteration causes a loss of information
 *
 * @author Sean Murphy <sean@iamseanmurphy.com>
 * @copyright Copyright 2012 Sean Murphy. All rights reserved.
 * @license http://creativecommons.org/publicdomain/zero/1.0/
 *
 * @param string $str
 * @param array $options
 * @return string
 */
function url_slug($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);

	// Merge options
	$options = array_merge($defaults, $options);

	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
		'ß' => 'ss',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
		'ÿ' => 'y',

		// Latin symbols
		'©' => '(c)',

		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',

		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
		'Ž' => 'Z',
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z',

		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
		'Ż' => 'Z',
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',

		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);

	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}

	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);

	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


function grab_title() {
	if (is_page() || is_single())
	{
		return get_the_title();
	}
	elseif (is_archive() && !is_category() && !is_tag() && !is_author() && !is_tax())
	{
		if (is_year()) return get_the_time('Y');
		if (is_month()) return get_the_time('F,  Y');
		if (is_day()) return get_the_time('F j, Y');
	}
	elseif (is_tag())
	{
		return single_tag_title('', FALSE);
	}
	elseif (is_search() && $_GET['s'] != '')
	{
		$search = get_search_query();
		if (strlen($search) > 40) $search = substr($search, 0, 35).'...';
		return $search;
	}
	elseif (is_search() && $_GET['s'] == '')
	{
		return 'All Posts';
	}
	elseif (is_404())
	{
		return '404';
	}
	elseif (is_author())
	{
		$author = get_user_by('id', $post->post_author)->data;
		return get_the_author_meta('first_name', $author->ID).' '.get_the_author_meta('last_name', $author->ID);
	}
	elseif (is_category())
	{
		$category = get_category(get_query_var('cat'));
		return $category->name;
	}
	elseif (is_tax())
	{
		return $wp_query->queried_object->name;
	}
	else
	{
		return FALSE;
	}
}