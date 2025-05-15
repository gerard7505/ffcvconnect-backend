<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/jugadores' => [
            [['_route' => 'create_jugador', '_controller' => 'App\\Controller\\JugadorController::createJugador'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'jugador_list', '_controller' => 'App\\Controller\\JugadorController::createJugador'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/jugadores/login' => [[['_route' => 'login_jugador', '_controller' => 'App\\Controller\\JugadorController::loginJugador'], null, ['POST' => 0], null, false, false, null]],
        '/api/clubs' => [[['_route' => 'club_list', '_controller' => 'App\\Controller\\ClubController::createClub'], null, ['POST' => 0], null, false, false, null]],
        '/api/clubs/login' => [[['_route' => 'login_club', '_controller' => 'App\\Controller\\ClubController::loginClub'], null, ['POST' => 0], null, false, false, null]],
        '/api/admins/login' => [[['_route' => 'login_admin', '_controller' => 'App\\Controller\\AdminController::loginAdmin'], null, ['POST' => 0], null, false, false, null]],
        '/api/ofertas' => [
            [['_route' => 'crear_oferta', '_controller' => 'App\\Controller\\Api\\OfertaController::crearOferta'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'listar_ofertas', '_controller' => 'App\\Controller\\Api\\OfertaController::listarOfertas'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/ofertas/favorito' => [
            [['_route' => 'agregar_oferta_favorita', '_controller' => 'App\\Controller\\Api\\OfertaController::agregarFavorito'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'quitar_oferta_favorita', '_controller' => 'App\\Controller\\Api\\OfertaController::quitarFavorito'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/ofertas/categorias' => [[['_route' => 'obtener_categorias', '_controller' => 'App\\Controller\\Api\\OfertaController::obtenerCategorias'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|\\.well\\-known/genid/([^/]++)(*:46)'
                        .'|errors/(\\d+)(*:65)'
                        .'|validation_errors/([^/]++)(*:98)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:134)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:165)'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:207)'
                            .'|lubs/email/([^/]++)(?'
                                .'|(*:237)'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:276)'
                        .')'
                        .'|jugadores/(?'
                            .'|email/([^/]++)(?'
                                .'|(*:315)'
                            .')'
                            .'|([^/]++)(*:332)'
                        .')'
                        .'|ofertas/(?'
                            .'|(\\d+)(?'
                                .'|(*:360)'
                            .')'
                            .'|club/(\\d+)(*:379)'
                            .'|favoritos/(\\d+)(*:402)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        65 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.error_page'], ['status'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        98 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        134 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        165 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        207 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        237 => [
            [['_route' => 'club_show', '_controller' => 'App\\Controller\\ClubController::getClubByEmail'], ['email'], ['GET' => 0], null, false, true, null],
            [['_route' => 'club_update_by_email', '_controller' => 'App\\Controller\\ClubController::updateClubByEmail'], ['email'], ['PUT' => 0], null, false, true, null],
        ],
        276 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        315 => [
            [['_route' => 'get_jugador_by_email', '_controller' => 'App\\Controller\\JugadorController::getJugadorByEmail'], ['email'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_jugador_by_email', '_controller' => 'App\\Controller\\JugadorController::updateJugadorByEmail'], ['email'], ['PUT' => 0], null, false, true, null],
        ],
        332 => [[['_route' => 'jugador_show', '_controller' => 'App\\Controller\\JugadorController::getJugador'], ['id'], ['GET' => 0], null, false, true, null]],
        360 => [
            [['_route' => 'ver_oferta', '_controller' => 'App\\Controller\\Api\\OfertaController::verOferta'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'eliminar_oferta', '_controller' => 'App\\Controller\\Api\\OfertaController::eliminarOferta'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        379 => [[['_route' => 'ofertas_por_club', '_controller' => 'App\\Controller\\Api\\OfertaController::ofertasPorClub'], ['clubId'], ['GET' => 0], null, false, true, null]],
        402 => [
            [['_route' => 'favoritos_por_jugador', '_controller' => 'App\\Controller\\Api\\OfertaController::favoritosPorJugador'], ['jugadorId'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
