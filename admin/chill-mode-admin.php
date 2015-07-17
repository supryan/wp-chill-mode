<?php
/*
*
* Chill Mode - Admin Interface
* Description: The admin markup, syling and server side scripting
*
*/

if(isset($_POST['chill_hidden']) && $_POST['chill_hidden'] == 'chill_mode') {

  if(1 === check_admin_referer('chill-mode')) {

    $chillModeTitle = str_replace("\'", "'", $_POST['chillModeTitle']);
    update_option('chillModeTitle', $chillModeTitle);

    $chillModeHeading = str_replace("\'", "'", $_POST['chillModeHeading']);
    update_option('chillModeHeading', $chillModeHeading);

    $chillModeMessage = str_replace("\'", "'", $_POST['chillModeMessage']);
    update_option('chillModeMessage', $chillModeMessage);

    $chillModeImage = $_POST['chillModeImage'];
    update_option('chillModeImage', $chillModeImage);

    $chillModeGA = $_POST['chillModeGA'];
    update_option('chillModeGA', $chillModeGA);

    $chillModeStyling = $_POST['chillModeStyling'];
    update_option('chillModeStyling', $chillModeStyling);

    $chillModeScripts = $_POST['chillModeScripts'];
    update_option('chillModeScripts', $chillModeScripts); ?>

    <div class="updated">
      <p><strong>Options saved.</strong></p>
    </div><?php

  } else {
    die('Permission denied.');
  }

} else {

  $chillModeTitle = get_option('chillModeTitle');
  $chillModeHeading = get_option('chillModeHeading');
  $chillModeMessage = get_option('chillModeMessage');
  $chillModeImage = get_option('chillModeImage');
  $chillModeGA = get_option('chillModeGA');
  $chillModeStyling = get_option('chillModeStyling');
  $chillModeScripts = get_option('chillModeScripts');

} ?>

<style>

  input {
    width: 100%;
  }
  textarea {
    width: 100%;
    min-height: 100px;
  }
  textarea.customCode {
    font-family: monospace, sans-serif;
    min-height: 200px;
  }
  input.btn {
    width: auto;
    margin-top: 15px;
  }
  input.upload {
    width: 50%;
  }

  /* Maintenance Mode Message */

  div.updated, div.error {
    margin: 5px 15px 2px 0px;
  }

  #message {
    margin: 20px 15px 0 0;
    padding: 10px 12px;
    border-left: none;
    border-top: 4px solid #dd3d36;
  }
  #message p {
    color: #dd3d36;
    font-size: 30px;
    text-align: center;
  }
  #message p a {
    display: block;
    font-size: 14px;
  }

</style>

<h2>Chill Mode</h2>
<hr>
<p>Edit the page settings for when chill mode is activated.</p>
<hr>
<form name="chill_form_update_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
  <input type="hidden" name="chill_hidden" value="chill_mode">
  <?php wp_nonce_field('chill-mode'); ?>
  <table class="form-table">
    <tr>
      <th><label for="chillModeTitle">Page Title</label></th>
      <td><input id="chillModeTitle" type="text" name="chillModeTitle" placeholder="We'll be right back." value="<?php echo $chillModeTitle ? $chillModeTitle : ''; ?>"></td>
    </tr>
    <tr>
      <th><label for="chillModeHeading">Heading</label></th>
      <td><input id="chillModeHeading" type="text" name="chillModeHeading" placeholder="Undergoing Maintenance" value="<?php echo $chillModeHeading ? $chillModeHeading : ''; ?>"></td>
    </tr>
    <tr>
      <th><label for="chillModeMessage">Message</label></th>
      <td><textarea id="chillModeMessage" name="chillModeMessage" placeholder="Hang tight. We'll be right back."><?php echo $chillModeMessage ? $chillModeMessage : ''; ?></textarea></td>
    </tr>
    <tr>
      <th><label for="chillModeImage">Upload Image</label></th>
      <td><input id="upload_image" type="text" class="upload" name="chillModeImage" value="<?php echo $chillModeImage ? $chillModeImage : 'http://'; ?>" /></td>
    </tr>
    <tr>
      <th></th>
      <td><input id="upload_image_button" class="button upload" type="button" value="Upload Image" /></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo $chillModeImage ? '<img src="'. $chillModeImage .'" alt="Chill Mode">' : ''; ?></td>
    </tr>
  </table>
  <hr>
  <p>Enter optional settings here such as your Google Analytics UA code or any custom styling or scripts below. No need to include the HTML tags. Just copy and paste.</p>
  <hr>
  <table class="form-table">
    <tr>
      <th><label for="chillModeGA">Google Analytics UA</label></th>
      <td><input id="chillModeGA" type="text" name="chillModeGA" placeholder="UA-XXXXXXXX-X" value="<?php echo $chillModeGA ? $chillModeGA : ''; ?>"></td>
    </tr>
    <tr>
      <th><label for="chillModeStyling">Custom Styles</label></th>
      <td><textarea id="chillModeStyling" type="text" name="chillModeStyling" class="customCode"><?php echo $chillModeStyling ? $chillModeStyling : ''; ?></textarea></td>
    </tr>
    <tr>
      <th><label for="chillModeScripts">Custom Scripts</label></th>
      <td><textarea id="chillModeScripts" type="text" name="chillModeScripts" class="customCode"><?php echo $chillModeScripts ? $chillModeScripts : ''; ?></textarea></td>
    </tr>
  </table>
  <input class="btn button" type="submit" name="Submit" value="Update Settings" />
</form>
