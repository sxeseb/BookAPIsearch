<?php
use GuzzleHttp\Client;

require_once './vendor/autoload.php';

// config to local key
require './config/config.php';

$retour ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['search'];

    $client = new GuzzleHttp\Client([
    'base_uri' => 'https://www.googleapis.com/books/v1/'
    ]);
    try {
        $response = $client->request('GET', 'volumes', [
        'query' => ['q' => $title, 'printType' => 'books'],
        'key' => $key
        ]);
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }

    if (isset($response) ) {
        $retour = $response->getBody();

        $retour = $retour->getContents();
        $retour = json_decode($retour, true, 512);

        if (isset($retour['items'])) {
            $books = [];

            for ($i = 0; $i < count($retour['items']); $i++) {
                $book = $retour['items'][$i]['volumeInfo'];

                $isbn = isset($book['industryIdentifiers'][0]['identifier']) ? $book['industryIdentifiers'][0]['identifier'] : 'NR';
                $titre = isset($book['title']) ? $book['title'] : 'NR';
                $auteur = isset($book['authors'][0]) ? $book['authors'][0] : 'NR';
                $edition = isset($book['publisher']) ? $book['publisher'] : 'NR';
                $thumb = isset($book['imageLinks']['thumbnail']) ? $book['imageLinks']['thumbnail'] : 'https://via.placeholder.com/130X180';
                $pages = isset($book['pageCount']) ? $book['pageCount'] : 'NR';

                $books[$i]['isbn'] = $isbn;
                $books[$i]['titre'] = $titre;
                $books[$i]['auteur'] = $auteur;
                $books[$i]['edition'] = $edition;
                $books[$i]['img_couverture'] = $thumb;
                $books[$i]['pages'] = $pages;
            }
        }
    }
}