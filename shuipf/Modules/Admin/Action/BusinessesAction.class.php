<?php
class BusinessesAction extends AdminbaseAction{
	/**
	 * 商户分类管理
	 * */
	public function businessesnode(){		
		$where=array();
		$name=$_GET['name'];
		if(!empty($name))$where['name']=array('like','%'.$name.'%');		
		$businessesnode=M("Businessesnode");
		import("ORG.Util.Page");// 导入分页类
		$count      = $businessesnode->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $businessesnode->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);
		$this->display(); // 输出模板
	}
	/**
	 * 添加分类
	 * */
	public function add_businessesnode(){
		if(IS_POST)
		{
			$name=$_POST['name'];
			if(empty($name))$this->error("请输入分类名称");
			$businessesnode=M("Businessesnode");
			$data['name']=$name;
			$businessesnode->create($data);
			$businessesnode->add($data);
			$this->success("添加成功",__URL__."/businessesnode");
		}
		$this->display(); // 输出模板
	}
	/**
	 * 删除分类
	 * */
	public function del_businessesnode(){
		$id=$_GET['id'];
		$businessesnode=M("Businessesnode");
		$businessesnode->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	/**
	 * 编辑分类
	 * */
	public function up_businessesnode(){
		if(IS_POST)
		{
			$name=$_POST['name'];
			$id=$_POST['id'];
			if(empty($name))$this->error("请输入分类名称");
			$businessesnode=M("Businessesnode");
			$data['name']=$name;
			$businessesnode->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/businessesnode");
		}
		$id=$_GET['id'];
		$businessesnode=M("Businessesnode");
		$list=$businessesnode->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	/**
	 * 添加商户
	 * */
	
	public function add_businesses()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$node_id=$_POST['node_id'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$content=$_POST['content'];
			$chengshi=$_POST['chengshi'];
			$mendian=$_POST['mendian'];
			if(empty($name))$this->error("商户名称不能为空");
			if(empty($thumb))$this->error("商户封面图片不能为空");
			if(empty($chengshi))$this->error("所属城市不能为空");
			if(empty($node_id))$this->error("请选择商户类别");
			if(empty($phone))$this->error("商户联系方式不能为空");
			if(empty($address))$this->error("商户地址不能为空");
			if(empty($content))$this->error("商户优惠介绍不能为空");
			$businesses=M("Businesses");
			$data['name']=$name;
			$data['name_img']=$thumb;
			$data['city']=$chengshi;
			$data['mendian']=$mendian;
			$data['node_id']=$node_id;
			$data['phone']=$phone;
			$data['address']=$address;
			$data['introduction']=$content;
			$data['uid']=self::$Cache['uid'];
			$data['date_time']=date("Y-m-d");
			$businesses->create($data);
			$businesses->add($data);
			$this->success("添加成功",__URL__."/businesses");
			
		}

		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->select();
			$newMendian = $thisRole[0]['mendian'];
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;


				/**
    	 		* 查询门店
    	 		* */
    			$store=M("Store");
    	    	$storelist=$store->field('id,name,chengshi')->where(array('id'=>$newMendian))->select();

    	    	$thisStore = $storelist[0];
    	    	$this->assign("thisstore",$thisStore);

    	    	$citywhere['id'] = $thisStore['chengshi'];
			}
		}

		/**
		 * 查询城市
		 * 
		 */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		
		$businessesnode=M("Businessesnode");
		$list=$businessesnode->select();
		$this->assign("list",$list);
		$this->assign('single',$singleMendian);
		$this->display();
	}
	
	/**
	 * 排序
	 * */
	public function businessespaixu()
	{
		$businesses=M("Businesses");
		$paixu=$_POST['paixu'];
		foreach ($paixu as $key=>$value)
		{
			$businesses->where(array('id'=>$key))->save(array('paixu'=>$value));
		}
		$this->success("操作成功");
	}
	/**
	 * 商户管理
	 * */
	public function businesses()
	{
		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$mendian = 0;
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


		$where=array();
		$name=$_GET['name'];
		if($singleMendian){
			$where['mendian'] = $mendian;
		}else{
			if(!empty($name))$where['name']=array('like','%'.$name.'%');
		}
		$businesses=M("Businesses");
		import("ORG.Util.Page");// 导入分页类
		$count      = $businesses->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $businesses->where($where)->join('vip_user ON vip_user.id = uid')->order('paixu DESC,date_time DESC' )->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);// 赋值分页输出
		$this->assign('single',$singleMendian);
		$this->display(); // 输出模板
	}
	/**
	 * 删除商户
	 * */
	public function del_businesses()
	{
		$businesses=M("Businesses");
		$id=$_GET['id'];
		$businesses->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	/**
	 * 推荐
	 * */
	public function tuijian()
	{
		$businesses=M("Businesses");
		$key=$_GET['key'];
		$id=$_GET['id'];
		$data['tuijian_key']=$key;
		$businesses->where(array('id'=>$id))->save($data);
		$this->success("操作成功");
	}
	/**
	 * 编辑
	 * */
	public function up_businesses()
	{
		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();
		$mendianwhere = array();
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

		if(IS_POST)
		{
			$businesses=M("Businesses");
			$id=$_POST['id'];
			$list=$businesses->field('id,mendian')->where(array('id'=>$id))->find();
			//判断是否有权限更新
			if($singleMendian){
				if($newMendian != $list['mendian']){
					$this->error("您没有权限编辑");
				}
			}

			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$node_id=$_POST['node_id'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$content=$_POST['content'];
			$chengshi=$_POST['chengshi'];
			$mendian=$_POST['mendian'];
			
			$id=$_POST['id'];
			if(empty($name))$this->error("商户名称不能为空");
			if(empty($chengshi))$this->error("所属城市不能为空");
			if(empty($thumb))$this->error("商户封面图片不能为空");
			if(empty($node_id))$this->error("请选择商户类别");
			if(empty($phone))$this->error("商户联系方式不能为空");
			if(empty($address))$this->error("商户地址不能为空");
			if(empty($content))$this->error("商户优惠介绍不能为空");
			$businesses=M("Businesses");
			$data['name']=$name;
			$data['city']=$chengshi;
			$data['name_img']=$thumb;			
			$data['mendian']=$mendian;			
			$data['node_id']=$node_id;
			$data['phone']=$phone;
			$data['address']=$address;
			$data['introduction']=$content;
			$businesses->where(array('id'=>$id))->save($data);

		
			$this->success("修改成功");
		}
		$businessesnode=M("Businessesnode");
		$nodelist=$businessesnode->select();
		$this->assign("nodelist",$nodelist);
		$businesses=M("Businesses");
		$id=$_GET['id'];
		$list=$businesses->where(array('id'=>$id))->find();

		if(empty($list)){
			$this->error("该商户不存在");
		}
		if($singleMendian && !empty($list['city'])){
			$citywhere['id'] = $list['city'];
		}
		//判断是否有权限编辑
		if($singleMendian){
			if($newMendian != $list['mendian']){
				$this->error("您没有权限编辑");
			}
			$mendianwhere['id'] = $newMendian;
		}

		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		
		
		$store=M("Store");
		$storelist=$store->where($mendianwhere)->select();
		$this->assign("storelist",$storelist);

		$this->assign($list);
		$this->assign("single",$singleMendian);
		$this->display(); // 输出模板
	}
	
	/**
	 * 预览商户
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