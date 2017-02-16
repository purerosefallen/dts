--
-- 表的结构 `bra_players`
-- 储存角色数据的激活信息，包括PC和NPC。
--

DROP TABLE IF EXISTS bra_players;
CREATE TABLE bra_players (
  pid smallint unsigned NOT NULL auto_increment,
  type tinyint NOT NULL default '0',
  name char(15) NOT NULL default '',
  pass char(32) NOT NULL default '',
  gd char(1) NOT NULL default 'm',
  sNo smallint unsigned NOT NULL default '0',
  icon tinyint unsigned NOT NULL default '0',
  club tinyint unsigned NOT NULL default '0',
  endtime int(10) unsigned NOT NULL default '0',
  cdsec int(10) unsigned NOT NULL default '0',
  cdmsec smallint(3) unsigned NOT NULL default '0',
  cdtime mediumint unsigned NOT NULL default '0',
  action char(12) NOT NULL default '',
  hp mediumint unsigned NOT NULL default '0',
  mhp mediumint unsigned NOT NULL default '0',
  sp smallint unsigned NOT NULL default '0',
  msp smallint unsigned NOT NULL default '0',
  ss smallint unsigned NOT NULL default '0',
  mss smallint unsigned NOT NULL default '0',
  att smallint unsigned NOT NULL default '0',
  def smallint unsigned NOT NULL default '0',
  pls tinyint unsigned NOT NULL default '0',
  lvl tinyint unsigned NOT NULL default '0',
  `exp` smallint unsigned NOT NULL default '0',
  money mediumint unsigned NOT NULL default '0',
  rp mediumint unsigned NOT NULL default '0',
  bid smallint unsigned NOT NULL default '0',
  `inf` char(10) not null default '',
  rage tinyint unsigned NOT NULL default '0',
  pose tinyint(1) unsigned NOT NULL default '0',
  tactic tinyint(1) unsigned NOT NULL default '0',
  killnum smallint unsigned NOT NULL default '0',
  state tinyint unsigned NOT NULL default '0',
  `wp` int unsigned not null default '0',
  `wk` int unsigned not null default '0',
  `wg` int unsigned not null default '0',
  `wc` int unsigned not null default '0',
  `wd` int unsigned not null default '0',
  `wf` int unsigned not null default '0',
  `teamID` char(15) not null default '',
  `teamPass` char(15) not null default '',
  wep varchar(30) NOT NULL default '',
  wepk char(5) not null default '',
  wepe mediumint unsigned NOT NULL default '0',
  weps char(5) not null default '0',
  wepsk varchar(40) not null default '',
  arb varchar(30) NOT NULL default '',
  arbk char(5) not null default '',
  arbe mediumint unsigned NOT NULL default '0',
  arbs char(5) not null default '0',
  arbsk varchar(40) not null default '',
  arh varchar(30) NOT NULL default '',
  arhk char(5) not null default '',
  arhe mediumint unsigned NOT NULL default '0',
  arhs char(5) not null default '0',
  arhsk varchar(40) not null default '',
  ara varchar(30) NOT NULL default '',
  arak char(5) not null default '',
  arae mediumint unsigned NOT NULL default '0',
  aras char(5) not null default '0',
  arask varchar(40) not null default '',
  arf varchar(30) NOT NULL default '',
  arfk char(5) not null default '',
  arfe mediumint unsigned NOT NULL default '0',
  arfs char(5) not null default '0',
  arfsk varchar(40) not null default '',
  art varchar(30) NOT NULL default '',
  artk varchar(40) not null default '',
  arte mediumint unsigned NOT NULL default '0',
  arts char(5) not null default '0',
  artsk varchar(40) not null default '',
  itm0 varchar(30) NOT NULL default '',
  itmk0 char(5) not null default '',
  itme0 mediumint unsigned NOT NULL default '0',
  itms0 char(5) not null default '0',
  itmsk0 varchar(40) not null default '',
  itm1 varchar(30) NOT NULL default '',
  itmk1 char(5) not null default '',
  itme1 mediumint unsigned NOT NULL default '0',
  itms1 char(5) not null default '0',
  itmsk1 varchar(40) not null default '',
  itm2 varchar(30) NOT NULL default '',
  itmk2 char(5) not null default '',
  itme2 mediumint unsigned NOT NULL default '0',
  itms2 char(5) not null default '0',
  itmsk2 varchar(40) not null default '',
  itm3 varchar(30) NOT NULL default '',
  itmk3 char(5) not null default '',
  itme3 mediumint unsigned NOT NULL default '0',
  itms3 char(5) not null default '0',
  itmsk3 varchar(40) not null default '',
  itm4 varchar(30) NOT NULL default '',
  itmk4 char(5) not null default '',
  itme4 mediumint unsigned NOT NULL default '0',
  itms4 char(5) not null default '0',
  itmsk4 varchar(40) not null default '',
  itm5 varchar(30) NOT NULL default '',
  itmk5 char(5) not null default '',
  itme5 mediumint unsigned NOT NULL default '0',
  itms5 char(5) not null default '0',
  itmsk5 varchar(40) not null default '',
  itm6 varchar(30) NOT NULL default '',
  itmk6 char(5) not null default '',
  itme6 mediumint unsigned NOT NULL default '0',
  itms6 char(5) not null default '0',
  itmsk6 varchar(40) not null default '',
  nskill text not null default '',
  nskillpara text NOT NULL default '',
  skillpoint smallint NOT NULL default '0',
  flare tinyint(1) NOT NULL default '0',
  card int(10) NOT NULL DEFAULT '0',
  `searchinfo` varchar(1000) NOT NULL default '',
  `cardname` varchar(50) NOT NULL default '',
  `player_dead_flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `corpse_clear_flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY  (pid),
  INDEX TYPE (type, sNo),
  INDEX NAME (name, type)
	
) ENGINE=MyISAM;