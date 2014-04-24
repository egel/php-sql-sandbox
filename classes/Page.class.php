<?php

class Page
{

	protected $_short_name="Unknown";
  protected $_title="Unknown";
  protected $_header="Unknown";
  protected $_footer="Unknown";
  protected $_body="Unknown";


	/*
	 * Constructors and destructors (default = not declared)
	 */
	public function __construct($title, $body, $show_now=FALSE)
  {
    // zwykłe przypisanie
    $this->_title = $title;

    // tworzenie instancji obiektu menu i dopisanie go do zmiennej body
    $menu = new Menu();
    $this->_body = $menu->get_menus();

    $this->_body .= $body;

    // przypisanie wartości zwracanej przez funkcje
    $this->_header = $this->get_header();
    $this->_footer = $this->get_footer();

    if ($show_now === TRUE)
    {
      $this->render_page();
    }
  }

  public function get_header()
  {
    return '
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

      <title>'.$this->_title.'</title>

      <!-- CSS -->
      <link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">
    </head>
    <body>
    ';
  }

  public function get_footer()
  {
    return '
        <!-- Core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/docs.min.js"></script>
      </body>
    </html>
    ';
  }


  public function render_page()
  {
    echo $this->_header;
    echo $this->_body;
    echo $this->_footer;
  }
}

?>
