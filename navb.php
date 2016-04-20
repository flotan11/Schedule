<?php
class navb {
	public static function navIt($items) {
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
		if (isset($_SESSION['status'])){
			if($_SESSION['status']=='teacher'){
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
			}else if($_SESSION['status']=='root'){
				$menu = array(
					'menu_root.php' => array(
							'text'=>'Menu',
							'url'=>'menu_root.php'
					),
					'insert_root.php' => array(
							'text'=>'Insert data',
							'url'=>'insert_root.php'
					),
					'update_root.php' => array(
							'text'=>'Update data',
							'url'=>'update_root.php'
					),
				);
			}
			return navb::navIt ( $menu );
		}
	}
}
?>