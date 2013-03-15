<?php

namespace App\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\BlogBundle\Entity\CategoryRepository")
 * @ORM\Table(name="post_category")
 */
class Category
{
    use \Illarra\CoreBundle\Traits\Entity\Counter;
    
    public function __toString()
    {
        return $this->getName();
    }
    
    /**
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
     * @ORM\OneToMany(targetEntity="App\BlogBundle\Entity\Post", mappedBy="category")
     */
    private $posts;
    
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * @return Category
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
     * @param \App\BlogBundle\Entity\Post $post
     * @return Category
     */
    public function addPost(\App\BlogBundle\Entity\Post $post)
    {
        $this->posts[] = $post;
    
        return $this;
    }
    
    /**
     * @param \App\BlogBundle\Entity\Post $post
     */
    public function removePost(\App\BlogBundle\Entity\Post $post)
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
