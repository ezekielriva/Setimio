<?php

namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Area4\Bundle\NewsBundle\Entity\Layout
 *
 * @ORM\Table(name="news_Layout")
 * @ORM\Entity(repositoryClass="Area4\Bundle\NewsBundle\Repository\LayoutRepository")
 */
class Layout
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Category
     *
     * @ORM\OneToOne(targetEntity="Category")
     */
    private $column_one;

    /**
     * @var Category
     *
     * @ORM\OneToOne(targetEntity="Category")
     **/
    private $column_two;

    /**
     * @var Category
     * @ORM\OneToOne(targetEntity="Category")
     **/
    private $column_three;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set column_one
     *
     * @param Area4\Bundle\NewsBundle\Entity\Category $columnOne
     * @return Layout
     */
    public function setColumnOne(\Area4\Bundle\NewsBundle\Entity\Category $columnOne = null)
    {
        $this->column_one = $columnOne;
    
        return $this;
    }

    /**
     * Get column_one
     *
     * @return Area4\Bundle\NewsBundle\Entity\Category 
     */
    public function getColumnOne()
    {
        return $this->column_one;
    }

    /**
     * Set column_two
     *
     * @param Area4\Bundle\NewsBundle\Entity\Category $columnTwo
     * @return Layout
     */
    public function setColumnTwo(\Area4\Bundle\NewsBundle\Entity\Category $columnTwo = null)
    {
        $this->column_two = $columnTwo;
    
        return $this;
    }

    /**
     * Get column_two
     *
     * @return Area4\Bundle\NewsBundle\Entity\Category 
     */
    public function getColumnTwo()
    {
        return $this->column_two;
    }

    /**
     * Set column_three
     *
     * @param Area4\Bundle\NewsBundle\Entity\Category $columnThree
     * @return Layout
     */
    public function setColumnThree(\Area4\Bundle\NewsBundle\Entity\Category $columnThree = null)
    {
        $this->column_three = $columnThree;
    
        return $this;
    }

    /**
     * Get column_three
     *
     * @return Area4\Bundle\NewsBundle\Entity\Category 
     */
    public function getColumnThree()
    {
        return $this->column_three;
    }
}