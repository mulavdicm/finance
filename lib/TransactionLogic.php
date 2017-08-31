<?php
include_once 'Database.php';
include_once 'Transaction.php';

class TransactionLogic
{
    private $error;

    public function getError() {
        return $this->error;
    }

    public function insertNewTransaction($transaction)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "INSERT INTO transaction (date, contents, type, amount, currency)" . "VALUES(:date, :contents, :type, :amount, :currency)";
            $sth = $conn->prepare($query);
            $sth->bindParam(':date', strval($transaction->getDate()), PDO::PARAM_STR);
            $sth->bindParam(':contents', strval($transaction->getContents()), PDO::PARAM_STR);
            $sth->bindParam(':type', strval($transaction->getType()), PDO::PARAM_STR);
            $sth->bindParam(':amount', strval($transaction->getAmount()), PDO::PARAM_STR);
            $sth->bindParam(':currency', strval($transaction->getCurrency()), PDO::PARAM_STR);
            $execute = $sth->execute();
            $db::closeDb();
            return $execute;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function insertSubcategoryTransactionRelationalData($subcategory)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "INSERT INTO transaction_subcategory (transaction_id_transaction, subcategory_id_subcategory)" . "VALUES(:id_transaction, :id_subcategory)";
            $sth = $conn->prepare($query);
            $sth->bindParam(':id_transaction', strval($this->getLatestId()), PDO::PARAM_INT);
            $sth->bindParam(':id_subcategory', strval($subcategory), PDO::PARAM_INT);
            $execute = $sth->execute();
            $db::closeDb();
            return $execute;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function insertAccountTransactionRelationalData($id_account)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "INSERT INTO transaction_account (transaction_id_transaction, account_id_account)" . "VALUES(:id_transaction, :id_account)";
            $sth = $conn->prepare($query);
            $sth->bindParam(':id_transaction', strval($this->getLatestId()), PDO::PARAM_INT);
            $sth->bindParam(':id_account', strval($id_account), PDO::PARAM_INT);
            $execute = $sth->execute();
            $db::closeDb();
            return $execute;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function insertTransferTransactionRelationalData($id_account_from, $id_account_to)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "INSERT INTO transfer (transaction_id_transaction, account_transfer_from, account_transfer_to)" . "VALUES(:transaction_id_transaction, :account_transfer_from, :account_transfer_to)";
            $sth = $conn->prepare($query);
            $sth->bindParam(':transaction_id_transaction', strval($this->getLatestId()), PDO::PARAM_INT);
            $sth->bindParam(':account_transfer_from', strval($id_account_from), PDO::PARAM_INT);
            $sth->bindParam(':account_transfer_to', strval($id_account_to), PDO::PARAM_INT);
            $execute = $sth->execute();
            $db::closeDb();
            return $execute;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    private function getLatestId()
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_transaction FROM transaction ORDER BY id_transaction DESC LIMIT 1;";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Transaction');
            $latestId = $sth->fetch();
            $db::closeDb();
            return $latestId->getIdTransaction();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function selectTransactionsCurrentMonth()
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_transaction, date, contents, type, amount FROM transaction WHERE date BETWEEN DATE_SUB(CURRENT_DATE,
            INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE ORDER BY date DESC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Transaction');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
