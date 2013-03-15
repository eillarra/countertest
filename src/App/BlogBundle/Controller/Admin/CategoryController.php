<?php

namespace App\BlogBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\BlogBundle\Entity\Category;
use App\BlogBundle\Form\CategoryType;

/**
 * @Route("/category")
 */
class CategoryController extends Controller
{
    use \Illarra\CoreBundle\Traits\Controller\CoreConfiguration;
    
    /**
     * @Route("/{page}", name="admin_app_blog_category_index", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page)
    {
        if ($page < 1) {
            return $this->redirect($this->generateUrl('admin_app_blog_category_index'));
        }
        
        $repository = $this->getDoctrine()->getRepository('AppBlogBundle:Category');
        $repository->setEntitiesPerPage($this->getEntitiesPerPageInAdmin());
        
        if ($page > $repository->getPages()) {
            return $this->redirect($this->generateUrl('admin_app_blog_category_index',
                array('page' => $repository->getPages()))
            );
        }
        
        return array(
            'page'              => $page,
            'pages'             => $repository->getPages(),
            'entities'          => $repository->findAllOrdered($page),
            'entities_per_page' => $repository->getEntitiesPerPage(),
            'entities_count'    => $repository->getEntitiesCount(),
        );
    }
    
    /**
     * @Route("/create", name="admin_app_blog_category_create")
     * @Method("POST")
     * @Template("AppBlogBundle:Admin/Category:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Category();
        
        $form = $this->createForm(new CategoryType(), $entity);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('admin_app_blog_category_index'));
        }
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * @Route("/new", name="admin_app_blog_category_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Category();
        
        $form = $this->createForm(new CategoryType(), $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}/edit", name="admin_app_blog_category_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBlogBundle:Category')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }
        
        $editForm = $this->createForm(new CategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * @Route("/{id}/update", name="admin_app_blog_category_update")
     * @Method("PUT")
     * @Template("AppBlogBundle:Admin/Category:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBlogBundle:Category')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategoryType(), $entity);
        $editForm->bind($request);
        
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('admin_app_blog_category_edit', array('id' => $id)));
        }
        
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * @Route("/{id}/delete", name="admin_app_blog_category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBlogBundle:Category')->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }
            
            $em->remove($entity);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('admin_app_blog_category_index'));
    }
    
    /**
     * @param  mixed $id
     * @return Symfony\Component\Form\Form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
