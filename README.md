# Polytype Designer

Webbased type designer

## Getting started

### Install dependencies:
```
composer install
```

### Configuration

Copy config template files:
```
cp app/config/parameters.yml.dist app/config/parameters.yml
```
Now edit `app/config/parameters.yml` to your situation

### Initializing database schema

The database schema is defined in `app/schema.xml`. You can load this schema in your database 
using [DBTK Schema Loader](https://github.com/dbtk/schema-loader) (view it's README.md for more information)

Note: Create the database before loading the schema.

```
vendor/bin/dbtk-schema-loader schema:load app/schema.xml mysql://username:password@localhost/polytype
```

### Loading example data / fixtures

After initializing the database schema, you can load it with some example data through
[linkorb/haigha](https://github.com/linkorb/haigha) (View Haigha's README.md for further information):

```
vendor/bin/haigha fixtures:load test/fixture/example-data.yml mysql://username:password@localhost/polytype
```

### Start the server

```
php -S 0.0.0.0:8080 -t web/
```
Now open [http://127.0.0.1:8080](http://127.0.0.1:8080) in your browser.
