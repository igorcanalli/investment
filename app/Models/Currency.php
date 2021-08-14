<?php

namespace App\Models;

use App\ServiceApi\AwesomeApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currency';

    protected $fillable = ['code', 'value'];

    const UPDATED_AT = null;

    public static function refreshApi()
    {
        $responses = AwesomeApi::getData();

        foreach ($responses as $response) {
            self::updateOrCreate(['code' => $response->code], ['value' => $response->bid]);
        }

        return self::get();
    }
}
