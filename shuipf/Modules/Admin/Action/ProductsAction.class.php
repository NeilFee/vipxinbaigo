<?php
class ProductsAction extends AdminbaseAction{
	
	/**
	 * 预览
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
	

	/**
	 * 积分礼品分类查询
	 * */
	public function productstype()
	{
		$Productstype=M("Productstype");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Productstype->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Productstype->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	
	/**
	 * 积分礼品分类删除
	 * */
	public function del_productstype()
	{
		$Productstype=M("Productstype");
		$id=$_GET['id'];
		$Productstype->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 积分礼品分类添加
	 * */
	public function add_productstype()
	{
		if(IS_POST)
		{
			$Productstype=M("Productstype");
			$name=$_POST['name'];
			
			if(empty($name))$this->error("分类名称不能为空");
			$data['name']=$name;
			$data['date_time']=date("Y-m-d");
			$Productstype->add($data);
			$this->success("添加成功",__URL__."/productstype");
			
		}
		
		
		$this->display(); // 输出模板
	}
	
	
	/**
	 * 积分礼品分类添加
	 * */
	public function up_productstype()
	{
		$Productstype=M("Productstype");
		if(IS_POST)
		{
			$Productstype=M("Productstype");
			$id=$_POST['id'];
			$name=$_POST['name'];
			if(empty($name))$this->error("分类名称不能为空");
			$data['name']=$name;
			$Productstype->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/productstype");
		}
		$id=$_GET['id'];
		$list=$Productstype->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display(); // 输出模板
	}
	
	
	/**
	 * 礼品添加
	 * */
	public function add_product()
	{
		if(IS_POST)
		{
			$code=$_POST['code'];
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$typename=$_POST['typename'];
			$jifen=$_POST['jifen'];
			$sjiage=$_POST['sjiage'];
			$cjiage=$_POST['cjiage'];
			$shangjia=$_POST['shangjia'];
			$mendian=$_POST['mendian'];
			$content=$_POST['content'];
			$chengshi=$_POST['chengshi'];
			$productsprece=$_POST['productsprece'];
			$chengshi=$_POST['chengshi'];
			$description=$_POST['description'];
			$kucun=$_POST['kucun'];
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			$tuijian_id=$_POST['tuijian_id'];
			if(empty($code))$this->error("礼品编号不能为空");
			if(empty($name))$this->error("礼品名称不能为空");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($typename))$this->error("请选择分类");
			if(empty($jifen))$this->error("请填写积分");
			if(empty($sjiage))$this->error("请填写礼品市场价");
			if(empty($cjiage))$this->error("请填写礼品礼品采购价");
			if(empty($shangjia))$this->error("请选择商家");
			//if(empty($content))$this->error("请填写介绍");
			if(empty($productsprece))$this->error("请填写价格区域");
			if(empty($chengshi))$this->error("请选择城市");
			//if(empty($description))$this->error("礼品描述不能为空");
			if(empty($kucun))$this->error("库存不能为空");
			$data['code']=$code;
			$data['description']=$description;
			$data['name']=$name;
			$data['tuijian_id']=$tuijian_id;
			$data['img']=$thumb;
			$data['typename']=$typename;
			$data['jifen']=$jifen;
			$data['kucun']=$kucun;
			$data['sjiage']=$sjiage;
			$data['cjiage']=$cjiage;
			$data['shangjia']=$shangjia;
			$data['mendian']=$mendianstr;
			$data['productsprece']=$productsprece;
			$data['jieshao']=$content;
			$data['date_time']=date("Y-m-d");
			$data['chengshi']=$chengshi;
			$data['create_user_id'] = session('UserID');
			$Products=M("Products");
			$Products->add($data);
			$this->success("添加成功",__URL__."/product");
			
		}
		//查询分类和供货商
		$productstype=M("productstype");
		$list=$productstype->select();
		$this->assign("list",$list);


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
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		/**
		 * 查询供货商
		 * */
		$productssupplier=M("productssupplier");
		$productssupplierlist=$productssupplier->select();
		$this->assign("productssupplierlist",$productssupplierlist);
		/**
		 * 查询推荐名称
		 * */
		$productlabellist=M("Productlabel")->select();
		$this->assign("productlabellist",$productlabellist);
		/**
		 * 查询价格区间
		 * */
		$Productsprece=M("Productsprece");
		$Productsprecelist=$Productsprece->select();
		$this->assign("Productsprecelist",$Productsprecelist);
		
		$this->assign("single",$singleMendian);
		$this->display(); 
	}
	
	/**
	 * 礼品管理
	 * */
	public function product()
	{
		
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$i= array_pop($storelist);
		$where=array();
		$name=$_GET['name'];
		$chengshi=$_GET['chengsi'];
		$mendian=$_GET['mendian'];
		if(!empty($name))$where['name']=$name;
		if(!empty($chengshi))$where['chengshi']=$chengshi;


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
			}
		}
		//使用正则表达式匹配
		$regwhere = "";
	    if($mendian!="")
		{
			$regwhere = "`mendian` REGEXP '(^$mendian,|,$mendian,)' ";
			if($i['id'] == $mendian)
			{
				$where['mendian']=array('like','%'.$mendian.'%');
			}else {
				
				$mendian=$mendian.",";
				$where['mendian']=array('like','%'.$mendian.'%');
			}
		}
		$Products=M("Products");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Products->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Products->where($regwhere)->order('paixu DESC,date_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign("name",$name);
		$this->assign("chengshi",$chengshi);
		$this->assign("mendian",$mendian);
		
		
		//查询分类和供货商
		$productstype=M("productstype");
		$typelist=$productstype->select();
		$this->assign("typelist",$typelist);
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->select();
		$this->assign("citylist",$citylist);

		$this->assign("single",$singleMendian);
		$this->display(); // 输出模板
	}
	
