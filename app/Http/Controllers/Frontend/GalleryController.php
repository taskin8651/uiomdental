<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use App\Models\BeforeAfterGallery;


class GalleryController extends Controller
{
    public function index()
    {
        $galleryCategories = GalleryCategory::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $galleryItems = GalleryItem::with(['category', 'media'])
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();


$beforeAfterGalleries = BeforeAfterGallery::with('media')
    ->where('status', 1)
    ->orderBy('sort_order', 'asc')
    ->get();


        return view('frontend.gallery', compact(
            'galleryCategories',
            'galleryItems'
        ));
    }
}