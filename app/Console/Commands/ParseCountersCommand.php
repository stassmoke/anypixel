<?php

namespace App\Console\Commands;

use App\Integration\EvantoMarketApi;
use App\Models\Counter;
use App\Repository\CounterRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ParseCountersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:counters {nickname} {site}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update counters';

    /**
     * @var EvantoMarketApi
     */
    private $evantoMarketApi;

    /**
     * @var CounterRepositoryInterface
     */
    private $counterRepository;

    /**
     * ParseCountersCommand constructor.
     * @param EvantoMarketApi $evantoMarketApi
     * @param CounterRepositoryInterface $counterRepository
     */
    public function __construct(EvantoMarketApi $evantoMarketApi, CounterRepositoryInterface $counterRepository)
    {
        parent::__construct();

        $this->evantoMarketApi = $evantoMarketApi;
        $this->counterRepository = $counterRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $nickname = $this->argument('nickname');
        $site = $this->argument('site');

        $userInfo = $this->evantoMarketApi->getUserInformationByName($nickname);

        $items = $this->evantoMarketApi->getItemsBySite($nickname);

        $siteInfo = Arr::first($items->{'user-items-by-site'}, function (\stdClass $project) use ($site) {
            return $project->site === $site;
        });

        $projectCounts = (int) $siteInfo->items;

        $salesCount = (int) $userInfo->user->sales;

        $this->counterRepository->updateCount(Counter::SALES_ALIAS, $salesCount);
        $this->counterRepository->updateCount(Counter::PROJECTS_ALIAS, $projectCounts);

        $this->info('SALES:' . $salesCount . ' PROJECTS:' . $projectCounts);
    }
}
