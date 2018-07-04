<script type="text/javascript">
document.writeln("<div id=\'lbd-action-top\' class=\'lbd-action-top\'>");
document.writeln("  <i class=\'mui-icon-extra mui-icon-extra-top\' onclick=\'goToTop()\'></i>");
document.writeln("</div>");
// 点击回到顶部
function goToTop()
{
  document.getElementById('lbd-action-top').style.display = 'none';
  mui.scrollTo(0,1000);
}
window.onscroll = function () {
  var t = document.documentElement.scrollTop || document.body.scrollTop;
  if (t > 500) {
    document.getElementById('lbd-action-top').style.zIndex = 999;
    document.getElementById('lbd-action-top').style.display = '';
  }
  else {
    document.getElementById('lbd-action-top').style.zIndex = -1;
    document.getElementById('lbd-action-top').style.display = 'none';
  }
}
</script>
