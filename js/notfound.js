/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
// FIle is a p5.js script and uses document level utilities hence no-undef is used.
/**
 * Assumed height of the text.
 * Must be calculated manually as no utility exists to measure it.
 *
 * @type {number}
 */
const globalH = 30

/**
 * Height of the header component, copied from the CSS files.
 *
 * @type {number}
 */
const headerHeight = 70

/**
 * Class to create the bouncing sprite.
 */
class Boid {
	/**
	 * @param {number} x The starting X position.
	 * @param {number} y The starting Y position.
	 */
	constructor(x, y) {
		this.text = '404'
		this.h = globalH
		this.w = this.h * (this.text.length - 1)
		if (x < this.w) x += this.w
		if (y < this.h) y += this.h
		this.colour = createVector(random(0, 255), random(0, 255), random(0, 255))
		this.velocity = createVector(random(-2,2),random(-2, 2))
		this.position = createVector(x, y)
	}

	/**
	 * Renders the text on the canvas.
	 */
	draw() {
		fill(this.colour.x, this.colour.y, this.colour.z)
		textSize(36)
		text(this.text, this.position.x, this.position.y)
	}

	/**
	 * Checks the velocity of the element has gone too high and halfs / doubles its velocity. 
	 */
	checkOob() {
		if (this.velocity.x > 2) this.velocity.x -= random(1)
		if (this.velocity.x < -2) this.velocity.x += random(1)
		if (this.velocity.y > 2) this.velocity.y -= random(1)
		if (this.velocity.y < -2) this.velocity.y += random(1)
	}

	/**
	 * Updates the sprites position.
	 * Checks if the element has reached the canvas edges and changes it's direction.
	 */
	update() {
		const deviation = .35
		this.position.add(this.velocity)
		if (this.position.x > width - this.w || this.position.x <= 0) {
			this.velocity.x *= -1
			this.velocity.y += random(-deviation, deviation)
			this.checkOob()
			this.changeColour()
		}
		if (this.position.y >= height || this.position.y < this.h) {
			this.velocity.y *= -1
			this.velocity.x += random(-deviation, deviation)
			this.checkOob()
			this.changeColour()
		}
	}

	/**
	 * Picks a random colour to change the text to.
	 * Used when the sprite bounces at the edge of the canvas.
	 */
	changeColour() {
		this.colour.x = random(0, 255)
		this.colour.y = random(0, 255)
		this.colour.z = random(0, 255)
	}
}

let boid

/**
 * Initialises the canvas and creates the sprite.
 */
function setup() {
	const cnv = createCanvas(document.querySelector('body').clientWidth, windowHeight - headerHeight)
	cnv.attribute('class', 'background_canvas')
	background('#ecf0f1')
	boid = new Boid(random(width), random(height))
	boid.draw()
}

/**
 * Updates the canvas each tick.
 */
function draw() {
	background('#ecf0f1')
	boid.update()
	boid.draw()
}

/**
 * Re-draws the canvas when the window is resized.
 */
function windowResized() {
	console.log('##resize')
	resizeCanvas(document.querySelector('body').clientWidth, windowHeight)
}

document.addEventListener('resize', windowResized)