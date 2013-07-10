<?php

class EmberListController extends RootController
{
	public function getAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			$emberStructuredResult["message"] = "Request for object with id: " . $object_id;
			// further investigation is possible
			/*
			if(isset($request->url_elements[3])) {
					switch($request->url_elements[3]) {
					case 'groups':
							$emberStructuredResult["message"] = "Request for property \'groups\' of object with id " . $object_id;
							break;
					default:
							// do nothing, this is not a supported action
							break;
					}
			} else {
				$emberStructuredResult["message"] = "Request for object with id: " . $object_id;
			}
			*/
		} else {
			$emberStructuredResult["message"] = "Request for list of objects";
		}
		return $emberStructuredResult;
	}

	public function postAction($request) {
		if(isset($request->parameters)) {
			$emberStructuredResult = $request->parameters;
			$emberStructuredResult['message'] = "Request to create an object";
			return $emberStructuredResult;
		}
		else {
			// do nothing, this is not a supported action
			break;
		}
	}
	
	public function putAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			$emberStructuredResult = $request->parameters;
			$emberStructuredResult['message'] = "Request to update object with id: " . $object_id;
			return $emberStructuredResult;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
	
	public function deleteAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			$emberStructuredResult['message'] = "Request to delete object with id: " . $object_id;
			return $emberStructuredResult;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
}
?>