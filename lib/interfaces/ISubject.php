<?php

interface ISubject {

	public function attach(IObserver $observer);
	public function detach(IObserver $observer);
  public function onHourChange();
  public function onDayStart();
  public function onDayEnd();

}

?>