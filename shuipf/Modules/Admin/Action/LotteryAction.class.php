<?php
/**
 * User: duan.juding
 * Date: 9/13/14
 * Time: 5:13 PM
 */

class LotteryAction  extends AdminbaseAction {

    private function updateWinnedApplicants($applicants, $rule) {
        $LotteryApplicant = M('LotteryApplicant');
        $LotteryWinedApplicant = M('LotteryWinedApplicant');
        foreach ($applicants as $updateApplicant) {
            $id = $updateApplicant['id'];
            $data['draw_result'] = 1;
            $data['winned_date'] = date('Y-m-d', time());
            $LotteryApplicant->where(array('id'=>$id))->save($data);
            $wined['applied_rule_id'] = $rule['id'];
            $wined['applicant_id'] = $id;
            $LotteryWinedApplicant->add($wined);
        }
    }

    private function conditionByRule($rule) {
        $scopeType = $rule['scope_type'];
        $lotteryId = $rule['lottery_id'];
        if ($scopeType == 1) {
            $storeId = $rule['store_id'];
            $condition['store_id'] = $storeId;
        } else if ($scopeType == 2) {
            $cityId = $rule['city_id'];
            $Store = M('Store');
            $condition['chengshi'] = $cityId;
            $where['store_id'] = $Store->where($condition)->field('id')->select();
            for ($i = 0; $i < count($where['store_id']); $i++) {
                $ids[$i] = $where['store_id'][$i]['id'];
            }
            $condition['store_id'] = array('in', implode(',', $ids));
        } else if ($scopeType == 4) {
            $regionId = $rule['region_id'];
            $City = M('City');
            $cond['region_id'] = $regionId;
            $where['city_id'] = $City->where($cond)->field('id')->select();
            for ($i = 0; $i < count($where['city_id']); $i++) {
                $cityIds[$i] = $where['city_id'][$i]['id'];
            }
            $Store = M('Store');
            $map['chengshi'] = array('in', implode(',', $cityIds));
            $where['store_id'] = $Store->where($map)->select();
            for ($i = 0; $i < count($where['store_id']); $i++) {
                $ids[$i] = $where['store_id'][$i]['id'];
            }
            $condition['store_id'] = array('in', implode(',', $ids));
        } else if ($scopeType == 8) {

        }
        $condition['lottery_id'] = $lotteryId;
        $condition['draw_result'] = 0;
        return $condition;
    }

    private function lotteryDrawByCondition($rule, $condition) {
        $LotteryApplicant = M('LotteryApplicant');
        $count = $rule['count'];
        $total = $LotteryApplicant->where($condition)->count();
        for ($i = 0; $i < $total; $i++) {
            $num[$i] = $i;
        }
        $randKeys = array_rand($num, $count);
        $retArray = array();
        if ($count == 1) {
            $applicants = $LotteryApplicant->where($condition)->limit($randKeys, 1)->select();
            $applicant = $applicants[0];
            $applicant['draw_result'] = 1;
            array_push($retArray, $applicant);
        } else {
            foreach ($randKeys as $offset) {
                $applicants = $LotteryApplicant->where($condition)->limit($offset, 1)->select();
                $applicant = $applicants[0];
                $applicant['draw_result'] = 1;
                array_push($retArray, $applicant);
            }
        }
        $this->updateWinnedApplicants($retArray, $rule);
        $Rule = M('LotteryRule');
        $updateRule['draw_status'] = 1;
        $Rule->where(array("id"=>$rule['id']))->save($updateRule);
        return $retArray;
    }

    private function lotteryDrawByStoreScope($lotteryId, $storeId, $count) {
        $LotteryApplicant = M('LotteryApplicant');
        $condition['store_id'] = $storeId;
        $condition['lottery_id'] = $lotteryId;
        $condition['draw_result'] = 0;
        $total = $LotteryApplicant->where($condition)->count();
        for ($i = 0; $i < $total; $i++) {
            $num[$i] = $i;
        }
        $randKeys = array_rand($num, $count);
        $retArray = array();
        foreach ($randKeys as $offset) {
            $applicants = $LotteryApplicant->where($condition)->limit($offset, 1)->select();
            $applicant = $applicants[0];
            $applicant['draw_result'] = 1;
            array_push($retArray, $applicant);
        }
        //$this->updateWinnedApplicants($retArray);
        return $retArray;
    }

