<?php
    class Tamagotchi
    {
      private $name;

      function __construct($pet_name)
      {
          $this->name = $pet_name;
      }

      // NAME Getter & Setter
      function setName($new_name)
      {
          $this->name = $new_name;
      }
      function getName()
      {
          return $this->name;
      }

        // SAVE object to array
        function save()
        {
            array_push($_SESSION['array_of_tamagotchis'], $this);
        }

        // GET ALL objects from Array
        static function getAll()
        {
            return $_SESSION['array_of_tamagotchis'];
        }

        // DELETE ALL Objects in array - empty array
        static function deleteAll()
        {
            $_SESSION['array_of_tamagotchis'] = array();
        }


    }
?>
