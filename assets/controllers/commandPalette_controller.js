import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
	commandPaletteVisibility = false;

    connect() {
		this.toggleCommandPalette = this.toggleCommandPalette.bind(this);
		document.addEventListener("keydown", this.toggleCommandPalette);

		Array.from(document.getElementsByClassName("closeCommandPalette")).forEach((el) => {
			el.addEventListener("click", this.toggleCommandPalette);
		});
	}

	disconnect() {
		document.removeEventListener("keydown", this.toggleCommandPalette);

		Array.from(document.getElementsByClassName("closeCommandPalette")).forEach((el) => {
			el.removeEventListener("click", this.toggleCommandPalette);
		});
	}

	toggleCommandPalette(event) {
		if ((event.ctrlKey && event.key === "k") || (event.type == "click")) {
			event.preventDefault();

			this.commandPaletteVisibility = !this.commandPaletteVisibility;

			if (this.commandPaletteVisibility) {
				document.querySelector("#commandPalette").classList.remove("hidden");
			} else {
				document.querySelector("#commandPalette").classList.add("hidden");
			}
		}
	}
}