    private function lotteryDrawByRegionScope($lotteryId, $regionId, $count) {
        $Store = M('Store');
        $condition['region_id'] = $regionId;
        $where['store_id'] = $Store->where($condition)->field('id')->select();
        for ($i = 0; $i < count($where['store_id']); $i++) {
            $ids[$i] = $where['store_id'][$i]['id'];
        }
        $LotteryApplicant = M('LotteryApplicant');
        $map['store_id'] = array('in', implode(',', $ids));
        $map['lottery_id'] = $lotteryId;
        $map['draw_result'] = 0;
        $total = $LotteryApplicant->where($map)->count();
        for ($i = 0; $i < $total; $i++) {
            $num[$i] = $i;
        }
        $randKeys = array_rand($num, $count);
        $retArray = array();
        foreach ($randKeys as $offset) {
            $applicants = $LotteryApplicant->where($map)->limit($offset, 1)->select();
            $applicant = $applicants[0];
            $applicant['draw_result'] = 1;
            array_push($retArray, $applicant);
        }
        //$this->updateWinnedApplicants($retArray);
        return $retArray;
    }

    private function lotteryDrawByCityScope($lotteryId, $cityId, $count) {
        $Store = M('Store');
        $condition['chengshi'] = $cityId;
        $where['store_id'] = $Store->where($condition)->field('id')->select();
        for ($i = 0; $i < count($where['store_id']); $i++) {
            $ids[$i] = $where['store_id'][$i]['id'];
        }
        $LotteryApplicant = M('LotteryApplicant');
        $map['store_id'] = array('in', implode(',', $ids));
        $map['lottery_id'] = $lotteryId;
        $map['draw_result'] = 0;
        $total = $LotteryApplicant->where($map)->count();
        for ($i = 0; $i < $total; $i++) {
            $num[$i] = $i;
        }
        $randKeys = array_rand($num, $count);
        $retArray = array();
        foreach ($randKeys as $offset) {
            $applicants = $LotteryApplicant->where($map)->limit($offset, 1)->select();
            $applicant = $applicants[0];
            $applicant['draw_result'] = 1;
            array_push($retArray, $applicant);
        }
        //$this->updateWinnedApplicants($retArray);
        return $retArray;
    }

    private function lotteryDrawByAll($lotteryId, $count) {
        $LotteryApplicant = M('LotteryApplicant');
        $condition['lottery_id'] = $lotteryId;
        $condition['draw_result'] = 0;
        $total = $LotteryApplicant->where($condition)->count();
        for ($i = 0; $i < $total; $i++) {
            $num[$i] = $i;
        }
        $randKeys = array_rand($num, $count);
        $retArray = array();
        foreach ($randKeys as $offset) {
            $applicants = $LotteryApplicant->where($condition)->limit($offset, 1)->select();
            $applicant = $applicants[0];
            $applicant['draw_result'] = 1;
            array_push($retArray, $applicant);
        }
        foreach ($retArray as $updateApplicant) {
            $id = $updateApplicant['id'];
            $data['draw_result'] = 1;
            $LotteryApplicant->where(array('id'=>$id))->save($data);
        }
        return $retArray;
    }

    public function lotteryDrawResult() {
        $ruleId = I('get.id');
        $LotteryWinedApplicant = M('LotteryWinedApplicant');
        $where['applied_rule_id'] = $ruleId;
        $where['applicant'] = $LotteryWinedApplicant->where($where)->select();
        for ($i = 0; $i < count($where['applicant']); $i++) {
            $ids[$i] = $where['applicant'][$i]['applicant_id'];
        }
        $LotteryApplicant = D("LotteryApplicant");
        import("ORG.Util.Page");
        $map['id'] = array('in', implode(',', $ids));
        $total = $LotteryApplicant->where($map)->count();
        $Page = new Page($total, 20);
        $show = $Page->show();
        $list = $LotteryApplicant->relation(true)->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list', $list);
        $this->display();
    }

