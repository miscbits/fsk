<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class VideosController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'role:admin|leader|ops']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $videos = Video::paginate(15);

        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $video = $request->file('link');
        
        $videoFileName = time() . '.' . $video->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/videos/' . $videoFileName;
        $s3->put($filePath, file_get_contents($video), 'public');

        $input['video'] = $filePath;
        
        Video::create($input);

        Session::flash('flash_message', 'Video added!');

        return redirect('videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $video = Video::findOrFail($id);
        $video->update($request->all());

        Session::flash('flash_message', 'Video updated!');

        return redirect('videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Video::destroy($id);

        Session::flash('flash_message', 'Video deleted!');

        return redirect('videos');
    }
}
