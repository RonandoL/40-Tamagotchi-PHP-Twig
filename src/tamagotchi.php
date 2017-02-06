<?php
    class Tamagotchi
    {
      private $name;
      private $age;
      // private $food;
      // private $attention;
      // private $sleep;
      // life;

      function __construct($name)
      {
          $this->name = $name;
          $this->age = 1;
          // $this->food = rand(4,10);
          // $this->attention = rand(2, 8);
      }

      function getName()
      {
          return $this->name;
      }

      function getAge()
      {
          return $this->age;
      }

      // This is what happens when we "age" the pet
      function age()
      {
          $this->age += 1;
      }

        // SAVE object to array
        function save()
        {
            array_push($_SESSION['list_of_tamagotchis'], $this);
        }

        // GET ALL objects from Array
        static function getAll()
        {
            return $_SESSION['list_of_tamagotchis'];
        }

        // DELETE ALL Objects in array - empty array
        static function deleteAll()
        {
            $_SESSION['list_of_tamagotchis'] = array();
        }


    }
?>
