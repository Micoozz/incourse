(function(a) {
	try {
		document.execCommand("BackgroundImageCache", !1, !0)
	} catch (b) {}
	var c = /\b(\w)\b/g,
		d, e, f, g, h, i, k, l, m, n, o, p, q, r, s, t, u, v = a.browser.msie && a.browser.version < 7 ? !0 : !1,
		w = v ? '<iframe id="lhgcal_iframe" hideFocus="true" frameborder="0" src="about:blank" style="position:absolute;z-index:-1;width:100%;top:0px;left:0px;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)"></iframe>' : "",
		x = ['<div id="lhgcalendar" class="lhgcal" style="display:none;">', '<table border="0" cellspacing="0" cellpadding="0" width="100%">', "<tr>", '<td class="lhgcal_leftTop"></td>', '<td class="lhgcal_top"></td>', '<td class="lhgcal_rightTop"></td>', "</tr>", "<tr>", '<td class="lhgcal_left"></td>', "<td>", '<div class="lhgcal_head">', '<div class="lhgcal_head_preyear"><a id="lhgPreYear" href="###"></a></div>', '<div class="lhgcal_head_premonth"><a id="lhgPreMonth" href="###"></a></div>', '<div class="lhgcal_head_year"><input id="lhgYearBox" maxlength="4"/></div>', '<div class="lhgcal_head_month"><input id="lhgMonthBox" maxlength="2"/></div>', '<div class="lhgcal_head_nextyear"><a id="lhgNextYear" href="###"></a></div>', '<div class="lhgcal_head_nextmonth"><a id="lhgNextMonth" href="###"></a></div>', '<div id="lhgYearList" class="lhgcal_yearlist" style="display:none">', '<table width="73" cellspacing="1" cellpadding="0" border="0">', '<tbody id="yearListBox"></tbody>', "</table>", "</div>", '<div id="lhgMonthList" class="lhgcal_monthlist" style="display:none">', '<table width="73" cellspacing="1" cellpadding="0" border="0">', '<tbody id="monthListBox"></tbody>', "</table>", "</div>", "</div>", '<div class="lhgcal_body">', '<table width="100%" cellspacing="1" cellpadding="0" border="0">', "<thead><tr>", "<td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td>", "</tr></thead>", '<tbody id="lhgDayBox">', "</tbody>", "</table>", "</div>", '<div class="lhgcal_foot">', '<table width="100%" cellspacing="0" cellpadding="0" border="0">', "<tr>", '<td align="center" class="lhgcal_foot_today"><a id="lhgTodayBox" href="###">今天</a></td>', '<td align="center" class="lhgcal_foot_time"><input id="lhgHourBox" maxlength="2"/>:<input id="lhgMinuteBox" maxlength="2"/>:<input id="lhgSecondBox" maxlength="2"/</td>', '<td align="center" class="lhgcal_foot_del"><a id="lhgDelBox" href="###">清空</a></td>', "</tr>", "</table>", "</div>", "</td>", '<td class="lhgcal_right"></td>', "</tr>", "<tr>", '<td class="lhgcal_leftBottom"></td>', '<td class="lhgcal_bottom"></td>', '<td class="lhgcal_rightBottom"></td>', "</tr>", "</table>", w, "</div>"].join(""),
		y = function() {
			if (a.browser.msie) return window.event;
			var b = y.caller;
			while (b != null) {
				var c = b.arguments[0];
				if (c && (c + "").indexOf("Event") >= 0) return c;
				b = b.caller
			}
			return null
		},
		z = function(a) {
			var b = a.keyCode || a.charCode;
			return b >= 48 && b <= 57 || b >= 37 && b <= 40 || b == 8 || b == 46
		},
		A = function(a) {
			a = a || document;
			return a.compatMode === "CSS1Compat" ? a.documentElement : a.body
		},
		B = function(a) {
			a = a || window;
			var b = A(a.document);
			return {
				w: b.clientWidth || 0,
				h: b.clientHeight || 0
			}
		},
		C = function(a) {
			a = a || window;
			var b = A(a.document);
			return {
				w: Math.max(b.scrollWidth, b.clientWidth || 0),
				h: Math.max(b.scrollHeight, b.clientHeight || 0),
				x: a.pageXOffset || b.scrollLeft || 0,
				y: a.pageYOffset || b.scrollTop || 0
			}
		},
		D = function() {
			var b = a("script"),
				c = "",
				d = 0,
				e = b.length,
				f = /lhgcalendar(?:\.min)?\.js/i;
			for (; d < e; d++) if (f.test(b[d].src)) {
				c = !document.querySelector ? b[d].getAttribute("src", 4) : b[d].src;
				break
			}
			return c.substr(0, c.lastIndexOf("/") + 1)
		},
		E = function(b, d) {
			var e = new Date;
			/%/.test(b) ? b = b.replace(/%y/, e.getFullYear()).replace(/%M/, e.getMonth() + 1).replace(/%d/, e.getDate()).replace(/%H/, e.getHours()).replace(/%m/, e.getMinutes()).replace(/%s/, e.getSeconds()).replace(c, "0$1") : /^#[\w-]+$/.test(b) && (b = a.trim(a(b).val()), b.length > 0 && d && (b = G.call(F(b, d), "yyyy-MM-dd")));
			return b
		},
		F = function(b, c) {
			function q(a) {
				var b = [],
					c = 0,
					d;
				yi = a.indexOf("yyyy"), yi < 0 && (yi = a.indexOf("yy")), yi >= 0 && (b[c] = yi, c++), Mi = a.indexOf("MM"), Mi < 0 && (Mi = a.indexOf("M")), Mi >= 0 && (b[c] = Mi, c++), di = a.indexOf("dd"), di < 0 && (di = a.indexOf("d")), di >= 0 && (b[c] = di, c++), Hi = a.indexOf("HH"), Hi < 0 && (Hi = a.indexOf("H")), Hi >= 0 && (b[c] = Hi, c++), mi = a.indexOf("mm"), mi < 0 && (mi = a.indexOf("m")), mi >= 0 && (b[c] = mi, c++), si = a.indexOf("ss"), si < 0 && (si = a.indexOf("s")), si >= 0 && (b[c] = si, c++), d = [yi, Mi, di, Hi, mi, si];
				for (c = 0; c < b.length - 1; c++) for (j = 0; j < b.length - 1 - c; j++) if (b[j] > b[j + 1]) {
					var e = b[j];
					b[j] = b[j + 1], b[j + 1] = e
				}
				for (c = 0; c < b.length; c++) for (j = 0; j < d.length; j++) b[c] == d[j] && (d[j] = c);
				return d
			}
			function p(b, c) {
				sting = a.trim(b);
				if (b !== "") {
					c = c.replace(/yyyy/, y4).replace(/yy/, y2).replace(/MM/, M2).replace(/M/, M1).replace(/dd/, d2).replace(/d/, d1).replace(/HH/, H2).replace(/H/, H1).replace(/mm/, m2).replace(/m/, m1).replace(/ss/, s2).replace(/s/, s1), c = new RegExp("^" + c + "$"), d = c;
					return c.test(b)
				}
			}
			var d, e = new Date;
			y4 = "([0-9]{4})", y2 = "([0-9]{2})", yi = -1, M2 = "(0[1-9]|1[0-2])", M1 = "([1-9]|1[0-2])", Mi = -1, d2 = "(0[1-9]|[1-2][0-9]|30|31)", d1 = "([1-9]|[1-2][0-9]|30|31)", di = -1, H2 = "([0-1][0-9]|20|21|22|23)", H1 = "([0-9]|1[0-9]|20|21|22|23)", Hi = -1, m2 = "([0-5][0-9])", m1 = "([0-9]|[1-5][0-9])", mi = -1, s2 = "([0-5][0-9])", s1 = "([0-9]|[1-5][0-9])", si = -1;
			if (p(b, c)) {
				var f = d.exec(b),
					g = q(c),
					h = g[0] >= 0 ? f[g[0] + 1] : e.getFullYear(),
					i = g[1] >= 0 ? f[g[1] + 1] - 1 : e.getMonth(),
					k = g[2] >= 0 ? f[g[2] + 1] : e.getDate(),
					l = g[3] >= 0 ? f[g[3] + 1] : e.getHours(),
					m = g[4] >= 0 ? f[g[4] + 1] : e.getMinutes(),
					n = g[5] >= 0 ? f[g[5] + 1] : e.getSeconds(),
					o;
				o = new Date(h, i, k, l, m, n);
				return o.getDate() == k ? o : e
			}
			return e
		},
		G = function(a) {
			var b = {
				"M+": this.getMonth() + 1,
				"d+": this.getDate(),
				"h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12,
				"H+": this.getHours(),
				"m+": this.getMinutes(),
				"s+": this.getSeconds(),
				"q+": Math.floor((this.getMonth() + 3) / 3),
				w: "0123456".indexOf(this.getDay()),
				S: this.getMilliseconds()
			};
			/(y+)/.test(a) && (a = a.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length)));
			for (var c in b)(new RegExp("(" + c + ")")).test(a) && (a = a.replace(RegExp.$1, RegExp.$1.length == 1 ? b[c] : ("00" + b[c]).substr(("" + b[c]).length)));
			return a
		},
		H = function() {
			var b = this,
				j, w, x, A, D, H, I, K = function(b) {
					var d = [],
						f, g, k, l, m, n, o = 0,
						p;
					w = b.getFullYear(), x = b.getMonth() + 1, A = b.getDate(), a(h).val(w), a(i).val(x), f = (new Date(w, x - 1, 1)).getDay(), g = (new Date(w, x - 1, 0)).getDate(), k = (new Date(w, x, 0)).getDate();
					for (var q = 0; q < f; q++) d.push(g), g--;
					d.reverse();
					for (var q = 1; q <= k; q++) d.push(q);
					for (var q = 1; q <= 42 - k - f; q++) d.push(q);
					l = document.createDocumentFragment();
					for (var q = 0; q < 6; q++) {
						m = document.createElement("tr");
						for (var r = 0; r < 7; r++) {
							n = document.createElement("td"), p = (w + "-" + x + "-" + d[o]).replace(c, "0$1");
							if (o < f || o >= k + f || j.minDate && j.minDate > p || j.maxDate && j.maxDate < p || j.disWeek && j.disWeek.indexOf(r) >= 0) N(n, d[o]);
							else if (j.disDate) {
								for (var s = 0, t = j.disDate.length; s < t; s++) {
									/%/.test(j.disDate[s]) && (j.disDate[s] = E(j.disDate[s]));
									var u = new RegExp(j.disDate[s]),
										v = j.enDate ? !u.test(p) : u.test(p);
									if (v) break
								}
								v ? N(n, d[o]) : N(n, d[o], !0)
							} else N(n, d[o], !0);
							m.appendChild(n), o++
						}
						l.appendChild(m)
					}
					a(e).empty().append(l)
				},
				L = function() {
					var b, c, d;
					d = document.createDocumentFragment();
					for (var e = 1900; e < 2051; e++) b = document.createElement("tr"), c = document.createElement("td"), a(c).hover(function() {
						this.style.backgroundColor = "#3991d1", this.style.color = "#fff"
					}, function() {
						this.style.backgroundColor = "#fff", this.style.color = "#000"
					}).html(e + "年").bind("mousedown", function(a) {
						h.value = this.innerHTML, K(new Date(parseInt(h.value, 10), x - 1, A))
					}), b.appendChild(c), d.appendChild(b);
					s.appendChild(d)
				},
				M = function() {
					var b, c, d;
					d = document.createDocumentFragment();
					for (var e = 1; e < 13; e++) b = document.createElement("tr"), c = document.createElement("td"), a(c).hover(function() {
						this.style.backgroundColor = "#3991d1", this.style.color = "#fff"
					}, function() {
						this.style.backgroundColor = "#fff", this.style.color = "#000"
					}).html(e + "月").bind("mousedown", function(a) {
						i.value = this.innerHTML, K(new Date(w, parseInt(i.value, 10) - 1, A))
					}), b.appendChild(c), d.appendChild(b);
					u.appendChild(d)
				},
				N = function(b, c, d) {
					d ? (a(b).html(c + "").hover(S, T).bind("click", U), c == A && a(b).addClass("lhgcal_td_today")) : a(b).html(c + "").css("color", "#999")
				},
				O = function(a) {
					K(new Date(w - 1, x - 1, A)), a.preventDefault()
				},
				P = function(a) {
					K(new Date(w, x - 2, A)), a.preventDefault()
				},
				Q = function(a) {
					K(new Date(w + 1, x - 1, A)), a.preventDefault()
				},
				R = function(a) {
					K(new Date(w, x, A)), a.preventDefault()
				},
				S = function() {
					a(this).addClass("lhgcal_td_back")
				},
				T = function() {
					a(this).removeClass("lhgcal_td_back")
				},
				U = function() {
					var c = parseInt(this.innerHTML, 10),
						d = new Date(w, x - 1, c);
					if (j.format.indexOf("H") >= 0) {
						var e = parseInt(o.value, 10),
							f = parseInt(p.value, 10),
							g = parseInt(q.value, 10);
						d = new Date(w, x - 1, c, e, f, g)
					}
					A = c, a(this).removeClass("lhg_td_back"), j.onSetDate && j.onSetDate.call(b), b.inpObj.value = G.call(d, j.format);
					if (j.real) {
						var h = j.format.indexOf("H") >= 0 ? "yyyy-MM-dd HH:mm:ss" : "yyyy-MM-dd";
						a("#" + j.real).val(G.call(d, h))
					}
					b.hideCalendar()
				};
			d = b.cal = a("#lhgcalendar").bind("click", function(a) {
				a.stopPropagation()
			}).bind("contextmenu", function(a) {
				a.preventDefault()
			})[0], f = a("#lhgPreYear")[0], g = a("#lhgPreMonth")[0], h = a("#lhgYearBox")[0], i = a("#lhgMonthBox")[0], k = a("#lhgNextYear")[0], l = a("#lhgNextMonth")[0], m = a("#lhgTodayBox")[0], n = a("#lhgDelBox")[0], e = a("#lhgDayBox")[0], o = a("#lhgHourBox")[0], p = a("#lhgMinuteBox")[0], q = a("#lhgSecondBox")[0], r = a("#lhgYearList")[0], s = a("#yearListBox")[0], t = a("#lhgMonthList")[0], u = a("#monthListBox")[0], b.Show = function(e) {
				var f = y(),
					g = f.srcElement || f.target,
					h, i, k, l, m, n;
				j = a.extend({
					id: null,
					format: "yyyy-MM-dd",
					minDate: null,
					maxDate: null,
					btnBar: !0,
					targetFormat: null,
					disWeek: null,
					onSetDate: null,
					real: null,
					disDate: null,
					enDate: !1
				}, e || {}), b.inpObj = j.id ? a("#" + j.id)[0] : g;
				if (!b.inpObj || b.inpObj.type !== "text") alert("你所指定的输入日期的文本框元素不存或不是文本框");
				else {
					j.btnBar ? a(".lhgcal_foot", d).css("display", "") : a(".lhgcal_foot", d).css("display", "none"), j.minDate && (j.minDate = E(j.minDate, j.targetFormat)), j.maxDate && (j.maxDate = E(j.maxDate, j.targetFormat)), h = a.trim(b.inpObj.value), h.length > 0 ? i = F(h, j.format) : i = new Date, K(i), I = i.getSeconds(), D = i.getHours(), H = i.getMinutes(), q.value = (I + "").replace(c, "0$1"), o.value = (D + "").replace(c, "0$1"), p.value = (H + "").replace(c, "0$1"), a(".lhgcal_foot_time input").attr("disabled", j.format.indexOf("H") >= 0 ? !1 : !0), d.style.display = "";
					var r = d.offsetHeight;
					v && a("#lhgcal_iframe").css("height", r + "px"), k = a(g).position(), l = k.top + g.offsetHeight, m = B(), solSize = C(), l + r > m.h + solSize.y && (l = k.top - r - 2), k.left + 182 > m.w + solSize.x && (k.left -= 182), a(d).css({

					}), f.stopPropagation ? f.stopPropagation() : f.cancelBubble = !0
				}
			}, b.hideCalendar = function() {
				d.style.display = "none"
			}, b.getDateStr = function(a) {
				var b = parseInt(o.value, 10),
					c = parseInt(p.value, 10),
					d = parseInt(q.value, 10);
				switch (a) {
				case "y":
					return w;
				case "M":
					return x;
				case "d":
					return A;
				case "H":
					return b;
				case "m":
					return c;
				case "s":
					return d;
				case "date":
					return w + "-" + x + "-" + A;
				case "dateTime":
					return w + "-" + x + "-" + A + " " + b + ":" + c + ":" + d
				}
			}, a(f).bind("click", O), a(g).bind("click", P), a(k).bind("click", Q), a(l).bind("click", R), a(h).bind("focus", function() {
				r.style.display = "", this.style.border = "1px solid #999"
			}).bind("blur", function() {
				r.style.display = "none", this.style.border = "1px solid #fff", K(new Date(parseInt(this.value, 10), x - 1, A))
			}).bind("keypress", z), a(i).bind("focus", function() {
				t.style.display = "", this.style.border = "1px solid #999"
			}).bind("blur", function() {
				t.style.display = "none", this.style.border = "1px solid #fff", K(new Date(w, parseInt(this.value, 10) - 1, A))
			}).bind("keypress", z), a(q).bind("keypress", z), a(o).bind("keypress", z), a(p).bind("keypress", z), a(n).bind("click", function(a) {
				b.inpObj.value = "", b.hideCalendar(), a.preventDefault()
			}), a(m).bind("click", function(a) {
				b.inpObj.value = G.call(new Date, j.format), b.hideCalendar(), a.preventDefault()
			}), L(), M(), a(document).bind("click", b.hideCalendar), document.compatMode !== "CSS1Compat" && (a(h).css({
				height: "16px",
				width: "49px"
			}), a(i).css({
				height: "16px",
				width: "30px"
			}), a(".lhgcal_foot_time input").css({
				height: "19px",
				width: "22px"
			})), a(window).bind("unload", function() {
				f = g = h = i = k = l = m = n = e = o = p = q = r = s = t = u = d = b.inpObj = null
			})
		};
	a.fn.position = function() {
		if (this[0]) {
			var a = this[0].getBoundingClientRect(),
				b = this[0].ownerDocument.documentElement,
				c = this[0].ownerDocument.body,
				d = b.clientTop || c.clientTop || 0,
				e = b.clientLeft || c.clientLeft || 0,
				f = a.top + (self.pageYOffset || b.scrollTop || c.scrollTop) - d,
				g = a.left + (self.pageXOffset || b.scrollLeft || c.scrollLeft) - e;
			return {
				top: f,
				left: g
			}
		}
		return this
	}, a.fn.calendar = function(b) {
		this[0] && a(this[0]).bind("click", function() {
			a.calendar.Show(b)
		});
		return this
	}, a(function() {
		a("body").append(x), a.calendar = new H
	}), a("head").append('<link href="' + D() + '../css/lhgcalendar.css" rel="stylesheet" type="text/css"/>')
})(lhgcore);