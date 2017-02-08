<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tamagotchi.php";

    session_start();                          // For global variable, saving in browser cache
    // $allPets = $_SESSION['list_of_tamagotchis'];
    if (empty($_SESSION['list_of_tamagotchis'])) {
        $_SESSION['list_of_tamagotchis'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

    // GET Route for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // INSTANTIATION Route for sending new object (new task) to /tasks URL
    $app->post('/gotchi', function() use ($app) {
        $tamagotchi = new Tamagotchi(ucfirst($_POST['name']));    // instantiation of Tamagotchi object
        $tamagotchi->save();    // save Tamagotchi object

        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // AGE Route
    $app->post('/age', function() use ($app) {
        $tamagotchis = Tamagotchi::getAll();

        foreach ($tamagotchis as $tamagotchi) {
          $tamagotchi->age();
        }

        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // FEED Route
    $app->post('/feed', function() use ($app) {
        // $allPets = $_SESSION['list_of_tamagotchis'];
        foreach ($_SESSION['list_of_tamagotchis'] as $tamagotchi) {
          if ($tamagotchi->getName() == $_POST['name']) {
            $tamagotchi->feed();
          }
        }
        Tamagotchi::ageAll();  // we feed one pet but all pets age

        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });


    // DELETE POST Route for deleting all Tamagotchis
    $app->post('/delete', function() use ($app) {
      Tamagotchi::deleteAll();
      return $app['twig']->render('delete.html.twig');
    });


    return $app;

?>
