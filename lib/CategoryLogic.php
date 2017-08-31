<?php
include_once ('Database.php');
include_once ('Category.php');

/**
 * Created by IntelliJ IDEA.
 * User: gandalf
 * Date: 8/14/17
 * Time: 3:19 PM
 */
class CategoryLogic
{
    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function getCategoryList()
    {
        try {
            $db = new Database();
            $conn = $db::getConnection();
            $query = "SELECT id_category, category FROM category";
            $sth = $conn->prepare($query);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Category');
            $category = $sth->fetchAll();
            $db::closeDb();
            return $category;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
