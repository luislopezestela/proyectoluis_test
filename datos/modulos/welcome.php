<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido</title>
	<meta name="theme-color" content="#18191a">
	<link rel="shortcut icon" href="datos/source/icons/shield.png">
	<style type="text/css">
		*{
			margin:0;
			padding:0;
		}
		body{
			position:relative;
			background:#242526;
			display:flex;
			min-height: 100vh;
			flex-wrap:wrap;
			width: 100%;
		}
		.contenido_dark{
			user-select:none;
			width:calc(100% - 20px);
			max-width:700px;
			margin:auto;
			align-self:center;
			align-items:center;
			justify-content:center;
			display:block;
			background:transparent;
		}
		.text{
			text-align:center;
			display:block;
			font-weight:100;
			font-size:20px;
			padding:10px;
			color:#FAFAFA;
			-webkit-text-stroke: 1px #ddd;
			user-select:none;
			cursor:default;
		}
		.dud{
			color:#757575;
		}
		.select_language{
			display:block;
			background:#3a3b3c;
			width:100%;
			border-radius:10px;
			padding:10px;
		}
	</style>
</head>
<body>
	<div class="contenido_dark">
		<div class="text"></div>
		<div class="select_language">
			<?=Luis::basepage("base_page"); ?>
		</div>
	</div>
	<script type="text/javascript">
		class TextScramble{
			constructor(el){
				this.el = el;
				this.chars = "-_\\/—=+*________";
				this.update = this.update.bind(this);
			}
			setText(newText){
				const oldText = this.el.innerText;
				const length = Math.max(oldText.length, newText.length);
				const promise = new Promise((resolve) => (this.resolve = resolve));
				this.queue = [];
				for(let i = 0; i < length; i++) {
					const from = oldText[i] || "";
					const to = newText[i] || "";
					const start = Math.floor(Math.random() * 40);
					const end = start + Math.floor(Math.random() * 40);
					this.queue.push({ from, to, start, end });
				}
				cancelAnimationFrame(this.frameRequest);
				this.frame = 0;
				this.update();
				return promise;
			}
			update(){
				let output = "";
				let complete = 0;
				for(let i = 0, n = this.queue.length; i < n; i++) {
					let{from, to, start, end, char } = this.queue[i];
					if(this.frame >= end) {
						complete++;
						output += to;
					}else if (this.frame >= start) {
						if(!char || Math.random() < 0.28) {
							char = this.randomChar();
							this.queue[i].char = char;
						}
						output += `<span class="dud">${char}</span>`;
					}else{
						output += from;
					}
				}
				this.el.innerHTML = output;
				if(complete === this.queue.length) {
					this.resolve();
				}else{
					this.frameRequest = requestAnimationFrame(this.update);
					this.frame++;
				}
			}
			randomChar(){
				return this.chars[Math.floor(Math.random() * this.chars.length)];
			}
		}
		const phrases = [
		"Bienvenido,",
		"Welcome",
		"Bienvenue",
		"Benvenuto",
		"Willkommen",
		"欢迎"
		];
		const el = document.querySelector(".text");
		const fx = new TextScramble(el);
		let counter = 0;
		const next = () => {
			fx.setText(phrases[counter]).then(() => {
				setTimeout(next, 800);
			});
			counter = (counter + 1) % phrases.length;
		};
		next();
	</script>
</body>
</html>