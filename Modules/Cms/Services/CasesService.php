<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\CasesRepository;

class CasesService
{
    /**
     * @var $casesRepository
     */
    protected $casesRepository;

    /**
     * Constructor
     *
     * @param CasesRepository $casesRepository
     */
    public function __construct(CasesRepository $casesRepository)
    {
        $this->casesRepository = $casesRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->casesRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->casesRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->casesRepository->find($id);
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
        return $this->casesRepository->findBy($attribute, $value);
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
        return $this->casesRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->casesRepository->delete($id);
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function allLatest($limit = 0)
    {
        return $this->casesRepository->model
        ->orderByDesc('created_at')
        ->paginate($limit);
    }

    /**
     * Get all data
     *
     * @return mixed
     */
    public function allCases()
    {
        return $this->casesRepository->model
            ->orderByDesc('created_at')
            ->get();
    }
}
