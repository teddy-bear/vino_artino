<?php
/**
 * Widget CSS Classes Plugin Settings
 *
 * Settings
 * @author C.M. Kendrick <cindy@cleverness.org>
 * @package widget-css-classes
 * @version 1.1
 */

/**
 * Settings class, based on class from Theme.fm (see link)
 * @package widget-css-classes
 * @subpackage includes
 * @link http://theme.fm/2011/10/how-to-create-tabs-with-the-settings-api-in-wordpress-2590/
 */
class WCSSC_Settings {

  private $general_key = 'WCSSC_options';
  private $plugin_key = 'widget-css-classes-settings';
  private $plugin_tabs = array();
  private $general_settings = array();

  function __construct() {
    add_action( 'admin_init', array( $this, 'load_settings' ) );
    add_action( 'admin_init', array( $this, 'register_general_settings' ) );
    add_action( 'admin_init', array( $this, 'register_importexport_settings' ) );
    add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
  }

  function load_settings() {
    $this->general_settings = get_option( $this->general_key );
  }

  function section_general_desc() {
  }

  function register_general_settings() {
    $this->plugin_tabs[ $this->general_key ] = esc_attr__( 'Widget CSS Classes Settings', 'widget-css-classes' );

    register_setting( $this->general_key, $this->general_key, array( $this, 'validate_input' ) );
    add_settings_section( 'section_general', esc_attr__( 'Widget CSS Classes Settings', 'widget-css-classes' ), array(
      $this,
      'section_general_desc'
    ), $this->general_key );
    add_settings_field( 'show_number', esc_attr__( 'Add Widget Number Classes', 'widget-css-classes' ), array(
      $this,
      'show_number_option'
    ), $this->general_key, 'section_general' );
    add_settings_field( 'show_location', esc_attr__( 'Add First/Last Classes', 'widget-css-classes' ), array(
      $this,
      'show_location_option'
    ), $this->general_key, 'section_general' );
    add_settings_field( 'show_evenodd', esc_attr__( 'Add Even/Odd Classes', 'widget-css-classes' ), array(
      $this,
      'show_evenodd_option'
    ), $this->general_key, 'section_general' );
    add_settings_field( 'show_id', esc_attr__( 'Show Additional Field for ID', 'widget-css-classes' ), array(
      $this,
      'show_id_option'
    ), $this->general_key, 'section_general' );
    add_settings_field( 'type', esc_attr__( 'Class Field Type', 'widget-css-classes' ), array(
      $this,
      'type_option'
    ), $this->general_key, 'section_general' );
    add_settings_field( 'dropdown', esc_attr__( 'Define Classes for Dropdown', 'widget-css-classes' ), array(
      $this,
      'dropdown_option'
    ), $this->general_key, 'section_general' );
    do_action( 'widget_css_classes_settings' );
  }

