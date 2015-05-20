<?php
$url = $_SERVER["REQUEST_URI"];
$url_pieces = explode("/",$url);

if (count($url_pieces)>0){
    $page = $url_pieces[1];
}

?>

<ul class="links fade-menu" id="nav2">
    <li <?php if ($page == 'parents') echo 'class="selected"'; ?>>
            <a class="green" href="/parents/">
                    <img src="/images/img7.jpg" width="61" height="51" alt="image description" />
                    <span class="title">
                            <strong>I’m a parent</strong>
                    </span>
                    <span class="arrow"></span>
            </a>
            <div class="drop">
                    <ul class="green">
                            <li><a href="/parents/quick-tips-and-facts/">Quick Tips</a></li>
                            <li><a href="/parents/fact-sheets/">Fact Sheets</a></li>
                            <li><a href="/parents/other-resources/">Other Resources</a></li>
                            <li><a href="/parents/testimonials/">Testimonials</a></li>
                    </ul>
            </div>
    </li>
    <li <?php if ($page == 'residents') echo 'class="selected"'; ?>>
            <a class="blue" href="/residents/">
                    <img src="/images/img8.jpg" width="61" height="51" alt="image description" />
                    <span class="title">
                            <strong>I live here</strong>
                    </span>
                    <span class="arrow"></span>
            </a>
            <div class="drop">
                    <ul class="blue" style="margin-left: -100px">
                            <li><a href="/residents/quick-tips-and-facts/">Quick Tips</a></li>
                            <li><a href="/residents/fact-sheets/">Fact Sheets</a></li>
                            <li><a href="/residents/other-resources/">Other Resources</a></li>
                            <li><a href="/residents/testimonials/">Testimonials</a></li>
                    </ul>
            </div>
    </li>
    <li <?php if ($page == 'welcome') echo 'class="selected"'; ?>>
            <a class="orange" href="/welcome/">
                    <img src="/images/img9.jpg" width="61" height="51" alt="image description" />
                    <span class="title">
                            <strong>I’m new to the area</strong>
                    </span>
                    <span class="arrow"></span>
            </a>
            <div class="drop">
                    <ul class="orange" style="margin-left: -420px">
                            <li><a href="/welcome/quick-tips-and-facts/">Quick Tips</a></li>
                            <li><a href="/welcome/fact-sheets/">Fact Sheets</a></li>
                            <li><a href="/welcome/other-resources/">Other Resources</a></li>
                            <li><a href="/welcome/testimonials/">Testimonials</a></li>
							<li><a href="/welcome/trail/">About Trail</a></li>
                    </ul>
            </div>
    </li>
</ul>