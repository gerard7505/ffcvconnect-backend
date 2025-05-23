<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'api_genid' => [['id'], ['_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/.well-known/genid']], [], [], []],
    'api_errors' => [['status'], ['_controller' => 'api_platform.action.error_page'], ['status' => '\\d+'], [['variable', '/', '\\d+', 'status', true], ['text', '/api/errors']], [], [], []],
    'api_validation_errors' => [['id'], ['_controller' => 'api_platform.action.not_exposed'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', 'index', 'index', true], ['text', '/api']], [], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/docs']], [], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '[^.]+', '_format' => 'jsonld'], [['variable', '.', 'jsonld', '_format', true], ['variable', '/', '[^.]+', 'shortName', true], ['text', '/api/contexts']], [], [], []],
    '_api_validation_errors_problem' => [['id'], ['_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    '_api_validation_errors_hydra' => [['id'], ['_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    '_api_validation_errors_jsonapi' => [['id'], ['_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    'create_jugador' => [[], ['_controller' => 'App\\Controller\\JugadorController::createJugador'], [], [['text', '/api/jugadores']], [], [], []],
    'login_jugador' => [[], ['_controller' => 'App\\Controller\\JugadorController::loginJugador'], [], [['text', '/api/jugadores/login']], [], [], []],
    'get_jugador_by_email' => [['email'], ['_controller' => 'App\\Controller\\JugadorController::getJugadorByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/jugadores/email']], [], [], []],
    'update_jugador_by_email' => [['email'], ['_controller' => 'App\\Controller\\JugadorController::updateJugadorByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/jugadores/email']], [], [], []],
    'jugador_list' => [[], ['_controller' => 'App\\Controller\\JugadorController::createJugador'], [], [['text', '/api/jugadores']], [], [], []],
    'jugador_show' => [['id'], ['_controller' => 'App\\Controller\\JugadorController::getJugador'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/jugadores']], [], [], []],
    'club_list' => [[], ['_controller' => 'App\\Controller\\ClubController::createClub'], [], [['text', '/api/clubs']], [], [], []],
    'club_show' => [['email'], ['_controller' => 'App\\Controller\\ClubController::getClubByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/clubs/email']], [], [], []],
    'login_club' => [[], ['_controller' => 'App\\Controller\\ClubController::loginClub'], [], [['text', '/api/clubs/login']], [], [], []],
    'login_admin' => [[], ['_controller' => 'App\\Controller\\AdminController::loginAdmin'], [], [['text', '/api/admins/login']], [], [], []],
    'club_update_by_email' => [['email'], ['_controller' => 'App\\Controller\\ClubController::updateClubByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/clubs/email']], [], [], []],
    'crear_oferta' => [[], ['_controller' => 'App\\Controller\\Api\\OfertaController::crearOferta'], [], [['text', '/api/ofertas']], [], [], []],
    'listar_ofertas' => [[], ['_controller' => 'App\\Controller\\Api\\OfertaController::listarOfertas'], [], [['text', '/api/ofertas']], [], [], []],
    'ver_oferta' => [['id'], ['_controller' => 'App\\Controller\\Api\\OfertaController::verOferta'], ['id' => '\\d+'], [['variable', '/', '\\d+', 'id', true], ['text', '/api/ofertas']], [], [], []],
    'eliminar_oferta' => [['id'], ['_controller' => 'App\\Controller\\Api\\OfertaController::eliminarOferta'], ['id' => '\\d+'], [['variable', '/', '\\d+', 'id', true], ['text', '/api/ofertas']], [], [], []],
    'agregar_oferta_favorita' => [[], ['_controller' => 'App\\Controller\\Api\\OfertaController::agregarFavorito'], [], [['text', '/api/ofertas/favorito']], [], [], []],
    'quitar_oferta_favorita' => [[], ['_controller' => 'App\\Controller\\Api\\OfertaController::quitarFavorito'], [], [['text', '/api/ofertas/favorito']], [], [], []],
    'ofertas_por_club' => [['clubId'], ['_controller' => 'App\\Controller\\Api\\OfertaController::ofertasPorClub'], ['clubId' => '\\d+'], [['variable', '/', '\\d+', 'clubId', true], ['text', '/api/ofertas/club']], [], [], []],
    'obtener_categorias' => [[], ['_controller' => 'App\\Controller\\Api\\OfertaController::obtenerCategorias'], [], [['text', '/api/ofertas/categorias']], [], [], []],
    'favoritos_por_jugador' => [['jugadorId'], ['_controller' => 'App\\Controller\\Api\\OfertaController::favoritosPorJugador'], ['jugadorId' => '\\d+'], [['variable', '/', '\\d+', 'jugadorId', true], ['text', '/api/ofertas/favoritos']], [], [], []],
    'App\Controller\JugadorController::createJugador' => [[], ['_controller' => 'App\\Controller\\JugadorController::createJugador'], [], [['text', '/api/jugadores']], [], [], []],
    'App\Controller\JugadorController::loginJugador' => [[], ['_controller' => 'App\\Controller\\JugadorController::loginJugador'], [], [['text', '/api/jugadores/login']], [], [], []],
    'App\Controller\JugadorController::getJugadorByEmail' => [['email'], ['_controller' => 'App\\Controller\\JugadorController::getJugadorByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/jugadores/email']], [], [], []],
    'App\Controller\JugadorController::updateJugadorByEmail' => [['email'], ['_controller' => 'App\\Controller\\JugadorController::updateJugadorByEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/api/jugadores/email']], [], [], []],
];
