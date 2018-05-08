Blog Project
===================
COMP586<br />
Full stack blog with Laravel, Angular 2, and MySQL db<br />
that contains an MVC, SPA, foreign keys, ORM, authentication, authorization, unit testing, CRUD, and some SOLID principles.<br />

## Folders:
* angular -> frontend
  * Unit tests with Jasmine and Karma
    * Location: src/app/post.service.spec.ts
* blog -> backend
  * Unit tests with PHPUnit
    * Location: Tests/Unit/PostTest.php

## Build Angular
Run `ng build` to build the project. The build artifacts will be stored in the `dist/` directory. Use the `-prod` flag for a production build.

## Build Laravel
run `php artisan serve` to build build the project.

## Running unit tests
Run `ng test` to execute the unit tests via [Karma](https://karma-runner.github.io/1.0/index.html).
Run `phpunit` to execute the unit tests in php unit tests.
