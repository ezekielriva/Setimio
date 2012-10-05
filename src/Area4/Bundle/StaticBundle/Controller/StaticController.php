<?php

namespace Area4\Bundle\StaticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Category controller.
 *
 * @Route("/")
 */
class StaticController extends Controller
{
	/**
	 * Pagina principal
	 * @Route("/", name="main_page")
	 * @Template("Area4StaticBundle:Static:main.html.php")
	 * @return Template
	 * @author ezekiel
	 **/
	public function mainAction()
	{
		return array();
	}
}