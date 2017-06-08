/**
 * backbone model definitions for D025C936
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Customer Backbone Model
 */
model.CustomerModel = Backbone.Model.extend({
	urlRoot: 'api/customer',
	idAttribute: 'id',
	id: '',
	name: '',
	lastLogin: '',
	company: '',
	city: '',
	level: '',
	error: '',
	defaults: {
		'id': null,
		'name': '',
		'lastLogin': '',
		'company': '',
		'city': '',
		'level': '',
		'error': ''
	}
});

/**
 * Customer Backbone Collection
 */
model.CustomerCollection = model.AbstractCollection.extend({
	url: 'api/customers',
	model: model.CustomerModel
});

/**
 * CustomerView Backbone Model
 */
model.CustomerViewModel = Backbone.Model.extend({
	urlRoot: 'api/customerview',
	idAttribute: 'id',
	id: '',
	name: '',
	lastLogin: '',
	company: '',
	city: '',
	level: '',
	error: '',
	defaults: {
		'id': null,
		'name': '',
		'lastLogin': '',
		'company': '',
		'city': '',
		'level': '',
		'error': ''
	}
});

/**
 * CustomerView Backbone Collection
 */
model.CustomerViewCollection = model.AbstractCollection.extend({
	url: 'api/customerviews',
	model: model.CustomerViewModel
});

/**
 * Order Backbone Model
 */
model.OrderModel = Backbone.Model.extend({
	urlRoot: 'api/order',
	idAttribute: 'id',
	id: '',
	orderType: '',
	customerSalutation: '',
	customerTitle: '',
	firstName: '',
	lastName: '',
	compoundName: '',
	addressType: '',
	streetName: '',
	streetNumber: '',
	addressExtra: '',
	zip: '',
	town: '',
	pobox: '',
	poboxNew: '',
	serviceType: '',
	paymentType: '',
	addressTypeNew: '',
	streetNameNew: '',
	streetNumberNew: '',
	addressExtraNew: '',
	zipNew: '',
	townNew: '',
	countryNew: '',
	email: '',
	tel: '',
	serviceReason: '',
	serviceStart: '',
	serviceEnd: '',
	serviceDuration: '',
	representativeSalutation: '',
	representativeFirstName: '',
	representativeLastName: '',
	firstName1: '',
	lastName1: '',
	firstName2: '',
	lastName2: '',
	firstName3: '',
	lastName3: '',
	firstName4: '',
	lastName4: '',
	firstName5: '',
	lastName5: '',
	company: '',
	company2: '',
	infopostage: '',
	packages: '',
	movingOffer: '',
	userIp: '',
	userIpCc: '',
	userIpCity: '',
	userIpZip: '',
	userIpLat: '',
	userIpLong: '',
	userIpOrg: '',
	totalPrice: '',
	priceSchema: '',
	keyword: '',
	browser: '',
	device: '',
	flow: '',
	customerSignature: '',
	orderId: '',
	saferpayId: '',
	state: '',
	saleskingClientId: '',
	saleskingClientNo: '',
	saleskingInvoiceNo: '',
	saleskingInvoiceId: '',
	frozen: '',
	privacyLock: '',
	collectionId: '',
	lastReminderDate: '',
	lastPaymentDate: '',
	escalated: '',
	settled: '',
	partner: '',
	partnerSubId: '',
	exitMailSale: '',
	revocationExpire: '',
	sortCode: '',
	accountNo: '',
	iban: '',
	bic: '',
	accountOwner: '',
	created: '',
	defaults: {
		'id': null,
		'orderType': '',
		'customerSalutation': '',
		'customerTitle': '',
		'firstName': '',
		'lastName': '',
		'compoundName': '',
		'addressType': '',
		'streetName': '',
		'streetNumber': '',
		'addressExtra': '',
		'zip': '',
		'town': '',
		'pobox': '',
		'poboxNew': '',
		'serviceType': '',
		'paymentType': '',
		'addressTypeNew': '',
		'streetNameNew': '',
		'streetNumberNew': '',
		'addressExtraNew': '',
		'zipNew': '',
		'townNew': '',
		'countryNew': '',
		'email': '',
		'tel': '',
		'serviceReason': '',
		'serviceStart': new Date(),
		'serviceEnd': new Date(),
		'serviceDuration': '',
		'representativeSalutation': '',
		'representativeFirstName': '',
		'representativeLastName': '',
		'firstName1': '',
		'lastName1': '',
		'firstName2': '',
		'lastName2': '',
		'firstName3': '',
		'lastName3': '',
		'firstName4': '',
		'lastName4': '',
		'firstName5': '',
		'lastName5': '',
		'company': '',
		'company2': '',
		'infopostage': '',
		'packages': '',
		'movingOffer': '',
		'userIp': '',
		'userIpCc': '',
		'userIpCity': '',
		'userIpZip': '',
		'userIpLat': '',
		'userIpLong': '',
		'userIpOrg': '',
		'totalPrice': '',
		'priceSchema': '',
		'keyword': '',
		'browser': '',
		'device': '',
		'flow': '',
		'customerSignature': '',
		'orderId': '',
		'saferpayId': '',
		'state': '',
		'saleskingClientId': '',
		'saleskingClientNo': '',
		'saleskingInvoiceNo': '',
		'saleskingInvoiceId': '',
		'frozen': '',
		'privacyLock': '',
		'collectionId': '',
		'lastReminderDate': new Date(),
		'lastPaymentDate': new Date(),
		'escalated': '',
		'settled': '',
		'partner': '',
		'partnerSubId': '',
		'exitMailSale': '',
		'revocationExpire': '',
		'sortCode': '',
		'accountNo': '',
		'iban': '',
		'bic': '',
		'accountOwner': '',
		'created': new Date()
	}
});

