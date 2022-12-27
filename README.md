
# NBP Integration - Test Task

Simple Laravel Application (8.75 / PHP 8.1 / Latest Mysql DB) that downloads Currencies from http://api.nbp.pl on demand and using crone task.


## API Reference

#### Get all items

```http
  GET /api/nbp/getCurrenciesFromApi

    Use as on demand currency download to currencies table.

```
```http
  GET /api/nbp/healtCheck/

    Just for testing purposes - send HTTP request and gets latest data

```



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file


`DB_CONNECTION=mysql // - This comes from Docker env that i attached to project`

`DB_HOST=mysql_nbp // - From docker - its a container name of database`

`DB_PORT=3306 // - Standard mysql port`

`DB_DATABASE=xxx`

`DB_USERNAME=xxx`

`DB_PASSWORD=xxx`


Rest bascially can be copied from .env.example
## Deployment

To deploy this project run

Copy .env.example to .env
```bash
Windows: 
  copy .env.example .env
Linux
  cp .env.example .env
```

Then you need to change .env variables according to readme and run

```bash
docker compose up

```
To create containers containing NGINX to serve application, MYSQL for database and php-fpm




## Authors

- [@SochaAdrian](https://www.github.com/SochaAdrian)

