<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 07/04/17
 * Time: 16:13
 */

namespace AppBundle\LookCoordinator;


class LookCoordinator
{

    /**
     * @param $clothes a list of clothes corresponding to criteria
     * @return a coherent look
     */
    public function coordinateLook($clothes) {
        shuffle($clothes);
        $look = [
            "ACCESSOIRES" => '',
            "BAS" => '',
            "HAUTS" => '',
            "CHAUSSURES" => '',
            "MANTEAUX" => ''
        ];

        foreach ($clothes as $cloth ) {
            if ($look[$cloth['type']] == "") {
                $look[$cloth['type']] = $cloth['path'];
            }
        }
        return $look;
    }

}