<?php

namespace Illarra\BlogBundle\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LabelControllerTest extends WebTestCase
{
    use \Illarra\CoreBundle\Traits\Tests\AdminControllerTest;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this
            ->setRoutePrefix('/admin/blog/label')
            ->setFormData(array(
                'illarra_blogbundle_labeltype[translations][es][locale]'  => 'es',
                'illarra_blogbundle_labeltype[translations][es][title]'   => 'labeltype_es_title',
                'illarra_blogbundle_labeltype[translations][it][locale]'  => 'it',
                'illarra_blogbundle_labeltype[translations][it][title]'   => 'labeltype_it_title',
            ))
        ;
    }
}
