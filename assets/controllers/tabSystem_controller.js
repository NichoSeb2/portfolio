import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
	tabSystem = undefined;
	tabs =  [];
	selectedTab = null;

    connect() {
		this.tabSystem = document.querySelector('[data-controller="tabSystem"]');

		this.tabs = Array.from(
			this.tabSystem.querySelectorAll('[data-tabsystem-registertab]')
		).map((el => {
			return el.getAttribute('data-tabsystem-registertab');
		}));

		this.tabs.forEach((tab) => {
			this.tabSystem.querySelector(`[data-tabsystem-registertab="${tab}"]`).addEventListener("click", () => {
				this.selectTab(tab);
			});
		});

		this.selectTab("login");
	}

	disconnect() {
		this.tabs.forEach((tab) => {
			this.tabSystem.querySelector(`[data-tabsystem-registertab="${tab}"]`).removeEventListener("click", () => {
				this.selectTab(tab);
			});
		});
	}

	selectTab(newSelectedTab) {
		this.selectedTab = newSelectedTab;

		this.tabs.forEach((tab) => {
			if (tab != this.selectedTab) {
				const button = this.tabSystem.querySelector(`[data-tabsystem-registertab="${tab}"]`);
				const section = this.tabSystem.querySelector(`[data-tabsystem-tab="${tab}"]`);

				button.classList.add('hover:text-primary', 'cursor-pointer');
				button.classList.remove('bg-white', 'shadow-sm');
				section.classList.add('hidden');
			}
		});

		const button = this.tabSystem.querySelector(`[data-tabsystem-registertab="${this.selectedTab}"]`);
		const section = this.tabSystem.querySelector(`[data-tabsystem-tab="${this.selectedTab}"]`);

		button.classList.add('bg-white', 'shadow-sm');
		button.classList.remove('hover:text-primary', 'cursor-pointer');
		section.classList.remove('hidden');
	}
}
