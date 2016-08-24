<?php

namespace Task;

class Task {
	protected $name;
	protected $workingHours;
	
	public function __construct($name, $workingHours) {
		$this->name = $name;
		$this->workingHours = $workingHours;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setWorkingHours($workingHours) {
		$this->workingHours = $workingHours;
	}
	
	public function getWorkingHours() {
		return $this->workingHours;
	}
}