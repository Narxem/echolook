<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 07/04/17
 * Time: 14:36
 */

namespace Tests;

use LookCoordinator;

class LookCoordinatorShould extends \PHPUnit_Framework_TestCase
{

    protected $_lookCoordinator;

    /**
     * @before
     */
    public function before() {
        $_lookCoordinator = new lookCoordinator();
    }

    /**
     * @test
     */
    public function returnAGoodLookWithAtLeast3ClothesOfDifferentTypes(){

        assert($this->_lookCoordinator->coordinateLook();
    }
}
