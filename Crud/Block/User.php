<?php
namespace Macapobres\Crud\Block;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Data\Form\FormKey;
use Macapobres\Crud\Model\UserFactory;

class User extends \Magento\Framework\View\Element\Template
{
    protected $formKey;
    protected $user;

    public function __construct(
        Context $context, 
        FormKey $formKey,
        UserFactory $user,
        array $data = []
    )
    {
        $this->formKey = $formKey;
        $this->user = $user;
        parent::__construct($context, $data);
    }
    
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getUserSubmitUrl()
    {
        return $this->getUrl('user/account/save');
    }

    public function getAddUserUrl()
    {
        return $this->getUrl('user/account/add');
    }

    public function getIndexUserUrl()
    {
        return $this->getUrl('user/account/index');
    }

    public function getEditUserUrl()
    {
        return $this->getUrl('user/account/edit');
    }

    public function getDeleteUserUrl()
    {
        return $this->getUrl('user/account/delete');
    }

    public function getUserCollection(){
        return $this->user->create()->getCollection();
    }

    public function getEditId(){
        return $this->getRequest()->getParam('id');
    }

    public function getEditInformation(){
        $entity_id = $this->getEditId();
        if($entity_id)
            return $this->user->create()->load($entity_id);
        return null;
    }

}