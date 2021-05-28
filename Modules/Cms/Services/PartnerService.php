<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\PartnerRepository;

class PartnerService
{
    /**
     * @var $partnerRepository
     */
    protected $partnerRepository;

    /**
     * Constructor
     *
     * @param PartnerRepository $partnerRepository
     */
    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->partnerRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->partnerRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->partnerRepository->find($id);
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
        return $this->partnerRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->partnerRepository->delete($id);
    }

    /**
     * Delete data
     *
     * @param int $limit
     * @return mixed
     */
    public function allDesc($limit = 0)
    {
        return $this->partnerRepository->model
            ->orderByDesc('created_at')->paginate($limit);
    }

}
