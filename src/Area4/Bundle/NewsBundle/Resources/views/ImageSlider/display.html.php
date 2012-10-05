<?php 
echo $slider; 
echo sprintf('<link href="%s" type="text/css" rel="stylesheet">',$view['assets']->getUrl('bundles/area4news/css/camera.css'));
echo sprintf('<script type="text/javascript" src="%s"></script>',$view['assets']->getUrl('bundles/area4news/js/jquery-1.8.2.min.js'));
echo sprintf('<script type="text/javascript" src="%s"></script>',$view['assets']->getUrl('bundles/area4news/js/jquery.easing.1.3.js'));
echo sprintf('<script type="text/javascript" src="%s"></script>',$view['assets']->getUrl('bundles/area4news/js/camera.min.js'));

echo '
<script type="text/javascript">
iniciarSlider()


function iniciarSlider () {
	jQuery(\'#camera_wrap\').camera({
		 alignment:\'center\', //op: topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
		 autoAdvance:true, //op: true, false
		 fx: \'random\', 
		 height: \'10%\', //Alto en % de las imagenes. 10% de la imagen. op: px, % o auto.
		 minHeight: \'300px\', //Alto minimo
		 navigation: true, //menu de navegacion. op: true, false
		 pagination: false, //paginador de abjo. op: true, false
		 playPause: false, //si se ve el playPause boton
	});
	jQuery(\'#camera_wrap\').cameraResume();
}</script>
';

// //efecto del paso de imagenes. op: 'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'
?>

