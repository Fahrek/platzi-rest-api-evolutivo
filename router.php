<?php

$matches = [];

if (preg_match('/\/([^\/]+)\/([^\/]+)/', $_SERVER["REQUEST_URI"], $matches)) {
    // Es una URL tipo /recurso/id
    $_GET['resource_type'] = $matches[1]; // Tomamos la primera coincidencia como tipo de recurso
    $_GET['resource_id'] = $matches[2]; // Tomamos la segunda coincidencia como id de recurso

    error_log( print_r($matches, 1) ); // Información para debugging
    require 'server.php'; // Delegamos la respuesta en server.php
} elseif ( preg_match('/\/([^\/]+)\/?/', $_SERVER["REQUEST_URI"], $matches) ) {
    // Es una URL tipo /recurso
    $_GET['resource_type'] = $matches[1]; // Tomamos la primera coincidencia como tipo de recurso

    error_log( print_r($matches, 1) );// Información para debugging

    require 'server.php'; // Delegamos la respuesta en server.php
} else {
    // No es una URL bien formada
    error_log('No matches');// Información para debugging
    http_response_code( 404 ); // Enviamos un error 404 como respuesta
}