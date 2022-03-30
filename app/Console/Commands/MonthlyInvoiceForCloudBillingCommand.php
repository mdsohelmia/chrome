<?php

namespace App\Console\Commands;

use HeadlessChromium\BrowserFactory;
use Illuminate\Console\Command;

class MonthlyInvoiceForCloudBillingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:browser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $browserFactory = new BrowserFactory();
        // starts headless chrome
        $browser = $browserFactory->createBrowser(['headless' => false]);
        $page = $browser->createPage();
        $page->navigate('https://cloud.gotipath.com/redirectionVerification?ott=ea0c8005-c4d3-4f39-bc72-154b429aeb68')->waitForNavigation('networkIdle', 10000);;
        $pageTitle = $page->evaluate('document.title')->getReturnValue();
        return 0;
    }
}
