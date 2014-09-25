<?php

/**
 * 后台CRM接口相关函数
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */

/**
 * CRM API 查用户信息函数封装
 * @param type $vipcode vip卡号
 * @return list
 */
function getnwvipmaster($vipcode) {
    $parm = new StdClass();
	$parm->astr_request = new StdClass();
	$parm->astr_request->header = new StdClass();
	$parm->astr_request->header->username = C('NWVIP_USERNAME');
	$parm->astr_request->header->password = C('NWVIP_PASSWORD');
	$parm->astr_request->header->pagerecords = 20;//每页显示多少条信息
	$parm->astr_request->header->pageno = 0;//当前第几页
	$parm->astr_request->header->updatecount = 1;
	$parm->astr_request->search->vipcode = $vipcode;
	$parm->astr_request->search->fromage =0;
	$parm->astr_request->search->toage =0;
	$parm->astr_request->search->frombirthdaymm=0;
	$parm->astr_request->search->tobirthdaymm=0;
	$parm->astr_request->search->frombirthdaydd=0;
	$parm->astr_request->search->tobirthdaydd=0;
	$parm->astr_request->search->fromcurrentbonus=0;
	$parm->astr_request->search->tocurrentbonus=0;
	$parm->astr_request->search->fromaccumulatedsalesamt=0;
	$parm->astr_request->search->toaccumulatedsalesamt=0;
	$parm->astr_request->search->fromaccumulatedbonus=0;
	$parm->astr_request->search->toaccumulatedbonus=0;
	$parm->astr_request->search->activitycount=0;
	$parm->astr_request->search->salesamount=0;
	$client = new SoapClient(C('NWVIP_SERVICE_URL'),array('trace'=> 1,'exceptions'=> 0));
	$result=$client->GetNwVipMaster($parm);
	return object_to_array($result);
}

/**
 * CRM API 加减积分函数封装
 * @param type $vipcode vip卡号
 * @return list
 */
function postnwvipbonusadjust2($vipcode,$vipaccountno,$bonus) {
    $parm = new StdClass();
	$parm->astr_request = new StdClass();
	$parm->astr_request->header = new StdClass();
	$parm->astr_request->header->username = C('NWVIP_USERNAME');
	$parm->astr_request->header->password = C('NWVIP_PASSWORD');
	$parm->astr_request->header->pagerecords = 20;//每页显示多少条信息
	$parm->astr_request->header->pageno = 0;//当前第几页
	$parm->astr_request->header->updatecount = 1;
	$parm->astr_request->bonusadjust->vipcode = $vipcode;
	$parm->astr_request->bonusadjust->vipaccountno = $vipaccountno;
	$parm->astr_request->bonusadjust->txdate_yyyymmdd = date('Ymd',time());;
	$parm->astr_request->bonusadjust->bonus= $bonus;
	$parm->astr_request->bonusadjust->amount= '0';
	$parm->astr_request->bonusadjust->action = 'A';
	$parm->astr_request->bonusadjust->remark = '';
	$parm->astr_request->bonusadjust->issueby = 'NwVipWeb';
	$parm->astr_request->bonusadjust->reasoncode= '';
	$parm->astr_request->bonusadjust->bonusadjustdocno= '';
	$client = new SoapClient(C('NWVIP_SERVICE_URL'),array('trace'=> 1,'exceptions'=> 0));
	$result=$client->postnwvipbonusadjust2($parm);
	return object_to_array($result);
}

?>
