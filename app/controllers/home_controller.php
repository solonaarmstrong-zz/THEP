<?php
class HomeController extends AppController {
        var $name = 'Home';
	//var $uses = array('Homepage');
	var $helpers = array('UploadPack.Upload');
	
	function beforeFilter() {
	    parent::beforeFilter();
		$this->layout = false;		
		$this->set("facts",$this->getFacts());
                
                $this->set("widget_news",$this->getHomeNews());
                $this->set("widget_testimonials",$this->getTestimonials());
		//$this->set("featured_image",$this->getFeaturedImage());
	} 
		
	function home(){
		//$homepage = $this->Homepage->find('all', array('conditions' => array('Homepage.active'=> 1)));
		//$this->set('rows', $homepage);
	}
}
?>