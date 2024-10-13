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

The ***username is test*** and the ***password is admin***.

```
ssh -p 8080 test@host.ip.address
```

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
php artisan db:seed 
php artisan serve --host 0.0.0.0 --port 80
```
Only use php artisan db:seed if you want the DB to be filled with example data

Now you can reach the site on the host machine at 0.0.0.0 or at the hosts ip adress.
