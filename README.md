# Barebone

MVC Framework for building PHP web applications

## Goals

- Have a simple installation process: download and go
- Be open, easy to understand and easy to extend
- Supporting and encouraging best practices
- Provide a solid foundation for almost anything
- Be minimal, but with a good minimum

## At a glance

#### Configuration

Setup your application details and database connection `/app/config.json`

#### Models

Define your models as needed in `/app/models`

#### Controllers

Write your controller actions in `/app/controllers`

#### Libraries

Anything else under the namespace `App` can be created in `/app/lib`

#### Views

Add as many views as referenced in your controllers in `/app/views`

#### Routing

Connect your controller "actions" to URLs in `/app/routes.php`

#### Logging

You can write from models and controllers to a log in `/app/logs/`

#### Database

You can manage your database schema using migrations in `/app/database/`

#### Frontend Assets

Get gulp with "npm install" in `/app/frontend`, comes preconfigured for SASS and JS

#### Javascript

Develop your frontend code `/app/frontend/js` supported by Browserify and Babel. 

#### Stylesheets

By default SASS renders to CSS from `/app/frontend/sass`, but LESS is also available.

#### Hosting

Upload everything to Server with at least PHP 5.5 and point your virtual host to `/public/`

## Status

This is work in progress. Tests are on the way and the API may change (slightly).
At this point i don't expect any drastic changes anymore.

## Contributing

Any PR is welcome. If you find issues, please report.

## License 

The MIT License

