<?php
/**
 * Secure Custom Fields (SCF/ACF) – Field Group Registration
 *
 * All field groups are registered programmatically so the theme works
 * without importing JSON files. Requires ACF Free / SCF plugin.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

// =========================================================================
// GLOBAL THEME OPTIONS PAGE
// =========================================================================

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => __( 'Theme Options', 'helpline-nurse' ),
			'menu_title' => __( 'Theme Options', 'helpline-nurse' ),
			'menu_slug'  => 'helpline-nurse-options',
			'capability' => 'manage_options',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-generic',
			'position'   => 60,
		)
	);
}

// =========================================================================
// GLOBAL THEME OPTIONS FIELDS
// =========================================================================

acf_add_local_field_group(
	array(
		'key'      => 'group_theme_options',
		'title'    => __( 'Global Theme Options', 'helpline-nurse' ),
		'fields'   => array(
			// -- Theme License --
			array(
				'key'          => 'field_theme_license_key',
				'label'        => __( 'License Key', 'helpline-nurse' ),
				'name'         => 'theme_license_key',
				'type'         => 'text',
				'instructions' => __( 'Enter your valid theme license key here to activate the site.', 'helpline-nurse' ),
				'required'     => 1,
			),
			// -- Contact Info --
			array(
				'key'   => 'field_phone',
				'label' => __( 'Phone Number', 'helpline-nurse' ),
				'name'  => 'phone',
				'placeholder' => '+91 123 456 7890',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_email',
				'label' => __( 'Email Address', 'helpline-nurse' ),
				'name'  => 'email',
				'placeholder' => 'info@helplinenurse.com',
				'type'  => 'email',
			),
			array(
				'key'   => 'field_address',
				'label' => __( 'Address', 'helpline-nurse' ),
				'name'  => 'address',
				'placeholder' => 'India, Riyadh',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			// -- Social Links Repeater --
			array(
				'key'        => 'field_social_links',
				'label'      => __( 'Social Links', 'helpline-nurse' ),
				'name'       => 'social_links',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'     => 'field_social_platform',
						'label'   => __( 'Platform', 'helpline-nurse' ),
						'name'    => 'platform',
						'type'    => 'select',
						'choices' => array(
							'instagram' => 'Instagram',
							'facebook'  => 'Facebook',
							'linkedin'  => 'LinkedIn',
							'youtube'   => 'YouTube',
							'tiktok'    => 'TikTok',
							'x'         => 'X',
						),
						'allow_null' => 0,
					),
					array(
						'key'   => 'field_social_url',
						'label' => __( 'URL', 'helpline-nurse' ),
						'name'  => 'url',
						'type'  => 'url',
					),
				),
			),
			// -- Footer --
			array(
				'key'   => 'field_footer_description',
				'label' => __( 'Footer Description', 'helpline-nurse' ),
				'name'  => 'footer_description',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			array(
				'key'   => 'field_footer_copyright',
				'label' => __( 'Footer Copyright', 'helpline-nurse' ),
				'name'  => 'footer_copyright',
				'placeholder' => '&copy; ',
				'type'  => 'text',
			),
			// -- Default Images --
			array(
				'key'           => 'field_default_service_image',
				'label'         => __( 'Default Service Image', 'helpline-nurse' ),
				'name'          => 'default_service_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			),
			array(
				'key'           => 'field_default_blog_image',
				'label'         => __( 'Default Blog Image', 'helpline-nurse' ),
				'name'          => 'default_blog_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'helpline-nurse-options',
				),
			),
		),
	)
);

// =========================================================================
// HOME PAGE FIELDS
// =========================================================================

acf_add_local_field_group(
	array(
		'key'    => 'group_home_hero',
		'title'  => __( 'Home – Hero Section', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_hero_title',
				'label' => __( 'Hero Main Title', 'helpline-nurse' ),
				'name'  => 'hero_title',
				'placeholder' => 'Be a Registered',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_hero_title_highlight',
				'label' => __( 'Hero Highlighted Word', 'helpline-nurse' ),
				'name'  => 'hero_title_highlight',
				'placeholder' => 'Nurse.',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_hero_subtitle',
				'label' => __( 'Hero Subtitle', 'helpline-nurse' ),
				'name'  => 'hero_subtitle',
				'placeholder' => 'UK | Canada | USA | Australia | Ireland | Middle East',
				'type'  => 'text',
			),
			array(
				'key'        => 'field_hero_checklist',
				'label'      => __( 'Hero Checklist Items', 'helpline-nurse' ),
				'name'       => 'hero_checklist',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_hero_checklist_item',
						'label' => __( 'Item', 'helpline-nurse' ),
						'name'  => 'item',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_hero_btn1_label',
				'label' => __( 'Primary Button Label', 'helpline-nurse' ),
				'name'  => 'hero_btn1_label',
				'placeholder' => 'View All Services',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_hero_btn1_url',
				'label' => __( 'Primary Button URL', 'helpline-nurse' ),
				'name'  => 'hero_btn1_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_hero_btn2_label',
				'label' => __( 'Secondary Button Label', 'helpline-nurse' ),
				'name'  => 'hero_btn2_label',
				'placeholder' => 'Free Consultation',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_hero_btn2_url',
				'label' => __( 'Secondary Button URL', 'helpline-nurse' ),
				'name'  => 'hero_btn2_url',
				'type'  => 'url',
			),
			array(
				'key'           => 'field_hero_image',
				'label'         => __( 'Hero Image', 'helpline-nurse' ),
				'name'          => 'hero_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

acf_add_local_field_group(
	array(
		'key'    => 'group_home_value_prop',
		'title'  => __( 'Home – Value Proposition', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_vp_heading',
				'label' => __( 'Heading', 'helpline-nurse' ),
				'name'  => 'vp_heading',
				'placeholder' => 'Expert Nursing Documentation.',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_vp_heading_highlight',
				'label' => __( 'Highlighted Text', 'helpline-nurse' ),
				'name'  => 'vp_heading_highlight',
				'placeholder' => 'Zero Errors.',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_vp_description',
				'label' => __( 'Description', 'helpline-nurse' ),
				'name'  => 'vp_description',
				'placeholder' => 'From Council renewals to Global Attestations, we manage your paperwork so you can focus on your patients. Reliable support for nurses worldwide.',
				'type'  => 'textarea',
				'rows'  => 3,
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

acf_add_local_field_group(
	array(
		'key'    => 'group_home_services',
		'title'  => __( 'Home – Services Overview', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_sv_badge',
				'label' => __( 'Section Badge', 'helpline-nurse' ),
				'name'  => 'services_overview_badge',
				'placeholder' => 'Our Expertise',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sv_heading',
				'label' => __( 'Section Heading', 'helpline-nurse' ),
				'name'  => 'services_overview_heading',
				'placeholder' => 'Top Services',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sv_description',
				'label' => __( 'Section Description', 'helpline-nurse' ),
				'name'  => 'services_overview_description',
				'placeholder' => 'We provide comprehensive, end-to-end documentation support for healthcare professionals looking to advance their global careers.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_sv_cta_label',
				'label' => __( 'CTA Button Label', 'helpline-nurse' ),
				'name'  => 'services_overview_cta_label',
				'placeholder' => 'Explore All 20+ Services',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sv_cta_url',
				'label' => __( 'CTA Button URL', 'helpline-nurse' ),
				'name'  => 'services_overview_cta_url',
				'type'  => 'url',
			),
			array(
				'key'          => 'field_sv_posts',
				'label'        => __( 'Featured Services (select up to 3)', 'helpline-nurse' ),
				'name'         => 'services_overview_posts',
				'type'         => 'relationship',
				'post_type'    => array( 'service' ),
				'max'          => 3,
				'return_format'=> 'id',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

acf_add_local_field_group(
	array(
		'key'    => 'group_home_why',
		'title'  => __( 'Home – Why Choose Us', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_why_badge',
				'label' => __( 'Badge', 'helpline-nurse' ),
				'name'  => 'why_badge',
				'placeholder' => 'The Helpline Advantage',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_why_heading',
				'label' => __( 'Heading', 'helpline-nurse' ),
				'name'  => 'why_heading',
				'placeholder' => 'Why Choose Us?',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_why_description',
				'label' => __( 'Description', 'helpline-nurse' ),
				'name'  => 'why_description',
				'placeholder' => 'We are your trusted partners in navigating the complex landscape of international nursing licensure and migration.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'        => 'field_why_features',
				'label'      => __( 'Feature Cards', 'helpline-nurse' ),
				'name'       => 'why_features',
				'type'       => 'repeater',
				'layout'     => 'block',
				'min'        => 0,
				'max'        => 4,
				'sub_fields' => array(
					array(
						'key'           => 'field_why_feat_icon_image',
						'label'         => __( 'Icon Image (PNG/SVG)', 'helpline-nurse' ),
						'name'          => 'icon_image',
						'type'          => 'image',
						'return_format' => 'id',
						'preview_size'  => 'thumbnail',
						'instructions'  => __( 'Upload a PNG or SVG icon from the media library. If provided, this will be used instead of the SVG code below.', 'helpline-nurse' ),
						'mime_types'    => 'png,svg',
					),
					array(
						'key'   => 'field_why_feat_icon',
						'label' => __( 'Icon SVG Path (Fallback)', 'helpline-nurse' ),
						'name'  => 'icon_svg',
						'type'  => 'textarea',
						'rows'  => 2,
						'instructions' => __( 'Paste the SVG path/shape elements only (not the outer svg tag).', 'helpline-nurse' ),
					),
					array(
						'key'   => 'field_why_feat_title',
						'label' => __( 'Title', 'helpline-nurse' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_why_feat_desc',
						'label' => __( 'Description', 'helpline-nurse' ),
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			array(
				'key'        => 'field_counters',
				'label'      => __( 'Stats / Counters', 'helpline-nurse' ),
				'name'       => 'counters',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_counter_number',
						'label' => __( 'Number', 'helpline-nurse' ),
						'name'  => 'number',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_counter_label',
						'label' => __( 'Label', 'helpline-nurse' ),
						'name'  => 'label',
						'type'  => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

if ( false ) {
acf_add_local_field_group(
	array(
		'key'    => 'group_home_cta',
		'title'  => __( 'Home – CTA Banner', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_cta_title',
				'label' => __( 'CTA Heading', 'helpline-nurse' ),
				'name'  => 'cta_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_cta_desc',
				'label' => __( 'CTA Description', 'helpline-nurse' ),
				'name'  => 'cta_description',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_cta_btn_label',
				'label' => __( 'CTA Button Label', 'helpline-nurse' ),
				'name'  => 'cta_btn_label',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_cta_btn_url',
				'label' => __( 'CTA Button URL', 'helpline-nurse' ),
				'name'  => 'cta_btn_url',
				'type'  => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

acf_add_local_field_group(
	array(
		'key'    => 'group_home_features',
		'title'  => __( 'Home – Core Features Grid', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_feat_heading',
				'label' => __( 'Section Heading', 'helpline-nurse' ),
				'name'  => 'features_heading',
				'type'  => 'text',
			),
			array(
				'key'        => 'field_feat_items',
				'label'      => __( 'Feature Items', 'helpline-nurse' ),
				'name'       => 'feature_items',
				'type'       => 'repeater',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'   => 'field_feat_icon',
						'label' => __( 'Icon SVG Path', 'helpline-nurse' ),
						'name'  => 'icon_svg',
						'type'  => 'textarea',
						'rows'  => 2,
					),
					array(
						'key'   => 'field_feat_color',
						'label' => __( 'Icon Color Class', 'helpline-nurse' ),
						'name'  => 'color_class',
						'type'  => 'select',
						'choices' => array(
							'color-primary' => 'Primary (Teal)',
							'color-accent'  => 'Accent (Amber)',
						),
						'default_value' => 'color-primary',
					),
					array(
						'key'   => 'field_feat_title',
						'label' => __( 'Title', 'helpline-nurse' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_feat_desc',
						'label' => __( 'Short Description', 'helpline-nurse' ),
						'name'  => 'description',
						'type'  => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
	)
);

// =========================================================================
// ABOUT PAGE FIELDS
// =========================================================================
}

acf_add_local_field_group(
	array(
		'key'    => 'group_about',
		'title'  => __( 'About Page', 'helpline-nurse' ),
		'fields' => array(
			// Hero Banner.
			array(
				'key'   => 'field_about_hero_title',
				'label' => __( 'Hero Title', 'helpline-nurse' ),
				'name'  => 'about_hero_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_hero_subtitle',
				'label' => __( 'Hero Subtitle', 'helpline-nurse' ),
				'name'  => 'about_hero_subtitle',
				'placeholder' => 'Your trusted partner in healthcare documentation',
				'type'  => 'text',
			),
			// Story Section.
			array(
				'key'   => 'field_about_story_badge',
				'label' => __( 'Story Badge', 'helpline-nurse' ),
				'name'  => 'about_story_badge',
				'placeholder' => 'Our Story',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_story_heading',
				'label' => __( 'Story Heading', 'helpline-nurse' ),
				'name'  => 'about_story_heading',
				'placeholder' => 'Your Trusted Partner in Global Nursing Careers',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_story_paragraphs',
				'label' => __( 'Story Paragraphs', 'helpline-nurse' ),
				'name'  => 'about_story_paragraphs',
				'type'  => 'repeater',
				'layout'=> 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_about_story_para',
						'label' => __( 'Paragraph', 'helpline-nurse' ),
						'name'  => 'paragraph',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'           => 'field_about_story_image',
				'label'         => __( 'Story Image', 'helpline-nurse' ),
				'name'          => 'about_story_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			// Mission & Vision.
			array(
				'key'   => 'field_about_mission_title',
				'label' => __( 'Mission Title', 'helpline-nurse' ),
				'name'  => 'about_mission_title',
				'placeholder' => 'Our Mission',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_mission_text',
				'label' => __( 'Mission Text', 'helpline-nurse' ),
				'name'  => 'about_mission_text',
				'placeholder' => 'To simplify the transition for nurses worldwide by bridging the gap between career aspirations and global opportunities through expert, end-to-end documentation and licensing support.',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			array(
				'key'   => 'field_about_vision_title',
				'label' => __( 'Vision Title', 'helpline-nurse' ),
				'name'  => 'about_vision_title',
				'placeholder' => 'Our Vision',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_vision_text',
				'label' => __( 'Vision Text', 'helpline-nurse' ),
				'name'  => 'about_vision_text',
				'placeholder' => 'To become the world\'s most trusted and efficient administrative partner for nurses, ensuring zero barriers in global healthcare employment.',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			// CTA.
			array(
				'key'   => 'field_about_cta_title',
				'label' => __( 'CTA Title', 'helpline-nurse' ),
				'name'  => 'about_cta_title',
				'placeholder' => 'Ready to Advance Your Global Career?',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_cta_desc',
				'label' => __( 'CTA Description', 'helpline-nurse' ),
				'name'  => 'about_cta_desc',
				'placeholder' => 'Get in touch with our experts today and take the first step towards your international nursing journey.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_about_cta_btn_label',
				'label' => __( 'CTA Button Label', 'helpline-nurse' ),
				'name'  => 'about_cta_btn_label',
				'placeholder' => 'Contact Us Now',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_about_cta_btn_url',
				'label' => __( 'CTA Button URL', 'helpline-nurse' ),
				'name'  => 'about_cta_btn_url',
				'type'  => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-about.php',
				),
			),
		),
	)
);

// =========================================================================
// CONTACT PAGE FIELDS
// =========================================================================

acf_add_local_field_group(
	array(
		'key'    => 'group_contact',
		'title'  => __( 'Contact Page', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_contact_hero_title',
				'label' => __( 'Hero Title', 'helpline-nurse' ),
				'name'  => 'contact_hero_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_contact_hero_subtitle',
				'label' => __( 'Hero Subtitle', 'helpline-nurse' ),
				'name'  => 'contact_hero_subtitle',
				'placeholder' => 'We\'re here to help you with your documentation needs',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_contact_section_title',
				'label' => __( 'Section Title (Get in Touch)', 'helpline-nurse' ),
				'name'  => 'contact_section_title',
				'placeholder' => 'Get in Touch',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_contact_section_desc',
				'label' => __( 'Section Description', 'helpline-nurse' ),
				'name'  => 'contact_section_desc',
				'placeholder' => 'Have questions about our services or need assistance with your application? Our team is ready to help.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_contact_address',
				'label' => __( 'Office Address', 'helpline-nurse' ),
				'name'  => 'contact_address',
				'placeholder' => 'India, Riyadh',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_contact_phone',
				'label' => __( 'Phone Number', 'helpline-nurse' ),
				'name'  => 'contact_phone',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_contact_email',
				'label' => __( 'Email Address', 'helpline-nurse' ),
				'name'  => 'contact_email',
				'type'  => 'email',
			),
			array(
				'key'   => 'field_contact_hours',
				'label' => __( 'Business Hours', 'helpline-nurse' ),
				'name'  => 'contact_hours',
				'placeholder' => 'Monday - Saturday: 9:00 AM - 6:00 PM&#10;Sunday: Closed',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_contact_form_shortcode',
				'label' => __( 'Contact Form Shortcode', 'helpline-nurse' ),
				'name'  => 'contact_form_shortcode',
				'type'  => 'text',
				'instructions' => __( 'Paste your contact form shortcode here, e.g. [contact-form-7 id="123"]', 'helpline-nurse' ),
			),
			array(
				'key'   => 'field_contact_map_embed',
				'label' => __( 'Google Map Embed URL', 'helpline-nurse' ),
				'name'  => 'contact_map_embed',
				'type'  => 'url',
				'instructions' => __( 'Paste the Google Maps embed URL (from Share > Embed a map > copy src URL).', 'helpline-nurse' ),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-contact.php',
				),
			),
		),
	)
);

// =========================================================================
// SERVICE SINGLE FIELDS
// =========================================================================

acf_add_local_field_group(
	array(
		'key'    => 'group_service_single',
		'title'  => __( 'Service – Content Fields', 'helpline-nurse' ),
		'fields' => array(
			// Hero.
			array(
				'key'   => 'field_svc_hero_subtitle',
				'label' => __( 'Hero Subtitle', 'helpline-nurse' ),
				'name'  => 'service_hero_subtitle',
				'type'  => 'text',
			),
			array(
				'key'           => 'field_svc_hero_image',
				'label'         => __( 'Hero Banner Image', 'helpline-nurse' ),
				'name'          => 'service_hero_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			// Introduction.
			array(
				'key'   => 'field_svc_intro',
				'label' => __( 'Introduction', 'helpline-nurse' ),
				'name'  => 'service_intro',
				'type'  => 'wysiwyg',
				'toolbar' => 'basic',
				'media_upload' => false,
			),
			// Feature List.
			array(
				'key'        => 'field_svc_features',
				'label'      => __( 'Feature List', 'helpline-nurse' ),
				'name'       => 'service_features',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_svc_feat_item',
						'label' => __( 'Feature', 'helpline-nurse' ),
						'name'  => 'feature',
						'type'  => 'text',
					),
				),
			),
			// Process Steps.
			array(
				'key'        => 'field_svc_process',
				'label'      => __( 'Process Steps', 'helpline-nurse' ),
				'name'       => 'service_process',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_svc_step_title',
						'label' => __( 'Step Title', 'helpline-nurse' ),
						'name'  => 'step_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_svc_step_desc',
						'label' => __( 'Step Description', 'helpline-nurse' ),
						'name'  => 'step_description',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			// Benefits.
			array(
				'key'        => 'field_svc_benefits',
				'label'      => __( 'Benefits', 'helpline-nurse' ),
				'name'       => 'service_benefits',
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array(
						'key'   => 'field_svc_benefit_item',
						'label' => __( 'Benefit', 'helpline-nurse' ),
						'name'  => 'benefit',
						'type'  => 'text',
					),
				),
			),
			// FAQ.
			array(
				'key'        => 'field_svc_faq',
				'label'      => __( 'FAQ', 'helpline-nurse' ),
				'name'       => 'service_faq',
				'type'       => 'repeater',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'   => 'field_svc_faq_q',
						'label' => __( 'Question', 'helpline-nurse' ),
						'name'  => 'question',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_svc_faq_a',
						'label' => __( 'Answer', 'helpline-nurse' ),
						'name'  => 'answer',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			// Sidebar CTA.
			array(
				'key'   => 'field_svc_sidebar_cta_title',
				'label' => __( 'Sidebar CTA Title', 'helpline-nurse' ),
				'name'  => 'service_sidebar_cta_title',
				'placeholder' => 'Need Assistance?',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_svc_sidebar_cta_desc',
				'label' => __( 'Sidebar CTA Description', 'helpline-nurse' ),
				'name'  => 'service_sidebar_cta_desc',
				'placeholder' => 'Get expert guidance on your international nursing career today.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_svc_sidebar_cta_btn_label',
				'label' => __( 'Sidebar CTA Button Label', 'helpline-nurse' ),
				'name'  => 'service_sidebar_cta_btn_label',
				'placeholder' => 'Contact Us',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_svc_sidebar_cta_btn_url',
				'label' => __( 'Sidebar CTA Button URL', 'helpline-nurse' ),
				'name'  => 'service_sidebar_cta_btn_url',
				'type'  => 'url',
			),
			// Bottom CTA.
			array(
				'key'   => 'field_svc_cta_title',
				'label' => __( 'Bottom CTA Title', 'helpline-nurse' ),
				'name'  => 'service_cta_title',
				'placeholder' => 'Need help with this service?',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_svc_cta_desc',
				'label' => __( 'Bottom CTA Description', 'helpline-nurse' ),
				'name'  => 'service_cta_desc',
				'placeholder' => 'Get in touch with our experts today to fast-track your process.',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_svc_cta_btn_label',
				'label' => __( 'Bottom CTA Button Label', 'helpline-nurse' ),
				'name'  => 'service_cta_btn_label',
				'placeholder' => 'Contact Us Now',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_svc_cta_btn_url',
				'label' => __( 'Bottom CTA Button URL', 'helpline-nurse' ),
				'name'  => 'service_cta_btn_url',
				'type'  => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'service',
				),
			),
		),
	)
);

// =========================================================================
// SERVICES ARCHIVE PAGE FIELDS
// =========================================================================

acf_add_local_field_group(
	array(
		'key'    => 'group_services_archive',
		'title'  => __( 'Services Archive – Hero', 'helpline-nurse' ),
		'fields' => array(
			array(
				'key'   => 'field_sa_hero_title',
				'label' => __( 'Archive Hero Title', 'helpline-nurse' ),
				'name'  => 'services_archive_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sa_hero_subtitle',
				'label' => __( 'Archive Hero Subtitle', 'helpline-nurse' ),
				'name'  => 'services_archive_subtitle',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sa_cta_title',
				'label' => __( 'Bottom CTA Title', 'helpline-nurse' ),
				'name'  => 'services_archive_cta_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sa_cta_desc',
				'label' => __( 'Bottom CTA Description', 'helpline-nurse' ),
				'name'  => 'services_archive_cta_desc',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'   => 'field_sa_cta_btn_label',
				'label' => __( 'Bottom CTA Button Label', 'helpline-nurse' ),
				'name'  => 'services_archive_cta_btn_label',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_sa_cta_btn_url',
				'label' => __( 'Bottom CTA Button URL', 'helpline-nurse' ),
				'name'  => 'services_archive_cta_btn_url',
				'type'  => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'helpline-nurse-options',
				),
			),
		),
	)
);
