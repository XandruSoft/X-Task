<?php

namespace Xandrusoft\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Trello\Client;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('XandrusoftTaskBundle:Default:index.html.twig');
    }
    public function trelloAction()
    {
        //$task = new Task();

        $api = new Client();
        $api->authenticate('c84dab2592ce6836cc92088aa792e401', '813fe3dae5b52f972ab2bace86113110c14f32e42e39e3c054d0c065f6f624d1', Client::AUTH_URL_CLIENT_ID);


        $boards = $api->api('member')->boards()->all('alextorres34');

        foreach ($boards as $key => $value) {

            if ($value['name'] == 'prueba') {
                echo "<h1>Tablero: " . $value['name'] . "</h1>";

                $card_list = $api->boards()->lists()->all($value['id']);

                $card = $api->boards()->cards()->all($value['id']);

                var_dump($card_list);

                echo "<hr>";
                foreach ($card_list as $key2 => $value2) {
                    echo "<h1>Lista: " . $value2['name'] . "</h1>";
                    var_dump($value2);
                }
                echo "<hr>";
                foreach ($card as $key3 => $value3) {
                    echo "<h1>Tarjeta: " . $value3['name'] . "</h1>";
                    var_dump($value3);
                    echo "<br><h2>Checklist</h2><br>";

                    $checklist = $value3['idChecklists'];

                    foreach ($checklist as $key4 => $value4) {
                        $checklist1 = $api->checklists()->items()->all($value4);
                        var_dump($checklist1);
                    }

                }
            }
        }
    }

    public function insertBoardsIntoBdAction()
    {
        $em = $this->getDoctrine()->getManager();
        $api = new Client();
        $api->authenticate('c84dab2592ce6836cc92088aa792e401', '813fe3dae5b52f972ab2bace86113110c14f32e42e39e3c054d0c065f6f624d1', Client::AUTH_URL_CLIENT_ID);

        $boards = $api->api('member')->boards()->all('alextorres34');

        $board = new Board();
        $board->setName('Keyboard');
        $board-> setIdBoard('9887asf');
        $board-> setSubscribed('false');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($board);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$board->getId());
    }
}
