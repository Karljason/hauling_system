<?php

namespace App\Repositories;

use App\Models\reports;
use App\Repositories\BaseRepository;

/**
 * Class reportsRepository
 * @package App\Repositories
 * @version August 31, 2022, 2:29 am UTC
*/

class reportsRepository extends BaseRepository
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
        return reports::class;
    }
}
