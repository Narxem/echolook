<?php

namespace AppBundle\Controller;

use AppBundle\ClothesFilter\ClothesFilterCreator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class LookController
 * @package AppBundle\Controller
 */
class LookController extends Controller
{
    /**
     * @var ClothesFilterCreator
     */
    protected $_clothesFilter;

    /**
     * LookController constructor.
     */
    public function __construct() {
        $this->_clothesFilter = new ClothesFilterCreator();

    }

    /**
     * Envoie les critères au ClothesFilter
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction() {
        return $this->render(
            'default/index.html.twig',
            $this->_clothesFilter->allClothesCorrespondingToCriteria($_POST['event'], $_POST['style'], $_POST['season']));
    }
}
