<?php

namespace App\BlogBundle\EventListener;

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
        
        $menu['illarra_blog']
            ->addChild('menu.blog.categories', array('route' => 'admin_app_blog_category_index'))
            ->moveToPosition(1)
        ;
    }
}
