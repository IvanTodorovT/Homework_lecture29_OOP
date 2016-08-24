<?php

require_once 'Call.php';

class GSM{
	protected 	$model;
	protected 	$hasSimCard;
	protected 	$simMobileNumber;
	protected 	$outgoingCallsDuration;
	protected 	$lastIncomingCall;
	protected 	$lastOutgoingCall;
	public $callPrice = 0.50;
	
	
	public function __construct($model){
		$this->model=$model;
	}
	
	
	
	public function getSimMobileNumber(){
		
		return $this->simMobileNumber;
		
	}
	
	
	public function getHasSimCard(){
	
		return $this->hasSimCard;
	
	}
	
	
	public function sethasSimCard($simCard)
	{
		$this->hasSimCard = $simCard;
	}
	
	
	public function setSimMobileNumber($number)
	{
		$this->simMobileNumber = $number;
	}
	
	public function setDuration($duration)
	{
		$this->duration = $duration;
	}
	
	
	
	public function insertSimCard($simMobileNumber){
		if (preg_match_all('@08[1-9]{8}@', $simMobileNumber, $matches)>=1){
			$this->simMobileNumber = $simMobileNumber;
			$this->hasSimCard = true;
		}
		else{
			throw new \Exception('Invalid phone number!');
		}
	}
	

	public function removeSimCard(){
		
		$this->hasSimCard = "false";
	}
	
	
	
	
/* 	function checkDuration($duration){
	
		if ($duration > 0 || $duration <120){
			return true;
		}
		else{
			throw new \Exception('Invalid duration!');
		}
	}
	
	function checkHasSimCard($receiver){
	
		/	if ($this->getHasSimCard()== true ||$receiver->getHasSimCard()== true){
			return true;
		}else{
			throw new \Exception('No sim card!');
		}
			
	
	}
	function checkSimMobileNumber(){
	
		if (simMoblileNumber != $receiver->simMobileNumber){
			return true;
		}else {
			throw new \Exception('Numbers are same!');
		}
	} */
	
	
	

	
	
	
	
	
	
	public function call($receiver, $duration){

		/* if (checkDuration($duration)==true && checkHasSimCard($receiver)==true 
		 * && checkSimMobileNumber()==true) */
		
		if ($duration < 0 || $duration >120){
			throw new \Exception('Invalid duration');
		}
		 if ($this->hasSimCard == false || $receiver->hasSimCard == false){
			throw new \Exception('No SIM');
		} 
	 	if ($this->simMoblileNumber == $receiver->simMobileNumber){
			throw new \Exception('Numbers are same!');
		} 
		
		
		
			$call1 = new Call($this->getSimMobileNumber(), $receiver->getSimMobileNumber(),$duration);
			
		$callPrice = $call1->getPriceForMinute();
		$this->lastOutgoingCall = $conversation;
		$receiver->lastIncomingCall = $call1;
		$this->outgoingCallsDuration = $this->outgoingCallsDuration + $duration;
		
		}
		
		
		
		
		
		
		
		
		
		
	
		
		
	
	
	
	
	
	function getSumForCall(){
		
		return sprintf("Price for all outgoing calls = %s",$this->outgoingCallsDuration * 0.50);	
	}
	
	
	
	
}