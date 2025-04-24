const card = document.querySelector(".mywidget_card_container");
const cardFront = document.querySelector(".mywidget-card-front");
const cardBack = document.querySelector(".mywidget-card-back");
let tl = gsap.timeline({ paused: true, reversed: true });

console.log("it works");


function frontToBack() {
	// Set initial styles for back card (hidden behind the front card)
	tl.set(cardBack, { opacity: 1, rotationY: 180 }, "<");

	// Animate the front card rotating 180 degrees
	tl.to(cardFront, {
		rotateY: 180,
		duration: 1, // Adjust duration for the flip effect
		ease: "power2.inOut"
	});

	// Animate the back card rotating from 180 to 0 degrees to show it
	tl.to(
		cardBack,
		{
			rotateY: 0,
			duration: 1,
			ease: "power2.inOut"
		},
		"<"
	);

	tl.play(); // Start the animation
}

function backToFront() {
	tl.reverse(); // Reverse the flip animation
}

card.addEventListener("mouseenter", frontToBack);
card.addEventListener("mouseleave", backToFront);