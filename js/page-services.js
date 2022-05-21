
function main () {
    const sectionLables = document.querySelectorAll('.section_label')
    const collapse = document.querySelectorAll('.section_content')

    function collapseToggle (e) {
      e.target
        .closest('.section_content')
        .querySelector('.section_content-expandable')
        .classList.toggle('open')
    }

    function collapseSetHeight (expandable) {
      expandable.style.height = null
      const nativeHeight = expandable.scrollHeight
      expandable.style.height = `${nativeHeight}px`
    }

    function sectionLableToggle (e) {
      const section = e.target.closest('.process_section')
      const expandables = section.querySelectorAll('.section_content-expandable')
      let open = false
      expandables.forEach(each => {
        if (each.classList.contains('open')) open = true
      })
      if (open) {
        expandables.forEach(each => each.classList.remove('open'))
      } else {
        expandables.forEach(each => each.classList.add('open'))
      }
    }

    function itirateCollapse (colapse, firstTime = false) {
      let expandable = colapse.querySelector('.section_content-expandable')
      collapseSetHeight(expandable)
      if (firstTime) {
        colapse.querySelector('.section_content-button').onclick = collapseToggle
        expandable.classList.toggle('open')
      }
    }

    collapse.forEach(each => itirateCollapse(each, true))

    sectionLables.forEach(each => each.onclick = sectionLableToggle)

    window.addEventListener('resize', debounce(() => {
      console.log('resizing, adjusting inline styles...')
      collapse.forEach(each => itirateCollapse(each, false))
    }), 250)
}

document.addEventListener('DOMContentLoaded', main)

/**
 * Standard debound function.
 * Prevents the given function from being called too many times.
 * @param {function} func The original function you want to debounce.
 * @param {number} wait (default: 20) The debounce interval. Increase for better performance, decrease for more responsiveness.
 * @param {boolean} immediate (default: true) Calls the function now if the debounce time has elaspsed. If false an additional wait will be applied.
 * @returns {function} The debounced function.
 */
 function debounce (func, wait=20, immediate=true) {
	var timeout
	return function () {
	  var ctx = this, args = arguments
	  var later = function () {
		timeout = null
		if (!immediate) func.apply(ctx, args)
	  }
	  var callNow = immediate && !timeout
	  clearTimeout(timeout)
	  timeout = setTimeout(later, wait)
	  if (callNow) func.apply(ctx, args)
	}
  }
