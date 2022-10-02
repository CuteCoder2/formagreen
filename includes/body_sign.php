<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="../function/login.php" method="POST" class="sign-in-form">
					<h2 class="title">Admins</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" name="admin_log" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" name="admin_psd" />
					</div>
					<input type="submit" value="Login" class="btn solid" name="admin" />
				</form>

				
				<form action="../function/login_member.php" class="sign-up-form" method="POST">
					<h2 class="title">MEMBERS</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" name="member_log" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" name="memeber_psd"/>
					</div>
					<input type="submit" class="btn" value="Sign up"  name="memeber"/>
					<h3>D'ont have an Account ? <a href="sign_up.php">Register here</a></h3>
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>MEMEBERS Sign In Here</h3>
					<!-- <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, ex
          ratione. Aliquid!
        </p> -->
					<button class="btn transparent" id="sign-up-btn">Sign In</button>
				</div>
				<img src="../img/bg.svg" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>ADMINS Sign In Here</h3>
					<!-- <p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
						laboriosam ad deleniti.
					</p> -->
					<button class="btn transparent" id="sign-in-btn">Sign in</button>
				</div>
				<img src="../img//aforestation.png" class="image" alt="" />
			</div>
		</div>
	</div>



	<script>
		const sign_in_btn = document.querySelector("#sign-in-btn");
		const sign_up_btn = document.querySelector("#sign-up-btn");
		const container = document.querySelector(".container");

		sign_up_btn.addEventListener("click", () => {
			container.classList.add("sign-up-mode");
		});

		sign_in_btn.addEventListener("click", () => {
			container.classList.remove("sign-up-mode");
		});
	</script>