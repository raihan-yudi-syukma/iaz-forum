const menuToogle = $('#menuToggle');
const menuItems = $(".menu-item");
const logout = document.getElementById("logout");
const password = document.getElementById("password");
const showPassword = document.getElementById("showPassword");
const closeAlert = $("#closeAlert");
const avatar = $("#avatar");
const uploadedFile = $("#uploadedFile");

$(document).ready(function() {
	// Toggle nav items.
	menuToogle.click(function() {
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle('hidden');
		}
		document.getElementById("userPanel").classList.toggle('hidden');

		if(logout !== null) {
			logout.classList.toggle('hidden');
		}
	});

	// Show logout alert.
	if(logout !== null) {
		logout.click(function() {
			return confirm('Anda yakin ingin logout?');
		});
	}

	// Close alerts.
	closeAlert.click(function() {
		closeAlert.parent().hide();
	});

	// Show password text.
	if(showPassword !== null) {
		showPassword.addEventListener('click', function() {
			if (password.type === "password") {
				password.type = "text";
			} else {
				password.type = "password";
			}
		});
	}

	// Show uploaded file.
	avatar.change(function() {
		const [file] = this.files;
		if(file) {
			uploadedFile.attr('src', URL.createObjectURL(file));
		}
	});
});
