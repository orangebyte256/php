function Animator(text, time, id_text, id_form)
{
	this.text = text;
	this.tmp_text = "";
	this.timerId = null;
	this.flag = false;
	this.time = time;
	this.id_text = id_text;
	this.id_form = id_form;
}

Animator.prototype.main = function(callback)
{
	if(this.text == "")
	{
		document.getElementById(this.id_form).style.visibility = "";
		document.getElementById(this.id_text).innerHTML = this.tmp_text;
		clearInterval(this.timerId);
		callback();
		return;
	}
	this.tmp_text = this.tmp_text + this.text.substring(0,1);
	this.text = this.text.substring(1);
	document.getElementById(this.id_text).innerHTML = this.tmp_text;
	if(!this.flag)
	{
		document.getElementById(this.id_text).innerHTML = document.getElementById(this.id_text).innerHTML + "_";
	}
	this.flag = !this.flag;
}

Animator.prototype.run = function(callback)
{
	var my = this;
	this.timerId = setInterval(function() {my.main(callback);}, this.time);
}
