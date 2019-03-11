<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use App\Services\DAOInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Property;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    private $em;

    public function __construct(DAOInterface $repository, ObjectManager $em)
    {
        $this->repository = $repository;

        $this->em = $em;
    }

    /**
     * @Route("/", name="property.index")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();

        return $this->render('index.html.twig', [
            "properties" => $properties]);
    }

    /**
     * @Route ("/property/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Property $property
     * @param String $slug
     * @return Response
     */
    public function show(Property $property, String $slug)
    {
        $_slug = $property->getSlug();

        if($_slug !== $slug) {

            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $_slug
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'current_page' => 'property',
            'slug' => $slug,
            'property' => $property
        ]);
    }
}