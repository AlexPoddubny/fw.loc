<?php
	
	
	namespace fw\libs;
	
	
	class Pagination
	{
		public $currentPage;
		public $perpage;
		public $total;
		public $countPages;
		public $uri;
		
		public function __construct($page, $perpage, $total)
		{
			$this->perpage = $perpage;
			$this->total = $total;
			$this->countPages = $this->getCountPages();
			$this->currentPage = $this->getCurrentPage($page);
			$this->uri = $this->getParams();
		}
		
		/**
		 * @return void
		 */
		public function getCountPages()
		{
			return ceil($this->total / $this->perpage) ? : 1;
		}
		
	}