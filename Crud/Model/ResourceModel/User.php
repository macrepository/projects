<?php
namespace Macapobres\Crud\Model\ResourceModel;


class User extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	protected function _construct()
	{
		$this->_init('macapobres_user', 'entity_id');
	}
	
}
