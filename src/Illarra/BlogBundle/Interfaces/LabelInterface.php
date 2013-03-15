<?php

namespace Illarra\BlogBundle\Interfaces;

interface LabelInterface
{
    public function addPost(PostInterface $post);
    public function removePost(PostInterface $post);
    public function getPosts();
}