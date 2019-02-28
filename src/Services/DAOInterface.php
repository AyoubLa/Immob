<?php

interface DAOInterface {

    //Select
    public function findPropertyAll();
    public function findPropertyLatest();
    public function findPropertyByName($name);
    public function findPropertyByPriceRange($minPrice, $maxPrice);
    public function findPropertyByDescription($description);
    public function findPropertyById($id);
    public function findPropertyByArea($area);
    public function findPropertyByFloor($floor);

    //Add
    public function addProperty($property);

    //Update
    public function updateProperty($property);

    //Delete
    public function deleteProperty($property);

}