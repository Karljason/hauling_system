<?php

namespace App\Repositories;

use App\Models\inventorymain;
use App\Repositories\BaseRepository;

/**
 * Class inventorymainRepository
 * @package App\Repositories
 * @version August 11, 2022, 4:15 pm UTC
*/

class inventorymainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inventorymain::class;
    }
}
