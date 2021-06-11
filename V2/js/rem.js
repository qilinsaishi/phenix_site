//rem计算
// onload = function() {
//     setHTML();
//     onresize = function() {
//       setHTML();
//     }
  
//     function setHTML() {
//       var baseVal = 100; //设置基础值
//       var pageWidthWap = 640; //设计稿大小
//       var pageWidthPc = 1920;
//       var screenWidth = document.querySelector('html').offsetWidth; //获取屏幕宽度
//       if(screenWidth > 640) {
//         var fontSize = screenWidth * baseVal /pageWidthPc;
//       } else {
//         var fontSize = screenWidth * baseVal / pageWidthWap; //字号计算 = 屏幕大小*基础值/设计稿大小
//       }
//       document.querySelector('html').style.fontSize = fontSize + 'px'; //设置根元素的值
//     }
	
// 	document.getElementById('gototop').onclick = function(){
// 	   document.body.scrollTop = document.documentElement.scrollTop = 0;
// 	}
  
//  }

 setHTML()
 function setHTML() {
  var baseVal = 100; //设置基础值
  var pageWidthWap = 750; //设计稿大小
  var pageWidthPc = 1920;
  var screenWidth = document.querySelector('html').offsetWidth; //获取屏幕宽度
  if(screenWidth > 750) {
    var fontSize = screenWidth * baseVal /pageWidthPc;
  } else {
    var fontSize = screenWidth * baseVal / pageWidthWap; //字号计算 = 屏幕大小*基础值/设计稿大小
  }
  document.querySelector('html').style.fontSize = fontSize + 'px'; //设置根元素的值
}
 
 