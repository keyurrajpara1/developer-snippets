<?php
/**
 * FTP Server Library
 * @author Keyur Rajpara <keyurrajpara1@gmail.com>
 */
class FtpServerLib{
	private $ftpHost;
    private $ftpUsername;
    private $ftpPassword;
	public function __construct(){
		// FTP server details
        $this->ftpHost = FTP_HOST;
        $this->ftpUsername = FTP_USERNAME;
        $this->ftpPassword = FTP_PASSWORD;
        $this->ftpPassiveMode = FTP_PASSIVE_MODE;
    }
    /**
     * Connect to the FTP server
     */
	private function ftpConnection(){
		$status = false;
		$message = "";
		$resultData = array();
		try{
			$connId = @ftp_connect($this->ftpHost) or die("Couldn't connect to $this->ftpHost"); // open an FTP connection
			$ftpLogin = @ftp_login($connId, $this->ftpUsername, $this->ftpPassword); // try to login
			if($ftpLogin){ // login to FTP server
			    $status = true;
			    $resultData["connId"] = $connId;
			    $message = "Connected as $this->ftpUsername@$this->ftpHost";
			}
			else{
			    $message = "Couldn't connect as $this->ftpUsername";
			}
		}
		catch(Exception $e){
			$message = $e->getMessage();
		}
		return array("status" => $status, "message" => $message, "resultData" => $resultData);
    }
    /**
     * Upload file to the FTP server
     */
	public function ftpSingleFileUpload($localFilePath, $remoteFilePath){
		$status = false;
		$message = "";
		$resultData = array();
		try{
			$ftpConnectionResult = $this->ftpConnection();
			if($ftpConnectionResult["status"]){
				$connId = $ftpConnectionResult["resultData"]["connId"];
				
				@ftp_pasv($connId, $this->ftpPassiveMode) or die("Unable switch to passive mode"); // turn passive mode on

				if(@ftp_put($connId, $remoteFilePath, $localFilePath, FTP_BINARY)){ // try to upload file
					$status = true;
				    $message = "File transferred successfully <br />
				    Local File Path - ".$localFilePath." <br />
				    Remote File Path - ".$remoteFilePath."";
				}
				else{
				    $message = "There was an error while uploading $localFilePath";
				}

				@ftp_close($connId); // close the connection
			}
			else{
				$message = $ftpConnectionResult["message"];
			}
		}
		catch(Exception $e){
			$message = $e->getMessage();
		}
		return array("status" => $status, "message" => $message, "resultData" => $resultData);
    }
}
?>