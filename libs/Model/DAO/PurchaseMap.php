<?php
/** @package    D025c936::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PurchaseMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PurchaseDAO to the purchase datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package D025c936::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PurchaseMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","purchase","p_id",true,FM_TYPE_INT,11,null,true);
			self::$FM["StatusCodeId"] = new FieldMap("StatusCodeId","purchase","p_status_code_id",false,FM_TYPE_VARCHAR,3,null,false);
			self::$FM["Quantity"] = new FieldMap("Quantity","purchase","p_quantity",false,FM_TYPE_INT,11,"1",false);
			self::$FM["Description"] = new FieldMap("Description","purchase","p_description",false,FM_TYPE_VARCHAR,45,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["p_status_code"] = new KeyMap("p_status_code", "StatusCodeId", "StatusCode", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>