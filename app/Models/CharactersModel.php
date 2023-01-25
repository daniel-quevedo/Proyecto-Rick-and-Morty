<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharactersModel extends Model
{

	protected $table = 'characters';

	protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'status',
    'species',
    'type',
    'gender',
    'nameOrigin',
    'url',
    'image',
  ];
}
