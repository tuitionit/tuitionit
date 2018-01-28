<?php

namespace App\Http\Controllers\Backend\Access\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class UserListController.
 */
class UserListController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $usersQuery = $this->users->searchByName($request->input('name'));

        if ($request->has('type')) {
            $usersQuery->where('type', '=', $request->input('type'));
        }

        $users = $usersQuery->get();

        $list = $users->map(function ($user) {
            return ['id' => $user->id, 'text' => $user->name];
        });

        return $list->all();
    }
}
