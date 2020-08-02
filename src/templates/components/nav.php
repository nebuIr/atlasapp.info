<?php
use atlas\Basics;
$basics = new Basics();
$dir = $basics->getDirectory();
?>

<nav>
    <ul>
        <li class="only-desktop" style="margin-right: 10px; margin-top: 1px"><a href="/"><img alt="atlas logo" class="nav-logo" src="/assets/img/logos/logo_square_512px.png"/></a></li>
        <li><a <?php if ($dir === '') {echo "class='active'";}?>href="/">Home</a></li>
        <li><a <?php if ($dir === 'media') {echo "class='active'";}?>href="/media">Screenshots</a></li>
        <li><a <?php if ($dir === 'news') {echo "class='active'";}?>href="/news">News</a></li>
        <li><a <?php if ($dir === 'releases') {echo "class='active'";}?>href="/releases">Releases</a></li>
        <li><a <?php if ($dir === 'twitter') {echo "class='active'";}?>href="/twitter">Twitter</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (stripos($agent, 'android') !== false) {
            echo "<li><a target='_blank' href='/home'>Open App</a></li>";
        } ?>
    </ul>
</nav>