<?php
/**
 * 每天一点新活动
 * */
class NewdayAction extends BaseAction{
	
	public function index()
	{
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		/**
		 * 搜索
		 * */
		$where=array();
		$cityid=$_GET['cityid'];
		$storeid=$_GET['storeid'];
		$act=$_GET['act'];
		$store=M("Store");
		if(!$act){
		if(!empty($cityid))
		{
			/**
			 * 查询门店
			 * */			
			$storelist=$store->where(array('chengshi'=>$cityid))->select();
			$this->assign("storelist",$storelist);
			$this->assign("cityid",$cityid);
		}else
		{
		   if($_COOKIE['chengshi_id'] != ""){
		    $cityid= $_COOKIE['chengshi_id'];
		    $storelist=$store->where(array('chengshi'=>$cityid))->select();
			$this->assign("storelist",$storelist);
			$this->assign("cityid",$cityid);
			}
		}
		}
		if(!empty($cityid))$where['chengshi']=$cityid;
		$i= array_pop($storelist);

		//使用正则表达式匹配
		$regwhere = '';
		if($storeid!="")
		{
			$regwhere = "`mendian` REGEXP '(^$storeid,|,$storeid,)' ";
			if($i['id'] == $storeid)
			{
				$where['mendian']=array('like','%'.$storeid.'%');
			}else {
				$storeid=$storeid.",";
				$where['mendian']=array('like','%'.$storeid.'%');
			}
		}
		//仅显示审核通过的和不需要审核的
		if(!empty($regwhere)){
			$regwhere .= ' and ';
		}
		$regwhere .= 'status IN (0,20) ';


		$activities=M("Activities");
		import("ORG.Util.Page");// 导入分页类
		$count      = $activities->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $activities->where($regwhere)->order('s_date DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('cityid',$cityid);
		$this->assign('storeid',$_GET['storeid']);
		$this->assign('act',$_GET['act']);
		/**
		 * 热门推荐
		 * */
		$hotlist=$activities->where(array('tuijian'=>1))->order('paixu')->limit(3)->select();
		$this->assign('hotlist',$hotlist);
		
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelistcc=$store->select();
		$this->assign("storelistcc",$storelistcc);
		
		$this->display();
	}
	
	public function detail()
	{
		
		/**
		 * 查询是否收藏
		 * */
		$id=$_GET['id'];
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'activities','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		
		$activities=M("Activities");
		$list=$activities->where(array('id'=>$id))->find();
		$this->assign($list);
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		$this->display();
	}
	
	/**
	 * 资讯列表
	 * */
	public function daynews()
	{
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$i= array_pop($storelist);
		$cityid=$_GET['cityid'];
		
		$act=$_GET['act'];
		if(!$act)
		{
		if(!empty($cityid))
		{
			/**
			 * 查询门店
			 * */
			$storelistcc=$store->where(array('chengshi'=>$cityid))->select();
			$this->assign("storelistcc",$storelistcc);
			$this->assign("cityid",$cityid);
		}else
		{
		if($_COOKIE['chengshi_id'] != ""){
		    $cityid= $_COOKIE['chengshi_id'];
		    $storelistcc=$store->where(array('chengshi'=>$cityid))->select();
			$this->assign("storelistcc",$storelistcc);
			$this->assign("cityid",$cityid);
			}
		}
		}
		$mendian=$_GET['storeid'];
		$where=array();
		if(!empty($cityid))$where['chengshi']=$cityid;
		//使用正则表达式匹配
		$regwhere = "";
		if($mendian!="")
			{
			$regwhere = "`mendian` REGEXP '(^$mendian,|,$mendian,)' ";
			if($i['id'] == $mendian)
			{
				$mendian=$mendian.",";
				$where['mendian']=array('like','%'.$mendian.'%');
			}else {
				$mendian=$mendian.",";
				$where['mendian']=array('like','%'.$mendian.'%');
			}
		}
		//仅显示审核通过的和不需要审核的
		if(!empty($regwhere)){
			$regwhere .= ' and ';
		}
		$regwhere .= 'status IN (0,20) ';
		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		$daynews=M("Daynews");
		import("ORG.Util.Page");// 导入分页类
		$count      = $daynews->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $daynews->where($regwhere)->order('date_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('cityid',$cityid);
		$this->assign('mendian',$_GET['storeid']);
		$this->assign('act',$_GET['act']);
		$hotlist=M("Activities")->where(array('tuijian'=>1))->order('paixu')->limit(3)->select();
		$this->assign('hotlist',$hotlist);
		
		$this->display();
		
	}
	/**
	 * 资讯内容
	 * */
	public function newsdetail()
	{
		/**
		 * 查询推荐信息
		 * */
		$daynews=M("Daynews");
		$daytuijian=$daynews->where(array('tuijian'=>1))->order('date_time')->limit(9)->select();
		$this->assign("daytuijian",$daytuijian);
		
		$id=$_GET['id'];
		/**
		 * 查询是否收藏
		 * */
		$id=$_GET['id'];
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'daynews','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		
		$list=$daynews->where(array('id'=>$id))->find();
		$this->assign($list);
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$this->display();
	}
}