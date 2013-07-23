<?php

class Contact_group_linksController extends RootController
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
			
			$query = "SELECT * FROM `mycontacts`.`contact_group_links`";
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			$arrayedRows = array();
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["contact_id"] = $row["contact_id"];
					$arrayedRow["group_id"] = $row["group_id"];
					$arrayedRows[] = $arrayedRow;
				}
			}
			$emberStructuredResult["contact_group_links"] = $arrayedRows;	
			
			// CLOSE CONNECTION
			mysqli_free_result($mysqliResult);
			mysqli_close($mysqli);
			
			// $emberStructuredResult["message"] = "Request for list of objects";
			return $emberStructuredResult;
		}
	}

	public function postAction($request) {
		if(isset($request->parameters)) {
			$objectProperties = $request->parameters;
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query =  "INSERT INTO `mycontacts`.`contact_group_links` (`contact_id`,`group_id`) VALUES"
				. "('" . $objectProperties["contact_group_link"]->contact_id
				. "','" . $objectProperties["contact_group_link"]->group_id . "')";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$object_id = $mysqli->insert_id;
			$query = "SELECT * FROM `mycontacts`.`contact_group_links` WHERE `id` = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["contact_id"] = $row["contact_id"];
					$arrayedRow["group_id"] = $row["group_id"];
				}
			}
			$emberStructuredResult["contact_group_link"] = $arrayedRow;
			
			// CLOSE CONNECTION
			
			mysqli_close($mysqli);
			mysqli_free_result($mysqliResult);
			return $emberStructuredResult;
		}
		else {
			// do nothing, this is not a supported action
			break;
		}
	}
	
	public function putAction($request) {
		
		// do nothing, this is not a supported action
		break;
	}
	
	public function deleteAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "Delete FROM `mycontacts`.`contact_group_links` WHERE `id` = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);
			
			// CLOSE CONNECTION
			mysqli_close($mysqli);
			
			//$emberStructuredResult["message"] = "Request to delete object with id: " . $object_id;
			return $emberStructuredResult;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
}