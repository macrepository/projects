<?php
namespace Macapobres\Crud\Controller\Account;

use Magento\Framework\App\Action\Context;
use Macapobres\Crud\Model\UserFactory;

class Delete extends \Magento\Framework\App\Action\Action
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
        $id = $this->getRequest()->getParam("id");
        if($id){
            $user = $user->load($id);
            if($user->delete()){
                $this->messageManager->addSuccess(__('User was deleted successfully'));
            }else{
                $this->messageManager->addError(__('An error occured. Cannot delete user'));
            }
        }
        
        return $this->_redirect('user/account/index');
	}
}
