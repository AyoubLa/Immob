<?php
namespace App\Services;

interface DAOInterface {

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @return mixed
     */
    public function findLatest();

    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title);

    /**
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
     */
    public function findByPriceRange($minPrice, $maxPrice);

    /**
     * @param $description
     * @return mixed
     */
    public function findByDescription($description);

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $area
     * @return mixed
     */
    public function findByArea($area);

    /**
     * @param $floor
     * @return mixed
     */
    public function findByFloor($floor);

    /**
     * @param $property
     * @return mixed
     */
    public function add($property);

    /**
     * @param $property
     * @return mixed
     */
    public function update($property);

    /**
     * @param $property
     * @return mixed
     */
    public function delete($property);

    /**
     * @param $areaMin
     * @return mixed
     */
    public function findByMinArea($areaMin);

}