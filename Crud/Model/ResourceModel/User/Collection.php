<?php
namespace Macapobres\Crud\Model\ResourceModel\User;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Macapobres\Crud\Model\User', 'Macapobres\Crud\Model\ResourceModel\User');
	}

}

