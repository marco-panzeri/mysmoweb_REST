<?php
function get($uri)
{
    $headers = apache_request_headers();
    $array = explode('?', $uri);
    //divido l'uri per le richieste get con parametri
    $uri = $array[0];

    require("functionGet.php");

    switch ($uri) {

        //homepage del sito
        case '/':
            if (isset($uriget)) {
                notFound();
                break;
            } else {
                index();
                break;
            }

        //pagina di visualizzazione esercenti
        case '/listaEsercenti':

            listaEsercenti();
            break;


        //pagina di login
        case '/aggiungiEsercente':
            aggiungiEsercente();
            break;

        case '/aggiungiCodiceSconto':
            if (isset($uriget)) {
                notFound();
                break;
            } else {
                aggiungiCodiceSconto();
                break;
            }

        //last resort
        default:
            notFound();
            break;
    }
}

function post($uri)
{
    $headers = apache_request_headers();
    require("functionPost.php");
    switch ($uri) {

        case '/aggiungiEsercente':
            aggiungiEsercentePost();
            break;

        default:
            notFound();
            break;
    }
}

function notFound()
{
    http_response_code(404);
    require('../view/404.php');
    visualizzaPagina();
}

function badRequest()
{
    http_response_code(400);
    require('../view/400.php');
    visualizzaPagina();
}

?>