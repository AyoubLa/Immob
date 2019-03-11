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
    public function findAll(): array
    {

        return $this->propertyRepository->findAll();
    }

    /**
     * @return Property
     */
    public function findLatest(): Property{

        return $this->propertyRepository->findLatest();
    }

    /**
     * @param $title
     * @return array
     */
    public function findByTitle($title): array
    {

        return $this->propertyRepository->findBy(['title' => $title]);
    }

    /**
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
     */
    public function findByPriceRange($minPrice, $maxPrice)
    {

        return $this->propertyRepository->findBetween($minPrice, $maxPrice);
    }

    /**
     * @param $description
     * @return Property[]
     */
    public function findByDescription($description)
    {

        return $this->propertyRepository->findBy(['description' => "%".$description."%"]);
    }

    /**
     * @param $id
     * @return Property[]
     */
    public function findById($id)
    {

        return $this->propertyRepository->findBy(['id' => $id]);
    }

    /**
     * @param $area
     * @return Property[]
     */
    public function findByArea($area)
    {

        return $this->propertyRepository->findBy(['area' => $area]);
    }

    /**
     * @param $floor
     * @return Property[]
     */
    public function findByFloor($floor)
    {

        return $this->propertyRepository->findBy(['floor' => $floor]);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function add($property)
    {

        return $this->propertyRepository->save($property);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function update($property)
    {

        return $this->propertyRepository->save($property);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function delete($property){

        return $this->propertyRepository->delete($property);
    }

    /**
     * @param $areaMin
     * @return array
     */
    public function findByMinArea($areaMin): array
    {
        return $this->propertyRepository->findByMinArea($areaMin);
    }
}