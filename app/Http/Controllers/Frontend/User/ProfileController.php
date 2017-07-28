<?php

namespace App\Http\Controllers\Frontend\User;

use Storage;
use App\Helpers\Frontend\Input\Canvas;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function avatar(UpdateProfileRequest $request)
    {
        // save the image
        if($request->has('picture')) {
            $content = Canvas::toImage($request->input('picture'));
            Storage::disk('public')->put('img/sources/' . $source->id . '/avatar.png', $content);
        }
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->all());

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }

        // save the image
        if($request->has('picture')) {
            $content = Canvas::toImage($request->input('picture'));
            Storage::disk('public')->put('img/sources/' . $source->id . '/avatar.png', $content);
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }
}
