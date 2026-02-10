<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.gallery_images', []);
    }

    public function down(): void
    {
        $this->migrator->delete('blog.gallery_images');
    }
};
