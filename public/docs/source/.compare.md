---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://chessclans.test/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_b8dc05d6f509d0ebfee1b9ecb497dd5d -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/mail" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/mail");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/mail`


<!-- END_b8dc05d6f509d0ebfee1b9ecb497dd5d -->

<!-- START_46cef718b6543d87392ef9d885c32074 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/mail/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/mail/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}`


<!-- END_46cef718b6543d87392ef9d885c32074 -->

<!-- START_f437131ff649585d9e9028707aff6586 -->
## Get the HTML content of the given email.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/mail/1/preview" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/mail/1/preview");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}/preview`


<!-- END_f437131ff649585d9e9028707aff6586 -->

<!-- START_e78ffa4a993bd280d8bbcfeece76333c -->
## Download the Eml content of the email.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/mail/1/download" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/mail/1/download");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/mail/{telescopeEntryId}/download`


<!-- END_e78ffa4a993bd280d8bbcfeece76333c -->

<!-- START_6d8be72a837a4251b2068584bf71a0da -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/exceptions" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/exceptions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/exceptions`


<!-- END_6d8be72a837a4251b2068584bf71a0da -->

<!-- START_28f8ee28d6619d49fbc6f1e955d34728 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/exceptions/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/exceptions/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/exceptions/{telescopeEntryId}`


<!-- END_28f8ee28d6619d49fbc6f1e955d34728 -->

<!-- START_e08a570bb93827d8b6603d1fb9f2b93d -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/dumps" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/dumps");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/dumps`


<!-- END_e08a570bb93827d8b6603d1fb9f2b93d -->

<!-- START_eab4e91ba32edb6580a8ed2632fca255 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/logs" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/logs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/logs`


<!-- END_eab4e91ba32edb6580a8ed2632fca255 -->

<!-- START_2a59c20c5796d5d492133c3e8bcd1d34 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/logs/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/logs/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/logs/{telescopeEntryId}`


<!-- END_2a59c20c5796d5d492133c3e8bcd1d34 -->

<!-- START_4ef84633ff5ac0c8df8f542d6d19a6d8 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/notifications" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/notifications");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/notifications`


<!-- END_4ef84633ff5ac0c8df8f542d6d19a6d8 -->

<!-- START_6395c2300a578d2ff312b0a7381521d3 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/notifications/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/notifications/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/notifications/{telescopeEntryId}`


<!-- END_6395c2300a578d2ff312b0a7381521d3 -->

<!-- START_9efcd66e514d1f19224e0b2e27468db9 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/jobs" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/jobs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/jobs`


<!-- END_9efcd66e514d1f19224e0b2e27468db9 -->

<!-- START_d61020a49164fb68d91b4970072570bc -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/jobs/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/jobs/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/jobs/{telescopeEntryId}`


<!-- END_d61020a49164fb68d91b4970072570bc -->

<!-- START_15f74a948a5d813e235ca5d2ff32c892 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/events" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/events`


<!-- END_15f74a948a5d813e235ca5d2ff32c892 -->

<!-- START_cb367d2f23d97116a97d78faaae81e1f -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/events/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/events/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/events/{telescopeEntryId}`


<!-- END_cb367d2f23d97116a97d78faaae81e1f -->

<!-- START_7ec6f1ddc70142ea1f60a799307f4f4a -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/gates" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/gates");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/gates`


<!-- END_7ec6f1ddc70142ea1f60a799307f4f4a -->

<!-- START_f7261ef8c2d8def355b1be63596b9455 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/gates/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/gates/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/gates/{telescopeEntryId}`


<!-- END_f7261ef8c2d8def355b1be63596b9455 -->

<!-- START_104836e7045badb7761960560308f50c -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/cache" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/cache");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/cache`


<!-- END_104836e7045badb7761960560308f50c -->

<!-- START_a9794a212e7bc0d3bf15e26acdf7685e -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/cache/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/cache/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/cache/{telescopeEntryId}`


<!-- END_a9794a212e7bc0d3bf15e26acdf7685e -->

<!-- START_f5bd8c7cfbf94e2facea5e422716e828 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/queries" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/queries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/queries`


<!-- END_f5bd8c7cfbf94e2facea5e422716e828 -->

