<?php
$tables_common_col=["id","status"];
$tables=[
	"pd_tujuan"=>[
		"nama"=> "varchar(50),required,pk,autoincrement",
		"sasaran_rpjmd_id"=>"int(11),required"
	],
	"pd_indikatortujuan"=>[
		"nama"=> "varchar(50),required,pk,autoincrement",
		"sasaran_rpjmd_id"=>"int(11),required"
	],
];
	



$translation=[

]
