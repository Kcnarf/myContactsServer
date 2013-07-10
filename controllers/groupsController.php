<?php

class GroupsController extends RootController
{
    public function getAction($request) {
			if(isset($request->url_elements[2])) {
				$object_id = (int)$request->url_elements[2];
				
				$mysqli = $this->opendb();
				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}
				
				$query = "SELECT * FROM `groups` WHERE group_id =" . $object_id;
				$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

				// GOING THROUGH THE DATA
				if($mysqliResult->num_rows > 0) {
					while($row = $mysqliResult->fetch_assoc()) {
						$arrayedRow["id"] = $row["group_id"];
						$arrayedRow["alias"] = $row["alias"];
					}
				}
				$emberStructuredResult["group"] = $arrayedRow;				
				
				// CLOSE CONNECTION
				mysqli_free_result($mysqliResult);
				mysqli_close($mysqli);
				
				$emberStructuredResult["message"] = "Request for object with id: " . $object_id;
				return $emberStructuredResult;
			} else {
				$mysqli = $this->opendb();
				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}
				
				$query = "SELECT group_id FROM `groups`";
				$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

				// GOING THROUGH THE DATA
				$arrayedRows = array();
				if($mysqliResult->num_rows > 0) {
					while($row = $mysqliResult->fetch_assoc()) {
						$arrayedRow["id"] = $row["group_id"];
						$arrayedRows[] = $arrayedRow;
					}
				}
				$emberStructuredResult["groups"] = $arrayedRows;	
				
				// CLOSE CONNECTION
				mysqli_free_result($mysqliResult);
				mysqli_close($mysqli);
				
				$emberStructuredResult["message"] = "Request for list of objects";
				return $emberStructuredResult;
			}
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
			
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "Delete FROM `groups` WHERE group_id = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);
			
			// CLOSE CONNECTION
			mysqli_close($mysqli);
			
			$emberStructuredResult['message'] = "Request to delete object with id: " . $object_id;
			return $emberStructuredResult;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
}
?>