<?php

//记录一些杂项数据的技能
//目前记录数据有：
//本局得到过的金钱数
//本局累计获得的切糕
//被DN的理由

namespace skill1003
{
	$skill1003_o_money = 0;
	
	function init() 
	{
		define('MOD_SKILL1003_INFO','hidden;');
	}
	
	function acquire1003(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		\skillbase\skill_setvalue(1003,'money_got',0,$pa);
		\skillbase\skill_setvalue(1003,'qiegao_got',0,$pa);
	}
	
	function lost1003(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
	}
	
	function pre_act(){//每次行动记录得到的金钱
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('player','skill1003'));
		if(\skillbase\skill_query(1003)){
			$skill1003_o_money = $money;
		}
		$chprocess();
	}
	
	function post_act(){//每次行动记录得到的金钱
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('player','skill1003'));
		$chprocess();
		if(\skillbase\skill_query(1003) && $money > $skill1003_o_money){
			
			$money_got = $money - $skill1003_o_money;
			$money_got += \skillbase\skill_getvalue(1003,'money_got');	
			\skillbase\skill_setvalue(1003,'money_got',$money_got);	
		}
	}
	
	//战斗获得切糕改为先暂存在这个技能里，战斗结束才结算
	function battle_get_qiegao_update($qiegaogain,&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if(\skillbase\skill_query(1003, $pa)){
			$nowqiegao = \skillbase\skill_getvalue(1003,'qiegao_got', $pa);	
			\skillbase\skill_setvalue(1003,'qiegao_got',$nowqiegao + $qiegaogain, $pa);
		}else{
			$chprocess($qiegaogain,$pa);
		}
	}
	
	//战斗结束时的结算
	function gameover_get_gold_up($data, $winner = '',$winmode = 0)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$ret = $chprocess($data, $winner, $winmode);
		$tmp_data = $data;
		list($tmp_data['acquired_list'], $tmp_data['parameter_list']) = \skillbase\skillbase_load_process($data['nskill'], $data['nskillpara']);
		if(\skillbase\skill_query(1003, $tmp_data)) {
			$ret += \skillbase\skill_getvalue(1003,'qiegao_got', $tmp_data);	
		}
		return $ret;
	}
	
	//被DN时记录理由
	function deathnote_process_core(&$pa, &$pd, $dndeath=''){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if(\skillbase\skill_query(1003, $pd)) {
			\skillbase\skill_setvalue(1003,'dndeath', $dndeath, $pd);
		}
		$chprocess($pa, $pd, $dndeath);
	}
	
	//顺带着给个DN死亡提示好了
	function get_dinfo(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$ret = $chprocess($pa);
		if(28 == $pa['state'] && \skillbase\skill_query(1003, $pa)) {
			$dndeath = \skillbase\skill_getvalue(1003,'dndeath', $pa);
			$ret = '你因为<span class="yellow b">'.$dndeath.'</span>意外死去了。<br>';
		}
		return $ret;
	}
}

?>