<!-- START_126e06b566849f9991002afb0b34dd11 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/queries/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/queries/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/queries/{telescopeEntryId}`


<!-- END_126e06b566849f9991002afb0b34dd11 -->

<!-- START_2a0be87abbf498979bd57a79b0dbf8f5 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/models" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/models");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/models`


<!-- END_2a0be87abbf498979bd57a79b0dbf8f5 -->

<!-- START_b9f7de78bc63ac228648c9086ebad48c -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/models/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/models/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/models/{telescopeEntryId}`


<!-- END_b9f7de78bc63ac228648c9086ebad48c -->

<!-- START_07a4603df131c6daad826b2f7f2b009c -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/requests" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/requests");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/requests`


<!-- END_07a4603df131c6daad826b2f7f2b009c -->

<!-- START_deedcbe0d49ee78b6b0211b6382a6ad3 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/requests/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/requests/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/requests/{telescopeEntryId}`


<!-- END_deedcbe0d49ee78b6b0211b6382a6ad3 -->

<!-- START_1b00812e02a8ebcab44bee37f710e21a -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/commands" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/commands");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/commands`


<!-- END_1b00812e02a8ebcab44bee37f710e21a -->

<!-- START_630361bcb61ef50767ab0e87078233ed -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/commands/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/commands/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/commands/{telescopeEntryId}`


<!-- END_630361bcb61ef50767ab0e87078233ed -->

<!-- START_98a5c94ff64c824fc9202e5025af17b8 -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/schedule" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/schedule");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/schedule`


<!-- END_98a5c94ff64c824fc9202e5025af17b8 -->

<!-- START_1411a7b24b36bd9e8208b47212d346e4 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/schedule/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/schedule/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/schedule/{telescopeEntryId}`


<!-- END_1411a7b24b36bd9e8208b47212d346e4 -->

<!-- START_f25acbb3e06a57e8411a14e4694c75fb -->
## List the entries of the given type.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/redis" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/redis");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/redis`


<!-- END_f25acbb3e06a57e8411a14e4694c75fb -->

<!-- START_3670bdc683457b53a7c2b118c10905d0 -->
## Get an entry with the given ID.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/redis/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/redis/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [Laravel\\Telescope\\Storage\\EntryModel]."
}
```

### HTTP Request
`GET telescope/telescope-api/redis/{telescopeEntryId}`


<!-- END_3670bdc683457b53a7c2b118c10905d0 -->

<!-- START_af458f9f0b35f66bde272f4b973c6637 -->
## Get all of the tags being monitored.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/telescope-api/monitored-tags" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/monitored-tags");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "tags": []
}
```

### HTTP Request
`GET telescope/telescope-api/monitored-tags`


<!-- END_af458f9f0b35f66bde272f4b973c6637 -->

<!-- START_b7f76aeac39a9c3f089e2da6d4b6b38a -->
## Begin monitoring the given tag.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/monitored-tags" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/monitored-tags");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/monitored-tags`


<!-- END_b7f76aeac39a9c3f089e2da6d4b6b38a -->

<!-- START_bdcab0f8e9b0350c8661f5c890333e8a -->
## Stop monitoring the given tag.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/monitored-tags/delete" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/monitored-tags/delete");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/monitored-tags/delete`


<!-- END_bdcab0f8e9b0350c8661f5c890333e8a -->

<!-- START_420018fbba86099da7b9c8db6d9bdc8d -->
## Toggle recording.

> Example request:

```bash
curl -X POST "http://chessclans.test/telescope/telescope-api/toggle-recording" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/telescope-api/toggle-recording");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST telescope/telescope-api/toggle-recording`


<!-- END_420018fbba86099da7b9c8db6d9bdc8d -->

