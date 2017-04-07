<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 07/04/17
 * Time: 11:22
 */

namespace AppBundle\RandomLook;

use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\ClientBuilder;

class RandomLookCreator
{

    protected $_client;

    public function __construct() {
        $this->_client = ClientBuilder::create()
            ->addConnection('default', "http://neo4j:pictime@localhost:7474")
            ->build();
    }

    function findRandomClothes() {
        $query = 'MATCH (n:Image {type:"ACCESSOIRES"}) RETURN n ORDER BY rand() LIMIT 1';
        $clothes = [];
        $result = $this->_client->run('MATCH (n:Image {type:"ACCESSOIRES"}) RETURN n ORDER BY rand() LIMIT 1');
        $clothes["ACCESSOIRES"] = $result->firstRecord()->get('n')->values()['path'];
        $result = $this->_client->run('MATCH (n:Image {type:"HAUTS"}) RETURN n ORDER BY rand() LIMIT 1');
        $clothes["HAUTS"] = $result->firstRecord()->get('n')->values()['path'];
        $result = $this->_client->run('MATCH (n:Image {type:"BAS"}) RETURN n ORDER BY rand() LIMIT 1');
        $clothes["BAS"] = $result->firstRecord()->get('n')->values()['path'];
        $result = $this->_client->run('MATCH (n:Image {type:"CHAUSSURES"}) RETURN n ORDER BY rand() LIMIT 1');
        $clothes["CHAUSSURES"] = $result->firstRecord()->get('n')->values()['path'];
        $result = $this->_client->run('MATCH (n:Image {type:"MANTEAUX"}) RETURN n ORDER BY rand() LIMIT 1');
        $clothes["MANTEAUX"] = $result->firstRecord()->get('n')->values()['path'];


        return $clothes;
    }

}