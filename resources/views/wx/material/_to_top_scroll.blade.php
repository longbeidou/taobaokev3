// 回到顶部
document.writeln("<div id=\'lbd-action-top\' class=\'lbd-action-top\'>");
document.writeln("  <i class=\'mui-icon-extra mui-icon-extra-top\' onclick=\'goToTop()\'></i>");
document.writeln("</div>");
// // 点击回到顶部
function goToTop()
{
  document.getElementById('lbd-action-top').style.display = 'none';
  mui('.lbd-content-box').scroll().scrollTo(0, 0, 1000);
}
window.onscroll = function () {
  y = mui('.lbd-content-box').scroll().y;
  if (y < -500) {
    document.getElementById('lbd-action-top').style.zIndex = 999;
    document.getElementById('lbd-action-top').style.display = '';
  }
  else {
    document.getElementById('lbd-action-top').style.zIndex = -1;
    document.getElementById('lbd-action-top').style.display = 'none';
  }
}
