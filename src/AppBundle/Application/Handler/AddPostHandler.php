<?php

namespace AppBundle\Application\Handler;

use AppBundle\Domain\Command\AddPostCommand;
use AppBundle\Domain\Handler;
use AppBundle\Domain\Entity\Post;
use AppBundle\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class AddPostHandler implements Handler
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function handle($command)
    {
        $post = new Post;
        $post->title = $command->getTitle();
        $post->content = $command->getContent();

        $this->em->persist($post);
        $this->em->flush();

        return new Response('Saved post #'.$post->id);
    }
}
