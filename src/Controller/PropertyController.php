<?php
/**
 * Created by IntelliJ IDEA.
 * User: SQLI
 * Date: 27/02/2019
 * Time: 13:48
 */

namespace App\Controller;


use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\PropertyRepository;
use App\Services\DAOInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
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

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;

        $this->em = $em;
    }

    /**
     * @Route("/index", name="property.index")
     */
    public function index(DAOInterface $repository ,Request $request): Response
    {
        return $this->render('index.html.twig');
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