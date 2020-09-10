<?php
    class Game{
        public $name;
        public $developer;
        public $publisher;
        public $price;

        /**
         * Game constructor.
         * @param $name
         * @param $developer
         * @param $publisher
         * @param $price
         */
        public function __construct($name, $developer, $publisher, $price)
        {
            $this->name = $name;
            $this->developer = $developer;
            $this->publisher = $publisher;
            $this->price = $price;
        }
    }