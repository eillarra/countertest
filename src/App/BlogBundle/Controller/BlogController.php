<?php

namespace App\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Illarra\BlogBundle\Controller\BlogController as BaseController;

class BlogController extends BaseController
{
    /**
     * @Route("", name="post_index")
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $response = parent::indexAction($page);

        $response['categories'] = $this->getDoctrine()->getRepository('AppBlogBundle:Category')->findAllOrdered();

        return $response;
    }
}