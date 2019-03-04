<?php

namespace App\Controller\Front;

use App\Services\DAOImpl;
use App\Services\DAOInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GaleryController extends AbstractController
{
    /**
     * @Route("/", name="galery.index")
     */
    public function index(DAOInterface $repository)
    {
        $properties = $repository->findPropertyAll();

        return $this->render('front/index.html.twig', [
            "properties" => $properties
        ]);
    }

}