<?php

/*
  array(1) {
  ["todo"]=>
  array(2) {
  ["compression"]=>
  array(2) {
  ["checked"]=>
  string(4) "true"
  ["value"]=>
  string(2) "50"
  }
  ["size"]=>
  array(3) {
  ["checked"]=>
  string(4) "true"
  ["value"]=>
  string(4) "3000"
  ["type"]=>
  string(2) "kb"
  }
  }
 */

class Mogrify {

	public function convert($aFileData, $aConversionTypes) {
		$mogrify = 'convert -strip -interlace Plane ';

		foreach ($aConversionTypes['todo'] as $key => $value) {
			if ($this->ifChecked($key, 'compression', $value['checked'])) {
				$mogrify.='-quality '.$value['value'].'% ';
			} else if ($this->ifChecked($key, 'size', $value['checked'])) {
				
			}
		}

		$oldFilePath = $aFileData['upload_data']['full_path'];

		$lastSlashPos = strrpos($oldFilePath, "/");
		$newFilePath = substr_replace($oldFilePath, '', $lastSlashPos+1);
		$newFile = uniqid().'.'.$aFileData['upload_data']['image_type'];

		$newFilePath.= $newFile;
		
		$mogrify.= $oldFilePath.' ';
		$mogrify.= $newFilePath;
		
		exec($mogrify);

		return $newFile;
	}

	//Check if the key in array is this same as $type and $checked is selected
	private function ifChecked($key, $type, $checked) {
		return ($key == $type && $checked == 'true') ? true : false;
	}

}
