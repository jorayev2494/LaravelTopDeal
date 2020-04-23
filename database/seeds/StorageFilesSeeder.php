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
        // Clear Storage Public Images
        File::deleteDirectory(storage_path("/app/public/images"));
        
        // Copy Admin Images
        File::copyDirectory(base_path("/resources/assets/images"), storage_path("app/public/images"));

        // Copy TopDeal Images
        // File::deleteDirectory(storage_path("/app/public/images"));
        File::copyDirectory(base_path("/resources/topDeal/image"), storage_path("app/public/images"));
    }
}
