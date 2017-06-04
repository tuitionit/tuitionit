<?php

namespace App\Http\Controllers\Backend\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Location\ManageLocationRequest;
use App\Http\Requests\Backend\Location\StoreLocationRequest;
use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Repositories\Backend\Location\LocationRepository;

class LocationController extends Controller
{
    /**
     * @var LocationRepository
     */
    protected $locations;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(LocationRepository $locations)
    {
        $this->locations = $locations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageLocationRequest $request)
    {
        return view('backend.location.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Institute $institute)
    {
        if(!access()->allow('manage-institutes') && $institute->id != access()->user()->institute_id) {
            $institute = access()->user()->institute;
        }

        return view('backend.location.create')->withInstitute($institute);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Institute $institute, StoreLocationRequest $request)
    {
        $data = $request->all();
        $data['institute_id'] = $institute->id;

        $location = Location::create($data);

        if(access()->allow('manage-institutes')) {
            return redirect()->route('admin.institutes.show', $institute->id)->withFlashSuccess(trans('alerts.backend.locations.created'));
        } else {
            return redirect()->route('admin.institute')->withFlashSuccess(trans('alerts.backend.locations.created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('backend.location.show')->withLocation($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('backend.location.edit')->withLocation($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Location\StoreLocationRequest  $request
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Location $location, StoreLocationRequest $request)
    {
        $location->update($request->all());
        return redirect()->route('admin.institutes.show', [$location->institute])->withFlashSuccess(trans('alerts.backend.locations.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
