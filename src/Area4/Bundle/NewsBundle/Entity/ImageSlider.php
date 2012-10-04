<?php
namespace Area4\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ ORM\Entity(repositoryClass="Area4\Bundle\NewsBundle\Repository\ImageSliderRepository")
* @ORM\Table(name="news_image_slider")
* @ORM\HasLifecycleCallbacks
*/
class ImageSlider
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
     * Imagen Slider
     *
     * @var $image string
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\File(maxSize="1M")
     **/
	private $image;

    /**
     * @ORM\Column(name="url", type="string",length=255, nullable=true)
     */
    private $url;

	/**
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
	private $path;

	/**
     * @ORM\Column(name="visible", type="boolean")
     */
	private $visible;

    /**
     * Constructor
     *
     * @author ezekiel
     **/
    public function __construct()
    {
        $this->visible = true;
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
     * Set image
     *
     * @param string $image
     * @return ImageSlider
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return ImageSlider
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return ImageSlider
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
        Manejo de la imagen
    */
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
        return 'img/slider';
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
     * Set url
     *
     * @param string $url
     * @return ImageSlider
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }
}