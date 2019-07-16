<?php

namespace skill527
{

	function init()
	{
		define('MOD_SKILL527_INFO','card;unique;locked;feature;');
		eval(import_module('clubbase'));
		$clubskillname[527] = '无色';
	}

	function acquire527(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function lost527(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function check_unlocked527(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return 1;
	}


	//灵系物理伤害为零
	function check_skill527_proc(&$pa, &$pd, $active){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('skill527','player','logger'));
		if (\skillbase\skill_query(527,$pd) && check_unlocked527($pd) && strstr($pa['wepk'], 'F') != ''){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">对无色的妖精的灵系伤害无效！<br>你无法用灵系攻击刺穿这个角色的皮肤！</span><br>');
			$r = 1;
			return $r;
		}
		return 0;
	}

	function get_physical_dmg_change(&$pa, &$pd, $active, $dmg)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$ret = $chprocess($pa, $pd, $active, $dmg);
		if(check_skill527_proc($pa,$pd,$active)){
			$ret = 0;
		}
		return $ret;
	}

	//电击音波8倍伤害
	function calculate_ex_attack_dmg_multiplier(&$pa, &$pd, $active)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;

		$r=Array();
		if (\skillbase\skill_query(527,$pd) && check_unlocked527($pd) &&( strstr($pa['wepsk'], 'e') != '' || strstr($pa['wepsk'], 'w') != '') ){
			$r = Array(8);
		}

		return array_merge($r,$chprocess($pa, $pd, $active));
	}

}

?>