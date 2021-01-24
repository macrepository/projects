<?php
namespace Macapobres\Crud\Controller\Account;

use Magento\Framework\App\Action\Context;
use Macapobres\Crud\Model\UserFactory;

class Save extends \Magento\Framework\App\Action\Action
{
	protected $user;

	public function __construct(
        Context $context,
        UserFactory $user
	)
	{
		$this->user = $user;
		parent::__construct($context);
	}

	public function execute()
	{
        $user = $this->user->create();
        $data = $this->getRequest()->getPost();
        if($data["entity_id"]){
            $user = $user->load($data["entity_id"]);
            $user->setFirstName($data["first_name"]);
            $user->setLastName($data["last_name"]);
            if($user->save()){
                $this->messageManager->addSuccess(__('User was updated successfully'));
            }else{
                $this->messageManager->addError(__('An error occured. Cannot update user'));
            }
        }else{
            $user->setFirstName($data["first_name"]);
            $user->setLastName($data["last_name"]);
            if($user->save()){
                $this->messageManager->addSuccess(__('New user was save successfully'));
            }else{
                $this->messageManager->addError(__('An error occured. Cannot save user'));
            }
        }
        return $this->_redirect('user/account/index');
	}
}
