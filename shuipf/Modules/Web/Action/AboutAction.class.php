<?php
/**
 * 关于我们
 * */
class AboutAction extends BaseAction
{
	public function index()
	{
		$Store=M("Store");
		$city=M("City");
		$where=array();
		$cityid=$_GET['cityid'];
		if(!empty($cityid))
		{
			$where['chengshi']=$cityid;
			$citylist=$city->where(array('id'=>$cityid))->find();
			$this->assign('cityname',$citylist['name']);
			$this->assign('cityid',$cityid);
		}
		
		
		else
		{
				if($_COOKIE['chengshi_id'] != ""){
		    $cityid=$_COOKIE['chengshi_id'];
		    $where['chengshi']= $cityid;
		    $citylist=$city->where(array('id'=>$cityid))->find();
			$this->assign('cityname',$citylist['name']);
			$this->assign('cityid',$cityid);
			}
			
		}
		
		import("ORG.Util.Page");// 导入分页类
		$count      = $Store->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Store->where($where)->order('date_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	
	/**
	 * 关于我们详情
	 * */
	public function detail()
	{
		$id=$_GET['id'];
		/**
		 * 查询是否收藏
		 * */
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'store','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		$Store=M("Store");
		$list=$Store->where(array('id'=>$id))->find();
		$this->assign($list);
		$storefloor=D("Storefloor");
		$storefloorlit = $storefloor->where(array('node_id'=>$id))->relation(true)->select();
		$this->assign("storefloorlit",$storefloorlit);
	
		/**
		 * 统计门店活动  礼品 资讯
		 * */
		//统计礼品
		$productscount=M("Products")->where(array('mendian'=>array('like',$list['id'].",".'%')))->count();
		//统计活动
		$activitiescount=M("Activities")->where(array('mendian'=>array('like',$list['id'].",".'%')))->count();
		//统计资讯
		$daynewscount=M("Daynews")->where(array('mendian'=>array('like',$list['id'].",".'%')))->count();
		$this->assign("productscount",$productscount);
		$this->assign("activitiescount",$activitiescount);
		$this->assign("daynewscount",$daynewscount);
		
		//查询城市下面的门店
		$citylist=M("City")->where(array('id'=>$list['chengshi']))->find();
		$this->assign("city",$citylist['name']);
		//查询属于该城市下的门店
		
		/**
		 * 查询门店
		 * */
		$storelistcc=M("Store")->where(array('chengshi'=>$list['chengshi']))->select();
		$this->assign("storelistcc",$storelistcc);
		
		
		$this->display();
	}
	
	/**
	 * 成为会员
	 * */
	public function bevip()
	{
		$this->display();
	}
	
	/**
	 * 积分计划
	 * */
	public function creditplan()
	{
		$this->display();
	}
	/**
	 * 会员权益
	 * */
	public function viprights()
	{
		$this->display();
	}
	
	
}