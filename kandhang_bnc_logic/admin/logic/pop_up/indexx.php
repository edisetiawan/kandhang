<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Demo for Simple jQuery Plugin for Popup Window</title>
<link rel="stylesheet" href="css/jquery.popup.css" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.popup.js"></script>
<script type="text/javascript">
    $(function() {
      $(".js__p_start, .js__p_another_start").simplePopup();
    });
  </script>
</head>
<body>
<div class="p_anch"> <a href="#" class="js__p_start">Click Here,</a> jQueryScript.nEt </div>
<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Close"></a>
<div class="p_content">jQueryScript.Net Demo<br>
<h1>jhdgfjsdhfjsd</h1><br>
<h1>jhdgfjsdhfjsd</h1><br>
<h1>jhdgfjsdhfjsd</h1><br>
<h1>jhdgfjsdhfjsd</h1><br>
<h1>jhdgfjsdhfjsd</h1><br>
<a href="http://www.jqueryscript.net/lightbox/Simple-jQuery-Plugin-for-Popup-Window.html">Download This Plugin</a></div>
</div>
</body><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>