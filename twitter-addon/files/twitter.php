<?php
/**
* Twitter
*
* The Twiter Instrument file
*
* Licensed under the MIT license.
*
* @category   Orchestra
* @copyright  Copyright (c) 2010, Christopher Hein
* @license    http://orchestramvc.chrishe.in/license
* @version    Release: 0.0.1:beta
* @link       http://orchestramvc.chrishe.in/docs/instruments/twitter
*
*/
class Twitter {
	protected $_username;
	protected $_avatar_size;
	protected $_count;
	protected $_loading_text;
	protected $_id;
  
	public function __construct($option = array()) {
		if(isset($option['username'])) {
			extract($option);
			$this->_username = $username;
			$this->_avatar_size = $avatar_size;
			$this->_count = $count;
			$this->_loading_text = $loading_text;
			$this->_id = $id;
		} else {
			$this->_username = 'christopherhein';
			$this->_avatar_size = 48;
			$this->_count = 5;
			$this->_loading_text = 'loading!';
			$this->_id = 'core-twitter';
		}
  }

	public function feed() {
		$code = "\n<div id=".$this->_id."></div> \n";
		$code .= "<link href='/stylesheets/tweet.css' rel='stylesheet' media='screen' type='text/css' />\n";
		$code .= "<script src='/javascripts/jquery.tweet.js'></script> \n";
		$code .= "<script type='text/javascript'>
$(document).ready(function() {
	$('#".$this->_id."').tweet({
	  join_text: 'auto',
	  username: '".$this->_username."',
	  avatar_size: ".$this->_avatar_size.",
	  count: ".$this->_count.",
	  auto_join_text_default: 'we said,', 
	  auto_join_text_ed: 'we',
	  auto_join_text_ing: 'we were',
	  auto_join_text_reply: 'we replied',
	  auto_join_text_url: 'we were checking out',
	  loading_text: '".$this->_loading_text."'
	});	
});		
</script>";
		return $code;
	}
	
}