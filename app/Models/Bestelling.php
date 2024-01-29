<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'bestellingid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bestelling';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['datum','klantid','pizzaingredientid','maat','status'];
}
