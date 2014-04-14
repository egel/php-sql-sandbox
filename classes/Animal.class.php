<?php

abstract class Animal
{


	protected $_type ="Unknown";
	protected $_name="Unknown";
	protected $_continent="Unknown";
	protected $_age="Unknown";
	protected $_like="Unknown";
	protected $_image_name="Unknown"; // name of file

	/*
	 * Constructors and destructors (default = not declared)
	 */
	public function __construct($object)
  {
  	//print_r($object);  // simple to check what' inside $object
    $this->_type = $object->type;
    $this->_continent = $object->continent_name;
    $this->_name = $object->animal_name;
    $this->_age = $object->age;
    $this->_like = $object->like_todo;
    $this->_image_name = $object->image_name;
  }


  /*
   * Functions
   */
	public function sayHi()
	{
		echo '<div style="padding-top:30px; clear:both;">';
		echo '<img src="'.MEDIA_BASEDIR.$this->_image_name.'" title="'.$this->_type.' '.$this->_name.'" style="float:left;" />';
		echo '<p>Hello, my name is '.$this->_name. '. I am '.$this->_type.' and live in '. $this->_continent .'.</p>';
		echo '<p>I\'m '.$this->_age.' years old and I like '.$this->_like.'.</p>';
		echo '</div>';
	}
}

?>
