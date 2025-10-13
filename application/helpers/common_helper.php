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
				if ($id == $o->id) {
					$res = $o->$nameField;
					return $res;
				}
			}
		}
		return "(" . $id . ")";

	}
}

if (!function_exists('expandFieldAttrSelectActive')) {
	function expandFieldAttrSelectActive($f)
	{
		$CI = &get_instance();
		$flash = $CI->session->flashdata();

		$currentVal = isset($flash[$f]) ? $flash[$f] : "";

		$pos1 = strrpos($f, '___');
		$nameField = substr($f, $pos1+3);

		$master_table = substr($f, 0, strpos($f, '___'));
		$real1 = real_table_name($master_table);
		$objs = $GLOBALS[$real1];
		$res = <<<EOD
			<select name="$f" class="form-control" required>
				<option value="">Pilih salah satu $nameField yang Aktif</option>
		EOD;

		if (!empty($objs)) {
			foreach ($objs as $m) {
				if ($m['status'] == 'Aktif') {
					$m_id = $m['id'];
					$isSelected = $m_id == $currentVal ? 'selected' : '';
					$namaVal = $m[$nameField];
					$res .= <<<EOD
					<option value="$m_id" $isSelected>
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
