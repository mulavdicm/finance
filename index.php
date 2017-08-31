<?php
include('layout/header.php');
include_once('lib/Transaction.php');
include_once('lib/TransactionLogic.php');
include_once('lib/AccountLogic.php');
include_once('lib/CategoryLogic.php');
$accountLogic = new AccountLogic();
//var_dump($accountLogic->getError());
$categoryLogic = new CategoryLogic();
$transactionLogic = new TransactionLogic();
//var_dump($transactionLogic->selectTransactions());
//var_dump($categoryLogic->getError());
?>
    <!-- <div class="row">
        <script src="js/accountBalance.js" async></script>
        <form class="form-horizontal col">
            <div class="form-group">
                <label class="sr-only" for="selectAccountBalance">Select an account</label>
                <select class="form-control" id="selectAccountBalance"
                        name="selectAccountBalance" onchange="showBalance(this.value)">
                    <option value="">Select an account:</option>
                    <?php
                    foreach ($accountLogic->getAccountInformation() as $account) {
                        echo "<option value="
                            . $account->getIdAccount()
                            . ">"
                            . $account->getAccount()
                            . "</option>";
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <script src="js/accountBalance.js" async></script>
        <div class="col" id="balance"><h1>Balance will appear here...</></div>
        <div class="sr-only" id="transaction"><h1>Transaction</h1></div>
    </div> -->

      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Export</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Piecharts</h1>
          <section class="row text-center placeholders">
          <script src="js/piechartLoader.js" ></script>
            <div class="col-md-6 col-sm-12 placeholder">
                <div id="piechart_income"></div>
                <h4>Income</h4>
              <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-6 col-sm-12 placeholder">
                <div id="piechart_expense"></div>
                <h4>Expense</h4>
              <div class="text-muted">Something else</div>
            </div>
          </section>
          <h2>Transactions</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Content</th>
                  <th>Type</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($transactionLogic->selectTransactionsCurrentMonth() as $transaction) {
                echo "<tr>";
                echo "<td>";
                echo $transaction->getIdTransaction();
                echo "</td>";
                echo "<td>";
                echo $transaction->getDate();
                echo "</td>";
                echo "<td>";
                echo $transaction->getContents();
                echo "</td>";
                switch ($transaction->getType()) {
                  case "Income":
                    echo '<td class="bg-success">';
                    echo $transaction->getType();
                    echo "</td>";
                  break;
                  case "Expense":
                    echo '<td class="bg-danger">';
                    echo $transaction->getType();
                    echo "</td>";
                  break;
                  case "Transfer":
                    echo '<td class="bg-warning">';
                    echo $transaction->getType();
                    echo "</td>";
                  break;
                }
                echo "<td>€";
                echo $transaction->getAmount();
                echo "</td>";
                echo "</tr>";
              }
              ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
<?php include('layout/footer.php'); ?>