<?php
/** @package D025c936::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("StatusCodeMap.php");

/**
 * StatusCodeDAO provides object-oriented access to the status_code table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package D025c936::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class StatusCodeDAO extends Phreezable
{
	/** @var string */
	public $Id;

	/** @var string */
	public $Name;


	/**
	 * Returns a dataset of Purchase objects with matching StatusCodeId
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetPurchases($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "p_status_code", $criteria);
	}


}
?>