<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //

    public function addslider()
    {
        $sliders = Slider::all();
        return view('admin.addslider')->with('sliders', $sliders);
    }

    public function sliders()
    {
        $sliders = Slider::all();
        return view('admin.sliders')->with('sliders', $sliders);
    }


    public function saveslider(Request $request)
    {
        $this->validate($request, ['description1' => 'required', 'description2' => 'required', 'slider_image' => 'image|nullable|max:1999|required']);

        if ($request->hasFile('slider_image')) {
            //1:get file name with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            //4: file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //Upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;

        $slider->save();
        return back()->with('status', 'The slider has been successfully saved !! ');

    }

    public function updateslider(Request $request)
    {
        $this->validate($request, ['description1' => 'required', 'description2' => 'required', 'slider_image' => 'image|nullable|max:1999']);

        $slider = Slider::find($request->input('id'));

        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        if ($request->hasFile('slider_image')) {
            //1:get file name with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            //2: get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            //4: file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //Upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

            if ($slider->slider_image != 'noimage.jpg') {
                Storage::delete('public/slider_images/' . $slider->slider_image);
            }

            $slider->slider_image = $fileNameToStore;
        }

        $slider->update();
        return redirect('/sliders')->with('status', 'The slider has been successfully updated !!');
    }

    public function activate_slider($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return back()->with('status', 'The Slider has been successfully activated !!');
    }

    public function unactivate_slider($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return back()->with('status', 'The Slider has been successfully unactivated !!');
    }

    public function edit_slider($id)
    {
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider', $slider);
    }

    public function delete_slider($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return back()->with('status', 'The Slider has been successfully deleted !!');
    }

}
