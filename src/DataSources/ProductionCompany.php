<?php 

declare(strict_types=1);

namespace WebPhpBff\DataSources;

class ProductionCompany {
  public static function findProductionCompany(int $id) {
    $url = 'https://api.themoviedb.org/3/company/' . $id . '?api_key=16d5d710a1d2df0d971d0f77f928af7e';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
  }
}
