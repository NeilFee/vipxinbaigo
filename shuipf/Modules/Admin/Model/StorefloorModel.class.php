<?php

/**
 * 后台管理store零售网络模型
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class StorefloorModel extends RelationModel {

	
	  public $_link = array(
            'Storebrand'=> array(
            'mapping_type' =>HAS_MANY,
            'class_name'=>'storebrand',
            'foreign_key'=>'nide_id', //对应的外键ID
             ) ,
    );
   
}