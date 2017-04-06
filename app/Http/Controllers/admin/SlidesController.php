<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Validator;

class SlidesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all records from slides table
        $data['slides'] = Slide::all();

        $data['title'] = 'Секция управления слайдами';

        return view('admin.slides', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['count'] = Slide::count() + 1;
        $data['title'] = 'Добавление слайда';

        return view('admin.addSlide', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['slide'] = Slide::findOrFail($request->id);
        $view['html'] = view('admin.modalSlide', $data)->render();

        return response()->json($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $input = $request->except('_token');
        $validator = Validator::make($input, [

        ]);
        if($validator->fails()) {
            return redirect(route('createSlide'))->withErrors($validator)->withInput();
        }

        //Add record to DB
        Slide::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'published' => ($request->published) ? $request->published : 0,
            'weight' => $request->weight
        ]);

        return redirect(route('slides'))->with('message', 'Слайд добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['slide'] = Slide::findOrFail($id);
        $data['title'] = 'Редактрование слайда';

        return view('admin.editSlide', $data);
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
        // Validation

        // Update DB

        return redirect(route('slides'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slide = Slide::findOrFail($request->id);
        $slide->delete();

        return redirect(route('slides'));
    }
}
