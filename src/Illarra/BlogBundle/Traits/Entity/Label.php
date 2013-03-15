<?php

namespace Illarra\BlogBundle\Traits\Entity;

trait Label
{
    use \Illarra\CoreBundle\Traits\Entity\Counter;
    
    public function __toString()
    {
        return $this->getName();
    }
    
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
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="labels")
     */
    protected $posts;
    
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Label
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
     * @param Post $post
     * @return Label
     */
    public function addPost(\Illarra\BlogBundle\Interfaces\PostInterface $post)
    {
        $this->posts[] = $post;
        
        return $this;
    }
    
    /**
     * @param Post $post
     */
    public function removePost(\Illarra\BlogBundle\Interfaces\PostInterface $post)
    {
        $this->posts->removeElement($post);
    }
    
    /**
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
    
    /**
     * @return array
     */
    public function getCounterFields()
    {
        return ['posts'];
    }
}