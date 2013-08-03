<?php

class AchievementsController extends RootController
{
	public function getAction($request) {
		if(isset($request->url_elements[2])) {
			// do nothing, this is not a supported action
			break;

		} else {
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "SELECT * FROM `mycontacts`.`achievements`";
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			$arrayedRows = array();
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["title"] = $row["title"];
					$arrayedRow["description"] = $row["description"];
					$arrayedRow["is_achieved"] = $row["is_achieved"];
					$arrayedRows[] = $arrayedRow;
				}
			}
			$emberStructuredResult["achievements"] = $arrayedRows;	
			
			// CLOSE CONNECTION
			mysqli_free_result($mysqliResult);
			mysqli_close($mysqli);
			
			// $emberStructuredResult["message"] = "Request for list of objects";
			return $emberStructuredResult;
		}
	}

	public function postAction($request) {
		// do nothing, this is not a supported action
		break;
	}
	
	public function putAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id=$request->url_elements[2];
			$objectProperties = $request->parameters;
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query =  "UPDATE `mycontacts`.`achievements` SET `is_achieved` = '" . $objectProperties["achievement"]->is_achieved . "' WHERE `achievements`.`id` = " . $object_id . ";";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$query = "SELECT * FROM `achievements` WHERE `id` =" . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["title"] = $row["title"];
					$arrayedRow["description"] = $row["description"];
					$arrayedRow["is_achieved"] = $row["is_achieved"];
				}
			}
			$emberStructuredResult["achievement"] = $arrayedRow;
			
			// CLOSE CONNECTION
			
			mysqli_close($mysqli);
			mysqli_free_result($mysqliResult);
			
			return $emberStructuredResult;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
	
	public function deleteAction($request) {
		// do nothing, this is not a supported action
		break;
	}
}