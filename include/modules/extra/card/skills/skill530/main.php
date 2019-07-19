<?php

namespace skill530
{

	function init()
	{
		define('MOD_SKILL530_INFO','card;unique;locked;feature;');
		eval(import_module('clubbase'));
		$clubskillname[530] = '兽人';
	}

	function acquire530(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function lost530(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}

	function check_unlocked530(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return 1;
	}


	//火焰伤害 * 2

	function check_skill530_proc(&$pa, &$pd, $active, $final_dmg){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('skill530','player','logger'));
		if (\skillbase\skill_query(530,$pd) && check_unlocked530($pd) && strstr($pa['wepsk'], 'u') != ''){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">对这只兽人的的火焰伤害*2</span><br>');
		}
		elseif (\skillbase\skill_query(530,$pa) && check_unlocked530($pa) && strstr($pd['wepsk'], 'u') != ''){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">对这只兽人的火焰伤害*2</span><br>');
		}

		if (\skillbase\skill_query(530,$pd) && check_unlocked530($pd)) {

			$rate = 0.3;
			$defup = $rate * $final_dmg;
			$pdlist = t_get_affected_players();
			if(empty($pdlist)) return 0;
			//先处理自己
			t_data_proc_single($pd, $defup);
			//处理其他npc
			foreach($pdlist as $pdata){
				$ret = t_data_proc_single($pdata, $defup);
				\player\player_save($pdata);
			}
			return 1;
		}
		elseif (\skillbase\skill_query(530,$pa) && check_unlocked530($pa)) {
			//玩家部分暂定
		}
		return 0;
	}

	//火焰伤害两倍
	function calculate_ex_attack_dmg_multiplier(&$pa, &$pd, $active){
		if (eval(__MAGIC__)) return $___RET_VALUE;

		$r = Array();
		if (\skillbase\skill_query(530,$pd) && check_unlocked530($pd) && (strstr($pa['wepsk'], 'u') != '')){
			$r = Array(2);
		}
		elseif (\skillbase\skill_query(530,$pa) && check_unlocked530($pa) && (strstr($pd['wepsk'], 'u') != '')){
			$r = Array(2);
		}
		return array_merge($r,$chprocess($pa, $pd, $active));
	}


	//获得所有存活 NPC 的 pid
	function t_get_affected_players(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));

		$result = $db->query("SELECT pid FROM {$tablepre}players WHERE type != 0 AND hp > 0 AND pid != '$pid';");
		if(!$db->num_rows($result)) return array();
		$list = array();
		while($r = $db->fetch_array($result)){
			$list[] = $r['pid'];
		}
		$ret = array();
		foreach($list as $pdid){
			$ret[] = \player\fetch_playerdata_by_pid($pdid);
		}
		return $ret;

	}

	//根据 pid 增加 def
	function t_data_proc_single(&$pdata, $defup){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		$pdata['def'] = $pdata['def'] + $defup;

		return 0;
	}

	function get_final_dmg_base(&$pa, &$pd, &$active){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$final_dmg = $pa['dmg_dealt'];

		eval(import_module('logger'));
		if (check_skill530_proc($pa, $pd, $active, $final_dmg)){
			$log .=  \battle\battlelog_parser($pa, $pd, $active, '<span class="yellow b">兽人吸收了你的攻击</span><br>');
		}
		return 0;
	}

}

?>