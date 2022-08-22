<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TestIdType
 * @package App\Models
 * @version August 11, 2022, 2:09 pm UTC
 *
 * @property string $description
 */
class TestIdType extends Model
{
    use SoftDeletes;

    public $table = 'test_id_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required'
    ];

    
}
