var folioFilters = {}
var odd_debug = false

var designTags = ['industrial-design', 'service-design', 'social-design']
var developmentTags = ['web-development', 'app-development', 'system-design', 'microservices', 'data-vis']

document.addEventListener('DOMContentLoaded', () => {

  const siteMain = document.querySelector('.site__main ')
  const content = document.querySelector('.homepage-main')
  const nav = document.querySelector('.nav-container')
  const navToggle = nav.querySelector('.nav-toggle')
  const profileHeader = document.querySelector('.intro-text .text')
  const tagClear = document.querySelector('.tag-clear .tag-clear__button')

  const pageTopBoundary = 150
  const pageBottomBoundary = 350

  let typeAnimationTracker = 0
  let typeAnimationTimer
  let typeAnimationFinished = false

  let isScrolling

  let contentOffsetHeight = content.offsetHeight

  // const folioFilters = {}

  siteMain.classList.remove('noscript')
  siteMain.classList.add('top')

  if (window.innerWidth <= 960) {
    nav.classList.remove('open')
  }

  navToggle.onclick = e => {
    e.stopPropagation()
    const openState = nav.classList.contains('open')
    if (openState) nav.classList.remove('open')
    else nav.classList.add('open')
  }

  
  function initFolioFilters () {
    const filterTags = document.querySelectorAll('[data-folio-filter-tagname]')

    const query = window.location.href.match(/focus=(\w+)/gi)

    if (query && query.length) {
      filterTags.forEach(each => {
        const tagName = each.dataset.folioFilterTagname
        if (query.includes("focus=design")) folioFilters[tagName] = designTags.includes(tagName)
        if (query.includes("focus=development")) folioFilters[tagName] = developmentTags.includes(tagName)
        each.onclick = toggleSingleFilter
      })
      renderFolioItems()
      renderFolioTags()
    } else {
      filterTags.forEach(each => {
        const tagName = each.dataset.folioFilterTagname
        folioFilters[tagName] = each.classList.contains('active')
        each.onclick = toggleSingleFilter
      })
    }

    
    
  }
  
  function toggleSingleFilter (e) {
    const { target: t } = e
    const prev = { ...folioFilters }
    const next = { ...folioFilters }
    const filterName = t.dataset.folioFilterTagname
    
    next[filterName] = !next[filterName]
    
    if (next[filterName]) t.classList.add('active')
    else t.classList.remove('active')
    
    folioItemsShouldUpdate(prev, next)
  }

  function folioItemsShouldUpdate (prev, next) {
    if (JSON.stringify(prev) === JSON.stringify(next)) return 
    else {
      folioFilters = next
      renderFolioItems()
    }
  }
  
  function renderFolioItems () {
    const folioItems = document.querySelectorAll('[data-folio-tags]')
    
    const allFiltersInactive = Object.keys(folioFilters).reduce((acc, e) => {
      if (folioFilters[e]) return false
      else return acc
    }, true)

    if (allFiltersInactive) {
      folioItems.forEach(e => e.classList.remove('hidden'))
      return
    }
    
    folioItems.forEach(folioItem => {
      console.log(folioItem, folioItem.dataset.folioTags)
      let tags
      try {
        tags = JSON.parse(folioItem.dataset.folioTags)
      } catch (err) {
        console.log(err, folioItem.dataset.folioTags)
      }
      
      const hide = tags.reduce((acc, tag) => {
        if (folioFilters[tag]) return false
        else return acc 
      }, true)
      
      if (hide) folioItem.classList.add('hidden')
      else folioItem.classList.remove('hidden')
    })
    
  }

  function renderFolioTags () {
    const filterTags = document.querySelectorAll('[data-folio-filter-tagname]')
    
    filterTags.forEach(tag => {
      const tagName = tag.dataset.folioFilterTagname
      if (folioFilters[tagName]) tag.classList.add('active')
      else tag.classList.remove('active')
    })
  }

  profileHeader.innerHTML = ''

  
  function checkSlide () {
    
    window.clearTimeout( isScrolling );
    isScrolling = setTimeout(function() {
      // console.log( 'Scrolling has stopped.' );
      performCheck()
    }, 150);
    
    performCheck()
    
    function performCheck () {
      if (odd_debug) console.log(content.scrollHeight, content.offsetHeight, contentOffsetHeight, content.scrollTop, content.scrollTop + content.offsetHeight)

      if (content.scrollTop + contentOffsetHeight >= content.scrollHeight - pageBottomBoundary) {
        if (odd_debug) console.log('C:')
        if (!siteMain.classList.contains('bottom')) siteMain.classList.add('bottom')
      } else {
        if (odd_debug) console.log(':C')
        if (siteMain.classList.contains('bottom')) siteMain.classList.remove('bottom')
      }

      // console.log(content.scrollTop, profileHeader.offsetTop - 500)

      if (
        !typeAnimationFinished && 
        content.scrollTop >= profileHeader.offsetTop - 500
      ) {
        initTypeAnimation()
        typeAnimationFinished = true
      }

      if (content.scrollTop < pageTopBoundary) {
        if (!siteMain.classList.contains('top')) siteMain.classList.add('top')
      } else {
        if (siteMain.classList.contains('top')) siteMain.classList.remove('top')
      }
    }
    
  }

  const profileHeaderText = `Hello, my name is Robyn. I'm a problem solver.`

  function updateText (length) {
    profileHeader.innerHTML = profileHeaderText.substring(0, length + 1)
  }

  function initTypeAnimation () {
    clearInterval(typeAnimationTimer)
    typeAnimationTimer = 0
    const interval = () => {
      if (Math.floor(Math.random() * 100) > 93) {
        updateText (typeAnimationTracker)
        typeAnimationTracker ++
      }
      if (typeAnimationTracker >= profileHeaderText.length) {
        console.log('CLEARING')
        clearInterval (typeAnimationTimer)
      }
    }
    typeAnimationTimer = setInterval (interval, 20)
  }

  function resetTags () {
    // console.log('[resetTags]')
    const tags = Object.keys(folioFilters)
    tags.forEach(e => folioFilters[e] = false)
    renderFolioTags()
    renderFolioItems()
  }
  
  tagClear.onclick = resetTags
  profileHeader.addEventListener('click', initTypeAnimation)
  content.addEventListener('scroll', debounce(checkSlide, 15))

  // initTypeAnimation()
  initFolioFilters()
  
})

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