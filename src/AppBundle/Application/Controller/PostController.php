<?php

namespace AppBundle\Application\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Domain\Command\AddPostCommand;

class PostController extends Controller
{
    /**
     * @Route("/post/add", name="add_post")
     */
    public function addAction(Request $request)
    {
        $command = new AddPostCommand($request->get('title'), $request->get('content'));
        $result = $this->get('simple_command_bus')->execute($command);

        return $this->render('add.html.twig', [
            'result' => $result,
        ]);
    }
}
