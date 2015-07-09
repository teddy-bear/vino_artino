<?php

// =============================== Social Networks Widget ====================================== //
class SocialNetworksWidget extends WP_Widget {

  function SocialNetworksWidget() {
    $widget_ops = array(
      'classname'   => 'social_networks_widget',
      'description' => __( 'Link to your social networks.' )
    );
    $this->WP_Widget( 'social_networks', __( 'Social Networks' ), $widget_ops, $control_ops );
  }

  function theme_widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    $networks['Twitter']['link']   = $instance['twitter'];
    $networks['Facebook']['link']  = $instance['facebook'];
    $networks['Flickr']['link']    = $instance['flickr'];
    $networks['Feed']['link']      = $instance['feed'];
    $networks['Linkedin']['link']  = $instance['linkedin'];
    $networks['Delicious']['link'] = $instance['delicious'];
    $networks['Youtube']['link']   = $instance['youtube'];
    $networks['Google']['link']    = $instance['google'];
    $networks['Pinterest']['link'] = $instance['pinterest'];
    $networks['Blogger']['link']   = $instance['blogger'];
    $networks['Tumblr']['link']    = $instance['tumblr'];
    $networks['Vimeo']['link']     = $instance['vimeo'];
    $networks['Instagram']['link'] = $instance['instagram'];
    $networks['I_Email']['link']   = $instance['i_email'];

    $networks['Twitter']['label']   = $instance['twitter_label'];
    $networks['Facebook']['label']  = $instance['facebook_label'];
    $networks['Flickr']['label']    = $instance['flickr_label'];
    $networks['Feed']['label']      = $instance['feed_label'];
    $networks['Linkedin']['label']  = $instance['linkedin_label'];
    $networks['Delicious']['label'] = $instance['delicious_label'];
    $networks['Youtube']['label']   = $instance['youtube_label'];
    $networks['Pinterest']['label'] = $instance['pinterest_label'];
    $networks['Google']['label']    = $instance['google_label'];
    $networks['Blogger']['label']   = $instance['blogger_label'];
    $networks['Tumblr']['label']    = $instance['tumblr_label'];
    $networks['Vimeo']['label']     = $instance['vimeo_label'];
    $networks['Instagram']['label'] = $instance['instagram_label'];
    $networks['I_Email']['label']   = $instance['i_email_label'];

    $display = $instance['display'];


    echo $before_widget;
    if ( $title ) {
      echo $before_title . $title . $after_title;
    }
    ?>

    <ul class="social-networks">

      <?php foreach (
        array(
          "Facebook",
          "Twitter",
          "Flickr",
          "Feed",
          "Linkedin",
          "Delicious",
          "Youtube",
          "Google",
          "Pinterest",
          "Blogger",
          "Tumblr",
          "Vimeo",
          "Instagram",
          "I_Email"
        ) as $network
      ) : ?>
        <?php if ( ! empty( $networks[ $network ]['link'] ) ) : ?>
          <li>
            <a rel="external" title="<?php echo strtolower( $network ); ?>"
               href="<?php echo $networks[ $network ]['link']; ?>">
              <?php if ( ( $display == "both" ) or ( $display == "icons" ) ) { ?>
                <img
                  src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icons/social/<?php echo strtolower( $network ); ?>.png"
                  alt="">
              <?php }
              if ( ( $display == "labels" ) or ( $display == "both" ) ) { ?>
                <?php if ( ( $networks[ $network ]['label'] ) !== "" ) {
                  echo $networks[ $network ]['label'];
                } else {
                  echo $network;
                } ?>
              <?php } ?>
            </a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>

    </ul>

