<?php

/**
 * 广告管理
 * 
 * */
class AdAction  extends AdminbaseAction{
	/**
	 * 添加
	 * */
	public function addAdvertg()
	{
		if(IS_POST)
		{
			$adname=$_POST['adname'];
			$adatl=$_POST['adatl'];
			$adwidth=$_POST['adwidth'];
			$adheight=$_POST['adheight'];
			$adnum=$_POST['adnum'];
			$id=$_POST['id'];
			if(empty($adname))$this->error("广告位名称不能为空");
			if(empty($adatl))$this->error("广告位描述不能为空");
			if(empty($adwidth))$this->error("广告位宽度不能为空");
			if(empty($adheight))$this->error("广告位高度不能为空");
			if(empty($adnum))$this->error("广告位数量不能为空");
			$data['adname']=$adname;
			$data['adatl']=$adatl;
			$data['adwidth']=$adwidth;
			$data['adheight']=$adheight;
			$data['adnum']=$adnum;
			$Advertg=M("Advertg");
			if($id){
				$Advertg->where(array('id'=>$id))->save($data);
				$this->success("更新成功",__URL__.'/advertg');
			}else {
				$Advertg->create($data);
				$Advertg->add($data);
				$this->success("添加成功",__URL__.'/advertg');
			}
		}
		$this->display(); // 输出模板
	}
	/**
	 * 广告列表
	 * */
	public function advertg()
	{
		$Advertg=M("Advertg");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Advertg->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Advertg->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	/**
	 * 更新广告位
	 * */
	public function upadvertg()
	{
		$id=$_GET['id'];
		$Advertg=M("Advertg");
		$list=$Advertg->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->assign("id",$id);
		$this->display('addAdvertg'); // 输出模板
		
	}
	
	/**
	 * 删除广告位
	 * */
	public function deladvertg()
	{
		$id=$_GET['id'];
		$Advertg=M("Advertg");
		$Advertisement=M("Advertisement");
		$Advertg->where(array('id'=>$id))->delete();
		$Advertisement->where(array('ad_id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	
	
	/**
	 * 广告列表
	 * */
	public function  advertisement()
	{
		$Advertisement=M("Advertisement");
		import("ORG.Util.Page");// 导入分页类
		$id=$_GET['id'];
		$where['ad_id']=$id;
		$count      = $Advertisement->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Advertisement->where($where)->order('paixu')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	/**
	 * 添加广告
	 * 
	 * */
	
	public function  add_advertisement()
	{
		if(IS_POST)
		{
			$paixu=$_POST['paixu'];
			$name=$_POST['name'];
			$adatl=$_POST['adatl'];
			$sta_date=$_POST['sta_date'];
			$end_date=$_POST['end_date'];
			$thumb=$_POST['thumb'];
			$ad_url=$_POST['ad_url'];
			$id=$_POST['id'];
			if(empty($name))$this->error("广告名称不能为空");
			if(empty($adatl))$this->error("广告描述不能为空");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($ad_url))$this->error("广告链接不能为空");
			$data['paixu']=$paixu;
			$data['name']=$name;
			$data['adatl']=$adatl;
			$data['sta_date']=$sta_date;
			$data['end_date']=$end_date;
			$data['ad_url']=$ad_url;
			$data['ad_img']=$thumb;
			$data['ad_id']=$id;
			$Advertisement=M("Advertisement");
			$Advertisement->create($data);
			$Advertisement->add($data);
			$this->success("添加成功",__URL__.'/advertisement/id/'.$id);
			
		}
		$id=$_GET['id'];
		$this->assign("id",$id);
		$this->display(); // 输出模板
	}
	
	/**
	 * 删除广告位
	 * */
	public function del_advertisement()
	{
		$id=$_GET['id'];
		$Advertisement=M("Advertisement");
		$Advertisement->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	
	/**
	 * 编辑广告位
	 * */
	public function up_advertisement()
	{
		if(IS_POST)
			{
			$paixu=$_POST['paixu'];
			$name=$_POST['name'];
			$adatl=$_POST['adatl'];
			$sta_date=$_POST['sta_date'];
			$end_date=$_POST['end_date'];
			$thumb=$_POST['thumb'];
			$ad_url=$_POST['ad_url'];
			$id=$_POST['id'];
			if(empty($name))$this->error("广告名称不能为空");
			if(empty($adatl))$this->error("广告描述不能为空");
			if(empty($thumb))$this->error("请上传图片");
			if(empty($ad_url))$this->error("广告链接不能为空");
			$data['paixu']=$paixu;
			$data['name']=$name;
			$data['adatl']=$adatl;
			$data['sta_date']=$sta_date;
			$data['end_date']=$end_date;
			$data['ad_url']=$ad_url;
			$data['ad_img']=$thumb;
			
			$Advertisement=M("Advertisement");
			$Advertisement->where(array('id'=>$id))->save($data);
			$this->success("修改成功");
		}
		$id=$_GET['id'];
		$Advertisement=M("Advertisement");
		$list=$Advertisement->where(array('id'=>$id))->find();
		$this->assign($list);
		$this->assign("id",$id);
		$this->display();
	}
}