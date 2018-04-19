<?php

class building // kda malo4 lazma l8ayt now
{
    public $building_num;
    public $building_capacity;
    public $supervisor_name;
    
    
    function getSupervisor_name() {
        return $this->supervisor_name;
    }

    function setSupervisor_name($supervisor_name) {
        $this->supervisor_name = $supervisor_name;
    }

        function getBuilding_num() {
        return $this->building_num;
    }

    function getBuilding_capacity() {
        return $this->building_capacity;
    }

    function setBuilding_num($building_num) {
        $this->building_num = $building_num;
    }

    function setBuilding_capacity($building_capacity) {
        $this->building_capacity = $building_capacity;
    }

    public function __construct($buildingNum,$buildingCapacity) {
        $this->building_num=$buildingNum;
        $this->building_capacity = $buildingCapacity;
    }
    
    
    
}

