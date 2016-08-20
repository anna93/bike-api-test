# Bike CRUD API

## Project setup

clone the repo in your webroot by executing the following command

```
git clone https://github.com/anna93/bike-api-test.git wheelstreet
```

Change the following
1. in `application/config/config.php`, change `base_url`
2. in `application/config/database.php`, change database settings

import sample database from sql file provided with the repo at `database/wheelstreet.sql`


the API is ready.

## Endpoints

There is only one entity called `bike` in the project and the following Endpoints
have been exposed

```
GET wheelstreet/bike - gets all the bikes
```

---

```
GET wheelstreet/bike/id - gets a single bike
```

---

```
DELETE wheelstreet/bike/id - deletes a single bike
```

---

```
POST wheelstreet/bike - creates a new bike
```
this expects a parameter named `bike` which is a json of the following format:
```
{
    'make': 'yamaha',
    'model': 'RX 100',
    'owner_name': 'anna93'
}
```
---

```
PUT wheelstreet/bike - updates a bike
```
this expects a parameter named `bike` which is a json of the following format:
```
{
    'id': '1'
    'make': 'yamaha',
    'model': 'RX 100',
    'owner_name': 'anna93'
}
```
**please note that out of the above parameters id and atleast one out of  the rest is compulsory**, essentially an id and all the params which need to be updated

---
