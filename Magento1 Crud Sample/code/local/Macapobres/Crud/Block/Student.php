<?php

class Macapobres_Crud_Block_Student extends Mage_Core_Block_Template{

    public function getStudentCollection(){
        return Mage::getModel('crud/student')->getCollection();
    }

    public function getStudent($id){
        return Mage::getModel('crud/student')->load($id);
    }
}