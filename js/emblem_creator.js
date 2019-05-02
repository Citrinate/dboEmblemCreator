setuprdy = 0;
logo = 0;
border = 0;
colorlogo = [0,0,0];
colorbord = [0,0,0];
colorback = [0,0,0];

function updatelink()
{
	$newurl = "emblem.png" +
        "?logo=" + logo +
	    "&border=" + border +
	    "&lr=" + colorlogo[0] +
	    "&lg=" + colorlogo[1] +
	    "&lb=" + colorlogo[2] +
	    "&rr=" + colorbord[0] +
	    "&rg=" + colorbord[1] +
	    "&rb=" + colorbord[2] +
	    "&br=" + colorback[0] +
	    "&bg=" + colorback[1] +
	    "&bb=" + colorback[2];
			  
	document.getElementById("emblemlink").href = $newurl;
}

function setcolor(red,green,blue,imgid)
{
	img = document.getElementById(imgid);
	reset(img);
	
	newred = (1 - (red/255)) * (-1);
	newgreen = (1 - (green/255)) * (-1);
	newblue = (1 - (blue/255)) * (-1);
	
	img = document.getElementById(imgid);
	Pixastic.process(img, "coloradjust", {red: newred,green: newgreen,blue: newblue});
	
	if(imgid == "logo") { colorlogo[0] = red; colorlogo[1] = green; colorlogo[2] = blue; }
	else if(imgid == "border") { colorbord[0] = red; colorbord[1] = green; colorbord[2] = blue; }
	else if(imgid == "background") { colorback[0] = red; colorback[1] = green; colorback[2] = blue; }
	
	updatelink();
}
	
function reset(img)
{
	Pixastic.revert(img);
}

function setlogo(newlogo)
{
	logo = newlogo;
	img = document.getElementById("logo");
	reset(img);
	
	img = document.getElementById("logo");
	img.src = "img/emblems_big/" + newlogo + ".png";
	
	setcolor(colorlogo[0],colorlogo[1],colorlogo[2],'logo');	
}

function setborder(newborder)
{
	border = newborder;
	img = document.getElementById("border");
	reset(img);
	
	img = document.getElementById("border");
	img.src = "img/emblems_big/" + newborder + ".png";
	
	setcolor(colorbord[0],colorbord[1],colorbord[2],'border');
	
	setback(newborder + 100);
}

function setback(newback)
{
	img = document.getElementById("background");
	reset(img);
	
	img = document.getElementById("background");
	img.src = "img/emblems_big/" + newback + ".png";
	
	setcolor(colorback[0],colorback[1],colorback[2],'background');
}

function randomize(force)
{
    force = typeof force == "undefined" ? false : true;

    if(force || setuprdy == 1)
    {
        setuprdy = 0;

        randomnumlogo = Math.floor(Math.random()*32)
        setcolor(colors[randomnumlogo][0],colors[randomnumlogo][1],colors[randomnumlogo][2],'logo');

        randomnumbord = Math.floor(Math.random()*32)
        setcolor(colors[randomnumbord][0],colors[randomnumbord][1],colors[randomnumbord][2],'border');

        randomnumback = Math.floor(Math.random()*32)
        while(randomnumback == randomnumlogo || randomnumback == randomnumbord) { randomnumback = Math.floor(Math.random()*32); }
        setcolor(colors[randomnumback][0],colors[randomnumback][1],colors[randomnumback][2],'background');

        randomnum = Math.floor(Math.random()*150) + 1
        if(randomnum >= 34) randomnum += 200;
        setlogo(randomnum);

        randomnum = Math.floor(Math.random()*100) + 34
        setborder(randomnum);
        setuprdy = 1;
    }
}

function init()
{
	randomize(true);
    setuprdy = 1;
	document.getElementById('logodiv').style.display = "inline";
}