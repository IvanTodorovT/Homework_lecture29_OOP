<?php

namespace Employee;

use Task\Task;

class Employee {
	protected $name;
	protected $currentTask;
	protected $hoursLeft;
	
	public function __construct($name) {
		$this->name = $name;
		$this->currentTask = [ ];
		$this->hoursLeft = 0;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		if ($name != "") {
			$this->name = $name;
		} else {
			throw new \Exception ( 'Invalid name!' );
		}
	}
	
	public function getCurrentTask() {
		return $this->currentTask;
	}
	
	public function setCurrentTask($currentTask) {
		if ($currentTask != "") {
			$this->currentTask = $currentTask;
		} else {
			throw new \Exception ( 'Invalid current task!' );
		}
	}
	
	public function getHoursLeft() {
		return $this->hoursLeft;
	}
	
	public function setHoursLeft($hoursLeft) {
		if ($hoursLeft > 0) {
			$this->hoursLeft = $hoursLeft;
		} else {
			throw new \Exception ( 'Hours must be  >0!' );
		}
	}
	
	public function work() {
	
		if ($this->getHoursLeft () > $this->getCurrentTask ()->getWorkingHours ()) {
			$this->setHoursLeft ( $this->getHoursLeft () - $this->getCurrentTask ()->getWorkingHours () );
			$this->getCurrentTask ()->setWorkingHours ( 0 );
		} else if ($this->getHoursLeft () < $this->getCurrentTask ()->getWorkingHours ()) {
			$this->getCurrentTask ()->setWorkingHours ( $this->getCurrentTask ()->getWorkingHours () - $this->getHoursLeft () );
			$this->setHoursLeft ( 0 );
		}
	}
	
	public function showReport() {
		return sprintf ( 'Employee name: %s,  Task: %s,  Employee hours left: %s,  Task hours left: %s;', $this->getName (), $this->getCurrentTask ()->getName (), $this->getHoursLeft (), $this->getCurrentTask ()->getWorkingHours () );
	}
}