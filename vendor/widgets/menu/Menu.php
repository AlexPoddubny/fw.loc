<?php
	
	
	namespace vendor\widgets\menu;
	
	
	class Menu
	{
		protected $tpl;
		protected $class = 'menu';
		protected $container = 'ul';
		protected $table = 'categories';
		protected $cache = 3600;
		
		public function __construct($options = [])
		{
			switch ($this->container){
				case 'ul':
					$this->tpl = __DIR__ . '/menu_tpl/menu.php';
					break;
				case 'select':
					$this->tpl = __DIR__ . '/menu_tpl/select.php';
					break;
			}
			$this->getOptions($options);
			$this->output();
		}
		
		protected function output()
		{
			echo '<' . $this->container . ' class="' . $this->class . '">'
				. $this->getMenuHtml($this->getTree())
				. '</' . $this->container . '>';
		}
		
		protected function getOptions($options)
		{
			foreach ($options as $name => $value){
				if (property_exists($this, $name)){
					$this->$name = $value;
				}
			}
		}
		
		/**
		 * @return mixed
		 */
		public function getData()
		{
			return \R::getAssoc('SELECT * FROM ' . $this->table);
		}
		
		/**
		 * @return mixed
		 */
		protected function getTree()
		{
			$tree = [];
			$data = $this->getData();
			foreach ($data as $id => &$node){
				if (!$node['parent']){
					$tree[$id] = &$node;
				} else {
					$data[$node['parent']]['childs'][$id] = &$node;
				}
			}
			return $tree;
		}
		
		/**
		 * @return mixed
		 */
		public function getMenuHtml($tree, $tab = '')
		{
			$str = '';
			foreach ($tree as $id => $category){
				$str .= $this->catToTemplate($category, $tab, $id);
			}
			return $str;
		}
		
		protected function catToTemplate($category, $tab, $id){
			ob_start();
			require $this->tpl;
			return ob_get_clean();
		}
		
	}