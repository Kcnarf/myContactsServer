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
			
			
			$query = "SELECT * FROM `mycontacts`.`groups` WHERE `id` =" . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);
			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["name"] = $row["name"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `group_id` =" . $object_id;
					$mysqliResult2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
					// GOING THROUGH THE DATA
					$arrayedContact_group_links = array();
					if($mysqliResult2->num_rows > 0) {
						while($row2 = $mysqliResult2->fetch_assoc()) {
							$arrayedContact_group_links[] = $row2["id"];
						}
					}
					$arrayedRow["contact_group_link_ids"] = $arrayedContact_group_links;
					mysqli_free_result($mysqliResult2);
				}
			}
			$emberStructuredResult["group"] = $arrayedRow;
			
			// CLOSE CONNECTION
			mysqli_free_result($mysqliResult);
			mysqli_close($mysqli);
			
			// $emberStructuredResult["message"] = "Request for object with id: " . $object_id;
			return $emberStructuredResult;
		} else {
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "SELECT * FROM `mycontacts`.`groups`";
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			$arrayedRows = array();
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["name"] = $row["name"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `group_id` =" . $row["id"];
					$mysqliResult2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
					// GOING THROUGH THE DATA
					$arrayedContact_group_links = array();
					if($mysqliResult2->num_rows > 0) {
						while($row2 = $mysqliResult2->fetch_assoc()) {
							$arrayedContact_group_links[] = $row2["id"];
						}
					}
					$arrayedRow["contact_group_link_ids"] = $arrayedContact_group_links;
					mysqli_free_result($mysqliResult2);
					
					$arrayedRows[] = $arrayedRow;
				}
			}
			$emberStructuredResult["groups"] = $arrayedRows;	
			
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
			
			$query =  "INSERT INTO `mycontacts`.`groups` (`name`) VALUES ('" . $objectProperties["group"]->name . "')";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$object_id = $mysqli->insert_id;
			$query = "SELECT * FROM `mycontacts`.`groups` WHERE `id` = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["name"] = $row["name"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `group_id` =" . $object_id;
					$mysqliResult2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
					// GOING THROUGH THE DATA
					$arrayedContact_group_links = array();
					if($mysqliResult2->num_rows > 0) {
						while($row2 = $mysqliResult2->fetch_assoc()) {
							$arrayedContact_group_links[] = $row2["id"];
						}
					}
					$arrayedRow["contact_group_link_ids"] = $arrayedContact_group_links;
					mysqli_free_result($mysqliResult2);
				}
			}
			$emberStructuredResult["group"] = $arrayedRow;
			
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
		if(isset($request->url_elements[2])) {
			$object_id=$request->url_elements[2];
			$objectProperties = $request->parameters;
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query =  "UPDATE `mycontacts`.`groups` SET `name` = '" . $objectProperties["group"]->name . "' WHERE `groups`.`id` = " . $object_id . ";";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$query = "SELECT * FROM `groups` WHERE `id` =" . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["name"] = $row["name"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `group_id` =" . $object_id;
					$mysqliResult2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
					// GOING THROUGH THE DATA
					$arrayedContact_group_links = array();
					if($mysqliResult2->num_rows > 0) {
						while($row2 = $mysqliResult2->fetch_assoc()) {
							$arrayedContact_group_links[] = $row2["id"];
						}
					}
					$arrayedRow["contact_group_link_ids"] = $arrayedContact_group_links;
					mysqli_free_result($mysqliResult2);
				}
			}
			$emberStructuredResult["group"] = $arrayedRow;
			
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
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "Delete FROM `mycontacts`.`groups` WHERE `id` = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);
			
			// CLOSE CONNECTION
			mysqli_close($mysqli);
			
			//$emberStructuredResult["message"] = "Request to delete object with id: " . $object_id;
			return;
		} else {
			// do nothing, this is not a supported action
			break;
		}
	}
}