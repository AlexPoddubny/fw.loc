<?php
	
	
	namespace app\controllers;
	
	
	use fw\core\base\View;
	
	class FbparseController
		extends AppController
	{
		public function actionIndex()
		{
			$result = '';
			View::setMeta('FBParser');
			if (!empty($_POST['input'])){
				$result = $this->process($_POST['input']);
			}
			$this->set(compact('result'));
		}
		
		protected function process($page)
		{
			$str = '';
			$label1 = 'UFI2Comment/root_depth_0';
			$label2 = 'UFI2Comment/body';
			$label3 = '_72vr">';
			while (strpos($page, $label1) > 0){
				$page = $this->after($page, $label1);
				$page = $this->after($page, $label2);
				$page = $this->after($page, $label3);
				$str .= $this->between('>', '</a>', $page) . "\n";
			}
			return $str;
		}
		
		protected function after($haystack, $needle){
			return substr($haystack, strpos($haystack, $needle) + strlen
			($needle));
		}
		
		protected function before($haystack, $needle){
			return substr($haystack, 0, strpos($haystack, $needle));
		}
		
		protected function between($after, $before, $haystack)
		{
			return $this->before($before, $this->after($after, $haystack));
		}
		
	}