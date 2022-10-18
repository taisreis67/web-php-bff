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
      'resolve' => function ($rootValue, array $args): object {
        $movie = new Movie();
        return $movie->getMovie(550);
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

// curl 'http://localhost:8000' -H 'Content-Type: application/json' -H 'Accept: application/json' --data-binary '{"query":"{movie { title }}"}'
// {"data":{"movie":{"title":"Fight Club"}}}