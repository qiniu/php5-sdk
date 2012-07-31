<?php
class QBox_WMRS_Service{
	public $Conn;
	
	public function __construct($conn){
		$this->Conn = $conn;
	}
	
	public function get($customer){
		$url = QBOX_WM_HOST . '/get';
		$params = array("customer"=>$customer);
		return QBox_OAuth2_CallWithParams($this->Conn, $url, $params);
	}
	
	public function set($customer, array $tpl){
		$url = QBOX_WM_HOST . '/set';
		$tpl['customer'] = $customer;
		return QBox_OAuth2_CallWithParams($this->Conn, $url, $tpl);
	}
	
		
}
function QBox_WMRS_NewService($conn) {
	return new QBox_WMRS_Service($conn);
}






