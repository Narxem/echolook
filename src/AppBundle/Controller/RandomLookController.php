<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomLookController extends Controller
{


    public function indexAction()
    {
        return $this->render('look/randomLook.html.twig');

    }
}
