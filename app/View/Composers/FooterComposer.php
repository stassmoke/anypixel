<?php

namespace App\View\Composers;

use App\Repository\SocialRepositoryInterface;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * @var SocialRepositoryInterface
     */
    private $socialRepository;

    /**
     * FooterComposer constructor.
     * @param SocialRepositoryInterface $socialRepository
     */
    public function __construct(SocialRepositoryInterface $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('socials', $this->socialRepository->getSorted());
    }
}
