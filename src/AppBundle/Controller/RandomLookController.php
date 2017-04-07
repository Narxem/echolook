<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomLookController extends Controller
{


    public function indexAction()
    {
        return $this->render('default/index.html.twig', array("hauts" => "","bas" =>"", "manteaux" =>"", "chaussures" => "", "accessoires" => ""));

    }
}
