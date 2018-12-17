docker-symfony
==============

Build and Run:

```bash
$ docker-compose up -d
```
Enter `php` container and install symfony vendors:

```bash
$ php composer.phar install
```

If you want to rebuild angular app, enter `node` container and execute:

```bash
$ npm build
```

URL to Front : `http://localhost` (or `http://localhost:4200` for dev)
URL to Back : `http://localhost/api`

_Note :_ you can rebuild all Docker images by running:

```bash
$ docker-compose build --force-rm
```

# How it works?

Here are the `docker-compose` built images:

* `db`: This is the MySQL database container (can be changed to postgresql or whatever in `docker-compose.yml` file),
* `php`: This is the PHP-FPM container including the application volume mounted on,
* `nginx`: This is the Nginx webserver container in which php volumes are mounted too,
* `node`: This is a Node.js container which builds the Angular app

This results in the following running containers:

```bash
> $ docker-compose ps
```

# Read logs

You can access Nginx and Symfony application logs in the following directories on your host machine:

* `logs/nginx`
* `logs/back`

# Use xdebug!

To use xdebug change the line `"docker.host:127.0.0.1"` in docker-compose.yml and replace 127.0.0.1 with your machine ip addres.
If your IDE default port is not set to 5902 you should do that, too.

# Code license

You are free to use the code in this repository under the terms of the 0-clause BSD license. LICENSE contains a copy of this license.
