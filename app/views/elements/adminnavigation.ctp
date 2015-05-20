<ul id="nav">
<?
if ($session->check('Auth.User.id') ){
    if ($user_info['usertype'] == 'Admin'){
?>
        <li><a href="/admin/forum/">User Forum</a></li>
        <li><a href="/admin/news/">News & Events</a></li>
        <!-- <li><a href="/admin/events/">Events</a></li> -->
        <li><a href="/admin/resources/">Resources</a></li>
        <li><a href="/admin/faqs/page:1/sort:sortorder/direction:asc">FAQ</a></li>
        <li><a href="/admin/facts/">Lead Facts</a></li>
        <li><a href="/admin/testimonials/">Testimonials</a></li>
        <li><a href="/admin/content/">Site CMS</a></li>
        <li><a href="/admin/users/">Users</a></li>
<?
    }else{
?>
        <li><a href="/admin/forum/">User Forum</a></li>
<?
    }
}else{
?>
<li><a href="/admin/login/">Login</a></li>
<?
}
?>
</ul>