    public function lotteryDrawAllResult() {
        $lotteryId = I('get.id');
        $LotteryRule = M('LotteryRule');
        $where['lottery_id'] = $lotteryId;
        $rules = $LotteryRule->where($where)->select();
        for ($i = 0; $i < count($rules); $i++) {
            $ruleIds[$i] = $rules[$i]['id'];
        }
        $map['applied_rule_id'] = array('in', implode(',', $ruleIds));
        $LotteryWinedApplicant = M('LotteryWinedApplicant');
        $winedApplicants = $LotteryWinedApplicant->where($map)->select();
        for ($i = 0; $i < count($winedApplicants); $i++) {
            $winedApplicantIds[$i] = $winedApplicants[$i]['applicant_id'];
        }
        $LotteryApplicant = D('LotteryApplicant');
        $where['id'] = array('in', implode(',', $winedApplicantIds));
        $total = $LotteryApplicant->where($where)->count();
        $Page = new Page($total, 20);
        $show = $Page->show();
        $list = $LotteryApplicant->relation(true)->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->assign('id', $lotteryId);
        $this->display();
    }

    public function lotteryDrawByRule() {
        if (IS_POST) {
            $ruleId = I('post.ruleId');
            $Rule = M('LotteryRule');
            $rule = $Rule->where(array("id"=>$ruleId))->find();
            $condition = $this->conditionByRule($rule);
            $this->lotteryDrawByCondition($rule, $condition);
            $this->success("抽奖成功", U("Lottery/lotteryDrawResult", array('id'=>$rule['id'])));
        }
        $id = I('get.id');
        $Lottery_Rule = D("LotteryRule")->relation(true);
        import("ORG.Util.Page");
        $count = $Lottery_Rule->count();
        $Page = new Page($count,20);
        $show = $Page->show();
        $list = $Lottery_Rule->relation(true)->where(array('lottery_id'=>$id))->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('id',$id);
        $this->display();
    }



    public function lotteryDrawExcelResult() {

        import("Util.PHPExcel");
        import("Util.PHPExcel.Writer.Excel5");
        import("Util.PHPExcel.IOFactory.php");

        $filename = "testPHPExcel";
        $lotteryId = I('get.id');
        $Lottery = M('Lottery');
        $lottery = $Lottery->where(array("id"=>$lotteryId))->field('name')->find();
        $filename = $lottery['name'] . '_抽奖结果';
        $LotteryRule = M('LotteryRule');
        $where['lottery_id'] = $lotteryId;
        $rules = $LotteryRule->where($where)->select();
        for ($i = 0; $i < count($rules); $i++) {
            $ruleIds[$i] = $rules[$i]['id'];
        }
        $map['applied_rule_id'] = array('in', implode(',', $ruleIds));
        $LotteryWinedApplicant = M('LotteryWinedApplicant');
        $winedApplicants = $LotteryWinedApplicant->where($map)->select();
        for ($i = 0; $i < count($winedApplicants); $i++) {
            $winedApplicantIds[$i] = $winedApplicants[$i]['applicant_id'];
        }
        $LotteryApplicant = D('LotteryApplicant');
        $where['id'] = array('in', implode(',', $winedApplicantIds));
        $exportList = $LotteryApplicant->where($where)->field('id, date, vip_code, real_name, mobile_phone, store_id')->select();
        $Store = M('Store');
        for ($i = 0; $i < count($exportList); $i++) {
            $storeId = $exportList[$i]['store_id'];
            $storeName = $Store->where(array("id"=>$storeId))->field("name")->find();
            $exportList[$i]['store_id'] = $storeName['name'];
            $applicantId = $exportList[$i]['id'];
            $ruleId = $LotteryWinedApplicant->where(array("applicant_id"=>$applicantId))->field("applied_rule_id")->find();
            $winedDate = $LotteryRule->where(array("id"=>$ruleId['applied_rule_id']))->field("date")->find();
            $exportList[$i]['wined_date'] = $winedDate['date'];
        }
        $data = $exportList;
        $headArr = array("报名id","报名时间", "VIP卡号", "姓名", "手机号", "门店", "中奖时间");
        $this->getExcel($filename, $headArr, $data);
    }