  function show_number_option() { ?>
    <input type="radio" name="<?php echo $this->general_key . '[show_number]'; ?>"
           value="1" <?php checked( $this->general_settings['show_number'], 1 ); ?> /> <?php esc_attr_e( 'Yes', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[show_number]'; ?>"
           value="0" <?php checked( $this->general_settings['show_number'], 0 ); ?> /> <?php esc_attr_e( 'No', 'widget-css-classes' ); ?>
    <?php
  }

  function show_location_option() {
    ?>
    <input type="radio" name="<?php echo $this->general_key . '[show_location]'; ?>"
           value="1" <?php checked( $this->general_settings['show_location'], 1 ); ?> /> <?php esc_attr_e( 'Yes', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[show_location]'; ?>"
           value="0" <?php checked( $this->general_settings['show_location'], 0 ); ?> /> <?php esc_attr_e( 'No', 'widget-css-classes' ); ?>
    <?php
  }

  function show_evenodd_option() {
    ?>
    <input type="radio" name="<?php echo $this->general_key . '[show_evenodd]'; ?>"
           value="1" <?php checked( $this->general_settings['show_evenodd'], 1 ); ?> /> <?php esc_attr_e( 'Yes', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[show_evenodd]'; ?>"
           value="0" <?php checked( $this->general_settings['show_evenodd'], 0 ); ?> /> <?php esc_attr_e( 'No', 'widget-css-classes' ); ?>
    <?php
  }

  function show_id_option() {
    ?>
    <input type="radio" name="<?php echo $this->general_key . '[show_id]'; ?>"
           value="1" <?php checked( $this->general_settings['show_id'], 1 ); ?> /> <?php esc_attr_e( 'Yes', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[show_id]'; ?>"
           value="0" <?php checked( $this->general_settings['show_id'], 0 ); ?> /> <?php esc_attr_e( 'No', 'widget-css-classes' ); ?>
    <?php
  }

  function type_option() {
    ?>
    <input type="radio" name="<?php echo $this->general_key . '[type]'; ?>"
           value="1" <?php checked( $this->general_settings['type'], 1 ); ?> /> <?php esc_attr_e( 'Text', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[type]'; ?>"
           value="2" <?php checked( $this->general_settings['type'], 2 ); ?> /> <?php esc_attr_e( 'Dropdown', 'widget-css-classes' ); ?>&nbsp;&nbsp;
    <input type="radio" name="<?php echo $this->general_key . '[type]'; ?>"
           value="3" <?php checked( $this->general_settings['type'], 3 ); ?> /> <?php esc_attr_e( 'Hide', 'widget-css-classes' ); ?>
    <?php
  }

  function dropdown_option() {
    $presets = explode( ';', $this->general_settings['dropdown'] );
    if ( count( $presets ) > 1 ) {
      foreach ( $presets as $key => $preset ) {
        if ( $preset != '' ) {
          ?>
          <p><input type="text" name="<?php echo $this->general_key . '[dropdown][' . $key . ']'; ?>"
                    value="<?php echo $preset; ?>"/>
            &nbsp;&nbsp;&nbsp;&nbsp;<a class="wcssc_remove" href="#"><img
                src="<?php echo WCSSC_PLUGIN_URL; ?>/images/bullet-toggle-minus-icon.png" alt="-"/></a></p>
          <?php
        }
      }
      ?>
      <p class="wcssc_dropdown">
        <input type="text" name="<?php echo $this->general_key . '[dropdown][]'; ?>" value=""/>
        <a href="#" class="wcssc_copy" rel=".wcssc_dropdown"><img
            src="<?php echo WCSSC_PLUGIN_URL; ?>/images/bullet-toggle-plus-icon.png" alt="+"/></a>
        <a class="wcssc_remove" href="#"><img src="<?php echo WCSSC_PLUGIN_URL; ?>/images/bullet-toggle-minus-icon.png"
                                              alt="-"/></a>
      </p>
      <?php
    } else {
      ?>
      <p class="wcssc_dropdown"><input type="text" name="<?php echo $this->general_key . '[dropdown][]'; ?>"
                                       value="<?php echo $this->general_settings['dropdown']; ?>"/>
        <a href="#" class="wcssc_copy" rel=".wcssc_dropdown"><img
            src="<?php echo WCSSC_PLUGIN_URL; ?>/images/bullet-toggle-plus-icon.png" alt="+"/></a>
        <a class="wcssc_remove" href="#"><img src="<?php echo WCSSC_PLUGIN_URL; ?>/images/bullet-toggle-minus-icon.png"
                                              alt="-"/></a></p>
      <?php
    }
  }

  function register_importexport_settings() {
    $this->plugin_tabs['importexport'] = esc_attr__( 'Import/Export', 'widget-css-classes' );

    if ( isset( $_GET['wcssc_message'] ) ) {
      switch ( $_GET['wcssc_message'] ) {
        case 1:
          $wcssc_message = esc_attr__( 'Settings Imported', 'widget-css-classes' );
          break;
        case 2:
          $wcssc_message = esc_attr__( 'Invalid Settings File', 'widget-css-classes' );
          break;
        case 3:
          $wcssc_message = esc_attr__( 'No Settings File Selected', 'widget-css-classes' );
          break;
        default:
          $wcssc_message = '';
          break;
      }
    }

    if ( isset( $wcssc_message ) && $wcssc_message != '' ) {
      echo '<div class="updated"><p>' . $wcssc_message . '</p></div>';
    }

    // export settings
    if ( isset( $_GET['widget-css-classes-settings-export'] ) ) {
      header( "Content-Disposition: attachment; filename=widget-css-classes-settings.txt" );
      header( 'Content-Type: text/plain; charset=utf-8' );
      $general = get_option( 'WCSSC_options' );

      echo "[START=WCSSC SETTINGS]\n";
      foreach ( $general as $id => $text ) {
        echo "$id\t" . json_encode( $text ) . "\n";
      }
      echo "[STOP=WCSSC SETTINGS]";
      exit;
    }

    // import settings
    if ( isset( $_POST['widget-css-classes-settings-import'] ) ) {
      $wcssc_message = '';
      if ( $_FILES['widget-css-classes-settings-import-file']['tmp_name'] ) {
        $import = explode( "\n", file_get_contents( $_FILES['widget-css-classes-settings-import-file']['tmp_name'] ) );
        if ( array_shift( $import ) == "[START=WCSSC SETTINGS]" && array_pop( $import ) == "[STOP=WCSSC SETTINGS]" ) {
          foreach ( $import as $import_option ) {
            list( $key, $value ) = explode( "\t", $import_option );
            $options[ $key ] = json_decode( sanitize_text_field( $value ) );
          }
          update_option( 'WCSSC_options', $options );
          $wcssc_message = 1;
        } else {
          $wcssc_message = 2;
        }
      } else {
        $wcssc_message = 3;
      }

      wp_redirect( admin_url( '/options-general.php?page=widget-css-classes-settings&tab=importexport&wcssc_message=' . $wcssc_message ) );
      exit;
    }
  }

  function validate_input( $input ) {
    $output = array();

    foreach ( $input as $key => $value ) {

      if ( isset( $input[ $key ] ) ) {
        if ( $key == 'dropdown' ) {
          if ( is_array( $value ) ) {
            $output[ $key ] = implode( ';', $input[ $key ] );
          } else {
            $output[ $key ] = strip_tags( stripslashes( $input[ $key ] ) );
          }
        } else {
          $output[ $key ] = strip_tags( stripslashes( $input[ $key ] ) );
        }
      }
    }

    return $output;
  }

  function add_admin_menus() {
    add_options_page( esc_attr__( 'Widget CSS Classes', 'widget-css-classes' ), esc_attr__( 'Widget CSS Classes', 'widget-css-classes' ), 'manage_options', 'widget-css-classes-settings', array(
      $this,
      'plugin_options_page'
    ) );
  }

  /*
   * Plugin Options page rendering goes here, checks
   * for active tab and replaces key with the related
   * settings key. Uses the plugin_options_tabs method
   * to render the tabs.
   */
  function plugin_options_page() {
    $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_key;
    ?>
    <div class="wrap">
      <?php $this->plugin_options_tabs(); ?>
      <form method="post" action="options.php" enctype="multipart/form-data">
        <?php wp_nonce_field( 'update-options' ); ?>
        <?php settings_fields( $tab ); ?>
        <?php do_settings_sections( $tab ); ?>
        <?php if ( $tab == 'importexport' ) {
          $this->importexport_fields();
        } ?>
        <?php if ( $tab != 'importexport' ) {
          submit_button();
        } ?>
      </form>
    </div>
    <?php
    add_action( 'in_admin_footer', array( 'WCSSC_Lib', 'admin_footer' ) );
  }

  /*
   * Renders our tabs in the plugin options page,
   * walks through the object's tabs array and prints
   * them one by one. Provides the heading for the
   * plugin_options_page method.
   */
  function plugin_options_tabs() {
    $current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_key;

    screen_icon( 'options-general' );
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $this->plugin_tabs as $tab_key => $tab_caption ) {
      $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
      echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_key . '&amp;tab=' . $tab_key . '">' . $tab_caption . '</a>';
    }
    echo '</h2>';
  }

  function importexport_fields() {
    ?>
    <h3><?php esc_html_e( 'Import/Export Settings', 'widget-css-classes' ); ?></h3>

    <p><a class="submit button"
          href="?widget-css-classes-settings-export"><?php esc_attr_e( 'Export Settings', 'widget-css-classes' ); ?></a>
    </p>

    <p>
      <input type="hidden" name="widget-css-classes-settings-import" id="widget-css-classes-settings-import"
             value="true"/>
      <?php submit_button( esc_attr__( 'Import Settings', 'widget-css-classes' ), 'button', 'widget-css-classes-settings-submit', FALSE ); ?>
      <input type="file" name="widget-css-classes-settings-import-file" id="widget-css-classes-settings-import-file"/>
    </p>

    <?php
  }
}