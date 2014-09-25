<?php
/**
 * User: duan.juding
 * Date: 9/16/14
 * Time: 12:05 AM
 */
class CtripCallBackAction extends BaseAction
{
    public function index() {

            $fullrequest=$_SERVER["QUERY_STRING"];
            $ouid=$_GET['ouid'];
            $orderstatus=$_GET['orderstatus'];
            $ordertype=$_GET['ordertype'];
            $price=$_GET['price'];

            if($ordertype=="H"){
                if(iconv("gb2312","utf-8",$orderstatus)=="已成交"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="F"){
                if($orderstatus=="S"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="PKG"){
                if($orderstatus=="S"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="G"){
                if($orderstatus=="16"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="T"){
                if($orderstatus=="Completed"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="T2"){
                if($orderstatus=="Completed"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }else if($ordertype=="T3"){
                if($orderstatus=="Completed"){
                    $data['vipcode']=$ouid;
                    $data['ordertype']=$ordertype;
                    $data['price']=$price;
                    $data['fullrequest']=$fullrequest;

                    $ctrip_order=M("ctrip_order");
                    $ctrip_order->add($data);
                }
            }



        }
}

?>