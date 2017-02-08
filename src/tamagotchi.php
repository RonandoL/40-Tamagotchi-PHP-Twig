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
          $this->happiness = rand(2, 6);
          $this->sleepiness = rand(7, 12);
          $this->life = true;
      }

      // CheckLife
      function checkLife()
      {
          if ($this->age > 19 || $this->food <= 0 || $this->happiness <= 0|| $this->sleepiness <= 0) {
            $this->life = false;
          }
          return $this->life;
      }

      // AGE PET - This is what happens when we "age" the pet one day
      function age()
      {
          $this->age += 1;
          $this->food -=1;
          $this->happiness -=1;
          $this->sleepiness -=1;
      }

      // FEED pet
      function feed()
      {
          $this->food += 3;

      }

      // AGE ALL PETS - when feeding, etc.
      static function ageAll()
      {
          foreach ($_SESSION['list_of_tamagotchis'] as $tamagotchi) {
            $tamagotchi->age();
          }
      }

          // GETTERS --------------------------------------------
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
          function getLife()
          {
              return $this->life;
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
