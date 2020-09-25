// Avoid `console` errors in browsers that lack a console.
(function () {
  var method;
  var noop = function () { };
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.
/* ---------------------- Begin - jquery.animateNumber ---------------------- */
//  jQuery animateNumber plugin v0.0.14
//  (c) 2013, Alexandr Borisov.
//  https://github.com/aishek/jquery-animateNumber
!function (e) { var t = function (e) { return e.split("").reverse().join("") }, n = { numberStep: function (t, n) { var r = Math.floor(t); e(n.elem).text(r) } }, r = function (e) { var t = e.elem; t.nodeType && t.parentNode && ((t = t._animateNumberSetter) || (t = n.numberStep), t(e.now, e)) }; e.Tween && e.Tween.propHooks ? e.Tween.propHooks.number = { set: r } : e.fx.step.number = r, e.animateNumber = { numberStepFactories: { append: function (t) { return function (n, r) { var o = Math.floor(n); e(r.elem).prop("number", n).text(o + t) } }, separator: function (n, r, o) { return n = n || " ", r = r || 3, o = o || "", function (a, i) { var u = 0 > a, p = Math.floor((u ? -1 : 1) * a).toString(), m = e(i.elem); if (p.length > r) { for (var f, l, c, h = p, s = r, b = h.split("").reverse(), v = (p = [], 0), S = Math.ceil(h.length / s); v < S; v++) { for (f = "", c = 0; c < s && (l = v * s + c) !== h.length; c++)f += b[l]; p.push(f) } h = p.length - 1, s = t(p[h]), p[h] = t(parseInt(s, 10).toString()), p = p.join(n), p = t(p) } m.prop("number", a).text((u ? "-" : "") + p + o) } } } }, e.fn.animateNumber = function () { for (var t = arguments[0], r = e.extend({}, n, t), o = e(this), a = [r], i = 1, u = arguments.length; i < u; i++)a.push(arguments[i]); if (t.numberStep) { var p = this.each((function () { this._animateNumberSetter = t.numberStep })), m = r.complete; r.complete = function () { p.each((function () { delete this._animateNumberSetter })), m && m.apply(this, arguments) } } return o.animate.apply(o, a) } }(jQuery);
/* ----------------------- End - jquery.animateNumber ----------------------- */


/* ------------------------ Begin - jQuery.countdown ------------------------ */
//  * The Final Countdown for jQuery v2.2.0 (http://hilios.github.io/jQuery.countdown/)
//  * Copyright (c) 2016 Edson Hilios
!function (a) { "use strict"; "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery) }(function (a) { "use strict"; function b(a) { if (a instanceof Date) return a; if (String(a).match(g)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a = String(a).replace(/\-/g, "/")), new Date(a); throw new Error("Couldn't cast `" + a + "` to a date object.") } function c(a) { var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1"); return new RegExp(b) } function d(a) { return function (b) { var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi); if (d) for (var f = 0, g = d.length; f < g; ++f) { var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/), j = c(h[0]), k = h[1] || "", l = h[3] || "", m = null; h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (m = e(l, m)), "" === k && m < 10 && (m = "0" + m.toString()), b = b.replace(j, m.toString())) } return b = b.replace(/%%/, "%") } } function e(a, b) { var c = "s", d = ""; return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])), Math.abs(b) > 1 ? c : d } var f = [], g = [], h = { precision: 100, elapse: !1, defer: !1 }; g.push(/^[0-9]*$/.source), g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g = new RegExp(g.join("|")); var i = { Y: "years", m: "months", n: "daysToMonth", d: "daysToWeek", w: "weeks", W: "weeksToMonth", H: "hours", M: "minutes", S: "seconds", D: "totalDays", I: "totalHours", N: "totalMinutes", T: "totalSeconds" }, j = function (b, c, d) { this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.options = a.extend({}, h), this.instanceNumber = f.length, f.push(this), this.$el.data("countdown-instance", this.instanceNumber), d && ("function" == typeof d ? (this.$el.on("update.countdown", d), this.$el.on("stoped.countdown", d), this.$el.on("finish.countdown", d)) : this.options = a.extend({}, h, d)), this.setFinalDate(c), this.options.defer === !1 && this.start() }; a.extend(j.prototype, { start: function () { null !== this.interval && clearInterval(this.interval); var a = this; this.update(), this.interval = setInterval(function () { a.update.call(a) }, this.options.precision) }, stop: function () { clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped") }, toggle: function () { this.interval ? this.stop() : this.start() }, pause: function () { this.stop() }, resume: function () { this.start() }, remove: function () { this.stop.call(this), f[this.instanceNumber] = null, delete this.$el.data().countdownInstance }, setFinalDate: function (a) { this.finalDate = b(a) }, update: function () { if (0 === this.$el.closest("html").length) return void this.remove(); var b, c = void 0 !== a._data(this.el, "events"), d = new Date; b = this.finalDate.getTime() - d.getTime(), b = Math.ceil(b / 1e3), b = !this.options.elapse && b < 0 ? 0 : Math.abs(b), this.totalSecsLeft !== b && c && (this.totalSecsLeft = b, this.elapsed = d >= this.finalDate, this.offset = { seconds: this.totalSecsLeft % 60, minutes: Math.floor(this.totalSecsLeft / 60) % 60, hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24, days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7, daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7, daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368), weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7), weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4, months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368), years: Math.abs(this.finalDate.getFullYear() - d.getFullYear()), totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24), totalHours: Math.floor(this.totalSecsLeft / 60 / 60), totalMinutes: Math.floor(this.totalSecsLeft / 60), totalSeconds: this.totalSecsLeft }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish"))) }, dispatchEvent: function (b) { var c = a.Event(b + ".countdown"); c.finalDate = this.finalDate, c.elapsed = this.elapsed, c.offset = a.extend({}, this.offset), c.strftime = d(this.offset), this.$el.trigger(c) } }), a.fn.countdown = function () { var b = Array.prototype.slice.call(arguments, 0); return this.each(function () { var c = a(this).data("countdown-instance"); if (void 0 !== c) { var d = f[c], e = b[0]; j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e)) } else new j(this, b[0], b[1]) }) } });
/* ------------------------- End - jQuery.countdown ------------------------- */


/* ----------------------- Begin - Lettering.js ---------------------- */
// * Lettering.JS 0.7.0
// * Copyright 2010, Dave Rupert http://daverupert.com
// * Released under the WTFPL license
// * http://sam.zoy.org/wtfpl/
!function (t) { function e(e, n, i, r) { var a = e.text(), c = a.split(n), s = ""; c.length && (t(c).each((function (t, e) { s += '<span class="' + i + (t + 1) + '" aria-hidden="true">' + e + "</span>" + r })), e.attr("aria-label", a).empty().append(s)) } var n = { init: function () { return this.each((function () { e(t(this), "", "char", "") })) }, words: function () { return this.each((function () { e(t(this), " ", "word", " ") })) }, lines: function () { return this.each((function () { var n = "eefec303079ad17405c889e092e105b0"; e(t(this).children("br").replaceWith(n).end(), n, "line", "") })) } }; t.fn.lettering = function (e) { return e && n[e] ? n[e].apply(this, [].slice.call(arguments, 1)) : "letters" !== e && e ? (t.error("Method " + e + " does not exist on jQuery.lettering"), this) : n.init.apply(this, [].slice.call(arguments, 0)) } }(jQuery);
/* --------------------------- End - Lettering.js --------------------------- */