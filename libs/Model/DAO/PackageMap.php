<?php
/** @package    D025c936::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PackageMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PackageDAO to the package datastore.
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
class PackageMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","package","p_id",true,FM_TYPE_INT,10,null,true);
			self::$FM["ShipDate"] = new FieldMap("ShipDate","package","p_ship_date",false,FM_TYPE_DATE,null,null,false);
			self::$FM["ShipTime"] = new FieldMap("ShipTime","package","p_ship_time",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["CustomerId"] = new FieldMap("CustomerId","package","p_customer_id",false,FM_TYPE_INT,10,null,false);
			self::$FM["TrackingNumber"] = new FieldMap("TrackingNumber","package","p_tracking_number",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Description"] = new FieldMap("Description","package","p_description",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Service"] = new FieldMap("Service","package","p_service",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Destination"] = new FieldMap("Destination","package","p_destination",false,FM_TYPE_VARCHAR,45,null,false);
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
			self::$KM["p_customer"] = new KeyMap("p_customer", "CustomerId", "Customer", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["p_service_code"] = new KeyMap("p_service_code", "Service", "Service", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>