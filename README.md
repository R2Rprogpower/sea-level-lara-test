Controller to process customers, shipments, and products and send shipments to postal services.

Programming GoF Patterns used:
		Factory: To create Strategies.
		Singleton: To create a single strategy per postal service.
		Strategy: To select the correct postal service.
		
To start the app:


	docker-compose up

	php artisan serve

	php artisan migrate:fresh --seed

Enpoints:

	GET /setup 
		Copy the admin token to use it for Auth by Bearer Token with POSTman.

	GET api/v1/customers
	GET api/v1/customers/{customer_id} 


	GET api/v1/shipments 
	GET api/v1/shipments/{shipment_id} 


	GET api/v1/products
	GET api/v1/products/{product_id} 


	Post api/v1/customers 
		Headers: 
			Accept => application\json 
		Body => raw => json: 
			{	
				"name": "Thompson, Blanda and McClure",
				"type": "Individual",
				"email": "wilson40@gmail.com",
				"address": "rand address",
				"city": "West Alainabury",
				"state": "Washington",
				"postalCode": "25260-0247"
			}
				
	Post api/v1/shipments 
		Headers: 
			Accept => application\json 
		Body => raw => json: 
			{	
				"senderId": 1,
				"receiverId": 27,
				"comment": "I vote the young lady tells us a story.' 'I'm afraid I've offended it again!' For the Mouse had.",
				"status": "Lost",
				"postalService": "np",
				"paymentType": "in_advance",
				"dateCreated": "2015-04-09 02:18:47",
				"dateProcessed": "2016-04-09 02:18:47"
			}
	Post api/v1/shipments/send
		Headers: 
			Accept => application\json 
		Body => raw => json: 
			{	
			    "shipmentId": "1",
			    "senderId": "1",
			    "receiverId": "2",
			    "postalService": "up"
		
			}
				
	Post api/v1/products 
		Headers: 
			Accept => application\json 
		Body => raw => json: 
			{	
				"name": "Evan Murray PhD",
				"brand": "Ralph Little",
				"price": "70566.64",
				"shipment_ids": "[654]"
			}
