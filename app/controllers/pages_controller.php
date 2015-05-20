<?php
class PagesController extends AppController {
        var $name = 'Pages';
	var $uses = array('Pages','Testimonials','News','Events','Resources','Faqs');
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
        
        function newsArticle($id = null){
            $this->set('news', $this->News->read(null, $id));
        }
        
        function aboutTheProgram(){}
        
        function theProgram101(){}
        
        function governance(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Minutes'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function testimonials(){
            $testimonials = $this->Testimonials->find('all', array('order' => array('Testimonials.date desc')));
            $this->set('testimonials', $testimonials);
        }
        
        function testimonial($id = null){
            $this->set('testimonial', $this->Testimonials->read(null, $id));
        }
        
        function contact(){}
        
        function resources(){}
        
        function factSheets(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Fact Sheet'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function faq(){
            $faqs = $this->Faqs->find('all', array('order' => array('Faqs.sortorder')));
            $this->set('faqs', $faqs);
        }
        
        function surveyResults(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Survey Results'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function brochures(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Brochures'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function reports(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Reports'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function minutes(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Minutes'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function other(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Other'), 'order' => array('Resources.sortorder')));
            $this->set('resources', $resources);
        }
        
        function newsletter(){}
        
        function newsletterCurrent(){
            $resources = $this->Resources->find('first', array('conditions'=>array('Resources.type'=>'Newsletter'), 'order' => array('Resources.id Desc')));
            $this->set('resources', $resources);
        }
        
        function newsletterSubscribe(){}
        
        function newsletterArchive(){
            $resources = $this->Resources->find('all', array('conditions'=>array('Resources.type'=>'Newsletter'), 'order' => array('Resources.id Desc')));
            $this->set('resources', $resources);
        }
        
        function news(){}
        
        function newsArticles(){
            $news = $this->News->find('all', array('limit'=>5,'order' => array('News.date desc')));
            $this->set('news', $news);
        }
        
        function calendar($month=null, $year=null){
            if (!$month) $month = date('m');
            if (!$year) $year = date('Y');
            $startdate = strtotime("{$year}-{$month}-01");
            $enddate = strtotime('-1 second', strtotime('+1 month', $startdate));
            
            $startdate = date('Y-m-d', $startdate);
            $enddate = date('Y-m-d', $enddate);
            $events = $this->Events->find('all', array('conditions'=>array('Events.date >=' => $startdate,'Events.date <= ' => $enddate)));
            $this->set('events', $events);
            $this->set('year', $year);
            $this->set('month', $month);
        }
        
        function newsArchive(){
            $news = $this->News->find('all', array('offset'=>5,'order' => array('News.date desc')));
            $this->set('news', $news);
        }
        
        function pastEvents(){
            $events = $this->Events->find('all', array('conditions'=>array('Events.date <' => date('Y-m-d'))));
            $this->set('events', $events);
        }
        
        function communityConsultation(){}
        
        function professional(){}

		function maps(){}
			
		function airquality(){}
		
		function familyhealth(){}
			
		function homeandgarden(){}
			
		function lcemp(){}
		
		function nelsonames(){}
}
?>