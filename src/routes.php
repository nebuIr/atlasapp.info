<?php

include_once __DIR__ . '/classes/Components.php';
include_once __DIR__ . '/classes/Basics.php';

function getPageContent($page): void
{
    switch ($page) {
        default:
        case '':
            include __DIR__ . '/templates/pages/home.php';
            break;

        case 'media':
            include __DIR__ . '/templates/pages/media.php';
            break;

        case 'news':
            include __DIR__ . '/templates/pages/news.php';
            break;

        case 'releases':
            include __DIR__ . '/templates/pages/releases.php';
            break;

        case 'twitter':
            include __DIR__ . '/templates/pages/twitter.php';
            break;

        case 'privacypolicy':
            include __DIR__ . '/templates/pages/privacypolicy.php';
            break;
    }
}