<?php
namespace Macapobres\Crud\Model;
class User extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'macapobres_user';

	protected $_cacheTag = 'macapobres_user';

	protected $_eventPrefix = 'macapobres_user';

	protected function _construct()
	{
		$this->_init('Macapobres\Crud\Model\ResourceModel\User');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
