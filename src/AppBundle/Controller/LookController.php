<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LookController extends Controller
{
    public function indexAction()
    {
        return $this->render('look/indexLook.html.twig');
    }

    public function searchAction() {
        return null;
    }
}
