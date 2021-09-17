<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Question;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // modify this to your own needs
        $sitemap=  Sitemap::create(config('app.url'));
        Question::select('slug')->get()->each(fn ($question) => $sitemap->add($question->slug));
        ServiceSubCategory::select('slug')->get()->each(fn ($ServiceSubCategory) => $sitemap->add($ServiceSubCategory->slug));
        Page::select('slug')->get()->each(fn ($page) => $sitemap->add($page->slug));
        // ->add(ServiceCategory::all())
            
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
