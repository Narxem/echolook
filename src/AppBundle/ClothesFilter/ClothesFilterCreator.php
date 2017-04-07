<?php

namespace AppBundle\ClothesFilter;

use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\ClientBuilder;
use AppBundle\LookCoordinator\LookCoordinator;

/**
 * Class ClothesFilterCreator
 * Récupère les critères et recherche tout les vêtements correspondant aux critères afin de les passer au LookCoordinator.
 * @package AppBundle\RandomLook
 */
class ClothesFilterCreator
{
    /** @var \GraphAware\Neo4j\Client\ClientInterface  */
    protected $_client;

    /** @var LookCoordinator  */
    protected $lookCoordinator;

    /**
     * ClothesFilterCreator constructor.
     */
    public function __construct() {
        $this->_client = ClientBuilder::create()
            ->addConnection('default', "http://neo4j:pictime@localhost:7474")
            ->build();
        $this->lookCoordinator = new LookCoordinator();
    }

    /**
     * Retourne les vêtements correspondant aux critères.
     * @param $event Critère evenement
     * @param $style Critère style
     * @param $season Critère saison
     */
    function allClothesCorrespondingToCriteria($event, $style, $season){
        $clothes = [];
        if($event && $style && $season)
        {
            $string = $event.$style;
            $string2 = $event.$season;
            $string3 = $season.$style;
            $query = 'MATCH (asso:Association {label:"'.$string.'"}), (asso)-[:Match]->(:Tag)-[:Have]->(n:Image) RETURN n';
            $query2 = 'MATCH (asso:Association {label:"'.$string2.'"}), (asso)-[:Match]->(:Tag)-[:Have]->(n:Image) RETURN n';
            $query3 = 'MATCH (asso:Association {label:"'.$string3.'"}), (asso)-[:Match]->(:Tag)-[:Have]->(n:Image) RETURN n';
            $result = $this->_client->run($query);
            foreach ($result->records() as $record){
                array_push($clothes, $record->get('n')->values());
            }
            $result2 = $this->_client->run($query2);
            foreach ($result2->records() as $record){
                array_push($clothes, $record->get('n')->values());
            }
            $result3 = $this->_client->run($query3);
            foreach ($result3->records() as $record){
                array_push($clothes, $record->get('n')->values());
            }
        } else {
            $string = $event.$style.$season;
            var_dump($string);
            $query = 'MATCH (asso:Association {label:"'.$string.'"}), (asso)-[:Match]->(:Tag)-[:Have]->(n:Image) RETURN n';
            $result = $this->_client->run($query);
            foreach ($result->records() as $record){
                array_push($clothes, $record->get('n')->values());
            }
        }

        return $this->lookCoordinator->coordinateLook($clothes);
    }
}