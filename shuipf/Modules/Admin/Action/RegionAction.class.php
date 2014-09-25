<?php
/**
 * User: duan.juding
 * Date: 9/15/14
 * Time: 8:13 PM
 */

class RegionAction  extends AdminbaseAction {

    public function regionAll() {
        $where=array();
        $name=$_GET['name'];
        if(!empty($name))$where['name']=array('like','%'.$name.'%');

        $Region=M("Region");
        import("ORG.Util.Page");// 导入分页类
        $count= $Region->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show  = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Region->where($where)->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('name',$name);
        $this->display(); // 输出模板
    }

    public function regionAdd(){
        if(IS_POST)
        {
            $name=$_POST['name'];
            if(empty($name))$this->error("区域名称不能为空");
            $data['name']=$name;
            $data['createtime']=date("Y-m-d");
            $data['updatetime']=date("Y-m-d");
            $Region=M("Region");
            $Region->add($data);
            $this->success("添加成功",__URL__."/regionAll");
        }
        $this->display(); // 输出模板
    }

    public function regionUpdate(){
        if(IS_POST)
        {
            $name=$_POST['name'];
            $id=$_POST['id'];
            if(empty($name))$this->error("区域名称不能为空");
            $data['name']=$name;
            $data['updatetime']=date("Y-m-d");
            $Region=M("Region");
            $Region->where(array('id'=>$id))->save($data);
            $this->success("修改成功",__URL__."/regionAll");
        }
        $id=$_GET['id'];
        $Region=M("Region");
        $list=$Region->where(array('id'=>$id))->find();
        $this->assign($list);
        $this->display();
    }

    public function regionDelete(){
        $id=$_GET['id'];
        $region=M("region");
        $region->where(array('id'=>$id))->delete();
        $this->success("删除成功");
    }
}
?>