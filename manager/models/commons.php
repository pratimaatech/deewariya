<?php
if(strrpos(__DIR__, '\\')>0){
	$url = str_replace("\models", "\\", __DIR__);
}else{
	$url = str_replace("/models", "/", __DIR__);
}

global $con;


 include($url."settings/config.php");
/*require($url."class.phpmailer.php"); */

Class Commons{
	public function config(){
		$cont = new Config();
		return $con = $cont->Check();
	}
	Public function query($query){

		
		$con = $this->config();

		$results = @mysqli_query($con,$query) or die(mysqli_error($con));



		return $results;

	}

	Public function insertedQuery($query){

		
		$con = $this->config();

		$results = @mysqli_query($con,$query) or die(mysqli_error($con));

		$arr = mysqli_insert_id($con);

		return $arr;

	}

	Public function selectByCF($filter){

		if(isset($filter["table"])){
			$sql = "select * from ".$filter["table"];
		}

		if(isset($filter['check'])){
			$sql .= " where ";
			$i= 0;
			foreach ($filter['check'] as $key => $value) {
				$sql .= ($i>0 ? " and " : null).$key." = '".$this->mysql_real_escape_str($value)."'";

				$i++;
			}

		}
		if(isset($filter['sort_by'])){
			$sql .= " order by ".$filter['sort_by']." ".(isset($filter['sort_type']) ? $filter['sort_type'] : 'desc');
		}

		if(isset($filter['limit'])){
			$sql .= " limit ".$filter['limit'];
		}
		
		
		
		return $this->query($sql);

	}

	Public function fetch($query)
	{

		return mysqli_fetch_assoc($query);

	}
	
	Public function INSERT($table,$feilds,$values){
		
	    $feilds = implode("`,`",$feilds);

	    $values = implode('","',$values);

		
	    if($table=="orders"){

	    	return $this->insertedQuery("insert into $table (`$feilds`) values(\"$values\")");

	    }else{
	    	
		    return $this->query("insert into $table (`$feilds`) values(\"$values\")");
		}
	}

	Public function generateUnique($v)

	{

	 		$salt = substr(md5(uniqid(rand(), true)), 0, $v);

	 		return $salt;

	}


	public function uploadFile($prev,$file,$table,$url){

		$cont = new Config();

		$valid_type = $cont->validType();

		if(isset($file) && $file['name']!=null)
		{
			$data = new Commons();
		


	   		$pict=$url.'images/'.$table.'/'.$prev;
			
			@unlink($pict);
			
			$FILE=$file;
			
			$path=$url.'images/'.$table.'/';


			if (!file_exists($path)) { mkdir($path, 0777, true); }

	    	$upload_file = $data->upload_file($valid_type,$path,$FILE,$data->generateUnique(8));

			$icon=$upload_file[1];

		}else{

			$icon = $picon;

		}
		return $icon;
	}


	public function encryptCode( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	    return( $qEncoded );
	}

	public function decryptCode( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	    return( $qDecoded );
	}


	public function upload_file($valid_type,$path,$FILE,$name)
	{

 		$file_name = $FILE['name'];

 		if(is_array($file_name)){

			$file_ext = explode(".",$file_name[0]);

			$file_ext = substr($file_name[0], strrpos($file_name[0], '.') + 1);

			$name = $name.".".strtolower($file_ext);

 			if(in_array(strtolower($file_ext),$valid_type)){

	 			if(move_uploaded_file($FILE['tmp_name'][0],$path.$name)){

					$save_video_url = $name;

	 				return array(true,$save_video_url);

				}

			}else{

				return array(false,"Not valid image type!");

			}	

 		}else{

 			$file_ext = explode(".",$file_name);

			$file_ext = substr($file_name, strrpos($file_name, '.') + 1);

			$name = $name.".".$file_ext;


	 		if(in_array($file_ext,$valid_type)){

	 			if(move_uploaded_file($FILE['tmp_name'],$path.$name)){

					$save_video_url = $name;

	 				return array(true,$save_video_url);

				}

 			}else{

				return array(false,"Not valid image type!");

			}	
		 

 		}	

	}

	function iframe($iframe_string){

		preg_match('/src="([^"]+)"/', $iframe_string, $match);
		
		return $url = $match[1];

	}

	function dateSql($date){
  		return date("Y/m/d", strtotime($date));
	}

	public function UPDATE($table,$data,$id){
		
		return $this->query("UPDATE $table SET ".implode(',', $data)." WHERE `id` = ".$id);

	}

	function redirect($path)

	{
		echo "<script>window.location.href='".$path."'</script>";
	  	exit;
	}

	public function mysql_real_escape_str($str)

	{

		$con = $this->config();
		
		return mysqli_real_escape_string($con,$str);

	}

	function inserted_id()

	{

		$con = $this->config();

		return mysqli_insert_id($con);

	}

	Public function count_row($filter){

		if(isset($filter)){
			$sql = "select * from ".$filter['table']." where ".$filter['feild']."=".$filter['value'];
		}else{
			$sql = "select * from ".$filter['table'];
		}
		return mysqli_num_rows($this->query($sql));

	}

	Public function countRow($query){

		
		return mysqli_num_rows($this->query($query));

	}

	public function toggle($filter){

		$data = $this->fetch($this->query("select * from ".$filter['table']." where id=".$filter['id']));

		if($data['status']==1){
			return $this->query("Update ".$filter['table']." set status=0 where id=".$filter['id']);
		}else{
			return $this->query("Update ".$filter['table']." set status=1 where id=".$filter['id']);
		}
	}

	Public function deleteRow($filter){

		$cont = new Config();

		$data = $this->fetch($this->selectByCF($filter));

		$link = $cont->dirLink();

		$path = $link."images/".$filter['table']."/";

		if(isset($data['image'])){

			@unlink($path.$data['image']);
			
		}
		
		if($filter['table']=="videos"){
		
			@unlink($path.$data['video']);
		
		}
		
		$sql = "delete from ".$filter['table'];

		if(isset($filter['check']) && $filter['check']!=null){

			$sql .= " where ";

			$i= 0;

			foreach ($filter['check'] as $key => $value) {

				$sql .= ($i>0 ? " and " : null).$key." = '".$this->mysql_real_escape_str($value)."'";

				$i++;
			}

		}
		

		return $this->query($sql);

	}


	public function expert($string,$limit){
		
		$decode = substr(strip_tags($string),0,$limit);

		$pos = strrpos($decode, " ");
		

		
		if(strlen(strip_tags($string)) > strlen(strip_tags($decode))){
			return $str = substr($decode, 0,$pos).(strlen(strip_tags($string)) > $pos ? "..." : "");
		}else{
			return $str = substr($string, 0,$limit).(strlen(strip_tags($string)) > strlen(strip_tags($decode)) ? "..." : "");
		}

	}

	public function getResultArray($query){
		$data = null;
		while ($fdata = $this->fetch($query)) {

		    $data[] = $fdata;

		}

		return $data;

	}

	
	public function getVar($string){

		$queryString = parse_url($string, PHP_URL_QUERY);

        parse_str($queryString, $params);

        $v = $params['v']; 

		return $v;

	}

	public function urlencode($string){
		return str_replace(" ", "-", $string);
	}

	public function urldecode($string){
		return str_replace("-", " ", $string);
	}


	public function orderplaced($record){

		$product = $this->fetch($this->selectByCF(['table'=>'products','check'=>['id'=>$record['productId']]]));

		$image = explode(' | ', $product['image']);

		$txt = "<html><body>";
	    $txt .='<div style="width:800px;display:block;">
			<div style="border-top: 5px solid #1872c5; text-align: center;padding: 10px;">
				<img src="http://www.fujiiryoki.co.in/images/logo-fujiiryoki.png" alt="fujiiryoki" style="max-width: 120px" />
			</div>
			<div style="display: table; width: 80%; margin:20px auto; border:1px solid #ccc;letter-spacing: 1px; margin-top:20px;">
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%"><img src="'.SITE_URL.$image[0].'" height="80" /></div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;vertical-align: middle;">Modal No. - '.$product['modal_no'].'<br/>
						Product -  '.$product['title'].'<br/>
						Price -  '.$product['price'].'
					</div>
				</div>
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%">Order ID</div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;">'.$_SESSION['order_id'].'</div>
				</div>
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%">Payment Status</div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;">'.$record['payment_status'].'</div>
				</div>
			</div>
			<div style="display: table; width: 80%; margin:20px auto 0;border:1px solid #ccc;border-bottom:0px; letter-spacing: 1px;">
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc;width:100%;font-weight:bold;">Customer Details</div>
					</div>
				</div>
			<div style="display: table; width: 80%; margin:0px auto 20px; border:1px solid #ccc;letter-spacing: 1px;">
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%">Full Name</div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;">'.$record['billing_fullname'].'</div>
				</div>
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%">Phone No</div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;">'.$record['billing_phoneno'].'</div>
				</div>
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc; border-bottom: 1px solid #ccc;width:30%">E-mail</div>
					<div style="display:table-cell;padding: 10px; border-bottom: 1px solid #ccc;font-family: PT Sans, sans-serif;">'.$record['billing_email'].'</div>
				</div>
				<div style="display: table-row;">
					<div style="display:table-cell;padding: 10px;border-right:1px solid #ccc;width:30%">Full address</div>
					<div style="display:table-cell;padding: 10px;font-family: PT Sans, sans-serif;">'.htmlentities($record['billing_address']).', '.$record['billing_city'].', '.$record['billing_state'].', India, '.($record['billing_landmark']!= null ? $record['billing_landmark'] .', ' : '').$record['zipcode'].'</div>
				</div>
			</div>
			<div style="border-bottom: 5px solid #1872c5; text-align: center;padding: 10px;font-size: 12px;line-height: 20px;letter-spacing: 1px;">
				All rights reserved and &copy; by fujiiryoki.co
			</div>
		</div>';
		$txt .= "</body></html>";
		return $txt;
	}

	public function ordersuccess(){
		$txt = "<html><body>";
	    $txt .='<div style="width:800px;display:block; font-weight:bold;">
			<div style="border-top: 5px solid #328632; text-align: center;padding: 10px;">
				<img src="http://www.fujiiryoki.co.in/images/logo-fujiiryoki.png" alt="fujiiryoki" style="max-width: 120px" />
			</div>
			<div style="display: block; width: 80%; margin:20px auto;letter-spacing: 1px; margin-top:20px;text-align:center">
				<img src="http://www.fujiiryoki.co.in/images/check.png" width="120" alt=""><br>
				<p>Your payment has been successfully transfered. <br>
					Your OrderId is #'.$_SESSION['order_id'].', 
					Your Transaction ID is #'.$_SESSION['TXNID'].'<br>
					For more details contact us <br>
					<a href="http://www.fujiiryoki.co/contact-us.php" style="background:#328632;padding:7px 20px;width:150px;text-align:center;display:block;color:#fff;text-decoration:none;border-radius:5px;margin:10px auto;">Contact us</a>
			</div>
			<div style="border-bottom: 5px solid #328632; text-align: center;padding: 10px;font-size: 12px;line-height: 20px;letter-spacing: 1px;">
				All rights reserved and &copy; by fujiiryoki.co
			</div>
		</div>';
		 $txt .= "</body></html>";

		return $txt;
	}

	public function mailForBuyer(){


		$txt = "<html><body>";
	    
	    $txt .='<div style="width:800px;display:block; font-weight:bold;">
			<div style="border-top: 5px solid #328632; text-align: center;padding: 10px;">
				<img src="http://www.fujiiryoki.co.in/images/logo-fujiiryoki.png" alt="fujiiryoki" style="max-width: 120px" />
			</div>
			<div style="display: block; width: 80%; margin:20px auto;letter-spacing: 1px; margin-top:20px;text-align:center">
				<img src="http://www.fujiiryoki.co.in/images/check.png" width="120" alt=""><br>
				<p>Payment for OrderId is #'.$_SESSION['order_id'].', 
					is success. The Transaction ID is '.$_SESSION['TXNID'].'<br>
					For more details visit <br>
					<a href="http://www.fujiiryoki.co/manager" style="background:#328632;padding:7px 20px;width:150px;text-align:center;display:block;color:#fff;text-decoration:none;border-radius:5px;margin:10px auto;">click here</a>
			</div>
			<div style="border-bottom: 5px solid #328632; text-align: center;padding: 10px;font-size: 12px;line-height: 20px;letter-spacing: 1px;">
				All rights reserved and &copy; by fujiiryoki.co
			</div>
		</div>';
		 $txt .= "</body></html>";

		return $txt;
	}

	public function mailSent($to,$subject,$message){

		$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->Host = "md-in-53.webhostbox.net";

		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Port = 587;
		$mail->Username = "support@fujiiryoki.co.in";
		$mail->Password = "]8&S6P(kM&!w";
		$mail->From = "support@fujiiryoki.co.in";
		$mail->FromName = 'Fujiiryoki';
		$mail->AddAddress($to);
		//$mail->AddReplyTo($param['email']);

		$mail->IsHTML(true);

		$mail->Subject = $subject;
		$mail->Body = html_entity_decode($message);
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		if(!$mail->Send())
		{
			echo "Message could not be sent. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
			exit;
		}else{
			return true;
		}

	}
}


?>