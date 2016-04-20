<?php
class navb {
	private function navIt($items) {
		$html = "<nav class='navbar'>\n";
		$html .= "<img id='iconav' src='img/avans.png' alt='AVANS Icon'> <div id='navorg'>";
		foreach ( $items as $key => $item ) {
			$selected = basename ( $_SERVER ['PHP_SELF'] ) == $key ? 'selected' : null;
			$html .= "<a href='{$item['url']}'class='{$selected}'>{$item['text']}</a>\n";
		}
		$html .= "<a href='logout.php' class='logout'>Logout</a></div></nav>\n";
		return $html;
	}
	public static function generateNav() {
		$menu = array (
				'menu_teacher.php' => array (
						'text' => 'Schedule',
						'url' => 'menu_teacher.php' 
				),
				'mail.php' => array (
						'text' => 'Mail',
						'url' => 'mail.php' 
				),
				'createE.php' => array (
						'text' => 'Create E',
						'url' => 'createE.php' 
				),
				'listE.php' => array (
						'text' => 'List E',
						'url' => 'listE.php' 
				) 
		);
		return navb::navIt ( $menu );
	}
}
?>