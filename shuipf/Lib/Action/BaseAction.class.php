<?php

/**
 * 前台Action
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class BaseAction extends AppframeAction {

    public $TemplatePath, $Theme, $ThemeDefault;

    //初始化
    protected function _initialize() {
        //定义是前台
        define('IN_ADMIN', false);
        parent::_initialize();
        //前台关闭表单令牌
        C("TOKEN_ON", false);
        $this->initUser();
        $user=session("user");
        $this->assign('member_user',$user);
        //模块静态资源目录，例如CSS JS等
        $this->assign('model_extresdir', CONFIG_SITEURL_MODEL . MODEL_EXTRESDIR);
        
        
        import('ORG.Util.IpLocation');// 导入IpLocation类
        $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        $area = $Ip->getlocation(); // 获取某个IP地址所在的位置
		
        $country=$area['country'];//获取到的城市
        $where['name']=array('like',$country.'%');
        $citylist=M("City")->where($where)->find();
        $chengshiid= $_COOKIE['chengshi_id'];//获取cookie 城市
		
        if(empty($chengshiid) && empty($citylist))
        {
        	$this->assign("chengshikey",1);
        }else
        {
        	$this->assign("dingcountry",$citylist['name']);
        }
        if(empty($chengshiid))
        {
		    thinkcookie_cookie('chengshi_id',$citylist['id']);
        	$this->assign("country",$citylist['name']);
        }else
        {
		
        	$citylist=M("City")->where(array('id'=>$chengshiid))->find();
        	$this->assign("country",$citylist['name']);
        }
        
        
    }


}
