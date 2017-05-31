<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>limp</title>
		<meta name="theme-color" content="#181821">
		<!--Roboto--> <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
		<!--Favicon: http://realfavicongenerator.net -->
		<link rel="stylesheet" type="text/css" href="css/limp.css?r=<?=rand(0,999)?>">
	</head>

	<body>
		<div class="limp--log"></div>
		<div class="limp--input">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script>
			$("body").on("input", ".limp--input textarea", function() {
				var offset = this.offsetHeight - this.clientHeight;
				$(this).css("height", "auto").css("height", this.scrollHeight + offset);
				$(".limp--log").css("height", "calc(100% - 120px - "+$(this).height()+"px)"); // 100% - 40px - 36px - 20px - 40px
			});
			$("body").on("keypress", ".limp--input textarea", function(e) {
				if (e.key == "Enter" && e.shiftKey == false && e.ctrlKey == false && e.altKey == false) {
					e.preventDefault();
					if (this == document.querySelector(".limp--input-limp")) {
						eval(`limp(\`${this.value}\`)`);
						this.value = "";
					} else {
						eval(this.value);
						this.value = "";
					}
					$(".limp--input textarea").trigger("input");
				}
			});
			</script>
			<textarea placeholder="Run limp" rows="1" class="limp--input-limp"></textarea>
			<textarea placeholder="Run JavaScript" rows="1" class="limp--input-js"></textarea>
		</div>
		<script src="js/limp.js?r=<?=rand(0,999)?>"></script>
		<script src="js/script.limp?r=<?=rand(0,999)?>"></script>
	</body>
</html>