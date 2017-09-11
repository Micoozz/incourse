(function(m, o) {
	var p = function(a, b) {
			return new p.fn.init(a, b)
		},
		document = m.document,
		push = Array.prototype.push,
		slice = Array.prototype.slice,
		toString = Object.prototype.toString,
		hasOwnProperty = Object.prototype.hasOwnProperty,
		readyBound = false,
		readyList = [],
		DOMContentLoaded, rootDocument, ridx = /^#[\w-]+$/,
		rtrim = /^(\s| )+|(\s| )+$/g;
	p.fn = p.prototype = {
		init: function(a, b) {
			if (!a) return this;
			if (a.nodeType) {
				this[0] = a;
				this.length = 1;
				return this
			}
			var c, ret, idx;
			b = b || document;
			if (typeof a === 'string') {
				if (a.indexOf('<') === 0) {
					c = b.ownerDocument || b;
					ret = v.exec(a);
					if (ret) a = [c.createElement(ret[1])];
					else {
						ret = buildFragment([a], [c]);
						a = (ret.cacheable ? ret.fragment.cloneNode(true) : ret.fragment).childNodes
					}
				} else if (ridx.test(a) && b.nodeType === 9) {
					idx = a.slice(1);
					ret = b.getElementById(idx);
					if (ret) {
						if (ret.id !== idx) ret = b.all[idx];
						this.length = 1;
						this[0] = ret
					}
					return this
				} else a = p.find(a, b)
			} else if (isFunction(a)) {
				return rootDocument.ready(a)
			}
			return this.setArray(isArray(a) ? a : toArray(a))
		},
		lhgren: 'LiHuiGang',
		setArray: function(a) {
			this.length = 0;
			push.apply(this, a);
			return this
		},
		each: function(a) {
			return p.each(this, a)
		},
		get: function(a) {
			return a === o ? slice.call(this) : this[a]
		},
		eq: function(i) {
			return this.setArray([this[i]])
		},
		bind: function(a, b) {
			for (var i = 0, l = this.length; i < l; i++) p.event.add(this[i], a, b);
			return this
		},
		unbind: function(a, b) {
			for (var i = 0, l = this.length; i < l; i++) p.event.remove(this[i], a, b);
			return this
		},
		hover: function(a, b) {
			for (var i = 0, l = this.length; i < l; i++) {
				p.event.add(this[i], 'mouseover', a);
				p.event.add(this[i], 'mouseout', b)
			}
			return this
		},
		html: function(a) {
			if (a === o) return this[0] ? this[0].innerHTML : null;
			else if (typeof a === 'string' && !rnocache.test(a)) {
				for (var i = 0, l = this.length; i < l; i++) if (this[i].nodeType === 1) {
					cleanData(this[i].getElementsByTagName('*'));
					this[i].innerHTML = a
				}
			} else this.empty().append(a);
			return this
		},
		text: function(a) {
			if (a === o) return this[0] ? this[0].innerText ? this[0].innerText : this[0].textContent : null;
			else {
				for (var i = 0, l = this.length; i < l; i++) this[i].innerText ? this[i].innerText = a : this[i].textContent = a
			}
			return this
		},
		val: function(a) {
			if (a === o) {
				var b = this[0];
				if (b) {
					if (isNode(b, 'option')) return (b.attributes.value || {}).specified ? b.value : b.text;
					if (isNode(b, 'select')) {
						var c = b.selectedIndex,
							values = [],
							options = b.options,
							one = b.type == 'select-one';
						if (c < 0) return null;
						for (var i = one ? c : 0, max = one ? c + 1 : options.length; i < max; i++) {
							if (options[i].selected) {
								a = p(options[i]).val();
								if (one) return a;
								values.push(a)
							}
						}
						return values
					}
					return (b.value || '').replace(/\r/g, '')
				}
				return o
			}
			if (typeof a === 'number') a += '';
			var i = 0,
				l = this.length,
				e, values;
			for (; i < l; i++) {
				e = this[i];
				if (isNode(e, 'select')) {
					values = toArray(a);
					p('option', e).each(function() {
						e.selected = (inArray(e.value, values) >= 0 || inArray(e.text, values) >= 0)
					});
					if (!values.length) e.selectedIndex = -1
				} else e.value = a
			}
			return this
		},
		css: function(a, b) {
			return access(this, a, b, 'css')
		},
		attr: function(a, b) {
			return access(this, a, b, 'attr')
		},
		addClass: function(a) {
			var i = 0,
				l = this.length,
				elem, classNames = (a || '').split(rspace);
			for (; i < l; i++) {
				elem = this[i];
				if (!elem.className) elem.className = a;
				else {
					var b = ' ' + elem.className + ' ';
					for (var c = 0, cl = classNames.length; c < cl; c++) if (b.indexOf(' ' + classNames[c] + ' ') < 0) elem.className += ' ' + classNames[c]
				}
			}
			return this
		},
		removeClass: function(a) {
			var i = 0,
				l = this.length,
				elem, classNames = (a || '').split(rspace);
			for (; i < l; i++) {
				elem = this[i];
				if (a) {
					var b = (' ' + elem.className + ' ').replace(rclass, ' ');
					for (var c = 0, cl = classNames.length; c < cl; c++) b = b.replace(' ' + classNames[c] + ' ', ' ');
					elem.className = b.substring(1, b.length - 1)
				} else elem.className = ''
			}
			return this
		},
		removeAttr: function(a) {
			for (var i = 0, l = this.length; i < l; i++) {
				p.attr(this[i], a, '');
				if (this[i].nodeType === 1) this[i].removeAttribute(a)
			}
			return this
		},
		remove: function() {
			var i = 0,
				l = this.length,
				e;
			for (; i < l; i++) {
				e = this[i];
				if (e.nodeType === 1) {
					cleanData(e.getElementsByTagName('*'));
					cleanData([e])
				}
				if (e.parentNode) e.parentNode.removeChild(e)
			}
			return this
		},
		empty: function() {
			var i = 0,
				l = this.length,
				e;
			for (; i < l; i++) {
				e = this[i];
				if (e.nodeType === 1) cleanData(e.getElementsByTagName('*'));
				while (e.firstChild) e.removeChild(e.firstChild)
			}
			return this
		},
		map: function(b) {
			var c = map(this, function(a, i) {
				return b.call(a, i, a)
			});
			return this.setArray(c)
		},
		filter: function(b) {
			var c = grep(this, function(a, i) {
				return b.call(a, i, a)
			});
			return this.setArray(c)
		},
		is: function(a) {
			if (!a) return false;
			var b = this[0].ownerDocument || this[0],
				ret = p.find(a, b);
			for (var i = 0, l = this.length; i < l; i++) if (inArray(this[i], ret) >= 0) return true;
			return false
		},
		append: function() {
			return this.insert(arguments, true, function(a) {
				if (this.nodeType === 1) this.appendChild(a)
			})
		},
		prepend: function() {
			return this.insert(arguments, true, function(a) {
				if (this.nodeType === 1) this.insertBefore(a, this.firstChild)
			})
		},
		before: function() {
			return this.insert(arguments, false, function(a) {
				this.parentNode.insertBefore(a, this)
			})
		},
		after: function() {
			return this.insert(arguments, false, function(a) {
				this.parentNode.insertBefore(a, this.nextSibling)
			})
		},
		insert: function(c, d, e) {
			var f, first, value = c[0],
				scripts = [],
				fragment, parent;
			if (this[0]) {
				parent = value && value.parentNode;
				if (parent && parent.nodeType === 11 && parent.childNodes.length === this.length) f = {
					fragment: parent
				};
				else f = buildFragment(c, this, scripts);
				fragment = f.fragment;
				if (fragment.childNodes.length === 1) first = fragment = fragment.firstChild;
				else first = fragment.firstChild;
				if (first) {
					d = d && isNode(first, 'tr');
					for (var i = 0, l = this.length; i < l; i++) e.call(d ? root(this[i], first) : this[i], this.length > 1 || f.cacheable || i > 0 ? fragment.cloneNode(true) : fragment)
				}
				if (scripts.length > 0) p.each(scripts, x)
			}
			function root(a, b) {
				return d && isNode(a, 'table') && isNode(b, 'tr') ? (a.getElementsByTagName('tbody')[0] || a.appendChild(a.ownerDocument.createElement('tbody'))) : a
			}
			return this
		},
		ready: function(a) {
			p.bindReady();
			if (p.isReady) a.call(document, p);
			else if (readyList) readyList.push(a);
			return this
		}
	};
	p.fn.init.prototype = p.fn;
	p.extend = p.fn.extend = function() {
		var a = arguments[0] || {},
			i = 1,
			length = arguments.length,
			options, copy;
		if (length === i) {
			a = this;
			--i
		}
		options = arguments[i];
		for (var b in options) {
			copy = options[b];
			if (a === copy) continue;
			if (p.isPlainObject(copy) && !p.isArray(copy)) a[b] = arguments.callee(a[b] || {}, copy);
			else a[b] = copy
		}
		return a
	};
	p.isPlainObject = function(a) {
		if (!a || toString.call(a) !== '[object Object]' || a.nodeType || a.setInterval) return false;
		if (a.constructor && !hasOwnProperty.call(a, 'constructor') && !hasOwnProperty.call(a.constructor.prototype, 'isPrototypeOf')) return false;
		var b;
		for (b in a) {}
		return b === o || hasOwnProperty.call(a, b)
	};
	p.extend({
		isFunction: function(a) {
			return toString.call(a) === '[object Function]'
		},
		isArray: function(a) {
			return toString.call(a) === '[object Array]'
		},
		trim: function(a) {
			return (a || '').replace(rtrim, '')
		},
		globalEval: function(a) {
			if (a && /\S/.test(a)) {
				var b = document.getElementsByTagName('head')[0] || document.documentElement,
					script = document.createElement('script');
				script.type = 'text/javascript';
				if (!browser.ie) script.appendChild(document.createTextNode(a));
				else script.text = a;
				b.insertBefore(script, b.firstChild);
				b.removeChild(script)
			}
		},
		nodeName: function(a, b) {
			return a.nodeName && a.nodeName.toUpperCase() == b.toUpperCase()
		},
		each: function(a, b) {
			var c, i = 0,
				length = a.length;
			if (length === o) {
				for (c in a) if (b.call(a[c], c, a[c]) === false) break
			} else for (var d = a[0]; i < length && b.call(d, i, d) !== false; d = a[++i]) {}
			return a
		},
		isReady: false,
		ready: function() {
			if (!p.isReady) {
				if (!document.body) return setTimeout(p.ready, 13);
				p.isReady = true;
				if (readyList) {
					var a, i = 0;
					while ((a = readyList[i++])) a.call(document, p);
					readyList = null
				}
			}
		},
		bindReady: function() {
			if (readyBound) return;
			readyBound = true;
			if (document.readyState === 'complete') return p.ready();
			if (document.addEventListener) {
				document.addEventListener('DOMContentLoaded', DOMContentLoaded, false);
				m.addEventListener('load', p.ready, false)
			} else if (document.attachEvent) {
				document.attachEvent('onreadystatechange', DOMContentLoaded);
				m.attachEvent('onload', p.ready);
				var a = false;
				try {
					a = m.frameElement == null
				} catch (e) {}
				if (document.documentElement.doScroll && a) doScrollCheck()
			}
		},
		browser: {}
	});
	p.extend({
		toArray: function(a) {
			var b = [];
			if (a != null) {
				var i = a.length;
				if (i == null || typeof a === 'string' || isFunction(a) || a.setInterval) b[0] = a;
				else while (i) b[--i] = a[i]
			}
			return b
		},
		inArray: function(a, b) {
			if (b.indexOf) return b.indexOf(a);
			else {
				for (var i = 0, l = b.length; i < l; i++) if (b[i] === a) return i;
				return -1
			}
		},
		grep: function(a, b, c) {
			var d = [];
			for (var i = 0, length = a.length; i < length; i++) if (!c != !b(a[i], i)) d.push(a[i]);
			return d
		},
		map: function(a, b) {
			var c = [];
			for (var i = 0, length = a.length; i < length; i++) {
				var d = b(a[i], i);
				if (d != null) c[c.length] = d
			}
			return c.concat.apply([], c)
		}
	});
	rootDocument = p(document);
	var q = /(webkit)[ \/]([\w.]+)/,
		ropera = /(opera)(?:.*version)?[ \/]([\w.]+)/,
		rmsie = /(msie) ([\w.]+)/,
		rmozilla = /(mozilla)(?:.*? rv:([\w.]+))?/,
		isArray = p.isArray,
		isNode = p.nodeName,
		map = p.map,
		inArray = p.inArray,
		toArray = p.toArray,
		browser = p.browser,
		grep = p.grep,
		isFunction = p.isFunction,
		userAgent = navigator.userAgent.toLowerCase();
	uaMatch = function(a) {
		var b = q.exec(a) || ropera.exec(a) || rmsie.exec(a) || a.indexOf('compatible') < 0 && rmozilla.exec(a) || [];
		return {
			browser: b[1] || '',
			version: b[2] || '0'
		}
	}, browserMatch = uaMatch(userAgent), doScrollCheck = function() {
		if (p.isReady) return;
		try {
			document.documentElement.doScroll('left')
		} catch (error) {
			setTimeout(doScrollCheck, 1);
			return
		}
		p.ready()
	};
	if (browserMatch.browser) {
		p.browser[browserMatch.browser] = true;
		p.browser.version = browserMatch.version
	}
	if (document.addEventListener) {
		DOMContentLoaded = function() {
			document.removeEventListener('DOMContentLoaded', DOMContentLoaded, false);
			p.ready()
		}
	} else if (document.attachEvent) {
		DOMContentLoaded = function() {
			if (document.readyState === 'complete') {
				document.detachEvent('onreadystatechange', DOMContentLoaded);
				p.ready()
			}
		}
	}
	p.extend({
		cache: {
			guid: 1,
			fuid: 1,
			func: function(a) {
				return function() {
					try {
						p.event.handle.apply(p.cache[a].elem, arguments)
					} catch (e) {}
				}
			}
		},
		event: {
			add: function(a, b, c) {
				var d = a.lhguid || (a.lhguid = p.cache.guid++);
				if (!p.cache[d]) p.cache[d] = {
					elem: a,
					listener: p.cache.func(d),
					events: {}
				};
				if (b && !p.cache[d].events[b]) {
					p.cache[d].events[b] = [];
					if (a.addEventListener) a.addEventListener(b, p.cache[d].listener, false);
					else if (a.attachEvent) a.attachEvent('on' + b, p.cache[d].listener)
				}
				if (c) {
					if (!c.fuid) c.fuid = p.cache.fuid++;
					p.cache[d].events[b].push(c)
				}
				a = null
			},
			remove: function(a, b, c) {
				try {
					var d = p.cache[a.lhguid],
						events, ret, eventType, handlerObj
				} catch (e) {
					return
				}
				if (!d) return;
				events = d.events;
				if (b === o) {
					for (var b in events) p.event.remove(a, b);
					return
				}
				eventType = events[b];
				if (eventType) {
					if (c) {
						for (var i = 0; i < eventType.length; i++) {
							handlerObj = eventType[i];
							if (c.fuid === handlerObj.fuid) eventType.splice(i--, 1)
						}
					} else {
						for (var i = 0; i < eventType.length; i++) eventType.splice(i--, 1)
					}
					for (ret in events[b]) break;
					if (!ret) {
						removeEvent(a, b, d.listener);
						ret = null;
						delete events[b]
					}
				}
				for (ret in events) break;
				if (!ret) {
					delete p.cache[a.lhguid];
					deleteExpando(a, ['lhguid'])
				}
			},
			handle: function(a) {
				a = arguments[0] = p.event.fix(a || m.event);
				if (!a.currentTarget) a.currentTarget = this;
				var b = p.cache[this.lhguid].events[a.type];
				b = b.slice(0);
				for (var i = 0, l = b.length; i < l; i++) {
					var c = b[i],
						ret = c.apply(this, arguments);
					if (ret === false) {
						a.preventDefault();
						a.stopPropagation()
					}
				}
			},
			fix: function(a) {
				if (!a.preventDefault) a.preventDefault = t;
				if (!a.stopPropagation) a.stopPropagation = stopPropagation;
				if (!a.target) a.target = a.srcElement || document;
				if (a.pageX == null && a.clientX != null) {
					var b = document.documentElement,
						body = document.body;
					a.pageX = a.clientX + (b && b.scrollLeft || body && body.scrollLeft || 0) - (b.clientLeft || 0);
					a.pageY = a.clientY + (b && b.scrollTop || body && body.scrollTop || 0) - (b.clientTop || 0)
				}
				return a
			}
		}
	});
	var t = function() {
			this.returnValue = false
		},
		stopPropagation = function() {
			this.cancelBubble = true
		},
		deleteExpando = function(a, b) {
			for (var i = 0, l = b.length; i < l; i++) {
				try {
					delete a[b[i]]
				} catch (e) {
					if (a.removeAttribute) a.removeAttribute(b[i])
				}
			}
		},
		removeEvent = document.removeEventListener ?
	function(a, b, c) {
		a.removeEventListener(b, c, false)
	} : function(a, b, c) {
		a.detachEvent('on' + b, c)
	}, cleanData = function(a) {
		var b, data, cache = p.cache;
		for (var i = 0, elem;
		(elem = a[i]) != null; i++) {
			if (b = elem['lhguid']) {
				data = cache[b];
				if (data.events) {
					for (var c in data.events) removeEvent(elem, c, data.listener)
				}
				deleteExpando(elem, ['lhguid']);
				delete cache[b]
			}
		}
	};
	p.each(('blur,focus,load,resize,scroll,unload,click,dblclick,contextmenu,' + 'mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,' + 'change,select,submit,keydown,keypress,keyup,error').split(','), function(i, b) {
		p.fn[b] = function(a) {
			for (var i = 0, l = this.length; i < l; i++) {
				p.event.remove(this[i], b);
				this[i]['on' + b] = null;
				p.event.add(this[i], b, a)
			}
			return this
		}
	});
	if (m.ActiveXObject) {
		m.attachEvent('onunload', function() {
			for (var a in p.cache) {
				try {
					p.event.remove(p.cache[a].elem)
				} catch (e) {}
			}
		})
	}(function() {
		var l = !! document.getElementsByClassName,
			que = !! document.querySelectorAll,
			rSimple = /^[\w:.][\w-]*$/,
			combine = / *, */,
			chunker = /([^[:.#]+)?(?:#([^[:.#]+))?(?:\.([^[:.]+))?(?:\[([^!&^*|$[:=]+)([!$^*|&]?=)?([^:\]]+)?\])?(?:\:([^(]+)(?:\(([^)]+)\))?)?/,
			rnth = /(-?)(\d*)n((?:\+|-)?\d*)/,
			ratt = /\]\[/g,
			rchild = /(~|>|\+)/,
			rspace = / +/,
			general = /(\[[^\]]+)~/,
			adjacent = /(\([^)]*)\+/,
			query = function(a, b) {
				b = b || document;
				var c = [];
				if (rSimple.test(a) && b.nodeType) {
					var d = 0;
					switch (a.charAt(0)) {
					case '.':
						var f = a.slice(1);
						if (l) c = b.getElementsByClassName(f);
						else {
							f = ' ' + f + ' ';
							var g = b.getElementsByTagName('*'),
								i = 0,
								j;
							while (j = g[i++]) {
								if ((' ' + j.className + ' ').indexOf(f) !== -1) c[d++] = j
							}
							c = d ? c : []
						}
						break;
					case ':':
						var j, g = b.getElementsByTagName('*'),
							i = 0,
							mod = a.slice(1);
						while (j = g[i++]) {
							if (mods[mod] && mods[mod](j)) c[d++] = j
						}
						c = d ? c : [];
						break;
					default:
						c = b.getElementsByTagName(a);
						break
					}
				} else {
					if (que) {
						try {
							return b.querySelectorAll(a)
						} catch (e) {}
					}
					var k = a.split(combine),
						gl = k.length - 1,
						concat = !! gl,
						group, singles, singles_length, single, i, ancestor, g, tag, id, cls, attr, eql, mod, ind, newNodes, d, J, child, last, childs, item, h;
					while (group = k[gl--]) {
						singles_length = (singles = group.replace(ratt, "] % [").replace(adjacent, "$1%").replace(general, "$1&").replace(rchild, " $1 ").split(rspace)).length;
						i = 0;
						ancestor = ' ';
						g = b.nodeType ? [b] : toArray(b);
						while (single = singles[i++]) {
							if (single !== '%' && single !== ' ' && single !== '>' && single !== '~' && single !== '+' && g) {
								single = single.match(chunker);
								tag = single[1] || '*';
								id = single[2];
								cls = single[3] ? ' ' + single[3] + ' ' : '';
								attr = single[4];
								eql = single[5] || '';
								mod = single[7];
								ind = mod === 'nth-child' ? rnth.exec(single[8] === 'even' && '2n' || single[8] === 'odd' && '2n+1' || !/\D/.test(single[8]) && '0n+' + single[8] || single[8]) : single[8];
								newNodes = [];
								d = J = 0;
								last = i == singles_length;
								while (child = g[J++]) {
									switch (ancestor) {
									case ' ':
										childs = child.getElementsByTagName(tag);
										h = 0;
										while (item = childs[h++]) {
											if ((!id || item.id === id) && (!cls || (' ' + item.className + ' ').indexOf(cls) !== -1) && (!attr || (attrs[eql] && (attrs[eql](item, attr, single[6]) || (attr === 'class' && attrs[eql](item, 'className', single[6]))))) && !item.yeasss && (mods[mod] ? mods[mod](item, ind) : !mod)) {
												if (last) item.yeasss = 1;
												newNodes[d++] = item
											}
										}
										break;
									case '~':
										tag = tag.toLowerCase();
										while ((child = child.nextSibling) && !child.yeasss) {
											if (child.nodeType === 1 && (tag === '*' || child.nodeName.toLowerCase() === tag) && (!id || child.id === id) && (!cls || (' ' + child.className + ' ').indexOf(cls) !== -1) && (!attr || (attrs[eql] && (attrs[eql](item, attr, single[6]) || (attr === 'class' && attrs[eql](item, 'className', single[6]))))) && !child.yeasss && (mods[mod] ? mods[mod](child, ind) : !mod)) {
												if (last) child.yeasss = 1;
												newNodes[d++] = child
											}
										}
										break;
									case '+':
										while ((child = child.nextSibling) && child.nodeType !== 1) {}
										if (child && (child.nodeName.toLowerCase() === tag.toLowerCase() || tag === '*') && (!id || child.id === id) && (!cls || (' ' + item.className + ' ').indexOf(cls) !== -1) && (!attr || (attrs[eql] && (attrs[eql](item, attr, single[6]) || (attr === 'class' && attrs[eql](item, 'className', single[6]))))) && !child.yeasss && (mods[mod] ? mods[mod](child, ind) : !mod)) {
											if (last) child.yeasss = 1;
											newNodes[d++] = child
										}
										break;
									case '>':
										childs = child.getElementsByTagName(tag);
										h = 0;
										while (item = childs[h++]) {
											if (item.parentNode === child && (!id || item.id === id) && (!cls || (' ' + item.className + ' ').indexOf(cls) !== -1) && (!attr || (attrs[eql] && (attrs[eql](item, attr, single[6]) || (attr === 'class' && attrs[eql](item, 'className', single[6]))))) && !item.yeasss && (mods[mod] ? mods[mod](item, ind) : !mod)) {
												if (last) item.yeasss = 1;
												newNodes[d++] = item
											}
										}
										break;
									case '%':
										item = child;
										if ((!attr || (attrs[eql] && (attrs[eql](item, attr, single[6]) || (attr === 'class' && attrs[eql](item, 'className', single[6]))))) && !item.yeasss) {
											if (last) item.yeasss = 1;
											newNodes[d++] = item
										}
										break
									}
								}
								g = newNodes
							} else ancestor = single
						}
						if (concat) {
							if (!g.concat) {
								newNodes = [];
								h = 0;
								while (item = g[h]) newNodes[h++] = item;
								g = newNodes
							}
							c = g.concat(c.length == 1 ? c[0] : c)
						} else c = g
					}
					d = c.length;
					while (d--) deleteExpando(c[d], ['yeasss', 'nodeIndex'])
				}
				return c
			},
			attrs = {
				'': function(a, b) {
					return !!a.getAttribute(b)
				},
				'=': function(a, b, c) {
					return (b = a.getAttribute(b)) && b === c
				},
				'^=': function(a, b, c) {
					return (b = a.getAttribute(b) + '') && !b.indexOf(c)
				},
				'$=': function(a, b, c) {
					return (b = a.getAttribute(b) + '') && b.indexOf(c) == b.length - c.length
				},
				'*=': function(a, b, c) {
					return (b = a.getAttribute(b) + '') && b.indexOf(c) !== -1
				},
				'!=': function(a, b, c) {
					return !(b = a.getAttribute(b)) || !(new RegExp('(^| +)' + c + '($| +)').test(b))
				}
			},
			mods = {
				'first-child': function(a) {
					return a.parentNode.getElementsByTagName('*')[0] === a
				},
				'last-child': function(a) {
					var b = a;
					while ((b = b.nextSibling) && b.nodeType === 1) {}
					return !!b
				},
				'nth-child': function(c, d) {
					var a = (d[1] + (d[2] || 1)) - 0,
						b = d[3] - 0,
						parent = c.parentNode;
					if (parent && !parent.nodeIndex) {
						var e = 0,
							node = c;
						for (node = parent.firstChild; node; node = node.nextSibling) {
							if (node.nodeType === 1) node.nodeIndex = ++e
						}
					}
					var f = c.nodeIndex - b;
					if (a === 0) return f === 0;
					else return (f % a === 0 && f / a >= 0)
				},
				empty: function(a) {
					return !a.firstChild
				},
				parent: function(a) {
					return a.firstChild
				},
				checked: function(a) {
					return a.checked
				},
				enabled: function(a) {
					return !a.disabled && a.type !== 'hidden'
				},
				disabled: function(a) {
					return a.disabled
				},
				hidden: function(a) {
					return a.type === 'hidden' || a.style.display === 'none'
				},
				visible: function(a) {
					return a.type !== 'hidden' && a.style.display !== 'none'
				},
				selected: function(a) {
					a.parentNode.selectedIndex;
					return a.selected
				},
				radio: function(a) {
					return a.type === 'radio'
				},
				checkbox: function(a) {
					return a.type === 'checkbox'
				},
				text: function(a) {
					return a.type === 'text'
				},
				button: function(a) {
					return a.type === 'button' || a.nodeName.toLowerCase() === 'button'
				}
			};
		p.find = query
	})();
	var u = document.defaultView || {},
		rspec = /href|src|style/,
		rspace = /\s+/,
		rclass = /[\n\t]/g,
		rfloat = /float/i,
		rdashAlpha = /-([a-z])/ig,
		rupper = /([A-Z])/g,
		attrMap = {
			'class': 'className',
			'for': 'htmlFor'
		},
		cssMap = {
			'float': browser.msie ? 'styleFloat' : 'cssFloat'
		},
		fcamelCase = function(a, b) {
			return b.toUpperCase()
		},
		access = function(a, b, c, d) {
			var e = b,
				i = 0,
				len = a.length;
			if (typeof b === 'string') {
				if (c === o) {
					d = d === 'css' ? 'getCSS' : 'getAttr';
					return len ? p[d](a[0], b) : null
				} else {
					e = {};
					e[b] = c
				}
			}
			for (; i < len; i++) {
				for (b in e) p[d](a[i], b, e[b])
			}
			return a
		};
	p.extend({
		attr: function(a, b, c) {
			b = attrMap[b] || b;
			var d = rspec.test(b);
			if (!d) a[b] = c;
			else {
				if (b == 'style' && browser.msie) a.style.cssText = c;
				else a.setAttribute(b, '' + c)
			}
		},
		getAttr: function(a, b) {
			b = attrMap[b] || b;
			var c = rspec.test(b);
			if (!c) {
				if (isNode(a, 'form') && a.getAttributeNode(b)) return a.getAttributeNode(b).nodeValue;
				return a[b]
			} else {
				var d = browser.msie && c ? a.getAttribute(b, 2) : a.getAttribute(b);
				return d === null ? o : d
			}
		},
		css: function(a, b, c) {
			a = a.style;
			b = cssMap[b] || b;
			if (browser.msie && b == 'opacity') a.filter = (a.filter || '').replace(/alpha\([^)]*\)/, '') + (parseInt(c) + '' == 'NaN' ? '' : 'alpha(opacity=' + c * 100 + ')');
			else {
				b = b.replace(rdashAlpha, fcamelCase);
				a[b] = c
			}
		},
		getCSS: function(a, b) {
			var c, style = a.style;
			if (b == 'opacity') {
				return browser.msie ? (style.filter && style.filter.indexOf('opacity=') >= 0 ? parseFloat(style.filter.match(/opacity=([^)]*)/)[1]) / 100 : 1) : style.opacity ? parseFloat(style.opacity) : 1
			}
			if (rfloat.test(b)) b = p.props['float'];
			if (style && style[b]) c = style[b];
			else if (u.getComputedStyle) {
				if (rfloat.test(b)) b = 'float';
				b = b.replace(rupper, '-$1').toLowerCase();
				var d = u.getComputedStyle(a, null);
				if (d) c = d.getPropertyValue(b)
			} else if (a.currentStyle) {
				var e = b.replace(rdashAlpha, fcamelCase);
				c = a.currentStyle[b] || a.currentStyle[e]
			}
			return c
		}
	});
	var v = /^<(\w+)\s*\/?>(?:<\/\1>)?$/,
		rxhtmlTag = /(<([\w:]+)[^>]*?)\/>/g,
		rhtml = /<|&\w+;/,
		rtagName = /<([\w:]+)/,
		rnocache = /<script|<object|<embed|<option|<style/i,
		rselfClosing = /^(?:area|br|col|embed|hr|img|input|link|meta|param)$/i,
		fcloseTag = function(a, b, c) {
			return rselfClosing.test(c) ? a : b + '></' + c + '>'
		},
		wrapMap = {
			option: [1, '<select multiple="multiple">', '</select>'],
			legend: [1, '<fieldset>', '</fieldset>'],
			thead: [1, '<table>', '</table>'],
			tr: [2, '<table><tbody>', '</tbody></table>'],
			td: [3, '<table><tbody><tr>', '</tr></tbody></table>'],
			rdefault: [0, '', '']
		};
	wrapMap.tbody = wrapMap.caption = wrapMap.thead;
	wrapMap.th = wrapMap.td;
	if (browser.msie) wrapMap.link = wrapMap.script = [1, 'div<div>', '</div>'];
	var w = function(a, b, c, d) {
			b = b || document;
			if (typeof b.createElement === 'undefined') b = b.ownerDocument || b[0] && b[0].ownerDocument || document;
			var e = [],
				i = 0,
				l = a.length,
				elem;
			for (; i < l; i++) {
				elem = a[i];
				if (!elem) return;
				if (typeof elem === 'string' && !rhtml.test(elem)) elem = b.createTextNode(elem);
				else if (typeof elem === 'string') {
					elem = elem.replace(rxhtmlTag, fcloseTag);
					var f = (rtagName.exec(elem) || ['', ''])[1].toLowerCase(),
						wrap = wrapMap[f] || wrapMap.rdefault,
						depth = wrap[0],
						div = b.createElement('div');
					div.innerHTML = wrap[1] + elem + wrap[2];
					while (depth--) div = div.lastChild;
					if (browser.msie && /^\s+/.test(elem)) div.insertBefore(b.createTextNode(/^\s+/.exec(elem)[0]), div.firstChild);
					elem = toArray(div.childNodes)
				}
				if (elem.nodeType) e.push(elem);
				else e = e.concat(elem)
			}
			if (c) {
				for (var i = 0; e[i]; i++) {
					if (d && isNode(e[i], 'script') && (!e[i].type || e[i].type.toLowerCase() === 'text/javascript')) d.push(e[i].parentNode ? e[i].parentNode.removeChild(e[i]) : e[i]);
					else {
						if (e[i].nodeType === 1) e.splice.apply(e, [i + 1, 0].concat(toArray(e[i].getElementsByTagName('script'))));
						c.appendChild(e[i])
					}
				}
			}
			return e
		},
		buildFragment = function(a, b, c) {
			var d, cacheable, cacheresults, doc = b[0].ownerDocument || b[0];
			if (a.length === 1 && typeof a[0] === 'string' && doc === document) {
				cacheable = true;
				cacheresults = p.fragments[a[0]];
				if (cacheresults) {
					if (cacheresults !== 1) d = cacheresults
				}
			}
			if (!d) {
				d = doc.createDocumentFragment();
				w(a, doc, d, c)
			}
			if (cacheable) p.fragments[a[0]] = cacheresults ? d : 1;
			return {
				fragment: d,
				cacheable: cacheable
			}
		};
	p.fragments = {};
	p.each({
		appendTo: 'append',
		prependTo: 'prepend',
		insertBefore: 'before',
		insertAfter: 'after'
	}, function(c, d) {
		p.fn[c] = function(a) {
			var b = this[0].ownerDocument || this[0],
				insert = p(a, b);
			for (var i = 0, l = this.length; i < l; i++) insert[d](this[i]);
			return this
		}
	});
	var x = function(i, a) {
			if (a.src) p.ajax({
				url: a.src,
				async: false,
				dataType: 'script'
			});
			else p.globalEval(a.text || a.textContent || a.innerHTML || '');
			if (a.parentNode) a.parentNode.removeChild(a)
		},
		dir = function(a, b) {
			var c = [],
				cur = a[b];
			while (cur && cur != document) {
				if (cur.nodeType === 1) c.push(cur);
				cur = cur[b]
			}
			return c
		},
		nth = function(a, b, c, d) {
			b = b || 1;
			var e = 0;
			for (; a; a = a[c]) if (a.nodeType == 1 && ++e == b) break;
			return a
		},
		sibling = function(n, a) {
			var r = [];
			for (; n; n = n.nextSibling) if (n.nodeType == 1 && n != a) r.push(n);
			return r
		};
	p.each({
		parent: function(a) {
			return a.parentNode
		},
		parents: function(a) {
			return dir(a, 'parentNode')
		},
		next: function(a) {
			return nth(a, 2, 'nextSibling')
		},
		prev: function(a) {
			return nth(a, 2, 'previousSibling')
		},
		nextAll: function(a) {
			return dir(a, 'nextSibling')
		},
		prevAll: function(a) {
			return dir(a, 'previousSibling')
		},
		siblings: function(a) {
			return sibling(a.parentNode.firstChild, a)
		},
		children: function(a) {
			return sibling(a.firstChild)
		}
	}, function(c, d) {
		p.fn[c] = function(a) {
			var b = map(this, d),
				r = [];
			if (a && typeof a === 'string') {
				for (var i = 0, l = b.length; i < l; i++) if (p(b[i]).is(a)) r.push(b[i]);
				b = r
			}
			return this.setArray(b)
		}
	});
	var y = /select|textarea/i,
		rinput = /text|hidden|password|search/i,
		rts = /(\?|&)_=.*?(&|$)/,
		rurl = /^(\w+:)?\/\/([^\/?#]+)/,
		r20 = /%20/g;
	p.fn.extend({
		serialize: function() {
			return p.param(this.serializeArray())
		},
		serializeArray: function() {
			return this.map(function() {
				return this.elements ? toArray(this.elements) : this
			}).filter(function() {
				return this.name && !this.disabled && (this.checked || y.test(this.nodeName) || rinput.test(this.type))
			}).map(function() {
				var b = p(this).val();
				return b == null ? null : isArray(b) ? map(b, function(a, i) {
					return {
						name: elem.name,
						value: a
					}
				}) : {
					name: elem.name,
					value: b
				}
			}).get()
		}
	});
	p.extend({
		ajaxSet: {
			url: location.href,
			type: 'GET',
			contentType: 'application/x-www-form-urlencoded',
			async: true,
			xhr: function() {
				return m.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest()
			},
			accepts: {
				xml: 'application/xml, text/xml',
				html: 'text/html',
				script: "text/javascript, application/javascript",
				json: "application/json, text/javascript",
				text: 'text/plain',
				rdefault: '*/*'
			}
		},
		ajax: function(r) {
			r = p.extend(p.ajaxSet, r);
			var b, data, type = r.type.toUpperCase();
			if (r.data && typeof r.data !== 'string') r.data = p.param(r.data);
			if (r.dataType == 'script' && r.cache == null) r.cache = false;
			if (r.cache === false && type == 'GET') {
				var c = (new Date).getTime();
				var d = r.url.replace(rts, '$1_=' + c + '$2');
				r.url = d + ((d == r.url) ? (r.url.match(/\?/) ? '&' : '?') + '_=' + c : '')
			}
			if (r.data && type == 'GET') {
				r.url += (r.url.match(/\?/) ? '&' : '?') + r.data;
				r.data = null
			}
			var f = /^(\w+:)?\/\/([^\/?#]+)/.exec(r.url);
			if (r.dataType == 'script' && type == 'GET' && f && (f[1] && f[1] != location.protocol || f[2] != location.host)) {
				var g = false,
					head = document.getElementsByTagName('head')[0],
					script = document.createElement('script');
				script.onload = script.onreadystatechange = function() {
					if (!g && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
						g = true;
						success();
						complete();
						script.onload = script.onreadystatechange = null;
						head.removeChild(script)
					}
				};
				head.appendChild(script);
				return o
			}
			var h = false,
				xhr = r.xhr();
			if (r.username) xhr.open(type, r.url, r.async, r.username, r.password);
			else xhr.open(type, r.url, r.async);
			try {
				if (r.data) xhr.setRequestHeader('Content-Type', r.contentType);
				xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				xhr.setRequestHeader('Accept', r.dataType && r.accepts[r.dataType] ? r.accepts[r.dataType] + ', */*' : r.accepts.rdefault)
			} catch (e) {}
			if (r.beforeSend && r.beforeSend(xhr, r) === false) {
				xhr.abort();
				return false
			}
			var i = function(a) {
					if (xhr.readyState == 0) {
						if (j) {
							clearInterval(j);
							j = null
						}
					} else if (!h && xhr && (xhr.readyState == 4 || a == 'timeout')) {
						h = true;
						if (j) {
							clearInterval(j);
							j = null
						}
						b = a == 'timeout' ? 'timeout' : !p.httpSuccess(xhr) ? 'error' : 'success';
						if (b == 'success') {
							try {
								data = p.httpData(xhr, r.dataType, r)
							} catch (e) {
								b = 'parsererror'
							}
						}
						if (b == 'success') success();
						else p.handleError(r, xhr, b);
						complete();
						if (a) xhr.abort();
						if (r.async) xhr = null
					}
				};
			if (r.async) {
				var j = setInterval(i, 13);
				if (r.timeout > 0) setTimeout(function() {
					if (xhr && !h) i('timeout')
				}, r.timeout)
			}
			try {
				xhr.send(r.data)
			} catch (e) {
				p.handleError(r, xhr, null, e)
			}
			if (!r.async) i();

			function success() {
				if (r.success) r.success(data, b)
			}
			function complete() {
				if (r.complete) r.complete(xhr, b)
			}
			return xhr
		},
		handleError: function(r, a, b, e) {
			if (r.error) r.error(a, b, e)
		},
		httpSuccess: function(a) {
			try {
				return !a.status && location.protocol == 'file:' || (a.status >= 200 && a.status < 300) || a.status == 304 || a.status == 1223
			} catch (e) {}
			return false
		},
		httpData: function(a, b, r) {
			var c = a.getResponseHeader('content-type'),
				xml = b == 'xml' || !b && c && c.indexOf('xml') >= 0,
				data = xml ? a.responseXML : a.responseText;
			if (xml && data.documentElement.tagName == 'parsererror') throw 'parsererror';
			if (typeof data === 'string') {
				if (b == 'script') p.globalEval(data);
				if (b == 'json') data = m['eval']('(' + data + ')')
			}
			return data
		},
		param: function(a) {
			var s = [];

			function add(a, b) {
				s[s.length] = encodeURIComponent(a) + '=' + encodeURIComponent(b)
			};
			if (isArray(a) || a.lhgren) for (var i = 0, l = a.length; i < l; i++) add(a[i].name, a[i].value);
			else for (var j in a) if (isArray(a[j])) for (var i = 0, l = a[j].length; i < l; i++) add(j, a[j][i]);
			else add(j, isFunction(a[j]) ? a[j]() : a[j]);
			return s.join('&').replace(r20, '+')
		}
	});
	m.lhgcore = m.J = p
})(window);