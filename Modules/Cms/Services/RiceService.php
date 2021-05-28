<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\RiceRepository;

class RiceService
{
    /**
     * @var $riceRepository
     */
    protected $riceRepository;

    /**
     * Constructor
     *
     * @param RiceRepository $riceRepository
     */
    public function __construct(RiceRepository $riceRepository)
    {
        $this->riceRepository = $riceRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->riceRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->riceRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->riceRepository->find($id);
    }

    /**
     * Find data
     *
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        return $this->riceRepository->findBy($attribute, $value);
    }

    /**
     * Update data
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return $this->riceRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->riceRepository->delete($id);
    }

    /**
     * Delete data
     *
     * @return mixed
     */
    public function lastOne()
    {
        return $this->riceRepository->model->latest()->firstOrCreate([]);
    }

    /**
     * Get chart data
     *
     * @return mixed
     */
    public function chartData()
    {
        $labels = $this->riceRepository->model->latest()->take(30)->pluck('created_at')->toArray();
        $values = $this->riceRepository->model->latest()->take(30)->pluck('global_avg_price')->toArray();

        $response = new \stdClass();
        $response->labels = $labels ?? [];
        $response->values = $values ?? [];

        return $response;
    }
}
