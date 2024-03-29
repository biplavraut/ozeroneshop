<?php
    function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $exten, $quality = 100)
    {
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];
    
        switch ($mime) {
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;
    
            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 9;
                break;
    
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 90;
                break;
            case 'image/webp':
                $image_create = "imagecreatefromwebp";
                $image = "imagewebp";
                break;                 
    
            default:
                return false;
                break;
        }
    
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        if ($exten == "gif" or $exten == "png") {
            imagecolortransparent($dst_img, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
            imagealphablending($dst_img, false);
            imagesavealpha($dst_img, true);
        }
        $src_img = $image_create($source_file);
    
        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if ($width_new > $width) {
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        } else {
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }
    
        $image($dst_img, $dst_dir, $quality);
    
        if ($dst_img) imagedestroy($dst_img);
        if ($src_img) imagedestroy($src_img);
    }
    function make_thumb($img_name, $filename, $new_w, $new_h)
    {
        $src_img = imagecreatefromwebp($img_name);

        $old_x = imageSX($src_img);
        $old_y = imageSY($src_img);

        $ratio1 = $old_x / $new_w;
        $ratio2 = $old_y / $new_h;
        if ($ratio1 > $ratio2) {
            $thumb_w = $new_w;
            $thumb_h = $old_y / $ratio1;
        } else {
            $thumb_h = $new_h;
            $thumb_w = $old_x / $ratio2;
        }

        $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
        imagecolortransparent($dst_img, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
        imagealphablending($dst_img, false);
        imagesavealpha($dst_img, true);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

        imagepng($dst_img, $filename);

        imagedestroy($dst_img);
        imagedestroy($src_img);
    }

    function convertImageToWebP($source, $destination, $extension , $quality=90) {
    	if ($extension == 'jpeg' || $extension == 'jpg') 
    		$image = imagecreatefromjpeg($source);
    	elseif ($extension == 'gif') 
    		$image = imagecreatefromgif($source);
    	elseif ($extension == 'png') 
    		$image = imagecreatefrompng($source);
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
    	return imagewebp($image, $destination, $quality);    	
    }
    
    function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }
?>