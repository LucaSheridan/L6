<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
 
class UploadController extends Controller {
   
   public function UploadSingleFile(Request $request) {
     
       $path = $request->file('file')->store('uploads');

   }

   public function UploadMultipleFiles(Request $request) {
     
       $filesToUpload = $request->file('files');

       foreach ($filesToUpload as $file){

       $file->store('uploads');
       }
   }

   public function UploadSelectFiles(Request $request) {
     
       $filesToUpload = $request->file('files');

       foreach ($filesToUpload as $file){

       $file->store('uploads');

       Storage::disk('local')->put('file.txt', 'Contents');
       }
   }
}