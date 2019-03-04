<?php

namespace App\Services;

use App\Entity\Property;
use App\Repository\PropertyRepository;

class DAOImpl implements DAOInterface
{

    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository){

        $this->propertyRepository = $propertyRepository;
    }

    /**
     * @return array
     */
    public function findPropertyAll(): array
    {

        return $this->propertyRepository->findAll();
    }

    /**
     * @return Property
     */
    public function findPropertyLatest(): Property{

        return $this->propertyRepository->findLatest();
    }

    /**
     * @param $title
     * @return array
     */
    public function findPropertyByTitle($title): array
    {

        return $this->propertyRepository->findBy(['title' => $title]);
    }

    /**
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
     */
    public function findPropertyByPriceRange($minPrice, $maxPrice)
    {

        return $this->propertyRepository->findBetween($minPrice, $maxPrice);
    }

    /**
     * @param $description
     * @return Property[]
     */
    public function findPropertyByDescription($description)
    {

        return $this->propertyRepository->findBy(['description' => "%".$description."%"]);
    }

    /**
     * @param $id
     * @return Property[]
     */
    public function findPropertyById($id)
    {

        return $this->propertyRepository->findBy(['id' => $id]);
    }

    /**
     * @param $area
     * @return Property[]
     */
    public function findPropertyByArea($area)
    {

        return $this->propertyRepository->findBy(['area' => $area]);
    }

    /**
     * @param $floor
     * @return Property[]
     */
    public function findPropertyByFloor($floor)
    {

        return $this->propertyRepository->findBy(['floor' => $floor]);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function addProperty($property)
    {

        return $this->propertyRepository->save($property);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function updateProperty($property)
    {

        return $this->propertyRepository->save($property);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function deleteProperty($property){

        return $this->propertyRepository->delete($property);
    }
}