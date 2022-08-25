<?php

namespace App\Repositories;

use App\Models\requisitions;
use App\Repositories\BaseRepository;

/**
 * Class requisitionsRepository
 * @package App\Repositories
 * @version August 25, 2022, 5:58 pm UTC
*/

class requisitionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ctrl_no',
        'truck_id',
        'status',
        'total_cost'
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
        return requisitions::class;
    }
}
