<?php
    class Games{
        public $id;
        public $name;
        public $developer;
        public $publisher;
        public $price;
        public $image;

        /**
         * Games constructor.
         * @param $id
         * @param $name
         * @param $developer
         * @param $publisher
         * @param $price
         * @param $image
         */
        public function __construct($id, $name, $developer, $publisher, $price, $image)
        {
            $this->id = $id;
            $this->name = $name;
            $this->developer = $developer;
            $this->publisher = $publisher;
            $this->price = $price;
            $this->image = $image;
        }
    }