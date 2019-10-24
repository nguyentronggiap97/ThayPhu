<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Lawyer_Attorney_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-lawyer-attorney' ),
				'family'      => esc_html__( 'Font Family', 'vw-lawyer-attorney' ),
				'size'        => esc_html__( 'Font Size',   'vw-lawyer-attorney' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-lawyer-attorney' ),
				'style'       => esc_html__( 'Font Style',  'vw-lawyer-attorney' ),
				'line_height' => esc_html__( 'Line Height', 'vw-lawyer-attorney' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-lawyer-attorney' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-lawyer-attorney-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-lawyer-attorney-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-lawyer-attorney' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-lawyer-attorney' ),
        'Acme' => __( 'Acme', 'vw-lawyer-attorney' ),
        'Anton' => __( 'Anton', 'vw-lawyer-attorney' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-lawyer-attorney' ),
        'Arimo' => __( 'Arimo', 'vw-lawyer-attorney' ),
        'Arsenal' => __( 'Arsenal', 'vw-lawyer-attorney' ),
        'Arvo' => __( 'Arvo', 'vw-lawyer-attorney' ),
        'Alegreya' => __( 'Alegreya', 'vw-lawyer-attorney' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-lawyer-attorney' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-lawyer-attorney' ),
        'Bangers' => __( 'Bangers', 'vw-lawyer-attorney' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-lawyer-attorney' ),
        'Bad Script' => __( 'Bad Script', 'vw-lawyer-attorney' ),
        'Bitter' => __( 'Bitter', 'vw-lawyer-attorney' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-lawyer-attorney' ),
        'BenchNine' => __( 'BenchNine', 'vw-lawyer-attorney' ),
        'Cabin' => __( 'Cabin', 'vw-lawyer-attorney' ),
        'Cardo' => __( 'Cardo', 'vw-lawyer-attorney' ),
        'Courgette' => __( 'Courgette', 'vw-lawyer-attorney' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-lawyer-attorney' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-lawyer-attorney' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-lawyer-attorney' ),
        'Cuprum' => __( 'Cuprum', 'vw-lawyer-attorney' ),
        'Cookie' => __( 'Cookie', 'vw-lawyer-attorney' ),
        'Chewy' => __( 'Chewy', 'vw-lawyer-attorney' ),
        'Days One' => __( 'Days One', 'vw-lawyer-attorney' ),
        'Dosis' => __( 'Dosis', 'vw-lawyer-attorney' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-lawyer-attorney' ),
        'Economica' => __( 'Economica', 'vw-lawyer-attorney' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-lawyer-attorney' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-lawyer-attorney' ),
        'Francois One' => __( 'Francois One', 'vw-lawyer-attorney' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-lawyer-attorney' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-lawyer-attorney' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-lawyer-attorney' ),
        'Handlee' => __( 'Handlee', 'vw-lawyer-attorney' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-lawyer-attorney' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-lawyer-attorney' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-lawyer-attorney' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-lawyer-attorney' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-lawyer-attorney' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-lawyer-attorney' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-lawyer-attorney' ),
        'Kanit' => __( 'Kanit', 'vw-lawyer-attorney' ),
        'Lobster' => __( 'Lobster', 'vw-lawyer-attorney' ),
        'Lato' => __( 'Lato', 'vw-lawyer-attorney' ),
        'Lora' => __( 'Lora', 'vw-lawyer-attorney' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-lawyer-attorney' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-lawyer-attorney' ),
        'Merriweather' => __( 'Merriweather', 'vw-lawyer-attorney' ),
        'Monda' => __( 'Monda', 'vw-lawyer-attorney' ),
        'Montserrat' => __( 'Montserrat', 'vw-lawyer-attorney' ),
        'Muli' => __( 'Muli', 'vw-lawyer-attorney' ),
        'Marck Script' => __( 'Marck Script', 'vw-lawyer-attorney' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-lawyer-attorney' ),
        'Open Sans' => __( 'Open Sans', 'vw-lawyer-attorney' ),
        'Overpass' => __( 'Overpass', 'vw-lawyer-attorney' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-lawyer-attorney' ),
        'Oxygen' => __( 'Oxygen', 'vw-lawyer-attorney' ),
        'Orbitron' => __( 'Orbitron', 'vw-lawyer-attorney' ),
        'Patua One' => __( 'Patua One', 'vw-lawyer-attorney' ),
        'Pacifico' => __( 'Pacifico', 'vw-lawyer-attorney' ),
        'Padauk' => __( 'Padauk', 'vw-lawyer-attorney' ),
        'Playball' => __( 'Playball', 'vw-lawyer-attorney' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-lawyer-attorney' ),
        'PT Sans' => __( 'PT Sans', 'vw-lawyer-attorney' ),
        'Philosopher' => __( 'Philosopher', 'vw-lawyer-attorney' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-lawyer-attorney' ),
        'Poiret One' => __( 'Poiret One', 'vw-lawyer-attorney' ),
        'Quicksand' => __( 'Quicksand', 'vw-lawyer-attorney' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-lawyer-attorney' ),
        'Raleway' => __( 'Raleway', 'vw-lawyer-attorney' ),
        'Rubik' => __( 'Rubik', 'vw-lawyer-attorney' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-lawyer-attorney' ),
        'Russo One' => __( 'Russo One', 'vw-lawyer-attorney' ),
        'Righteous' => __( 'Righteous', 'vw-lawyer-attorney' ),
        'Slabo' => __( 'Slabo', 'vw-lawyer-attorney' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-lawyer-attorney' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-lawyer-attorney'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-lawyer-attorney' ),
        'Sacramento' => __( 'Sacramento', 'vw-lawyer-attorney' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-lawyer-attorney' ),
        'Tangerine' => __( 'Tangerine', 'vw-lawyer-attorney' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-lawyer-attorney' ),
        'VT323' => __( 'VT323', 'vw-lawyer-attorney' ),
        'Varela Round' => __( 'Varela Round', 'vw-lawyer-attorney' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-lawyer-attorney' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-lawyer-attorney' ),
        'Volkhov' => __( 'Volkhov', 'vw-lawyer-attorney' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-lawyer-attorney' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-lawyer-attorney' ),
			'100' => esc_html__( 'Thin',       'vw-lawyer-attorney' ),
			'300' => esc_html__( 'Light',      'vw-lawyer-attorney' ),
			'400' => esc_html__( 'Normal',     'vw-lawyer-attorney' ),
			'500' => esc_html__( 'Medium',     'vw-lawyer-attorney' ),
			'700' => esc_html__( 'Bold',       'vw-lawyer-attorney' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-lawyer-attorney' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-lawyer-attorney' ),
			'italic'  => esc_html__( 'Italic', 'vw-lawyer-attorney' ),
			'oblique' => esc_html__( 'Oblique', 'vw-lawyer-attorney' )
		);
	}
}
