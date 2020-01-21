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
				$this->set(compact('result'));
			}
		}
		
		protected function process($page)
		{
			$str = '';
			$name = '';
			$label1 = 'UFI2Comment/root_depth_0';
			$label2 = 'UFI2Comment/body';
			$label3 = '_72vr">';
			while (strpos($page, $label1) > 0){
				$page = $this->after($page, $label1);
				$page = $this->after($page, $label2);
				$page = $this->after($page, $label3);
				$str .= $this->delSpaces($this->between('>', "<", $page)) . "\n";
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
			return $this->before($this->after($haystack, $after), $before);
		}
		
		protected function str_replace_once($search, $replace, $text)
		{
			$pos = strpos($text, $search);
			return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
		}
		
		protected function delSpaces($str)
		{
			return str_replace("\t", '', $this->str_replace_once("\t", '&nbsp', str_replace("\n", '', str_replace("\r", '', $str))));
		}
		
	}