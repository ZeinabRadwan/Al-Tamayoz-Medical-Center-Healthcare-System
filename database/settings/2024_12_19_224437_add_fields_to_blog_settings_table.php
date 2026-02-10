<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.contact_us', '');
        $this->migrator->add('blog.physical_therapy', '');
        $this->migrator->add('blog.occupational_therapy', '');
        $this->migrator->add('blog.speech_therapy', '');
        $this->migrator->add('blog.behavior_analysis', '');
    }
};
