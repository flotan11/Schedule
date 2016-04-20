<?php
 Class navb{
private function navIt($items) {
 	$html = "<nav class='navbar'>\n";
 	$html.= "<img id='iconav' src='img/avans.png' alt='AVANS Icon'> <div id='navorg'>";
 	foreach($items as $key => $item) {
 		$selected = basename($_SERVER['PHP_SELF']) == $key ? 'selected' : null;
 		$html .= "<a href='{$item['url']}'class='{$selected}'>{$item['text']}</a>\n";
 	}
 	$html .= "</div></nav>\n";
 	return $html;
 }

public static function generateNav() {
	$menu = array(
  	'menu_root.php'   => array('text'=>'Menu',  'url'=>'menu_root.php'),
  	'insert_root.php' => array('text'=>'Insert data',  'url'=>'insert_root.php'),
  	'update_root.php' => array('text'=>'Update data', 'url'=>'update_root.php'),
	'index.php' => array('text'=>'Disconnection', 'url'=>'index.php'),
	);
	return navb::navIt($menu);
	}
}
?>