<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Faker\Factory;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
}
