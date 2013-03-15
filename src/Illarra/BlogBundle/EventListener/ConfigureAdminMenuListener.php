<?php

namespace Illarra\BlogBundle\EventListener;

use Illarra\CoreBundle\Event\ConfigureAdminMenuEvent;

class ConfigureAdminMenuListener
{
    protected $security;

    public function __construct($security)
    {
        $this->security = $security;
    }

    /**
     * @param \Illarra\CoreBundle\Event\ConfigureAdminMenuEvent $event
     */
    public function onMenuConfigure(ConfigureAdminMenuEvent $event)
    {
        $menu = $event->getMenu();
        
        $menu->addChild('illarra_blog', array('label' => 'menu.blog.main'));
        $menu['illarra_blog']->addChild('menu.blog.posts',  array('route' => 'admin_illarra_blog_post_index'));
        $menu['illarra_blog']->addChild('menu.blog.labels', array('route' => 'admin_illarra_blog_label_index'));
    }
}
