<?php

namespace App\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    use \Illarra\CoreBundle\Traits\Repository\Paginator;
    
    public function getOrderFields()
    {
        return ['name'];
    }
}
