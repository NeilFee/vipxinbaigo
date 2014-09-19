<?php

/**
 * 合作伙伴
 * */
class CooperationAction extends AdminbaseAction{
	/**
	 * 新增合作伙伴
	 * */
	public function addcooperation()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$content=$_POST['content'];
			$news=$_POST['news'];
			if(empty($name))$this->error("品牌名称不能为空");
			if(empty($news))$this->error("请填写品牌详情");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($content))$this->error("品牌介绍不能为空");
			$data['name']=$name;
			$data['img']=$thumb;
			$data['discount']=$content;
			$data['news']=$news;
			$data['date_time']=date("Y-m-d");
			$data['uid']=self::$Cache['uid'];
			$Cooperation=M("Cooperation");
			$Cooperation->create($data);
			$Cooperation->add($data);
			$this->success("添加成功",__URL__."/cooperation");
		}
		$this->display();
	}
	
	/**
	 * 合作品牌列表
	 * */
	public function cooperation()
	{
		$where=array();
		$name=$_GET['name'];
		if(!empty($name))$where['name']=array('like','%'.$name.'%');
		$Cooperation=M("Cooperation");
		import("ORG.Util.Page");// 导入分页类
		$count= $Cooperation->where($where)->count();// 查询满足要求的总记录数
		$Page= new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Cooperation->where($where)->order('date_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);
		$this->display(); // 输出模板
	}
	/**
	 * 删除品牌
	 * */
	public function del_cooperation()
	{
		$id=$_GET['id'];
		$Cooperation=M("Cooperation");
		$Cooperation->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	/**
	 * 修改品牌
	 * */
	public function up_cooperation()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$thumb=$_POST['thumb'];
			$content=$_POST['content'];
			$news=$_POST['news'];
			if(empty($news))$this->error("请填写详情");
			if(empty($name))$this->error("品牌名称不能为空");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($content))$this->error("品牌介绍不能为空");
			$data['name']=$name;
			$data['img']=$thumb;
			$data['discount']=$content;
			$data['news']=$news;
			$id=$_POST['id'];
			$Cooperation=M("Cooperation");
			$Cooperation->where(array('id'=>$id))->save($data);
			$this->success("修改成功");
		}
		$id=$_GET['id'];
		$Cooperation=M("Cooperation");
		$list=$Cooperation->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
	/**
	 * 预览活动
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