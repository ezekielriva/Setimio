<?php

namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area4\Bundle\NewsBundle\Entity\Category
 *
 * @ORM\Table(name="news_Category")
 * @ORM\Entity(repositoryClass="Area4\Bundle\NewsBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * Id de la categoria "Sin categoria"
     * Indispensable para que el sistema funcione correctamente
     *
     * @var integer
     **/
    static $SIN_CATEGORIA_ID = 1;
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var Category $children
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    /**
     * @var Category $parent
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     */
    private $parent;

    /**
     * Constructor
     *
     */
    public function __construct() {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var News
     * @ORM\OneToMany(targetEntity="News", mappedBy="category")
     **/
    private $news;


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
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set parent
     *
     * @param \stdClass $parent
     * @return Category
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \stdClass 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * toString
     *
     * @return string
     * @author ezekiel
     **/
    public function __toString()
    {
        return $this->getStripe("",$this->parent).$this->description;
    }

    /**
     * Crea el stripe para usarlo en la vista
     *
     * @return string
     * @author ezekiel
     **/
    private function getStripe($string,$parent)
    {
        if ( is_null($parent) ) {
            return $string;
        }
        return $this->getStripe($string."--",$parent->getParent());
    }
}
