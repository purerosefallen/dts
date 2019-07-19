<?php

namespace skill529
{

	function init()
	{
		define('MOD_SKILL529_INFO','card;unique;locked;feature;');
		eval(import_module('clubbase'));
		$clubskillname[529] = '幻龙';
	}

	function acquire529(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function lost529(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function check_unlocked529(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return 1;
	}


	//灵系物理伤害为零 投|射物理伤害吸收转化为攻击
	// (strstr($pd['wepk'], 'B') != ''))) 这里不知道改什么
	// 数据部分要改
	function check_skill529_proc(&$pa, &$pd, $active, $dmg){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('skill529','player','logger'));
		if (\skillbase\skill_query(529,$pd) && check_unlocked529($pd) && strstr($pa['wepk'], 'F') != ''){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">对这只幻龙的的灵系伤害无效</span><br>');
			return 1;
		}
		elseif (\skillbase\skill_query(529,$pa) && check_unlocked529($pa) && strstr($pd['wepk'], 'F') != ''){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">对这只幻龙的灵系伤害无效</span><br>');
			return 1;
		}

		if (\skillbase\skill_query(529,$pd) && check_unlocked529($pd) && ((strstr($pa['wepk'], 'C') != '') || (strstr($pa['wepk'], 'G') != '') || (strstr($pa['wepk'], 'B') != ''))) {
			$rate = 0.3;
			$pd['att'] += $rate * $dmg;
		}
		elseif (\skillbase\skill_query(529,$pa) && check_unlocked529($pa) && ((strstr($pd['wepk'], 'C') != '') || (strstr($pd['wepk'], 'G') != '') || (strstr($pd['wepk'], 'B') != ''))) {
			$rate = 0.2;
			$pa['att'] += $rate * $dmg;
			//玩家部分暂定
		}
		return 0;
	}

	function get_physical_dmg_change(&$pa, &$pd, $active, $dmg)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$ret = $chprocess($pa, $pd, $active, $dmg);
		if(check_skill529_proc($pa,$pd,$active, $dmg)){
			$ret = 0;
		}
		return $ret;
	}

	//属性伤害为0
	function calculate_ex_attack_dmg_change(&$pa, &$pd, $active, $tdmg)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$ret = $chprocess($pa, $pd, $active, $tdmg);
		if (\skillbase\skill_query(529,$pd) && check_unlocked529($pd)){
			$ret = 0;
		}
		elseif (\skillbase\skill_query(529,$pa) && check_unlocked529($pa)){
			$ret = 0;
		}

		return $ret;
	}

}

?>