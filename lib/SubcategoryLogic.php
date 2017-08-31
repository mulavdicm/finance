<?php
include_once 'Database.php';
include_once 'Subcategory.php';

/**
 * Created by IntelliJ IDEA.
 * User: gandalf
 * Date: 8/14/17
 * Time: 7:41 PM
 */

class SubcategoryLogic
{
    private $error;

    public function getError() {
        return $this->error;
    }

    public function getSubcategoryList()
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_subcategory, subcategory FROM subcategory";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Subcategory');
            $subcategory = $sth->fetchAll();
            $db::closeDb();
            return $subcategory;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function getSubcategoryListBasedOnCategory($category)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_subcategory, subcategory FROM subcategory INNER JOIN category ON subcategory.category_id_category = category.id_category WHERE category = :category";
            $sth = $conn->prepare($query);
            $sth->bindParam(':category',$category, PDO::PARAM_STR);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Subcategory');
            $subcategory = $sth->fetchAll();
            $db::closeDb();
            return $subcategory;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function getIdBasedOnSubcategory($subcategory)
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_subcategory FROM subcategory WHERE subcategory = :subcategory";
            $sth = $conn->prepare($query);
            $sth->bindParam(':subcategory',$subcategory, PDO::PARAM_STR);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Subcategory');
            $subcategory = $sth->fetch();
            $db::closeDb();
            return $subcategory;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
