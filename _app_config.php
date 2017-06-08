<?php
/**
 * @package D025C936
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * Haters be hatin' on Smarty? You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SmartyRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SmartyRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';
GlobalConfig::$TEMPLATE_CACHE_PATH = GlobalConfig::$APP_ROOT . '/templates_c/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),

	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Customer
	'GET:customers' => array('route' => 'Customer.ListView'),
	'GET:customer/(:num)' => array('route' => 'Customer.SingleView', 'params' => array('id' => 1)),
	'GET:api/customers' => array('route' => 'Customer.Query'),
	'POST:api/customer' => array('route' => 'Customer.Create'),
	'GET:api/customer/(:num)' => array('route' => 'Customer.Read', 'params' => array('id' => 2)),
	'PUT:api/customer/(:num)' => array('route' => 'Customer.Update', 'params' => array('id' => 2)),
	'DELETE:api/customer/(:num)' => array('route' => 'Customer.Delete', 'params' => array('id' => 2)),
		
	// CustomerView
	'GET:customerviews' => array('route' => 'CustomerView.ListView'),
	'GET:customerview/(:any)' => array('route' => 'CustomerView.SingleView', 'params' => array('id' => 1)),
	'GET:api/customerviews' => array('route' => 'CustomerView.Query'),
	'POST:api/customerview' => array('route' => 'CustomerView.Create'),
	'GET:api/customerview/(:any)' => array('route' => 'CustomerView.Read', 'params' => array('id' => 2)),
	'PUT:api/customerview/(:any)' => array('route' => 'CustomerView.Update', 'params' => array('id' => 2)),
	'DELETE:api/customerview/(:any)' => array('route' => 'CustomerView.Delete', 'params' => array('id' => 2)),
		
	// Order
	'GET:orders' => array('route' => 'Order.ListView'),
	'GET:order/(:num)' => array('route' => 'Order.SingleView', 'params' => array('id' => 1)),
	'GET:api/orders' => array('route' => 'Order.Query'),
	'POST:api/order' => array('route' => 'Order.Create'),
	'GET:api/order/(:num)' => array('route' => 'Order.Read', 'params' => array('id' => 2)),
	'PUT:api/order/(:num)' => array('route' => 'Order.Update', 'params' => array('id' => 2)),
	'DELETE:api/order/(:num)' => array('route' => 'Order.Delete', 'params' => array('id' => 2)),
		
	// OrderClaims
	'GET:orderclaimses' => array('route' => 'OrderClaims.ListView'),
	'GET:orderclaims/(:num)' => array('route' => 'OrderClaims.SingleView', 'params' => array('id' => 1)),
	'GET:api/orderclaimses' => array('route' => 'OrderClaims.Query'),
	'POST:api/orderclaims' => array('route' => 'OrderClaims.Create'),
	'GET:api/orderclaims/(:num)' => array('route' => 'OrderClaims.Read', 'params' => array('id' => 2)),
	'PUT:api/orderclaims/(:num)' => array('route' => 'OrderClaims.Update', 'params' => array('id' => 2)),
	'DELETE:api/orderclaims/(:num)' => array('route' => 'OrderClaims.Delete', 'params' => array('id' => 2)),
		
	// OrderMatches
	'GET:ordermatcheses' => array('route' => 'OrderMatches.ListView'),
	'GET:ordermatches/(:num)' => array('route' => 'OrderMatches.SingleView', 'params' => array('id' => 1)),
	'GET:api/ordermatcheses' => array('route' => 'OrderMatches.Query'),
	'POST:api/ordermatches' => array('route' => 'OrderMatches.Create'),
	'GET:api/ordermatches/(:num)' => array('route' => 'OrderMatches.Read', 'params' => array('id' => 2)),
	'PUT:api/ordermatches/(:num)' => array('route' => 'OrderMatches.Update', 'params' => array('id' => 2)),
	'DELETE:api/ordermatches/(:num)' => array('route' => 'OrderMatches.Delete', 'params' => array('id' => 2)),
		
	// OrderPayments
	'GET:orderpaymentses' => array('route' => 'OrderPayments.ListView'),
	'GET:orderpayments/(:num)' => array('route' => 'OrderPayments.SingleView', 'params' => array('id' => 1)),
	'GET:api/orderpaymentses' => array('route' => 'OrderPayments.Query'),
	'POST:api/orderpayments' => array('route' => 'OrderPayments.Create'),
	'GET:api/orderpayments/(:num)' => array('route' => 'OrderPayments.Read', 'params' => array('id' => 2)),
	'PUT:api/orderpayments/(:num)' => array('route' => 'OrderPayments.Update', 'params' => array('id' => 2)),
	'DELETE:api/orderpayments/(:num)' => array('route' => 'OrderPayments.Delete', 'params' => array('id' => 2)),
		
	// Orders
	'GET:orderses' => array('route' => 'Orders.ListView'),
	'GET:orders/(:num)' => array('route' => 'Orders.SingleView', 'params' => array('id' => 1)),
	'GET:api/orderses' => array('route' => 'Orders.Query'),
	'POST:api/orders' => array('route' => 'Orders.Create'),
	'GET:api/orders/(:num)' => array('route' => 'Orders.Read', 'params' => array('id' => 2)),
	'PUT:api/orders/(:num)' => array('route' => 'Orders.Update', 'params' => array('id' => 2)),
	'DELETE:api/orders/(:num)' => array('route' => 'Orders.Delete', 'params' => array('id' => 2)),
		
	// Package
	'GET:packages' => array('route' => 'Package.ListView'),
	'GET:package/(:num)' => array('route' => 'Package.SingleView', 'params' => array('id' => 1)),
	'GET:api/packages' => array('route' => 'Package.Query'),
	'POST:api/package' => array('route' => 'Package.Create'),
	'GET:api/package/(:num)' => array('route' => 'Package.Read', 'params' => array('id' => 2)),
	'PUT:api/package/(:num)' => array('route' => 'Package.Update', 'params' => array('id' => 2)),
	'DELETE:api/package/(:num)' => array('route' => 'Package.Delete', 'params' => array('id' => 2)),
		
	// Purchase
	'GET:purchases' => array('route' => 'Purchase.ListView'),
	'GET:purchase/(:num)' => array('route' => 'Purchase.SingleView', 'params' => array('id' => 1)),
	'GET:api/purchases' => array('route' => 'Purchase.Query'),
	'POST:api/purchase' => array('route' => 'Purchase.Create'),
	'GET:api/purchase/(:num)' => array('route' => 'Purchase.Read', 'params' => array('id' => 2)),
	'PUT:api/purchase/(:num)' => array('route' => 'Purchase.Update', 'params' => array('id' => 2)),
	'DELETE:api/purchase/(:num)' => array('route' => 'Purchase.Delete', 'params' => array('id' => 2)),
		
	// Service
	'GET:services' => array('route' => 'Service.ListView'),
	'GET:service/(:any)' => array('route' => 'Service.SingleView', 'params' => array('id' => 1)),
	'GET:api/services' => array('route' => 'Service.Query'),
	'POST:api/service' => array('route' => 'Service.Create'),
	'GET:api/service/(:any)' => array('route' => 'Service.Read', 'params' => array('id' => 2)),
	'PUT:api/service/(:any)' => array('route' => 'Service.Update', 'params' => array('id' => 2)),
	'DELETE:api/service/(:any)' => array('route' => 'Service.Delete', 'params' => array('id' => 2)),
		
	// StatusCode
	'GET:statuscodes' => array('route' => 'StatusCode.ListView'),
	'GET:statuscode/(:any)' => array('route' => 'StatusCode.SingleView', 'params' => array('id' => 1)),
	'GET:api/statuscodes' => array('route' => 'StatusCode.Query'),
	'POST:api/statuscode' => array('route' => 'StatusCode.Create'),
	'GET:api/statuscode/(:any)' => array('route' => 'StatusCode.Read', 'params' => array('id' => 2)),
	'PUT:api/statuscode/(:any)' => array('route' => 'StatusCode.Update', 'params' => array('id' => 2)),
	'DELETE:api/statuscode/(:any)' => array('route' => 'StatusCode.Delete', 'params' => array('id' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("OrderPayments","order_payments_fk",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Package","p_customer",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Package","p_service_code",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Purchase","p_status_code",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>