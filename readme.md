## Deployment
### Software required on Web Server
- [Bower][bower_path] | Web sites are made of lots of things — frameworks, libraries, assets, and utilities. Bower manages all these things for you.
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Pux is a fast PHP Router and includes out-of-box controller tools

### Get Source Code
- `git clone git@github.com:rdok/dnmrn-exam.git` | Clone the project into your web server
- `composer install` Will install front-end packages using bower, and back-end packages using composer.

### Add credentials
- Copy .env.example to .env and replace variables as needed.

### Credits
- [Bower][bower_path] | Web sites are made of lots of things — frameworks, libraries, assets, and utilities. Bower manages all these things for you.
- [c9s/Pux][corneltek_c9s_Pux] | Pux is a fast PHP Router and includes out-of-box controller tools
- [Composer][composer_path] | Dependency Manager for PHP
- [Git][git_path] | Pux is a fast PHP Router and includes out-of-box controller tools
- [fzaninotto/Faker][fzaninotto_Faker_path] | Faker is a PHP library that generates fake data for you
- [twig/twig][twig_twig] | Twig, the flexible, fast, and secure template language for PHP
- [vlucas/phpdotenv][vlucas_phpdotenv_path] | Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.

[bower_path]: http://bower.io
[composer_path]: https://getcomposer.org/
[git_path]: https://git-scm.com/
[fzaninotto_Faker_path]: https://github.com/fzaninotto/Faker
[vlucas_phpdotenv_path]: https://github.com/vlucas/phpdotenv
[corneltek_c9s_Pux]: https://github.com/c9s/Pux/
[twig_twig]: https://github.com/twigphp/Twig
