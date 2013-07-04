<?php

namespace SrtTags\VideosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sequence
 *
 * @ORM\Table(name="sequences")
 * @ORM\Entity(repositoryClass="SrtTags\VideosBundle\Entity\SequenceRepository")
 */
class Sequence
{
	/**
	 * @ORM\ManyToOne(targetEntity="SrtTags\VideosBundle\Entity\Video", inversedBy="sequences")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $video;
	
	/**
	 * @ORM\ManyToOne(targetEntity="SrtTags\VideosBundle\Entity\SrtFile", inversedBy="sequences", cascade={"remove"})
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $srtFile;
	
	/**
	 * @ORM\ManyToMany(targetEntity="SrtTags\VideosBundle\Entity\Tag")
	 */
	private $tags; 
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="start", type="float")
     */
    private $start;

    /**
     * @var float
     *
     * @ORM\Column(name="stop", type="float")
     */
    private $stop;


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
     * Set start
     *
     * @param float $start
     * @return Sequence
     */
    public function setStart($start)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return float 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set stop
     *
     * @param float $stop
     * @return Sequence
     */
    public function setStop($stop)
    {
        $this->stop = $stop;
    
        return $this;
    }

    /**
     * Get stop
     *
     * @return float 
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Set video
     *
     * @param \SrtTags\VideosBundle\Entity\Video $video
     * @return Sequence
     */
    public function setVideo(\SrtTags\VideosBundle\Entity\Video $video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return \SrtTags\VideosBundle\Entity\Video 
     */
    public function getVideo()
    {
        return $this->video;
    }
    
    /**
     * Set srtFile
     *
     * @param \SrtTags\VideosBundle\Entity\SrtFile $srtFile
     * @return Sequence
     */
    public function setSrtFile(\SrtTags\VideosBundle\Entity\SrtFile $srtFile)
    {
        $this->srtFile = $srtFile;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return \SrtTags\VideosBundle\Entity\SrtFile 
     */
    public function getSrtFile()
    {
        return $this->srtFile;
    }    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add tags
     *
     * @param \SrtTags\VideosBundle\Entity\Tag $tags
     * @return Sequence
     */
    public function addTag(\SrtTags\VideosBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param \SrtTags\VideosBundle\Entity\Tag $tags
     */
    public function removeTag(\SrtTags\VideosBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
