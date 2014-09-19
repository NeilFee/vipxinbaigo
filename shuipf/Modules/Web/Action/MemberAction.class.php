<?php
class MemberAction extends BaseAction{
	//初始化
	protected function _initialize() {
		parent::_initialize();
		$user=session("user");
		if(empty($user))$this->error("无权访问，请登陆",__ROOT__."/");
	}
	/**
	 * 个人中心首页
	 * */
	public function index()
	{
		/**
		 * 查询礼品推荐信息
		 * */
		$activities=M("Activities");
		$where['tuijian']=1;
		$activitieslist=$activities->where($where)->order('date_time')->limit(2)->select();
		$this->assign("activitieslist",$activitieslist);
		/**
		 * 查询礼品信息
		 * */
		$product=M("Products");
		$where['tuijian']=1;
		$productlist=$product->where($where)->order('date_time')->limit(4)->select();
		$this->assign("productlist",$productlist);
		
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		$this->display();
	}
	
	/**
	 * 修改密码
	 * */
	
	public function password()
	{
		if(IS_POST)
		{
			$password=$_POST['password'];
			$newpassword=$_POST['newpassword'];
			$n_newpassword=$_POST['n_newpassword'];
			$vipcode=$_POST['vipcode'];
			if(empty($password))$this->error("请填写原密码");
			if(empty($newpassword))$this->error("请填写新密码");
			if(empty($n_newpassword))$this->error("请确定新密码");
			if(strlen($newpassword) <6)$this->error("请设置6位以上的密码");
			if($newpassword != $n_newpassword)$this->error("确认密码不一样");
			/**
			 * api接口
			 * */
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
			if($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['password'] == "")
			{
				$strpassword=substr(trim($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipid']),-6,6);
				if($strpassword != $password)$this->error("原始密码错误");
			}else
			{
				if($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['password'] != $password)
				$this->error("原始密码错误");
			}
			$parm2 = new StdClass();
			$parm2->astr_request = new StdClass();
			$parm2->astr_request->header = new StdClass();
			$parm2->astr_request->header->licensekey = "";
			$parm2->astr_request->header->username = "website";
			$parm2->astr_request->header->password = "maps1fa";
			$parm2->astr_request->header->lang = '';//每页显示多少条信息
			$parm2->astr_request->header->pagerecords = 100;//当前第几页
			$parm2->astr_request->header->pageno = 1;
			$parm2->astr_request->header->updatecount =1;
			$parm2->astr_request->header->messageid ='';
			$parm2->astr_request->header->version ='';
			$parm2->astr_request->master->vipcode =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipcode'];
			$parm2->astr_request->master->surname =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['surname'];
			$parm2->astr_request->master->currentbonus =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['currentbonus'];
			$parm2->astr_request->master->telephone =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['telephone'];
			$parm2->astr_request->master->vipemail =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipemail'];
			$parm2->astr_request->master->address1 =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['address1'];
			$parm2->astr_request->master->address2 ='';
			$parm2->astr_request->master->address3 ='';
			$parm2->astr_request->master->address4 ='';
			$parm2->astr_request->master->issuestore =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['issuestore'];
			$parm2->astr_request->master->vipid =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipid'];
			$parm2->astr_request->master->birthdayyyyy =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['birthdayyyyy'];
			$parm2->astr_request->master->password =$newpassword;
			$parm2->astr_request->master->birthdaymm =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['birthdaymm'];
			$parm2->astr_request->master->birthdaydd =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['birthdaydd'];
			$parm2->astr_request->master->incomecode =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['incomecode'];
			$parm2->astr_request->master->industrycode =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['industrycode'];
			$parm2->astr_request->master->emailcontact =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['emailcontact'];
			$parm2->astr_request->master->lastmodify_yyyymmdd =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['lastmodify_yyyymmdd'];
			$parm2->astr_request->master->lastmodify_hhmmss =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['lastmodify_hhmmss'];
			$parm2->astr_request->master->educationcode =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['educationcode'];
			$parm2->astr_request->master->givenname =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['givenname'];
			$parm2->astr_request->master->telephone2 ='';
			$parm2->astr_request->master->maritalstatus =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['maritalstatus'];
			$parm2->astr_request->master->sex =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['sex'];
			$parm2->astr_request->master->postal =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['postal'];
			$parm2->astr_request->master->ismainvip =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['ismainvip'];
			$parm2->astr_request->master->vipcardtype =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipcardtype'];
			$parm2->astr_request->master->modifybystaffcode =$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['modifybystaffcode'];
			$result=$client->postnwvipmasterupdate($parm2);
			$this->success("更新成功");
		}
		$this->display();
	}
	/**
	 * 个人资料
	 * */
	public function  center()
	{
		if(IS_POST)
		{
		$shengri=$_POST['shengri'];
		$str=explode("-",$shengri);
		$client = new SoapClient('http://221.133.247.163/VIP_NWBJ_EC/nwvip_ec.asmx?WSDL',array('trace'=> 1,'exceptions'=> 0));
		
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
		
		$parm->astr_request->master->vipcode =$_POST['vipcode'];
		$parm->astr_request->master->surname =$_POST['surname'];
		$parm->astr_request->master->currentbonus =$_POST['currentbonus'];
		$parm->astr_request->master->telephone =$_POST['telephone'];
		$parm->astr_request->master->vipemail =$_POST['vipemail'];
		$parm->astr_request->master->address1 =$_POST['address1'];
		$parm->astr_request->master->address2 ='';
		$parm->astr_request->master->address3 ='';
		$parm->astr_request->master->address4 ='';
		$parm->astr_request->master->issuestore =$_POST['issuestore'];
		$parm->astr_request->master->vipid =$_POST['vipid'];
		$parm->astr_request->master->birthdayyyyy =$str[0];
		$parm->astr_request->master->birthdaymm =$str[1];
		$parm->astr_request->master->birthdaydd =$str[2];
		$parm->astr_request->master->incomecode =$_POST['incomecode'];
		$parm->astr_request->master->industrycode =$_POST['industrycode'];
		$parm->astr_request->master->emailcontact =$_POST['emailcontact'];
		$parm->astr_request->master->lastmodify_yyyymmdd =$_POST['lastmodify_yyyymmdd'];
		$parm->astr_request->master->lastmodify_hhmmss =$_POST['lastmodify_hhmmss'];
		$parm->astr_request->master->educationcode =$_POST['educationcode'];
		$parm->astr_request->master->givenname =$_POST['givenname'];
		$parm->astr_request->master->telephone2 ='';
		$parm->astr_request->master->maritalstatus =$_POST['maritalstatus'];
		$parm->astr_request->master->sex =$_POST['sex'];
		$parm->astr_request->master->postal =$_POST['postal'];
		
		$parm->astr_request->master->ismainvip =$_POST['ismainvip'];
		$parm->astr_request->master->vipcardtype =$_POST['vipcardtype'];
		$parm->astr_request->master->modifybystaffcode =$_POST['modifybystaffcode'];
		$result=$client->postnwvipmasterupdate($parm);
		$this->success("更新成功",__URL__."/center");
		}
		$user=session("user");
		$vipcode=$user['vipcode'];
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
		$upkey=$_GET['upkey'];
		$this->assign("upkey",$upkey);
		$this->display();
	}
	
	
	/**
	 * 个人收藏   管理
	 * */
	public function collection()
	{
		import("ORG.Util.Page");// 导入分页类
		$where=$_GET['ntype'];
		$user=session("user");
		$vipcode=$user['vipcode'];
		if(empty($where))$where="collection";
		//礼品收藏
		if($where == "collection")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_products as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		//活动收藏
		if($where == "activities")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_activities as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		//商户收藏
		if($where == "businesses")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_businesses as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		//门店收藏
		if($where == "store")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_store as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		
		//资讯收藏
		if($where == "daynews")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_daynews as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		
		//品牌
		
		if($where == "cooperation")
		{
			$count=M()->query("SELECT count(*) from vip_collection as a LEFT JOIN  vip_cooperation as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'");
		}
		
		
		$count      = $count[0]['count(*)'];// 查询满足要求的总记录数
		$Page       = new Page($count,5);
		//礼品收藏
		if($where == "collection")
		{
		$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_products as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		//活动收藏
		if($where == "activities")
		{
		$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_activities as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		//商户收藏
		if($where == "businesses")
		{
			$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_businesses as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		//门店收藏
		if($where == "store")
		{
			$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_store as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		
		//资讯收藏
		if($where == "daynews")
		{
			$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_daynews as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		
		//品牌
		if($where == "cooperation")
		{
			$list=M()->query("SELECT a.id as cid,b.* from vip_collection as a LEFT JOIN  vip_cooperation as b on a.collection_id=b.id WHERE a.vipcode='".$vipcode."' AND a.key_name="."'".$where."'"." ORDER BY a.collection_date LIMIT ".$Page->firstRow.','.$Page->listRows);
		}
		// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);
		$this->assign('where',$where);
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		$this->display();
	}
	
	public function collectiondel()
	{
		$id=$_GET['id'];
		$collection=M("Collection");
		$collection->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	
}
