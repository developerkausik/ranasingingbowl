<?php

namespace App\Http\Controllers\Admin\CopyData;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVarient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    //copy laser table data
    public function copyLaserData(Request $request)
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_laser')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $image = $row->laser_img; // Get image path
            $image = str_replace('uploads/', 'uploads/laser/', $image); // Update image URL

            if (!file_exists('uploads/laser/')) {
                mkdir('uploads/laser/', 0777, true); // Create directory if it doesn't exist
            }

            $oldPath = 'uploads/old/' . $row->laser_img; // Old path
            $newPath = 'uploads/laser/' . basename($oldPath);

            if (file_exists($oldPath)) {
                copy($oldPath, $newPath); // Copy file to new location
            } else {
                echo "File not found: $oldPath\n"; // Log error if file not found
            }

            $data = [
                'title' => $row->laser_name,
                'image' => $image,
                'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('lasers')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    //copy picture gallery table data

    public function copyGalleryData(Request $request)
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_picgallery')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $image = $row->gallery_pic; // Get image path
            $image = str_replace('uploads/', 'uploads/gallery/', $image); // Update image URL

            if (!file_exists('uploads/gallery/')) {
                mkdir('uploads/gallery/', 0777, true); // Create directory if it doesn't exist
            }

            $oldPath = 'uploads/old/' . $row->gallery_pic; // Old path
            $newPath = 'uploads/gallery/' . basename($oldPath);

            if (file_exists($oldPath)) {
                copy($oldPath, $newPath); // Copy file to new location
            } else {
                echo "File not found: $oldPath\n"; // Log error if file not found
            }

            $data = [
                'title' => $row->pic_name,
                'image' => $image,
                'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('gallery_pictures')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    public function copyGalleryVideoData()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_videogallery')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {

            $data = [
                'title' => $row->video_name,
                'video' => $row->gallery_video,
                'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('gallery_videos')->insert($data); // Insert row (cast to array)
        }
        echo "Data copied successfully!";
    }

    /* PRODUCT CATEGORY COPY */

    public function copyProductCategory()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_category')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $image = $row->category_banner; // Get image path
            $image = str_replace('uploads/', 'uploads/products/category/', $image); // Update image URL

            if (!file_exists('uploads/products/category/')) {
                mkdir('uploads/products/category/', 0777, true); // Create directory if it doesn't exist
            }

            $oldPath = 'uploads/old/' . $row->category_banner; // Old path
            $newPath = 'uploads/products/category/' . basename($oldPath);

            if (file_exists($oldPath)) {
                copy($oldPath, $newPath); // Copy file to new location
            } else {
                echo "File not found: $oldPath\n"; // Log error if file not found
            }

            $data = [
                'id' => $row->category_id,
                'title' => $row->category_name,
                'manufactured' => $row->manufactured,
                'description' => $row->dsc,
                'slug' => $row->slug,
                'meta_title' => $row->meta_title,
                'meta_description' => $row->meta_description,
                'sort_order' => $row->category_sort,
                'image' => $image,
                'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('product_categories')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    /* PRODUCT COPY */

    public function copyProduct()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_products')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $image = $row->product_img; // Get image path
            $image = str_replace('./uploads/products/', 'uploads/products/products/', $image); // Update image URL

            if (!file_exists('uploads/products/products/')) {
                mkdir('uploads/products/products/', 0777, true); // Create directory if it doesn't exist
            }

            $oldPath = 'uploads/old/' . $row->product_img; // Old path
            $newPath = 'uploads/products/products/' . basename($oldPath);

            if (file_exists($oldPath)) {
                copy($oldPath, $newPath); // Copy file to new location
            } else {
                echo "File not found: $oldPath\n"; // Log error if file not found
            }

            $data = [
                'id' => $row->product_id,
                'category_id' => $row->category_id,
                'title' => $row->product_name,
                'description' => $row->product_description,
                'slug' => $row->slug,
                'image' => $image,
                'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'latest_product' => ($row->latest_pro == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'new_product' => ($row->new_product == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('products')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    /* PRODUCT Image COPY */

    public function copyProductImage()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_products_img')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $image = $row->product_pic; // Get image path
            if ($image != '') {
                $image = str_replace('uploads/', 'uploads/products/image/', $image); // Update image URL

                if (!file_exists('uploads/products/image/')) {
                    mkdir('uploads/products/image/', 0777, true); // Create directory if it doesn't exist
                }

                $oldPath = 'uploads/old/' . $row->product_pic; // Old path
                $newPath = 'uploads/products/image/' . basename($oldPath);

                if (file_exists($oldPath)) {
                    copy($oldPath, $newPath); // Copy file to new location
                } else {
                    echo "File not found: $oldPath\n"; // Log error if file not found
                }

                $data = [
                    'id' => $row->pic_id,
                    'product_id' => $row->product_id,
                    'product_code' => $row->product_code,
                    'title' => $row->product_type_name,
                    'image' => $image,
                    'created_at' => now(), // Set created_at to current time
                    'updated_at' => now(), // Set updated_at to current time
                ];

                DB::connection('mysql')->table('product_images')->insert($data); // Insert row (cast to array)
            }
        }

        echo "Data copied successfully!";
    }

    /* PRODUCT Varient COPY */

    public function copyProductVarient()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_product_variant')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {

            $checkProductExists = DB::connection('mysql')->table('products')
                ->where('id', $row->product_id)
                ->exists(); // Check if product exists in new DB
            if (!$checkProductExists) {
                echo "Product ID {$row->product_id} does not exist in new DB. Skipping variant.\n";
                continue; // Skip this iteration if product doesn't exist
            }

            $image = $row->variant_pic_main; // Get image path
            if ($image != '') {
                $image = str_replace('uploads/', 'uploads/products/varient/', $image); // Update image URL

                if (!file_exists('uploads/products/varient/')) {
                    mkdir('uploads/products/varient/', 0777, true); // Create directory if it doesn't exist
                }

                $oldPath = 'uploads/old/' . $row->variant_pic_main; // Old path
                $newPath = 'uploads/products/varient/' . basename($oldPath);

                if (file_exists($oldPath)) {
                    copy($oldPath, $newPath); // Copy file to new location
                } else {
                    echo "File not found: $oldPath\n"; // Log error if file not found
                }

                $data = [
                    'id' => $row->variant_id,
                    'product_id' => $row->product_id,
                    'varient_code' => $row->variant_code,
                    'title' => $row->variant_name,
                    'description' => $row->variant_description,
                    'image' => $image,
                    'slug' => $row->slug,
                    'status' => ($row->status == 'Y') ? 1 : 0, // Convert 'Y'/'N' to 1/0
                    'created_at' => now(), // Set created_at to current time
                    'updated_at' => now(), // Set updated_at to current time
                ];

                for ($index = 1; $index <= 4; $index++) {
                    $imageField = 'variant_pic' . $index;
                    if ($row->$imageField != '') {
                        $image = $row->$imageField;
                        $image = str_replace('uploads/', 'uploads/products/varient/', $image); // Update image URL

                        if (!file_exists('uploads/products/varient/')) {
                            mkdir('uploads/products/varient/', 0777, true); // Create directory if it doesn't exist
                        }

                        $oldPath = 'uploads/old/' . $row->$imageField; // Old path
                        $newPath = 'uploads/products/varient/' . basename($oldPath);

                        if (file_exists($oldPath)) {
                            copy($oldPath, $newPath); // Copy file to new location
                        } else {
                            echo "File not found: $oldPath\n"; // Log error if file not found
                        }

                        $data['image' . $index] = $image;
                    }
                }

                DB::connection('mysql')->table('product_varients')->insert($data); // Insert row (cast to array)
            }
        }

        echo "Data copied successfully!";
    }

    /* COPY CONTACT REQUEST */
    public function copyContactRequest()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_contact_request')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $data = [
                'name' => $row->name,
                'email' => $row->email_id,
                'phone' => $row->mobile_no,
                'message' => $row->msg,
                'contacted_at' => date('Y-m-d H:i:s', $row->contact_date),
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('contact_requests')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    /* COPY ENQUIRY REQUEST */
    public function copyEnquiryRequest()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_complainquery')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {
            $data = [
                'name' => $row->name,
                'email' => $row->email_id,
                'phone' => $row->mobile_no,
                'message' => $row->msg,
                'contacted_at' => $row->enq_date,
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('enquiry')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }

    /* COPY PRODUCT ENQUIRY REQUEST */
    public function copyProductEnquiryRequest()
    {
        $sourceData = DB::connection('mysql_old')  // Connect to old DB
            ->table('rsb_product_enquiry')    // Choose source table
            ->get();                   // Get all rows

        foreach ($sourceData as $row) {

            $product = Product::where('id', $row->product_id)->first();
            if (!$product) {
                echo "Product ID {$row->product_id} does not exist in new DB. Skipping enquiry.\n";
                continue; // Skip this iteration if product doesn't exist
            }

            if($row->variant_id > 0){
                $variant = ProductVarient::where('id', $row->variant_id)->first();
                if (!$variant) {
                    echo "Variant ID {$row->variant_id} does not exist in new DB. Skipping enquiry.\n";
                    continue; // Skip this iteration if variant doesn't exist
                }
            }

            $data = [
                'name' => $row->contact_name,
                'email' => $row->contact_email,
                'phone' => $row->contact_mobile,
                'message' => $row->contact_msg,
                'contacted_at' => date('Y-m-d H:i:s', $row->contact_date),
                'product_id' => $row->product_id,
                'variant_id' => ($row->variant_id > 0) ? $row->variant_id : null,
                'size' => $row->size,
                'quantity' => $row->quantity,
                'created_at' => now(), // Set created_at to current time
                'updated_at' => now(), // Set updated_at to current time
            ];

            DB::connection('mysql')->table('product_enquiries')->insert($data); // Insert row (cast to array)
        }

        echo "Data copied successfully!";
    }
}
