<?php

class Chart {

    private $category;
    private $amount;
    private $date;
    private $time;
    private $format;

    public function getCategory() {
        return $this->category;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getFormat() {
        return $this->format;
    }
}
