<?php
require_once 'GSM.php';

class Call {
	
	protected $priceForMinute;
	protected $caller;
	protected $receiver;
	protected $duration;
	
	public function __construct($caller, $receiver, $duration) {
		$this->caller = $caller;
		$this->receiver = $receiver;
		$this->duration = $duration;
	}
	
	public function getCaller() {
		return $this->caller;
	}
	
	public function setCaller($caller) {
		$this->caller = $caller;
	}
	
	public function getReceiver() {
		return $this->receiver;
	}
	
	public function setReceiver($receiver) {
		$this->receiver = $receiver;
	}
	
	public function getDuration() {
		return $this->duration;
	}
	
	public function setDuration($duration) {
		if ($duration < 120 && $duration > 0) {
			$this->duration = $duration;
		} else {
			throw new \Exception ( 'Invalid duration!' );
		}
	}
	
	public function getPriceForMinute() {
		return 3;
	}
}