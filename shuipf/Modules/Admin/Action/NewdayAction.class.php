<?php
/**
 * 每天一点新活动
 * */
class NewdayAction extends AdminbaseAction{
	
	/**
	 * 查询每天一点新文章
	 * */
	public function addnewsday()
	{

		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();

		$need_check = 0;//是否需要审核
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			$pid = $thisRole['pid'];
			if($pid != 1){
				$need_check = 1;
			}
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
				/**
    	 		* 查询门店
    	 		* */
    			$store=M("Store");
    	    	$thisStore=$store->field('id,name,chengshi')->where(array('id'=>$newMendian))->find();

    	    	$this->assign("thisstore",$thisStore);

    	    	$citywhere['id'] = $thisStore['chengshi'];
			}
		}

		if(IS_POST)
		{

			//判断是否需要审核

			$title=$_POST['title'];
			$mendian=$_POST['mendian'];
			$news=$_POST['news'];
			$chengshi=$_POST['chengshi'];
			if(empty($title))$this->error("请填写标题");
			//if(empty($mendian))$this->error("请选择您要发布的门店");
			if(empty($news))$this->error("请输入内容");
			//if(empty($news))$this->error("请选择城市");
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			$Daynews=M("Daynews");
			$data['date_time']=date("Y-m-d H:i:s");
			$data['title']=$title;
			$data['mendian']=$mendianstr;
			$data['news']=$news;
			$data['chengshi']=$chengshi;
			$data['create_user_id'] = session('UserID');
			$data['status'] = $need_check;
			$Daynews->add($data);
			$this->success("添加成功",__URL__."/newsday");
		}
		

		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);

		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		$this->assign('single',$singleMendian);
		$this->display();
	}
	
	/**
	 *资讯管理
	 * */
	public function newsday()
	{
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$i= array_pop($storelist);
		$where=array();
		$title=$_GET['title'];
		$mendian=$_GET['mendian'];
		if(!empty($title)){$where['title']=array('like','%'.$title.'%');}

		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");

		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
			}
		}
		//使用正则表达式搜索
		$regwhere = '';
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
		if(!empty($title)){
			if(!empty($regwhere)){
				$regwhere .= ' and ';
			}
			$regwhere .= ' title like \'%'.$title.'%\' ';
		}
		$Daynews=M("Daynews");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Daynews->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Daynews->where($regwhere)->order('date_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$status_list = array(
			'0' => '不需要审核',
			'1' => '等待审核',
			'2' => '审核未通过',
			'3' => '审核未通过',
			'10' => '门店管理员审核通过',
			'20' => '审核通过'
		);
		foreach ($list as $key => &$value) {
			try {
				$value['check_status'] = $status_list[$value['status']];
			} catch (Exception $e) {
				$value['check_status'] = "未知结果";
			}
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('title',$title);
		$this->assign('mendian',$mendian);
		$this->assign('single',$singleMendian);
		/**
		 * 查询门店
		 * */
		//设置门店用户ID
		
		$this->display(); // 输出模板
	}
	
	
	/**
	 *资讯删除
	 * */
	public function delnewsday()
	{
		$Daynews=M("Daynews");
		$id=$_GET['id'];
		$Daynews->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 修改资讯
	 * */
	public function upnewsday()
	{
		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();
		$newMendian = 0;
		$need_check = 0;//是否需要审核
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			$pid = $thisRole['pid'];
			if($pid != 1){
				$need_check = 1;
			}
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
			}
		}

		if(IS_POST)
		{
			$id=$_POST['id'];
			$Daynews=M("Daynews");
			$list=$Daynews->field('id,mendian')->where(array('id'=>$id))->find();
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

			$title=$_POST['title'];
			$mendian=$_POST['mendian'];
			$news=$_POST['news'];
			$chengshi=$_POST['chengshi'];
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			
			if(empty($title))$this->error("请填写标题");
			//if(empty($mendian))$this->error("请选择您要发布的门店");
			if(empty($news))$this->error("请输入内容");
			
			//if(empty($chengshi))$this->error("请选择城市");
			
			$data['title']=$title;
			$data['mendian']=$mendianstr;
			$data['chengshi']=$chengshi;
			$data['news']=$news;
			$data['status'] = $need_check;
			$Daynews->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/newsday");
		}
		$Daynews=M("Daynews");
		$id=$_GET['id'];
		$list=$Daynews->where(array('id'=>$id))->find();
		
		if(empty($list)){
			$this->error("该资讯不存在");
		}

		if($singleMendian && !empty($list['chengshi'])){
			$citywhere['id'] = $list['chengshi'];
		}

		
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		
		if(!empty($list['mendian'])){
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
		}
		$this->assign($list);

		$this->assign('single',$singleMendian);
		$this->display();
	}
	
	/**
	 * 活动管理
	 * */
	public function addactivities()
	{

		//判断是否是门店用户登录
		$singleMendian =false;
		$roleid = session("roleid");
		$citywhere = array();
		$need_check = 0;//是否需要审核
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			$pid = $thisRole['pid'];
			if($pid != 1){
 				$need_check = 1;
 			}
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;


				/**
    	 		* 查询门店
    	 		* */
    			$store=M("Store");
    	    	$storelist=$store->field('id,name,chengshi')->where(array('id'=>$newMendian))->find();

    	    	$thisStore = $storelist;
    	    	$this->assign("thisstore",$thisStore);

    	    	$citywhere['id'] = $thisStore['chengshi'];
			}
		}
		if(IS_POST)
		{
			$title=$_POST['title'];
			$img=$_POST['thumb'];
			$s_date=$_POST['s_date'];
			$e_date=$_POST['e_date'];
			$mendian=$_POST['mendian'];
			$jieshao=$_POST['jieshao'];
			$news=$_POST['news'];
				
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			$chengshi=$_POST['chengshi'];
			$news=$_POST['news'];
			$atype=$_POST['atype'];
			if(empty($title))$this->error("请填写活动标题");
			if(empty($img))$this->error("请选择活动图片");
			if(empty($s_date))$this->error("请填写活动开始时间");
			if(empty($e_date))$this->error("请填写活动结束时间");
			if(empty($mendian))$this->error("请选择门店");
			if(empty($news))$this->error("请填写活内容");
			if(empty($chengshi))$this->error("请选择城市");
			if(empty($atype))$this->error("请选择活动类型");
			$data['title']=$title;
			$data['img']=$img;
			$data['jieshao']=$jieshao;
			$data['chengshi']=$chengshi;
			$data['s_date']=$s_date;
			$data['e_date']=$e_date;
			$data['mendian']=$mendianstr;
			$data['news']=$news;
			$data['atype']=$atype;
			$data['date_time']=date("Y-m-d");
			$data['create_user_id'] = session('UserID');
			$data['status'] = $need_check;
			$activities=M("Activities");
			$activities->add($data);
			$this->success("添加成功",__URL__."/activities");
			
		}


		

		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		/**
		 * 查询活动类型
		 * */
		$activitiestypelist=M("Activitiestype")->where($where)->select();
		$this->assign("activitiestypelist",$activitiestypelist);
		
		$this->assign("single",$singleMendian);
		$this->display();
	}
	
	/**
	 * 活动管理
	 * */
	public function activities()
	{
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$where=array();
		$title=$_GET['title'];
		$mendian=$_GET['mendian'];
		if(!empty($title))$where['title']=array('like','%'.$title.'%');
		$i= array_pop($storelist);


		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
			}
		}
		//使用正则表达式匹配
		$regwhere = '';
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
		if(!empty($title)){
			if(!empty($regwhere)){
				$regwhere .= ' and ';
			}
			$regwhere .= ' title like \'%'.$title.'%\' ';
		}
		$activities=M("Activities");
		import("ORG.Util.Page");// 导入分页类
		$count      = $activities->where($regwhere)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $activities->where($regwhere)->order('paixu DESC,date_time DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();

		$status_list = array(
			'0' => '不需要审核',
			'1' => '等待审核',
			'2' => '审核未通过',
			'3' => '审核未通过',
			'10' => '门店管理员审核通过',
			'20' => '审核通过'
		);
		foreach ($list as $key => &$value) {
			try {
				$value['check_status'] = $status_list[$value['status']];
			} catch (Exception $e) {
				$value['check_status'] = "未知结果";
			}
		}
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('title',$title);
		$this->assign('mendian',$mendian);
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		$this->assign("single",$singleMendian);
		$this->display(); // 输出模板
	}
	/**
	 * 排序
	 * */
	public function activitiespaixu()
	{
		$activities=M("Activities");
		$paixu=$_POST['paixu'];
		foreach ($paixu as $key=>$value)
		{
			$activities->where(array('id'=>$key))->save(array('paixu'=>$value));
		}
		$this->success("操作成功");
	}
	/**
	 * 活动删除
	 * */
	public function delactivities()
	{
		$activities=M("Activities");
		$id=$_GET['id'];
		$activities->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	
	/**
	 * 活动修改
	 * */
	public function upactivities()
	{
		//判断是否是门店用户登录
		$singleMendian = false;
		$roleid = session("roleid");
		$citywhere = array();
		$newMendian = 0;
		$need_check = 0;
		if($roleid != 1){
			$Role = D("Role");
			$condition['id'] = $roleid;
			$thisRole = $Role->where($condition)->find();
			$newMendian = $thisRole['mendian'];
			$pid = $thisRole['pid'];
			if($pid != 1){
 				$need_check = 1;
 			}
			if($newMendian != 0){
				$mendian = $newMendian;
				$singleMendian = true;
			}
		}

		if(IS_POST)
		{
			$id=$_POST["id"];
			$activities=M("Activities");
			$list=$activities->field('id,mendian')->where(array('id'=>$id))->find();
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

			$title=$_POST['title'];
			$img=$_POST['img'];
			$s_date=$_POST['s_date'];
			$e_date=$_POST['e_date'];
			$mendian=$_POST['mendian'];
			$chengshi=$_POST['chengshi'];
			$jieshao=$_POST['jieshao'];
			foreach ($mendian as $value)
			{
				$mendianstr.= $value.',';
			}
			
			$news=$_POST['news'];
			$atype=$_POST['atype'];
			if(empty($title))$this->error("请填写活动标题");
			if(empty($img))$this->error("请选择活动图片");
			if(empty($s_date))$this->error("请填写活动开始时间");
			if(empty($e_date))$this->error("请填写活动结束时间");
			if(empty($mendian))$this->error("请选择门店");
			if(empty($news))$this->error("请填写活内容");
			if(empty($atype))$this->error("请填写活动类型");
			$data['title']=$title;
			$data['img']=$img;
			$data['s_date']=$s_date;
			$data['atype']=$atype;
			$data['e_date']=$e_date;
			$data['mendian']=$mendianstr;
			$data['news']=$news;
			
			$data['chengshi']=$chengshi;
			
			$data['jieshao']=$jieshao;
			$data['status'] = $need_check;
			$activities->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/activities");
		}
		$activities=M("Activities");
		$id=$_GET['id'];
		$list=$activities->where(array('id'=>$id))->find();

		if(empty($list)){
			$this->error("该活动不存在");
		}

		if($singleMendian && !empty($list['chengshi'])){
			$citywhere['id'] = $list['chengshi'];
		}

		$this->assign($list);
		
		/**
		 * 查询活动类型
		 * */
		$activitiestypelist=M("Activitiestype")->select();
		$this->assign("activitiestypelist",$activitiestypelist);
		
		
		/**
		 * 查询城市
		 * */
		$city=M("City");
		$citylist=$city->where($citywhere)->select();
		$this->assign("citylist",$citylist);
		
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
		
		$this->assign("single",$singleMendian);
		$this->display();
	}
	
	
	/**
	 * 是否推荐
	 * */
	public function activitiestuijian()
	{
		$activities=M("Activities");
		$id=$_GET['id'];
		$key=$_GET['key'];
		$data['tuijian']=$key;
		$activities->where(array('id'=>$id))->save($data);
		$this->success("推荐成功");
	}
	

	/**
	 * 预览资讯
	 * */
	public function yulannews()
	{
		if(IS_POST)
		{
			$list=$_POST;
			$this->assign($list);
		}
		$this->display();
	}
	
	
	/**
	 * 预览活动
	 * */
	public function yulanhuodong()
	{
		if(IS_POST)
		{
			$list=$_POST;
			$this->assign($list);
		}
		$this->display();
	}
	
	
	
}
