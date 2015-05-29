// Chill Mode //

  // Remove default WP maintenance stylesheet in head //
  var wpStyles = document.head.getElementsByTagName("style");
  if (wpStyles.length) {
    wpStyles[0].parentElement.removeChild(wpStyles[0]);
  }

  // Create DOM Elements //
  styles = document.createElement("link");
  fav = document.createElement("link");
  touchicon = document.createElement("link");
  mobile = document.createElement("meta");
  image = document.createElement("img");

  // Template variables //
  var pluginPath = document.getElementById("plug").innerHTML;
  var templatePath = document.getElementById("temp").innerHTML;

  // Main Styles directory //
  styles.href = pluginPath + "/css/styles.css";
  styles.rel = "stylesheet";

  // Favicon //
  fav.href = templatePath + "/img/favicon.ico";
  fav.rel = "icon";

  // Apple Touch Icon //
  touchicon.href = templatePath + "/img/apple-icon.png";
  touchicon.rel = "apple-touch-icon";

  // Mobile viewport //
  mobile.name = "viewport";
  mobile.content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no";

  // Images //
  image.src = templatePath + "/img/logo.png";
  image.alt = 'Image alt text.';
  bgImage = templatePath + "/img/bg.png";

  document.querySelector("a[target]");
  document.getElementsByTagName("head")[0].appendChild(styles);
  document.getElementsByTagName("head")[0].appendChild(mobile);
  document.getElementsByTagName("head")[0].appendChild(fav);
  document.getElementsByTagName("head")[0].appendChild(touchicon);
  document.getElementsByClassName("pic")[0].appendChild(image);
  document.getElementsByTagName("html")[0].style.background = "url( " + bgImage + ")";