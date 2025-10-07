<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('expandFieldAttr')) {
	function expandFieldAttr($f)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$res = htmlspecialchars(isset($flash[$f]) ? $flash[$f] : "");
		return <<<EOD
		name="$f" value="$res"
EOD;
	}
}

if (!function_exists('getNameById')) {
	function getNameById($id, $objs, $nameField)
	{
		if (!empty($objs)) {
			foreach ($objs as $o) {
				if ($id == $o->id)
					return $o->$nameField;
			}
		}

	}
}

if (!function_exists('expandFieldAttrSelectActive')) {
	function expandFieldAttrSelectActive($f, $objs, $nameField)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$currentVal = isset($flash[$f]) ? $flash[$f] : "";

		$res = <<<EOD
			<select name="$f" class="form-control" required>
				<option value="">Pilih salah satu $nameField yang Aktif</option>
		EOD;

		if (!empty($objs)) {
			foreach ($objs as $m) {
				if ($m->status == 'Aktif') {
					$isSelected = $m->id == $currentVal ? 'selected' : '';
					$namaVal = $m->$nameField;
					$res .= <<<EOD
					<option value="$m->id" $isSelected>
						$namaVal
					</option>
					EOD;

				}
			}
		}

		$res .= <<<EOD
			</select>
		EOD;


		return $res;
	}
}
