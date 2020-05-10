<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\FrontEnd\Entities\SiteInfo;
use Modules\FrontEnd\Entities\Language;
use Modules\FrontEnd\Transformers\Language as LanguageResource;
use Modules\FrontEnd\Transformers\SiteInfo as SiteInfoResource;
class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function lanAll()
    {
        $Language = Language::all();
        return LanguageResource::collection($Language);
    }

    public function lanGet($id){
        $Language = Language::where('id',$id)->get();
        return new LanguageResource($Language);
    }

    public function SiteInfo($id){
        $SiteInfo = SiteInfo::where('language_id',$id)->first();
        return new SiteInfoResource($SiteInfo);
    }


    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('frontend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
