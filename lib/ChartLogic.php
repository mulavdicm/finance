<?php
include_once 'Database.php';
include_once 'Chart.php';

class ChartLogic {

    public function showCategoryAndAmountPerTransactionCurrentMonthExpense() {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT category, sum(amount) AS amount FROM transaction
            INNER JOIN transaction_subcategory ON transaction.id_transaction = transaction_subcategory.transaction_id_transaction
            INNER JOIN subcategory ON transaction_subcategory.subcategory_id_subcategory = subcategory.id_subcategory
            INNER JOIN category ON subcategory.category_id_category = category.id_category
            WHERE type = 'expense' AND (date BETWEEN DATE_SUB(CURRENT_DATE,
            INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE)
            GROUP by category
            ORDER BY amount DESC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Chart');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function showCategoryAndAmountPerTransactionCurrentMonthIncome() {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT category, sum(amount) AS amount FROM transaction
            INNER JOIN transaction_subcategory ON transaction.id_transaction = transaction_subcategory.transaction_id_transaction
            INNER JOIN subcategory ON transaction_subcategory.subcategory_id_subcategory = subcategory.id_subcategory
            INNER JOIN category ON subcategory.category_id_category = category.id_category
            WHERE type = 'income' AND (date BETWEEN DATE_SUB(CURRENT_DATE,
            INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE)
            GROUP by category
            ORDER BY amount DESC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Chart');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function showDateAndAmountPerTransactionCurrentMonthExpense() {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT CONCAT(DATE_FORMAT(date, '%Y, '),
            DATE_FORMAT(date, '%c') - 1,
            DATE_FORMAT(date, ', %e, %H, %i, %S')) AS date, TRUNCATE(amount, 2) as amount, CONCAT('€',TRUNCATE(amount, 2)) as format
            FROM
                transaction
                    INNER JOIN
                transaction_subcategory ON transaction.id_transaction = transaction_subcategory.transaction_id_transaction
                    INNER JOIN
                subcategory ON transaction_subcategory.subcategory_id_subcategory = subcategory.id_subcategory
                    INNER JOIN
                category ON subcategory.category_id_category = category.id_category
            WHERE
                type = 'expense'
                    AND (date BETWEEN DATE_SUB(CURRENT_DATE,
                    INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE)
            GROUP BY date
            ORDER BY date ASC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Chart');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function showDateAndAmountPerTransactionCurrentMonthIncome() {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT CONCAT(DATE_FORMAT(date, '%Y, '),
            DATE_FORMAT(date, '%c') - 1,
            DATE_FORMAT(date, ', %e, %H, %i, %S')) AS date, TRUNCATE(amount, 2) as amount, CONCAT('€',TRUNCATE(amount, 2)) as format
            FROM
                transaction
                    INNER JOIN
                transaction_subcategory ON transaction.id_transaction = transaction_subcategory.transaction_id_transaction
                    INNER JOIN
                subcategory ON transaction_subcategory.subcategory_id_subcategory = subcategory.id_subcategory
                    INNER JOIN
                category ON subcategory.category_id_category = category.id_category
            WHERE
                type = 'income'
                    AND (date BETWEEN DATE_SUB(CURRENT_DATE,
                    INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE)
            GROUP BY date
            ORDER BY date ASC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Chart');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function showAmountPerDateCurrentMonth() {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT date, category, sum(amount) AS amount FROM transaction
            INNER JOIN transaction_subcategory ON transaction.id_transaction = transaction_subcategory.transaction_id_transaction
            INNER JOIN subcategory ON transaction_subcategory.subcategory_id_subcategory = subcategory.id_subcategory
            INNER JOIN category ON subcategory.category_id_category = category.id_category
            WHERE type = 'expense' AND (date BETWEEN DATE_SUB(CURRENT_DATE,
            INTERVAL DAYOFMONTH(CURRENT_DATE) - 1 DAY) AND CURRENT_DATE)
            GROUP by category
            ORDER BY amount DESC";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Chart');
            $transaction = $sth->fetchAll();
            $db::closeDb();
            return $transaction;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

}