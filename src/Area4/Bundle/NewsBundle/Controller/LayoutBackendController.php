<?php

namespace Area4\Bundle\NewsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Area4\Bundle\NewsBundle\Entity\Category;

/**
 * Category controller.
 *
 * @Route("/admin/layout")
 */
class LayoutBackendController extends Controller
{
	/**
	 * Muestra el layout a configurar
	 * @Route("/",name="layout")
	 * @author ezekiel
	 **/
	public function showAction()
	{
		return array();
	}
}