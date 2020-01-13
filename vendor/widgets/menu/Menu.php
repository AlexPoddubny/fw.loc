<?php
	
	
	namespace vendor\widgets\menu;
	
	
	class Menu
	{
		protected $data;
		protected $tree;
		protected $menuHtml;
		protected $tpl;
		protected $container;
		protected $table = 'categories';
		protected $cache;
		
		public function __construct()
		{
			$this->run();
		}
		
		protected function run()
		{
			$this->getData();
			$this->getTree();
			echo $this->menuHtml = $this->getMenuHtml($this->tree);
		}
		
		/**
		 * @return mixed
		 */
		public function getData()
		{
			return $this->data = \R::getAssoc('SELECT * FROM ' . $this->table);
		}
		
		/**
		 * @return mixed
		 */
		protected function getTree()
		{
			$tree = [];
			$data = $this->data;
			foreach ($data as $id => &$node){
				if (!$node['parent']){
					$tree[$id] = &$node;
				} else {
					$data[$node['parent']]['childs'][$id] = &$node;
				}
			}
			return $this->tree = $tree;
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
			require __DIR__ . '/menu_tpl/menu.php';
			return ob_get_clean();
		}
		
	}