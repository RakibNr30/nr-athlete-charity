<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\NewsRepository;

class NewsService
{
    /**
     * @var $newsRepository
     */
    protected $newsRepository;

    /**
     * Constructor
     *
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->newsRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->newsRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->newsRepository->find($id);
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
        return $this->newsRepository->findBy($attribute, $value);
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
        return $this->newsRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->newsRepository->delete($id);
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function allLatest($limit = 0)
    {
        return $this->newsRepository->model
            ->orderByDesc('created_at')
            ->paginate($limit);
    }
}
