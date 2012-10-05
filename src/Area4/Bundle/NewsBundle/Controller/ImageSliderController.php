<?php

namespace Area4\Bundle\NewsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Area4\Bundle\NewsBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;

/**
 * Category controller.
 *
 * @Route("/slider")
 */
class ImageSliderController extends Controller
{
	/**
	 * Muestra el layout a configurar
	 * @Route("/",name="slider_display")
	 * @Template("Area4NewsBundle:ImageSlider:display.html.php")
	 * @author ezekiel
	 **/
	public function displayAction()
	{
		$request = $this->getRequest();
		$baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
		$em = $this->getDoctrine()->getEntityManager();

		$slider = '<div class="camera_wrap camera_azure_skin" id="camera_wrap">';
		$imagenes = $em->getRepository('Area4NewsBundle:ImageSlider')->findByVisible(true);

		foreach ($imagenes as $imagen) {
			$slider = $slider.sprintf('<div data-src="%s/%s"></div>',$baseurl,$imagen->getWebPath());
		}

		$slider = $slider."</div>";
		return array('slider' => $slider);
	}
}