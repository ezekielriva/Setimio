<?php

namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Area4\Bundle\NewsBundle\Entity\News
 *
 * @ORM\Table(name="news_News")
 * @ORM\Entity(repositoryClass="Area4\Bundle\NewsBundle\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks
 */
class News
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
     * esta publicado
     *
     * @var boolean
     * @ORM\Column(name="published", type="boolean")
     **/
    private $published;

    /**
     * Publicado por
     *
     * @var Usuario
     * @ORM\ManyToOne(targetEntity="Area4\Bundle\UserBundle\Entity\User")
     **/
    private $published_by;

    /**
     * Imagen principal
     *
     * @var $image string
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\File(maxSize="6000000")
     **/
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    // a property used temporarily while deleting
    private $imagenameForRemove;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/news';
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->image) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->image->move($this->getUploadRootDir(), $this->path);

        unset($this->image);
    }

    /**
     * Constructor
     *
     * @author ezekiel
     **/
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->published = true;
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
        return $this->published;
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

    /**
     * Set image
     *
     **/
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     **/
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     **/
    public function setPublishedBy($user)
    {
        $this->published_by = $user;
    }

    /**
     * Get image
     *
     **/
    public function getPublishedBy()
    {
        return $this->published_by;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->image) {
            // do whatever you want to generate a unique name
            $this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->image->guessExtension();
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->imagenameForRemove = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->imagenameForRemove) {
            unlink($this->imagenameForRemove);
        }
    }

    /**
     * Get - Resumen del Contenido
     *
     * @return string
     * @author ezekiel
     **/
    public function getContentSummary()
    {
        $summary = explode(' ', $this->content);
        $summary = array_slice($summary, 0, 40); //40 palabras
        $summary = implode(' ', $summary);
        return $summary;
    }
}
