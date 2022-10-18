<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\Server\StandardServer;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use WebPhpBff\DataSources\Movie;

$movieType = new ObjectType([
  'name' => 'movie',
  'fields' => [
    'id' => [
      'type' => Type::id(),
    ],
    'title' => [
      'type' => Type::string(),
    ],
    'overview' => [
        'type' => Type::string(),
    ],
  ],
]);

$queryType = new ObjectType([
  'name' => 'Query',
  'fields' => [
    'movie' => [
      'type' => $movieType,
      'args' => [
        'id' => [
          'type' => Type::int(),
        ]
      ],
      'resolve' => function ($rootValue, array $args): array {
        return Movie::findMovie($args['id']);
      },
    ],
    'movies' => [
      'type' => Type::listOf($movieType),
      'resolve' => function ($rootValue, array $args): array {
        return Movie::getPopularMovies();
      },
    ],
  ],
]);

$schema = new Schema([
  'query' => $queryType,
]);

$server = new StandardServer([
  'schema' => $schema,
]);

$server->handleRequest();
