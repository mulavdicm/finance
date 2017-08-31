<?php
include_once('lib/AccountLogic.php');
$q = $_GET['q'];
$accounts = new AccountLogic();
echo "<div class='row justify-content-center'></div>";
echo '<h1 class="col">' . $accounts->showBalance($q) . "</h1>";
echo "</div>";