    private	function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

    public function lotteryDraw() {
        if (IS_POST) {
            $lotteryId = I('post.lotteryId');
            $Lottery = M('Lottery');
            $data = $Lottery->find($lotteryId);
            if ($data) {
                $this->success('', U("Lottery/lotteryDrawByRule",array("id"=>$lotteryId)));
            } else {
                $this->error("该抽奖活动不存在");
            }
        }
        $lotteryId = I('get.id');
        $Lottery=M("Lottery");
        $list=$Lottery->where(array('id'=>$lotteryId))->find();
        $this->assign($list);
        $this->assign('lotteryId', $lotteryId);
        $this->display();
    }

    public function lotteryAll(){
        $where=array();
        $name=$_GET['name'];
        if(!empty($name))$where['name']=array('like','%'.$name.'%');

        $Lottery=M("Lottery");
        import("ORG.Util.Page");// 导入分页类
        $count= $Lottery->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show  = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Lottery->where($where)->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('name',$name);
        $this->display(); // 输出模板
    }

    public function lotteryAdd(){
        if(IS_POST)
        {
            $name=$_POST['name'];
            $starttime=$_POST['starttime'];
            $endtime=$_POST['endtime'];
            $description=$_POST['description'];
            if(empty($name))$this->error("活动名称不能为空");
            if(empty($starttime))$this->error("起始日期不能为空");
            if(empty($endtime))$this->error("截止日期不能为空");
            $data['name']=$name;
            $data['starttime']=$starttime;
            $data['endtime']=$endtime;
            $data['description']=$description;
            $data['status']=0;
            $data['createtime']=date("Y-m-d");
            $data['updatetime']=date("Y-m-d");
            $Lottery=M("Lottery");
            $Lottery->add($data);
            $this->success("添加成功",__URL__."/lotteryAll");
        }
        $this->display(); // 输出模板
    }

    public function lotteryUpdate(){
        if(IS_POST)
        {
            $name=$_POST['name'];
            $starttime=$_POST['starttime'];
            $endtime=$_POST['endtime'];
            $description=$_POST['description'];
            $status=$_POST['status'];
            $id=$_POST['id'];
            if(empty($name))$this->error("活动名称不能为空");
            if(empty($starttime))$this->error("起始日期不能为空");
            if(empty($endtime))$this->error("截止日期不能为空");
            $data['name']=$name;
            $data['starttime']=$starttime;
            $data['endtime']=$endtime;
            $data['description']=$description;
            $data['status']=$status;
            $data['updatetime']=date("Y-m-d");
            $Lottery=M("Lottery");
            $Lottery->where(array('id'=>$id))->save($data);
            $this->success("修改成功",__URL__."/lotteryAll");
        }
        $id=$_GET['id'];
        $Lottery=M("Lottery");
        $list=$Lottery->where(array('id'=>$id))->find();
        $this->assign($list);
        $this->display();
    }

    public function lotteryDelete(){
        $id=$_GET['id'];
        $Lottery=M("Lottery");
        $Lottery->where(array('id'=>$id))->delete();
        $this->success("删除成功");
    }

    public function lotteryRuleAll(){
        $id=$_GET['id'];
        $Lottery_Rule=D("LotteryRule")->relation(true);
        //var_dump($Lottery_Rule);die;
        import("ORG.Util.Page");// 导入分页类
        $count= $Lottery_Rule->count();// 查询满足要求的总记录数
        $Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show  = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Lottery_Rule->where('lottery_id='.$id)->relation(true)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        //var_dump($list);die;
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('id',$id);
        $this->display(); // 输出模板
    }

