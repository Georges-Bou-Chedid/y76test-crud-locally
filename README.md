<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation

After installing composer and creating new laravel 9.0 project called y76test
i configured valet-linux cpriego to run my project through it without calling php artisan serve
linking the directory to valet and calling directory-name.test in the browser.

## Design

Opening our project should welcome Mr. Ibrahim with a button to let him store new products.
pressing the button should let you choose the product category and product type which are required before submitting
on success the page should be redirected to welcome page with success message
on failure the page should be redirected to create page with failure message.

## Firestore Database

- Implementing firestore to laravel through "composer require kreait/laravel-firebase"
- Adding the firestore.php to the config file
- Installing php grpc
- Installing google cloud firestore using "composer require google/cloud-firestore"
- Create new project in firebase console and download the credentials of your service account and move it to the app
- Declare the credentials downloaded in .env file
- Use app('firebase.firestore') in laravel to connect to firestore database and create a new collection 

## Offline Persistence

I create a javascript file to make our firestore cloud persistence enabled
as when we are offline we should be able to continue storing data and editing and fetching from cache until we are back online
then all events happened before will be synced when we are online

## Notification

Use the notification facade of laravel to send an email
Suppose we have the software email provided so we can notify him that the synchronization is complete
In testing mode i connected laravel to mailtrap so we can see the mail that is being send
signing in to mailtrap should be through my github account.
