# Database Migrations

Use the included commandline utility `./phinx` to create migrations and seeders
for your application. Read the Phinx documentation about creating, altering and 
dropping MySQL tables.

Make sure the `phinx` file is executable. Then run `./phinx [command]`

Here are commands you can use: 

### Migrations

    create       Create a new migration
    migrate      Run your latest migrations
    rollback     Rollback the last (or to a specific) migration
    status       Show migration status
    
http://docs.phinx.org/en/latest/migrations.html

### Seeding

Seeds fill your database with data after its created.

    seed:create  Create a new database seeder
    seed:run     Run database seeders
    
http://docs.phinx.org/en/latest/seeding.html
