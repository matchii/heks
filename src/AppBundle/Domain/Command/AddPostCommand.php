<?php

namespace AppBundle\Domain\Command;

class AddPostCommand
{
    private $title;
    private $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getContent() : string
    {
        return $this->content;
    }
}
