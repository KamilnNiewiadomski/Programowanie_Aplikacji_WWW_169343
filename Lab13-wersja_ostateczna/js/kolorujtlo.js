var computed = false;
var decimal = 0;

function convert (entryform, from, to)
{
	convertfrom = from.selectedIndex;
	convertto = to.selectedIndex;
	entryform.display.value = (entryform.input.value * from[convertfrom].value / to[convertto].value);
}

function addchar (input, character)
{
	if((character == '.' && decimal=="0") || character!='.')
	{
		(input.value == "" || input.value == "0") ? input.value = character : input.value += character
		convert(input.form,input.form.measure1,input.form.measure2)
		computed = true;
		if (character=='.')
		{
			decimal = 1;
		}
	}
}

function openvothcom()
{
	window.open("","Display window","toolbar=no,directories=no,menubar=no");
}

function clear (form)
{
	form.input.value = 0;
	form.display.value = 0;
	decimal=0;
}

function changeBackground(hexNumber)
{
	document.body.style.background = hexNumber;
}
function changerecenzje(hexNumber)
{
const collection = document.getElementsByClassName("recenzje");
for (let i = 0; i < collection.length; i++) {
  collection[i].style.backgroundColor = hexNumber;
}
const collection_1 = document.getElementsByClassName("podstr");
for (let i = 0; i < collection_1.length; i++) {
  collection_1[i].style.backgroundColor = hexNumber;
}
const collection_2 = document.getElementsByClassName("menu");
for (let i = 0; i < collection_2.length; i++) {
  collection_2[i].style.backgroundColor = hexNumber;
}
const collection_3 = document.getElementsByClassName("galeria");
for (let i = 0; i < collection_3.length; i++) {
  collection_3[i].style.backgroundColor = hexNumber;
}
}
