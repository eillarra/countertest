<?php

namespace App\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\BlogBundle\Entity\PostRepository")
 * @ORM\Table(name="post")
 */
class Post implements \Illarra\BlogBundle\Interfaces\PostInterface
{
    use \Illarra\BlogBundle\Traits\Entity\Post;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\BlogBundle\Entity\Category", inversedBy="posts")
     */
    private $category;
    
    /**
     * @param \App\BlogBundle\Entity\Category $category
     * @return Post
     */
    public function setCategory(\App\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        
        return $this;
    }
    
    /**
     * @return \App\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
