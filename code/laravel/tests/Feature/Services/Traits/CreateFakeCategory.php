<?php
namespace Tests\Feature\Services\Traits;

use App\Services\Categories\CreateCategoryService;

trait CreateFakeCategory
{
    private function createFakeCategory(string $expectedName = 'category test')
    {
        return ($this->app->make(CreateCategoryService::class))('category test');
        //$this->app->make(CreateCategoryService::class)->__invoke('category test')

        //$service = $this->app->make(CreateCategoryService::class);
        //$service('category test')
    }
}
