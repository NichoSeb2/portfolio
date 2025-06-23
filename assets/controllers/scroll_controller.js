import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
		this.handleScroll = this.handleScroll.bind(this);
		window.addEventListener("scroll", this.handleScroll);
		this.handleScroll(); // run on load
	}

	disconnect() {
		window.removeEventListener("scroll", this.handleScroll);
	}

	handleScroll() {
		const header = document.querySelector("header");

		if (window.scrollY < 20) {
			header.classList.remove("bg-white");
			header.classList.remove("bg-opacity-95");
			header.classList.remove("shadow-sm");
		} else {
			header.classList.add("bg-white");
			header.classList.add("bg-opacity-95");
			header.classList.add("shadow-sm");
		}
	}
}
