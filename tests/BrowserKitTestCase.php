<?php

namespace Tests;

use App\Models\Access\Role\Role;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://l5boilerplate.dev';

    /**
     * @var
     */
    protected $admin;

    /**
     * @var
     */
    protected $executive;

    /**
     * @var
     */
    protected $manager;

    /**
     * @var
     */
    protected $teacher;

    /**
     * @var
     */
    protected $student;

    /**
     * @var
     */
    protected $parent;

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $adminRole;

    /**
     * @var
     */
    protected $executiveRole;

    /**
     * @var
     */
    protected $managerRole;

    /**
     * @var
     */
    protected $teacherRole;

    /**
     * @var
     */
    protected $studentRole;

    /**
     * @var
     */
    protected $parentRole;

    /**
     * @var
     */
    protected $userRole;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();

        $this->baseUrl = config('app.url', 'http://l5boilerplate.dev');

        // Set up the database
        Artisan::call('migrate:refresh', ['--database' => 'system']);
        Artisan::call('migrate:refresh', ['--database' => 'tenant', '--path' => './database/migrations/tenant']);
        Artisan::call('db:seed', ['--database' => 'system', '--class' =>'InstituteTableSeeder']);
        Artisan::call('db:seed', ['--database' => 'tenant']);

        // Run the tests in English
        App::setLocale('en');

        /*
         * Create class properties to be used in tests
         */
        $this->admin = User::find(1);
        $this->executive = User::find(2);
        $this->manager = User::find(3);
        $this->teacher = User::find(4);
        $this->student = User::find(5);
        $this->parent = User::find(6);
        $this->user = User::find(7);
        $this->adminRole = Role::find(1);
        $this->executiveRole = Role::find(2);
        $this->managerRole = Role::find(3);
        $this->teacherRole = Role::find(4);
        $this->studentRole = Role::find(5);
        $this->parentRole = Role::find(6);
        $this->userRole = Role::find(7);
    }

    public function tearDown()
    {
        $this->beforeApplicationDestroyed(function () {
            DB::disconnect();
        });

        parent::tearDown();
    }
}
