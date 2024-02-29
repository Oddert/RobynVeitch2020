/* eslint-disable jsdoc/no-undefined-types */
/**
 * @typedef FolioFilters
 * @type {Object.<string, boolean>}
 */

/**
 * Controls which filters have been applied to the portfolio section.
 *
 * @type {FolioFilters}
 */
let folioFilters = {}

/**
 * If true console logs will be enabled.
 *
 * @type {boolean}
 */
const debug = false

/**
 * Defines which portfolio tags are to be shown when the "industrial design" filter is applied.
 *
 * @type {string[]}
 */
const designTags = [ 'industrial-design', 'service-design', 'social-design' ]

/**
 * Defines which portfolio tags are to be shown when the "development" filter is applied.
 *
 * @type {string[]}
 */
const developmentTags = [ 'web-development', 'app-development', 'system-design', 'microservices', 'data-vis' ]

function main() {
	const siteMain = document.querySelector('.site__main ')
	const content = document.querySelector('.homepage-main')
	const nav = document.querySelector('.nav-container')
	const navToggle = nav.querySelector('.nav-toggle')
	const profileHeader = document.querySelector('.intro-text .text')
	const tagClear = document.querySelector('.tag-clear .tag-clear__button')

	/**
	 * Determines the 'top of the page' for chaging the display of navigation elements.
	 *
	 * @type {number}
	 */
	const pageTopBoundary = 150
	/**
	 * Determines the 'bottom of the page' for chaging the display of navigation elements.
	 *
	 * @type {number}
	 */
	const pageBottomBoundary = 350

	/**
	 * Holds the current length of the profile title, incremented to facilitate the animation.
	 *
	 * @type {number}
	 */
	let typeAnimationTracker = 0

	/**
	 * Holds the interval reference for the profile title animation.
	 *
	 * @type {number}
	 */
	let typeAnimationTimer

	/**
	 * Determines if the title animation has already been started.
	 *
	 * @type {boolean}
	 */
	let typeAnimationFinished = false

	/**
	 * Holds the interval reference for the scrolling debounce checker.
	 *
	 * @type {number}
	 */
	let isScrolling

	/**
	 * The offset height for the main content body.
	 *
	 * @type {number}
	 */
	const contentOffsetHeight = content.offsetHeight

	siteMain.classList.remove('noscript')
	siteMain.classList.add('top')

	if (window.innerWidth <= 960) {
		nav.classList.remove('open')
	}

	/**
	 * Event handler for the nav toggle button.
	 * Opens and closes the navigation plane.
	 *
	 * @param {HTMLClickEvent} e The click event from the button.
	 */
	function handleNavToggleChange(e) {
		e.stopPropagation()
		const openState = nav.classList.contains('open')
		if (openState) {
			nav.classList.remove('open')
		} else {
			nav.classList.add('open')
		}
	}

	navToggle.onclick = handleNavToggleChange

	/**
	 * Sets up the portfolio items filtering if applicable.
	 * If the "focus" query parameter is found filters will be selectively applied.
	 * If not, each item has its class attribute reset.
	 *
	 * @return {void}
	 */
	function initFolioFilters() {
		const filterTags = document.querySelectorAll('[data-folio-filter-tagname]')

		const query = window.location.href.match(/focus=(\w+)/gi)

		if (query && query.length) {
			filterTags.forEach((each) => {
				const tagName = each.dataset.folioFilterTagname
				if (query.includes('focus=design')) {
					folioFilters[tagName] = designTags.includes(tagName)
				}
				if (query.includes('focus=development')) {
					folioFilters[tagName] = developmentTags.includes(tagName)
				}
				each.onclick = toggleSingleFilter
			})
			renderFolioItems()
			renderFolioTags()
		} else {
			filterTags.forEach((each) => {
				const tagName = each.dataset.folioFilterTagname
				folioFilters[tagName] = each.classList.contains('active')
				each.onclick = toggleSingleFilter
			})
		}
	}

	/**
	 * Event handler for the filter buttons.
	 * Calls {@link folioItemsShouldUpdate} optionally depending on the filter's new state.
	 *
	 * @param {HTMLClickEvent} e The click event from the button.
	 * @return {void}
	 */
	function toggleSingleFilter(e) {
		const { target: t } = e
		const prev = { ...folioFilters }
		const next = { ...folioFilters }
		const filterName = t.dataset.folioFilterTagname

		next[filterName] = !next[filterName]

		if (next[filterName]) {
			t.classList.add('active')
		} else {
			t.classList.remove('active')
		}

		folioItemsShouldUpdate(prev, next)
	}

	/**
	 * Optionally updates the folioFilters and calls {@link renderFolioItems}.
	 * Will do nothing if prev and next are the same.
	 *
	 * @param {FolioFilters} prev The existing filter state, prior to change.
	 * @param {FolioFilters} next The next filter state after update.
	 * @return {void}
	 */
	function folioItemsShouldUpdate(prev, next) {
		if (JSON.stringify(prev) === JSON.stringify(next)) {
			return
		}

		folioFilters = next
		renderFolioItems()
	}

	/**
	 * Applies and removes classes to portfolio items based on the folioFilters.
	 *
	 * @return {void}
	 */
	function renderFolioItems() {
		const folioItems = document.querySelectorAll('[data-folio-tags]')

		const allFiltersInactive = Object.keys(folioFilters).reduce((acc, e) => {
			if (folioFilters[e]) {
				return false
			}
			return acc
		}, true)

		if (allFiltersInactive) {
			folioItems.forEach((e) => e.classList.remove('hidden'))
			return
		}

		folioItems.forEach((folioItem) => {
			let tags
			try {
				tags = JSON.parse(folioItem.dataset.folioTags)
			} catch (err) {
				console.error('[renderFolioItems] > folioItems.forEach', err, folioItem.dataset.folioTags)
			}

			const hide = tags.reduce((acc, tag) => {
				if (folioFilters[tag]) {
					return false
				}
				return acc
			}, true)

			if (hide) {
				folioItem.classList.add('hidden')
			} else {
				folioItem.classList.remove('hidden')
			}
		})
	}

	/**
	 * Applies and removes classes to portfolio tag buttons based on the folioFilters.
	 *
	 * @return {void}
	 */
	function renderFolioTags() {
		const filterTags = document.querySelectorAll('[data-folio-filter-tagname]')

		filterTags.forEach((tag) => {
			const tagName = tag.dataset.folioFilterTagname
			if (folioFilters[tagName]) {
				tag.classList.add('active')
			} else {
				tag.classList.remove('active')
			}
		})
	}

	profileHeader.innerHTML = ''

	/**
	 * Event handler for scroll events on the main content.
	 * Controls the display of the navigation and title card.
	 *
	 * @return {void}
	 */
	function checkSlide() {
		if (debug) {
			console.log('[checkSlide] started...')
		}
		window.clearTimeout(isScrolling)

		isScrolling = setTimeout(function() {
			if (debug) {
				console.log('[checkSlide] Scrolling has stopped.')
			}
			performCheck()
		}, 150)

		performCheck()

		/**
		 * Optionally adds classes to the main content based on the scroll position.
		 * Optionally starts the typing animation on the profile.
		 *
		 * @return {void}
		 */
		function performCheck() {
			if (debug) {
				console.log('[checkSlide > performCheck] started...')
				console.log(
					'[checkSlide > performCheck]',
					content.scrollHeight,
					content.offsetHeight,
					contentOffsetHeight,
					content.scrollTop,
					content.scrollTop + content.offsetHeight,
				)
			}

			if (content.scrollTop + contentOffsetHeight >= content.scrollHeight - pageBottomBoundary) {
				if (debug) {
					console.log('[checkSlide > performCheck] C:')
				}
				if (!siteMain.classList.contains('bottom')) {
					siteMain.classList.add('bottom')
				}
			} else {
				if (debug) {
					console.log('[checkSlide > performCheck] :C')
				}
				if (siteMain.classList.contains('bottom')) {
					siteMain.classList.remove('bottom')
				}
			}

			if (
				!typeAnimationFinished &&
		content.scrollTop >= profileHeader.offsetTop - 500
			) {
				initTypeAnimation()
				typeAnimationFinished = true
			}

			if (content.scrollTop < pageTopBoundary) {
				if (debug) {
					console.log('[checkSlide > performCheck] adding top class', content.scrollTop, pageTopBoundary)
				}
				if (!siteMain.classList.contains('top')) {
					siteMain.classList.add('top')
				}
			} else {
				if (debug) {
					console.log('[checkSlide > performCheck] removing top class', content.scrollTop, pageTopBoundary)
				}
				if (siteMain.classList.contains('top')) {
					siteMain.classList.remove('top')
				}
			}
		}
	}

	const profileHeaderText = 'Hello, my name is Robyn. I\'m a problem solver.'

	/**
	 * Renders the profile title as a substring.
	 *
	 * @param {number} length The length of string to render.
	 * @return {void}
	 */
	function updateText(length) {
		profileHeader.innerHTML = profileHeaderText.substring(0, length + 1)
	}

	/**
	 * Begins the profile title "typing" animation.
	 *
	 * @return {void}
	 */
	function initTypeAnimation() {
		clearInterval(typeAnimationTimer)
		typeAnimationTimer = 0
		const interval = () => {
			if (Math.floor(Math.random() * 100) > 93) {
				updateText(typeAnimationTracker)
				typeAnimationTracker++
			}
			if (typeAnimationTracker >= profileHeaderText.length) {
				clearInterval(typeAnimationTimer)
			}
		}
		typeAnimationTimer = setInterval(interval, 10)
	}

	/**
	 * Removes all filters and re-renders the portfolio section.
	 *
	 * @return {void}
	 */
	function resetTags() {
		const tags = Object.keys(folioFilters)
		tags.forEach((e) => folioFilters[e] = false)
		renderFolioTags()
		renderFolioItems()
	}

	tagClear.onclick = resetTags
	profileHeader.addEventListener('click', initTypeAnimation)
	content.addEventListener('scroll', debounce(checkSlide, 15))

	initFolioFilters()
}

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

document.addEventListener('DOMContentLoaded', main)

// TODO: Potential future implamentation of cycling gradient
// function randomBodyTint (e, cover) {
//   e.stopPropagation()
//   const ran = () => Math.floor(Math.random() * 256)
//   const r = ran()
//   const g = ran()
//   const b = ran()
//   const rColour = [r, g, b]
//   console.log({ rColour })
//   cover.style.backgroundColor = `rgba(${rColour.join(',')}, .66)`
// }
