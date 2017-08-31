<?php

class Account
{
    private $error;

    private $id_account;
    private $account;
    private $balance;
    private $currency;

    public function getError()
    {
        return $this->error;
    }

    public function getIdAccount()
    {
        return $this->id_account;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getBalance()
    {
        return (double) $this->balance;
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
}