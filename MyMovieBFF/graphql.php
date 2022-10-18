<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\Server\StandardServer;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use MyMovieBFF\DataSource\Movie;

$movieType = new ObjectType([
  'name' => 'Movie',
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
      'resolve' => function ($rootValue, array $args) {
        return [
          'id' => 123,
          'title' => 'chuchu',
          'overview' => 'chuchu chu'
        ]
      },
    ],
  ],
]);

$schema = new Schema(
  [
      'query' => $queryType,
  ]
);

$server = new StandardServer([
  'schema' => $schema,
]);

$server->handleRequest();