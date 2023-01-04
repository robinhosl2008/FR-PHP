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

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($matchedToGetParams, '/')),
        );
    }

    return [];
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routers();

    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);

        $params = params($uri, $matchedUri);
            
        echo "<pre>"; 
        print_r($params);
        die();

    }

    // echo "<pre>"; 
    // print_r($matchedUri);
    die();
}