<?php 

class Age{
	
	public $age;
	
	public function Age($age) {
		$bday = new Datetime($age);
		$today = new Datetime();
		
		$diff = $today->diff($bday);
		return $diff;
	}
}

?>