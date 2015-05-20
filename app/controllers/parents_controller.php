<?php
class ParentsController extends AppController {
        var $name = 'Parents';
	var $uses = array('Parents','Testimonials','Resources');
	var $helpers = array('UploadPack.Upload');
	
	function beforeFilter() {
	    parent::beforeFilter();
		$this->layout = 'stepdown';	
		$this->set("facts",$this->getFacts());
                $this->set("widget_news",$this->getNews());
                $this->set("widget_testimonials",$this->getTestimonials());
		//$this->set("featured_image",$this->getFeaturedImage());
	} 
		
	function index(){
		//$homepage = $this->Homepage->find('all', array('conditions' => array('Homepage.active'=> 1)));
		//$this->set('rows', $homepage);
	}
        
        function quickTipsAndFacts(){}
        
        function factSheets(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Fact Sheet','Resources.parents'=>'Yes'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function otherResources(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type !='=>'Fact Sheet','Resources.parents'=>'Yes'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function testimonials(){
            $testimonials = $this->Testimonials->find('all', array('conditions'=>array('Testimonials.parents'=>'Yes'), 'order' => array('Testimonials.date desc')));
            $this->set('testimonials', $testimonials);
        }
}
?>