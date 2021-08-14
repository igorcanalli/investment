<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = ['value','date_application','user_id', 'currency_id'];

    protected $value_br = 0;

    protected $date_application_br = 0;

    protected $table = 'investment';

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getValuebrAttribute(){
        return round(($this->value * $this->currency->value),2 );
    }

    public function getDateApplicationBrAttribute(){
        return date('d/m/Y', strtotime($this->date_application));
    }

}