	/**
	 * 排序
	 * */
	public function productpaixu()
	{
		$Products=M("Products");
		$paixu=$_POST['paixu'];
		foreach ($paixu as $key=>$value)
		{
			$Products->where(array('id'=>$key))->save(array('paixu'=>$value));
		}
		$this->success("操作成功");
	}
	
	
	/**
	 * 礼品删除
	 * */
	public function productdel()
	{
		$Products=M("Products");
		$id=$_GET['id'];
		$Products->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 礼品更新
	 * */
	public function productup()
	{
		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();
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
			$Products=M("Products");
			$id=$_POST["id"];
			$list=$Products->field('id,mendian')->where(array('id'=>$id))->find();
			//判断是否有权限更新
			if(!empty($list['mendian'])){
				$mendiansub= substr($list['mendian'],0,strlen($list['mendian'])-1);
				$mendianarray=explode(',',$mendiansub);
				if($singleMendian){
					if(false == in_array($newMendian, $mendianarray)){
						$this->error("您没有权限编辑");
					}
				}
			}

			$code=$_POST['code'];
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$typename=$_POST['typename'];
			$jifen=$_POST['jifen'];
			$sjiage=$_POST['sjiage'];
			$cjiage=$_POST['cjiage'];
			$shangjia=$_POST['shangjia'];
			$mendian=$_POST['mendian'];
			$content=$_POST['content'];
			$chengshi=$_POST['chengshi'];
			$productsprece=$_POST['productsprece'];
			$description=$_POST['description'];
			$kucun=$_POST['kucun'];
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			
			$tuijian_id=$_POST['tuijian_id'];
			if(empty($code))$this->error("礼品编号不能为空");
			
			if(empty($name))$this->error("礼品名称不能为空");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($typename))$this->error("请选择分类");
			if(empty($jifen))$this->error("请填写积分");
			if(empty($sjiage))$this->error("请填写礼品市场价");
			if(empty($cjiage))$this->error("请填写礼品礼品采购价");
			if(empty($shangjia))$this->error("请选择商家");
			//if(empty($content))$this->error("请填写介绍");
			if(empty($productsprece))$this->error("请填写价格区域");
			if(empty($chengshi))$this->error("请选择城市");
			//if(empty($description))$this->error("礼品描述不能为空");
			if(empty($kucun))$this->error("库存不能为空");
			$data['code']=$code;
			$data['description']=$description;
			$data['name']=$name;
			$data['tuijian_id']=$tuijian_id;
			$data['img']=$thumb;
			$data['typename']=$typename;
			$data['jifen']=$jifen;
			$data['kucun']=$kucun;
			$data['sjiage']=$sjiage;
			$data['cjiage']=$cjiage;
			$data['shangjia']=$shangjia;
			$data['mendian']=$mendianstr;
			$data['jieshao']=$content;
			$data['date_time']=date("Y-m-d");
			$Products->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/product");
		}
		$Products=M("Products");
		$id=$_GET['id'];
		$list=$Products->where(array('id'=>$id))->find();

		if(empty($list)){
			$this->error("该礼品不存在");
		}

		if($singleMendian && !empty($list['chengshi'])){
			$citywhere['id'] = $list['chengshi'];
		}

		$this->assign($list);
		//查询分类和供货商
		$productstype=M("productstype");
		$typelist=$productstype->select();
		$this->assign("typelist",$typelist);
		
