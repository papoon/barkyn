# Barkyn Code Challenge

## Required
* Docker

## Instructions

* Clone repo
* Rename .env.example to .env


## Usage
### Docker

```bash
docker-compose up
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
```
#### Get a subscription associated to a customer

```bash
GET v1/subscription/customer/1
```

#### Update the customer name

```bash
PUT /v1/customer/1
```

#### Delete a pet from a subscription

```bash
DELETE v1/subscription/1/pet/2
```