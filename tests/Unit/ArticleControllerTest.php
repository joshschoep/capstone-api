<?php

namespace Tests\Unit;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Mockery;
use PHPUnit\Framework\TestCase;

class ArticleControllerTest extends TestCase
{
    protected $controller;

    public function setUp(): void {
        parent::setUp();
        $this->controller = new ArticleController();

        $modelMock = Mockery::mock(Article::class);
        app()->instance(Article::class, $modelMock);
    }

    public function testIndexShouldGetPaginatedResults() {
        $modelMock = Mockery::mock(Article::class);
        app()->instance(Article::class, $modelMock);
        Article::shouldReceive('paginate')->once();
        $this->controller->index();
    }
}
