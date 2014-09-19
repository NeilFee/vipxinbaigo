<?php

/**
 * 内容审核
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class CheckAction extends AdminbaseAction {

    protected $User, $Role, $Access, $Role_user;

    protected $mendian, $role_id, $singleMendian, $isMendianAdmin;

    protected $sub_user_list;

    protected function _initialize() {
        parent::_initialize();
        $this->Role = D("Role");
        $this->Role_user = M("Role_user");
        $this->User = D("User");
        //判断是否是门店用户登录
        $singleMendian = false;
        $this->role_id = session("roleid");
        $this->mendian = 0;
        if($this->role_id != 1){
            $condition['id'] = $this->role_id;
            $thisRole = $this->Role->where($condition)->find();
            $newMendian = $thisRole['mendian'];
            if($newMendian != 0){
                $this->mendian = $newMendian;
                $this->singleMendian = true;
                $this->isMendianAdmin = $thisRole['pid'] == 1 ? true : false;
            }
        }

        if($this->isMendianAdmin == true){
            $this->sub_user_list = array();

            $role_queue = array();
            $role_queue[] = $this->role_id;
            $role_list  = array();
            while (!empty($role_queue)) {
                $role = array_shift($role_queue);
                $where['pid'] = $role;
                $result = $this->Role->where($where)->select();
                foreach ($result as $key => $value) {
                    array_push($role_queue,$value['id']);
                    array_push($role_list ,$value['id']);
                }
            }
            $user_list = $this->User->where(array('role_id' => array('IN',  $role_list)))->select();
            foreach ($user_list as $key => $value) {
                $this->sub_user_list[] = $value['id'];
            }
        }
    }

    /**
     * 资讯审核列表
     */
    public function daynewscheck() {

        $where = array();
        $Daynews=M("Daynews");
        if($this->role_id == 1){
            //超级管理员审核status == 10 的
            $where['status'] = 10;
        } elseif ($this->isMendianAdmin == true) {
            $where['create_user_id'] = array('IN',$this->sub_user_list);
            $where['status'] = 1;
        } else{
            $this->error("您没有权限审核");
        }

        $list = $Daynews->where($where)->select();

        $this->assign('list',$list);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign('storelist',$storelist);
        $this->display();
    }

    /**
     * 咨询审核编辑
     */
    public function daynewscheckshow() {
        $id = 0;
        if(IS_POST){
            $id = $_POST['id'];
        }else{
            $id = $_GET['id'];
        }
        //判断是否有权限
        if(empty($id)){
            $this->error("请重新选择");
        }

        $where = array();
        $where['id'] = $id;
        $Daynews=M("Daynews");
        if($this->role_id == 1){
        } elseif ($this->isMendianAdmin == true) {
            // $where['create_user_id'] = array('IN',$this->sub_user_list);
        } else{
            $this->error("您没有权限审核");
        }

        $data = $Daynews->where($where)->find();

        if(empty($data)){
            $this->error("该文章不存在");
        }

        if($this->role_id != 1 && !in_array($data['create_user_id'], $this->sub_user_list)){
            $this->error("您没有权限审核");
        }

        if(IS_POST){
            $update = array();
            $status = $_POST['status'];
            if($this->role_id == 1){
                if($status == '1'){
                    $update['status'] = 20;
                }else{
                    $update['status'] = 3;
                }
            }elseif($this->isMendianAdmin == true){
                if($status == '1'){
                    $update['status'] = 10;
                }else{
                    $update['status'] = 2;
                }
            }
            $update['reason'] = $_POST['reason'];
            $Daynews->where($where)->save($update);
            $this->success("提交成功",__URL__."/daynewscheck");
        }

        $this->assign($data);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign('storelist',$storelist);

        if(!empty($data['mendian'])){
            $mendiansub= substr($data['mendian'],0,strlen($data['mendian'])-1);
            $mendianarray=explode(',',$mendiansub);
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
        $citywhere['id'] = $data['chengshi'];
        $citylist=$city->where($citywhere)->select();
        $this->assign("citylist",$citylist);


        $this->display();
    }



    public function activitiescheck()
    {
        $where = array();
        $activities=M("Activities");
        if($this->role_id == 1){
            //超级管理员审核status == 10 的
            $where['status'] = 10;
        } elseif ($this->isMendianAdmin == true) {
            $where['create_user_id'] = array('IN',$this->sub_user_list);
            $where['status'] = 1;
        } else{
            $this->error("您没有权限审核");
        }

        $list = $activities->where($where)->select();

        $this->assign('list',$list);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign('storelist',$storelist);
        $this->display();
    }

    public function activitiescheckshow()
    {
        $id = 0;
        if(IS_POST){
            $id = $_POST['id'];
        }else{
            $id = $_GET['id'];
        }
        //判断是否有权限
        if(empty($id)){
            $this->error("请重新选择");
        }

        $where = array();
        $where['id'] = $id;
        $activities=M("Activities");
        if($this->role_id == 1){
        } elseif ($this->isMendianAdmin == true) {
            // $where['create_user_id'] = array('IN',$this->sub_user_list);
        } else{
            $this->error("您没有权限审核");
        }

        $data = $activities->where($where)->find();

        if(empty($data)){
            $this->error("该文章不存在");
        }

        if($this->role_id != 1 && !in_array($data['create_user_id'], $this->sub_user_list)){
            $this->error("您没有权限审核");
        }

        if(IS_POST){
            $update = array();
            $status = $_POST['status'];
            if($this->role_id == 1){
                if($status == '1'){
                    $update['status'] = 20;
                }else{
                    $update['status'] = 3;
                }
            }elseif($this->isMendianAdmin == true){
                if($status == '1'){
                    $update['status'] = 10;
                }else{
                    $update['status'] = 2;
                }
            }
            $update['reason'] = $_POST['reason'];
            $activities->where($where)->save($update);
            $this->success("提交成功",__URL__."/daynewscheck");
        }

        $this->assign($data);

        /**
         * 查询活动类型
         * */
        $activitiestypelist=M("Activitiestype")->select();
        $this->assign("activitiestypelist",$activitiestypelist);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign('storelist',$storelist);

        if(!empty($data['mendian'])){
            $mendiansub= substr($data['mendian'],0,strlen($data['mendian'])-1);
            $mendianarray=explode(',',$mendiansub);
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
        $citywhere['id'] = $data['chengshi'];
        $citylist=$city->where($citywhere)->select();
        $this->assign("citylist",$citylist);


        $this->display();
    }
}
