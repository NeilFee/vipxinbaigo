<?php

/**
 * User: duan.juding
 * Date: 9/14/14
 * Time: 2:07 PM
 */
class LotteryRuleModel extends RelationModel {

    protected $tableName = 'lottery_rule';

    public $_link = array(
            'lottery_id'=> array(
            'mapping_type' =>BELONGS_TO,
            'class_name'=>'lottery',
            'foreign_key'=>'lottery_id', //对应的外键ID
            'mapping_fields'=> 'id,name',
             ) ,

        'store_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'store',
            'foreign_key' => 'store_id', //对应的外键ID
            'mapping_fields'=> 'id,name',
        ),

        'city_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'city',
            'foreign_key' => 'city_id', //对应的外键ID
            'mapping_fields'=> 'id,name',
        ),

        'region_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'region',
            'foreign_key' => 'region_id', //对应的外键ID
           'mapping_fields'=> 'id,name',
        )



    );
   
}