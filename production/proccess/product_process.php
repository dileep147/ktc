<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $product = new Product();
    $product->service_no = trim($_POST['service_no']);
    $product->brand = trim($_POST['brand']);
    $product->name = trim($_POST['name']);
    $product->code = trim($_POST['code']);    
    $product->ops_1 = trim($_POST['ops_1']);
    $product->ops_2 = trim($_POST['ops_2']);
    $product->price = trim($_POST['price']);



    try {
         if (isset($_FILES["files_to_upload"]["name"]) && !empty($_FILES["files_to_upload"]["name"])) {
            $image_upload = new ImageUpload();
            $image_name = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
            $product->image = $image_name;
        } else {
//            $user->image = NULL;
        }




        $product->save();

        $last_product = Product::last_insert_id();

        foreach(Branch::find_all() as $branch_data){
            if(isset($_POST[$branch_data->id])){
                $product_branch = new ProductBranch();
                $product_branch->product_id = $last_product;
                $product_branch->branch_id = $branch_data->id;
                $product_branch->save();
            }
        }

        Activity::log_action("Product - saved : ".$product->name);
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../Product.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../Product.php");
    }
}

if (isset($_POST['update'])) {
    $product = Product::find_by_id($_POST['id']);
    $product->service_no = trim($_POST['service_no']);
    $product->brand = trim($_POST['brand']);
    $product->name = trim($_POST['name']);
    $product->code = trim($_POST['code']);    
    $product->ops_1 = trim($_POST['ops_1']);
    $product->ops_2 = trim($_POST['ops_2']);
    $product->price = trim($_POST['price']);
   
    try {
         if (isset($_FILES["files_to_upload"]["name"]) && !empty($_FILES["files_to_upload"]["name"])) {
            $image_upload = new ImageUpload();
            $image_name = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
            $product->image = $image_name;
        } else {
//            $user->image = NULL;
        }
        $product->save();
        Activity::log_action("Product - updated : ".$product->name);
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../Product.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../Product.php");
    }
}


if (isset($_POST['delete'])) {
    
    $product = Product::find_by_id($_POST["id"]);
    
    print_r($product);
    
    try {
        $product->delete();
        Activity::log_action("Product - deleted : ".$product->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../Product.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../Product.php");
    }
}
?>

