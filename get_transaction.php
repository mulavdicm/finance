<?php
$type = $_GET['type'];
if ($type == 'Transfer') {
    echo "Transfer";
} else if ($type == 'Income' || $type == 'Expense') {
    echo "Income/Expense";
}
