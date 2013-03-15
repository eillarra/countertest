<?php

namespace Illarra\CoreBundle\Helper\Sitemap;

class Url
{
    protected $loc;
    protected $priority = 0.5;
    
    public function __construct($url)
    {
        $this->loc = $url;
    }
    
    public function setLoc(string $loc)
    {
        $this->loc = $loc;
        
        return $this;
    }
    
    public function getLoc()
    {
        return $this->loc;
    }
    
    public function setPriority(string $priority)
    {
        $this->priority = $priority;
        
        return $this;
    }
    
    public function getPriority()
    {
        return $this->priority;
    }
}
