<?php
namespace Area4\Bundle\NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
	/**
	 * Busca la ultima noticia de la categoria
	 *
	 * @return News
	 * @author ezekiel
	 **/
	public function findOneByCategoryLast($category)
	{
		return $this->createQueryBuilder('n')
				->where('n.category = '.$category->getId())
                ->orderBy('n.created_at','DESC')
                ->setMaxResults( 1 )
                ->getQuery()
                ->getOneOrNullResult();
            ;
	}
}