    <?php
    echo $after_widget;
  }

  function theme_update( $new_instance, $old_instance ) {
    $instance          = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );

    $instance['twitter']   = $new_instance['twitter'];
    $instance['facebook']  = $new_instance['facebook'];
    $instance['flickr']    = $new_instance['flickr'];
    $instance['feed']      = $new_instance['feed'];
    $instance['linkedin']  = $new_instance['linkedin'];
    $instance['delicious'] = $new_instance['delicious'];
    $instance['youtube']   = $new_instance['youtube'];
    $instance['google']    = $new_instance['google'];
    $instance['pinterest'] = $new_instance['pinterest'];
    $instance['blogger']   = $new_instance['blogger'];
    $instance['tumblr']    = $new_instance['tumblr'];
    $instance['vimeo']     = $new_instance['vimeo'];
    $instance['instagram'] = $new_instance['instagram'];
    $instance['i_email']   = $new_instance['i_email'];

    $instance['twitter_label']   = $new_instance['twitter_label'];
    $instance['facebook_label']  = $new_instance['facebook_label'];
    $instance['flickr_label']    = $new_instance['flickr_label'];
    $instance['feed_label']      = $new_instance['feed_label'];
    $instance['linkedin_label']  = $new_instance['linkedin_label'];
    $instance['delicious_label'] = $new_instance['delicious_label'];
    $instance['youtube_label']   = $new_instance['youtube_label'];
    $instance['google_label']    = $new_instance['google_label'];
    $instance['pinterest_label'] = $new_instance['pinterest_label'];
    $instance['blogger_label']   = $new_instance['blogger_label'];
    $instance['tumblr_label']    = $new_instance['tumblr_label'];
    $instance['vimeo_label']     = $new_instance['vimeo_label'];
    $instance['instagram_label'] = $new_instance['instagram_label'];
    $instance['i_email_label']   = $new_instance['i_email_label'];

    $instance['display'] = $new_instance['display'];

    return $instance;
  }

  function theme_form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array(
      'title' => '',
      'text'  => ''
    ) );
    $title    = strip_tags( $instance['title'] );

    $twitter   = $instance['twitter'];
    $facebook  = $instance['facebook'];
    $flickr    = $instance['flickr'];
    $feed      = $instance['feed'];
    $linkedin  = $instance['linkedin'];
    $delicious = $instance['delicious'];
    $youtube   = $instance['youtube'];
    $google    = $instance['google'];
    $pinterest = $instance['pinterest'];
    $blogger   = $instance['blogger'];
    $tumblr    = $instance['tumblr'];
    $vimeo     = $instance['vimeo'];
    $instagram = $instance['instagram'];
    $i_email   = $instance['i_email'];

    $twitter_label   = $instance['twitter_label'];
    $facebook_label  = $instance['facebook_label'];
    $flickr_label    = $instance['flickr_label'];
    $feed_label      = $instance['feed_label'];
    $linkedin_label  = $instance['linkedin_label'];
    $delicious_label = $instance['delicious_label'];
    $youtube_label   = $instance['youtube_label'];
    $google_label    = $instance['google_label'];
    $pinterest_label = $instance['pinterest_label'];
    $blogger_label   = $instance['blogger_label'];
    $tumblr_label    = $instance['tumblr_label'];
    $vimeo_label     = $instance['vimeo_label'];
    $instagram_label = $instance['instagram_label'];
    $i_email_label   = $instance['i_email_label'];

    $display = $instance['display'];


    $text = format_to_edit( $instance['text'] );
    ?>
    <p><label
        for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
             name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
             value="<?php echo esc_attr( $title ); ?>"/></p>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Facebook' ); ?>:</legend>

      <p><label
          for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'facebook' ); ?>"
               name="<?php echo $this->get_field_name( 'facebook' ); ?>"
               type="text" value="<?php echo esc_attr( $facebook ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'facebook_label' ); ?>"><?php _e( 'Facebook label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'facebook_label' ); ?>"
               name="<?php echo $this->get_field_name( 'facebook_label' ); ?>"
               type="text" value="<?php echo esc_attr( $facebook_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Twitter' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'twitter' ); ?>"
               name="<?php echo $this->get_field_name( 'twitter' ); ?>"
               type="text" value="<?php echo esc_attr( $twitter ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'twitter_label' ); ?>"><?php _e( 'Twitter label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'twitter_label' ); ?>"
               name="<?php echo $this->get_field_name( 'twitter_label' ); ?>"
               type="text" value="<?php echo esc_attr( $twitter_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Flickr' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'flickr' ); ?>"
               name="<?php echo $this->get_field_name( 'flickr' ); ?>"
               type="text" value="<?php echo esc_attr( $flickr ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'flickr_label' ); ?>"><?php _e( 'Flickr label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'flickr_label' ); ?>"
               name="<?php echo $this->get_field_name( 'flickr_label' ); ?>"
               type="text" value="<?php echo esc_attr( $flickr_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'RSS feed' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'feed' ); ?>"><?php _e( 'RSS feed:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'feed' ); ?>"
               name="<?php echo $this->get_field_name( 'feed' ); ?>" type="text"
               value="<?php echo esc_attr( $feed ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'feed_label' ); ?>"><?php _e( 'RSS label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'feed_label' ); ?>"
               name="<?php echo $this->get_field_name( 'feed_label' ); ?>"
               type="text" value="<?php echo esc_attr( $feed_label ); ?>"/></p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Linkedin' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'linkedin' ); ?>"
               name="<?php echo $this->get_field_name( 'linkedin' ); ?>"
               type="text" value="<?php echo esc_attr( $linkedin ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'linkedin_label' ); ?>"><?php _e( 'Linkedin label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'linkedin_label' ); ?>"
               name="<?php echo $this->get_field_name( 'linkedin_label' ); ?>"
               type="text" value="<?php echo esc_attr( $linkedin_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Delicious' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e( 'Delicious URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'delicious' ); ?>"
               name="<?php echo $this->get_field_name( 'delicious' ); ?>"
               type="text" value="<?php echo esc_attr( $delicious ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'delicious_label' ); ?>"><?php _e( 'Delicious label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'delicious_label' ); ?>"
               name="<?php echo $this->get_field_name( 'delicious_label' ); ?>"
               type="text" value="<?php echo esc_attr( $delicious_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Youtube' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'youtube' ); ?>"
               name="<?php echo $this->get_field_name( 'youtube' ); ?>"
               type="text" value="<?php echo esc_attr( $youtube ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'youtube_label' ); ?>"><?php _e( 'Youtube label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'youtube_label' ); ?>"
               name="<?php echo $this->get_field_name( 'youtube_label' ); ?>"
               type="text" value="<?php echo esc_attr( $youtube_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Google' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'google' ); ?>"><?php _e( 'Google URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'google' ); ?>"
               name="<?php echo $this->get_field_name( 'google' ); ?>"
               type="text" value="<?php echo esc_attr( $google ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'google_label' ); ?>"><?php _e( 'Google label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'google_label' ); ?>"
               name="<?php echo $this->get_field_name( 'google_label' ); ?>"
               type="text" value="<?php echo esc_attr( $google_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Pinterest' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'pinterest' ); ?>"
               name="<?php echo $this->get_field_name( 'pinterest' ); ?>"
               type="text" value="<?php echo esc_attr( $pinterest ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'pinterest_label' ); ?>"><?php _e( 'Pinterest label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'pinterest_label' ); ?>"
               name="<?php echo $this->get_field_name( 'pinterest_label' ); ?>"
               type="text" value="<?php echo esc_attr( $pinterest_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Blogger' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'blogger' ); ?>"><?php _e( 'Blogger URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'blogger' ); ?>"
               name="<?php echo $this->get_field_name( 'blogger' ); ?>"
               type="text" value="<?php echo esc_attr( $blogger ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'blogger_label' ); ?>"><?php _e( 'Blogger label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'blogger_label' ); ?>"
               name="<?php echo $this->get_field_name( 'blogger_label' ); ?>"
               type="text" value="<?php echo esc_attr( $blogger_label ); ?>"/>
      </p>
    </fieldset>

    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Tumblr' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'tumblr' ); ?>"
               name="<?php echo $this->get_field_name( 'tumblr' ); ?>"
               type="text" value="<?php echo esc_attr( $tumblr ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'tumblr_label' ); ?>"><?php _e( 'Tumblr label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'tumblr_label' ); ?>"
               name="<?php echo $this->get_field_name( 'tumblr_label' ); ?>"
               type="text" value="<?php echo esc_attr( $tumblr_label ); ?>"/>
      </p>
    </fieldset>


    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Vimeo' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'vimeo URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'vimeo' ); ?>"
               name="<?php echo $this->get_field_name( 'vimeo' ); ?>"
               type="text" value="<?php echo esc_attr( $vimeo ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'vimeo_label' ); ?>"><?php _e( 'Vimeo label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'vimeo_label' ); ?>"
               name="<?php echo $this->get_field_name( 'vimeo_label' ); ?>"
               type="text" value="<?php echo esc_attr( $vimeo_label ); ?>"/></p>
    </fieldset>


    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( 'Instagram' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'instagram URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'instagram' ); ?>"
               name="<?php echo $this->get_field_name( 'instagram' ); ?>"
               type="text" value="<?php echo esc_attr( $instagram ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'instagram_label' ); ?>"><?php _e( 'Instagram label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'instagram_label' ); ?>"
               name="<?php echo $this->get_field_name( 'instagram_label' ); ?>"
               type="text" value="<?php echo esc_attr( $instagram_label ); ?>"/>
      </p>
    </fieldset>


    <fieldset
      style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
      <legend style="padding:0 5px;"><?php _e( ' Just Email' ); ?>:</legend>
      <p><label
          for="<?php echo $this->get_field_id( 'i_email' ); ?>"><?php _e( 'Just Email URL:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'i_email' ); ?>"
               name="<?php echo $this->get_field_name( 'i_email' ); ?>"
               type="text" value="<?php echo esc_attr( $i_email ); ?>"/></p>

      <p><label
          for="<?php echo $this->get_field_id( 'i_email_label' ); ?>"><?php _e( ' Just Email label:' ); ?></label>
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'i_email_label' ); ?>"
               name="<?php echo $this->get_field_name( 'i_email_label' ); ?>"
               type="text" value="<?php echo esc_attr( $i_email_label ); ?>"/>
      </p>
    </fieldset>


    <p>Display:</p>
    <label for="<?php echo $this->get_field_id( 'icons' ); ?>"><input
        type="radio" name="<?php echo $this->get_field_name( 'display' ); ?>"
        value="icons"
        id="<?php echo $this->get_field_id( 'icons' ); ?>" <?php checked( $display, "icons" ); ?>></input>
      Icons</label>
    <label for="<?php echo $this->get_field_id( 'labels' ); ?>"><input
        type="radio" name="<?php echo $this->get_field_name( 'display' ); ?>"
        value="labels"
        id="<?php echo $this->get_field_id( 'labels' ); ?>" <?php checked( $display, "labels" ); ?>></input>
      Labels</label>
    <label for="<?php echo $this->get_field_id( 'both' ); ?>"><input
        type="radio" name="<?php echo $this->get_field_name( 'display' ); ?>"
        value="both"
        id="<?php echo $this->get_field_id( 'both' ); ?>" <?php checked( $display, "both" ); ?>></input>
      Both</label>


    <?php
  }
}

add_action( 'widgets_init', create_function( '', 'return register_widget("SocialNetworksWidget");' ) );


?>