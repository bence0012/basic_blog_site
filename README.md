# basic_blog_site

Project for an interview.

## Configuration

### Docker

There is a dockerfile included in the project for easy setup. It needs to be built and started with ports 22 and 80 open for shh and for accesing the site.

The command will look something like this:

```
docker run -d -p 8080:22 -p 80:80 --name [name] [docker]
```

This will allow you to reach both the host machine and the docker trough ssh.

### Starting the server

Once connected to the docker these commands will allow you to run and reach the server trough browser.

```
git clone https://github.com/bence0012/basic_blog_site.git
cd basic_blog_site/blog
npm install
npm run build
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve --host 0.0.0.0 --port 80
```
