<?php
/**
 * 门店管理
 * Author: Felix
 * Contact email:yangyu1000@163.com
 */
class StoreAction extends AdminbaseAction{
	
	/**
	 *新增门店
	 */
	public function addstore()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$address=$_POST['address'];
			$zip_code=$_POST['zip_code'];
			$phone=$_POST['phone'];
			$opening_time=$_POST['opening_time'];
			$measure=$_POST['measure'];
			$introduction=$_POST['content'];
			$fax=$_POST['fax'];
			$chengshi=$_POST['chengshi'];
			if(empty($name))$this->error("名称不能为空");
			if(empty($address))$this->error("地址不能为空");
			if(empty($phone))$this->error("客服电话不能为空");
			if(empty($chengshi))$this->error("请选择城市");
			if(empty($opening_time))$this->error("开业时间不能为空");
			if(empty($measure))$this->error("面积不能为空");
			if(empty($introduction))$this->error("门店介绍不能为空");
			$data['name']=$name;
			$data['images_url']=$thumb;
			$data['address']=$address;
			$data['zip_code']=$zip_code;
			$data['phone']=$phone;
			$data['chengshi']=$chengshi;
			$data['opening_time']=$opening_time;
			$data['measure']=$measure;
			$data['introduction']=$introduction;
			$data['fax']=$fax;
			$Store=M("Store");
			$Store->create($data);
			$Store->add($data);
			$this->success("添加成功");
		}
		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		$this->display();
	}
	
	
	
	/**
	 *修改门店
	 */
	public function updatestore()
	{

		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$newMendian = 0;
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->select();
			$newMendian = $thisRole[0]['mendian'];
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
			}
		}

		$Store=M("Store");
		if(IS_POST)
		{
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$address=$_POST['address'];
			$zip_code=$_POST['zip_code'];
			$phone=$_POST['phone'];
			$opening_time=$_POST['opening_time'];
			$measure=$_POST['measure'];
			$introduction=$_POST['content'];
			$fax=$_POST['fax'];
			$id=$_POST['id'];
			$chengshi=$_POST['chengshi'];
			if(empty($name))$this->error("名称不能为空");
			if(empty($address))$this->error("地址不能为空");
			if(empty($phone))$this->error("客服电话不能为空");
			if(empty($opening_time))$this->error("开业时间不能为空");
			if(empty($measure))$this->error("面积不能为空");
			if(empty($introduction))$this->error("门店介绍不能为空");
			if(empty($chengshi))$this->error("请选择城市");
			$data['name']=$name;
			$data['images_url']=$thumb;
			$data['address']=$address;
			$data['zip_code']=$zip_code;
			$data['phone']=$phone;
			$data['opening_time']=$opening_time;
			$data['measure']=$measure;
			$data['introduction']=$introduction;
			$data['fax']=$fax;
			$data['chengshi']=$chengshi;
			$Store->where(array('id'=>$id))->save($data);
			$this->success("修改成功");
		}
		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);
		
		$id=$_GET['id'];
		$list=$Store->where(array('id'=>$id))->find();

		if(empty($list)){
			$this->error("不存在该门店");
		}

		if($singleMendian){
			if($newMendian != $list['id']){
				$this->error("您没有权限编辑");
			}
		}

		$this->assign($list);
		$this->assign("id",$id);
		$this->display();
	}
	
	
	
	/**
	 *门店数据
	 */
	public function liststore()
	{
		$where=array();
		$name=$_GET['name'];
		if(!empty($name))$where['name']=array('like','%'.$name.'%');
		


		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$where = array();
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->select();
			$newMendian = $thisRole[0]['mendian'];
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
				$where['id'] = $newMendian;
				unset($where['name']);
			}
		}

		$Store=M("Store");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Store->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Store->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);

		$this->assign('single',$singleMendian);
		$this->display(); // 输出模板
	}
	/**
	 * 删除
	 * */
	public function delete()
	{
		$id=$_GET['id'];
		M("Store")->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	/**
	 * 楼层品牌
	 * */
	public function brand()
	{
		$id=$_GET['id'];
		$storefloor=D("Storefloor");
		$list = $storefloor->where(array('node_id'=>$id))->relation(true)->select();
		$this->assign("list",$list);
		$this->assign("id",$id);
		$this->display();
	}
	/**
	 * 新增楼层
	 * */
	public function addfloor()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$range=$_POST['range'];
			if(empty($name))$this->error("楼层名称不能为空");
			if(empty($range))$this->error("经营范围不能为空");
			$id=$_POST["id"];
			$data['node_id']=$id;
			$data['name']=$name;
			$data['range']=$range;
			$storefloor=M("Storefloor");
			$storefloor->create($data);
			$storefloor->add($data);
			$this->success("添加成功");
		}
		$id=$_GET['id'];
		$this->assign("id",$id);
		$this->display();
	}
	
	/**
	 * 修改楼层
	 * */
	public function floorupdata()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$range=$_POST['range'];
			if(empty($name))$this->error("楼层名称不能为空");
			if(empty($range))$this->error("经营范围不能为空");
			$id=$_POST["id"];
			
			$data['name']=$name;
			$data['range']=$range;
			
			$storefloor=M("Storefloor");
			$storefloor->where(array('id'=>$id))->save($data);
			
			$this->success("修改成功");
		}
	
		$id=$_GET['id'];
		$list=M("Storefloor")->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
	
	/**
	 * 删除楼层
	 * */
	public function floordelete()
	{
		$id=$_GET['id'];
		M("Storefloor")->where(array('id'=>$id))->delete();;
		M("Storebrand")->where(array('nide_id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	/**
	 * 新增品牌
	 * */
	public function addbrand()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$id=$_POST["id"];
			if(empty($name))$this->error("品牌不能为空");
 			$data['nide_id']=$id;
			$data['name']=$name;
			$Storebrand=M("Storebrand");
			$Storebrand->create($data);
			$Storebrand->add($data);
			$this->success("添加成功");
		}
		
		$id=$_GET['id'];
		$this->assign("id",$id);
		$this->display();
	}
	/**
	* 删除品牌
	* */
	public function branddelete()
	{
		$id=$_GET['id'];
		M("Storebrand")->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 修改品牌
	 * */
	public function brandupdata()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$id=$_POST["id"];
			if(empty($name))$this->error("品牌不能为空");
			$data['name']=$name;
			$Storebrand=M("Storebrand");
			$Storebrand->where(array('id'=>$id))->save($data);
			$this->success("修改成功");
		}
		
		$id=$_GET['id'];
		$list=M("Storebrand")->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	/**
	 * 预览门店
	 * */
	public function yulan()
	{
		if(IS_POST)
		{
			$list=$_POST;
			$this->assign($list);
		}
		$this->display();
	}
	
}
