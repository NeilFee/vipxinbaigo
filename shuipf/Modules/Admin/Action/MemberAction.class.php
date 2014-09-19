<?php
/**
 * 用户管理
 * */
class MemberAction extends AdminbaseAction
{
	/**
	 * 查询用户数据
	 * */
	public function memberlist()
	{
		/**
		 * 搜索
		 * */
		$page=$_GET['page'];
		if(empty($page))$page=1;
		$parm = new StdClass();
		$parm->astr_request = new StdClass();
		$parm->astr_request->header = new StdClass();
		$parm->astr_request->header->username = "website";
		$parm->astr_request->header->password = "maps1fa";
		$parm->astr_request->header->pagerecords = 20;//每页显示多少条信息
		
		$parm->astr_request->header->pageno = $page;//当前第几页
		$parm->astr_request->header->updatecount = 1;
		
		/**
		 * 搜索模块 
		 * */
		$parm->astr_request->search->vipcode = trim($_GET['vipcode']);
		$parm->astr_request->search->vipid = trim($_GET['vipid']);
		$parm->astr_request->search->name =trim($_GET['surname']);
		$parm->astr_request->search->telephone =trim($_GET['telephone']);
		$parm->astr_request->search->issuestore =trim($_GET['issuestore']);
		
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
		$memberlist=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster'];
		
			
		import("ORG.Util.Page");// 导入分页类
		$count      = $list['getnwvipmasterResult']['header']['maxrecords'];// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign("list",$memberlist);
		
		/**
		 *  查询门店信息
		 * 
		
		$storeparm = new StdClass();
		$storeparm->astr_request = new StdClass();
		$storeparm->astr_request->header = new StdClass();
		$storeparm->astr_request->header->username = "webservice";
		$storeparm->astr_request->header->password = "Mapsal11ca";
		$storeparm->astr_request->header->pagerecords = 100;//每页显示多少条信息
		$storeparm->astr_request->header->pageno = 1;//当前第几页
		$storeparm->astr_request->header->updatecount = 1;
		$storeparm->astr_request->search->fromage =0;
		$storeparm->astr_request->search->toage =0;
		
		$storeresult=$client->GetNwVipStoreMaster($storeparm);
		$storelist=object_to_array($storeresult);
		$this->assign("storelist",$storelist['getnwvipstoremasterResult']['vipstoremasters']['nwvipstoremaster']);*/
		
		/**
		 * 输出搜索条件
		 * */
		$this->assign("surname",$_GET['surname']);
		$this->assign("telephone",$_GET['telephone']);
		$this->assign("issuestore",$_GET['issuestore']);
		
		$this->assign("vipcode",$_GET['vipcode']);
		$this->assign("vipid",$_GET['vipid']);
		
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	
	public function up_memberlist()
	{
		$vipcode=$_GET['vipcode'];
		$parm = new StdClass();
		$parm->astr_request = new StdClass();
		$parm->astr_request->header = new StdClass();
		$parm->astr_request->header->username = "website";
		$parm->astr_request->header->password = "maps1fa";
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
		$client = new SoapClient('http://221.133.247.163/VIP_NWBJ_EC/nwvip_ec.asmx?WSDL',array('trace'=> 1,'exceptions'=> 0));
		$result=$client->GetNwVipMaster($parm);
		$list=object_to_array($result);
		$this->assign($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']);
		
		
		/**
		 *  查询门店信息
		 * */
		
		$storeparm = new StdClass();
		$storeparm->astr_request = new StdClass();
		$storeparm->astr_request->header = new StdClass();
		$storeparm->astr_request->header->username = "webservice";
		$storeparm->astr_request->header->password = "Mapsal11ca";
		$storeparm->astr_request->header->pagerecords = 100;//每页显示多少条信息
		$storeparm->astr_request->header->pageno = 1;//当前第几页
		$storeparm->astr_request->header->updatecount = 1;
		$storeparm->astr_request->search->fromage =0;
		$storeparm->astr_request->search->toage =0;
		$storeresult=$client->GetNwVipStoreMaster($storeparm);
		$storelist=object_to_array($storeresult);
		$this->assign("storelist",$storelist['getnwvipstoremasterResult']['vipstoremasters']['nwvipstoremaster']);
		$this->display();
	}
	
	/**
	 * 更新门店信息
	 * */
	public function upmember()
	{
		$surname=$_POST['surname'];
		$vipcode=$_POST['vipcode'];
		$currentbonus=$_POST['currentbonus'];
		$telephone=$_POST['telephone'];
		$vipemail=$_POST['vipemail'];
		$address1=$_POST['address1'];
		$issuestore=$_POST['issuestore'];
		$vipid=$_POST['vipid'];
		$client = new SoapClient('http://221.133.247.163/VIP_NWBJ_EC/nwvip_ec.asmx?WSDL',array('trace'=> 1,'exceptions'=> 0));
		/*
		 * 判断是否重置密码
		 * */
		$Fruit=$_POST['Fruit'];
		if($Fruit ==1)
		{
			$password='';
		}else
		{
			$password=$_POST['password'];
		}
		$parm = new StdClass();
		$parm->astr_request = new StdClass();
		$parm->astr_request->header = new StdClass();
		$parm->astr_request->header->licensekey = "";
		$parm->astr_request->header->username = "website";
		$parm->astr_request->header->password = "maps1fa";
		$parm->astr_request->header->lang = '';//每页显示多少条信息
		$parm->astr_request->header->pagerecords = 100;//当前第几页
		$parm->astr_request->header->pageno = 1;
		$parm->astr_request->header->updatecount =1;
		$parm->astr_request->header->messageid ='';
		$parm->astr_request->header->version ='';
		$parm->astr_request->master->vipcode =$vipcode;
		$parm->astr_request->master->surname =$surname;
		$parm->astr_request->master->currentbonus =$currentbonus;
		$parm->astr_request->master->telephone =$telephone;
		$parm->astr_request->master->vipemail =$vipemail;
		$parm->astr_request->master->address1 =$address1;
		$parm->astr_request->master->address2 ='';
		$parm->astr_request->master->address3 ='';
		$parm->astr_request->master->address4 ='';
		$parm->astr_request->master->issuestore =$issuestore;
		$parm->astr_request->master->vipid =$vipid;
		$parm->astr_request->master->birthdayyyyy =$_POST['birthdayyyyy'];
		$parm->astr_request->master->birthdaymm =$_POST['birthdaymm'];
		$parm->astr_request->master->birthdaydd =$_POST['birthdaydd'];
		$parm->astr_request->master->incomecode =$_POST['incomecode'];
		$parm->astr_request->master->industrycode =$_POST['industrycode'];
		$parm->astr_request->master->emailcontact =$_POST['emailcontact'];
		$parm->astr_request->master->lastmodify_yyyymmdd =$_POST['lastmodify_yyyymmdd'];
		$parm->astr_request->master->lastmodify_hhmmss =$_POST['lastmodify_hhmmss'];
		$parm->astr_request->master->educationcode =$_POST['educationcode'];
		$parm->astr_request->master->givenname =$_POST['givenname'];
		$parm->astr_request->master->telephone2 =$_POST['telephone2'];
		$parm->astr_request->master->sex =$_POST['sex'];
		$parm->astr_request->master->postal =$_POST['postal'];
		$parm->astr_request->master->password =$password;
		$parm->astr_request->master->ismainvip =$_POST['ismainvip'];
		$parm->astr_request->master->vipcardtype =$_POST['vipcardtype'];
		$parm->astr_request->master->modifybystaffcode =$_POST['modifybystaffcode'];
		$result=$client->postnwvipmasterupdate($parm);
		$this->success("更新成功");
	}
	
	
}