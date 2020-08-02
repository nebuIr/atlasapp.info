<?php

namespace atlas;

class Basics
{
    public function getDirectory(): string
    {
        $params = explode('/', $_SERVER['REQUEST_URI']);

        if (array_key_exists(1, $params)) {
            return $params[1];
        }

        return '';
    }

    public function errorCode(): array
    {
        $title = 'Unknown Error';
        $description = 'An unknown error occurred';

        switch ($_SERVER['REDIRECT_STATUS']) {
            case 400:
                $title = '400 Bad Request';
                $description = 'Your client has issued a malformed or illegal request.';
                break;

            case 401:
                $title = '401 Unauthorized';
                $description = 'You are not authorized to access this page.';
                break;

            case 403:
                $title = '403 Forbidden';
                $description = 'You do not have access to this page.';
                break;

            case 404:
                $title = '404 Not Found';
                $description = 'The requested URL was not found on this server.';
                break;

            case 500:
                $title = '500 Internal Server Error';
                $description = 'There was an error. Please try again later.';
                break;

            case 502:
                $title = '502 Bad Gateway';
                $description = 'The server encountered a temporary error and could not complete the request.';
                break;

            case 504:
                $title = '504 Gateway Timeout';
                $description = 'The server encountered a temporary error and could not complete the request.';
                break;
        }

        return [$title, $description];
    }
}