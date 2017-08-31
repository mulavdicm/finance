<?php
include_once('lib/SubcategoryLogic.php');
$q = $_GET['q'];
$subcategoryLogic = new SubcategoryLogic();
foreach ($subcategoryLogic->getSubcategoryListBasedOnCategory($q) as $subcategory) {
    echo '<option value="'
        . $subcategory->getIdSubcategory()
        . '">'
        . $subcategory->getSubcategory()
        . "</option>";
}
