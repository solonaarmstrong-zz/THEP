<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trail Area Health & Environment</title>
	<link rel="icon" 
	      type="image/png" 
	      href="http://thep.ca/images/thep-icon.png">
	<link media="all" rel="stylesheet" type="text/css" href="/css/all.css" />
	<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/js/jquery.main.js"></script>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10289366-42', 'auto');
  ga('send', 'pageview');

	</script>

</head>
<body>
	<div id="wrapper">
		<div class="w1">
			<!-- header -->
			<div id="header">
				<strong class="logo"><a href="/">Trail Area Health &amp; Environment Program</a></strong>
				<ul class="top-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/pages/contact/">Contact</a></li>
				</ul>
			</div>
			<!-- professional -->
			<div class="professional">
				<a href="/pages/professional/">Are you a Health Care Professional?</a>
			</div>
			<!-- links -->
			<?php echo $this->element("navigation"); ?>
			<!-- nav -->
			<?php echo $this->element("subnavigation"); ?>
			<!-- main -->
			<div id="main">
				<!-- content -->
				<div id="content">
                                
                                <?php echo $content_for_layout; ?>
                                <br/>
                                <br/>
                                <?php echo $this->element('sql_dump'); ?>

                                </div>
				<!-- sidebar -->
				<div id="sidebar">
					<!-- info -->
					<!-- info -->
					<?php echo $this->element("widget_facts"); ?>
					<!-- block -->
					<?php echo $this->element("widget_news"); ?>
					<!-- subscribe -->
					<?php echo $this->element("widget_subscribe"); ?>
					<!-- testimonials -->
                    <?php echo $this->element("widget_testimonials"); ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
	<div id="footer">
		<span class="by"> site by <a href="http://michaelhepher.com" target="developer_window">michaelhepher.com</a></span>
		<p>Copyright &copy; 2011 all rights reserved <span>Trail Health &amp; Environment Committee</span></p>
	</div>
</body>
</html>