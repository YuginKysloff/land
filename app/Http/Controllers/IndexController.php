<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Slide;
use App\Mail\CallBackFromStudioSite;
use Illuminate\Support\Facades\Mail;
use Session;

class IndexController extends Controller
{
    protected $data;

    public function __construct()
    {
        // Get settings of site
        $settings = Settings::all();
        foreach($settings as $item) {
            $this->data['settings'][$item->name] = $item->value;
        }
    }

    public function index(Request $request) {

        if($request->isMethod('post')) {

            // Validation input data from form
            $this->validate($request, [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email',
                'message' => 'required'
            ], [
                'min' => 'Поле :attribute должно быть больше 2 символов',
                'max' => 'Поле :attribute должно быть меньше 100 символов',
                'required' => 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле :attribute должно соответствовать email адресу'
            ]);

            Mail::to(env('MAIL_ADMIN'))->send(new CallBackFromStudioSite($request));
            Session::flash('success', 'Ваше сообщение отправлено!');
            return view('site.answer', $this->data);
        } else {

            // Get published slides
            $this->data['slides'] = Slide::where('published', 1)->get();

            return view('site.index', $this->data);
        }
    }
}
