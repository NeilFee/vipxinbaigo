<?php
/**
 * Created by PhpStorm.
 * User: morris
 * Date: 14-9-15
 * Time: 下午8:09
 */

class LotteryApplicantModel extends RelationModel{

    protected $tableName = 'lottery_applicant';

    public $_link = array(
        'store_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'store',
            'foreign_key' => 'store_id',
            'mapping_fields'=> 'id, name',
        ),
        'lottery_id' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'lottery',
            'foreign_key' => 'lottery_id',
            'mapping_fields' => 'id, name',
        )
    );

} 