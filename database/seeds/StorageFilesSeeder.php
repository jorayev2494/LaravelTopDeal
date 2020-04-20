<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StorageFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Copy Admin Images
        File::deleteDirectory(storage_path("/app/public/images"));
        // File::copyDirectory(base_path("/resources/assets/images"), storage_path("app/public/images"));

        // Copy TopDeal Images
        // File::deleteDirectory(storage_path("/app/public/images"));
        File::copyDirectory(base_path("/resources/topDeal/images"), storage_path("app/public/images"));
    }
}
