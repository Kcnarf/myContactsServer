<?php

class UsersController extends RootController
{
    public function getAction($request) {
        if(isset($request->url_elements[2])) {
            $user_id = (int)$request->url_elements[2];
            if(isset($request->url_elements[3])) {
                switch($request->url_elements[3]) {
                case 'groups':
                    $data["message"] = "user " . $user_id . " is in many groups";
                    break;
                default:
                    // do nothing, this is not a supported action
                    break;
                }
            } else {
              $data["message"] = "here is the info for user " . $user_id;
            }
        } else {
					//$data["message"] = "you want a list of users";
					
					$mysqli = $this->opendb();
					if (mysqli_connect_errno()) {
						printf("Connect failed: %s\n", mysqli_connect_error());
						exit();
					}

					// A QUICK QUERY ON A FAKE USER TABLE
					$query = "SELECT contact_id FROM `contacts`";
					$mysqliresult = $mysqli->query($query) or die($mysqli->error.__LINE__);

					// GOING THROUGH THE DATA
					if($mysqliresult->num_rows > 0) {
						$jsonedRows = array();
						while($row = $mysqliresult->fetch_assoc()) {
							$jsonedRow["id"] = $row["contact_id"];
							$jsonedRows[] = $jsonedRow;
						}
						$jsonResult["contacts"] = $jsonedRows;
					}
					else {
						$jsonResult["message"] = "NO RESULTS";	
					}
						
					// CLOSE CONNECTION
					mysqli_close($mysqli);
        }
        return $jsonResult;
    }

    public function postAction($request) {
        $data = $request->parameters;
        $data['message'] = "This data was submitted";
        return $data;
    }
}