<?php

function routers() 
{
    return require "routes.php";
}

function exactMatchUriInArrayRoutes($uri, $routes) 
{
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }

    return [];
}

function regularExpressionMatchArrayRoutes($uri, $routes)
{
    return array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routers();

    $matchadUri = exactMatchUriInArrayRoutes($uri, $routes);

    if (empty($matchadUri)) {
        $matchadUri = regularExpressionMatchArrayRoutes($uri, $routes);
    }

    echo "<pre>"; 
    print_r($matchadUri);
    die();
}