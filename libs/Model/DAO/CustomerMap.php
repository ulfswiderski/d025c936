<?php
/** @package    D025c936::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CustomerMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CustomerDAO to the customer datastore.
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
class CustomerMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","customer","c_id",true,FM_TYPE_INT,10,null,true);
			self::$FM["Name"] = new FieldMap("Name","customer","c_name",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["LastLogin"] = new FieldMap("LastLogin","customer","c_last_login",false,FM_TYPE_TIMESTAMP,null,null,false);
			self::$FM["Company"] = new FieldMap("Company","customer","c_company",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["City"] = new FieldMap("City","customer","c_city",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Level"] = new FieldMap("Level","customer","c_level",false,FM_TYPE_ENUM,array("Standard","Premium"),"Standard",false);
			self::$FM["Error"] = new FieldMap("Error","customer","c_error",false,FM_TYPE_UNKNOWN,5,null,false);
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
			self::$KM["p_customer"] = new KeyMap("p_customer", "Id", "Package", "CustomerId", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>