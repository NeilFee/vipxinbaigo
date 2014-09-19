<?php

/**
 * 系统权限配置，用户角色管理
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class RbacAction extends AdminbaseAction {

    protected $User, $Role, $Access, $Role_user;

    protected function _initialize() {
        parent::_initialize();
        $this->Role = D("Role");
    }

    /**
     * 角色管理，有add添加，edit编辑，delete删除
     */
    public function rolemanage() {

        //判断是否是门店用户登录
        $singleMendian = false;
        $roleid = session("roleid");
        $mendian = 0;
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
        if($roleid != 1){
            $role_queue = array();
            $role_queue[] = $roleid;
            $role_list  = array();
            while (!empty($role_queue)) {
                $role = array_shift($role_queue);
                $where['pid'] = $role;
                $result = $this->Role->where($where)->select();
                foreach ($result as $key => $value) {
                    array_push($role_queue,$value['id']);
                    array_push($role_list,$value);
                }
            }
            $data = $this->Role->order(array("listorder" => "asc", "id" => "desc"))->select();
            $this->assign("data", $role_list);
        }else{
            $data = $this->Role->order(array("listorder" => "asc", "id" => "desc"))->select();
            $this->assign("data", $data);
        }
        $this->display();
    }

    /**
     * 添加角色
     */
    public function roleadd() {
        //判断是否是门店用户登录
        $singleMendian = false;
        $roleid = session("roleid");
        $where = array();
        $mendian = 0;
        if($roleid != 1){
            $Role = D("Role");
            $condition['id'] = $roleid;
            $thisRole = $Role->where($condition)->select();
            $newMendian = $thisRole[0]['mendian'];
            if($newMendian != 0){
                $mendian = $newMendian;
                $singleMendian = true;
                $where['id'] = $mendian;
            }
        }
        if (IS_POST) {
            if($singleMendian == true){
                $_POST['mendian'] = $mendian;
            }
            $_POST['create_user_id'] = session('UserID');
            $_POST['pid']            = session("roleid");
            if ($this->Role->create()) {
                if ($this->Role->add()) {
                    $this->assign("jumpUrl", U("Rbac/rolemanage"));
                    $this->success("添加角色成功！");
                } else {
                    $this->error("添加失败！");
                }
            } else {
                $this->error($this->Role->getError());
            }
        } else {
            $store=M("Store");
            $storelist=$store->where($where)->select();
            $this->assign("storelist",$storelist);
            $this->assign("single",$singleMendian);
            $this->assign("mendian",$mendian);
            $this->display();
        }
    }

    /**
     * 删除角色
     */
    public function roledelete() {
        $id = I('get.id', 0, 'intval');
        if ($id == 1) {
            $this->error("超级管理员角色不能被删除！");
        }
        $status = $this->Role->delete_role($id);
        if ($status) {
            $this->success("删除成功！", U('Rbac/rolemanage'));
        } else {
            $this->error("删除失败！");
        }
    }

    /**
     * 编辑角色
     */
    public function roleedit() {
        $id = I('request.id', 0, 'intval');
        if (empty($id)) {
            $this->error('请选择需要编辑的角色！');
        }
        if ($id == 1) {
            $this->error("超级管理员角色不能被修改！");
        }
        if (IS_POST) {
            $data = $this->Role->create();
            if ($data) {
                if ($this->Role->save($data)) {
                    $this->success("修改成功！", U('Rbac/rolemanage'));
                } else {
                    $this->error("修改失败！");
                }
            } else {
                $this->error($this->Role->getError());
            }
        } else {
            $data = $this->Role->where(array("id" => $id))->find();
            if (!$data) {
                $this->error("该角色不存在！");
            }
            $store=M("Store");
            $storelist=$store->select();
            $this->assign("storelist",$storelist);
            
            $this->assign("data", $data);
            $this->display();
        }
    }

    //角色授权
    public function authorize() {

        //判断是否是门店用户登录
        $singleMendian = false;
        $thisroleid = session("roleid");
        $mendian = 0;
        $Role = D("Role");
        if($thisroleid != 1){
            $condition['id'] = $thisroleid;
            $thisRole = $Role->where($condition)->select();
            $newMendian = $thisRole[0]['mendian'];
            if($newMendian != 0){
                $mendian = $newMendian;
                $singleMendian = true;
            }
        }
        $this->Access = D("Access");
        $this_role_priv = $this->Access->where(array("role_id" => $thisroleid))->field("role_id,g,m,a")->select();
        if (IS_POST) {
            $roleid = I('post.roleid', 0, 'intval');
            if (!$roleid) {
                $this->error("需要授权的角色不存在！");
            }
            //被选中的菜单项
            $menuidAll = explode(',', I('post.menuid', ''));
            if (is_array($menuidAll) && count($menuidAll) > 0) {
                //取得菜单数据
                $menuinfo = M("Menu")->select();
                foreach ($menuinfo as $_v) {
                    $menu_info[$_v["id"]] = $_v;
                }
                C('TOKEN_ON', false);
                $addauthorize = array();
                //检测数据合法性
                foreach ($menuidAll as $menuid) {
                    $info = array();
                    $info = $this->get_menuinfo((int) $menuid, $menu_info);
                    if ($info == false) {
                        continue;
                    }
                    if ($info['type'] == 0) {
                        $info['g'] = $info['g'];
                        $info['m'] = $info['m'] . $menuid;
                        $info['a'] = $info['a'] . $menuid;
                    }
                    $info['role_id'] = $roleid;
                    $info['status'] = $info['type'] ? 1 : 0;
                    $data = $this->Access->create($info);
                    if (!$data) {
                        $this->error($this->Access->getError());
                    } else {
                        $addauthorize[] = $data;
                    }
                }
                C('TOKEN_ON', true);
                if ($this->Access->rbac_authorize($roleid, $addauthorize)) {
                    $this->success("授权成功！", U("Rbac/rolemanage"));
                } else {
                    $this->error("授权失败！");
                }
            } else {
                //当没有数据时，清除当前角色授权
                $this->Access->where(array("role_id" => $roleid))->delete();
                $this->error("没有接收到数据，执行清除授权成功！");
            }
        } else {
            //角色ID
            $roleid = I('get.id', 0, 'intval');
            if (empty($roleid)) {
                $this->error("参数错误！");
            }

            $parent_roldid_result = $this->Role->where(array("id" =>$roleid ))->field("id,pid")->find();
            $parent_roldid = $parent_roldid_result['pid'];
            $parent_role_priv = $this->Access->where(array("role_id" => $parent_roldid))->field("role_id,g,m,a")->select();
            //菜单缓存
            $result = F("Menu");
            //获取已权限表数据
            $priv_data = $this->Access->where(array("role_id" => $roleid))->field("role_id,g,m,a")->select();

            $json = array();
            foreach ($result as $rs) {
                $data = array(
                    'id' => $rs['id'],
                    'checked' => $rs['id'],
                    'parentid' => $rs['parentid'],
                    'name' => $rs['name'] . ($rs['type'] == 0 ? "(菜单项)" : ""),
                    'checked' => ($this->is_checked($rs, $roleid, $priv_data)) ? true : false,
                    'chkDisabled' => ($this->is_checked($rs, $thisroleid, $this_role_priv) && $this->is_checked($rs, $parent_roldid, $parent_role_priv)) ? false : true,
                );
                $json[] = $data;
            }
            $this->assign('json', json_encode($json));
            $this->assign("roleid", $roleid);
            $this->display();
        }
    }

    /**
     * 设置栏目权限 
     */
    public function setting_cat_priv() {
        if (IS_POST) {
            $roleid = I('post.roleid', 0, 'intval');
            $priv = array();
            foreach ($_POST['priv'] as $k => $v) {
                foreach ($v as $e => $q) {
                    $priv[] = array("roleid" => $roleid, "catid" => $k, "action" => $q, "is_admin" => 1);
                }
            }
            C('TOKEN_ON', false);
            //循环验证每天数据是否都合法
            foreach ($priv as $r) {
                $data = D("Category_priv")->create($r);
                if (!$data) {
                    $this->error(D("Category_priv")->getError());
                } else {
                    $addpriv[] = $data;
                }
            }
            C('TOKEN_ON', true);
            //设置权限前，先删除原来旧的权限
            M("Category_priv")->where(array("roleid" => $roleid))->delete();
            //添加新的权限数据，使用D方法有操作记录产生
            D("Category_priv")->addAll($addpriv);
            $this->success("权限赋予成功！");
        } else {
            import('Tree');
            $roleid = I('get.roleid', 0, 'intval');
            $categorys = F("Category");
            $tree = new Tree();
            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $category_priv = M("Category_priv")->where(array("roleid" => $roleid))->select();
            $priv = array();
            foreach ($category_priv as $k => $v) {
                $priv[$v['catid']][$v['action']] = true;
            }

            foreach ($categorys as $k => $v) {
                if ($v['type'] == 1 || $v['child']) {
                    $v['disabled'] = 'disabled';
                    $v['init_check'] = '';
                    $v['add_check'] = '';
                    $v['delete_check'] = '';
                    $v['listorder_check'] = '';
                    $v['push_check'] = '';
                    $v['move_check'] = '';
                } else {
                    $v['disabled'] = '';
                    $v['add_check'] = isset($priv[$v['catid']]['add']) ? 'checked' : '';
                    $v['delete_check'] = isset($priv[$v['catid']]['delete']) ? 'checked' : '';
                    $v['listorder_check'] = isset($priv[$v['catid']]['listorder']) ? 'checked' : '';
                    $v['push_check'] = isset($priv[$v['catid']]['push']) ? 'checked' : '';
                    $v['move_check'] = isset($priv[$v['catid']]['remove']) ? 'checked' : '';
                    $v['edit_check'] = isset($priv[$v['catid']]['edit']) ? 'checked' : '';
                }
                $v['init_check'] = isset($priv[$v['catid']]['init']) ? 'checked' : '';
                $categorys[$k] = $v;
            }
            $str = "<tr>
	<td align='center'><input type='checkbox'  value='1' onclick='select_all(\$catid, this)' ></td>
	<td>\$spacer\$catname</td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$init_check  value='init' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$add_check value='add' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$edit_check value='edit' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$delete_check  value='delete' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$listorder_check value='listorder' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$push_check value='push' ></td>
	<td align='center'><input type='checkbox' name='priv[\$catid][]' \$disabled \$move_check value='remove' ></td>
            </tr>";
            $tree->init($categorys);
            $categorydata = $tree->get_tree(0, $str);
            $this->assign("categorys", $categorydata);
            $this->assign("roleid", $roleid);
            $this->display("categoryrbac");
        }
    }

    /**
     *  检查指定菜单是否有权限
     * @param array $data menu表中数组
     * @param int $roleid 需要检查的角色ID
     */
    protected function is_checked($data, $roleid, $priv_data) {
        $priv_arr = array('app', 'model', 'action');
        if ($data['app'] == '') {
            return false;
        }
        if($roleid == 1){
            return true;
        }
        $menuid = $data['id'];
        $type = $data['type'];
        foreach ($data as $key => $value) {
            if (!in_array($key, $priv_arr)) {
                unset($data[$key]);
            }
        }
        $data['role_id'] = $roleid;
        $data["g"] = $data['app'];
        if ($type == 0) {
            $data["m"] = $data['model'] . $menuid;
            $data["a"] = $data['action'] . $menuid;
        } else {
            $data["m"] = $data['model'];
            $data["a"] = $data['action'];
        }
        unset($data['app'], $data['model'], $data['action']);
        $info = in_array($data, $priv_data);
        if ($info) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function get_level($id, $array = array(), $i = 0) {
        foreach ($array as $n => $value) {
            if ($value['id'] == $id) {
                if ($value['parentid'] == '0')
                    return $i;
                $i++;
                return $this->get_level($value['parentid'], $array, $i);
            }
        }
    }

    /**
     * 获取菜单表信息
     * @param int $menuid 菜单ID
     * @param int $menu_info 菜单数据
     */
    protected function get_menuinfo($menuid, $menu_info) {
        $info = $menu_info[$menuid];
        if (!$info) {
            return false;
        }
        $return['g'] = $info['app'];
        $return['m'] = $info['model'];
        $return['a'] = $info['action'];
        $return['type'] = $info['type'];
        return $return;
    }

}
