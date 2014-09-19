<?php
class CityAction extends AdminbaseAction{
	public function cityall()
	{
		$where=array();
		$name=$_GET['name'];
		if(!empty($name))$where['name']=array('like','%'.$name.'%');
		
		$City=M("City");
		import("ORG.Util.Page");// 导入分页类
		$count= $City->where($where)->count();// 查询满足要求的总记录数
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $City->where($where)->order('paixu')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);
		$this->display(); // 输出模板
	}
	
	public function cityadd()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$paixu=$_POST['paixu'];
			if(empty($name))$this->error("城市名称不能为空");
			if(empty($paixu))$this->error("请填写排序");
			$data['name']=$name;
			$data['paixu']=$paixu;
			$data['date_time']=date("Y-m-d");
			$City=M("City");
			$City->add($data);
			$this->success("添加成功",__URL__."/cityall");
		}
		$this->display(); // 输出模板
	}
	
	public function citydel()
	{
		$id=$_GET['id'];
		$City=M("City");
		$City->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	public function cityup()
	{
		if(IS_POST)
		{
			$name=$_POST['name'];
			$paixu=$_POST['paixu'];
			$id=$_POST['id'];
			if(empty($name))$this->error("城市名称不能为空");
			if(empty($paixu))$this->error("请填写排序");
			$data['name']=$name;
			$data['paixu']=$paixu;
			$data['date_time']=date("Y-m-d");
			$City=M("City");
			$City->where(array('id'=>$id))->save($data);
			$this->success("修改成功");
		}
		$id=$_GET['id'];
		$City=M("City");
		$list=$City->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->display();
	}
	
}
?>