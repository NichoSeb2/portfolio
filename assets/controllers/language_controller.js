import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
	menu = true;

    connect() {
		this.toggleMenu = this.toggleMenu.bind(this);
		this.element.addEventListener("click", this.toggleMenu);

		this.toggleMenu(); // run on load
	}

	disconnect() {
		this.element.removeEventListener("click", this.toggleMenu);
	}

	toggleMenu(event) {
		if (event != undefined) {
			event.preventDefault();
			event.stopPropagation();
		}

		this.menu = !this.menu;

		if (this.menu) {
			document.querySelector("#languageMenu").classList.remove("hidden");

			document.querySelector("#languageMenuArrowDown").style.display = "none";
			document.querySelector("#languageMenuArrowUp").style.display = "";
		} else {
			document.querySelector("#languageMenu").classList.add("hidden");

			document.querySelector("#languageMenuArrowDown").style.display = "";
			document.querySelector("#languageMenuArrowUp").style.display = "none";
		}
	}
}
