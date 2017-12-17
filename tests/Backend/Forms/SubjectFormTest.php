<?php

use Tests\BrowserKitTestCase;
use App\Models\Subject\Subject;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

/**
 * Class SubjectFormTest.
 */
class SubjectFormTest extends BrowserKitTestCase
{
    public function testCreateSubjectWithoutRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/subjects/create')
             ->type('', 'name')
             ->type('', 'description')
             ->press('Create')
             ->see('The name field is required.');
    }

    public function testCreateSubjectFailsWithExistingName()
    {
        $subject = factory(Subject::class)->create();

        $this->actingAs($this->admin)
             ->visit('/admin/subjects/create')
             ->type($subject->name, 'name')
             ->type('', 'description')
             ->press('Create')
             ->see('The name has already been taken.');
    }

    public function testUpdateSubjectWithoutRequiredFields()
    {
        $subject = factory(Subject::class)->create();

        $this->actingAs($this->admin)
             ->visit('/admin/subjects/' . $subject->id . '/edit')
             ->type('', 'name')
             ->type('', 'description')
             ->press('Update')
             ->see('The name field is required.');
    }

/*
    public function testUpdateSubjectForm()
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

        Event::assertDispatched(SubjectUpdated::class);
    }

    public function testDeleteSubjectForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->delete('/admin/access/user/'.$this->user->id)
             ->assertRedirectedTo('/admin/access/user/deleted')
             ->notSeeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null]);

        Event::assertDispatched(SubjectDeleted::class);
    }
*/
}
