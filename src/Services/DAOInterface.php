<?php
namespace App\Services;

interface DAOInterface {

    /**
     * @return mixed
     */
    public function findPropertyAll();

    /**
     * @return mixed
     */
    public function findPropertyLatest();

    /**
     * @param $title
     * @return mixed
     */
    public function findPropertyByTitle($title);

    /**
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
     */
    public function findPropertyByPriceRange($minPrice, $maxPrice);

    /**
     * @param $description
     * @return mixed
     */
    public function findPropertyByDescription($description);

    /**
     * @param $id
     * @return mixed
     */
    public function findPropertyById($id);

    /**
     * @param $area
     * @return mixed
     */
    public function findPropertyByArea($area);

    /**
     * @param $floor
     * @return mixed
     */
    public function findPropertyByFloor($floor);

    /**
     * @param $property
     * @return mixed
     */
    public function addProperty($property);

    /**
     * @param $property
     * @return mixed
     */
    public function updateProperty($property);

    /**
     * @param $property
     * @return mixed
     */
    public function deleteProperty($property);

}