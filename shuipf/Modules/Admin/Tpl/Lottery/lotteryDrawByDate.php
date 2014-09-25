<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <form  class="J_ajaxForm" action="{:U('Lottery/lotteryDrawByDate')}" method="post" id="myform">
        <input hidden="hidden" name="lotteryId" value="{$lotteryId}"/>
        <table class="table_form contentWrap">
            <tr>
                <th width="100">选择日期</th>
                <td>
                    <input type="text" name="drawDate" class="input J_date date" id="drawDate">
                </td>
            </tr>
        </table>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">抽奖</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>

</body>
</html>