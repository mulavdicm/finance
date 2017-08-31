<?php

class Transaction
{
    private $error;
    
    private $id_transaction;
    private $date;
    private $category;
    private $subcategory;
    private $from;
    private $to;
    private $contents;
    private $type;
    private $memo;
    private $amount;
    private $currency;

    public function getError()
    {
        return $this->error;
    }

    public function getIdTransaction()
    {
        return $this->id_transaction;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getSubCategory()
    {
        return $this->subcategory;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAmount()
    {
        return (double) $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setSubCategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}