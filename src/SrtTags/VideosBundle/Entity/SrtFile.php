<?php

namespace SrtTags\VideosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * SrtFile
 *
 * @ORM\Table(name="srtFiles")
 * @ORM\Entity(repositoryClass="SrtTags\VideosBundle\Entity\SrtFileRepository")
 * @ORM\HasLifecycleCallbacks
 */
class SrtFile
{
	private $temp;
	
	/**
	 * @Assert\File(maxSize="1M")
	 */
	private $file;
	
	/**
	 * @ORM\OneToMany(targetEntity="SrtTags\VideosBundle\Entity\Sequence", mappedBy="srtFile", cascade={"all"});
	 */
	private $sequences; 
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;


    /**
     * Set file
     * 
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
     {
		 $this->file = $file;
		 
		 if (isset($this->path)) {
			 $this->temp = $this->path;
			 $this->path = null;
		 } else {
			 $this->path = 'initial';
		 }
	 }
	 
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
			$filename = pathinfo($this->getFile()->getClientOriginalName(), PATHINFO_FILENAME);
			$extension = pathinfo($this->getFile()->getClientOriginalName(), PATHINFO_EXTENSION);
			
			$this->title = $filename;
			
			$validName = strtolower($filename);
			
			$accents = array('à','â','ä','á','ã','å','é','è','ê','ë','î','ï','ì','í','ô','ö','ò','ó','õ','ø','ù','û','ü','ú','ÿ','ý','ç','ñ');
			$validCharacters = array('a','a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y','c','n');
			$validName = str_replace($accents, $validCharacters, $validName);
			
			$validName = str_replace(' ', '_', $validName);
			$validName = preg_replace('/[\W]/', '', $validName);
			
            $this->path = $validName.'.'.$extension;
        }
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old file
        if (isset($this->temp)) {
            // delete the old file
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp file path
            $this->temp = null;
        }
        $this->file = null;
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
	 
	/**
	 * Get file.
	 * 
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
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
     * @return SrtFile
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
     * Get absolute path.
     */ 
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }
    
    /**
     * Get Web path.
     */
    public function getWebPath()
    {
		return null === $this->path
			? null
			: $this->getUploadDir().'/'.$this->path;
	}
	
	protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
	
	/**
	 * Get directory path where uploaded files should be saved.
	 */ 
	protected function getUploadDir()
    {
        return 'uploads/srtfiles';
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sequences = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sequences
     *
     * @param \SrtTags\VideosBundle\Entity\Sequence $sequences
     * @return SrtFile
     */
    public function addSequence(\SrtTags\VideosBundle\Entity\Sequence $sequence)
    {
        $this->sequences[] = $sequence;
        $sequences->setSrtFile($this);
    
        return $this;
    }

    /**
     * Remove sequences
     *
     * @param \SrtTags\VideosBundle\Entity\Sequence $sequences
     */
    public function removeSequence(\SrtTags\VideosBundle\Entity\Sequence $sequence)
    {
        $this->sequences->removeElement($sequence);
    }

    /**
     * Get sequences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSequences()
    {
        return $this->sequences;
    }
}
