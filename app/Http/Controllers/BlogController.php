<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Settings\BlogSettings;


class BlogController extends Controller
{
    public function index(BlogSettings $settings)
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs', 'settings'));
    }

    public function create()
    {
        $blogs = Blog::all();
        return view('admin.blogs.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.create')->with('success', 'Blog created successfully.');
    }

    public function showAll(BlogSettings $settings)
    {
        $blogs = Blog::all();
        $mainImage = $settings->main_image ?? null;
        $galleryImages = $settings->gallery_images;
        $contactUs = $settings->contact_us;
        $aboutUs = $settings->about_us;

        preg_match('/من نحن(.*?)(?=رؤيتنا|$)/s', $aboutUs, $whoWeAreMatch);
        preg_match('/رؤيتنا(.*?)(?=رسالتنا|$)/s', $aboutUs, $visionMatch);
        preg_match('/رسالتنا(.*?)(?=قيمنا|$)/s', $aboutUs, $messageMatch);

        $aboutUsSections = [
            'who_we_are' => isset($whoWeAreMatch[1]) ? strip_tags(trim($whoWeAreMatch[1])) : 'Content for "من نحن" is missing.',
            'vision' => isset($visionMatch[1]) ? strip_tags(trim($visionMatch[1])) : 'Content for "رؤيتنا" is missing.',
            'message' => isset($messageMatch[1]) ? strip_tags(trim($messageMatch[1])) : 'Content for "رسالتنا" is missing.',
        ];


        return view('landingPage.index', compact('blogs', 'mainImage', 'galleryImages', 'aboutUsSections', 'contactUs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $blog = Blog::find($id);
        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function showBlog($id)
    {
        $blog = Blog::find($id);
        return view('landingPage.show', compact('blog'));
    }

    public function showGallery(BlogSettings $settings)
    {
        $galleryImages = $settings->gallery_images;
        return view('landingPage.gallery', compact('galleryImages'));
    }

    public function showAboutUs(BlogSettings $settings)
    {
        $aboutUs = $settings->about_us;
        return view('landingPage.about', compact('aboutUs'));
    }

    // mainn image
    public function showMainImage(BlogSettings $settings)
    {
        $mainImage = $settings->main_image;
        return view('setting.main-image', compact('mainImage'));
    }

    // gallary images
    public function showGalleryImages(BlogSettings $settings)
    {
        $galleryImages = $settings->gallery_images;

        return view('setting.gallary', compact('galleryImages', 'settings'));
    }

    public function deleteImage($image)
    {
        try {

            $blogSettings = app(BlogSettings::class);
            $galleryImages = $blogSettings->gallery_images;

            $updatedImages = array_filter($galleryImages, fn($img) => $img !== $image);

            $blogSettings->gallery_images = array_values($updatedImages);
            $blogSettings->save();

            Storage::disk('public')->delete($image);

            return redirect()->back()->with('success', 'Image deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the image.');
        }
    }
}
