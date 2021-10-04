<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\PublicMessageRepository;

class PublicMessageService
{
    /**
     * @var $publicMessageRepository
     */
    protected $publicMessageRepository;

    /**
     * Constructor
     *
     * @param PublicMessageRepository $publicMessageRepository
     */
    public function __construct(PublicMessageRepository $publicMessageRepository)
    {
        $this->publicMessageRepository = $publicMessageRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->publicMessageRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->publicMessageRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->publicMessageRepository->find($id);
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
        return $this->publicMessageRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->publicMessageRepository->delete($id);
    }
}
