# Barkyn Code Challenge

## Required
* Docker

## Instructions

* Clone repo
* Rename .env.example to .env


## Usage
### Docker

```bash
docker build .
docker run barkyn_api
docker-compose up
```

### Dependencies

```bash
composer install
```
### Migrations

```bash
php libs/vendor/bin/phinx status --configuration db/phinx.php
php libs/vendor/bin/phinx migrate --configuration db/phinx.php
php libs/vendor/bin/phinx seed:run --configuration db/phinx.php
```
### API

#### Get all customer

```bash
GET /v1/customer
curl --request GET --url {url}/v1/customer --header 'content-type: application/json' 
```
#### Get a subscription associated to a customer

```bash
GET /v1/subscription/customer/1
curl --request GET --url {url}/v1/subscription/customer/1 --header 'content-type: application/json' 
```

#### Update the customer name

```bash
PUT /v1/customer/1
curl --request PUT --url {url}/v1/customer/1 --header 'content-type: application/json' --data '{"columnsValues":{"name":"Barkyn"}}'
```

#### Delete a pet from a subscription

```bash
DELETE /v1/subscription/1/pet/2
curl --request DELETE --url {url}/v1/subscription/1/pet/2 --header 'content-type: application/json' 
```