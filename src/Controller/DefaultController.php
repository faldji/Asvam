<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     */
    public function indexAction(Request $request)
    {
        $ip = $request->getClientIp();
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController', 'ip' => $ip
        ]);
    }
}
