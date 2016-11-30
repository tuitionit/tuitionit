<?php

namespace App\Http\Controllers\Backend\Institute;

use App\Models\Institute\Institute;
use App\Repositories\Backend\Institute\InstituteRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Institute\ManageInstituteRequest;
use App\Http\Requests\Backend\Institute\StoreInstituteRequest;

class InstituteController extends Controller
{
    /**
     * @var InstituteRepository
     */
    protected $institutes;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(InstituteRepository $institutes)
    {
        $this->institutes = $institutes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageInstituteRequest $request)
    {
        return view('backend.institute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
