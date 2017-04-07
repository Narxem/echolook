<?php

namespace AppBundle\RandomLook;

use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\ClientBuilder;
use function Sodium\add;

class ClothesFilterCreator
{
    protected $_client;
    protected $lookCoordinator;

    public function __construct() {
        $this->_client = ClientBuilder::create()
            ->addConnection('default', "http://neo4j:pictime@localhost:7474")
            ->build();
        $this->lookCoordinator = new LookCoordinator();
    }

    function allClothesCorrespondingToCriteria($event, $style, $season){
        $string = $event.$style.$season;
        $query = 'MATCH (n:Association {label:"'. $string.' "}) RETURN n';
        $clothes = [];
        $result = $this->_client->run($query);
        foreach ($result->records() as $record){
            array_push($clothes, $record->get('n')->values());
        }
        $this->lookCoordinator.coordinateLook($clothes);
    }
}