<p align="center"><a href="https://anira-web.ru" target="_blank"><img src="https://anira-web.ru/wp-content/uploads/2022/02/anira-logo-red-green.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

Small Project on Laravel, which demonstrate developing process to create simple REST-API base on Laravel framework with new UPSERT method:

## Project API Method

- Setup DB tables - <u>php artisan migrate</u>
- Add api key (c6f8e6cdf9582357395fc2cd36d93d4e) - <u>php artisan db:seed</u>
- Create or Update products from JSON - <u>POST /api/products-create-or-update</u>
- Test JSON file for request - <u>data.json</u>

## Speed Script Execution

- Add 1000 new products = 1sec.

{"errors":false,"message":"Success","data":{"created":1000,"updated":0,"time":"1sec"}}

- Update 1000 new products = 2sec.

{"errors":false,"message":"Success","data":{"created":0,"updated":1000,"time":"2sec"}}

## Contact

Telegram - [@dtevik](https://t.me/dtevik)

