<?php

namespace App\Repositories;

use App\Models\TruckType;
use App\Repositories\BaseRepository;

/**
 * Class TruckTypeRepository
 * @package App\Repositories
 * @version August 20, 2022, 10:46 am UTC
*/

class TruckTypeRepository extends BaseRepository
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
        return TruckType::class;
    }
}
