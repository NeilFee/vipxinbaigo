<?php
/**
 * Created by PhpStorm.
 * User: morris
 * Date: 14-9-14
 * Time: 下午2:05
 */

class LotteryAction extends BaseAction{
    public function joinLottery()
    {
        $user=session("user");
        if(empty($user)) {
            $this->error("请您登陆以后再参加活动");
        }

        $realName = I('post.realName');//$this->_post('realName');
        $storeId = I('post.storeId');
        $mobilePhone = I('post.mobilePhone');
        $lotteryId = I('post.lotteryId');
        $vipCode = $user['vipcode'];
        $Lottery = M('Lottery');
        $data = $Lottery->find($lotteryId);
        if ($data) {
            $lotteryBonus = 100;
            $userBonus = $user['currentbonus'];
            if ($userBonus < $lotteryBonus) {
                $this->error("积分不足");
            } else {
                @load("@.nwvipfun");
                $accountNo = $user['vipaccountno'];
                postnwvipbonusadjust2($vipCode, $accountNo, -$lotteryBonus);
                $vipGrade = $user['vipgrade'];
                $count = 1;
                if (strtolower($vipGrade) == "np") {
                    $count = 2;
                } else if (strtolower($vipGrade) == "nd") {
                    $count = 3;
                }
                for ($i = 0; $i < $count; $i++) {
                    $LotteryApplicant = D('LotteryApplicant');
                    $applicant['vip_code'] = $vipCode;
                    $applicant['store_id'] = $storeId;
                    $applicant['mobile_phone'] = $mobilePhone;
                    $applicant['lottery_id'] = $lotteryId;
                    $applicant['real_name'] = $realName;
                    $applicant['date'] = date('Y-m-d H:i:s', time());
                    $LotteryApplicant->add($applicant);
                }
            }
        } else {
            $this->error("您要抽奖的活动不存在");
        }
    }
} 