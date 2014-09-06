


function loopLocUpdate(){
	locUpdate();
	setTimeout(loopLocUpdate,30000);
}

function getPos(position)
{
	
	lat=position.coords.latitude;
	longi=position.coords.longitude;
	console.log("Location:", lat,longi);
	var data={"no" : "9900591630", "lat" : lat,"long":longi,"securityToken":"","req":"updateLocation"};
	send(data,"/Emma/process.php",function(s){ document.getElementById("debug").innerHTML = s;});
	//return posi;
}

function recvProcess(s)
{
	var ob = document.getElementById('helpHolder');
	var data = JSON.parse(s);
	var str =""
	for(var i in data)
	{
		if(data[i]['name'])
		str += '<li><a href="#"><span style = "font-size : 20px">'+ data[i]['name'] +'</span> : ' +data[i]['data']+'</a></li>'; 
		console.log(i);
	}
	ob.innerHTML = str;
}

function helpRecv()
{
	console.log("recvr started")
	var data={"no" : "990059163", "securityToken":""};
	send(data,"/Emma/push.php",recvProcess);
	setTimeout(helpRecv,30000);
	
}
function locUpdate(){
	
	navigator.geolocation.getCurrentPosition(getPos);
	

}

function askHelp(prio, text)
{
	var data={"no" : "990059163","prio":prio, "lat" : "90.00","long":"91.00","securityToken":"","req":"askHelp"}
	send(data,"/Emma/process.php",function(s){ document.getElementById("debug").innerHTML = s;});

}

function send(data, address, handler)
{
	var xhr=new XMLHttpRequest();
	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4&&xhr.status==200)
		{
			//console.log(xhr.responseText);
			handler(xhr.responseText);
		}
	};
	xhr.open("POST",address,true);
	//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.setRequestHeader("Content-Type","application/json");
	var str=JSON.stringify(data);
	console.log(str);
	xhr.send(str);
}

function init()
{
		console.log("hi");
		lat = 0;
		longi = 0;
		loopLocUpdate();
		helpRecv();
}

