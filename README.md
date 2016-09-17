# barebone
Simple MVC Framework for building PHP Websites

### Configuration

Setup your database connection `config.json`

### Models (\Barebone\Model)

Define your models as needed in `/app/classes/Model`

### Controllers (\Barebone\Controller)

Write your controller actions in `/app/classes/Controller`

### Views (\Barebone\View)

Add as many views as referenced in your controllers in `/app/views`.

### Routing (\Barebone\Router)

Connect your controller actions to urls in `routes.php`

### Logging ($this->log(...))

You can write from models and controllers to a log in `/app/logs/`

### Frontend (browserify, sass) 

Install gulp with npm and develop frontend code in `/app/frontend`

### Hosting

Upload everything and point your virtual host to `/public/`

## Behind the scenes

All the basics are covered.

- Eloquent as ORM
- Blade as Template Engine
- Slim for Routing
- Elixir as JS/CSS Preprocessor
- Monolog for Logging

