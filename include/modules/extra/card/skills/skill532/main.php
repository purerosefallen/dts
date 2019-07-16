<?php

namespace skill532
{

	function init()
	{
		define('MOD_SKILL532_INFO','card;unique;locked;feature;');
		eval(import_module('clubbase'));
		$clubskillname[532] = '控偶';
	}

	function acquire532(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function lost532(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function check_unlocked532(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return 1;
	}


	//游戏中存在其他存活的【人形】·【石像】的场合，死亡后保留50%HP原地复活，牺牲其中随机一个（尸体不清除）
	function check_skill532_proc(&$pa, &$pd, $active){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('skill532','player','logger'));
		if (\skillbase\skill_query(532,$pd) && check_unlocked532($pd) ){
			if($pa['dmg_dealt'] >= $pd['hp'] && $ret = check_alive_NPC532()){
					return $ret;
				}
			return 0;
		}
		return 0;
	}

	//检测存活NPC 随机返回一个
	function check_alive_NPC532(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		$result = $db->query("SELECT pid FROM {$tablepre}players WHERE type != 0 AND hp > 0 AND pid != '$pid' AND (name LIKE '%人形%' or name LIKE '%魔像%');");
		$dpnum = $db->num_rows($result);
		if(!$dpnum) return 0;
		$list = array();
		while($r = $db->fetch_array($result)){
			$list[] = $r['pid'];
		}
		$ret = array();

		//随机返回一个npc
		$rand = mt_rand(0, $dpnum);
		$i = 0;
		foreach($list as $pdid){
			if($rand == $i){
				$ret = \player\fetch_playerdata_by_pid($pdid);
				break;
			}
			$i ++;
		}
		return $ret;
	}

	//hp 变为 mhp 的一半，伤害归零，死一个【人形】·【石像】
	function apply_total_damage_modifier_insurance(&$pa,&$pd,$active)
	{
	if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('logger'));
		$chprocess($pa, $pd, $active);
		if($pdata = check_skill532_proc($pa, $pd, $active)){
			$pd['hp'] = $pd['mhp'] * 0.5;
			$pdata['hp'] = 0;
			\player\player_save($pdata);
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">从遥远的地方传来了一股生命力，这个角色因此重新站了起来！</span><br>');
			$pa['dmg_dealt'] -= $pa['dmg_dealt'];
		}
	}



}

?>