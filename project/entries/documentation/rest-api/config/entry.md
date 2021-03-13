---
title: Config
template: docs 
breadcrumbs:
  1:
    title: "Rest API"
    link: "[url]/documentation/rest-api/"
on_this_page:
  0:
    title: "Endpoints"
    link: "endpoints"
  1:
    title: "Fetch config item"
    link: "fetch-config-item"
  4:
    title: "Create config item"
    link: "create-config-item"
  5:
    title: "Update config item"
    link: "update-config-item"
  8:
    title: "Delete config item"
    link: "delete-config-item"
---

The Flextype Config API organized around Representational State Transfer (REST) for delivering data from Flextype config to apps, websites and other. Config is delivered as JSON data.

#### <a name="endpoints"></a> Endpoints

| Method | Endpoint | Description |
| --- | --- | --- |
| GET | /api/config | Fetch config items |
| POST | /api/config | Create new item in the config |
| PATCH | /api/config | Update config item |
| DELETE | /api/config | Delete config item |

### <a name="fetch-config-item"></a> Fetch config item

<div class="file-header">Request</div>
```http
GET /api/config?config=YOUR_CONFIG&key=YOUR_CONFIG_ITEM_ID&token=YOUR_CONFIG_TOKEN
```

##### Query

| name | |  Description |
| --- | --- | --- |
| config | REQUIRED | Unique identifier of the config namespace. |
| key | REQUIRED | Unique identifier of the config item. |
| token | REQUIRED | Valid Content Delivery API token for Config. |

##### Result

An array of config item objects.

##### Examples

Fetch Flextype Version from Flextype Config

<div class="file-header">Request</div>
```http
GET /api/config?config=flextype&id=timezone&token=efe1e36e4d60fcd547e22eb9f795dff9
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>
```json
{
    "data": {
        "key": "timezone",
        "value": "UTC"
    }
}
```


### <a name="create-config-item"></a> Create new item in the config

<div class="file-header">Request</div>
```http
POST /api/config
```

##### Body

| Name | |  Description |
| --- | --- | --- |
| config | REQUIRED | Unique identifier of the config namespace. |
| token | REQUIRED | Valid Config Token. |
| access_token | REQUIRED | Valid Access token. |
| data | REQUIRED | Data to store for the config. |

##### Result
Returns the config item object for the config item that was just created.

##### Examples

Create new config item **slogan**

<div class="file-header">Request</div>
```http
POST /api/config
```

<div class="file-header">Body</div>
```json
{
	"config": "flextype",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018",
	"data": {
		"key": "slogan",
		"value": "The freedom of a headless CMS with the full functionality of a traditional CMS."
	}
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>
```json
{
    "data": {
        "key": "slogan",
        "value": "The freedom of a headless CMS with the full functionality of a traditional CMS."
    }
}
```

### <a name="update-config-item"></a> Update config item

<div class="file-header">Request</div>
```http
PATCH /api/config
```

##### Body

| Name | |  Description |
| --- | --- | --- |
| config | REQUIRED | Unique identifier of the config namespace. |
| token | REQUIRED | Valid Config Token. |
| access_token | REQUIRED | Valid Access token. |
| data | REQUIRED | Data to store for the config. |

##### Result
Returns the config item object for the config item that was just created.

##### Examples

Update content for entry **slogan**

<div class="file-header">Request</div>
```http
PATCH /api/config
```

<div class="file-header">Body</div>
```json
{
	"config": "flextype",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018",
    "data": {
        "key": "slogan",
        "value": "The freedom of a headless CMS with the full functionality of a traditional Content Management System."
    }
}
```

<div class="file-header flex justify-between"><div>Response</div> <div class="text-right">200 OK</div></div>
```json
{
    "data": {
        "key": "slogan",
        "value": "The freedom of a headless CMS with the full functionality of a traditional Content Management System."
    }
}
```

### <a name="delete-config-item"></a> Delete config item

<div class="file-header">Request</div>
```http
DELETE /api/config
```

##### Body

| Name | |  Description |
| --- | --- | --- |
| config | REQUIRED | Unique identifier of the config namespace. |
| data | REQUIRED | Data to store for the config. |
| token | REQUIRED | Valid Config Token. |
| access_token | REQUIRED | Valid Access token. |

##### Result
Returns an empty body with HTTP status 204

##### Examples

Delete entry **slogan** in **flextype** config

<div class="file-header">Request</div>
```http
DELETE /api/config
```

<div class="file-header">Body</div>
```json
{
	"config": "flextype",
	"token": "f3acf199a9ac120d3bfd604e1e382456",
	"access_token": "bbc4417d171e38099bd129aeca279018",
    "data": {
        "key": "slogan"
    }
}
```
