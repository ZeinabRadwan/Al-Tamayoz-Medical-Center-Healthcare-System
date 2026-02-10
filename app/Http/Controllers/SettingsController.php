<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings\BlogSettings;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function updateMainImage(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'main_image' => 'required|image|max:2048',
        ]);

        $path = $request->file('main_image')->store('images', 'public');

        $settings->main_image = $path;
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث الصورة الرئيسية بنجاح!');
    }

    public function addGalleryImage(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'gallery_images.*' => 'required|image|max:2048',
        ]);

        $galleryImages = is_array($settings->gallery_images) ? $settings->gallery_images : [];

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('gallery_images', 'public');
                $galleryImages[] = $path;
            }
        }

        $settings->gallery_images = $galleryImages;
        $settings->save();

        return redirect()->back()->with('success', 'تم إضافة صور المعرض بنجاح!');
    }

    public function deleteGalleryImage(Request $request, BlogSettings $settings, $index)
    {
        $galleryImages = is_array($settings->gallery_images) ? $settings->gallery_images : [];

        if (isset($galleryImages[$index])) {
            Storage::disk('public')->delete($galleryImages[$index]);

            unset($galleryImages[$index]);

            $galleryImages = array_values($galleryImages);

            $settings->gallery_images = $galleryImages;
            $settings->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Image not found'], 404);
    }

    public function updateAboutUs(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'about_us' => 'string|max:10000',
        ]);


        $settings->about_us = $request->input('content');
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث قسم من نحن بنجاح!');
    }

    public function updateContactUs(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'contact_us' => 'string|max:10000',
        ]);

        $settings->contact_us = $request->input('content');
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث قسم اتصل بنا بنجاح!');
    }

    public function updatePhysicalTherapy(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'physical_therapy' => 'string|max:10000',
        ]);

        $settings->physical_therapy = $request->input('content');
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث قسم العلاج الطبيعي بنجاح!');
    }

    public function updateSpeechTherapy(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'speech_therapy' => 'string|max:10000',
        ]);

        $settings->speech_therapy = $request->input('content');
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث قسم علاج النطق بنجاح!');
    }

    public function updateOccupationalTherapy(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'occupational_therapy' => 'string|max:10000',
        ]);
        $settings->occupational_therapy = $request->input('content');
        $settings->save();
        return redirect()->back()->with('success', 'تم تحديث قسم العلاج الوظيفي بنجاح!');
    }

    public function updateBehaviorAnalysis(Request $request, BlogSettings $settings)
    {
        $request->validate([
            'behavior_analysis' => 'string|max:10000',
        ]);

        $settings->behavior_analysis = $request->input('content');
        $settings->save();

        return redirect()->back()->with('success', 'تم تحديث قسم تحليل السلوك بنجاح!');
    }

    public function update(Request $request)
    {
        $settings = app(BlogSettings::class);

        $settings->about_us = $request->input('about_us', $settings->about_us);
        $settings->contact_us = $request->input('contact_us', $settings->contact_us);
        $settings->physical_therapy = $request->input('physical_therapy', $settings->physical_therapy);
        $settings->occupational_therapy = $request->input('occupational_therapy', $settings->occupational_therapy);
        $settings->speech_therapy = $request->input('speech_therapy', $settings->speech_therapy);
        $settings->behavior_analysis = $request->input('behavior_analysis', $settings->behavior_analysis);


        $settings->save();


        return redirect()->back()->with('success', 'تم تحديث المحتوى بنجاح!');
    }
}
