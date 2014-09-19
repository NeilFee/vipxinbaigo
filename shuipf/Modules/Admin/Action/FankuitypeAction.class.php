<?php
class FankuitypeAction extends AdminbaseAction
{
	/**
	 * 查询反馈类型
	 * */
	public function index()
	{
		$where=array();
		$name=$_GET['name'];
		if(!empty($name))$where['name']=array('like','%'.$name.'%');
		
		$fankuitype=M("Fankuitype");
		import("ORG.Util.Page");// 导入分页类
		$count      = $fankuitype->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $fankuitype->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);
		$this->display(); // 输出模板
	}
	
	/**
	 * 删除反馈类型
	 * */
	public function fankuitypedel()
	{
		$id=$_GET['id'];
		$fankuitype=M("Fankuitype");
		$fankuitype->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 删除反馈类型
	 * */
	public function fankuitypeadd()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			if(empty($name))$this->error("请填写反馈类型名称");
			$data['name']=$name;
			$data['date_time']=date("Y-m-d H:i:s");
			$fankuitype=M("Fankuitype");
			$fankuitype->add($data);
			$this->success("添加成功",__URL__."/index");
		}
		$this->display(); // 输出模板
	}
	/**
	 * 更新
	 * */
	public function fankuitypeaup()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			if(empty($name))$this->error("请填写反馈类型名称");
			$data['name']=$name;
			$id=$_POST['id'];
			$fankuitype=M("Fankuitype");
			$fankuitype->where(array('id'=>$id))->save($data);
			$this->success("修改成功",__URL__."/index");
		}
		$id=$_GET['id'];
		$fankuitype=M("Fankuitype");
		$list=$fankuitype->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
}