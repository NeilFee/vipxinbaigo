<?php

/**
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class IndexAction extends BaseAction {
    private $url;
    //初始化
    protected function _initialize() {
        parent::_initialize();
        import('Url');
        $this->url = get_instance_of('Url');
        
       
        /**
         * 查询城市
         * */
        
    }
    //首页
    public function index() {
    	
    	//$chengshiid= $_COOKIE['chengshi_id'];
    	$where=array();
    	//if(!empty($chengshiid))$where['chengshi']=$chengshiid;
    	//if(empty($chengshiid))
    	//{
    	//	import('ORG.Util.IpLocation');// 导入IpLocation类
    	//	$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
    	//	$area = $Ip->getlocation(); // 获取某个IP地址所在的位置
    	//	$country=$area['country'];//获取到的城市
    	//	$where['name']=array('like',$country.'%');
    		//$citylist=M("City")->where($where)->find();
    		//$where['chengshi']=$citylist['id'];
    	//}
    	$where['tuijian']=1;
    	/**
    	 * 查询推荐的活动信息
    	 * */
    	$activitieslist1=M("Activities")->where($where)->order('paixu')->limit('0,4')->select();
    	$this->assign("activitieslist1",$activitieslist1);
    	$activitieslist2=M("Activities")->where($where)->order('paixu')->limit('4,4')->select();
    	$this->assign("activitieslist2",$activitieslist2);
    	$activitieslist3=M("Activities")->where($where)->order('paixu')->limit('8,4')->select();
    	$this->assign("activitieslist3",$activitieslist3);
    	/**
    	 * 查询礼品推荐信息
    	 * */
    	$productslist1=M("Products")->where($where)->order('paixu')->limit('0,6')->select();
    	
    	$this->assign("productslist1",$productslist1);
    	
    	$productslist2=M("Products")->where($where)->order('paixu')->limit('6,6')->select();
    	$this->assign("productslist2",$productslist2);
    	$productslist3=M("Products")->where($where)->order('paixu')->limit('12,6')->select();
    	$this->assign("productslist3",$productslist3);
    	/**
    	 * 查询商户
    	 * */
    	$ctyiwhere=array();
    	$ctyiwhere['tuijian_key']=1;
    	$businesseslist1=M("Businesses")->where($ctyiwhere)->order('paixu')->limit('0,6')->select();
    	$this->assign("bu1",$businesseslist1);
    	$businesseslist2=M("Businesses")->where($ctyiwhere)->order('paixu')->limit('6,6')->select();
    	$this->assign("bu2",$businesseslist2);
    	$businesseslist3=M("Businesses")->where($ctyiwhere)->order('paixu')->limit('12,6')->select();
    	$this->assign("bu3",$businesseslist3);
    	/**
    	 * 首页轮播广告查询
    	 * */
    	$adindex_01=M("Advertisement")->where(array('ad_id'=>5))->select();
    	$this->assign("adindex_01",$adindex_01);
    	$adindex_02=M("Advertisement")->where(array('ad_id'=>6))->select();
    	$this->assign("adindex_02",$adindex_02);
		
		
    	
		
		
		
    	/**
    	 * 查询礼品信息
    	 * */
       $product=M("Products");
       $productlist=$product->order('date_time DESC')->limit(6)->select();
       $this->assign("productlist",$productlist);
       
       /**
        * 查询门店
        * */
       $store=M("Store");
       $storelist=$store->select();
       $this->assign("storelist",$storelist);
       
       /**
        * 查询门店
        * */
       $Productlabel=M("Productlabel");
       $Productlabellist=$Productlabel->select();
       $this->assign("Productlabellist",$Productlabellist);
       
       
       $this->display();
    }
    
    public function login()
    {
    	if(IS_POST)
    	{
    				$vipcode=trim($_POST['vipcode']);
    				$password=trim($_POST['password']);
    				if(empty($vipcode))$this->error("请填写卡号");
    				if(empty($password))$this->error("请填写密码");
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
    					if($str == $password)
    					{
    					    /**
    					     * 构造数组判断是否需要写下一步验证手机
    					     * */
    						$list=$this->member($vipcode);
    						session("user",$list);
    						$this->success("1");
    					}else {
    						$this->error("密码错误");
    					}
    				}
    				else {
    					/**
    					 * 如果密码是空值 那么密码为当前身份证后6位
    					 * */
    					$vipid=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['vipid'];
    					$vippassword=substr(trim($vipid),-6,6);
    					if($password == $vippassword)
    					{
    						/**
    						 * 构造数组发送短信
    						 * */
    						$phone=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['telephone'];
    						$issuestorecode=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['issuestorecode'];
    						$stoser=$list['getnwvipmasterResult']['vipmasters']['nwvipmaster']['issuestorecode'];
    						
    						$strjson=array('info'=>2,'stoser'=>$stoser,'vipcode'=>$vipcode,'telephone'=>$phone,'issuestorecode'=>$issuestorecode);
    						$this->success($strjson);
    					}else {
    						$this->error("密码错误");
    					}
    				}
    	}
    	 $this->display();
    }
    /**message
     * 短信验证页面
    * */
    public function message()
    {
    	if(IS_POST)
    	{
    		$message=$_POST['message'];
    		$vipcode=$_POST['vipcode'];
    		$messagekey= session("messagekey");
    		if($message == $messagekey)
    		{
    			$list=$this->member($vipcode);
    			session("user",$list);
    			session("messagekey",null);
    			$this->success("登陆成功",__ROOT__."/Member/index");
    		}else
    		{
    			$this->error("验证码错误");
    		}
    	}
    	$stoser=$_GET['stoser'];
    	$telephone=$_GET['telephone'];
    	$str=strrand();
    	session("messagekey",$str);
    	send_message($telephone,$str. iconv('UTF-8', 'GBK', "（新世界会员网站手机验证码，泄漏有风险）"),$stoser);
    	$issuestorecode=$_GET['issuestorecode'];
    	$vipcode=$_GET['vipcode'];
    	$this->assign("vipcode",$vipcode);
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
    public function logout()
    {
    	session("user",null);
    	session("messagekey",null);
    	$this->redirect("index");
    }
    public function shouchang()
    {
    	$user=session("user");
    	if(empty($user))$this->error("请您登陆以后再收藏");
    	$keyname=$_POST['keyname'];
    	$id=$_POST["id"];
    	/**
    	 * 查询是否已经收藏
    	 * */
    	$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>$keyname,'vipcode'=>$user['vipcode']))->find();
    	if(empty($clist))
    	{
    		$data['collection_id']=$id;
    		$data['vipcode']=$user['vipcode'];
    		$data['collection_date']=date("Y-m-d H:i:s");
    		$data['key_name']=$keyname;
    		M("Collection")->add($data);
    		$this->success("收藏成功");
    	}else
    	{
    		$this->error("您已经收藏了");
    	}
    }
    public function chengshi()
    {
    	/**
    	 * 查询城市
    	 * */
    	$city=M("City");
    	$citylist=$city->select();
    	$this->assign("citylist",$citylist);
    	$this->display();
    }
    
    public function forgetpsw()
    {
    	//发送验证码
    	$messagekey=$_POST['messagekey'];//判断是否是发送短信
    	$vipcode=$_POST['vipcode'];//获取vip会员卡号
    	if(IS_POST)
    	{
    		if(empty($vipcode))$this->error("请填写vip卡号");
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
    		if(empty($list))$this->error("卡号错误");
    		$telephone=$list['telephone'];
    		$stoser=$list['issuestorecode'];
    		$str=strrand();
    		session("messageretu",$str);
    		send_message($telephone,$str. iconv('UTF-8', 'GBK', "（新世界会员网站找回密码验证码，泄漏有风险）"),$stoser);
    		$p = substr($telephone,0,3)."*****".substr($telephone,8,3);
    		$this->success('已发送:'.$p);
    	}
    	$this->display();
    }
    
    public function doforgetpsw()
    {
    	if(IS_POST)
    	{
    		$messagecode=$_POST['messagecode'];
    		$messageretu=session("messageretu");//获取验证码
    		$vipcode=$_POST['vipcode'];//获取vip会员卡号
    		if(empty($messagecode))$this->error("请填写验证码");
    		if($messagecode != $messageretu)
    		{
    			$this->error("验证码错误");
    		}else
    		{
    			session("messageretu",null);
    			session("vipcode",$vipcode);
    			$this->success("验证成功");
    		}
    	}
    	$this->error("错误访问",__ROOT__."/");
    }
    
    public function newpassword()
    {
    	$vipcode= session("vipcode");
    	$newpassword=$_POST['newpassword'];
    	if(IS_POST)
    	{
    		$newpassword=$_POST['newpassword'];
    		if(empty($newpassword))$this->error("请填写新密码");
    		if(strlen($newpassword) <6)$this->error("请设置6位以上的密码");
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
    		if(empty($list['getnwvipmasterResult']['vipmasters']['nwvipmaster']))$this->error("vip卡号错误");
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
    	if(empty($vipcode))$this->error("错误访问",__ROOT__."/");
    	$this->display();
    }
    
   
}
