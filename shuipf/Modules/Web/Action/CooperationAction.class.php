<?php
/**
 * 合作伙伴
 * */
class CooperationAction extends BaseAction {
	
	public function index() {
		/**
		 * 数据分页查询
		 * */
		$Cooperation=M("Cooperation");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Cooperation->count();// 查询满足要求的总记录数
		$Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Cooperation->order('date_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->display ();
	}
	
	
	public function merchant() {
		$Businesses=M("Businesses");	
		$cityid=$_GET['cityid'];
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		
		/*
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		
		$act=$_GET["act"];
		if(!$act){
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
		
		
	    /**
	     * 推荐商户
	     * */
		$tuijianlist=$Businesses->where(array('tuijian_key'=>1))->order('date_time')->limit(5)->select();
		$this->assign('tuijianlist',$tuijianlist);
		/**
		 * 查询商户分类
		 * */
		$businessesnode=M("Businessesnode");
		$businessesnodelist =$businessesnode->select();
		$this->assign('businessesnodelist',$businessesnodelist);
		/**
		 * 数据分页查询
		 * */
		$where=array();
		if(!empty($_GET['mid']))$where['node_id']=$_GET['mid'];
		if(!empty($_GET['storeid']))$where['mendian']=$_GET['storeid'];
		
	

		import("ORG.Util.Page");// 导入分页类
		$count      = $Businesses->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Businesses->where($where)->order('date_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('mid',$_GET['mid']);
		
		$this->assign('mendian',$_GET['storeid']);
		$this->assign('act',$_GET['act']);
		
		$this->display ();
	}
	
	/**
	 * 详情
	 * */
	public function mdetail()
	{
		$id=$_GET['id'];
		/**
		 * 查询是否收藏
		 * */
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'businesses','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		$Businesses=M("Businesses");
		$list =$Businesses->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
	/**
	 * 合作品牌详情
	 * */
	public function detail()
	{
		$id=$_GET['id'];
		/**
		 * 查询是否收藏
		 * */
		$id=$_GET['id'];
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'cooperation','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		$Cooperation=M("Cooperation");
		$list =$Cooperation->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
	
}