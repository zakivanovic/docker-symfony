<?php

namespace App\Service;

use GuzzleHttp\ClientInterface;


class DataService
{
	/** @var \GuzzleHttp\Client $apiClient */
	private $apiClient;

	private $results = [];

    public function __construct(ClientInterface $apiClient)
    {
    	/** @var \GuzzleHttp\Client $client */
		$this->apiClient = $apiClient;
    }


    /**
     * Makes matches between annonces and mandataires
     * @param $annonces
     * @param $mandataires
     * @return array $results
     */
	public function matchData($annonces, $mandataires)
	{
		$results = [];
		foreach ($annonces as $ann) {
        	$comm = $ann->getCommentaires();

        	preg_match('/administrateur (.* :)/', $comm, $matches, PREG_OFFSET_CAPTURE, 14);

            if(!count($matches)) continue;
        	$comm = $matches[1][0];
        	$this->matchMandataire($ann, $comm, $mandataires);
        }

        return $this->results;
	}

	/**
     * Makes matches between annonces and mandataires
     * @param $ann
     * @param $ann
     * @param $mandataires
     */
	public function matchMandataire($ann, $comm, $mandataires)
	{

    	foreach ($mandataires as $mand) {
    		$addr = $mand->getAdresse();

    		$score = similar_text($addr, $comm, $perc);

    		if($perc > 30) { // keep greater than 30% similiarity
    			$ann->setMandataire($addr);
    			$this->results[] = $ann;
    			return;
    		}
    	}
	}
	
}