<?php

namespace Illarra\BlogBundle\Interfaces;

interface PostInterface
{
    public function getId();
    public function addLabel(LabelInterface $label);
    public function removeLabel(LabelInterface $label);
    public function getLabels();
}