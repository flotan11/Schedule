<?php
	class pathFinder{
		private function parcours_rep($rep, $ssrep, $racine, $target){
			static $res="false";
			if (is_dir($rep)){
				if( $dir = opendir($rep) ){
					while( ($fichier = readdir($dir)) !== false ){
						if ($fichier != "." && $fichier != ".." ){
							$chemin = $rep.$fichier;
							if (is_dir($chemin)){
								$this->parcours_rep($chemin.'/', ($ssrep==''?$fichier:$ssrep.'/'.$fichier) , $racine , $target);
							}else{
								if($fichier==$target){
									$res=$chemin;
							 	}
							}
						}
					}
				}
			}
			else{
				echo "Repertorie \"$rep\" doesnt exist ...";
			}
			closeDir($dir);
			return $res;
			$res=false;
		}

		private function foundFile($file){
			$act= str_replace('\\', '/', getcwd());
			$count=substr_count($act,'/')-2;
			$act="";
			for($i=0;$i<$count;$i++){
				$act=$act."../";
			}
			$racine=$act.'Schedule/';
			$res=$this->parcours_rep($racine,'',$racine, $file);
			if ($res!=false){
				return $res;
			}
		}
		
		public function getIndex(){
			return $this->foundFile('index.php');
		}
		
		public function getMenuTeacher(){
			return $this->foundFile('menu_teacher.php');
		}
		
		public function getMail(){
			return $this->foundFile('mail.php');
		}
		
		public function getCreateE(){
			return $this->foundFile('createE.php');
		}
		
		public function getListE(){
			return $this->foundFile('listE.php');
		}
		
		public function getInsertRoot(){
			return $this->foundFile('insert_root.php');
		}
		
		public function getMenuRoot(){
			return $this->foundFile('menu_root.php');
		}
		
		public function getUpdateRoot(){
			return $this->foundFile('update_root.php');
		}
		
		public function getMenu(){
			return $this->foundFile('menu.php');
		}
		
		public function getDBData(){
			return $this->foundFile('DBData.php');
		}
		
		public function getDBAsker(){
			return $this::foundFile('DBAsker.php');
		}
		
		public function getCheck(){
			return $this->foundFile('check.php');
		}
		
		public function getCheckLog(){
			return $this->foundFile('check_log.php');
		}
		
		public function getCheckInsertRoot(){
			return $this->foundFile('checkInsert_root.php');
		}
		
		public function getEventsButtons(){
			return $this->foundFile('eventsButtons.php');
		}
		
		public function getLogout(){
			return $this->foundFile('logout.php');
		}
		
		public function getNavB(){
			return $this->foundFile('navb.php');
		}
		
		public function getUsefullFonc(){
			return $this->foundFile('usefullFonc.php');
		}
		
		public function getDTable(){
			return $this->foundFile('dtable.js');
		}
		
		public function getJQuery(){
			return $this->foundFile('jquery-2.2.3.js');
		}
	}
?>