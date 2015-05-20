<?php
class Events extends AppModel {

	var $name = 'Events';
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
	

}


?>