<?php
	
	
	namespace fw\libs;
	
	
	class Cache
	{
		
		public function set($key, $data, $seconds = 3600)
		{
			$content['data'] = $data;
			$content['end_time'] = time() + $seconds;
			return file_put_contents(
				CACHE . '/' . md5($key) . '.txt',
				serialize($content)
			);
		}
		
		public function get($key)
		{
			$file = CACHE . '/' . md5($key) . '.txt';
			if (file_exists($file)){
				$content = unserialize(file_get_contents($file));
				if ($content['end_time'] >= time()){
					return $content['data'];
				}
				unlink($file);
			}
			return false;
		}
		
		public function delete($key)
		{
			$file = CACHE . '/' . md5($key) . '.txt';
			if (file_exists($file)){
				unlink($file);
			}
		}
		
	}