		/**
		 * 查询推荐名称
		 * */
		$productlabellist=M("Productlabel")->select();
		$this->assign("productlabellist",$productlabellist);
		


		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$mendiansub= substr($list['mendian'],0,strlen($list['mendian'])-1);
		$mendianarray=explode(',',$mendiansub);

		//判断是否有权限编辑
		if($singleMendian){
			if(false == in_array($newMendian, $mendianarray)){
				$this->error("您没有权限编辑");
			}
		}

		$mendianstore=array();
		foreach ($storelist as $key=>$value)
		{
			$mendianstore[$value['id']]=$value;
		}
		foreach ($mendianarray as $value)
		{
			$mendianstore[$value]['checkbox']=1;
		}
		$this->assign("storelist",$mendianstore);
		

		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		
		
		/**
		 * 查询供货商
		 * */
		$productssupplier=M("productssupplier");
		$productssupplierlist=$productssupplier->select();
		$this->assign("productssupplierlist",$productssupplierlist);
		
		/**
		 * 查询价格区间
		 * */
		$Productsprece=M("Productsprece");
		$Productsprecelist=$Productsprece->select();
		$this->assign("Productsprecelist",$Productsprecelist);
		
		//查询分类和供货商
		$productstype=M("productstype");
		$list=$productstype->select();
		$this->assign("list",$list);
		
		$this->assign("single",$singleMendian);
		$this->display();
	}
	
	/**
	 * 是否推荐
	 * */
	public function producttuijian()
	{
		$Products=M("Products");
		$id=$_GET['id'];
		$key=$_GET['key'];
		$data['tuijian']=$key;
		$Products->where(array('id'=>$id))->save($data);
		$this->success("推荐成功");
	}
	
	/**
	 * 价格区域管理
	 * */
	
	public function productsprece()
	{
		$Productstype=M("Productsprece");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Productstype->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Productstype->order('date_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	
	/**
	 * 价格区域管理
	 * */
	
	public function productspreceadd()
	{
		if(IS_POST)
		{
			$s_price=$_POST['s_price'];
			$e_price=$_POST["e_price"];
			if(empty($s_price))$this->error("开始价格不能为空");
			if(empty($e_price))$this->error("结束价格不能为空");
			$Productstype=M("Productsprece");
			$data['s_price']=$s_price;
			$data['e_price']=$e_price;
			$data['date_time']=date("Y-m-d H:i:s");
			$Productstype->create($data);
			$Productstype->add($data);
			$this->success("添加成功",__URL__."/productsprece");
		}
		$this->display(); // 输出模板
	}
	
	
	/**
	 * 价格区域删除
	 * */
	
	public function productsprecedel()
	{
		
		$id=$_GET['id'];
		$Productstype=M("Productsprece");
		$Productstype->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	/**
	 * 价格区域更新
	 * */
	
	public function productspreceup()
	{
		if(IS_POST)
		{
			$s_price=$_POST['s_price'];
			$e_price=$_POST["e_price"];
			if(empty($s_price))$this->error("开始价格不能为空");
			if(empty($e_price))$this->error("结束价格不能为空");
			$Productstype=M("Productsprece");
			$data['s_price']=$s_price;
			$data['e_price']=$e_price;
			$id=$_POST['id'];
			$Productstype->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/productsprece");
		}
		
		$id=$_GET['id'];
		$Productstype=M("Productsprece");
		$list=$Productstype->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
	/**
	 * 供货商管理
	 * */
	public function supplier()
	{
		$productssupplier=M("productssupplier");
		import("ORG.Util.Page");// 导入分页类
		$count      = $productssupplier->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $productssupplier->order('date_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	
	/**
	 * 添加供货商
	 * */
	
	public function supplieradd()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			if(empty($name))$this->error("请填写供货商名称");
			$productssupplier=M("productssupplier");
			$data['name']=$name;
			$data['date_time']=date("Y-m-d H:i:s");
			$productssupplier->create($data);
			$productssupplier->add($data);
			$this->success("添加成功",__URL__."/supplier");
		}
		$this->display(); // 输出模板
	}
	
	/**
	 * 供货商删除
	 * */
	
	public function supplierdel()
	{
	
		$id=$_GET['id'];
		$productssupplier=M("productssupplier");
		$productssupplier->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	/**
	 * 修改供货商
	 * */
	
	public function supplierup()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			if(empty($name))$this->error("请填写供货商名称");
			$productssupplier=M("productssupplier");
			$data['name']=$name;
			$id=$_POST['id'];
			$productssupplier->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/supplier");
			
		}
		$id=$_GET['id'];
		$productssupplier=M("productssupplier");
		$list=$productssupplier->where(array('id'=>$id))->find();
		$this->assign($list);
		
		$this->display(); // 输出模板
	}
	
	
	
	
}
