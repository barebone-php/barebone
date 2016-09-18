# Barebone Core Lib

## Testing

Install all required packages with:

    $ npm install

You can run tests with `phpunit` directly or use the provided grunt-task, which
will also run tests whenever a PHP file changes.

The following uses scripts from packages.json and references the binaries 
directly from '/vendor/'

    $ npm start    runs phpunit and starts grunt file watcher
    $ npm test     runs phpunit
    
Alternatives:

    $ phpunit      if installed globally on your system
    $ grunt        if installed globally on your system
    
