<?php

/**
 * User: duan.juding
 * Date: 9/14/14
 * Time: 2:07 PM
 */
class CityRegionModel extends RelationModel {

    protected $tableName = 'city';

    public $_link = array(

        'region_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'region',
            'foreign_key' => 'region_id', //对应的外键ID
           'mapping_fields'=> 'id,name',
        )

    );
   
}