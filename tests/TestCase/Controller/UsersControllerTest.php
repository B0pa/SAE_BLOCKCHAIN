<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Users',
    ];

    /**
     * Test beforeFilter method
     *
     * @return void
     * @uses \App\Controller\UsersController::beforeFilter()
     */
    public function testBeforeFilter(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test login method
     *
     * @return void
     * @uses \App\Controller\UsersController::login()
     */
    public function testLogin(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test logout method
     *
     * @return void
     * @uses \App\Controller\UsersController::logout()
     */
    public function testLogout(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test register method
     *
     * @return void
     * @uses \App\Controller\UsersController::register()
     */
    public function testRegister(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test update method
     *
     * @return void
     * @uses \App\Controller\UsersController::update()
     */
    public function testUpdate(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test updateactuality method
     *
     * @return void
     * @uses \App\Controller\UsersController::updateactuality()
     */
    public function testUpdateactuality(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test updateinfo method
     *
     * @return void
     * @uses \App\Controller\UsersController::updateinfo()
     */
    public function testUpdateinfo(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test updatequizz method
     *
     * @return void
     * @uses \App\Controller\UsersController::updatequizz()
     */
    public function testUpdatequizz(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
