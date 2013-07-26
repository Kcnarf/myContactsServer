<?php

class ContactsController extends RootController
{
	public function getAction($request) {
		if(isset($request->url_elements[2])) {
			$object_id = (int)$request->url_elements[2];
			
			$mysqli = $this->opendb();
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			$query = "SELECT * FROM `mycontacts`.`contacts` WHERE `id` =" . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["alias"] = $row["alias"];
					$arrayedRow["is_favorite"] = $row["is_favorite"];
					$arrayedRow["first_name"] = $row["first_name"];
					$arrayedRow["last_name"] = $row["last_name"];
					$arrayedRow["home_phone"] = $row["home_phone"];
					$arrayedRow["mobile_phone"] = $row["mobile_phone"];
					$arrayedRow["office_phone"] = $row["office_phone"];
					$arrayedRow["personal_mail"] = $row["personal_mail"];
					$arrayedRow["office_mail"] = $row["office_mail"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `contact_id` =" . $object_id;
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
			$emberStructuredResult["contact"] = $arrayedRow;
			
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
			
			$query = "SELECT * FROM `mycontacts`.`contacts`";
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			$arrayedRows = array();
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["alias"] = $row["alias"];
					$arrayedRow["is_favorite"] = $row["is_favorite"];
					$arrayedRow["first_name"] = $row["first_name"];
					$arrayedRow["last_name"] = $row["last_name"];
					$arrayedRow["home_phone"] = $row["home_phone"];
					$arrayedRow["mobile_phone"] = $row["mobile_phone"];
					$arrayedRow["office_phone"] = $row["office_phone"];
					$arrayedRow["personal_mail"] = $row["personal_mail"];
					$arrayedRow["office_mail"] = $row["office_mail"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `contact_id` =" . $row["id"];
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
			$emberStructuredResult["contacts"] = $arrayedRows;	
			
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
			
			$query =  "INSERT INTO `mycontacts`.`contacts`
				(`alias`,`is_favorite`,`first_name`,`last_name`,`home_phone`,`mobile_phone`,`office_phone`,`personal_mail`,`office_mail`) VALUES ('"
				. $objectProperties["contact"]->alias . "','"
				. $objectProperties["contact"]->is_favorite . "','"
				. $objectProperties["contact"]->first_name . "','"
				. $objectProperties["contact"]->last_name . "','"
				. $objectProperties["contact"]->home_phone . "','"
				. $objectProperties["contact"]->mobile_phone . "','"
				. $objectProperties["contact"]->office_phone . "','"
				. $objectProperties["contact"]->personal_mail . "','"
				. $objectProperties["contact"]->office_mail . "')";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$object_id = $mysqli->insert_id;
			$query = "SELECT * FROM `mycontacts`.`contacts` WHERE `id` = " . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["alias"] = $row["alias"];
					$arrayedRow["is_favorite"] = $row["is_favorite"];
					$arrayedRow["first_name"] = $row["first_name"];
					$arrayedRow["last_name"] = $row["last_name"];
					$arrayedRow["home_phone"] = $row["home_phone"];
					$arrayedRow["mobile_phone"] = $row["mobile_phone"];
					$arrayedRow["office_phone"] = $row["office_phone"];
					$arrayedRow["personal_mail"] = $row["personal_mail"];
					$arrayedRow["office_mail"] = $row["office_mail"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `contact_id` =" . $object_id;
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
			$emberStructuredResult["contact"] = $arrayedRow;
			
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
			
			$query =  "UPDATE `mycontacts`.`contacts` SET"
				. "`alias`='" . $objectProperties["contact"]->alias . "',"
				. "`is_favorite`='" . $objectProperties["contact"]->is_favorite . "',"
				. "`first_name`='" . $objectProperties["contact"]->first_name . "',"
				. "`last_name`='" . $objectProperties["contact"]->last_name . "',"
				. "`home_phone`='" . $objectProperties["contact"]->home_phone . "',"
				. "`mobile_phone`='" . $objectProperties["contact"]->mobile_phone . "',"
				. "`office_phone`='" . $objectProperties["contact"]->office_phone . "',"
				. "`personal_mail`='" . $objectProperties["contact"]->personal_mail . "',"
				. "`office_mail`='" . $objectProperties["contact"]->office_mail . "'"
				. "WHERE `id` = " . $object_id;
			$mysqli->query($query) or die($mysqli->error.__LINE__);
			
			$query = "SELECT * FROM `contacts` WHERE `id` =" . $object_id;
			$mysqliResult = $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GOING THROUGH THE DATA
			if($mysqliResult->num_rows > 0) {
				while($row = $mysqliResult->fetch_assoc()) {
					$arrayedRow["id"] = $row["id"];
					$arrayedRow["alias"] = $row["alias"];
					$arrayedRow["is_favorite"] = $row["is_favorite"];
					$arrayedRow["first_name"] = $row["first_name"];
					$arrayedRow["last_name"] = $row["last_name"];
					$arrayedRow["home_phone"] = $row["home_phone"];
					$arrayedRow["mobile_phone"] = $row["mobile_phone"];
					$arrayedRow["office_phone"] = $row["office_phone"];
					$arrayedRow["personal_mail"] = $row["personal_mail"];
					$arrayedRow["office_mail"] = $row["office_mail"];
					
					$query2 = "SELECT `id` FROM `mycontacts`.`contact_group_links` WHERE `contact_id` =" . $object_id;
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
			$emberStructuredResult["contact"] = $arrayedRow;
			
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
			
			$query = "Delete FROM `mycontacts`.`contacts` WHERE `id` = " . $object_id;
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