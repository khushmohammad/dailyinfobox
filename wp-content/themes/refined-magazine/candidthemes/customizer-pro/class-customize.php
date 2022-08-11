<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Refined_Magazine_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Refined_Magazine_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Refined_Magazine_Customize_Section_Pro(
				$manager,
				'refined-magazine',
				array(
					'title'    => esc_html__( 'Unlock More Features', 'refined-magazine' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'refined-magazine' ),
					'pro_url'  => 'https://www.candidthemes.com/themes/refined-magazine-pro/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';


		wp_enqueue_script( 'refined-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'refined-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Refined_Magazine_Customize::get_instance();

if ( ! class_exists( 'Refined_Magazine_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Refined_Magazine_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Refined Magazine', 'refined-magazine')?></h2>
			<p><?php esc_html_e('Refined Magazine is clean and minimal WordPress theme for blog website.', 'refined-magazine')?> </p>
			<p>
			<a href="<?php echo esc_url('https://refined.candidthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'Refined Magazine Demos', 'refined-magazine' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'refined-magazine')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'refined-magazine')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/refined-magazine/'); ?>" target="_blank"><?php esc_html_e( 'Refined Magazine Documentation', 'refined-magazine' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'refined-magazine')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'refined-magazine')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Refined Magazine Support', 'refined-magazine' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'refined-magazine' ); ?></h3>
			<p><?php esc_html_e('If you like Refined Magazine Kindly Rate this Theme', 'refined-magazine')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/refined-magazine/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'refined-magazine' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
