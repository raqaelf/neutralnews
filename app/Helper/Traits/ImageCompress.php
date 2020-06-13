<?php

namespace App\Helper\Traits;
use File;

trait ImageCompress
{
	public static function uploadImage(
		$image,
		$pathUri = "uploads",
		$custom_name = null,
		$format = ".jpg",
		$resolution = [1024, 768],
		$quality = 80,
		$thumbnail = 99
	){
		$filename = date('dmY').time().rand(10000,99999)."_".$custom_name.".".$format;
		if (!empty($resolution[0])) {
			if ($image->width() > $resolution[0]) {
				$image->resize($resolution[0], null, function ($constraint) {
					$constraint->aspectRatio();
				});
			}
		}

		if (!empty($resolution[1])) {
			if ($image->height() > $resolution[1]) {
				$image->resize(null, $resolution[1], function ($constraint) {
					$constraint->aspectRatio();
				});
			}
		}

		$image->encode(null, $quality);
		$path = public_path($pathUri);
		if (!file_exists($path)) {
			File::makeDirectory($path, 0775, true);
		}

		if ($thumbnail > 99) {
			ImageCompress::createThumbnail($image, $thumbnail, $pathUri, $filename);
		}

		$image->save($path.'/'.$filename);
		return $filename;
	}

	public static function createThumbnail($image, $size, $pathUri, $filename)
	{
		$image->fit($size);
		$path = public_path($pathUri.'/thumbnail');
		if (!file_exists($path)) {
			File::makeDirectory($path, 0775, true);
		}
		$image->save($path.'/'.$filename);
	}
}