/**
 * Order Backbone Collection
 */
model.OrderCollection = model.AbstractCollection.extend({
	url: 'api/orders',
	model: model.OrderModel
});

/**
 * OrderClaims Backbone Model
 */
model.OrderClaimsModel = Backbone.Model.extend({
	urlRoot: 'api/orderclaims',
	idAttribute: 'id',
	id: '',
	orderId: '',
	saleskingId: '',
	saleskingNo: '',
	type: '',
	silent: '',
	amount: '',
	createdAt: '',
	updatedAt: '',
	defaults: {
		'id': null,
		'orderId': '',
		'saleskingId': '',
		'saleskingNo': '',
		'type': '',
		'silent': '',
		'amount': '',
		'createdAt': new Date(),
		'updatedAt': new Date()
	}
});

/**
 * OrderClaims Backbone Collection
 */
model.OrderClaimsCollection = model.AbstractCollection.extend({
	url: 'api/orderclaimses',
	model: model.OrderClaimsModel
});

/**
 * OrderMatches Backbone Model
 */
model.OrderMatchesModel = Backbone.Model.extend({
	urlRoot: 'api/ordermatches',
	idAttribute: 'id',
	id: '',
	orderId: '',
	amount: '',
	paymentStatus: '',
	defaults: {
		'id': null,
		'orderId': '',
		'amount': '',
		'paymentStatus': ''
	}
});

/**
 * OrderMatches Backbone Collection
 */
model.OrderMatchesCollection = model.AbstractCollection.extend({
	url: 'api/ordermatcheses',
	model: model.OrderMatchesModel
});

/**
 * OrderPayments Backbone Model
 */
model.OrderPaymentsModel = Backbone.Model.extend({
	urlRoot: 'api/orderpayments',
	idAttribute: 'id',
	id: '',
	orderId: '',
	type: '',
	amount: '',
	collectiveBookingAmount: '',
	bankRef: '',
	accountOwner: '',
	accountNo: '',
	sortCode: '',
	refAccountNo: '',
	refSortCode: '',
	createdAt: '',
	updatedAt: '',
	defaults: {
		'id': null,
		'orderId': '',
		'type': '',
		'amount': '',
		'collectiveBookingAmount': '',
		'bankRef': '',
		'accountOwner': '',
		'accountNo': '',
		'sortCode': '',
		'refAccountNo': '',
		'refSortCode': '',
		'createdAt': new Date(),
		'updatedAt': new Date()
	}
});

/**
 * OrderPayments Backbone Collection
 */
model.OrderPaymentsCollection = model.AbstractCollection.extend({
	url: 'api/orderpaymentses',
	model: model.OrderPaymentsModel
});

/**
 * Orders Backbone Model
 */
