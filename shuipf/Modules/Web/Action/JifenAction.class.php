<?php
class JifenAction extends BaseAction{
	/**
	 * 积分首页
	 * */
	
	public function index()
	{
		$where =array();
		$cityid=$_GET['cityid'];
		$mendian=$_GET['storeid'];
		$productsid=$_GET['productsid'];
		$act=$_GET["act"];
		$type=$_GET['typeid'];
		
		if(!empty($productsid))$where['productsprece']=$productsid;
		if(!empty($type))$where['typename']=$type;
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$i= array_pop($storelist);
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
		if(!empty($cityid))$where['chengshi']=$cityid;
		//使用正则表达式匹配
		$regwhere = "";
		if($mendian!="")
		{
			$regwhere = "`mendian` REGEXP '(^$mendian,|,$mendian,)' ";
			$mendian=$mendian.",";
			if($i['id'] == $mendian)
			{
				$where['mendian']=array('like','%'.$mendian.'%');
			}else {
				$where['mendian']=array('like','%'.$mendian.'%');
			}
		}
		/**
		 * 推荐信息
		 * */
		$Products=M("Products");
		$Productslist=$Products->where(array('tuijian'=>1))->order('date_time ')->limit(5)->select();
		$this->assign("productslist",$Productslist);
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		/**
		 * 查询分类
		 * */
		$Productsprece=M("Productsprece");
		$Productsprecelist=$Productsprece->select();
		$this->assign("productsprecelist",$Productsprecelist);
		/**
		 * 查询门店
		 * */
		$Productstype=M("Productstype");
		$Productstypelist=$Productstype->select();
		$this->assign("productstypelist",$Productstypelist);
		/**
		 * 数据分页查询
		 * */
		import("ORG.Util.Page");// 导入分页类
		$count      = $Products->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Products->where($regwhere)->order('date_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		
		$this->assign('mendian',$_GET['storeid']);
		$this->assign('act',$_GET['act']);
		$this->display();
	}
	
	/**
	 * 积分商品详情
	 * */
	public function detail()
	{
		/**
		 * 查询是否收藏
		 * */
		$id=$_GET['id'];
		$user=session("user");
		$clist=M("Collection")->where(array('collection_id'=>$id,'key_name'=>'collection','vipcode'=>$user['vipcode']))->find();
		if(empty($clist))$this->assign("keyname",1);
		$product=M("Products");
		$list=$product->where(array('id'=>$id))->find();
		if(empty($list))$this->redirect("Index/index");
		//查询城市下面的门店
		$citylist=M("City")->where(array('id'=>$list['chengshi']))->find();
		$this->assign("city",$citylist['name']);
		//查询属于该城市下的门店
		
		/**
		 * 查询门店
		 * */
		$storelist=M()->query("SELECT * from vip_store where id='".$list['mendian']."'");
		/*
		 * 查询门店信息
		 * */
		$this->assign("storelist",$storelist);
		
		$this->assign($list);
		$this->display();
	}
}