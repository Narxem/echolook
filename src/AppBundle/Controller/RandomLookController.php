<?php

namespace AppBundle\Controller;

use AppBundle\RandomLook\RandomLookCreator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GraphAware\Neo4j\Client\Client;

class RandomLookController extends Controller
{
    protected $_randomLookCreator;

    public function __construct() {
        $this->_randomLookCreator = new RandomLookCreator();

    }


    public function indexAction()
    {
        return $this->render(
            'default/index.html.twig',
            $this->_randomLookCreator->findRandomClothes());

    }
}
