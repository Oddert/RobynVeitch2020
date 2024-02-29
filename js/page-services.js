/* eslint-disable jsdoc/no-undefined-types */

function main() {
	const sectionLables = document.querySelectorAll('.section_label')
	const sectionContent = document.querySelectorAll('.section_content')

	/**
	 * Toggles the display class for the expandable section content.
	 *
	 * @param {HTMLClickEvent} e The button click event
	 */
	function collapseToggle(e) {
		e.target
			.closest('.section_content')
			.querySelector('.section_content-expandable')
			.classList.toggle('open')
	}

	/**
	 * Explicitly sets an element's height to the total content scroll height.
	 *
	 * @param {HTMLElement} expandable The element to be resized.
	 */
	function collapseSetHeight(expandable) {
		expandable.style.height = null
		const nativeHeight = expandable.scrollHeight
		expandable.style.height = `${ nativeHeight }px`
	}

	/**
	 * Event handler for the section labels.
	 * Expands or collapses sections depending on their current state.
	 *
	 * @param {HTMLClickEvent} e The button click event.
	 */
	function sectionLableToggle(e) {
		const section = e.target.closest('.process_section')
		const expandables = section.querySelectorAll('.section_content-expandable')
		let open = false
		expandables.forEach((each) => {
			if (each.classList.contains('open')) {
				open = true
			}
		})
		if (open) {
			expandables.forEach((each) => each.classList.remove('open'))
		} else {
			expandables.forEach((each) => each.classList.add('open'))
		}
	}

	/**
	 * Sets up the expandable section content and binds the event listeners to toggle them.
	 *
	 * @param {HTMLElement} colapse   The section content to be instantiated.
	 * @param {*}           firstTime
	 */
	function itirateCollapse(colapse, firstTime = false) {
		const expandable = colapse.querySelector('.section_content-expandable')
		collapseSetHeight(expandable)
		if (firstTime) {
			colapse.querySelector('.section_content-button').onclick = collapseToggle
			expandable.classList.toggle('open')
		}
	}

	sectionContent.forEach((each) => itirateCollapse(each, true))

	sectionLables.forEach((each) => each.onclick = sectionLableToggle)

	window.addEventListener('resize', debounce(() => {
		console.log('resizing, adjusting inline styles...')
		sectionContent.forEach((each) => itirateCollapse(each, false))
	}), 250)
}

document.addEventListener('DOMContentLoaded', main)

/**
 * Standard debound function.
 * Prevents the given function from being called too many times.
 *
 * @param {Function} func      The original function you want to debounce.
 * @param {number}   wait      (default: 20) The debounce interval. Increase for better performance, decrease for more responsiveness.
 * @param {boolean}  immediate (default: true) Calls the function now if the debounce time has elaspsed. If false an additional wait will be applied.
 * @return {Function} The debounced function.
 */
function debounce(func, wait = 20, immediate = true) {
	let timeout
	return function() {
		const ctx = this,
			args = arguments
		const later = function() {
			timeout = null
			if (!immediate) {
				func.apply(ctx, args)
			}
		}
		const callNow = immediate && !timeout
		clearTimeout(timeout)
		timeout = setTimeout(later, wait)
		if (callNow) {
			func.apply(ctx, args)
		}
	}
}
