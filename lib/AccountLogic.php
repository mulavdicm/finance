<?php
include_once ('Database.php');
include_once ('Account.php');

class AccountLogic
{
    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function showBalance($id_account)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT balance FROM account WHERE id_account=:id_account";
            $sth = $conn->prepare($query);
            $sth->bindParam(':id_account', $id_account, PDO::PARAM_STR);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Account');
            $account = $sth->fetch();
            $balance = $account->getBalance();
            $db::closeDb();
            return $balance;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function updateBalance($balance, $id_account)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "UPDATE account SET balance=:balance WHERE id_account=:id_account";
            $sth = $conn->prepare($query);
            $sth->bindParam(':balance', strval($balance), PDO::PARAM_STR);
            $sth->bindParam(':id_account', $id_account, PDO::PARAM_STR);
            $execute = $sth->execute();
            $db::closeDb();
            return $execute;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function getAccountInformation()
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_account, account FROM account";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Account');
            $accounts = $sth->fetchAll();
            $db::closeDb();
            return $accounts;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
