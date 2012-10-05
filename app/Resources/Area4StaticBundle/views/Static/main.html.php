<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Setimio .·. Vinoteca & WineBar .·. Tucumán, Argentina</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/setimio.css'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo $view['assets']->getUrl('favicon.ico'); ?>" />
    </head>
    <body>
        <div id="content">

            <div id="top">
                <img src="<?php echo $view['assets']->getUrl('img/header_r1_c1_s1.png'); ?>" alt="Setimio Logo">
                <img src="<?php echo $view['assets']->getUrl('img/header_r1_c6_s1.png'); ?>" alt="Direccion 1">
                <img src="<?php echo $view['assets']->getUrl('img/header_r1_c11_s1.png'); ?>" alt="Direccion 2">
                <img src="<?php echo $view['assets']->getUrl('img/header_r1_c16_s1.png'); ?>" alt="Direccion 3">
            </div>
            <div id="contacto">
                <img src="<?php echo $view['assets']->getUrl('img/icons/mail.png'); ?>">
                <a href="mailto:contacto@setimio.com">contacto@setimio.com</a>
            </div>
            <div id="menu-top">
                <a href="" class="button" id="sucursales"></a>
                <a href="" class="button" id="productos"></a>
                <a href="" class="button" id="regalos"></a>
                <a href="" class="button" id="delicatessen"></a>
                <a href="" class="button" id="winebar"></a>
                <a href="" class="button" id="novedades"></a>
                <a href="" class="button" id="contacto"></a>
                <a href="" class="button" id="copa"></a>
            </div>
            <!-- Slider -->
            <?php echo $view['actions']->render('Area4NewsBundle:ImageSlider:display') ?>
            <!-- Fin Slider -->
            <div id="novedades">
                <?php echo $view['actions']->render('Area4NewsBundle:Category:displayColumn', array('column'=>'one')) ?>
                <?php echo $view['actions']->render('Area4NewsBundle:Category:displayColumn', array('column'=>'two')) ?>
                <?php echo $view['actions']->render('Area4NewsBundle:Category:displayColumn', array('column'=>'three')) ?>
            </div>
        </div>
</body>
</html>
