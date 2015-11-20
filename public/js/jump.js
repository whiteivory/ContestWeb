var secID=0;
var ptype=0;
function init(psecID,pptype){
	secID=psecID;
	ptype=pptype;
}
function jump(tmp){
	secID=tmp;
    window.location.href="/page?secID="+secID+"&ptype="+ptype;
}
function jump2(tmp){
	ptype=tmp.substring(1,2);
    window.location.href="/page?secID="+secID+"&ptype="+ptype;
}