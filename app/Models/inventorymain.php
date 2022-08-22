<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class inventorymain
 * @package App\Models
 * @version August 11, 2022, 4:15 pm UTC
 *
 * @property string $description
 */
class inventorymain extends Model
{
    use SoftDeletes;

    public $table = 'inventorymains';
    

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
