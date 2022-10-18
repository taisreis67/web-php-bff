# Web PHP BFF

A backend-for-frontend application used to demonstrate how to build it using PHP and GraphQL.

## Requirements

You will need the following things correctly installed on your computer.

- [Git](http://git-scm.com/) v2+
- [PHP](https://www.php.net/manual/en/install.php) v8.0+
- [Composer](https://getcomposer.org/) v2.4+

## Installation

- Clone the repository: `git clone https://github.com/taisreis67/web-php-bff.git`
- Join inside repo: `cd web-php-bff`
- Install project dependencies: `composer install`

## Run application

- `php -S localhost:8000 src/graphql.php`

## How make requests

```json
curl 'http://localhost:8000' -H 'Content-Type: application/json' -H 'Accept: application/json' --data-binary '{"query":"{movie(id: 550) { title, productionCompany { homepage }}}"}' | json_pp
```

## How to test

You could test and see the results using [GraphiQL Chrome Extension](https://chrome.google.com/webstore/detail/graphiql-extension/jhbedfdjpmemmbghfecnaeeiokonjclb/related)

## API

The BFF is consuming a public API called [TMDB (The Movie Database API)](https://developers.themoviedb.org/3/getting-started/introduction) 3v.

To use it you need create an account at TMDB and generate an API Key.
After that you need put your API Key in the url that call the API, example:

`$url = 'https://api.themoviedb.org/3/movie/popular?api_key=your-api-key';`

## Further reading

- [BFF](https://philcalcado.com/2015/09/18/the_back_end_for_front_end_pattern_bff.html) about BFF
- [GraphQL](https://graphql.org/learn/) query language used in BFF
