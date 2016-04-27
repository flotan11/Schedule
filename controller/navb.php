<?php
class navb {
	public static function navIt($items) {
		require_once dirname(__FILE__).'/../data/pathFinder.php';
		$pathFinder=new pathFinder;
		$html = "<nav class='navbar'>\n";
		$html .= "<img id='iconav' src='../../img/avans.png' alt='AVANS Icon'> <div id='navorg'>";
		foreach ( $items as $key => $item ) {
			$selected = basename ( $_SERVER ['PHP_SELF'] ) == $key ? 'selected' : null;
			$html .= "<a href='{$item['url']}'class='{$selected}'>{$item['text']}</a>\n";
		}
		$html .= "<a href='".$pathFinder->getLogout()."' class='logout'>Logout</a></div></nav>\n";
		return $html;
	}
	public static function generateNav() {
		require_once dirname(__FILE__).'/../data/pathFinder.php';
		$pathFinder=new pathFinder;
		if (isset($_SESSION['status'])){
			if($_SESSION['status']=='teacher'){
				$menu = array (
					'menu_teacher.php' => array (
							'text' => 'Schedule',
							'url' => $pathFinder->getMenuTeacher() 
					),
					'mail.php' => array (
							'text' => 'Mail',
							'url' => $pathFinder->getMail()
					),
					'createE.php' => array (
							'text' => 'Create E',
							'url' => $pathFinder->getCreateE()
					),
					'listE.php' => array (
							'text' => 'List E',
							'url' => $pathFinder->getListE() 
					) 
				);
			}else if($_SESSION['status']=='root'){
				$menu = array(
					'menu_root.php' => array(
							'text'=>'Menu',
							'url'=> $pathFinder->getMenuRoot()
					),
					'insert_root.php' => array(
							'text'=>'Insert data',
							'url'=> $pathFinder->getInsertRoot()
					),
					'update_root.php' => array(
							'text'=>'Update data',
							'url'=> $pathFinder->getUpdateRoot()
					),
				);
			}
			return navb::navIt ( $menu );
		}
	}
}
?>