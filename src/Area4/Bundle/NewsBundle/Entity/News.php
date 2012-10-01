<?php

namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area4\Bundle\NewsBundle\Entity\News
 *
 * @ORM\Table(name="news_News")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class News
{
    static $PUBLISHED = 1;
    static $NO_PUBLISHED = 0;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \stdClass $tags
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="news")
     * @ORM\JoinTable(name="news_News_Tags")
     */
    private $tags;

    /**
     * @var \stdClass $category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var \DateTime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * undocumented class variable
     *
     * @var boolean
     * @ORM\Column(name="published", type="integer")
     **/
    private $published;

    /**
     * Publicado por
     *
     * @var Usuario
     * @ORM\Column(name="published_by")
     **/
    private $published_by;

    /**
     * Constructor
     *
     * @author ezekiel
     **/
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set tags
     *
     * @param \stdClass $tags
     * @return News
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    
        return $this;
    }

    /**
     * Get tags
     *
     * @return \stdClass 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set category
     *
     * @param \stdClass $category
     * @return News
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \stdClass 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return News
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return News
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set published
     *
     **/
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * Get published
     *
     * @return true : si esta publicado
     *         false: si no esta publicado
     **/
    public function isPublished()
    {
        if ($this->publiched === $PUBLISHED)
            return true;
        else
            return false;
    }

    /**
     * Antes de guardar en la bd
     * @ORM\PrePersist()
     * @author ezekiel
     **/
    public function prePersist()
    {
        $this->created_at = new \DateTime('now');
        $this->updated_at = $this->created_at;
    }

    /**
     * Antes de actualizar en la bd
     *
     * @ORM\PreUpdate()
     * @author ezekiel
     **/
    public function preUpdate()
    {
        $this->updated_at = new \DateTime('now');
    }
}
