<?php

namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Area4\Bundle\NewsBundle\Entity\Tag
 *
 * @ORM\Table(name="news_Tag")
 * @ORM\Entity
 */
class Tag
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
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var News
     *
     * @ORM\ManyToMany(targetEntity="News", mappedBy="tags")
     **/
    private $news;

    /**
     * Constructor
     *
     * @author ezekiel
     **/
    public function __construct()
    {
        $this->news = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Tag
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
}
