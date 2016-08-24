<?php
require_once 'Call.php';

class GSM {
	
	protected $model;
	protected $hasSimCard;
	protected $simMobileNumber;
	protected $outgoingCallsDuration;
	protected $lastIncomingCall;
	protected $lastOutgoingCall;
	protected $callPrice;
	
	public function __construct($model) {
		$this->model = $model;
		$this->outgoingCallsDuration = 0;
		$this->lastOutgoingCall = 0;
		$this->lastIncomingCall = 0;
		$this->hasSimCard = false;
	}
	
	public function getSimMobileNumber() {
		return $this->simMobileNumber;
	}
	
	public function setSimMobileNumber($number) {
		$this->simMobileNumber = $number;
	}
	
	public function getCallPrice() {
		return $this->callPrice;
	}
	
	public function setCallPrice($callPrice) {
		$this->callPrice = $callPrice;
	}
	
	public function getHasSimCard() {
		return $this->hasSimCard;
	}
	
	public function sethasSimCard($simCard) {
		$this->hasSimCard = $simCard;
	}
	
	public function setDuration($duration) {
		$this->duration = $duration;
	}
	
	public function getOutgoingCallsDuration() {
		return $this->outgoingCallsDuration;
	}
	
	public function setOutgoingCallsDuration($callDuration) {
		$this->outgoingCallsDuration = $callDuration;
	}
	
	public function insertSimCard($simMobileNumber) {
		if (preg_match ( '@08[1-9]{8}@', $simMobileNumber, $matches ) >= 1) {
			$this->simMobileNumber = $simMobileNumber;
			$this->hasSimCard = true;
		} else {
			throw new \Exception ( 'Invalid phone number!' );
		}
	}
	
	public function removeSimCard() {
		$this->hasSimCard = "false";
	}
	
	/*
	 * function checkDuration($duration){
	 *
	 * if ($duration > 0 || $duration <120){
	 * return true;
	 * }
	 * else{
	 * throw new \Exception('Invalid duration!');
	 * }
	 * }
	 *
	 * function checkHasSimCard($receiver){
	 *
	 * / if ($this->getHasSimCard()== true ||$receiver->getHasSimCard()== true){
	 * return true;
	 * }else{
	 * throw new \Exception('No sim card!');
	 * }
	 *
	 *
	 * }
	 * function checkSimMobileNumber(){
	 *
	 * if (simMoblileNumber != $receiver->simMobileNumber){
	 * return true;
	 * }else {
	 * throw new \Exception('Numbers are same!');
	 * }
	 * }
	 */
	public function call(GSM $receiver, $duration) {
		
		/*
		 * if (checkDuration($duration)==true && checkHasSimCard($receiver)==true
		 * && checkSimMobileNumber()==true)
		 */
		if ($duration < 0 || $duration > 120) {
			throw new \Exception ( 'Invalid duration' );
		}
		if ($this->hasSimCard == false || $receiver->hasSimCard == false) {
			throw new \Exception ( 'No SIM' );
		}
		if ($this->getSimMobileNumber () == $receiver->getSimMobileNumber ()) {
			throw new \Exception ( 'Numbers are same!' );
		}
		
		$call1 = new Call ( $this->getSimMobileNumber (), $receiver->getSimMobileNumber (), $duration );
		$receiver->lastIncomingCall = $call1->getDuration ();
		$this->setCallPrice ( $call1->getPriceForMinute () );
		$this->lastOutgoingCall = $call1->getDuration ();
		$receiver->lastIncomingCall = $call1->getDuration ();
		$this->setOutgoingCallsDuration ( $this->getOutgoingCallsDuration () + $call1->getDuration () );
	}
	
	function getSumForCall() {
		return sprintf ( "Price for all outgoing calls = %s", $this->getOutgoingCallsDuration () * $this->getCallPrice () );
	}
	
	function printInfoForTheLastOutgoingCall() {
		if ($this->lastOutgoingCall != 0) {
			return sprintf ( "Last outgoing call duration is: %ss, Your number is: %s", $this->lastOutgoingCall, $this->getSimMobileNumber () );
		} else {
			return "Ops";
		}
	}
	
	function printInfoForTheLastIncomingCall() {
		return sprintf ( "Last incoming call duration is: %ss.", $this->lastIncomingCall );
	}
}