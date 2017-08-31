<?php
include_once('lib/SubcategoryLogic.php');
include_once('lib/Transaction.php');
include_once('lib/TransactionLogic.php');
include_once('lib/AccountLogic.php');
$transactionLogic = new TransactionLogic();
$accountLogic = new AccountLogic();
$subcategoryLogic = new SubcategoryLogic();

$transaction = new Transaction();
$transaction->setDate($_GET['date']);
$transaction->setContents($_GET['contents']);
$transaction->setType($_GET['type']);
$transaction->setAmount($_GET['amount']);
$transaction->setCurrency($_GET['currency']);

if ($transactionLogic->insertNewTransaction($transaction)) {
    echo "Transaction has been added successfully";

    if($_GET['type'] == 'Transfer') {
        if ($transactionLogic->insertTransferTransactionRelationalData($_GET['account_from'], $_GET['account_to'])) {
            echo "Transfer has been successful";

            $accountFromBalance = $accountLogic->showBalance($_GET['account_from']);
            $adjustedFromBalance = $accountFromBalance - $_GET['amount'];
            $accountLogic->updateBalance($adjustedFromBalance, $_GET['account_from']);

            $accountFromBalance = $accountLogic->showBalance($_GET['account_to']);
            $adjustedFromBalance = $accountFromBalance + $_GET['amount'];
            $accountLogic->updateBalance($adjustedFromBalance, $_GET['account_to']);
        } else {
            $transactionLogic->getError();
        }
    } else {
        if ($transactionLogic->insertSubcategoryTransactionRelationalData($_GET['subcategory'])) {
            echo "Relational subcategory data added";
        } else {
            var_dump($transactionLogic->getError());
            echo "Something went wrong";
        }

        if ($transactionLogic->insertAccountTransactionRelationalData($_GET['account'])) {
            echo "Relational account data added";
        } else {
            var_dump($transactionLogic->getError());
            echo "Something went wrong";
        }
        

        $currentBalance = $accountLogic->showBalance($_GET['account']);
        if ($_GET['type'] == 'Income') {
            $adjustedBalance = $currentBalance + $_GET['amount'];
        }
        if ($_GET['type'] == 'Expense') {
            $adjustedBalance = $currentBalance - $_GET['amount'];
        }
        $accountLogic->updateBalance($adjustedBalance, $_GET['account']);
    }
} else {
    echo "Something went wrong";
    echo $transaction->getError();
    echo $transactionLogic->getError();
};