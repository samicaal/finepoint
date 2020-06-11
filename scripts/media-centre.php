<?php

  function media_centre_download() {
    if( isset($_POST['action']) && $_POST['action'] == 'media_centre_download' ) {

      $temp_folder = wp_get_upload_dir()['basedir'] . '/temp';
      wp_mkdir_p($temp_folder);
      $user = $_POST['user_id'];
      $user_data = get_userdata($user);
      if( $user ) {
        $user_email = $user_data->user_email;
      } else {
        $user_email = $_POST['EMAIL'];
      }
      $create_folder = mkdir($temp_folder . '/' . $user_email);
      $zip = new ZipArchive();
      $zip_name = 'finepoint' . current_time('-His-d:m:Y') . '.zip';
      $zip_file = $temp_folder . '/' . $user_email . '/' . $zip_name;

      if ( $zip->open( $zip_file, ZipArchive::CREATE ) === TRUE ) {

        $ignore = array(
          '_wpnonce',
          '_wp_http_referer',
          'action',
          'user',
          'postcode',
          'GROUPINGS'
        );

        // Create zip file
        foreach( $_POST as $id => $name ) {
          if( !in_array($key, $ignore) ) {
            $path = get_attached_file($id);
            $zip->addFile( $path, $name );
            if( get_post_meta( $id, 'download_count' ) ) {
              $download_count = intval(get_post_meta( $id, 'download_count', true ));
              update_post_meta( $id, 'download_count', $download_count + 1 );
            } else {
              update_post_meta( $id, 'download_count', '1' );
            }
          }
        }

        $zip->close();

        // Download zip file

        $return = array(
          'message' => 'Thanks for using the Finepoint Media Centre',
          'url' => wp_get_upload_dir()['baseurl'] . '/temp/' . $user_email . '/' . $zip_name
        );

        update_user_meta( $user, 'used_media_centre', 'true' );
        wp_send_json($return);

      } else {

        wp_send_json_error('File does not exist');

      }

    } else {

      wp_send_json_error('Invalid post action');

    }

    die();

  }
  add_action( 'wp_ajax_media_centre_download', 'media_centre_download' );
  // add_action( 'wp_ajax_nopriv_media_centre_download', 'media_centre_download' );

 ?>