// JavaScript Document
function test1()
{s=document.getElementById("st").selectedIndex
 sa=document.getElementById("s").selectedIndex
 c1=document.getElementById("c")
 c2=document.getElementById("c1")
 t=document.getElementById("t").value
 p=document.getElementById("p").value
 
 if(s==0||sa==0)
	 {
		 alert("selection obligatoire dun saision et station")
		 return false
	 }
 else if(c1.checked==false&&c2.checked==false)
	 {alert("selection obligatoire dun anee")
	  return false
	 
	 }
 else if(t<=-5&&t>=50)
	 {alert("verifier le temperature")
	 return false
	 }
else if(p<0)
	{alert("verifier pluie")
	 return false
	
	}
 else{
	 return true
 }
	

}
function test2()
{sta=document.getElementById("st").selectedIndex
 d1=document.getElementById("d1")
 d2=document.getElementById("d2")
 if(sta==0)
	 {return false}
else if(d1.checked==false&&d2.checked==false)
	{return false}
 else{return true}
}