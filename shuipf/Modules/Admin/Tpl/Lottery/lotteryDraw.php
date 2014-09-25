<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<Admintemplate file="Common/Nav"/>
<div class="wrap J_check_wrap">
    <form class="J_ajaxForm" id="myform">
        <div class="table_full">
            <table class="table_form contentWrap">
                <tbody>
                <tr>
                    <th width="100">活动id</th>
                    <td width="200">{$lotteryId}</td>
                </tr>
                <tr>
                    <th width="100">活动名称</th>
                    <td width="200">{$name}</td>
                </tr>
                <tr>
                    <th width="100">起始日期</th>
                    <td width="200">{$starttime}</td>
                </tr>

                <tr>
                    <th width="100">截止日期</th>
                    <td width="200">{$endtime}</td>
                </tr>
                <tr>
                    <th width="100">活动描述</th>
                    <td width="400">{$description}</td>
                </tr>

                <tr>
                    <th width="100">发布状态</th>
                    <td>
                        <label>
                            <if condition="$status eq 1">
                                已发布
                            </if>
                            <if condition="$status eq 0">
                                未发布
                            </if>
                        </label>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <if condition="$status eq 1">
            <div class="">
                <input hidden="hidden" name="lotteryId" value="{$lotteryId}">
                <div class="btn_wrap_pd">
                    <a type="button" class="btn btn_submit mr10 J_ajax_submit_btn" href="{:U('Lottery/lotteryDrawByRule',array('id'=>$lotteryId))}">抽奖</a>
                </div>
            </div>
        </if>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>