<?php  
 namespace App;  
 use File;  
 class deletephoto 
 {  
   private $uploadDir;  
   private $uploadFolder;  
   public function __construct()  
   {  
     $this->uploadDir = public_path('public/uploads/product/');  
    
   }  
   // Upload file  
   
   // Xoa file  
   public function removePhoto($originalFileName)  
   {  
     if ($this->isExistedFile($originalFileName)) File::delete($this->uploadFolder. $originalFileName);  
   }  
   
   //Kiem tra file ton tai hay khong  
   private function isExistedFile($originalFileName)  
   {  
     return File::exists($this->uploadDir. '/' . $originalFileName);  
   }  
}  
