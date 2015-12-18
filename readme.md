## Deployment
### Software required on Web Server
- [Bower][bower_path] | Web sites are made of lots of things — frameworks, libraries, assets, and utilities. Bower manages all these things for you.
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Git (/ɡɪt/) is a widely used version control system for software development.

### Get Source Code
- `git clone git@github.com:rdok/dnmrn-exam.git` | Clone the project into your web server
- `composer install` Will install front-end packages using bower, and back-end packages using composer.

### Add credentials
- Copy .env.example to .env and replace variables as needed.

### Set Up Database
- `php commands/mysql/up` Creates tables
- `php commands/mysql/down` Drops tables
- `php commands/mysql/provision` Drops, and creates tables
- `php commands/mysql/seed` Drops, Creates, and fills tables with seed data. 


### Credits
- [Bower][bower_path] | Web sites are made of lots of things — frameworks, libraries, assets, and utilities. Bower manages all these things for you.
- [c9s/Pux][corneltek_c9s_Pux] | Pux is a fast PHP Router and includes out-of-box controller tools
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Git (/ɡɪt/) is a widely used version control system for software development.
- [fzaninotto/Faker][fzaninotto_Faker_path] | Faker is a PHP library that generates fake data for you
- [twig/twig][twig_twig] | Twig, the flexible, fast, and secure template language for PHP
- [vlucas/phpdotenv][vlucas_phpdotenv_path] | Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
- [jasongrimes/php-paginator][jasongrimes_php-paginator] | A lightweight PHP paginator, for generating pagination controls in the style of Stack Overflow and Flickr.

[bower_path]: http://bower.io
[composer_path]: https://getcomposer.org/
[git_path]: https://git-scm.com/
[fzaninotto_Faker_path]: https://github.com/fzaninotto/Faker
[vlucas_phpdotenv_path]: https://github.com/vlucas/phpdotenv
[corneltek_c9s_Pux]: https://github.com/c9s/Pux/
[twig_twig]: https://github.com/twigphp/Twig
[jasongrimes_php-paginator]: https://github.com/jasongrimes/php-paginator
