<?php

use PHPUnit\Framework\TestCase;

class MasterMitraViewTest extends TestCase
{
	private function render_view($data = [])
	{
		// Minimal CI-like helper stubs used in the view
		if (!function_exists('form_open')) {
			function form_open($action) { return '<form action="' . $action . '">'; }
		}
		if (!function_exists('site_url')) {
			function site_url($path) { return $path; }
		}
		if (!function_exists('widget_flash')) {
			function widget_flash($tag) { return ''; }
		}

		extract($data);
		ob_start();
		require __DIR__ . '/../../../views/administrator/admsistem/mastermitra.php';
		return ob_get_clean();
	}

	public function test_fields_are_visible()
	{
		$html = $this->render_view([
			'edit_master_mitra' => (object)[],
			'master_mitra' => []
		]);

		// Labels
		$this->assertStringContainsString('Master Mitra', $html);
		$this->assertStringContainsString('Mitra', $html);
		$this->assertStringContainsString('Pimpinan', $html);
		$this->assertStringContainsString('NIP/Pang', $html);
		$this->assertStringContainsString('Jabatan', $html);

		// Inputs by name attributes
		$this->assertStringContainsString('name="namamitra"', $html);
		$this->assertStringContainsString('name="urut"', $html);
		$this->assertStringContainsString('name="id"', $html);
		$this->assertStringContainsString('name="kepala"', $html);
		$this->assertStringContainsString('name="nipkepala"', $html);
		$this->assertStringContainsString('name="pangkepala"', $html);
		$this->assertStringContainsString('name="jabatan"', $html);

		// Buttons
		$this->assertStringContainsString('Cancel', $html);
		$this->assertStringContainsString('Simpan', $html);
	}
}


