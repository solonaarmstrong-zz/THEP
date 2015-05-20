<?php
class Testimonials extends AppModel {

	var $name = 'Testimonials';
	var $actsAs = array(
		'UploadPack.Upload' => array(
			'photo' => array(
				'styles' => array(
					'default' => '400x400',
					'thumb'=> '106x150'
				)
			)
		)
	);
        
        var $validate = array(   
        'title'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter Title.'
				)
		)
	);

}


?>