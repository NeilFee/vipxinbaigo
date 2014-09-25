<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="table_list">
        <table width="100%" cellspacing="0" >
            <thead>
            <tr>
                <td width="30"  align='center'>序号</td>
                <td width="50"  align='center'>类型</td>
                <td width="100"  align='center'>门店</td>
                <td width="60"  align='center'>城市</td>
                <td width="60"  align='center'>区域</td>
                <td width="60"  align='center'>日期</td>
                <td width="60"  align='center'>数量</td>
                <td width="60"  align='center'>状态</td>
                <td width="100"  align='center'>管理操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="list" id="r">
                <tr>
                    <td align='center'>{$r.id}</td>
                    <switch name="r.scope_type" >
                        <case value="1"><td align='center'>门店</td></case>
                        <case value="2"><td align='center'>城市</td></case>
                        <case value="4"><td align='center'>区域</td></case>
                        <case value="8"><td align='center'>全部</td></case>
                        <default /><td align='center'>错误</td>
                    </switch>
                    <if condition="$r.store_id eq NULL"><td align='center'>N/A</td><else/><td align='center'>{$r.store_id.name}</td></if>
                    <if condition="$r.city_id eq NULL"><td align='center'>N/A</td><else/><td align='center'>{$r.city_id.name}</td></if>
                    <if condition="$r.region_id eq NULL"><td align='center'>N/A</td><else/> <td align='center'>{$r.region_id.name}</td></if>
                    <td align='center'>{$r.date}</td>
                    <td align='center'>{$r.count}</td>
                    <td align='center'>
                        <if condition="$r.draw_status eq 0">
                            未出奖
                        </if>
                        <if condition="$r.draw_status eq 1">
                            已出奖
                        </if>
                    </td>
                    <td align='center' >
                        <if condition="$r.draw_status eq 0">
                            <form class="J_ajaxForm" action="{:U('Lottery/lotteryDrawByRule')}" method="post">
                                <input type="text" hidden="hidden" name="ruleId" value="{$r.id}"/>
                                <button class="btn btn_submit mr10 J_ajax_submit_btn">抽奖</button>
                            </form>

                        </if>
                        <if condition="$r.draw_status eq 1">
                            <a class="btn btn_submit mr10 J_ajax_submit_btn" href="{:U('Lottery/lotteryDrawResult', array('id'=>$r['id']))}">查看结果</a>
                        </if>
                    </td>
                </tr>
            </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$page} </div>
        </div>
        <a class="btn btn_submit mr10 J_ajax_submit_btn" href="{:U('Lottery/lotteryDrawAllResult', array('id'=>$id))}">查看所有抽奖结果</a>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>