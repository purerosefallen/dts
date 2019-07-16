<?php

namespace skill531
{

	function init()
	{
		define('MOD_SKILL531_INFO','card;unique;locked;feature;');
		eval(import_module('clubbase'));
		$clubskillname[531] = '地灵';
	}

	function acquire531(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function lost531(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function check_unlocked531(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return 1;
	}


	//游戏中存在其他存活的【妖精】·【龙】·【兽人】的场合，不会死亡（就地回复50%HP）
	function check_skill531_proc(&$pa, &$pd, $active){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('skill531','player','logger'));
		if (\skillbase\skill_query(531,$pd) && check_unlocked531($pd) && check_alive_NPC531()){
			if($pa['dmg_dealt'] >= $pd['hp']){
					return 1;
				}
			return 0;
		}
		return 0;
	}

	function check_alive_NPC531(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		$result = $db->query("SELECT pid FROM {$tablepre}players WHERE type != 0 AND hp > 0 AND pid != '$pid' AND (name LIKE '%兽人%' or name LIKE '%龙%' or name LIKE '%妖精%');");
		if(!$db->num_rows($result)) return 0;
		else return 1;
	}

	//hp 变为 mhp 的一半，伤害归零
	function apply_total_damage_modifier_insurance(&$pa,&$pd,$active)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('logger'));
		$chprocess($pa, $pd, $active);
		if(check_skill531_proc($pa, $pd, $active)){
			$pd['hp'] = $pd['mhp'] * 0.5;
				$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">因为一种神奇的连携的力量，这个角色复活了！</span><br>');
			$pa['dmg_dealt'] -= $pa['dmg_dealt'];
		}
	}



}

?>