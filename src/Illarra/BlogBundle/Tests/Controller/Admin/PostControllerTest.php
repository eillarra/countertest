<?php

namespace Illarra\BlogBundle\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    use \Illarra\CoreBundle\Traits\Tests\AdminControllerTest;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this
            ->setRoutePrefix('/admin/blog/post')
            ->setFormData(array(
                'illarra_blogbundle_posttype[translations][es][locale]'  => 'es',
                'illarra_blogbundle_posttype[translations][es][title]'   => 'posttype_es_title',
                'illarra_blogbundle_posttype[translations][es][excerpt]' => 'posttype_es_excerpt',
                'illarra_blogbundle_posttype[translations][es][text]'    => 'posttype_es_text',
                'illarra_blogbundle_posttype[translations][it][locale]'  => 'it',
                'illarra_blogbundle_posttype[translations][it][title]'   => 'posttype_it_title',
                'illarra_blogbundle_posttype[translations][it][excerpt]' => 'posttype_it_excerpt',
                'illarra_blogbundle_posttype[translations][it][text]'    => 'posttype_it_text',
            ))
        ;
    }
}
