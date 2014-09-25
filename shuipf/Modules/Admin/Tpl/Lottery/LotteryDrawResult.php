<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="table_list">
        <table width="100%" cellspacing="0" >
            <thead>
            <tr>
                <td width="30"  align='center'>报名id</td>
                <td width="100" align='center'>报名时间</td>
                <td width="100" align='center'>VIP卡号</td>
                <td width="60"  align='center'>姓名</td>
                <td width="60"  align='center'>手机号</td>
                <td width="60"  align='center'>门店</td>
            </tr>
            </thead>
            <tbody>
            <volist name="list" id="r">
                <tr>
                    <td align='center'>{$r.id}</td>
                    <td align='center'>{$r.date}</td>
                    <td align='center'>{$r.vip_code}</td>
                    <td align='center'>{$r.real_name}</td>
                    <td align='center'>{$r.mobile_phone}</td>
                    <td align='center'>{$r.store_id.name}</td>
                </tr>
            </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$page} </div>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>