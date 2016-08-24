<?php


class Employee {
	
	protected 	$name;
  	protected  	$currentTask;
	protected 	$hoursLeft;
	
	public function __construct($name){
		$this->name=$name;
	}
	
	
	
	public function setName($name)
	{
		if ($name!=""){
		$this->name = $name;
		}
		else {
			throw new \Exception('Invalid name!');
		}
		
		}
		
	
	public function getName(){
		return $this->name;
	}
	
	
	
	public function getCurrentTask(){
		return $this->currentTask;
	}
	
	
	public function setCurrentTask($name)
	{
		if ($name!=""){
			$this->name = $name;
		}
		else {
			throw new \Exception('Invalid name!');
		}
	
	}
	
	
	public function getHoursLeft(){
		return $this->hoursLeft;
	}
	
	
	public function setHoursLeft($hoursLeft)
	{
		if ($hoursLeft>0){
		$this->hoursLeft = $hoursLeft;
		}
		else {
			throw new \Exception('Hours must be  >0!');
				
		}
		}
	
	
	public function work(){
		
		$this->currentTask = new Task("polivane", 3);
		
		 if ($this->getHoursLeft()>$this->currentTask->getWorkingHours()){
			$this->hoursLeft = $this->hoursLeft - $this->currentTask->workingHours;
			$this->currentTask->workingHours=0;
		} else if ($this->getHoursLeft()<$this->currentTask->getWorkingHours()){
			$this->currentTask->workingHours=$this->currentTask->workingHours-$this->hoursLeft;
			$this->hoursLeft = 0;
		}
	}
	
	public function showReport(){
		
		return sprintf('Employee name:  %s, Task:  %s, Employee hours left: %s, Task hours left: %s', $this->name,$this->currentTask->name, $this->getHoursLeft(), $this->currentTask->workingHours);
	}
	
}