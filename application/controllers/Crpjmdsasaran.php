<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/CAdmDataParent.php");
include_once(dirname(__FILE__) . "/form_validation_all.php");

class Crpjmdsasaran extends CAdmDataParent
{
	protected $defaultModel = 'MRpjmdsasaran';
	protected $defaultName = 'RPJMD Sasaran';
	protected $tag1 = "rpjmdsasaran";

	public function save()
	{
		$fv = $this->form_validation;
		$vs = gen_validations_forms($this->tag1);
		foreach ($vs as $v1) {
			$fv->set_rules(...$v1);
		}

		$this->_savedata = gen_savedata_forms($this, $this->tag1);

		parent::save();
	}

}
