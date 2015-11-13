function Animator(text, time)
{
	this.text = text;
	this.tmp_text = "";
	this.timerId = null;
	this.flag = false;
	this.time = time;
}

Animator.prototype.run() = function()
{
	this.timerId = setInterval(function() {
		if(this.text == "")
		{
			document.getElementById("form").style.visibility = "";
		}
		this.tmp_text = this.tmp_text + this.text.substring(0,1);
		this.text = this.text.substring(1);
		document.getElementById("text").innerHTML = this.tmp_text;
		if(!this.flag)
		{
			document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + "_";
		}
		this.flag = !this.flag;
	}, this.time);
}
