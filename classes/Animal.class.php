<?php

abstract class Animal
{
	protected $type;
	protected $name;
	protected $age;
	protected $like;

	protected $image_name;

	public function sayHi()
	{
		echo '<div style="padding-top:30px; clear:both;">';
		echo '<img src="images/'.$this->image_name.'" title="'.$this->type.' '.$this->name.'" style="float:left;" />';
		echo '<p>Hello, I am '.$this->type.' and my name is '.$this->name.'</p>';
		echo '<p>I\'m '.$this->age.' years old and I like '.$this->like.'.</p>';
		echo '</div>';
	}

}

?>
