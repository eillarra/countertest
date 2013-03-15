<?php

namespace App\BlogBundle\Form;

use Illarra\BlogBundle\Form\PostType as BasePostType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends BasePostType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }
}