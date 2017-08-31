<?php
include_once ('lib/ChartLogic.php');

$chartLogic = new ChartLogic();

$chartData = $chartLogic->showCategoryAndAmountPerTransactionCurrentMonthIncome();

$arrayData = array (
    "cols" => array (
        "0" => array (
        "id" => "",
        "label" => "Category",
        "pattern" => "",
        "type" => "string"
        ),
        "1" => array (
            "id" => "",
            "label" => "Amount",
            "pattern" => "",
            "type" => "number"
            )
    )
);

$arrayData["rows"] = array();

foreach ($chartData as $chart) {
    array_push($arrayData["rows"], array(
        "c" => array (
            "0" => array (
                "v" => $chart->getCategory(),
                "f" => null
            ),
            "1" => array (
                "v" => $chart->getAmount(),
                "f" => null
            )
        )
    ));
}

echo json_encode($arrayData);
?>