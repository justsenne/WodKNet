<html>
 <head>
  <title>WodKNet</title>
  <style type="text/css">
  	* { box-sizing: border-box; }.video-background {background: #000;position: fixed;top: 0; right: 0; bottom: 0; left: 0;z-index: -99;}.video-foreground,.video-background iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;pointer-events: none;}
  </style>
 </head>
 <body>

 	<div class="video-background">
    <div class="video-foreground">
      <iframe src="https://www.youtube.com/embed/GJDNkVDGM_s?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"  frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
<?php for ($x  =1; $x <= 10; $x++) {
	echo $x . '<iframe width="384" height="216" src="https://www.youtube.com/embed/GJDNkVDGM_s?autoplay=1" style="float: left !important; width: 30% !important;"> </iframe> ';
} ?>
 </body>
</html>