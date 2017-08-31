<?php
include('layout/header.php');
include_once('lib/AccountLogic.php');
include_once('lib/CategoryLogic.php');

$accountLogic = new AccountLogic();
$categoryLogic = new CategoryLogic();
?>
    <div class="row justify-content-center">
        <h1 class="col">Insert Transaction</h1>
    </div>

    <script src="js/insertTransaction.js" async></script>
    <form name="insertTransaction" class="form-horizontal" action="" method="post"
          onsubmit="sendDataTransaction()">

        <div class="form-group">
            <script src="js/transactionBasedOnType.js" async></script>
            <label class="sr-only" for="type" class="control-label">Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="">Select type</option>
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                    <option value="Transfer">Transfer</option>
                </select>
        </div>

        <div class="form-group">
            <label class="sr-only" for="date" class="control-label">Date</label>
            <input type="datetime-local" class="form-control" id="date" name="date"
                   required placeholder="Date">
        </div>

        <div id="transaction_type"></div>
        
        <div class="form-group">
            <label class="sr-only" for="account_from">From</label>
            <select class="form-control" id="account_from">
                <option value="">From</option>
                <?php foreach ($accountLogic->getAccountInformation() as $account) {
                    echo "
                    <option value="
                        . $account->getIdAccount()
                        . ">"
                        . $account->getAccount()
                        . "
                    </option>
                    ";
                }
                ?>
            </select>
       </div>
       
       <div class="form-group">
            <label class="sr-only" for="account_to">To</label>
            <select class="form-control" id="account_to">
                <option value="">To</option>
                <?php foreach ($accountLogic->getAccountInformation() as $account) {
                    echo "
                    <option value="
                        . $account->getIdAccount()
                        . ">"
                        . $account->getAccount()
                        . "
                    </option>
                    ";
                }
                ?>
            </select>
       </div>

        <div class="form-group">
            <label class="sr-only" for="account">Select an account</label>
            <select class="form-control" id="account">
                <option value="">Select an account:</option>
                <?php foreach ($accountLogic->getAccountInformation() as $account) {
                    echo "
                    <option value="
                        . $account->getIdAccount()
                        . ">"
                        . $account->getAccount()
                        . "
                    </option>
                    ";
                } 
                ?>
            </select>
        </div>
       
       <div class="form-group">
            <script src="js/subcategoryBasedOnCategory.js" async></script>
            <select class="form-control" id="category" name="category" onchange="filterSubcategory(this.value)">
                <option value="">Category</option>
                <?php foreach ($categoryLogic->getCategoryList() as $category) {
                    echo "<option value="
                        . $category->getCategory()
                        . ">"
                        . $category->getCategory()
                        . "</option>";
                }
                ?>
            </select>
        </div>
   
        <div class="form-group">
           <select class="form-control" id="subcategory" name="subcategory">
           <option value="">Subcategory</option>
           <div id="subcategory"></div>
           </select>
       </div>

        <div class="form-group">
            <label class="sr-only" for="contents" class="control-label">Contents</label>
            <textarea class="form-control" id="contents" name="contents" row="3"
                      required placeholder="Contents"></textarea>
        </div>

        <div class="form-group">
            <label class="sr-only" for="amount" class="control-label">Amount</label>
            <input type="number" min="0" step="any" class="form-control" id="amount"
                   name="amount" required placeholder="Amount">
        </div>

        <div class="form-group">
            <label class="sr-only" for="currency" class="control-label">Currency</label>
            <input type="text" class="form-control" id="currency"
                   name="currency" required placeholder="Currency">
        </div>

        <div class="form-group">
            <button id="submitTransactionButton" type="submit" class="btn btn-default"
                    name="submitTransactionButton"
                    value="Submit">Submit
            </button>
        </div>
    </form>

<?php include('layout/footer.php'); ?>