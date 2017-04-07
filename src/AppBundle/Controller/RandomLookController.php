<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomLookController extends Controller
{


    public function indexAction()
    {
        return $this->render('default/index.html.twig', array("haut" => "","bas" =>"", "manteau" =>"", "chaussures" => "", "accessoire" => ""));

    }
}
