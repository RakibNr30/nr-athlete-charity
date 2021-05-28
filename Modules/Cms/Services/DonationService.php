<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\DonationRepository;

class DonationService
{
    /**
     * @var $donationRepository
     */
    protected $donationRepository;

    /**
     * Constructor
     *
     * @param DonationRepository $donationRepository
     */
    public function __construct(DonationRepository $donationRepository)
    {
        $this->donationRepository = $donationRepository;
    }

    /**
     * Get all data
     *
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 0)
    {
        return $this->donationRepository->paginate($limit);
    }

    /**
     * Get all data
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->donationRepository->create($data);
    }

    /**
     * Find data
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->donationRepository->find($id);
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
        return $this->donationRepository->findBy($attribute, $value);
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
        return $this->donationRepository->update($data, $id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->donationRepository->delete($id);
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function donateByUser($id)
    {
        return $this->donationRepository->model
            ->where('donner_id', $id)->latest()->get();
    }

    /**
     * Get chart data
     *
     * @return mixed
     */
    public function chartData()
    {
        $labels = $this->donationRepository->model->latest()->take(30)->pluck('created_at')->toArray();
        $values = $this->donationRepository->model->latest()->take(30)->pluck('donate_amount')->toArray();

        $response = new \stdClass();
        $response->labels = $labels ?? [];
        $response->values = $values ?? [];

        return $response;
    }
}
