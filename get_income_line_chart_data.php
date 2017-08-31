<?php
include_once ('lib/ChartLogic.php');

$chartLogic = new ChartLogic();

$chartDataDateAmount = $chartLogic->showDateAndAmountPerTransactionCurrentMonthIncome();

$table["cols"] = 
    array (
        array (
            "id" => "",
            "label" => "Day",
            "pattern" => "",
            "type" => "datetime"
        ),
        array (
            "id" => "",
            "label" => "Income",
            "pattern" => "",
            "type" => "number"
        ),
    )
;

$rows = array();

foreach ($chartDataDateAmount as $chartDateAmount) {
    $temp = array();
    $temp[] = array(
        'v' => "Date(".$chartDateAmount->getDate().")",
        'f' => null
    ); 
    $temp[] = array(
        'v' => $chartDateAmount->getAmount(),
        'f' => $chartDateAmount->getFormat()
    );

    $rows[] = array(
        'c' => $temp
    );
}

$table["rows"] = $rows;

echo json_encode($table);
?>