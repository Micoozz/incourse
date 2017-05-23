;(function(window) {

  var svgSprite = '<svg>' +
    '' +
    '<symbol id="icon-lajitong2" viewBox="0 0 1024 1024">' +
    '' +
    '<path d="M818.029952 343.994612l0 502.205936c0 61.637826-49.964972 111.607914-111.602797 111.607914L315.817875 957.808462c-61.632709 0-111.596657-49.970088-111.596657-111.607914L204.221218 343.994612c-30.825053 0-55.807027-24.988114-55.807027-55.800887l0-55.807027c0-30.818913 24.981974-55.800887 55.807027-55.800887l167.398568 0 0-55.79577c0-30.825053 24.981974-55.800887 55.800887-55.800887l167.403684 0c30.818913 0 55.800887 24.976858 55.800887 55.800887l0 55.79577 167.403684 0c30.818913 0 55.800887 24.981974 55.800887 55.800887l0 55.807027C873.830839 319.006498 848.848864 343.994612 818.029952 343.994612zM246.714008 343.994612l0 516.532223c0 30.818913 23.958668 55.800887 54.777581 55.800887l419.261852 0c30.818913 0 55.800887-24.981974 55.800887-55.800887L776.554328 343.994612C745.166457 343.994612 285.077757 343.994612 246.714008 343.994612zM413.094386 176.584788l0-42.221614c0-15.412015 12.493545-27.900443 27.900443-27.900443l140.255371 0c15.406898 0 27.900443 12.488429 27.900443 27.900443l0 42.221614C582.121034 176.584788 413.094386 176.584788 413.094386 176.584788M804.455795 218.140229 217.795375 218.140229c-15.418154 0-27.900443 23.590278-27.900443 42.086537 0 18.49012 12.482289 42.080397 27.900443 42.080397L804.455795 302.307164c15.412015 0 27.900443-23.590278 27.900443-42.080397C832.356238 241.730507 819.86781 218.140229 804.455795 218.140229zM402.582985 455.591269c11.45182 0 20.730137 12.493545 20.730137 27.906583l0 334.807369c0 15.406898-9.278317 27.895327-20.730137 27.895327-11.446703 0-20.730137-12.488429-20.730137-27.895327L381.852848 483.497852C381.852848 468.085838 391.135258 455.591269 402.582985 455.591269zM514.15406 455.591269c11.434423 0 20.699438 12.493545 20.699438 27.906583l0 334.807369c0 15.406898-9.265014 27.895327-20.699438 27.895327-11.43033 0-20.699438-12.488429-20.699438-27.895327L493.454622 483.497852C493.455645 468.085838 502.723729 455.591269 514.15406 455.591269zM625.726158 455.591269c11.417027 0 20.667715 12.493545 20.667715 27.906583l0 334.807369c0 15.406898-9.250688 27.895327-20.667715 27.895327s-20.667715-12.488429-20.667715-27.895327L605.058442 483.497852C605.057419 468.085838 614.30913 455.591269 625.726158 455.591269z"  ></path>' +
    '' +
    '</symbol>' +
    '' +
    '<symbol id="icon-sanjiaoxing" viewBox="0 0 1024 1024">' +
    '' +
    '<path d="M1023.978511 0 1023.978511 1024 0.021489 1024 1023.978511 0z"  ></path>' +
    '' +
    '</symbol>' +
    '' +
    '</svg>'
  var script = function() {
    var scripts = document.getElementsByTagName('script')
    return scripts[scripts.length - 1]
  }()
  var shouldInjectCss = script.getAttribute("data-injectcss")

  /**
   * document ready
   */
  var ready = function(fn) {
    if (document.addEventListener) {
      if (~["complete", "loaded", "interactive"].indexOf(document.readyState)) {
        setTimeout(fn, 0)
      } else {
        var loadFn = function() {
          document.removeEventListener("DOMContentLoaded", loadFn, false)
          fn()
        }
        document.addEventListener("DOMContentLoaded", loadFn, false)
      }
    } else if (document.attachEvent) {
      IEContentLoaded(window, fn)
    }

    function IEContentLoaded(w, fn) {
      var d = w.document,
        done = false,
        // only fire once
        init = function() {
          if (!done) {
            done = true
            fn()
          }
        }
        // polling for no errors
      var polling = function() {
        try {
          // throws errors until after ondocumentready
          d.documentElement.doScroll('left')
        } catch (e) {
          setTimeout(polling, 50)
          return
        }
        // no errors, fire

        init()
      };

      polling()
        // trying to always fire before onload
      d.onreadystatechange = function() {
        if (d.readyState == 'complete') {
          d.onreadystatechange = null
          init()
        }
      }
    }
  }

  /**
   * Insert el before target
   *
   * @param {Element} el
   * @param {Element} target
   */

  var before = function(el, target) {
    target.parentNode.insertBefore(el, target)
  }

  /**
   * Prepend el to target
   *
   * @param {Element} el
   * @param {Element} target
   */

  var prepend = function(el, target) {
    if (target.firstChild) {
      before(el, target.firstChild)
    } else {
      target.appendChild(el)
    }
  }

  function appendSvg() {
    var div, svg

    div = document.createElement('div')
    div.innerHTML = svgSprite
    svgSprite = null
    svg = div.getElementsByTagName('svg')[0]
    if (svg) {
      svg.setAttribute('aria-hidden', 'true')
      svg.style.position = 'absolute'
      svg.style.width = 0
      svg.style.height = 0
      svg.style.overflow = 'hidden'
      prepend(svg, document.body)
    }
  }

  if (shouldInjectCss && !window.__iconfont__svg__cssinject__) {
    window.__iconfont__svg__cssinject__ = true
    try {
      document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>");
    } catch (e) {
      console && console.log(e)
    }
  }

  ready(appendSvg)


})(window)