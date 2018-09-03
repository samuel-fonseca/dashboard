# Custom XAMPP Dashboard

I have been using [XAMPP](https://www.apachefriends.org/index.html) for a couple of years, however, the reason for this is to have a dashboard panel which informs me about my `localhost` installation.

XAMPP is great, but their "dashboard" leaves a huge void, with a few docs, and information about XAMPP and their partners. I previously used [WampServer](http://www.wampserver.com/en/), and they a pretty good welcome dashboard page. With a list of the folders on the local installation folder, and just overall useful information about the server and PHP.

So, I built one for myself. This is not perfect, I've only had a limited time to work on it and get it up and running.

I did not use any frontend frameworks, or backend. I did not feel I needed to add too many levels of complexity, and I wanted something extremely lightweight which could get me quick information about my XAMPP's local installation.

# Features

- Supported on most browsers (Tested on Android, Windows, macOS, Ubuntu) (Browsers: Brave, Safari, Chrome, Firefox, Edge)
- Allows for easy navigation around your site's folders.
- Quick links to all your projects & important items on your localhost
- File size & type detected
- Useful server information
- Useful information about your PHP installation
- Checks server status

# Install

Go to your `htdocs` folder, and:

```sh
# remove the current dashboard folder
mv ./dashboard ./dashboard_old

# clone the project in your `htdocs` dir
git clone https://github.com/samuel-fonseca/dashboard

# navigate to ./dashboard and install dependencies
cd dashboard
composer install

# update .env file to add custom settings
mv .example.env .env
```

Composer will install the dependencies and map out the classes. Once this is done go to [http://localhost/](http://localhost/). XAMPP will forward you to http://localhost/dashboard.

# Screenshots

`phpinfo()`
![alt text][phpinfo]

`ini_get_all()`
![alt text][ini_get_all]

Detects HTTPS protocol
![alt text][https]

[ini_get_all]: https://github.com/samuel-fonseca/dashboard/raw/master/screenshots/current/Screenshot_ini_get_all.png
[phpinfo]: https://github.com/samuel-fonseca/dashboard/raw/master/screenshots/current/Screenshot_phpinfo.png
[https]: https://github.com/samuel-fonseca/dashboard/raw/master/screenshots/current/Screenshot_https.png