<!-- START_4030988e35daa5fb1ec401a4d536dc96 -->
## Display the Telescope view.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/telescope/1" 
```
```javascript
const url = new URL("http://chessclans.test/telescope/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET telescope/{view?}`


<!-- END_4030988e35daa5fb1ec401a4d536dc96 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/broadcasting/auth" 
```
```javascript
const url = new URL("http://chessclans.test/broadcasting/auth");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (403):

```json
{
    "message": ""
}
```

### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->

<!-- START_34ec3fb17d1ba9f9bffcb68b79baadda -->
## analyse
> Example request:

```bash
curl -X GET -G "http://chessclans.test/analyse" 
```
```javascript
const url = new URL("http://chessclans.test/analyse");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET analyse`


<!-- END_34ec3fb17d1ba9f9bffcb68b79baadda -->

<!-- START_ce559181a89d5c3779e7af14c47b6b62 -->
## chat
> Example request:

```bash
curl -X GET -G "http://chessclans.test/chat" 
```
```javascript
const url = new URL("http://chessclans.test/chat");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET chat`


<!-- END_ce559181a89d5c3779e7af14c47b6b62 -->

<!-- START_2071e7a5003b72f23be0afa439524cc6 -->
## message
> Example request:

```bash
curl -X GET -G "http://chessclans.test/message" 
```
```javascript
const url = new URL("http://chessclans.test/message");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET message`


<!-- END_2071e7a5003b72f23be0afa439524cc6 -->

<!-- START_8a59da63c3fe347750fd5d2024bdfe82 -->
## message
> Example request:

```bash
curl -X POST "http://chessclans.test/message" 
```
```javascript
const url = new URL("http://chessclans.test/message");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST message`


<!-- END_8a59da63c3fe347750fd5d2024bdfe82 -->

<!-- START_baa0c59ed0de734c835135bd307333e9 -->
## ranking
> Example request:

```bash
curl -X GET -G "http://chessclans.test/ranking" 
```
```javascript
const url = new URL("http://chessclans.test/ranking");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET ranking`


<!-- END_baa0c59ed0de734c835135bd307333e9 -->

<!-- START_06347da505911532f51e40ac6f8af3ad -->
## pusherAuth
> Example request:

```bash
curl -X POST "http://chessclans.test/pusherAuth" 
```
```javascript
const url = new URL("http://chessclans.test/pusherAuth");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST pusherAuth`


<!-- END_06347da505911532f51e40ac6f8af3ad -->

<!-- START_fe626f4820a47ec94b5660f2325ad8fc -->
## move
> Example request:

```bash
curl -X GET -G "http://chessclans.test/move" 
```
```javascript
const url = new URL("http://chessclans.test/move");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "id": 1,
        "fen": "rnbqkbnr\/pppppppp\/8\/8\/8\/8\/PPPPPPPP\/RNBQKBNR w KQkq - 0 1",
        "game_id": 1,
        "created_at": "2019-06-07 20:33:26",
        "updated_at": "2019-06-07 20:33:26",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 2,
        "fen": "rnbqkbnr\/pppppppp\/8\/8\/4P3\/8\/PPPP1PPP\/RNBQKBNR b KQkq e3 0 1",
        "game_id": 1,
        "created_at": "2019-06-07 20:33:40",
        "updated_at": "2019-06-07 20:33:40",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 3,
        "fen": "rnbqkbnr\/pppp1ppp\/8\/4p3\/4P3\/8\/PPPP1PPP\/RNBQKBNR w KQkq e6 0 2",
        "game_id": 1,
        "created_at": "2019-06-07 20:33:42",
        "updated_at": "2019-06-07 20:33:42",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 4,
        "fen": "rnbqkbnr\/pppp1ppp\/8\/4p3\/4P3\/P7\/1PPP1PPP\/RNBQKBNR b KQkq - 0 2",
        "game_id": 1,
        "created_at": "2019-06-07 20:33:51",
        "updated_at": "2019-06-07 20:33:51",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 5,
        "fen": "rnb1kbnr\/pppp1ppp\/8\/4p1q1\/4P3\/P7\/1PPP1PPP\/RNBQKBNR w KQkq - 1 3",
        "game_id": 1,
        "created_at": "2019-06-07 20:33:55",
        "updated_at": "2019-06-07 20:33:55",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 6,
        "fen": "rnb1kbnr\/pppp1ppp\/8\/4p1q1\/4P3\/P4P2\/1PPP2PP\/RNBQKBNR b KQkq - 0 3",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:00",
        "updated_at": "2019-06-07 20:34:00",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 7,
        "fen": "rnb1kbnr\/pppp1ppp\/8\/4p3\/4P2q\/P4P2\/1PPP2PP\/RNBQKBNR w KQkq - 1 4",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:03",
        "updated_at": "2019-06-07 20:34:03",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 8,
        "fen": "rnb1kbnr\/pppp1ppp\/8\/4p3\/4P2q\/P4PP1\/1PPP3P\/RNBQKBNR b KQkq - 0 4",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:07",
        "updated_at": "2019-06-07 20:34:07",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 9,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/4P2q\/P4PP1\/1PPP3P\/RNBQKBNR w KQkq - 0 5",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:11",
        "updated_at": "2019-06-07 20:34:11",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 10,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/4P2q\/P4PPP\/1PPP4\/RNBQKBNR b KQkq - 0 5",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:13",
        "updated_at": "2019-06-07 20:34:13",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 11,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/4P3\/P4PqP\/1PPP4\/RNBQKBNR w KQkq - 0 6",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:17",
        "updated_at": "2019-06-07 20:34:17",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 12,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/4P3\/P4PqP\/1PPPK3\/RNBQ1BNR b kq - 1 6",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:23",
        "updated_at": "2019-06-07 20:34:23",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 13,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/4P2q\/P4P1P\/1PPPK3\/RNBQ1BNR w kq - 2 7",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:25",
        "updated_at": "2019-06-07 20:34:25",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 14,
        "fen": "rnb1kbnr\/1ppp1ppp\/p7\/4p3\/P3P2q\/5P1P\/1PPPK3\/RNBQ1BNR b kq - 0 7",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:33",
        "updated_at": "2019-06-07 20:34:33",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 15,
        "fen": "rnb1kbnr\/1pp2ppp\/p2p4\/4p3\/P3P2q\/5P1P\/1PPPK3\/RNBQ1BNR w kq - 0 8",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:38",
        "updated_at": "2019-06-07 20:34:38",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 16,
        "fen": "rnb1kbnr\/1pp2ppp\/p2p4\/4p3\/P3P2q\/5P1P\/RPPPK3\/1NBQ1BNR b kq - 1 8",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:40",
        "updated_at": "2019-06-07 20:34:40",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 17,
        "fen": "rn2kbnr\/1ppb1ppp\/p2p4\/4p3\/P3P2q\/5P1P\/RPPPK3\/1NBQ1BNR w kq - 2 9",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:42",
        "updated_at": "2019-06-07 20:34:42",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 18,
        "fen": "rn2kbnr\/1ppb1ppp\/p2p4\/4p3\/P3P2q\/5P1P\/1PPPK3\/RNBQ1BNR b kq - 3 9",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:44",
        "updated_at": "2019-06-07 20:34:44",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 19,
        "fen": "rn2kbnr\/1pp2ppp\/p2p4\/4p3\/b3P2q\/5P1P\/1PPPK3\/RNBQ1BNR w kq - 0 10",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:49",
        "updated_at": "2019-06-07 20:34:49",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 20,
        "fen": "rn2kbnr\/1pp2ppp\/p2p4\/4p3\/b3P2q\/5P1P\/RPPPK3\/1NBQ1BNR b kq - 1 10",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:51",
        "updated_at": "2019-06-07 20:34:51",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 21,
        "fen": "rn2kbnr\/1pp2ppp\/p2p4\/1b2p3\/4P2q\/5P1P\/RPPPK3\/1NBQ1BNR w kq - 2 11",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:53",
        "updated_at": "2019-06-07 20:34:53",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 22,
        "fen": "rn2kbnr\/1pp2ppp\/p2p4\/1b2p3\/4P2q\/4KP1P\/RPPP4\/1NBQ1BNR b kq - 3 11",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:57",
        "updated_at": "2019-06-07 20:34:57",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 23,
        "fen": "rn2kbnr\/1pp2ppp\/p1bp4\/4p3\/4P2q\/4KP1P\/RPPP4\/1NBQ1BNR w kq - 4 12",
        "game_id": 1,
        "created_at": "2019-06-07 20:34:59",
        "updated_at": "2019-06-07 20:34:59",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 24,
        "fen": "rn2kbnr\/1pp2ppp\/p1bp4\/4p3\/4P2q\/5P1P\/RPPPK3\/1NBQ1BNR b kq - 5 12",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:01",
        "updated_at": "2019-06-07 20:35:01",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 25,
        "fen": "r3kbnr\/1ppn1ppp\/p1bp4\/4p3\/4P2q\/5P1P\/RPPPK3\/1NBQ1BNR w kq - 6 13",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:06",
        "updated_at": "2019-06-07 20:35:06",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 26,
        "fen": "r3kbnr\/1ppn1ppp\/p1bp4\/4p3\/4P2q\/5P1P\/1PPPK3\/RNBQ1BNR b kq - 7 13",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:10",
        "updated_at": "2019-06-07 20:35:10",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 27,
        "fen": "r3kbnr\/1ppn1ppp\/p1bp4\/4p2q\/4P3\/5P1P\/1PPPK3\/RNBQ1BNR w kq - 8 14",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:12",
        "updated_at": "2019-06-07 20:35:12",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 28,
        "fen": "r3kbnr\/1ppn1ppp\/p1bp4\/4p2q\/4P3\/5P1P\/1PPP4\/RNBQKBNR b kq - 9 14",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:15",
        "updated_at": "2019-06-07 20:35:15",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 29,
        "fen": "r3kbnr\/1ppn1ppp\/p2p4\/1b2p2q\/4P3\/5P1P\/1PPP4\/RNBQKBNR w kq - 10 15",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:17",
        "updated_at": "2019-06-07 20:35:17",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 30,
        "fen": "r3kbnr\/1ppn1ppp\/p2p4\/1b2p2q\/4P3\/5P1P\/RPPP4\/1NBQKBNR b kq - 11 15",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:24",
        "updated_at": "2019-06-07 20:35:24",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    },
    {
        "id": 31,
        "fen": "r3kbnr\/1ppn1ppp\/p2p4\/1b2p3\/4P2q\/5P1P\/RPPP4\/1NBQKBNR w kq - 12 16",
        "game_id": 1,
        "created_at": "2019-06-07 20:35:26",
        "updated_at": "2019-06-07 20:35:26",
        "game": {
            "id": 1,
            "white": 2,
            "black": 1,
            "winner": "0-1",
            "format": "1+0",
            "created_at": "2019-06-07 20:33:26",
            "updated_at": "2019-06-07 20:33:34"
        }
    }
]
```

### HTTP Request
`GET move`


<!-- END_fe626f4820a47ec94b5660f2325ad8fc -->

<!-- START_fcc77381f46e0308e2b51f99da0129c0 -->
## move
> Example request:

```bash
curl -X POST "http://chessclans.test/move" 
```
```javascript
const url = new URL("http://chessclans.test/move");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST move`


<!-- END_fcc77381f46e0308e2b51f99da0129c0 -->

<!-- START_3ca24bb535a6292381c7bfc452b8ed75 -->
## timer
> Example request:

```bash
curl -X POST "http://chessclans.test/timer" 
```
```javascript
const url = new URL("http://chessclans.test/timer");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST timer`


<!-- END_3ca24bb535a6292381c7bfc452b8ed75 -->

<!-- START_aee94c87a45c968d4f411c5192c3c585 -->
## turn
> Example request:

```bash
curl -X POST "http://chessclans.test/turn" 
```
```javascript
const url = new URL("http://chessclans.test/turn");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST turn`


<!-- END_aee94c87a45c968d4f411c5192c3c585 -->

<!-- START_fb1ca69058443fda4e8ba47e07ea67a3 -->
## state
> Example request:

```bash
curl -X POST "http://chessclans.test/state" 
```
```javascript
const url = new URL("http://chessclans.test/state");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST state`


<!-- END_fb1ca69058443fda4e8ba47e07ea67a3 -->

<!-- START_f8bd8c3c9f08a9e9199e6a3fe9fcfaf2 -->
## status
> Example request:

```bash
curl -X POST "http://chessclans.test/status" 
```
```javascript
const url = new URL("http://chessclans.test/status");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST status`


<!-- END_f8bd8c3c9f08a9e9199e6a3fe9fcfaf2 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/login" 
```
```javascript
const url = new URL("http://chessclans.test/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://chessclans.test/login" 
```
```javascript
const url = new URL("http://chessclans.test/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://chessclans.test/logout" 
```
```javascript
const url = new URL("http://chessclans.test/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/register" 
```
```javascript
const url = new URL("http://chessclans.test/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://chessclans.test/register" 
```
```javascript
const url = new URL("http://chessclans.test/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/password/reset" 
```
```javascript
const url = new URL("http://chessclans.test/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://chessclans.test/password/email" 
```
```javascript
const url = new URL("http://chessclans.test/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/password/reset/1" 
```
```javascript
const url = new URL("http://chessclans.test/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://chessclans.test/password/reset" 
```
```javascript
const url = new URL("http://chessclans.test/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_c88fc6aa6eb1bee7a494d3c0a02038b1 -->
## Show the email verification notice.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/email/verify" 
```
```javascript
const url = new URL("http://chessclans.test/email/verify");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify`


<!-- END_c88fc6aa6eb1bee7a494d3c0a02038b1 -->

<!-- START_af069c1c23cec25f2be1688621969179 -->
## Mark the authenticated user&#039;s email address as verified.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/email/verify/1" 
```
```javascript
const url = new URL("http://chessclans.test/email/verify/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify/{id}`


<!-- END_af069c1c23cec25f2be1688621969179 -->

<!-- START_b44c38c624a55f23870089f09fba5cef -->
## Resend the email verification notification.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/email/resend" 
```
```javascript
const url = new URL("http://chessclans.test/email/resend");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/resend`


<!-- END_b44c38c624a55f23870089f09fba5cef -->

<!-- START_3be6eea9d0129183d63c87599ed86f43 -->
## reportbug
> Example request:

```bash
curl -X GET -G "http://chessclans.test/reportbug" 
```
```javascript
const url = new URL("http://chessclans.test/reportbug");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET reportbug`


<!-- END_3be6eea9d0129183d63c87599ed86f43 -->

<!-- START_e1385443ac8061ced5501397039fcd3d -->
## reported
> Example request:

```bash
curl -X POST "http://chessclans.test/reported" 
```
```javascript
const url = new URL("http://chessclans.test/reported");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST reported`


<!-- END_e1385443ac8061ced5501397039fcd3d -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/home" 
```
```javascript
const url = new URL("http://chessclans.test/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_b0807ef04c641ee942ef8cc126102266 -->
## tutorials
> Example request:

```bash
curl -X GET -G "http://chessclans.test/tutorials" 
```
```javascript
const url = new URL("http://chessclans.test/tutorials");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET tutorials`


<!-- END_b0807ef04c641ee942ef8cc126102266 -->

<!-- START_47f7fbb6bf98ef4cdc54b10f03cb3bdd -->
## profile
> Example request:

```bash
curl -X GET -G "http://chessclans.test/profile" 
```
```javascript
const url = new URL("http://chessclans.test/profile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile`


<!-- END_47f7fbb6bf98ef4cdc54b10f03cb3bdd -->

<!-- START_96ef14044418dcb213284f7654348f76 -->
## user/logout
> Example request:

```bash
curl -X GET -G "http://chessclans.test/user/logout" 
```
```javascript
const url = new URL("http://chessclans.test/user/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (302):

```json
null
```

### HTTP Request
`GET user/logout`


<!-- END_96ef14044418dcb213284f7654348f76 -->

<!-- START_03a76d7b7a89853a08696bfe71bbbba7 -->
## admin/login
> Example request:

```bash
curl -X GET -G "http://chessclans.test/admin/login" 
```
```javascript
const url = new URL("http://chessclans.test/admin/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET admin/login`


<!-- END_03a76d7b7a89853a08696bfe71bbbba7 -->

<!-- START_fe5fe3a14f04e5648848f1a59ea3da82 -->
## admin/login
> Example request:

```bash
curl -X POST "http://chessclans.test/admin/login" 
```
```javascript
const url = new URL("http://chessclans.test/admin/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/login`


<!-- END_fe5fe3a14f04e5648848f1a59ea3da82 -->

<!-- START_b37225c1c4a9d4a9e253fecd543b79a0 -->
## admin/logout
> Example request:

```bash
curl -X GET -G "http://chessclans.test/admin/logout" 
```
```javascript
const url = new URL("http://chessclans.test/admin/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (302):

```json
null
```

### HTTP Request
`GET admin/logout`


<!-- END_b37225c1c4a9d4a9e253fecd543b79a0 -->

<!-- START_e40bc60a458a9740730202aaec04f818 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://chessclans.test/admin" 
```
```javascript
const url = new URL("http://chessclans.test/admin");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin`


<!-- END_e40bc60a458a9740730202aaec04f818 -->

<!-- START_671f0bfb74676067bfdcefdfe160402c -->
## admin/delete/profile
> Example request:

```bash
curl -X POST "http://chessclans.test/admin/delete/profile" 
```
```javascript
const url = new URL("http://chessclans.test/admin/delete/profile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/delete/profile`


<!-- END_671f0bfb74676067bfdcefdfe160402c -->

<!-- START_baee6a71de2fdd9b535db844fb4301ca -->
## admin/mute/profile
> Example request:

```bash
curl -X POST "http://chessclans.test/admin/mute/profile" 
```
```javascript
const url = new URL("http://chessclans.test/admin/mute/profile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/mute/profile`


<!-- END_baee6a71de2fdd9b535db844fb4301ca -->

<!-- START_f611ae8378c7426b163ac3d140ded37c -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://chessclans.test/admin/password/email" 
```
```javascript
const url = new URL("http://chessclans.test/admin/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/password/email`


<!-- END_f611ae8378c7426b163ac3d140ded37c -->

<!-- START_583a6990174e55a2eb91791ae4776c83 -->
## admin/password/reset
> Example request:

```bash
curl -X GET -G "http://chessclans.test/admin/password/reset" 
```
```javascript
const url = new URL("http://chessclans.test/admin/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET admin/password/reset`


<!-- END_583a6990174e55a2eb91791ae4776c83 -->

<!-- START_d155055b87508acb9e934bcf9407b028 -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://chessclans.test/admin/password/reset" 
```
```javascript
const url = new URL("http://chessclans.test/admin/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/password/reset`


<!-- END_d155055b87508acb9e934bcf9407b028 -->

<!-- START_71ae72ee385b59ab4fcc08d79ad9f488 -->
## admin/password/reset{token}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/admin/password/reset1" 
```
```javascript
const url = new URL("http://chessclans.test/admin/password/reset1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET admin/password/reset{token}`


<!-- END_71ae72ee385b59ab4fcc08d79ad9f488 -->

<!-- START_990223abae77388741cc4899c11bc423 -->
## analyse
> Example request:

```bash
curl -X POST "http://chessclans.test/analyse" 
```
```javascript
const url = new URL("http://chessclans.test/analyse");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST analyse`


<!-- END_990223abae77388741cc4899c11bc423 -->

<!-- START_bf2df0942f53ac09ba7d4f3a75000d21 -->
## analyse/{id}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/analyse/1" 
```
```javascript
const url = new URL("http://chessclans.test/analyse/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET analyse/{id}`


<!-- END_bf2df0942f53ac09ba7d4f3a75000d21 -->

<!-- START_e4647a7dc926582f2a35662cc849d3ac -->
## analyse/{id}/next
> Example request:

```bash
curl -X POST "http://chessclans.test/analyse/1/next" 
```
```javascript
const url = new URL("http://chessclans.test/analyse/1/next");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST analyse/{id}/next`


<!-- END_e4647a7dc926582f2a35662cc849d3ac -->

<!-- START_da61e288c6891a84618e621a9480bcdb -->
## game
> Example request:

```bash
curl -X GET -G "http://chessclans.test/game" 
```
```javascript
const url = new URL("http://chessclans.test/game");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (302):

```json
null
```

### HTTP Request
`GET game`


<!-- END_da61e288c6891a84618e621a9480bcdb -->

<!-- START_219368bfe217d50f4098823713864c3f -->
## {id}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/1" 
```
```javascript
const url = new URL("http://chessclans.test/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET {id}`


<!-- END_219368bfe217d50f4098823713864c3f -->

<!-- START_5f7577d350810fcd0b2c88e0bb9b5a14 -->
## game
> Example request:

```bash
curl -X POST "http://chessclans.test/game" 
```
```javascript
const url = new URL("http://chessclans.test/game");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST game`


<!-- END_5f7577d350810fcd0b2c88e0bb9b5a14 -->

<!-- START_76b361c4b06401f327aeb641dd11bcda -->
## game/home/{value}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/game/home/1" 
```
```javascript
const url = new URL("http://chessclans.test/game/home/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (302):

```json
null
```

### HTTP Request
`GET game/home/{value}`


<!-- END_76b361c4b06401f327aeb641dd11bcda -->

<!-- START_52941f126ff88902e8eb788b9a04cb6f -->
## gameEnd
> Example request:

```bash
curl -X POST "http://chessclans.test/gameEnd" 
```
```javascript
const url = new URL("http://chessclans.test/gameEnd");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST gameEnd`


<!-- END_52941f126ff88902e8eb788b9a04cb6f -->

<!-- START_9b6e5296879ac6ff7c9abbd41a895c00 -->
## profile/add
> Example request:

```bash
curl -X POST "http://chessclans.test/profile/add" 
```
```javascript
const url = new URL("http://chessclans.test/profile/add");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST profile/add`


<!-- END_9b6e5296879ac6ff7c9abbd41a895c00 -->

<!-- START_592e4f1deee1ac6d3536da1233d8833a -->
## profile/unfriend
> Example request:

```bash
curl -X POST "http://chessclans.test/profile/unfriend" 
```
```javascript
const url = new URL("http://chessclans.test/profile/unfriend");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST profile/unfriend`


<!-- END_592e4f1deee1ac6d3536da1233d8833a -->

<!-- START_e7b4f7ddf7ecc9f3f5ce42d5edb993c3 -->
## profile/report
> Example request:

```bash
curl -X POST "http://chessclans.test/profile/report" 
```
```javascript
const url = new URL("http://chessclans.test/profile/report");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST profile/report`


<!-- END_e7b4f7ddf7ecc9f3f5ce42d5edb993c3 -->

<!-- START_ba0221d20c68bc448d74ff80f4e7d62a -->
## profile/reported
> Example request:

```bash
curl -X POST "http://chessclans.test/profile/reported" 
```
```javascript
const url = new URL("http://chessclans.test/profile/reported");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST profile/reported`


<!-- END_ba0221d20c68bc448d74ff80f4e7d62a -->

<!-- START_d1d0691a0e2b1048ade477c053bafac6 -->
## profile/{user}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/profile/1" 
```
```javascript
const url = new URL("http://chessclans.test/profile/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/{user}`


<!-- END_d1d0691a0e2b1048ade477c053bafac6 -->

<!-- START_8314d1c6cd1747f3eaa25af166f36286 -->
## profile/accept/{user}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/profile/accept/1" 
```
```javascript
const url = new URL("http://chessclans.test/profile/accept/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/accept/{user}`


<!-- END_8314d1c6cd1747f3eaa25af166f36286 -->

<!-- START_485aa62cda8d23e6e8f38298c3e65336 -->
## profile/decline/{user}
> Example request:

```bash
curl -X GET -G "http://chessclans.test/profile/decline/1" 
```
```javascript
const url = new URL("http://chessclans.test/profile/decline/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/decline/{user}`


<!-- END_485aa62cda8d23e6e8f38298c3e65336 -->

<!-- START_b7c67569e5a56bd0ae859ac9b99d48d8 -->
## profile/myprofile
> Example request:

```bash
curl -X GET -G "http://chessclans.test/profile/myprofile" 
```
```javascript
const url = new URL("http://chessclans.test/profile/myprofile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile/myprofile`


<!-- END_b7c67569e5a56bd0ae859ac9b99d48d8 -->

<!-- START_643f86ff15dea0155f2a062e1815dc04 -->
## profile/update
> Example request:

```bash
curl -X POST "http://chessclans.test/profile/update" 
```
```javascript
const url = new URL("http://chessclans.test/profile/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST profile/update`


<!-- END_643f86ff15dea0155f2a062e1815dc04 -->

<!-- START_b078e3b8022b13eedcffb78315c05d1f -->
## showprofile
> Example request:

```bash
curl -X GET -G "http://chessclans.test/showprofile" 
```
```javascript
const url = new URL("http://chessclans.test/showprofile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [App\\Game] showprofile"
}
```

### HTTP Request
`GET showprofile`


<!-- END_b078e3b8022b13eedcffb78315c05d1f -->


