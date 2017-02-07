<?php
    class Tamagotchi
    {
      private $name;
      private $age;
      private $food;
      private $happiness;
      private $sleepiness;
      private $life;

      function __construct($name)
      {
          $this->name = $name;
          $this->age = 1;
          $this->food = rand(5, 15);
          $this->happiness = rand(5, 18);
          $this->sleepiness = rand(6, 12);
          $this->life = true;
      }

      function getName()
      {
          return $this->name;
      }

      function getAge()
      {
          return $this->age;
      }

      function getFood()
      {
          return $this->food;
      }

      function getHappiness()
      {
          return $this->happiness;
      }

      function getSleepiness()
      {
          return $this->sleepiness;
      }

      // This is what happens when we "age" the pet
      function age()
      {
          $this->age += 1;
          $this->food -=1;
          $this->happiness -=2;
          $this->sleepiness -=1;
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
