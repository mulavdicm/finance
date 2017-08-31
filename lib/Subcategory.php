<?php
/**
 * Created by IntelliJ IDEA.
 * User: gandalf
 * Date: 8/14/17
 * Time: 7:40 PM
 */

class Subcategory
{
    private $id_subcategory;
    private $subcategory;

    /**
     * @return mixed
     */
    public function getIdSubcategory()
    {
        return $this->id_subcategory;
    }

    /**
     * @param mixed $id_subcategory
     */
    public function setIdSubcategory($id_subcategory)
    {
        $this->id_subcategory = $id_subcategory;
    }

    /**
     * @return mixed
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * @param mixed $subcategory
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }


}