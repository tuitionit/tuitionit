<?php

use Tests\BrowserKitTestCase;
use App\Models\Institute\Institute;
use App\Models\Institute\Institute;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Institute\InstituteCreated;
use App\Events\Backend\Institute\InstituteDeleted;
use App\Events\Backend\Institute\InstituteUpdated;

/**
 * Class InstituteFormTest.
 */
class InstituteFormTest extends BrowserKitTestCase
{
    public function testCreateInstituteRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/institute/create')
             ->type('', 'name')
             ->type('', 'code')
             ->type('', 'domain')
             ->press('Create')
             ->see('The name field is required.')
             ->see('The code field is required.');
             ->see('The domain field is required.');
    }

    public function testCreateInstituteFailsIfCodeExists()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/institutes/create')
             ->type('Tuitionix', 'name')
             ->type('TUITIONIX', 'code')
             ->type('tuitionix', 'domain')
             ->press('Create')
             ->seePageIs('/admin/institutes/create')
             ->see('The code has already been taken.');
    }

    public function testCreateInstituteFailsIfDomainExists()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/institutes/create')
             ->type('Tuitionix', 'name')
             ->type('TUITIONIX', 'code')
             ->type('tuitionix', 'domain')
             ->press('Create')
             ->seePageIs('/admin/institutes/create')
             ->see('The domain has already been taken.');
    }

    public function testUpdateUserRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/institutes/1/edit')
             ->type('', 'name')
             ->type('', 'code')
             ->type('', 'domain')
             ->press('Update')
             ->see('The name field is required.')
             ->see('The code field is required.');
             ->see('The domain field is required.');
    }

    public function testUpdateUserForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/edit')
             ->see($this->user->name)
             ->see($this->user->email)
             ->type('User New', 'name')
             ->type('user2@user.com', 'email')
             ->uncheck('status')
             ->uncheck('confirmed')
             ->check('assignees_roles[2]')
             ->uncheck('assignees_roles[3]')
             ->press('Update')
             ->seePageIs('/admin/access/user')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.users_table'),
                 [
                     'id'        => $this->user->id,
                     'name'      => 'User New',
                     'email'     => 'user2@user.com',
                     'status'    => 0,
                     'confirmed' => 0,
                 ])
             ->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => 2])
             ->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => 3]);

        Event::assertDispatched(InstituteUpdated::class);
    }

    public function testDeleteUserForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->delete('/admin/access/user/'.$this->user->id)
             ->assertRedirectedTo('/admin/access/user/deleted')
             ->notSeeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null]);

        Event::assertDispatched(InstituteDeleted::class);
    }

    public function testUserCanNotDeleteSelf()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user')
             ->delete('/admin/access/user/'.$this->admin->id)
             ->assertRedirectedTo('/admin/access/user')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->admin->id, 'deleted_at' => null])
             ->seeInSession(['flash_danger' => 'You can not delete yourself.']);
    }
}
