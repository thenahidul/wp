<?php

namespace Cool\Contact\Admin;

use Cool\Contact\Admin\Interfaces\PluginPage;

class Settings implements PluginPage {
	public function render() {
		echo "<h1>Settings</h1>";
	}
}