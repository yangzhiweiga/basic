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


            var builderJson = {
                "all": 10887,
                "charts": {
                    "map": 3237,
                    "lines": 2164,
                    "bar": 7561,
                    "line": 7778,
                    "pie": 7355,
                    "scatter": 2405,
                    "candlestick": 1842,
                    "radar": 2090,
                    "heatmap": 1762,
                    "treemap": 1593,
                    "graph": 2060,
                    "boxplot": 1537,
                    "parallel": 1908,
                    "gauge": 2107,
                    "funnel": 1692,
                    "sankey": 1568
                },
                "ie": 9743
            };

            var downloadJson = {
                "echarts.min.js": 17365,
                "echarts.simple.min.js": 4079,
                "echarts.common.min.js": 6929,
                "echarts.js": 14890
            };

            
            var waterMarkText = 'ECHARTS';

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            canvas.width = canvas.height = 100;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.globalAlpha = 0.08;
            ctx.font = '20px Microsoft Yahei';
            ctx.translate(50, 50);
            ctx.rotate(-Math.PI / 4);
            ctx.fillText(waterMarkText, 0, 0);

            option = {
                backgroundColor: {
                    type: 'pattern',
                    image: canvas,
                    repeat: 'repeat'
                },
                tooltip: {},
                title: [{
                    text: '在线构建',
                    subtext: '总计 ' + builderJson.all,
                    x: '25%',
                    textAlign: 'center'
                }, {
                    text: '各版本下载',
                    subtext: '总计 ' + Object.keys(downloadJson).reduce(function (all, key) {
                        return all + downloadJson[key];
                    }, 0),
                    x: '75%',
                    textAlign: 'center'
                }],
                grid: [{
                    top: 50,
                    width: '50%',
                    bottom: '45%',
                    left: 10,
                    containLabel: true
                }],
                xAxis: [{
                    type: 'value',
                    max: builderJson.all,
                    splitLine: {
                        show: false
                    }
                }],
                yAxis: [{
                    type: 'category',
                    data: Object.keys(builderJson.charts),
                    axisLabel: {
                        interval: 0,
                        rotate: 30
                    },
                    splitLine: {
                        show: false
                    }
                }],
                series: [{
                    type: 'bar',
                    stack: 'chart',
                    z: 3,
                    label: {
                        normal: {
                            position: 'right',
                            show: true
                        }
                    },
                    data: Object.keys(builderJson.charts).map(function (key) {
                        return builderJson.charts[key];
                    })
                }, {
                    type: 'bar',
                    stack: 'chart',
                    silent: true,
                    itemStyle: {
                        normal: {
                            color: '#eee'
                        }
                    },
                    data: Object.keys(builderJson.charts).map(function (key) {
                        return builderJson.all - builderJson.charts[key];
                    })
                }, {
                    type: 'pie',
                    radius: [0, '30%'],
                    center: ['55%', '15%'],
                    data: Object.keys(downloadJson).map(function (key) {
                        return {
                            name: key.replace('.js', ''),
                            value: downloadJson[key]
                        }
                    })
                }]
            };

            // 为echarts对象加载数据
            myChart.setOption(option);
</script>
</body>
</html>