<?php

namespace App\Controller\Front;

use App\Services\DAOImpl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;

class GalleryController extends AbstractController
{
    /**
     * @var DAOImpl
     */
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/gallery", name="gallery.index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $search = new PropertySearch();

        $form = $this->createForm(PropertySearchType::class, $search);

        $form->handleRequest($request);

        //var_dump($search->getMinArea());
        if ($form->isSubmitted() AND $form->isValid()) {

            $properties = $this->repository->findByMinArea($search->getMinArea());

        }else{

            $properties = $this->repository->findAll();
        }

        return $this->render('front/index.html.twig', [
            'current_page' => 'gallery',
            'form' => $form->createView(),
            'properties' => $properties
        ]);
    }

}