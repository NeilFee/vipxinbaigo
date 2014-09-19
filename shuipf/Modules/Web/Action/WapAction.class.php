<?php

/**
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class WapAction extends BaseAction {
   
    //首页
    public function index() {
    	if(IS_POST)
    	{
    		$vipcode=trim($_POST['vipcode']);
    		$v_password=trim($_POST['password']);
    		if(empty($vipcode))$this->error("请填写卡号");
    		if(empty($v_password))$this->error("请填写密码");
    		$parm = new StdClass();
    		$parm->astr_request = new StdClass();
    		$parm->astr_request->header = new StdClass();
    		$parm->astr_request->header->username = "website";
    		$parm->astr_request->header->password = "maps1fa";
    		$parm->astr_request->header->pagerecords = 20;//每页显示多少条信息
    		$parm->astr_request->header->pageno = 1;//当前第几页
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
    		$client = new SoapClient('http://221.133.247.163/VIP_NWBJ_EC/nwvip_ec.asmx?WSDL',array('trace'=> 1,'exceptions'=> 0));
    		$result=$client->GetNwVipMaster($parm);
    		$list=object_to_array($result);
    		if(empty($list['getnwvipmasterResult']['vipmasters']))$this->error("卡号错误");
    		
    		$str=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['password'];
    		/**判断会员卡号是否存在密码
    		 * */
    		if(!empty($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['password']))
    		{
    			$password=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['password'];
    		}
    		else {
    			/**
    			 * 如果密码是空值 那么密码为当前身份证后6位
    			 * */
    			$vipid=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipid'];
    			$password=substr(trim($vipid),-6,6);
    		}
    		if($password == $v_password)
    		{
    			//发送短信
    			$telephone=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['telephone'];
    			$stoser=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['issuestorecode'];
    			$str=strrand();
    			session("wapmessagekey",$str);
    		    send_message($telephone,$str. iconv('UTF-8', 'GBK', "（新世界会员手机网站登录验证码，泄漏有风险）"),$stoser);
    			$this->success("OK");
    		}else {
    			$this->error("密码错误");
    		}
    		
    	}
    	
       $this->display();
    }
    
    public function wapmember()
    {
    	if(IS_POST)
    	{
    		$message=$_POST['message'];
    		$vipcode=$_POST['vipcode'];
    		$wapmessagekey=session("wapmessagekey");
	    	if($message == $wapmessagekey)
	    	{
	    		$list=$this->member($vipcode);
	    		session("messagekey",null);
	    		session("userlist_name",$list);
	    		$this->success("登陆成功",__ROOT__."/Member/index");
	    	}else
	    		{
	    		 $this->error("验证码错误");
	    		}
    		
    	}
    	$user=session("userlist_name");
    	if(empty($user))$this->redirect('index');
    	$this->assign($user);
    	$this->display();
    }
    
    public function member($vipcode)
    {
    	$parm = new StdClass();
    	$parm->astr_request = new StdClass();
    	$parm->astr_request->header = new StdClass();
    	$parm->astr_request->header->username = "website";
    	$parm->astr_request->header->password = "maps1fa";
    	$parm->astr_request->header->pagerecords = 20;//每页显示多少条信息
    	$parm->astr_request->header->pageno = 1;//当前第几页
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
    	$client = new SoapClient('http://221.133.247.163/VIP_NWBJ_EC/nwvip_ec.asmx?WSDL',array('trace'=> 1,'exceptions'=> 0));
    	$result=$client->GetNwVipMaster($parm);
    	$list=object_to_array($result);
    	$list=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster'];
    	return $list;
    }
    
}
