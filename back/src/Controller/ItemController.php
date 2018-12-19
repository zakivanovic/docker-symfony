<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\ArrayEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use App\Service\DataService;
use App\Entity\Annonce;
use App\Entity\Mandataire;

class ItemController extends Controller
{

	/**
	 * @Route("/api/annonces-with-mandataire", methods={"GET","HEAD"}, name="api_annonces_mandataire")
     */
    public function text(DataService $dataService)
    {
    	$encoders = array(new JsonEncoder());
		$normalizers = array(new ObjectNormalizer());
		$serializer = new Serializer($normalizers, $encoders);

    	
    	$annonces = $this->getDoctrine()
        ->getRepository(Annonce::class)
        ->findAll();

        $mandataires = $this->getDoctrine()
        ->getRepository(Mandataire::class)
        ->findAll();

        $results = $dataService->matchData($annonces,  $mandataires);

        $results = $serializer->serialize($results, 'json');
        return new Response($results);
    }
}