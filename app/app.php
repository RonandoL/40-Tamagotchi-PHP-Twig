<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tamagotchi.php";

    session_start();                          // For global variable, saving in browser cache
    if (empty($_SESSION['list_of_tamagotchis'])) {
        $_SESSION['list_of_tamagotchis'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

    // 1. GET Route for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // 2. Route for sending instantiated new object (new task) to /tasks URL
    $app->post('/gotchi', function() use ($app) {
        $tamagotchi = new Tamagotchi(ucfirst($_POST['name']));    // instantiation of Tamagotchi object
        $tamagotchi->save();    // save Tamagotchi object

        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // 3. POST Route for deleting all Tamagotchis
    $app->post('/delete', function() use ($app) {
      Tamagotchi::deleteAll();
      return $app['twig']->render('delete.html.twig');
    });


    return $app;

?>
