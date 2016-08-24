<?php

class Computer
{
	protected 	$year;
	protected 	$price;
	protected 	$isNotebook;
	protected 	$hardDiskMemory;
	protected 	$freeMemory;
	protected 	$operationSystem;
	



	public function __construct($year,$price,$isNotebook,$hardDiskMemory,$freeMemory,$operationSystem)
	{
		$this->year = $year;
		$this->price = $price;
		$this->isNotebook = $isNotebook;
		$this->hardDiskMemory = $hardDiskMemory;
		$this->freeMemory = $freeMemory;
		$this->operationSystem = $operationSystem;
	}

	
	public function changeOperationSystem($newOperationSystem)
	{
	$this->operationSystem=$newOperationSystem;	
	}



	
	public function useMemory($memory)
	{
	if ($this->freeMemory>$memory){
	$this->freeMemory = $this->freeMemory - $memory;
	}	
	else{
		throw new \Exception('Not enought free memory!');
	}
	}
	
	
	
	public function getYear(){
		return $this->year;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function getIsNotebook(){
		return $this->isNotebook;
	}
	
	public function getHDD(){
		return $this->hardDiskMemory;
	}
	
	public function getFreeMem(){
		return $this->freeMemory;
	}
	
	public function getOS(){
		return $this->operationSystem;
	}
	
	
	public function getInfo()
	{
		// red Toyota Celica speed 30 km/h
		return sprintf('Produced through: %s, with price: %s, type-NoteBook: %s, HDD: %sGB. Free memory is: %sGB and OS: %s. ',
				$this->getYear(),
				$this->getPrice(),
				$this->getIsNotebook(),
				$this->getHDD(),
				$this->getFreeMem(),
				$this->getOS()
				);
	
	}
	
	
	
	
	
	
}