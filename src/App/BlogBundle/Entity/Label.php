<?php

namespace App\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\BlogBundle\Entity\LabelRepository")
 * @ORM\Table(name="post_label")
 */
class Label implements \Illarra\BlogBundle\Interfaces\LabelInterface
{
    use \Illarra\BlogBundle\Traits\Entity\Label;
}
