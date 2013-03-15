<?php

namespace App\BlogBundle\EventListener;

class OnFlushPostCounterListener
{
    use \Illarra\CoreBundle\Traits\EventListener\Doctrine\OnFlushCounterListener;
    
    public function getOwnerEntityClass()
    {
        return 'Post';
    }
    
    public function getManyToOneTargetEntitiesClassAndField()
    {
        return [
            'Category' => 'category'
        ];
    }
    
    public function getManyToManyTargetEntitiesClassAndField()
    {
        return [];
    }
    
    public function getCounterFieldInTargetEntities()
    {
        return 'posts';
    }
}
