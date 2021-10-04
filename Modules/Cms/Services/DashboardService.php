<?php

namespace Modules\Cms\Services;

use Modules\Cms\Repositories\CasesRepository;
use Modules\Cms\Repositories\DonationRepository;
use Modules\Cms\Repositories\RiceRepository;
use Modules\Ums\Repositories\UserRepository;

class DashboardService
{
    protected $userRepository;
    protected $donationRepository;
    protected $caseRepository;
    protected $riceRepository;

    public function __construct
    (
        UserRepository $userRepository,
        DonationRepository $donationRepository,
        CasesRepository $casesRepository,
        RiceRepository $riceRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->donationRepository = $donationRepository;
        $this->caseRepository = $casesRepository;
        $this->riceRepository = $riceRepository;
    }

    public function counter() {
        // counter object
        $counter = new \stdClass();

        // total athlete
        $counter->totalAthlete = $this->userRepository->model
            ->whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })->count();

        // total rice donation
        $counter->totalRiceDonation = $this->donationRepository->model
            ->sum('rice_donate_amount');

        // total donation
        $counter->totalDonation = $this->donationRepository->model
            ->sum('donate_amount');

        // total saved people
        $counter->totalSavedPeople = $this->caseRepository->model
            ->where('status', 1)
            ->sum('affected_people');

        // total saved people
        $counter->latestRicePrice = $this->riceRepository->model
            ->latest()->first('global_avg_price')->global_avg_price ?? 0;

        return $counter;
    }

    public function donationChartData()
    {
        $labels = $this->donationRepository->model->latest()->take(10)->pluck('created_at')->toArray();
        $values = $this->donationRepository->model->latest()->take(10)->pluck('donate_amount')->toArray();

        $response = new \stdClass();
        $response->labels = $labels ?? [];
        $response->values = $values ?? [];

        return $response;
    }

    public function priceChartData()
    {
        $labels = $this->riceRepository->model->latest()->take(10)->pluck('created_at')->toArray();
        $values = $this->riceRepository->model->latest()->take(10)->pluck('global_avg_price')->toArray();

        $response = new \stdClass();
        $response->labels = $labels ?? [];
        $response->values = $values ?? [];

        return $response;
    }
}
