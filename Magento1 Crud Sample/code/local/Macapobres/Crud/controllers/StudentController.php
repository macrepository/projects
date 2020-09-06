<?php
class Macapobres_Crud_StudentController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {   
        $this->loadLayout();     
        $this->renderLayout(); 
    }

    public function addAction(){
        $this->loadLayout();     
        $this->renderLayout(); 
    }

    public function editAction(){
        $this->loadLayout();     
        $this->renderLayout(); 
    }

    public function saveAction(){
        $id = $this->getRequest()->getParam('id'); 
        $first_name = $this->getRequest()->getParam('first_name'); 
        $last_name = $this->getRequest()->getParam('last_name');
        $gender = $this->getRequest()->getParam('gender');
        $email = $this->getRequest()->getParam('email');
        $student = Mage::getModel('crud/student');
        if($id){
            $student->load($id);
            $student->setFirstName($first_name); 
            $student->setLastName($last_name); 
            $student->setGender($gender); 
            $student->setEmail($email);
        }else{
            $student->setFirstName($first_name); 
            $student->setLastName($last_name); 
            $student->setGender($gender); 
            $student->setEmail($email); 
        }
        $student->save();
        Mage::getSingleton('core/session')->addSuccess('Student was successfully save.');
        $this->_redirect('macapobres/student/index');
    }

    public function deleteAction(){
        $id = $this->getRequest()->getParam('id');
        $student = Mage::getModel('crud/student')->load($id);
        $student->delete();
        Mage::getSingleton('core/session')->addSuccess('Student was deleted successfully.');
        $this->_redirect('macapobres/student/index');
    }
}