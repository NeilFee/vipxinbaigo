<?php
class HelpAction extends  BaseAction{
	
	/**
	 * 关于新世界
	 * */
	public function about()
	{
		$this->display();
	}
	/**
	 * 联系我们
	 * */
	public function contact()
	{
		if(IS_POST)
		{
			$title=$_POST['title'];
			$store=$_POST['store'];
			$content=$_POST['content'];
			$contacts=$_POST['contacts'];
			$phone=$_POST['phone'];
			if(empty($title))$this->error("请填写信息标题");
			if(empty($store))$this->error("请填写反馈门店");
			if(empty($content))$this->error("请填写信息内容");
			if(empty($contacts))$this->error("请填写联系人");
			if(empty($phone))$this->error("请填写联系电话");
			$data['title']=$title;
			$data['store']=$store;
			$data['content']=$content;
			$data['contacts']=$contacts;
			$data['phone']=$phone;
			$data['data_time']=date("Y-m-d");
			M("Feedback")->add($data);
			$this->success("反馈成功，谢谢您的参与");exit;
		}
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		/**
		 * 反馈类型
		 * */
		$fankuitypelist=M("Fankuitype")->select();
		$this->assign("fankuitypelist",$fankuitypelist);
		$this->display();
	}
	/**
	 * 帮助中心
	 * */
	public function problem()
	{
		$this->display();
	}
	/**
	 * 合作机会
	 * */
	public function helpop()
	{
		if(IS_POST)
		{
			$title=$_POST['title'];
			$contacts=$_POST['contacts'];
			$zhiwei=$_POST['zhiwei'];
			$phone=$_POST['phone'];
			$mail=$_POST['mail'];
			$store=$_POST['store'];
			$content=$_POST['content'];
			if(empty($title))$this->error("请填写公司名称");
			if(empty($contacts))$this->error("请填写联系人");
			if(empty($zhiwei))$this->error("请填职位名称");
			if(empty($phone))$this->error("请填写电话");
			if(empty($mail))$this->error("请填写邮箱");
			
			if (!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+",$mail))$this->error("邮箱格式错误");
				
			if(empty($store))$this->error("请填写合作门店");
			if(empty($content))$this->error("请填写合作计划");
			$data['title']=$title;
			$data['store']=$store;
			$data['content']=$content;
			$data['contacts']=$contacts;
			$data['phone']=$phone;
			$data['zhiwei']=$zhiwei;
			$data['mail']=$mail;
			$data['do_date']=date("Y-m-d");
			M("Merchants")->add($data);
			$this->success("提交成功，谢谢您的参与");exit;
		}
		/**
		 * 查询门店
		 * */
		$store=M("Store");
		$storelist=$store->select();
		$this->assign("storelist",$storelist);
		
		$this->display();
	}
	/**
	 * 网站地图
	 * */
	public function map()
	{
		$this->display();
	}
	
}
