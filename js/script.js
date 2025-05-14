function Changeco(){
	const currentURL = window.location.href;
	let log = document.getElementById("log");
	let cad = document.getElementById("cad");
	let obras = document.getElementById("obras");
	if(currentURL.includes("index") && log){
		log.style.color = "#DA61B9";
	}
	if(currentURL.includes("cad") && cad){
		cad.style.color = "#DA61B9";
	}
	if(currentURL.includes("obras") && obras){
		obras.style.color = "#DA61B9";
	}
}
document.addEventListener("DOMContentLoaded", Changeco);
