/**
 * Created by Administrator on 2018/1/17.
 */
new Vue({
    el: '.app',
    data:{
        class1: false
    },
    methods:{
        fn:function(e){
            console.log(e.target.text);
        }
    }
});