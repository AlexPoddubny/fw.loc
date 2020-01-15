<?php
	
	
	namespace fw\widgets\menu;
	
	
	use fw\libs\Cache;
	
	class Menu
	{
		
		protected $menuHtml;
		protected $tpl;
		protected $class = 'menu';
		protected $container = 'ul';
		protected $table = 'categories';
		protected $cache = 3600;
		
		public function run()
		{
			if ($this->cache){
				$cache = new Cache();
				$this->menuHtml = $cache->get('fw_menu' . $this->container);
				if (!$this->menuHtml){
					$this->menuHtml = $this->getMenuHtml($this->getTree());
					$cache->set('fw_menu' . $this->container, $this->menuHtml, $this->cache);
				}
			} else {
				$this->menuHtml = $this->getMenuHtml($this->getTree());
			}
			$this->output();
		}
		
		public function __construct($options = [])
		{
			$this->setOptions($options);
			$this->run();
		}
		
		protected function output()
		{
			echo '<' . $this->container . ' class="' . $this->class . '">'
				. $this->menuHtml
				. '</' . $this->container . '>';
		}
		
		protected function setOptions($options)
		{
			foreach ($options as $name => $value){
				if (property_exists($this, $name)){
					$this->$name = $value;
				}
			}
			$this->setTemplate();
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
		 * @param $tree
		 * @param string $tab
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
		
		protected function setTemplate()
		{
			if (empty($this->tpl)){
				switch ($this->container){
					case 'ul':
						$this->tpl = __DIR__ . '/menu_tpl/menu.php';
						break;
					case 'select':
						$this->tpl = __DIR__ . '/menu_tpl/select.php';
						break;
				}
			}
		}
		
	}