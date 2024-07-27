<?php

// namespace App\Jobs;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Storage;

// class ResizeImage implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $imagePath;
//     protected $width;
//     protected $height;

//     public function __construct($imagePath, $width, $height)
//     {
//         $this->imagePath = $imagePath;
//         $this->width = $width;
//         $this->height = $height;
//     }

//     public function handle()
//     {
//         $path = storage_path('app/public/' . $this->imagePath);

//         if (!file_exists($path)) {
//             \Log::error("Image file does not exist at path: $path");
//             return;
//         }

//         try {
//             $image = Image::make($path);

//             // Ridimensiona l'immagine
//             $image->resize($this->width, $this->height, function ($constraint) {
//                 $constraint->aspectRatio();
//                 $constraint->upsize();
//             });

//             $resizedFilePath = 'images/resized/' . basename($this->imagePath);
//             $image->save(storage_path('app/public/' . $resizedFilePath));

//             \Log::info("Image resized and saved to: $resizedFilePath");
//         } catch (\Exception $e) {
//             \Log::error("Failed to resize image: " . $e->getMessage());
//         }
//     }
// }