    public function lotteryRuleAdd(){
        if(IS_POST)
        {
            $id=$_POST['id'];
            $count=$_POST['count'];
            $date=$_POST['date'];
            $type=$_POST['type'];
            $store=$_POST['store'];
            $city=$_POST['city'];
            $region=$_POST['region'];
            if(empty($count))$this->error("数量不能为空");
            if(empty($date))$this->error("日期不能为空");
            if(empty($type))$this->error("类型不能为空");
            switch($type){
                case 1: if(empty($store))$this->error("店面不能为空"); break;
                case 2: if(empty($city))$this->error("城市不能为空"); break;
                case 4: if(empty($region))$this->error("区域不能为空"); break;
                default;
            }
            $data['count']=$count;
            $data['date']=$date;
            $data['lottery_id']=$id;
            $data['scope_type']=$type;
            $data['store_id']=$store;
            $data['city_id']=$city;
            $data['region_id']=$region;
            $data['createtime']=date("Y-m-d");
            $data['updatetime']=date("Y-m-d");
            $Lottery_Rule=M("lottery_rule");
            $Lottery_Rule->add($data);
            $this->success("添加成功",U("Lottery/lotteryRuleAll",array("id"=>$id)));
        }

        /**
         * 查询城市
         * */
        $city=M("City");
        $citylist=$city->select();
        $this->assign("citylist",$citylist);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign("storelist",$storelist);

        /**
         * 查询区域
         * */
        $region=M("Region");
        $regionlist=$region->select();
        $this->assign("regionlist",$regionlist);

        $id=$_GET['id'];
        $this->assign('id',$id);
        $this->display(); // 输出模板
    }

    public function lotteryRuleUpdate(){
        if(IS_POST)
        {
            $type=$_POST['type'];
            $store=$_POST['store'];
            $city=$_POST['city'];
            $region=$_POST['region'];
            $count=$_POST['count'];
            $date=$_POST['date'];
            $id=$_POST['id'];
            $ruleid=$_POST['ruleid'];
            if(empty($count))$this->error("数量不能为空");
            if(empty($date))$this->error("日期不能为空");
            if(empty($type))$this->error("类型不能为空");
            switch($type){
                case 1: if(empty($store))$this->error("店面不能为空"); break;
                case 2: if(empty($city))$this->error("城市不能为空"); break;
                case 4: if(empty($region))$this->error("区域不能为空"); break;
                default;
            }
            $data['count']=$count;
            $data['date']=$date;
            $data['scope_type']=$type;
            $data['store_id']=$store;
            $data['city_id']=$city;
            $data['region_id']=$region;
            $data['updatetime']=date("Y-m-d");
            $Lottery_Rule=M("lottery_rule");
            $Lottery_Rule->where(array('id'=>$ruleid))->save($data);
            //var_dump($id);die;
            $this->success("修改成功",U("Lottery/lotteryRuleAll",array("id"=>$id)));
        }

        /**
         * 查询城市
         * */
        $city=M("City");
        $citylist=$city->select();
        $this->assign("citylist",$citylist);

        /**
         * 查询门店
         * */
        $store=M("Store");
        $storelist=$store->select();
        $this->assign("storelist",$storelist);

        /**
         * 查询区域
         * */
        $region=M("Region");
        $regionlist=$region->select();
        $this->assign("regionlist",$regionlist);

        $ruleid=$_GET['ruleid'];
        $id=$_GET['id'];
        $Lottery_Rule=M("lottery_rule");
        $rule=$Lottery_Rule->where(array('id'=>$ruleid))->find();
        //var_dump($rule);die;
        $this->assign('rule',$rule);
        $this->assign('id',$id);
        $this->display();
    }

    public function lotteryRuleDelete(){
        $id=$_GET['id'];
        $LotteryRule=M("lottery_rule");
        $LotteryRule->where(array('id'=>$id))->delete();
        $this->success("删除成功");
    }

}

?>