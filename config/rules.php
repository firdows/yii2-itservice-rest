<?php
/**
 * @SWG\Parameter(
 *      description="ID of data",
 *      format="int64",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 * )
 */
$api = "../routes/api";
//echo $api;
//exit();
$routes = [];
foreach (glob("{$api}/*.php") as $filename) {
//    echo $filename;
//    exit();
    $route = require($filename);
    $routes = array_merge($routes, $route);
}
return $routes;