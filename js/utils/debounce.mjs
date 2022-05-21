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

  module.exports = debounce
  