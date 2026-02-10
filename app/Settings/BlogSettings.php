<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BlogSettings extends Settings
{
    public string $main_image = '';
    public array $gallery_images = [];
    public string $about_us = '';
    public string $contact_us = '';
    public string $physical_therapy = '';
    public string $occupational_therapy = '';
    public string $speech_therapy = '';
    public string $behavior_analysis = '';


    public static function group(): string
    {
        return 'blog';
    }
}