model.OrdersModel = Backbone.Model.extend({
	urlRoot: 'api/orders',
	idAttribute: 'id',
	id: '',
	orderType: '',
	customerSalutation: '',
	customerTitle: '',
	firstName: '',
	lastName: '',
	compoundName: '',
	addressType: '',
	streetName: '',
	streetNumber: '',
	addressExtra: '',
	zip: '',
	town: '',
	pobox: '',
	poboxNew: '',
	serviceType: '',
	paymentType: '',
	addressTypeNew: '',
	streetNameNew: '',
	streetNumberNew: '',
	addressExtraNew: '',
	zipNew: '',
	townNew: '',
	countryNew: '',
	email: '',
	tel: '',
	serviceReason: '',
	serviceStart: '',
	serviceEnd: '',
	serviceDuration: '',
	representativeSalutation: '',
	representativeFirstName: '',
	representativeLastName: '',
	firstName1: '',
	lastName1: '',
	firstName2: '',
	lastName2: '',
	firstName3: '',
	lastName3: '',
	firstName4: '',
	lastName4: '',
	firstName5: '',
	lastName5: '',
	company: '',
	company2: '',
	infopostage: '',
	packages: '',
	movingOffer: '',
	userIp: '',
	userIpCc: '',
	userIpCity: '',
	userIpZip: '',
	userIpLat: '',
	userIpLong: '',
	userIpOrg: '',
	totalPrice: '',
	priceSchema: '',
	keyword: '',
	browser: '',
	device: '',
	flow: '',
	customerSignature: '',
	orderId: '',
	saferpayId: '',
	state: '',
	saleskingClientId: '',
	saleskingClientNo: '',
	saleskingInvoiceNo: '',
	saleskingInvoiceId: '',
	frozen: '',
	privacyLock: '',
	collectionId: '',
	lastReminderDate: '',
	lastPaymentDate: '',
	escalated: '',
	settled: '',
	partner: '',
	partnerSubId: '',
	billing: '',
	transactionalEmails: '',
	exitMailSale: '',
	revocationExpire: '',
	sortCode: '',
	accountNo: '',
	iban: '',
	bic: '',
	accountOwner: '',
	createdAt: '',
	updatedAt: '',
	defaults: {
		'id': null,
		'orderType': '',
		'customerSalutation': '',
		'customerTitle': '',
		'firstName': '',
		'lastName': '',
		'compoundName': '',
		'addressType': '',
		'streetName': '',
		'streetNumber': '',
		'addressExtra': '',
		'zip': '',
		'town': '',
		'pobox': '',
		'poboxNew': '',
		'serviceType': '',
		'paymentType': '',
		'addressTypeNew': '',
		'streetNameNew': '',
		'streetNumberNew': '',
		'addressExtraNew': '',
		'zipNew': '',
		'townNew': '',
		'countryNew': '',
		'email': '',
		'tel': '',
		'serviceReason': '',
		'serviceStart': new Date(),
		'serviceEnd': new Date(),
		'serviceDuration': '',
		'representativeSalutation': '',
		'representativeFirstName': '',
		'representativeLastName': '',
		'firstName1': '',
		'lastName1': '',
		'firstName2': '',
		'lastName2': '',
		'firstName3': '',
		'lastName3': '',
		'firstName4': '',
		'lastName4': '',
		'firstName5': '',
		'lastName5': '',
		'company': '',
		'company2': '',
		'infopostage': '',
		'packages': '',
		'movingOffer': '',
		'userIp': '',
		'userIpCc': '',
		'userIpCity': '',
		'userIpZip': '',
		'userIpLat': '',
		'userIpLong': '',
		'userIpOrg': '',
		'totalPrice': '',
		'priceSchema': '',
		'keyword': '',
		'browser': '',
		'device': '',
		'flow': '',
		'customerSignature': '',
		'orderId': '',
		'saferpayId': '',
		'state': '',
		'saleskingClientId': '',
		'saleskingClientNo': '',
		'saleskingInvoiceNo': '',
		'saleskingInvoiceId': '',
		'frozen': '',
		'privacyLock': '',
		'collectionId': '',
		'lastReminderDate': new Date(),
		'lastPaymentDate': new Date(),
		'escalated': '',
		'settled': '',
		'partner': '',
		'partnerSubId': '',
		'billing': '',
		'transactionalEmails': '',
		'exitMailSale': '',
		'revocationExpire': '',
		'sortCode': '',
		'accountNo': '',
		'iban': '',
		'bic': '',
		'accountOwner': '',
		'createdAt': new Date(),
		'updatedAt': new Date()
	}
});

/**
 * Orders Backbone Collection
 */
model.OrdersCollection = model.AbstractCollection.extend({
	url: 'api/orderses',
	model: model.OrdersModel
});

/**
 * Package Backbone Model
 */
model.PackageModel = Backbone.Model.extend({
	urlRoot: 'api/package',
	idAttribute: 'id',
	id: '',
	shipDate: '',
	shipTime: '',
	customerId: '',
	trackingNumber: '',
	description: '',
	service: '',
	destination: '',
	defaults: {
		'id': null,
		'shipDate': new Date(),
		'shipTime': new Date(),
		'customerId': '',
		'trackingNumber': '',
		'description': '',
		'service': '',
		'destination': ''
	}
});

/**
 * Package Backbone Collection
 */
model.PackageCollection = model.AbstractCollection.extend({
	url: 'api/packages',
	model: model.PackageModel
});

/**
 * Purchase Backbone Model
 */
model.PurchaseModel = Backbone.Model.extend({
	urlRoot: 'api/purchase',
	idAttribute: 'id',
	id: '',
	statusCodeId: '',
	quantity: '',
	description: '',
	defaults: {
		'id': null,
		'statusCodeId': '',
		'quantity': '',
		'description': ''
	}
});

/**
 * Purchase Backbone Collection
 */
model.PurchaseCollection = model.AbstractCollection.extend({
	url: 'api/purchases',
	model: model.PurchaseModel
});

/**
 * Service Backbone Model
 */
model.ServiceModel = Backbone.Model.extend({
	urlRoot: 'api/service',
	idAttribute: 'id',
	id: '',
	name: '',
	defaults: {
		'id': null,
		'name': ''
	}
});

/**
 * Service Backbone Collection
 */
model.ServiceCollection = model.AbstractCollection.extend({
	url: 'api/services',
	model: model.ServiceModel
});

/**
 * StatusCode Backbone Model
 */
model.StatusCodeModel = Backbone.Model.extend({
	urlRoot: 'api/statuscode',
	idAttribute: 'id',
	id: '',
	name: '',
	defaults: {
		'id': null,
		'name': ''
	}
});

/**
 * StatusCode Backbone Collection
 */
model.StatusCodeCollection = model.AbstractCollection.extend({
	url: 'api/statuscodes',
	model: model.StatusCodeModel
});

