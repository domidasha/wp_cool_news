window.onload = function () {
	

	function onButtonClick() {	
		var first = document.getElementById("firstNumber").value.trim();
		var second = document.getElementById("secondNumber").value.trim();
		
		if (first == "" || second == "") {
			document.getElementById("result").textContent = "Заполните все поля";
		}
		else if (isNaN(first) || isNaN(second)) {
			document.getElementById("result").textContent = "Введите цифры, а не текст";		
			
		} else {
			document.getElementById("result").textContent = parseInt(first)+parseInt(second);
		}
		
		document.getElementById("firstNumber").value = first;
		document.getElementById("secondNumber").value = second;
			
	}
	

	var btn = document.getElementById("count").onclick = onButtonClick;
	btn.onclick =  onButtonClick;

}		
		
