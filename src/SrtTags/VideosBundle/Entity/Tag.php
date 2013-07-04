<?php

namespace SrtTags\VideosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="SrtTags\VideosBundle\Entity\TagRepository")
 */
class Tag
{
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
     * @ORM\Column(name="tag", type="string", length=50)
     */
    private $tag;


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
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
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
     * @return Tag
     */
    public function addSequence(\SrtTags\VideosBundle\Entity\Sequence $sequences)
    {
        $this->sequences[] = $sequences;
    
        return $this;
    }

    /**
     * Remove sequences
     *
     * @param \SrtTags\VideosBundle\Entity\Sequence $sequences
     */
    public function removeSequence(\SrtTags\VideosBundle\Entity\Sequence $sequences)
    {
        $this->sequences->removeElement($sequences);
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
