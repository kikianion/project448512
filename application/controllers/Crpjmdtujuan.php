<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/CAdmDataParent.php");
include_once(dirname(__FILE__) . "/form_validation_all.php");

class Crpjmdtujuan extends CAdmDataParent
{
	protected $defaultModel = 'MRpjmdtujuan';
	protected $defaultName = 'RPJMD Tujuan';
	protected $tag1 = "rpjmdtujuan";

	public function save()
	{

		$fv = $this->form_validation;
		$vs=gen_validations_forms('rpjmdtujuan');
		foreach ($vs as $v1) {
			$fv->set_rules(...$v1);
		}

		$this->_savedata = gen_savedata_forms($this, 'rpjmdtujuan');

		parent::save();
	}

}
