<?php

/**
 * 反馈意见Action
 * */
class FeedbackAction extends AdminbaseAction{
   /**
    * 查询用户反馈
    * */
	public function feedback()
	{
		$Feedback=M("Feedback");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Feedback->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Feedback->order('data_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	/**
	 * 招商统合作
	 * */
	public function merchants()
	{
		$Merchants=M("Merchants");
		import("ORG.Util.Page");// 导入分页类
		$count      = $Merchants->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Merchants->order('do_date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	/**
	 * 删除反馈
	 * */
	public function del_feedback()
	{
		$id=$_GET['id'];
		$Feedback=M("Feedback");
		$Feedback->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
	/**
	 * 删除招商
	 * */
	public function del_merchants()
	{
		$id=$_GET['id'];
		$Merchants=M("Merchants");
		$Merchants->where(array('id'=>$id))->delete();
		$this->success("删除成功");
	}
}
?>