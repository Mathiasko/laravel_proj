<?php

namespace App\Models;

class Listing
{
  public static function all()
  {
    return [
      [
        'id' => 1,
        'title' => 'Post One',
        'description' => 'This is post one'
      ],
      [
        'id' => 2,
        'title' => 'Post Two',
        'description' => 'This is post two'

      ]
    ];
  }

  public static function find($id)
  {
    $listings = self::all();
    foreach ($listings as $listing) {
      if ($listing['id'] == $id) {
        return $listing;
      }
    }
  }
}
