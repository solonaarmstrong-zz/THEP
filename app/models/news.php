<?php
class News extends AppModel {

	var $name = 'News';
	var $actsAs = array(
		'UploadPack.Upload' => array(
			'photo' => array(
				'styles' => array(
					'default' => '400x400',
					'thumb'=> '124x137'
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