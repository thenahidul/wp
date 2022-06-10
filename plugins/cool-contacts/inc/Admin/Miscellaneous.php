<?php


namespace Cool\Contact\Admin;


use Cool\Contact\Admin\Interfaces\PluginPage;

class Miscellaneous implements PluginPage {
	
	public function render() {
		echo "<h1>Miscellaneous</h1>";
	}
}