<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
        $this->category->name = 'Category Fake';
        $this->assertNull($this->category->id);
        $this->category->save();
    }

    public function testCreateCategory(): void
    {
        $this->assertIsInt($this->category->id);
        $categoryDb = Category::query()->find($this->category->id);
        $this->assertEquals($this->category->id, $categoryDb->id);
        $this->assertEquals($this->category->name, $categoryDb->name);
    }

    public function testGetCategory(): void
    {
        $categoryDb = Category::query()->find($this->category->id);
        $this->assertNotNull($categoryDb);
    }

    public function testUpdateCategory(): void
    {
        $this->category->name = 'Updated Name';
        $this->category->save();
        $categoryDb = Category::query()->find($this->category->id);
        $this->assertSame($this->category->name, $categoryDb->name);
    }

    public function testDeleteCategory(): void
    {
        $categoryDb = Category::query()->find($this->category->id);
        $this->assertNotNull($categoryDb);

        $this->category->delete();

        $categoryDb = Category::query()->find($this->category->id);
        $this->assertNull($categoryDb);

    }

}
