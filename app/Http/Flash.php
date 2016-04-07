<?php

namespace App\Http;

class Flash{

	public function create($title, $message, $level, $key){
		return session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level
		]);
	}

	public function info($title, $message){
		return $this->create($title, $message, 'info', 'flash_message');
	}

	public function success($title, $message){
		return $this->create($title, $message, 'success', 'flash_message');
	}

	public function error($title, $message){
		return $this->create($title, $message, 'error', 'flash_message');
	}

	public function overlay($title, $message, $level){
		return $this->create($title, $message, $level, 'flash_message_overlay');
	}

}