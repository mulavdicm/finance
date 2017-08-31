<?php
/**
 * Created by IntelliJ IDEA.
 * User: gandalf
 * Date: 8/14/17
 * Time: 3:17 PM
 */

class Category
{
    private $id_category;
    private $category;

    /**
     * @return mixed
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @param mixed $id_category
     */
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
}
