<?php

namespace App\Controller\Front;

use App\Services\DAOInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;

class GaleryController extends AbstractController
{
    /**
     * @Route("/galery", name="galery.index")
     * @param DAOInterface $repository
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(DAOInterface $repository, Request $request)
    {
        $search = new PropertySearch();

        $form = $this->createForm(PropertySearchType::class, $search);

        $form->handleRequest($request);

        //var_dump($search->getMinArea());
        if ($form->isSubmitted() AND $form->isValid()) {

            $properties = $repository->findByMinArea($search->getMinArea());

        }else{

            $properties = $repository->findPropertyAll();
        }

        return $this->render('front/index.html.twig', [
            'current_page' => 'galery',
            'form' => $form->createView(),
            'properties' => $properties
        ]);
    }

}