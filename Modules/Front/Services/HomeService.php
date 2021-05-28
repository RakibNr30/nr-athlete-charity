<?php

namespace Modules\Front\Services;

use Modules\Cms\Repositories\BannerRepository;
use Modules\Cms\Repositories\CasesRepository;
use Modules\Cms\Repositories\NewsRepository;
use Modules\Cms\Repositories\TestimonialRepository;
use Modules\Ums\Repositories\UserRepository;

class HomeService
{
    protected $bannerRepository;
    protected $casesRepository;
    protected $newsRepository;
    protected $testimonialRepository;
    protected $userRepository;

    public function __construct
    (
        BannerRepository $bannerRepository,
        CasesRepository $casesRepository,
        NewsRepository $newsRepository,
        TestimonialRepository $testimonialRepository,
        UserRepository $userRepository
    )
    {
        $this->bannerRepository = $bannerRepository;
        $this->casesRepository = $casesRepository;
        $this->newsRepository = $newsRepository;
        $this->testimonialRepository = $testimonialRepository;
        $this->userRepository = $userRepository;
    }

    public function banner($data)
    {
        return $this->bannerRepository->model->firstOrCreate($data);
    }

    public function cases($limit = 0)
    {
        return $this->casesRepository->model
            ->orderByDesc('created_at')
            ->take($limit)->get();
    }

    public function news($limit = 0)
    {
        return $this->newsRepository->model
            ->orderByDesc('created_at')
            ->take($limit)->get();
    }

    public function testimonials()
    {
        return $this->testimonialRepository->model
            ->orderByDesc('created_at')
            ->get();
    }
}
