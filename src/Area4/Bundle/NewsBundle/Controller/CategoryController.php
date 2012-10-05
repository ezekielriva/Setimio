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
 * @Route("/categoria")
 */
class CategoryController extends Controller
{
	/**
	 * Muestra el layout a configurar
	 * @Route("/ultimo/{column}",name="layout")
	 * @Template("Area4NewsBundle:Category:displayColumn.html.php")
	 * @author ezekiel
	 **/
	public function displayColumnAction($column)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$layout = $em->getRepository('Area4NewsBundle:Layout')->findLast();

		
		switch ($column) {
			case 'one':
				$category = $layout->getColumnOne();
				break;
			case 'two':
				$category = $layout->getColumnTwo();
				break;
			case 'three':
				$category = $layout->getColumnThree();
				break;
			
			default:
				throw new Exception("Error: Debe haber seleccionado una columna correcta. Revise el layout", 1);
				break;
		}
		$news = $em->getRepository('Area4NewsBundle:News')->findOneByCategoryLast($category);

		return array('news'=>$news);
	}
}