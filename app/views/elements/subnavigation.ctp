<?php
$url = $_SERVER["REQUEST_URI"];
$url_pieces = explode("/",$url);
//var_dump($url_pieces);
if (count($url_pieces)>1){
    if ($url_pieces[1] == 'pages'){
        $subpage = $url_pieces[2];
    }else{
        $subpage = '';
    }
    //echo('subpage = '.$subpage);
}

?>

<ul id="nav" class="fade-menu">
        <li <?php if ($subpage == 'about-the-program' or $subpage == 'the-program-101' or $subpage == 'governance' or $subpage == 'testimonials' or $subpage == 'maps') echo 'class="selected"'; ?>>
                <a href="/pages/about-the-program/">About THE Program <span class="arrow"></span></a>
                <ul>
                        <li><a href="/pages/the-program-101">THE Program 101</a></li>
                        <li><a href="/pages/governance/">Governance</a></li>
                        <li><a href="/pages/testimonials/">Testimonials</a></li>
						<li><a href="/pages/maps/">Program Area Maps</a></li>
                </ul>
        </li>
        <li <?php if ($subpage == 'resources' or $subpage == 'fact-sheets' or $subpage == 'faq' or $subpage == 'survey-results' or $subpage == 'brochures' or $subpage == 'reports' or $subpage == 'minutes' or $subpage == 'other') echo 'class="selected"'; ?>>
                <a href="/pages/resources/">Resources <span class="arrow"></span></a>
                <ul style="margin-left:-150px">
                        <li><a href="/pages/fact-sheets/">Fact Sheets</a></li>
                        <li><a href="/pages/faq/">FAQ</a></li>
                        <li><a href="/pages/survey-results/">Survey Results</a></li>
                        <li><a href="/pages/brochures/">Brochures</a></li>
                        <li><a href="/pages/reports/">Reports</a></li>
                        <li><a href="/pages/minutes/">Minutes</a></li>
                        <li><a href="/pages/other/">Other</a></li>
                </ul>
        </li>
        <li <?php if ($subpage == 'newsletter' or $subpage == 'newsletter-subscribe' or $subpage == 'newsletter-current' or $subpage == 'newsletter-archive') echo 'class="selected"'; ?>>
                <a href="/pages/newsletter/">Newsletters <span class="arrow"></span></a>
                <ul style="margin-left:-40px">
                        <li><a href="/pages/newsletter-subscribe/">Subscribe</a></li>
                        <li><a href="/pages/newsletter-current/">Current</a></li>
                        <li><a href="/pages/newsletter-archive/">Archive</a></li>
                </ul>
        </li>
        <li><a href="/pages/news-archive/">News &amp; Events <span class="arrow"></span></a></li>
        <li><a href="/pages/community-consultation">Community Consultation <span class="arrow"></span></a></li>
</ul>