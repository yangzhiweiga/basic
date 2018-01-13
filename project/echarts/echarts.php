<?php
    $value=implode(',',array_slice(range(0,1000,6),0,10));
    $name=implode(',',array_slice(range('A','W'),0,10));
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
<div id="main" style="width:900px;height:400px"></div>
<!-- ECharts单文件引入 -->
<script src="echarts.js"></script>
<script type="text/javascript">
            var data=[{value:335, name:'直接访问'},{value:310, name:'邮件营销'}];
            var v="<?php echo $value?>";
            v=v.split(',');
            var n="<?=$name?>";
            n=n.split(',');
            data=[];
            for(var i=0;i<v.length;i++){
                var list=new Object();
                list.value=v[i];
                list.name=n[i];
                data[i]=list;
            }

            // 基于准备好的dom，初始化echarts图表
            var myChart = echarts.init(document.getElementById('main'));


            var option = {
                title : {
                    text: '全局指标状态分布图',
                    x:'left',
                    y:'top'
                },
                tooltip : {
                    show: true,
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                // color:['red', 'green','yellow','blueviolet'],
                legend: {
                    show:true,
                    orient: 'vertical',
                    left: 'right',
                    data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
                },
                series : [
                    {
                        name: '销售额',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:data,
                        itemStyle: {
                            normal:{
                                label:{
                                    show:true,
                                    formatter: '{b} : {c} \n ({d}%)'
                                },
                                labelLine:{
                                    show:true
                                }
                            },
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(10, 500, 10, 5)'
                            }
                        },
                    }
                ]
            };

            // 为echarts对象加载数据
            myChart.setOption(option);
</script>
</body>
</html>