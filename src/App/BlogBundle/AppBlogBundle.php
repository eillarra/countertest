<?php

namespace App\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBlogBundle extends Bundle
{
    public function getParent()
    {
        return 'IllarraBlogBundle';
    }
}
