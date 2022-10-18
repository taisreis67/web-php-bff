<?php 

declare(strict_types=1);

namespace MyMovieBFF\DataSource

class Movie {
  public ?int $id = null;
  public ?string $title = null;
  public ?string $overview = null;

  public function getMovie(int $id) {
    $url = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=16d5d710a1d2df0d971d0f77f928af7e';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($curl), true);

    $this->id = $response['id'];
    $this->title = $response['title'];
    $this->overview = $response['overview'];

    curl_close($curl);
  }
}

