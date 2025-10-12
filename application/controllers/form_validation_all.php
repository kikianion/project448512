<?php

function gen_validations_forms($name)
{
	$validation_forms = [
		"rpjmdperiode" => [
			['namaperiode', 'Nama Periode', 'required|max_length[1000]|trim'],
			['tahun_awal', 'Tahun Awal', 'required|integer|trim'],
			['tahun_akhir', 'Tahun Akhir', 'required|integer|trim']
		],
		"rpjmdtujuan" => [
			['misi_id', 'Misi', 'required|integer|trim'],
			['tujuan', 'Tujuan', 'required|max_length[200]|trim'],
			['urut', 'Urut', 'integer|trim']
		],
		"rpjmdsasaran" => [
			['tujuan_id', 'Tujuan RPJMD', 'required|integer|trim'],
			['sasaran', 'Sasaran RPJMD', 'required|max_length[200]|trim'],
			['urut', 'Urut', 'integer|trim']
		],
		"rpjmdindikatortujuan" => [
			['indikator', 'Indikator', 'required|max_length[200]|trim'],
			['tujuan_id', 'Tujuan RPJMD', 'required|integer|trim'],
			['satuan', 'Satuan', 'max_length[50]|trim'],
			['kondisi_awal', 'Kondisi Awal', 'numeric|trim'],
			['formulasi', 'Formulasi', 'trim'],
			['target_1', 'Target Tahun 1', 'numeric|trim'],
			['target_2', 'Target Tahun 2', 'numeric|trim'],
			['target_3', 'Target Tahun 3', 'numeric|trim'],
			['target_4', 'Target Tahun 4', 'numeric|trim'],
			['target_5', 'Target Tahun 5', 'numeric|trim']
		],
		"rpjmdindikatorsasaran" => [
			['indikator', 'Indikator', 'required|max_length[200]|trim'],
			['sasaran_id', 'Sasaran RPJMD', 'required|integer|trim'],
			['satuan', 'Satuan', 'max_length[50]|trim'],
			['kondisi_awal', 'Kondisi Awal', 'numeric|trim'],
			['formulasi', 'Formulasi', 'trim'],
			['target_1', 'Target Tahun 1', 'numeric|trim'],
			['target_2', 'Target Tahun 2', 'numeric|trim'],
			['target_3', 'Target Tahun 3', 'numeric|trim'],
			['target_4', 'Target Tahun 4', 'numeric|trim'],
			['target_5', 'Target Tahun 5', 'numeric|trim']
		],
		"masterperiodeanggaran" => [
			['kode', 'Kode', 'required|max_length[20]|trim'],
			['keterangan', 'Keterangan', 'required|max_length[100]|trim']
		],
		"mastergroupingperiode" => [
			['namagroup', 'Nama Group', 'required|max_length[50]|trim'],
			['jumlah_bulan', 'Jumlah Bulan', 'required|integer|greater_than[0]|less_than_equal_to[12]|trim']
		],
		"masterbrandingnama" => [
			['nama_aplikasi', 'Nama Aplikasi', 'required|max_length[100]|trim']
		],
		"masterbrandingsubnote" => [
			['subnote', 'Subnote', 'required|max_length[200]|trim']
		],
		"masterbrandingbackground" => [
			['background', 'Background', 'callback_validate_image_upload']
		],
		"masterbrandinglogo" => [
			['logo', 'Logo', 'callback_validate_image_upload']
		],
		"masterbrandingfavicon" => [
			['favicon', 'Favicon', 'callback_validate_image_upload']
		]
	];

	return $validation_forms[$name];

}

function gen_savedata_forms($CI, $name)
{

	$savedata_forms = [
		"rpjmdperiode" => [
			'nama' => $CI->input->post('namaperiode'),
			'awal' => $CI->input->post('tahun_awal'),
			'akhir' => $CI->input->post('tahun_akhir'),
		],
		"rpjmdtujuan" => [
			'misi_id' => $CI->input->post('misi_id'),
			'tujuan' => $CI->input->post('tujuan'),
			'urut' => $CI->input->post('urut'),
		],
		"rpjmdsasaran" => [
			'tujuan_id' => $CI->input->post('tujuan_id'),
			'sasaran' => $CI->input->post('sasaran'),
			'urut' => $CI->input->post('urut'),
		],
		"rpjmdindikatortujuan" => [
			'indikator' => $CI->input->post('indikator'),
			'tujuan_id' => $CI->input->post('tujuan_id'),
			'satuan' => $CI->input->post('satuan'),
			'kondisi_awal' => $CI->input->post('kondisi_awal'),
			'formulasi' => $CI->input->post('formulasi'),
			'target_1' => $CI->input->post('target_1'),
			'target_2' => $CI->input->post('target_2'),
			'target_3' => $CI->input->post('target_3'),
			'target_4' => $CI->input->post('target_4'),
			'target_5' => $CI->input->post('target_5'),
		],
		"rpjmdindikatorsasaran" => [
			'indikator' => $CI->input->post('indikator'),
			'sasaran_id' => $CI->input->post('sasaran_id'),
			'satuan' => $CI->input->post('satuan'),
			'kondisi_awal' => $CI->input->post('kondisi_awal'),
			'formulasi' => $CI->input->post('formulasi'),
			'target_1' => $CI->input->post('target_1'),
			'target_2' => $CI->input->post('target_2'),
			'target_3' => $CI->input->post('target_3'),
			'target_4' => $CI->input->post('target_4'),
			'target_5' => $CI->input->post('target_5'),
		],
		"masterperiodeanggaran" => [
			'kode' => $CI->input->post('kode'),
			'keterangan' => $CI->input->post('keterangan'),
		],
		"mastergroupingperiode" => [
			'namagroup' => $CI->input->post('namagroup'),
			'jumlah_bulan' => $CI->input->post('jumlah_bulan'),
		],
		"masterbrandingnama" => [
			'nama_aplikasi' => $CI->input->post('nama_aplikasi'),
		],
		"masterbrandingsubnote" => [
			'subnote' => $CI->input->post('subnote'),
		],
		"masterbrandingbackground" => [
			'background' => $CI->input->post('background'),
		],
		"masterbrandinglogo" => [
			'logo' => $CI->input->post('logo'),
		],
		"masterbrandingfavicon" => [
			'favicon' => $CI->input->post('favicon'),
		],
	];

	return $savedata_forms[$name];

}


?>
