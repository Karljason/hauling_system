<?php

namespace App\Repositories;

use App\Models\TestIdType;
use App\Repositories\BaseRepository;

/**
 * Class TestIdTypeRepository
 * @package App\Repositories
 * @version August 11, 2022, 2:09 pm UTC
*/

class TestIdTypeRepository extends BaseRepository
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
        return TestIdType::class;
    }
}
