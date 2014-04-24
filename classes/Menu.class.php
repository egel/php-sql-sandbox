<?php

class Menu
{

	protected $pages = array("zoo" -> "Moje małe Zoo",
                           "glowna" -> "Strona Główna");

	/*
	 * Constructors and destructors (default = not declared)
	 */
	public function __construct($show_now=FALSE)
  {
    if ($show_now === TRUE)
    {
      $this->render_menu();
    }
  }

  public function get_menus()
  {
    $result = '<ul id="nav">';
    foreach ($this->pages as $value) {
      $result .= '<li><a href="index.php?page='.$value.'">'.$value.'</a></li>';
    }
    $result .= '</ul>';

    return $result;
  }


  public function render_menu()
  {
    echo $this->get_menus();
  }

}

?>
