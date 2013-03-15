<?php

namespace Illarra\BlogBundle\Traits\Entity;

trait Post
{
    use \Illarra\CoreBundle\Traits\Entity\Featured,
        \Illarra\CoreBundle\Traits\Entity\Visible;
    
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=128)
     */
    protected $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="Label", inversedBy="posts")
     * @ORM\JoinTable(name="post_label_rel")
     */
    protected $labels;
    
    public function __construct()
    {
        $this->isFeatured = false;
        $this->isVisible = true;
        $this->labels = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $name
     * @return Post
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param Label $label
     * @return Post
     */
    public function addLabel(\Illarra\BlogBundle\Interfaces\LabelInterface $label)
    {
        $this->labels[] = $label;
        
        return $this;
    }
    
    /**
     * @param Label $label
     */
    public function removeLabel(\Illarra\BlogBundle\Interfaces\LabelInterface $label)
    {
        $this->labels->removeElement($label);
    }
    
    /**
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLabels()
    {
        return $this->labels;
    }
}
