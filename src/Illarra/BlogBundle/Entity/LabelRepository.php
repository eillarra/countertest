<?php

namespace Illarra\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class LabelRepository extends EntityRepository
{
    use \Illarra\CoreBundle\Traits\Repository\Paginator;
    
    public function getOrderFields()
    {
        return ['slug'];
    }
}
