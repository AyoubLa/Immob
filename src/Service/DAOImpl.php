<?php
use App\Repository\PropertyRepository;
use App\Entity\Property;
class DAO implements DAOInterface{
    private $propertyRepository;
    public function __construct(PropertyRepository $propertyRepository){
        $this->propertyRepository = $propertyRepository;
    }
    //Select
    public function findPropertyAll(): Collection{
        return $this->propertyRepository->findAll();
    }
    public function findPropertyLatest(): Property{
        return $this->propertyRepository->findLatest();
    }
    public function findPropertyByTitle($title): Property{
        return $this->propertyRepository->findBy(['title' => $title]);
    }
    public function findPropertyByPriceRange($minPrice, $maxPrice){
        return $this->propertyRepository->findBetween($min, $max);
    }
    public function findPropertyByDescription($description){
        return $this->propertyRepository->findBy(['description' => "%".$description."%"]);
    }
    public function findPropertyById($id){
        return $this->propertyRepository->findBy(['id' => $id]);
    }
    public function findPropertyByArea($area){
        return $this->propertyRepository->findBy(['area' => $area]);
    }
    public function findPropertyByFloor($floor){
        return $this->propertyRepository->findBy(['floor' => $floor]);
    }
    //Add
    public function addProperty($property){
        return $this->propertyRepository->save($property);
    }
    //Update
    public function updateProperty($property){
        return $this->propertyRepository->save($property);
    }
    //Delete
    public function deleteProperty($property){
        return $this->propertyRepository->delete($property);
    }
}