/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./assets/**/*.js",
		"./templates/**/*.html.twig",
		"./vendor/easycorp/easyadmin-bundle/src/**/*.php",
		"./vendor/easycorp/easyadmin-bundle/templates/**/*.twig",
	],
	theme: {
		extend: {
			borderRadius: {
				lg: "var(--radius)",
				md: "calc(var(--radius) - 2px)",
				sm: "calc(var(--radius) - 4px)",
			},
		},
	},
	plugins: [],
}
