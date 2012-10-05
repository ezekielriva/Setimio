<?php
namespace Area4\Bundle\NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class LayoutRepository extends EntityRepository
{
	/**
	 * Busca el ultimo layout
	 *
	 * @return Layout
	 * @author ezekiel
	 **/
	public function findLast()
	{
		return $this->createQueryBuilder('l')
                ->orderBy('l.id','DESC')
                ->setMaxResults( 1 )
                ->getQuery()
                ->getSingleResult();
            ;
	}
}