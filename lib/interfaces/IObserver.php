<?php

interface IObserver  {

	public function hourChange(ISubject $subject);
	public function dayStart(ISubject $subject);
	public function dayEnd(ISubject $subject);

}

?>