<?php

namespace AppBundle\Controller;

use AppBundle\RandomLook\ClothesFilterCreator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LookController extends Controller
{
    protected $_clothesFilter;

    public function __construct() {
        $this->_clothesFilter = new ClothesFilterCreator();

    }

    public function searchAction() {
        return $this->render(
            'default/index.html.twig',
            $this->_clothesFilter->allClothesCorrespondingToCriteria($_POST['event-select'], $_POST['style-select'], $_POST['season-select']));
    }
}
