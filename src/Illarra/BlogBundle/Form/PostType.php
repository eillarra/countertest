<?php

namespace Illarra\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    protected $container;
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('labels', null, ['required' => false, 'empty_value' => true])
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('illarra_blog.post_class')
        ));
    }
    
    public function getName()
    {
        return 'illarra_blogbundle_posttype';
    }
}
