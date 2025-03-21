(() => {
    var Tt = Object.create;
    var Te = Object.defineProperty;
    var Pt = Object.getOwnPropertyDescriptor;
    var $t = Object.getOwnPropertyNames;
    var Vt = Object.getPrototypeOf,
        Dt = Object.prototype.hasOwnProperty;
    var Nt = (x, k) => () => (
        k || x((k = { exports: {} }).exports, k), k.exports
    );
    var jt = (x, k, j, M) => {
        if ((k && typeof k == "object") || typeof k == "function")
            for (let N of $t(k))
                !Dt.call(x, N) &&
                    N !== j &&
                    Te(x, N, {
                        get: () => k[N],
                        enumerable: !(M = Pt(k, N)) || M.enumerable,
                    });
        return x;
    };
    var Mt = (x, k, j) => (
        (j = x != null ? Tt(Vt(x)) : {}),
        jt(
            k || !x || !x.__esModule
                ? Te(j, "default", { value: x, enumerable: !0 })
                : j,
            x
        )
    );
    var Pe = Nt((fe, pe) => {
        (function (x, k) {
            typeof fe == "object" && typeof pe < "u"
                ? (pe.exports = k())
                : typeof define == "function" && define.amd
                ? define(k)
                : ((x = typeof globalThis < "u" ? globalThis : x || self),
                  (x.TomSelect = k()));
        })(fe, function () {
            "use strict";
            function x(i, e) {
                i.split(/\s+/).forEach((t) => {
                    e(t);
                });
            }
            class k {
                constructor() {
                    (this._events = void 0), (this._events = {});
                }
                on(e, t) {
                    x(e, (s) => {
                        let n = this._events[s] || [];
                        n.push(t), (this._events[s] = n);
                    });
                }
                off(e, t) {
                    var s = arguments.length;
                    if (s === 0) {
                        this._events = {};
                        return;
                    }
                    x(e, (n) => {
                        if (s === 1) {
                            delete this._events[n];
                            return;
                        }
                        let o = this._events[n];
                        o !== void 0 &&
                            (o.splice(o.indexOf(t), 1), (this._events[n] = o));
                    });
                }
                trigger(e, ...t) {
                    var s = this;
                    x(e, (n) => {
                        let o = s._events[n];
                        o !== void 0 &&
                            o.forEach((r) => {
                                r.apply(s, t);
                            });
                    });
                }
            }
            function j(i) {
                return (
                    (i.plugins = {}),
                    class extends i {
                        constructor(...e) {
                            super(...e),
                                (this.plugins = {
                                    names: [],
                                    settings: {},
                                    requested: {},
                                    loaded: {},
                                });
                        }
                        static define(e, t) {
                            i.plugins[e] = { name: e, fn: t };
                        }
                        initializePlugins(e) {
                            var t, s;
                            let n = this,
                                o = [];
                            if (Array.isArray(e))
                                e.forEach((r) => {
                                    typeof r == "string"
                                        ? o.push(r)
                                        : ((n.plugins.settings[r.name] =
                                              r.options),
                                          o.push(r.name));
                                });
                            else if (e)
                                for (t in e)
                                    e.hasOwnProperty(t) &&
                                        ((n.plugins.settings[t] = e[t]),
                                        o.push(t));
                            for (; (s = o.shift()); ) n.require(s);
                        }
                        loadPlugin(e) {
                            var t = this,
                                s = t.plugins,
                                n = i.plugins[e];
                            if (!i.plugins.hasOwnProperty(e))
                                throw new Error(
                                    'Unable to find "' + e + '" plugin'
                                );
                            (s.requested[e] = !0),
                                (s.loaded[e] = n.fn.apply(t, [
                                    t.plugins.settings[e] || {},
                                ])),
                                s.names.push(e);
                        }
                        require(e) {
                            var t = this,
                                s = t.plugins;
                            if (!t.plugins.loaded.hasOwnProperty(e)) {
                                if (s.requested[e])
                                    throw new Error(
                                        'Plugin has circular dependency ("' +
                                            e +
                                            '")'
                                    );
                                t.loadPlugin(e);
                            }
                            return s.loaded[e];
                        }
                    }
                );
            }
            let M = (i) => (
                    (i = i.filter(Boolean)),
                    i.length < 2
                        ? i[0] || ""
                        : De(i) == 1
                        ? "[" + i.join("") + "]"
                        : "(?:" + i.join("|") + ")"
                ),
                N = (i) => {
                    if (!Ve(i)) return i.join("");
                    let e = "",
                        t = 0,
                        s = () => {
                            t > 1 && (e += "{" + t + "}");
                        };
                    return (
                        i.forEach((n, o) => {
                            if (n === i[o - 1]) {
                                t++;
                                return;
                            }
                            s(), (e += n), (t = 1);
                        }),
                        s(),
                        e
                    );
                },
                he = (i) => {
                    let e = ie(i);
                    return M(e);
                },
                Ve = (i) => new Set(i).size !== i.length,
                z = (i) =>
                    (i + "").replace(
                        /([\$\(\)\*\+\.\?\[\]\^\{\|\}\\])/gu,
                        "\\$1"
                    ),
                De = (i) => i.reduce((e, t) => Math.max(e, Ne(t)), 0),
                Ne = (i) => ie(i).length,
                ie = (i) => Array.from(i);
            let ge = (i) => {
                if (i.length === 1) return [[i]];
                let e = [],
                    t = i.substring(1);
                return (
                    ge(t).forEach(function (n) {
                        let o = n.slice(0);
                        (o[0] = i.charAt(0) + o[0]),
                            e.push(o),
                            (o = n.slice(0)),
                            o.unshift(i.charAt(0)),
                            e.push(o);
                    }),
                    e
                );
            };
            let je = [[0, 65535]],
                Me = "[\u0300-\u036F\xB7\u02BE\u02BC]",
                B,
                ve,
                Re = 3,
                ne = {},
                me = {
                    "/": "\u2044\u2215",
                    0: "\u07C0",
                    a: "\u2C65\u0250\u0251",
                    aa: "\uA733",
                    ae: "\xE6\u01FD\u01E3",
                    ao: "\uA735",
                    au: "\uA737",
                    av: "\uA739\uA73B",
                    ay: "\uA73D",
                    b: "\u0180\u0253\u0183",
                    c: "\uA73F\u0188\u023C\u2184",
                    d: "\u0111\u0257\u0256\u1D05\u018C\uABB7\u0501\u0266",
                    e: "\u025B\u01DD\u1D07\u0247",
                    f: "\uA77C\u0192",
                    g: "\u01E5\u0260\uA7A1\u1D79\uA77F\u0262",
                    h: "\u0127\u2C68\u2C76\u0265",
                    i: "\u0268\u0131",
                    j: "\u0249\u0237",
                    k: "\u0199\u2C6A\uA741\uA743\uA745\uA7A3",
                    l: "\u0142\u019A\u026B\u2C61\uA749\uA747\uA781\u026D",
                    m: "\u0271\u026F\u03FB",
                    n: "\uA7A5\u019E\u0272\uA791\u1D0E\u043B\u0509",
                    o: "\xF8\u01FF\u0254\u0275\uA74B\uA74D\u1D11",
                    oe: "\u0153",
                    oi: "\u01A3",
                    oo: "\uA74F",
                    ou: "\u0223",
                    p: "\u01A5\u1D7D\uA751\uA753\uA755\u03C1",
                    q: "\uA757\uA759\u024B",
                    r: "\u024D\u027D\uA75B\uA7A7\uA783",
                    s: "\xDF\u023F\uA7A9\uA785\u0282",
                    t: "\u0167\u01AD\u0288\u2C66\uA787",
                    th: "\xFE",
                    tz: "\uA729",
                    u: "\u0289",
                    v: "\u028B\uA75F\u028C",
                    vy: "\uA761",
                    w: "\u2C73",
                    y: "\u01B4\u024F\u1EFF",
                    z: "\u01B6\u0225\u0240\u2C6C\uA763",
                    hv: "\u0195",
                };
            for (let i in me) {
                let e = me[i] || "";
                for (let t = 0; t < e.length; t++) {
                    let s = e.substring(t, t + 1);
                    ne[s] = i;
                }
            }
            let He = new RegExp(Object.keys(ne).join("|") + "|" + Me, "gu"),
                qe = (i) => {
                    B === void 0 && (B = Qe(i || je));
                },
                _e = (i, e = "NFKD") => i.normalize(e),
                Q = (i) => ie(i).reduce((e, t) => e + Ke(t), ""),
                Ke = (i) => (
                    (i = _e(i)
                        .toLowerCase()
                        .replace(He, (e) => ne[e] || "")),
                    _e(i, "NFC")
                );
            function* ze(i) {
                for (let [e, t] of i)
                    for (let s = e; s <= t; s++) {
                        let n = String.fromCharCode(s),
                            o = Q(n);
                        o != n.toLowerCase() &&
                            (o.length > Re ||
                                (o.length != 0 &&
                                    (yield {
                                        folded: o,
                                        composed: n,
                                        code_point: s,
                                    })));
                    }
            }
            let Be = (i) => {
                    let e = {},
                        t = (s, n) => {
                            let o = e[s] || new Set(),
                                r = new RegExp("^" + he(o) + "$", "iu");
                            n.match(r) || (o.add(z(n)), (e[s] = o));
                        };
                    for (let s of ze(i))
                        t(s.folded, s.folded), t(s.folded, s.composed);
                    return e;
                },
                Qe = (i) => {
                    let e = Be(i),
                        t = {},
                        s = [];
                    for (let o in e) {
                        let r = e[o];
                        r && (t[o] = he(r)), o.length > 1 && s.push(z(o));
                    }
                    s.sort((o, r) => r.length - o.length);
                    let n = M(s);
                    return (ve = new RegExp("^" + n, "u")), t;
                },
                Ue = (i, e = 1) => {
                    let t = 0;
                    return (
                        (i = i.map(
                            (s) => (B[s] && (t += s.length), B[s] || s)
                        )),
                        t >= e ? N(i) : ""
                    );
                },
                Ge = (i, e = 1) => (
                    (e = Math.max(e, i.length - 1)),
                    M(ge(i).map((t) => Ue(t, e)))
                ),
                ye = (i, e = !0) => {
                    let t = i.length > 1 ? 1 : 0;
                    return M(
                        i.map((s) => {
                            let n = [],
                                o = e ? s.length() : s.length() - 1;
                            for (let r = 0; r < o; r++)
                                n.push(Ge(s.substrs[r] || "", t));
                            return N(n);
                        })
                    );
                },
                Ye = (i, e) => {
                    for (let t of e) {
                        if (
                            t.start != i.start ||
                            t.end != i.end ||
                            t.substrs.join("") !== i.substrs.join("")
                        )
                            continue;
                        let s = i.parts,
                            n = (r) => {
                                for (let l of s) {
                                    if (
                                        l.start === r.start &&
                                        l.substr === r.substr
                                    )
                                        return !1;
                                    if (
                                        !(r.length == 1 || l.length == 1) &&
                                        ((r.start < l.start &&
                                            r.end > l.start) ||
                                            (l.start < r.start &&
                                                l.end > r.start))
                                    )
                                        return !0;
                                }
                                return !1;
                            };
                        if (!(t.parts.filter(n).length > 0)) return !0;
                    }
                    return !1;
                };
            class U {
                constructor() {
                    (this.parts = []),
                        (this.substrs = []),
                        (this.start = 0),
                        (this.end = 0);
                }
                add(e) {
                    e &&
                        (this.parts.push(e),
                        this.substrs.push(e.substr),
                        (this.start = Math.min(e.start, this.start)),
                        (this.end = Math.max(e.end, this.end)));
                }
                last() {
                    return this.parts[this.parts.length - 1];
                }
                length() {
                    return this.parts.length;
                }
                clone(e, t) {
                    let s = new U(),
                        n = JSON.parse(JSON.stringify(this.parts)),
                        o = n.pop();
                    for (let c of n) s.add(c);
                    let r = t.substr.substring(0, e - o.start),
                        l = r.length;
                    return (
                        s.add({
                            start: o.start,
                            end: o.start + l,
                            length: l,
                            substr: r,
                        }),
                        s
                    );
                }
            }
            let Je = (i) => {
                qe(), (i = Q(i));
                let e = "",
                    t = [new U()];
                for (let s = 0; s < i.length; s++) {
                    let o = i.substring(s).match(ve),
                        r = i.substring(s, s + 1),
                        l = o ? o[0] : null,
                        c = [],
                        a = new Set();
                    for (let d of t) {
                        let u = d.last();
                        if (!u || u.length == 1 || u.end <= s)
                            if (l) {
                                let p = l.length;
                                d.add({
                                    start: s,
                                    end: s + p,
                                    length: p,
                                    substr: l,
                                }),
                                    a.add("1");
                            } else
                                d.add({
                                    start: s,
                                    end: s + 1,
                                    length: 1,
                                    substr: r,
                                }),
                                    a.add("2");
                        else if (l) {
                            let p = d.clone(s, u),
                                S = l.length;
                            p.add({
                                start: s,
                                end: s + S,
                                length: S,
                                substr: l,
                            }),
                                c.push(p);
                        } else a.add("3");
                    }
                    if (c.length > 0) {
                        c = c.sort((d, u) => d.length() - u.length());
                        for (let d of c) Ye(d, t) || t.push(d);
                        continue;
                    }
                    if (s > 0 && a.size == 1 && !a.has("3")) {
                        e += ye(t, !1);
                        let d = new U(),
                            u = t[0];
                        u && d.add(u.last()), (t = [d]);
                    }
                }
                return (e += ye(t, !0)), e;
            };
            let We = (i, e) => {
                    if (i) return i[e];
                },
                Xe = (i, e) => {
                    if (i) {
                        for (
                            var t, s = e.split(".");
                            (t = s.shift()) && (i = i[t]);

                        );
                        return i;
                    }
                },
                re = (i, e, t) => {
                    var s, n;
                    return !i ||
                        ((i = i + ""), e.regex == null) ||
                        ((n = i.search(e.regex)), n === -1)
                        ? 0
                        : ((s = e.string.length / i.length),
                          n === 0 && (s += 0.5),
                          s * t);
                },
                oe = (i, e) => {
                    var t = i[e];
                    if (typeof t == "function") return t;
                    t && !Array.isArray(t) && (i[e] = [t]);
                },
                E = (i, e) => {
                    if (Array.isArray(i)) i.forEach(e);
                    else for (var t in i) i.hasOwnProperty(t) && e(i[t], t);
                },
                Ze = (i, e) =>
                    typeof i == "number" && typeof e == "number"
                        ? i > e
                            ? 1
                            : i < e
                            ? -1
                            : 0
                        : ((i = Q(i + "").toLowerCase()),
                          (e = Q(e + "").toLowerCase()),
                          i > e ? 1 : e > i ? -1 : 0);
            class et {
                constructor(e, t) {
                    (this.items = void 0),
                        (this.settings = void 0),
                        (this.items = e),
                        (this.settings = t || { diacritics: !0 });
                }
                tokenize(e, t, s) {
                    if (!e || !e.length) return [];
                    let n = [],
                        o = e.split(/\s+/);
                    var r;
                    return (
                        s &&
                            (r = new RegExp(
                                "^(" +
                                    Object.keys(s).map(z).join("|") +
                                    "):(.*)$"
                            )),
                        o.forEach((l) => {
                            let c,
                                a = null,
                                d = null;
                            r && (c = l.match(r)) && ((a = c[1]), (l = c[2])),
                                l.length > 0 &&
                                    (this.settings.diacritics
                                        ? (d = Je(l) || null)
                                        : (d = z(l)),
                                    d && t && (d = "\\b" + d)),
                                n.push({
                                    string: l,
                                    regex: d ? new RegExp(d, "iu") : null,
                                    field: a,
                                });
                        }),
                        n
                    );
                }
                getScoreFunction(e, t) {
                    var s = this.prepareSearch(e, t);
                    return this._getScoreFunction(s);
                }
                _getScoreFunction(e) {
                    let t = e.tokens,
                        s = t.length;
                    if (!s)
                        return function () {
                            return 0;
                        };
                    let n = e.options.fields,
                        o = e.weights,
                        r = n.length,
                        l = e.getAttrFn;
                    if (!r)
                        return function () {
                            return 1;
                        };
                    let c = (function () {
                        return r === 1
                            ? function (a, d) {
                                  let u = n[0].field;
                                  return re(l(d, u), a, o[u] || 1);
                              }
                            : function (a, d) {
                                  var u = 0;
                                  if (a.field) {
                                      let p = l(d, a.field);
                                      !a.regex && p
                                          ? (u += 1 / r)
                                          : (u += re(p, a, 1));
                                  } else
                                      E(o, (p, S) => {
                                          u += re(l(d, S), a, p);
                                      });
                                  return u / r;
                              };
                    })();
                    return s === 1
                        ? function (a) {
                              return c(t[0], a);
                          }
                        : e.options.conjunction === "and"
                        ? function (a) {
                              var d,
                                  u = 0;
                              for (let p of t) {
                                  if (((d = c(p, a)), d <= 0)) return 0;
                                  u += d;
                              }
                              return u / s;
                          }
                        : function (a) {
                              var d = 0;
                              return (
                                  E(t, (u) => {
                                      d += c(u, a);
                                  }),
                                  d / s
                              );
                          };
                }
                getSortFunction(e, t) {
                    var s = this.prepareSearch(e, t);
                    return this._getSortFunction(s);
                }
                _getSortFunction(e) {
                    var t,
                        s = [];
                    let n = this,
                        o = e.options,
                        r = !e.query && o.sort_empty ? o.sort_empty : o.sort;
                    if (typeof r == "function") return r.bind(this);
                    let l = function (d, u) {
                        return d === "$score"
                            ? u.score
                            : e.getAttrFn(n.items[u.id], d);
                    };
                    if (r)
                        for (let a of r)
                            (e.query || a.field !== "$score") && s.push(a);
                    if (e.query) {
                        t = !0;
                        for (let a of s)
                            if (a.field === "$score") {
                                t = !1;
                                break;
                            }
                        t && s.unshift({ field: "$score", direction: "desc" });
                    } else s = s.filter((a) => a.field !== "$score");
                    return s.length
                        ? function (a, d) {
                              var u, p;
                              for (let S of s)
                                  if (
                                      ((p = S.field),
                                      (u =
                                          (S.direction === "desc" ? -1 : 1) *
                                          Ze(l(p, a), l(p, d))),
                                      u)
                                  )
                                      return u;
                              return 0;
                          }
                        : null;
                }
                prepareSearch(e, t) {
                    let s = {};
                    var n = Object.assign({}, t);
                    if ((oe(n, "sort"), oe(n, "sort_empty"), n.fields)) {
                        oe(n, "fields");
                        let o = [];
                        n.fields.forEach((r) => {
                            typeof r == "string" &&
                                (r = { field: r, weight: 1 }),
                                o.push(r),
                                (s[r.field] = "weight" in r ? r.weight : 1);
                        }),
                            (n.fields = o);
                    }
                    return {
                        options: n,
                        query: e.toLowerCase().trim(),
                        tokens: this.tokenize(e, n.respect_word_boundaries, s),
                        total: 0,
                        items: [],
                        weights: s,
                        getAttrFn: n.nesting ? Xe : We,
                    };
                }
                search(e, t) {
                    var s = this,
                        n,
                        o;
                    (o = this.prepareSearch(e, t)),
                        (t = o.options),
                        (e = o.query);
                    let r = t.score || s._getScoreFunction(o);
                    e.length
                        ? E(s.items, (c, a) => {
                              (n = r(c)),
                                  (t.filter === !1 || n > 0) &&
                                      o.items.push({ score: n, id: a });
                          })
                        : E(s.items, (c, a) => {
                              o.items.push({ score: 1, id: a });
                          });
                    let l = s._getSortFunction(o);
                    return (
                        l && o.items.sort(l),
                        (o.total = o.items.length),
                        typeof t.limit == "number" &&
                            (o.items = o.items.slice(0, t.limit)),
                        o
                    );
                }
            }
            let q = (i, e) => {
                    if (Array.isArray(i)) i.forEach(e);
                    else for (var t in i) i.hasOwnProperty(t) && e(i[t], t);
                },
                F = (i) => {
                    if (i.jquery) return i[0];
                    if (i instanceof HTMLElement) return i;
                    if (Oe(i)) {
                        var e = document.createElement("template");
                        return (e.innerHTML = i.trim()), e.content.firstChild;
                    }
                    return document.querySelector(i);
                },
                Oe = (i) => typeof i == "string" && i.indexOf("<") > -1,
                tt = (i) => i.replace(/['"\\]/g, "\\$&"),
                le = (i, e) => {
                    var t = document.createEvent("HTMLEvents");
                    t.initEvent(e, !0, !1), i.dispatchEvent(t);
                },
                G = (i, e) => {
                    Object.assign(i.style, e);
                },
                T = (i, ...e) => {
                    var t = be(e);
                    (i = we(i)),
                        i.map((s) => {
                            t.map((n) => {
                                s.classList.add(n);
                            });
                        });
                },
                D = (i, ...e) => {
                    var t = be(e);
                    (i = we(i)),
                        i.map((s) => {
                            t.map((n) => {
                                s.classList.remove(n);
                            });
                        });
                },
                be = (i) => {
                    var e = [];
                    return (
                        q(i, (t) => {
                            typeof t == "string" &&
                                (t = t.trim().split(/[\11\12\14\15\40]/)),
                                Array.isArray(t) && (e = e.concat(t));
                        }),
                        e.filter(Boolean)
                    );
                },
                we = (i) => (Array.isArray(i) || (i = [i]), i),
                Y = (i, e, t) => {
                    if (!(t && !t.contains(i)))
                        for (; i && i.matches; ) {
                            if (i.matches(e)) return i;
                            i = i.parentNode;
                        }
                },
                Se = (i, e = 0) => (e > 0 ? i[i.length - 1] : i[0]),
                st = (i) => Object.keys(i).length === 0,
                J = (i, e) => {
                    if (!i) return -1;
                    e = e || i.nodeName;
                    for (var t = 0; (i = i.previousElementSibling); )
                        i.matches(e) && t++;
                    return t;
                },
                C = (i, e) => {
                    q(e, (t, s) => {
                        t == null
                            ? i.removeAttribute(s)
                            : i.setAttribute(s, "" + t);
                    });
                },
                ae = (i, e) => {
                    i.parentNode && i.parentNode.replaceChild(e, i);
                },
                it = (i, e) => {
                    if (e === null) return;
                    if (typeof e == "string") {
                        if (!e.length) return;
                        e = new RegExp(e, "i");
                    }
                    let t = (o) => {
                            var r = o.data.match(e);
                            if (r && o.data.length > 0) {
                                var l = document.createElement("span");
                                l.className = "highlight";
                                var c = o.splitText(r.index);
                                c.splitText(r[0].length);
                                var a = c.cloneNode(!0);
                                return l.appendChild(a), ae(c, l), 1;
                            }
                            return 0;
                        },
                        s = (o) => {
                            o.nodeType === 1 &&
                                o.childNodes &&
                                !/(script|style)/i.test(o.tagName) &&
                                (o.className !== "highlight" ||
                                    o.tagName !== "SPAN") &&
                                Array.from(o.childNodes).forEach((r) => {
                                    n(r);
                                });
                        },
                        n = (o) => (o.nodeType === 3 ? t(o) : (s(o), 0));
                    n(i);
                },
                nt = (i) => {
                    var e = i.querySelectorAll("span.highlight");
                    Array.prototype.forEach.call(e, function (t) {
                        var s = t.parentNode;
                        s.replaceChild(t.firstChild, t), s.normalize();
                    });
                },
                rt = 65,
                ot = 13,
                Ce = 27,
                ce = 37,
                lt = 38,
                Ae = 39,
                at = 40,
                Ie = 8,
                ct = 46,
                ue = 9,
                W = (
                    typeof navigator > "u"
                        ? !1
                        : /Mac/.test(navigator.userAgent)
                )
                    ? "metaKey"
                    : "ctrlKey";
            var xe = {
                options: [],
                optgroups: [],
                plugins: [],
                delimiter: ",",
                splitOn: null,
                persist: !0,
                diacritics: !0,
                create: null,
                createOnBlur: !1,
                createFilter: null,
                highlight: !0,
                openOnFocus: !0,
                shouldOpen: null,
                maxOptions: 50,
                maxItems: null,
                hideSelected: null,
                duplicates: !1,
                addPrecedence: !1,
                selectOnTab: !1,
                preload: null,
                allowEmptyOption: !1,
                refreshThrottle: 300,
                loadThrottle: 300,
                loadingClass: "loading",
                dataAttr: null,
                optgroupField: "optgroup",
                valueField: "value",
                labelField: "text",
                disabledField: "disabled",
                optgroupLabelField: "label",
                optgroupValueField: "value",
                lockOptgroupOrder: !1,
                sortField: "$order",
                searchField: ["text"],
                searchConjunction: "and",
                mode: null,
                wrapperClass: "ts-wrapper",
                controlClass: "ts-control",
                dropdownClass: "ts-dropdown",
                dropdownContentClass: "ts-dropdown-content",
                itemClass: "item",
                optionClass: "option",
                dropdownParent: null,
                controlInput:
                    '<input type="text" autocomplete="off" size="1" />',
                copyClassesToDropdown: !1,
                placeholder: null,
                hidePlaceholder: null,
                shouldLoad: function (i) {
                    return i.length > 0;
                },
                render: {},
            };
            let $ = (i) => (typeof i > "u" || i === null ? null : X(i)),
                X = (i) => (typeof i == "boolean" ? (i ? "1" : "0") : i + ""),
                Z = (i) =>
                    (i + "")
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;"),
                ut = (i, e) =>
                    e > 0 ? setTimeout(i, e) : (i.call(null), null),
                dt = (i, e) => {
                    var t;
                    return function (s, n) {
                        var o = this;
                        t &&
                            ((o.loading = Math.max(o.loading - 1, 0)),
                            clearTimeout(t)),
                            (t = setTimeout(function () {
                                (t = null),
                                    (o.loadedSearches[s] = !0),
                                    i.call(o, s, n);
                            }, e));
                    };
                },
                ke = (i, e, t) => {
                    var s,
                        n = i.trigger,
                        o = {};
                    (i.trigger = function () {
                        var r = arguments[0];
                        if (e.indexOf(r) !== -1) o[r] = arguments;
                        else return n.apply(i, arguments);
                    }),
                        t.apply(i, []),
                        (i.trigger = n);
                    for (s of e) s in o && n.apply(i, o[s]);
                },
                ft = (i) => ({
                    start: i.selectionStart || 0,
                    length: (i.selectionEnd || 0) - (i.selectionStart || 0),
                }),
                y = (i, e = !1) => {
                    i && (i.preventDefault(), e && i.stopPropagation());
                },
                O = (i, e, t, s) => {
                    i.addEventListener(e, t, s);
                },
                R = (i, e) => {
                    if (!e || !e[i]) return !1;
                    var t =
                        (e.altKey ? 1 : 0) +
                        (e.ctrlKey ? 1 : 0) +
                        (e.shiftKey ? 1 : 0) +
                        (e.metaKey ? 1 : 0);
                    return t === 1;
                },
                de = (i, e) => {
                    let t = i.getAttribute("id");
                    return t || (i.setAttribute("id", e), e);
                },
                Fe = (i) => i.replace(/[\\"']/g, "\\$&"),
                H = (i, e) => {
                    e && i.append(e);
                };
            function Le(i, e) {
                var t = Object.assign({}, xe, e),
                    s = t.dataAttr,
                    n = t.labelField,
                    o = t.valueField,
                    r = t.disabledField,
                    l = t.optgroupField,
                    c = t.optgroupLabelField,
                    a = t.optgroupValueField,
                    d = i.tagName.toLowerCase(),
                    u =
                        i.getAttribute("placeholder") ||
                        i.getAttribute("data-placeholder");
                if (!u && !t.allowEmptyOption) {
                    let m = i.querySelector('option[value=""]');
                    m && (u = m.textContent);
                }
                var p = {
                        placeholder: u,
                        options: [],
                        optgroups: [],
                        items: [],
                        maxItems: null,
                    },
                    S = () => {
                        var m,
                            A = p.options,
                            b = {},
                            h = 1;
                        let I = 0;
                        var V = (v) => {
                                var _ = Object.assign({}, v.dataset),
                                    g = s && _[s];
                                return (
                                    typeof g == "string" &&
                                        g.length &&
                                        (_ = Object.assign(_, JSON.parse(g))),
                                    _
                                );
                            },
                            ee = (v, _) => {
                                var g = $(v.value);
                                if (g != null && !(!g && !t.allowEmptyOption)) {
                                    if (b.hasOwnProperty(g)) {
                                        if (_) {
                                            var L = b[g][l];
                                            L
                                                ? Array.isArray(L)
                                                    ? L.push(_)
                                                    : (b[g][l] = [L, _])
                                                : (b[g][l] = _);
                                        }
                                    } else {
                                        var w = V(v);
                                        (w[n] = w[n] || v.textContent),
                                            (w[o] = w[o] || g),
                                            (w[r] = w[r] || v.disabled),
                                            (w[l] = w[l] || _),
                                            (w.$option = v),
                                            (w.$order = w.$order || ++I),
                                            (b[g] = w),
                                            A.push(w);
                                    }
                                    v.selected && p.items.push(g);
                                }
                            },
                            K = (v) => {
                                var _, g;
                                (g = V(v)),
                                    (g[c] =
                                        g[c] || v.getAttribute("label") || ""),
                                    (g[a] = g[a] || h++),
                                    (g[r] = g[r] || v.disabled),
                                    (g.$order = g.$order || ++I),
                                    p.optgroups.push(g),
                                    (_ = g[a]),
                                    q(v.children, (L) => {
                                        ee(L, _);
                                    });
                            };
                        (p.maxItems = i.hasAttribute("multiple") ? null : 1),
                            q(i.children, (v) => {
                                (m = v.tagName.toLowerCase()),
                                    m === "optgroup"
                                        ? K(v)
                                        : m === "option" && ee(v);
                            });
                    },
                    f = () => {
                        let m = i.getAttribute(s);
                        if (m)
                            (p.options = JSON.parse(m)),
                                q(p.options, (b) => {
                                    p.items.push(b[o]);
                                });
                        else {
                            var A = i.value.trim() || "";
                            if (!t.allowEmptyOption && !A.length) return;
                            let b = A.split(t.delimiter);
                            q(b, (h) => {
                                let I = {};
                                (I[n] = h), (I[o] = h), p.options.push(I);
                            }),
                                (p.items = b);
                        }
                    };
                return d === "select" ? S() : f(), Object.assign({}, xe, p, e);
            }
            var Ee = 0;
            class P extends j(k) {
                constructor(e, t) {
                    super(),
                        (this.control_input = void 0),
                        (this.wrapper = void 0),
                        (this.dropdown = void 0),
                        (this.control = void 0),
                        (this.dropdown_content = void 0),
                        (this.focus_node = void 0),
                        (this.order = 0),
                        (this.settings = void 0),
                        (this.input = void 0),
                        (this.tabIndex = void 0),
                        (this.is_select_tag = void 0),
                        (this.rtl = void 0),
                        (this.inputId = void 0),
                        (this._destroy = void 0),
                        (this.sifter = void 0),
                        (this.isOpen = !1),
                        (this.isDisabled = !1),
                        (this.isReadOnly = !1),
                        (this.isRequired = void 0),
                        (this.isInvalid = !1),
                        (this.isValid = !0),
                        (this.isLocked = !1),
                        (this.isFocused = !1),
                        (this.isInputHidden = !1),
                        (this.isSetup = !1),
                        (this.ignoreFocus = !1),
                        (this.ignoreHover = !1),
                        (this.hasOptions = !1),
                        (this.currentResults = void 0),
                        (this.lastValue = ""),
                        (this.caretPos = 0),
                        (this.loading = 0),
                        (this.loadedSearches = {}),
                        (this.activeOption = null),
                        (this.activeItems = []),
                        (this.optgroups = {}),
                        (this.options = {}),
                        (this.userOptions = {}),
                        (this.items = []),
                        (this.refreshTimeout = null),
                        Ee++;
                    var s,
                        n = F(e);
                    if (n.tomselect)
                        throw new Error(
                            "Tom Select already initialized on this element"
                        );
                    n.tomselect = this;
                    var o =
                        window.getComputedStyle &&
                        window.getComputedStyle(n, null);
                    s = o.getPropertyValue("direction");
                    let r = Le(n, t);
                    (this.settings = r),
                        (this.input = n),
                        (this.tabIndex = n.tabIndex || 0),
                        (this.is_select_tag =
                            n.tagName.toLowerCase() === "select"),
                        (this.rtl = /rtl/i.test(s)),
                        (this.inputId = de(n, "tomselect-" + Ee)),
                        (this.isRequired = n.required),
                        (this.sifter = new et(this.options, {
                            diacritics: r.diacritics,
                        })),
                        (r.mode =
                            r.mode || (r.maxItems === 1 ? "single" : "multi")),
                        typeof r.hideSelected != "boolean" &&
                            (r.hideSelected = r.mode === "multi"),
                        typeof r.hidePlaceholder != "boolean" &&
                            (r.hidePlaceholder = r.mode !== "multi");
                    var l = r.createFilter;
                    typeof l != "function" &&
                        (typeof l == "string" && (l = new RegExp(l)),
                        l instanceof RegExp
                            ? (r.createFilter = (A) => l.test(A))
                            : (r.createFilter = (A) =>
                                  this.settings.duplicates ||
                                  !this.options[A])),
                        this.initializePlugins(r.plugins),
                        this.setupCallbacks(),
                        this.setupTemplates();
                    let c = F("<div>"),
                        a = F("<div>"),
                        d = this._render("dropdown"),
                        u = F('<div role="listbox" tabindex="-1">'),
                        p = this.input.getAttribute("class") || "",
                        S = r.mode;
                    var f;
                    if (
                        (T(c, r.wrapperClass, p, S),
                        T(a, r.controlClass),
                        H(c, a),
                        T(d, r.dropdownClass, S),
                        r.copyClassesToDropdown && T(d, p),
                        T(u, r.dropdownContentClass),
                        H(d, u),
                        F(r.dropdownParent || c).appendChild(d),
                        Oe(r.controlInput))
                    ) {
                        f = F(r.controlInput);
                        var m = [
                            "autocorrect",
                            "autocapitalize",
                            "autocomplete",
                            "spellcheck",
                        ];
                        E(m, (A) => {
                            n.getAttribute(A) &&
                                C(f, { [A]: n.getAttribute(A) });
                        }),
                            (f.tabIndex = -1),
                            a.appendChild(f),
                            (this.focus_node = f);
                    } else r.controlInput ? ((f = F(r.controlInput)), (this.focus_node = f)) : ((f = F("<input/>")), (this.focus_node = a));
                    (this.wrapper = c),
                        (this.dropdown = d),
                        (this.dropdown_content = u),
                        (this.control = a),
                        (this.control_input = f),
                        this.setup();
                }
                setup() {
                    let e = this,
                        t = e.settings,
                        s = e.control_input,
                        n = e.dropdown,
                        o = e.dropdown_content,
                        r = e.wrapper,
                        l = e.control,
                        c = e.input,
                        a = e.focus_node,
                        d = { passive: !0 },
                        u = e.inputId + "-ts-dropdown";
                    C(o, { id: u }),
                        C(a, {
                            role: "combobox",
                            "aria-haspopup": "listbox",
                            "aria-expanded": "false",
                            "aria-controls": u,
                        });
                    let p = de(a, e.inputId + "-ts-control"),
                        S = "label[for='" + tt(e.inputId) + "']",
                        f = document.querySelector(S),
                        m = e.focus.bind(e);
                    if (f) {
                        O(f, "click", m), C(f, { for: p });
                        let h = de(f, e.inputId + "-ts-label");
                        C(a, { "aria-labelledby": h }),
                            C(o, { "aria-labelledby": h });
                    }
                    if (
                        ((r.style.width = c.style.width),
                        e.plugins.names.length)
                    ) {
                        let h = "plugin-" + e.plugins.names.join(" plugin-");
                        T([r, n], h);
                    }
                    (t.maxItems === null || t.maxItems > 1) &&
                        e.is_select_tag &&
                        C(c, { multiple: "multiple" }),
                        t.placeholder && C(s, { placeholder: t.placeholder }),
                        !t.splitOn &&
                            t.delimiter &&
                            (t.splitOn = new RegExp(
                                "\\s*" + z(t.delimiter) + "+\\s*"
                            )),
                        t.load &&
                            t.loadThrottle &&
                            (t.load = dt(t.load, t.loadThrottle)),
                        O(n, "mousemove", () => {
                            e.ignoreHover = !1;
                        }),
                        O(
                            n,
                            "mouseenter",
                            (h) => {
                                var I = Y(h.target, "[data-selectable]", n);
                                I && e.onOptionHover(h, I);
                            },
                            { capture: !0 }
                        ),
                        O(n, "click", (h) => {
                            let I = Y(h.target, "[data-selectable]");
                            I && (e.onOptionSelect(h, I), y(h, !0));
                        }),
                        O(l, "click", (h) => {
                            var I = Y(h.target, "[data-ts-item]", l);
                            if (I && e.onItemSelect(h, I)) {
                                y(h, !0);
                                return;
                            }
                            s.value == "" && (e.onClick(), y(h, !0));
                        }),
                        O(a, "keydown", (h) => e.onKeyDown(h)),
                        O(s, "keypress", (h) => e.onKeyPress(h)),
                        O(s, "input", (h) => e.onInput(h)),
                        O(a, "blur", (h) => e.onBlur(h)),
                        O(a, "focus", (h) => e.onFocus(h)),
                        O(s, "paste", (h) => e.onPaste(h));
                    let A = (h) => {
                            let I = h.composedPath()[0];
                            if (!r.contains(I) && !n.contains(I)) {
                                e.isFocused && e.blur(), e.inputState();
                                return;
                            }
                            I == s && e.isOpen ? h.stopPropagation() : y(h, !0);
                        },
                        b = () => {
                            e.isOpen && e.positionDropdown();
                        };
                    O(document, "mousedown", A),
                        O(window, "scroll", b, d),
                        O(window, "resize", b, d),
                        (this._destroy = () => {
                            document.removeEventListener("mousedown", A),
                                window.removeEventListener("scroll", b),
                                window.removeEventListener("resize", b),
                                f && f.removeEventListener("click", m);
                        }),
                        (this.revertSettings = {
                            innerHTML: c.innerHTML,
                            tabIndex: c.tabIndex,
                        }),
                        (c.tabIndex = -1),
                        c.insertAdjacentElement("afterend", e.wrapper),
                        e.sync(!1),
                        (t.items = []),
                        delete t.optgroups,
                        delete t.options,
                        O(c, "invalid", () => {
                            e.isValid &&
                                ((e.isValid = !1),
                                (e.isInvalid = !0),
                                e.refreshState());
                        }),
                        e.updateOriginalInput(),
                        e.refreshItems(),
                        e.close(!1),
                        e.inputState(),
                        (e.isSetup = !0),
                        c.disabled
                            ? e.disable()
                            : c.readOnly
                            ? e.setReadOnly(!0)
                            : e.enable(),
                        e.on("change", this.onChange),
                        T(c, "tomselected", "ts-hidden-accessible"),
                        e.trigger("initialize"),
                        t.preload === !0 && e.preload();
                }
                setupOptions(e = [], t = []) {
                    this.addOptions(e),
                        E(t, (s) => {
                            this.registerOptionGroup(s);
                        });
                }
                setupTemplates() {
                    var e = this,
                        t = e.settings.labelField,
                        s = e.settings.optgroupLabelField,
                        n = {
                            optgroup: (o) => {
                                let r = document.createElement("div");
                                return (
                                    (r.className = "optgroup"),
                                    r.appendChild(o.options),
                                    r
                                );
                            },
                            optgroup_header: (o, r) =>
                                '<div class="optgroup-header">' +
                                r(o[s]) +
                                "</div>",
                            option: (o, r) => "<div>" + r(o[t]) + "</div>",
                            item: (o, r) => "<div>" + r(o[t]) + "</div>",
                            option_create: (o, r) =>
                                '<div class="create">Add <strong>' +
                                r(o.input) +
                                "</strong>&hellip;</div>",
                            no_results: () =>
                                '<div class="no-results">No results found</div>',
                            loading: () => '<div class="spinner"></div>',
                            not_loading: () => {},
                            dropdown: () => "<div></div>",
                        };
                    e.settings.render = Object.assign({}, n, e.settings.render);
                }
                setupCallbacks() {
                    var e,
                        t,
                        s = {
                            initialize: "onInitialize",
                            change: "onChange",
                            item_add: "onItemAdd",
                            item_remove: "onItemRemove",
                            item_select: "onItemSelect",
                            clear: "onClear",
                            option_add: "onOptionAdd",
                            option_remove: "onOptionRemove",
                            option_clear: "onOptionClear",
                            optgroup_add: "onOptionGroupAdd",
                            optgroup_remove: "onOptionGroupRemove",
                            optgroup_clear: "onOptionGroupClear",
                            dropdown_open: "onDropdownOpen",
                            dropdown_close: "onDropdownClose",
                            type: "onType",
                            load: "onLoad",
                            focus: "onFocus",
                            blur: "onBlur",
                        };
                    for (e in s) (t = this.settings[s[e]]), t && this.on(e, t);
                }
                sync(e = !0) {
                    let t = this,
                        s = e
                            ? Le(t.input, { delimiter: t.settings.delimiter })
                            : t.settings;
                    t.setupOptions(s.options, s.optgroups),
                        t.setValue(s.items || [], !0),
                        (t.lastQuery = null);
                }
                onClick() {
                    var e = this;
                    if (e.activeItems.length > 0) {
                        e.clearActiveItems(), e.focus();
                        return;
                    }
                    e.isFocused && e.isOpen ? e.blur() : e.focus();
                }
                onMouseDown() {}
                onChange() {
                    le(this.input, "input"), le(this.input, "change");
                }
                onPaste(e) {
                    var t = this;
                    if (t.isInputHidden || t.isLocked) {
                        y(e);
                        return;
                    }
                    t.settings.splitOn &&
                        setTimeout(() => {
                            var s = t.inputValue();
                            if (s.match(t.settings.splitOn)) {
                                var n = s.trim().split(t.settings.splitOn);
                                E(n, (o) => {
                                    $(o) &&
                                        (this.options[o]
                                            ? t.addItem(o)
                                            : t.createItem(o));
                                });
                            }
                        }, 0);
                }
                onKeyPress(e) {
                    var t = this;
                    if (t.isLocked) {
                        y(e);
                        return;
                    }
                    var s = String.fromCharCode(e.keyCode || e.which);
                    if (
                        t.settings.create &&
                        t.settings.mode === "multi" &&
                        s === t.settings.delimiter
                    ) {
                        t.createItem(), y(e);
                        return;
                    }
                }
                onKeyDown(e) {
                    var t = this;
                    if (((t.ignoreHover = !0), t.isLocked)) {
                        e.keyCode !== ue && y(e);
                        return;
                    }
                    switch (e.keyCode) {
                        case rt:
                            if (R(W, e) && t.control_input.value == "") {
                                y(e), t.selectAll();
                                return;
                            }
                            break;
                        case Ce:
                            t.isOpen && (y(e, !0), t.close()),
                                t.clearActiveItems();
                            return;
                        case at:
                            if (!t.isOpen && t.hasOptions) t.open();
                            else if (t.activeOption) {
                                let s = t.getAdjacent(t.activeOption, 1);
                                s && t.setActiveOption(s);
                            }
                            y(e);
                            return;
                        case lt:
                            if (t.activeOption) {
                                let s = t.getAdjacent(t.activeOption, -1);
                                s && t.setActiveOption(s);
                            }
                            y(e);
                            return;
                        case ot:
                            t.canSelect(t.activeOption)
                                ? (t.onOptionSelect(e, t.activeOption), y(e))
                                : ((t.settings.create && t.createItem()) ||
                                      (document.activeElement ==
                                          t.control_input &&
                                          t.isOpen)) &&
                                  y(e);
                            return;
                        case ce:
                            t.advanceSelection(-1, e);
                            return;
                        case Ae:
                            t.advanceSelection(1, e);
                            return;
                        case ue:
                            t.settings.selectOnTab &&
                                (t.canSelect(t.activeOption) &&
                                    (t.onOptionSelect(e, t.activeOption), y(e)),
                                t.settings.create && t.createItem() && y(e));
                            return;
                        case Ie:
                        case ct:
                            t.deleteSelection(e);
                            return;
                    }
                    t.isInputHidden && !R(W, e) && y(e);
                }
                onInput(e) {
                    if (this.isLocked) return;
                    let t = this.inputValue();
                    if (this.lastValue !== t) {
                        if (((this.lastValue = t), t == "")) {
                            this._onInput();
                            return;
                        }
                        this.refreshTimeout &&
                            clearTimeout(this.refreshTimeout),
                            (this.refreshTimeout = ut(() => {
                                (this.refreshTimeout = null), this._onInput();
                            }, this.settings.refreshThrottle));
                    }
                }
                _onInput() {
                    let e = this.lastValue;
                    this.settings.shouldLoad.call(this, e) && this.load(e),
                        this.refreshOptions(),
                        this.trigger("type", e);
                }
                onOptionHover(e, t) {
                    this.ignoreHover || this.setActiveOption(t, !1);
                }
                onFocus(e) {
                    var t = this,
                        s = t.isFocused;
                    if (t.isDisabled || t.isReadOnly) {
                        t.blur(), y(e);
                        return;
                    }
                    t.ignoreFocus ||
                        ((t.isFocused = !0),
                        t.settings.preload === "focus" && t.preload(),
                        s || t.trigger("focus"),
                        t.activeItems.length ||
                            (t.inputState(),
                            t.refreshOptions(!!t.settings.openOnFocus)),
                        t.refreshState());
                }
                onBlur(e) {
                    if (document.hasFocus() !== !1) {
                        var t = this;
                        if (t.isFocused) {
                            (t.isFocused = !1), (t.ignoreFocus = !1);
                            var s = () => {
                                t.close(),
                                    t.setActiveItem(),
                                    t.setCaret(t.items.length),
                                    t.trigger("blur");
                            };
                            t.settings.create && t.settings.createOnBlur
                                ? t.createItem(null, s)
                                : s();
                        }
                    }
                }
                onOptionSelect(e, t) {
                    var s,
                        n = this;
                    (t.parentElement &&
                        t.parentElement.matches("[data-disabled]")) ||
                        (t.classList.contains("create")
                            ? n.createItem(null, () => {
                                  n.settings.closeAfterSelect && n.close();
                              })
                            : ((s = t.dataset.value),
                              typeof s < "u" &&
                                  ((n.lastQuery = null),
                                  n.addItem(s),
                                  n.settings.closeAfterSelect && n.close(),
                                  !n.settings.hideSelected &&
                                      e.type &&
                                      /click/.test(e.type) &&
                                      n.setActiveOption(t))));
                }
                canSelect(e) {
                    return !!(
                        this.isOpen &&
                        e &&
                        this.dropdown_content.contains(e)
                    );
                }
                onItemSelect(e, t) {
                    var s = this;
                    return !s.isLocked && s.settings.mode === "multi"
                        ? (y(e), s.setActiveItem(t, e), !0)
                        : !1;
                }
                canLoad(e) {
                    return !(
                        !this.settings.load ||
                        this.loadedSearches.hasOwnProperty(e)
                    );
                }
                load(e) {
                    let t = this;
                    if (!t.canLoad(e)) return;
                    T(t.wrapper, t.settings.loadingClass), t.loading++;
                    let s = t.loadCallback.bind(t);
                    t.settings.load.call(t, e, s);
                }
                loadCallback(e, t) {
                    let s = this;
                    (s.loading = Math.max(s.loading - 1, 0)),
                        (s.lastQuery = null),
                        s.clearActiveOption(),
                        s.setupOptions(e, t),
                        s.refreshOptions(s.isFocused && !s.isInputHidden),
                        s.loading || D(s.wrapper, s.settings.loadingClass),
                        s.trigger("load", e, t);
                }
                preload() {
                    var e = this.wrapper.classList;
                    e.contains("preloaded") ||
                        (e.add("preloaded"), this.load(""));
                }
                setTextboxValue(e = "") {
                    var t = this.control_input,
                        s = t.value !== e;
                    s && ((t.value = e), le(t, "update"), (this.lastValue = e));
                }
                getValue() {
                    return this.is_select_tag &&
                        this.input.hasAttribute("multiple")
                        ? this.items
                        : this.items.join(this.settings.delimiter);
                }
                setValue(e, t) {
                    var s = t ? [] : ["change"];
                    ke(this, s, () => {
                        this.clear(t), this.addItems(e, t);
                    });
                }
                setMaxItems(e) {
                    e === 0 && (e = null),
                        (this.settings.maxItems = e),
                        this.refreshState();
                }
                setActiveItem(e, t) {
                    var s = this,
                        n,
                        o,
                        r,
                        l,
                        c,
                        a;
                    if (s.settings.mode !== "single") {
                        if (!e) {
                            s.clearActiveItems(), s.isFocused && s.inputState();
                            return;
                        }
                        if (
                            ((n = t && t.type.toLowerCase()),
                            n === "click" &&
                                R("shiftKey", t) &&
                                s.activeItems.length)
                        ) {
                            for (
                                a = s.getLastActive(),
                                    r = Array.prototype.indexOf.call(
                                        s.control.children,
                                        a
                                    ),
                                    l = Array.prototype.indexOf.call(
                                        s.control.children,
                                        e
                                    ),
                                    r > l && ((c = r), (r = l), (l = c)),
                                    o = r;
                                o <= l;
                                o++
                            )
                                (e = s.control.children[o]),
                                    s.activeItems.indexOf(e) === -1 &&
                                        s.setActiveItemClass(e);
                            y(t);
                        } else
                            (n === "click" && R(W, t)) ||
                            (n === "keydown" && R("shiftKey", t))
                                ? e.classList.contains("active")
                                    ? s.removeActiveItem(e)
                                    : s.setActiveItemClass(e)
                                : (s.clearActiveItems(),
                                  s.setActiveItemClass(e));
                        s.inputState(), s.isFocused || s.focus();
                    }
                }
                setActiveItemClass(e) {
                    let t = this,
                        s = t.control.querySelector(".last-active");
                    s && D(s, "last-active"),
                        T(e, "active last-active"),
                        t.trigger("item_select", e),
                        t.activeItems.indexOf(e) == -1 && t.activeItems.push(e);
                }
                removeActiveItem(e) {
                    var t = this.activeItems.indexOf(e);
                    this.activeItems.splice(t, 1), D(e, "active");
                }
                clearActiveItems() {
                    D(this.activeItems, "active"), (this.activeItems = []);
                }
                setActiveOption(e, t = !0) {
                    e !== this.activeOption &&
                        (this.clearActiveOption(),
                        e &&
                            ((this.activeOption = e),
                            C(this.focus_node, {
                                "aria-activedescendant": e.getAttribute("id"),
                            }),
                            C(e, { "aria-selected": "true" }),
                            T(e, "active"),
                            t && this.scrollToOption(e)));
                }
                scrollToOption(e, t) {
                    if (!e) return;
                    let s = this.dropdown_content,
                        n = s.clientHeight,
                        o = s.scrollTop || 0,
                        r = e.offsetHeight,
                        l =
                            e.getBoundingClientRect().top -
                            s.getBoundingClientRect().top +
                            o;
                    l + r > n + o
                        ? this.scroll(l - n + r, t)
                        : l < o && this.scroll(l, t);
                }
                scroll(e, t) {
                    let s = this.dropdown_content;
                    t && (s.style.scrollBehavior = t),
                        (s.scrollTop = e),
                        (s.style.scrollBehavior = "");
                }
                clearActiveOption() {
                    this.activeOption &&
                        (D(this.activeOption, "active"),
                        C(this.activeOption, { "aria-selected": null })),
                        (this.activeOption = null),
                        C(this.focus_node, { "aria-activedescendant": null });
                }
                selectAll() {
                    let e = this;
                    if (e.settings.mode === "single") return;
                    let t = e.controlChildren();
                    t.length &&
                        (e.inputState(),
                        e.close(),
                        (e.activeItems = t),
                        E(t, (s) => {
                            e.setActiveItemClass(s);
                        }));
                }
                inputState() {
                    var e = this;
                    e.control.contains(e.control_input) &&
                        (C(e.control_input, {
                            placeholder: e.settings.placeholder,
                        }),
                        e.activeItems.length > 0 ||
                        (!e.isFocused &&
                            e.settings.hidePlaceholder &&
                            e.items.length > 0)
                            ? (e.setTextboxValue(), (e.isInputHidden = !0))
                            : (e.settings.hidePlaceholder &&
                                  e.items.length > 0 &&
                                  C(e.control_input, { placeholder: "" }),
                              (e.isInputHidden = !1)),
                        e.wrapper.classList.toggle(
                            "input-hidden",
                            e.isInputHidden
                        ));
                }
                inputValue() {
                    return this.control_input.value.trim();
                }
                focus() {
                    var e = this;
                    e.isDisabled ||
                        e.isReadOnly ||
                        ((e.ignoreFocus = !0),
                        e.control_input.offsetWidth
                            ? e.control_input.focus()
                            : e.focus_node.focus(),
                        setTimeout(() => {
                            (e.ignoreFocus = !1), e.onFocus();
                        }, 0));
                }
                blur() {
                    this.focus_node.blur(), this.onBlur();
                }
                getScoreFunction(e) {
                    return this.sifter.getScoreFunction(
                        e,
                        this.getSearchOptions()
                    );
                }
                getSearchOptions() {
                    var e = this.settings,
                        t = e.sortField;
                    return (
                        typeof e.sortField == "string" &&
                            (t = [{ field: e.sortField }]),
                        {
                            fields: e.searchField,
                            conjunction: e.searchConjunction,
                            sort: t,
                            nesting: e.nesting,
                        }
                    );
                }
                search(e) {
                    var t,
                        s,
                        n = this,
                        o = this.getSearchOptions();
                    if (
                        n.settings.score &&
                        ((s = n.settings.score.call(n, e)),
                        typeof s != "function")
                    )
                        throw new Error(
                            'Tom Select "score" setting must be a function that returns a function'
                        );
                    return (
                        e !== n.lastQuery
                            ? ((n.lastQuery = e),
                              (t = n.sifter.search(
                                  e,
                                  Object.assign(o, { score: s })
                              )),
                              (n.currentResults = t))
                            : (t = Object.assign({}, n.currentResults)),
                        n.settings.hideSelected &&
                            (t.items = t.items.filter((r) => {
                                let l = $(r.id);
                                return !(l && n.items.indexOf(l) !== -1);
                            })),
                        t
                    );
                }
                refreshOptions(e = !0) {
                    var t, s, n, o, r, l, c, a, d, u;
                    let p = {},
                        S = [];
                    var f = this,
                        m = f.inputValue();
                    let A =
                        m === f.lastQuery || (m == "" && f.lastQuery == null);
                    var b = f.search(m),
                        h = null,
                        I = f.settings.shouldOpen || !1,
                        V = f.dropdown_content;
                    A &&
                        ((h = f.activeOption),
                        h && (d = h.closest("[data-group]"))),
                        (o = b.items.length),
                        typeof f.settings.maxOptions == "number" &&
                            (o = Math.min(o, f.settings.maxOptions)),
                        o > 0 && (I = !0);
                    let ee = (v, _) => {
                        let g = p[v];
                        if (g !== void 0) {
                            let w = S[g];
                            if (w !== void 0) return [g, w.fragment];
                        }
                        let L = document.createDocumentFragment();
                        return (
                            (g = S.length),
                            S.push({ fragment: L, order: _, optgroup: v }),
                            [g, L]
                        );
                    };
                    for (t = 0; t < o; t++) {
                        let v = b.items[t];
                        if (!v) continue;
                        let _ = v.id,
                            g = f.options[_];
                        if (g === void 0) continue;
                        let L = X(_),
                            w = f.getOption(L, !0);
                        for (
                            f.settings.hideSelected ||
                                w.classList.toggle(
                                    "selected",
                                    f.items.includes(L)
                                ),
                                r = g[f.settings.optgroupField] || "",
                                l = Array.isArray(r) ? r : [r],
                                s = 0,
                                n = l && l.length;
                            s < n;
                            s++
                        ) {
                            r = l[s];
                            let te = g.$order,
                                se = f.optgroups[r];
                            se === void 0 ? (r = "") : (te = se.$order);
                            let [Lt, Et] = ee(r, te);
                            s > 0 &&
                                ((w = w.cloneNode(!0)),
                                C(w, {
                                    id: g.$id + "-clone-" + s,
                                    "aria-selected": null,
                                }),
                                w.classList.add("ts-cloned"),
                                D(w, "active"),
                                f.activeOption &&
                                    f.activeOption.dataset.value == _ &&
                                    d &&
                                    d.dataset.group === r.toString() &&
                                    (h = w)),
                                Et.appendChild(w),
                                r != "" && (p[r] = Lt);
                        }
                    }
                    f.settings.lockOptgroupOrder &&
                        S.sort((v, _) => v.order - _.order),
                        (c = document.createDocumentFragment()),
                        E(S, (v) => {
                            let _ = v.fragment,
                                g = v.optgroup;
                            if (!_ || !_.children.length) return;
                            let L = f.optgroups[g];
                            if (L !== void 0) {
                                let w = document.createDocumentFragment(),
                                    te = f.render("optgroup_header", L);
                                H(w, te), H(w, _);
                                let se = f.render("optgroup", {
                                    group: L,
                                    options: w,
                                });
                                H(c, se);
                            } else H(c, _);
                        }),
                        (V.innerHTML = ""),
                        H(V, c),
                        f.settings.highlight &&
                            (nt(V),
                            b.query.length &&
                                b.tokens.length &&
                                E(b.tokens, (v) => {
                                    it(V, v.regex);
                                }));
                    var K = (v) => {
                        let _ = f.render(v, { input: m });
                        return (
                            _ && ((I = !0), V.insertBefore(_, V.firstChild)), _
                        );
                    };
                    if (
                        (f.loading
                            ? K("loading")
                            : f.settings.shouldLoad.call(f, m)
                            ? b.items.length === 0 && K("no_results")
                            : K("not_loading"),
                        (a = f.canCreate(m)),
                        a && (u = K("option_create")),
                        (f.hasOptions = b.items.length > 0 || a),
                        I)
                    ) {
                        if (b.items.length > 0) {
                            if (
                                (!h &&
                                    f.settings.mode === "single" &&
                                    f.items[0] != null &&
                                    (h = f.getOption(f.items[0])),
                                !V.contains(h))
                            ) {
                                let v = 0;
                                u && !f.settings.addPrecedence && (v = 1),
                                    (h = f.selectable()[v]);
                            }
                        } else u && (h = u);
                        e &&
                            !f.isOpen &&
                            (f.open(), f.scrollToOption(h, "auto")),
                            f.setActiveOption(h);
                    } else f.clearActiveOption(), e && f.isOpen && f.close(!1);
                }
                selectable() {
                    return this.dropdown_content.querySelectorAll(
                        "[data-selectable]"
                    );
                }
                addOption(e, t = !1) {
                    let s = this;
                    if (Array.isArray(e)) return s.addOptions(e, t), !1;
                    let n = $(e[s.settings.valueField]);
                    return n === null || s.options.hasOwnProperty(n)
                        ? !1
                        : ((e.$order = e.$order || ++s.order),
                          (e.$id = s.inputId + "-opt-" + e.$order),
                          (s.options[n] = e),
                          (s.lastQuery = null),
                          t &&
                              ((s.userOptions[n] = t),
                              s.trigger("option_add", n, e)),
                          n);
                }
                addOptions(e, t = !1) {
                    E(e, (s) => {
                        this.addOption(s, t);
                    });
                }
                registerOption(e) {
                    return this.addOption(e);
                }
                registerOptionGroup(e) {
                    var t = $(e[this.settings.optgroupValueField]);
                    return t === null
                        ? !1
                        : ((e.$order = e.$order || ++this.order),
                          (this.optgroups[t] = e),
                          t);
                }
                addOptionGroup(e, t) {
                    var s;
                    (t[this.settings.optgroupValueField] = e),
                        (s = this.registerOptionGroup(t)) &&
                            this.trigger("optgroup_add", s, t);
                }
                removeOptionGroup(e) {
                    this.optgroups.hasOwnProperty(e) &&
                        (delete this.optgroups[e],
                        this.clearCache(),
                        this.trigger("optgroup_remove", e));
                }
                clearOptionGroups() {
                    (this.optgroups = {}),
                        this.clearCache(),
                        this.trigger("optgroup_clear");
                }
                updateOption(e, t) {
                    let s = this;
                    var n, o;
                    let r = $(e),
                        l = $(t[s.settings.valueField]);
                    if (r === null) return;
                    let c = s.options[r];
                    if (c == null) return;
                    if (typeof l != "string")
                        throw new Error("Value must be set in option data");
                    let a = s.getOption(r),
                        d = s.getItem(r);
                    if (
                        ((t.$order = t.$order || c.$order),
                        delete s.options[r],
                        s.uncacheValue(l),
                        (s.options[l] = t),
                        a)
                    ) {
                        if (s.dropdown_content.contains(a)) {
                            let u = s._render("option", t);
                            ae(a, u),
                                s.activeOption === a && s.setActiveOption(u);
                        }
                        a.remove();
                    }
                    d &&
                        ((o = s.items.indexOf(r)),
                        o !== -1 && s.items.splice(o, 1, l),
                        (n = s._render("item", t)),
                        d.classList.contains("active") && T(n, "active"),
                        ae(d, n)),
                        (s.lastQuery = null);
                }
                removeOption(e, t) {
                    let s = this;
                    (e = X(e)),
                        s.uncacheValue(e),
                        delete s.userOptions[e],
                        delete s.options[e],
                        (s.lastQuery = null),
                        s.trigger("option_remove", e),
                        s.removeItem(e, t);
                }
                clearOptions(e) {
                    let t = (e || this.clearFilter).bind(this);
                    (this.loadedSearches = {}),
                        (this.userOptions = {}),
                        this.clearCache();
                    let s = {};
                    E(this.options, (n, o) => {
                        t(n, o) && (s[o] = n);
                    }),
                        (this.options = this.sifter.items = s),
                        (this.lastQuery = null),
                        this.trigger("option_clear");
                }
                clearFilter(e, t) {
                    return this.items.indexOf(t) >= 0;
                }
                getOption(e, t = !1) {
                    let s = $(e);
                    if (s === null) return null;
                    let n = this.options[s];
                    if (n != null) {
                        if (n.$div) return n.$div;
                        if (t) return this._render("option", n);
                    }
                    return null;
                }
                getAdjacent(e, t, s = "option") {
                    var n = this,
                        o;
                    if (!e) return null;
                    s == "item"
                        ? (o = n.controlChildren())
                        : (o =
                              n.dropdown_content.querySelectorAll(
                                  "[data-selectable]"
                              ));
                    for (let r = 0; r < o.length; r++)
                        if (o[r] == e) return t > 0 ? o[r + 1] : o[r - 1];
                    return null;
                }
                getItem(e) {
                    if (typeof e == "object") return e;
                    var t = $(e);
                    return t !== null
                        ? this.control.querySelector(`[data-value="${Fe(t)}"]`)
                        : null;
                }
                addItems(e, t) {
                    var s = this,
                        n = Array.isArray(e) ? e : [e];
                    n = n.filter((r) => s.items.indexOf(r) === -1);
                    let o = n[n.length - 1];
                    n.forEach((r) => {
                        (s.isPending = r !== o), s.addItem(r, t);
                    });
                }
                addItem(e, t) {
                    var s = t ? [] : ["change", "dropdown_close"];
                    ke(this, s, () => {
                        var n, o;
                        let r = this,
                            l = r.settings.mode,
                            c = $(e);
                        if (
                            !(
                                c &&
                                r.items.indexOf(c) !== -1 &&
                                (l === "single" && r.close(),
                                l === "single" || !r.settings.duplicates)
                            ) &&
                            !(c === null || !r.options.hasOwnProperty(c)) &&
                            (l === "single" && r.clear(t),
                            !(l === "multi" && r.isFull()))
                        ) {
                            if (
                                ((n = r._render("item", r.options[c])),
                                r.control.contains(n) && (n = n.cloneNode(!0)),
                                (o = r.isFull()),
                                r.items.splice(r.caretPos, 0, c),
                                r.insertAtCaret(n),
                                r.isSetup)
                            ) {
                                if (!r.isPending && r.settings.hideSelected) {
                                    let a = r.getOption(c),
                                        d = r.getAdjacent(a, 1);
                                    d && r.setActiveOption(d);
                                }
                                !r.isPending &&
                                    !r.settings.closeAfterSelect &&
                                    r.refreshOptions(
                                        r.isFocused && l !== "single"
                                    ),
                                    r.settings.closeAfterSelect != !1 &&
                                    r.isFull()
                                        ? r.close()
                                        : r.isPending || r.positionDropdown(),
                                    r.trigger("item_add", c, n),
                                    r.isPending ||
                                        r.updateOriginalInput({ silent: t });
                            }
                            (!r.isPending || (!o && r.isFull())) &&
                                (r.inputState(), r.refreshState());
                        }
                    });
                }
                removeItem(e = null, t) {
                    let s = this;
                    if (((e = s.getItem(e)), !e)) return;
                    var n, o;
                    let r = e.dataset.value;
                    (n = J(e)),
                        e.remove(),
                        e.classList.contains("active") &&
                            ((o = s.activeItems.indexOf(e)),
                            s.activeItems.splice(o, 1),
                            D(e, "active")),
                        s.items.splice(n, 1),
                        (s.lastQuery = null),
                        !s.settings.persist &&
                            s.userOptions.hasOwnProperty(r) &&
                            s.removeOption(r, t),
                        n < s.caretPos && s.setCaret(s.caretPos - 1),
                        s.updateOriginalInput({ silent: t }),
                        s.refreshState(),
                        s.positionDropdown(),
                        s.trigger("item_remove", r, e);
                }
                createItem(e = null, t = () => {}) {
                    arguments.length === 3 && (t = arguments[2]),
                        typeof t != "function" && (t = () => {});
                    var s = this,
                        n = s.caretPos,
                        o;
                    if (((e = e || s.inputValue()), !s.canCreate(e)))
                        return t(), !1;
                    s.lock();
                    var r = !1,
                        l = (c) => {
                            if ((s.unlock(), !c || typeof c != "object"))
                                return t();
                            var a = $(c[s.settings.valueField]);
                            if (typeof a != "string") return t();
                            s.setTextboxValue(),
                                s.addOption(c, !0),
                                s.setCaret(n),
                                s.addItem(a),
                                t(c),
                                (r = !0);
                        };
                    return (
                        typeof s.settings.create == "function"
                            ? (o = s.settings.create.call(this, e, l))
                            : (o = {
                                  [s.settings.labelField]: e,
                                  [s.settings.valueField]: e,
                              }),
                        r || l(o),
                        !0
                    );
                }
                refreshItems() {
                    var e = this;
                    (e.lastQuery = null),
                        e.isSetup && e.addItems(e.items),
                        e.updateOriginalInput(),
                        e.refreshState();
                }
                refreshState() {
                    let e = this;
                    e.refreshValidityState();
                    let t = e.isFull(),
                        s = e.isLocked;
                    e.wrapper.classList.toggle("rtl", e.rtl);
                    let n = e.wrapper.classList;
                    n.toggle("focus", e.isFocused),
                        n.toggle("disabled", e.isDisabled),
                        n.toggle("readonly", e.isReadOnly),
                        n.toggle("required", e.isRequired),
                        n.toggle("invalid", !e.isValid),
                        n.toggle("locked", s),
                        n.toggle("full", t),
                        n.toggle(
                            "input-active",
                            e.isFocused && !e.isInputHidden
                        ),
                        n.toggle("dropdown-active", e.isOpen),
                        n.toggle("has-options", st(e.options)),
                        n.toggle("has-items", e.items.length > 0);
                }
                refreshValidityState() {
                    var e = this;
                    e.input.validity &&
                        ((e.isValid = e.input.validity.valid),
                        (e.isInvalid = !e.isValid));
                }
                isFull() {
                    return (
                        this.settings.maxItems !== null &&
                        this.items.length >= this.settings.maxItems
                    );
                }
                updateOriginalInput(e = {}) {
                    let t = this;
                    var s, n;
                    let o = t.input.querySelector('option[value=""]');
                    if (t.is_select_tag) {
                        let c = function (a, d, u) {
                                return (
                                    a ||
                                        (a = F(
                                            '<option value="' +
                                                Z(d) +
                                                '">' +
                                                Z(u) +
                                                "</option>"
                                        )),
                                    a != o && t.input.append(a),
                                    r.push(a),
                                    (a != o || l > 0) && (a.selected = !0),
                                    a
                                );
                            },
                            r = [],
                            l =
                                t.input.querySelectorAll(
                                    "option:checked"
                                ).length;
                        t.input
                            .querySelectorAll("option:checked")
                            .forEach((a) => {
                                a.selected = !1;
                            }),
                            t.items.length == 0 && t.settings.mode == "single"
                                ? c(o, "", "")
                                : t.items.forEach((a) => {
                                      if (
                                          ((s = t.options[a]),
                                          (n = s[t.settings.labelField] || ""),
                                          r.includes(s.$option))
                                      ) {
                                          let d = t.input.querySelector(
                                              `option[value="${Fe(
                                                  a
                                              )}"]:not(:checked)`
                                          );
                                          c(d, a, n);
                                      } else s.$option = c(s.$option, a, n);
                                  });
                    } else t.input.value = t.getValue();
                    t.isSetup &&
                        (e.silent || t.trigger("change", t.getValue()));
                }
                open() {
                    var e = this;
                    e.isLocked ||
                        e.isOpen ||
                        (e.settings.mode === "multi" && e.isFull()) ||
                        ((e.isOpen = !0),
                        C(e.focus_node, { "aria-expanded": "true" }),
                        e.refreshState(),
                        G(e.dropdown, {
                            visibility: "hidden",
                            display: "block",
                        }),
                        e.positionDropdown(),
                        G(e.dropdown, {
                            visibility: "visible",
                            display: "block",
                        }),
                        e.focus(),
                        e.trigger("dropdown_open", e.dropdown));
                }
                close(e = !0) {
                    var t = this,
                        s = t.isOpen;
                    e &&
                        (t.setTextboxValue(),
                        t.settings.mode === "single" &&
                            t.items.length &&
                            t.inputState()),
                        (t.isOpen = !1),
                        C(t.focus_node, { "aria-expanded": "false" }),
                        G(t.dropdown, { display: "none" }),
                        t.settings.hideSelected && t.clearActiveOption(),
                        t.refreshState(),
                        s && t.trigger("dropdown_close", t.dropdown);
                }
                positionDropdown() {
                    if (this.settings.dropdownParent === "body") {
                        var e = this.control,
                            t = e.getBoundingClientRect(),
                            s = e.offsetHeight + t.top + window.scrollY,
                            n = t.left + window.scrollX;
                        G(this.dropdown, {
                            width: t.width + "px",
                            top: s + "px",
                            left: n + "px",
                        });
                    }
                }
                clear(e) {
                    var t = this;
                    if (t.items.length) {
                        var s = t.controlChildren();
                        E(s, (n) => {
                            t.removeItem(n, !0);
                        }),
                            t.inputState(),
                            e || t.updateOriginalInput(),
                            t.trigger("clear");
                    }
                }
                insertAtCaret(e) {
                    let t = this,
                        s = t.caretPos,
                        n = t.control;
                    n.insertBefore(e, n.children[s] || null), t.setCaret(s + 1);
                }
                deleteSelection(e) {
                    var t,
                        s,
                        n,
                        o,
                        r = this;
                    (t = e && e.keyCode === Ie ? -1 : 1),
                        (s = ft(r.control_input));
                    let l = [];
                    if (r.activeItems.length)
                        (o = Se(r.activeItems, t)),
                            (n = J(o)),
                            t > 0 && n++,
                            E(r.activeItems, (c) => l.push(c));
                    else if (
                        (r.isFocused || r.settings.mode === "single") &&
                        r.items.length
                    ) {
                        let c = r.controlChildren(),
                            a;
                        t < 0 && s.start === 0 && s.length === 0
                            ? (a = c[r.caretPos - 1])
                            : t > 0 &&
                              s.start === r.inputValue().length &&
                              (a = c[r.caretPos]),
                            a !== void 0 && l.push(a);
                    }
                    if (!r.shouldDelete(l, e)) return !1;
                    for (y(e, !0), typeof n < "u" && r.setCaret(n); l.length; )
                        r.removeItem(l.pop());
                    return (
                        r.inputState(),
                        r.positionDropdown(),
                        r.refreshOptions(!1),
                        !0
                    );
                }
                shouldDelete(e, t) {
                    let s = e.map((n) => n.dataset.value);
                    return !(
                        !s.length ||
                        (typeof this.settings.onDelete == "function" &&
                            this.settings.onDelete(s, t) === !1)
                    );
                }
                advanceSelection(e, t) {
                    var s,
                        n,
                        o = this;
                    o.rtl && (e *= -1),
                        !o.inputValue().length &&
                            (R(W, t) || R("shiftKey", t)
                                ? ((s = o.getLastActive(e)),
                                  s
                                      ? s.classList.contains("active")
                                          ? (n = o.getAdjacent(s, e, "item"))
                                          : (n = s)
                                      : e > 0
                                      ? (n = o.control_input.nextElementSibling)
                                      : (n =
                                            o.control_input
                                                .previousElementSibling),
                                  n &&
                                      (n.classList.contains("active") &&
                                          o.removeActiveItem(s),
                                      o.setActiveItemClass(n)))
                                : o.moveCaret(e));
                }
                moveCaret(e) {}
                getLastActive(e) {
                    let t = this.control.querySelector(".last-active");
                    if (t) return t;
                    var s = this.control.querySelectorAll(".active");
                    if (s) return Se(s, e);
                }
                setCaret(e) {
                    this.caretPos = this.items.length;
                }
                controlChildren() {
                    return Array.from(
                        this.control.querySelectorAll("[data-ts-item]")
                    );
                }
                lock() {
                    this.setLocked(!0);
                }
                unlock() {
                    this.setLocked(!1);
                }
                setLocked(e = this.isReadOnly || this.isDisabled) {
                    (this.isLocked = e), this.refreshState();
                }
                disable() {
                    this.setDisabled(!0), this.close();
                }
                enable() {
                    this.setDisabled(!1);
                }
                setDisabled(e) {
                    (this.focus_node.tabIndex = e ? -1 : this.tabIndex),
                        (this.isDisabled = e),
                        (this.input.disabled = e),
                        (this.control_input.disabled = e),
                        this.setLocked();
                }
                setReadOnly(e) {
                    (this.isReadOnly = e),
                        (this.input.readOnly = e),
                        (this.control_input.readOnly = e),
                        this.setLocked();
                }
                destroy() {
                    var e = this,
                        t = e.revertSettings;
                    e.trigger("destroy"),
                        e.off(),
                        e.wrapper.remove(),
                        e.dropdown.remove(),
                        (e.input.innerHTML = t.innerHTML),
                        (e.input.tabIndex = t.tabIndex),
                        D(e.input, "tomselected", "ts-hidden-accessible"),
                        e._destroy(),
                        delete e.input.tomselect;
                }
                render(e, t) {
                    var s, n;
                    let o = this;
                    if (
                        typeof this.settings.render[e] != "function" ||
                        ((n = o.settings.render[e].call(this, t, Z)), !n)
                    )
                        return null;
                    if (
                        ((n = F(n)),
                        e === "option" || e === "option_create"
                            ? t[o.settings.disabledField]
                                ? C(n, { "aria-disabled": "true" })
                                : C(n, { "data-selectable": "" })
                            : e === "optgroup" &&
                              ((s = t.group[o.settings.optgroupValueField]),
                              C(n, { "data-group": s }),
                              t.group[o.settings.disabledField] &&
                                  C(n, { "data-disabled": "" })),
                        e === "option" || e === "item")
                    ) {
                        let r = X(t[o.settings.valueField]);
                        C(n, { "data-value": r }),
                            e === "item"
                                ? (T(n, o.settings.itemClass),
                                  C(n, { "data-ts-item": "" }))
                                : (T(n, o.settings.optionClass),
                                  C(n, { role: "option", id: t.$id }),
                                  (t.$div = n),
                                  (o.options[r] = t));
                    }
                    return n;
                }
                _render(e, t) {
                    let s = this.render(e, t);
                    if (s == null) throw "HTMLElement expected";
                    return s;
                }
                clearCache() {
                    E(this.options, (e) => {
                        e.$div && (e.$div.remove(), delete e.$div);
                    });
                }
                uncacheValue(e) {
                    let t = this.getOption(e);
                    t && t.remove();
                }
                canCreate(e) {
                    return (
                        this.settings.create &&
                        e.length > 0 &&
                        this.settings.createFilter.call(this, e)
                    );
                }
                hook(e, t, s) {
                    var n = this,
                        o = n[t];
                    n[t] = function () {
                        var r, l;
                        return (
                            e === "after" && (r = o.apply(n, arguments)),
                            (l = s.apply(n, arguments)),
                            e === "instead"
                                ? l
                                : (e === "before" &&
                                      (r = o.apply(n, arguments)),
                                  r)
                        );
                    };
                }
            }
            function pt() {
                O(this.input, "change", () => {
                    this.sync();
                });
            }
            function ht(i) {
                var e = this,
                    t = e.onOptionSelect;
                e.settings.hideSelected = !1;
                let s = Object.assign(
                    {
                        className: "tomselect-checkbox",
                        checkedClassNames: void 0,
                        uncheckedClassNames: void 0,
                    },
                    i
                );
                var n = function (l, c) {
                        c
                            ? ((l.checked = !0),
                              s.uncheckedClassNames &&
                                  l.classList.remove(...s.uncheckedClassNames),
                              s.checkedClassNames &&
                                  l.classList.add(...s.checkedClassNames))
                            : ((l.checked = !1),
                              s.checkedClassNames &&
                                  l.classList.remove(...s.checkedClassNames),
                              s.uncheckedClassNames &&
                                  l.classList.add(...s.uncheckedClassNames));
                    },
                    o = function (l) {
                        setTimeout(() => {
                            var c = l.querySelector("input." + s.className);
                            c instanceof HTMLInputElement &&
                                n(c, l.classList.contains("selected"));
                        }, 1);
                    };
                e.hook("after", "setupTemplates", () => {
                    var r = e.settings.render.option;
                    e.settings.render.option = (l, c) => {
                        var a = F(r.call(e, l, c)),
                            d = document.createElement("input");
                        s.className && d.classList.add(s.className),
                            d.addEventListener("click", function (p) {
                                y(p);
                            }),
                            (d.type = "checkbox");
                        let u = $(l[e.settings.valueField]);
                        return (
                            n(d, !!(u && e.items.indexOf(u) > -1)),
                            a.prepend(d),
                            a
                        );
                    };
                }),
                    e.on("item_remove", (r) => {
                        var l = e.getOption(r);
                        l && (l.classList.remove("selected"), o(l));
                    }),
                    e.on("item_add", (r) => {
                        var l = e.getOption(r);
                        l && o(l);
                    }),
                    e.hook("instead", "onOptionSelect", (r, l) => {
                        if (l.classList.contains("selected")) {
                            l.classList.remove("selected"),
                                e.removeItem(l.dataset.value),
                                e.refreshOptions(),
                                y(r, !0);
                            return;
                        }
                        t.call(e, r, l), o(l);
                    });
            }
            function gt(i) {
                let e = this,
                    t = Object.assign(
                        {
                            className: "clear-button",
                            title: "Clear All",
                            html: (s) =>
                                `<div class="${s.className}" title="${s.title}">&#10799;</div>`,
                        },
                        i
                    );
                e.on("initialize", () => {
                    var s = F(t.html(t));
                    s.addEventListener("click", (n) => {
                        e.isLocked ||
                            (e.clear(),
                            e.settings.mode === "single" &&
                                e.settings.allowEmptyOption &&
                                e.addItem(""),
                            n.preventDefault(),
                            n.stopPropagation());
                    }),
                        e.control.appendChild(s);
                });
            }
            let vt = (i, e) => {
                    var t;
                    (t = i.parentNode) == null ||
                        t.insertBefore(e, i.nextSibling);
                },
                mt = (i, e) => {
                    var t;
                    (t = i.parentNode) == null || t.insertBefore(e, i);
                },
                _t = (i, e) => {
                    do {
                        var t;
                        if (
                            ((e =
                                (t = e) == null
                                    ? void 0
                                    : t.previousElementSibling),
                            i == e)
                        )
                            return !0;
                    } while (e && e.previousElementSibling);
                    return !1;
                };
            function yt() {
                var i = this;
                if (i.settings.mode !== "multi") return;
                var e = i.lock,
                    t = i.unlock;
                let s = !0,
                    n;
                i.hook("after", "setupTemplates", () => {
                    var o = i.settings.render.item;
                    i.settings.render.item = (r, l) => {
                        let c = F(o.call(i, r, l));
                        C(c, { draggable: "true" });
                        let a = (m) => {
                                s || y(m), m.stopPropagation();
                            },
                            d = (m) => {
                                (n = c),
                                    setTimeout(() => {
                                        c.classList.add("ts-dragging");
                                    }, 0);
                            },
                            u = (m) => {
                                m.preventDefault(),
                                    c.classList.add("ts-drag-over"),
                                    S(c, n);
                            },
                            p = () => {
                                c.classList.remove("ts-drag-over");
                            },
                            S = (m, A) => {
                                A !== void 0 &&
                                    (_t(A, c) ? vt(m, A) : mt(m, A));
                            },
                            f = () => {
                                var m;
                                document
                                    .querySelectorAll(".ts-drag-over")
                                    .forEach((b) =>
                                        b.classList.remove("ts-drag-over")
                                    ),
                                    (m = n) == null ||
                                        m.classList.remove("ts-dragging"),
                                    (n = void 0);
                                var A = [];
                                i.control
                                    .querySelectorAll("[data-value]")
                                    .forEach((b) => {
                                        if (b.dataset.value) {
                                            let h = b.dataset.value;
                                            h && A.push(h);
                                        }
                                    }),
                                    i.setValue(A);
                            };
                        return (
                            O(c, "mousedown", a),
                            O(c, "dragstart", d),
                            O(c, "dragenter", u),
                            O(c, "dragover", u),
                            O(c, "dragleave", p),
                            O(c, "dragend", f),
                            c
                        );
                    };
                }),
                    i.hook("instead", "lock", () => ((s = !1), e.call(i))),
                    i.hook("instead", "unlock", () => ((s = !0), t.call(i)));
            }
            function Ot(i) {
                let e = this,
                    t = Object.assign(
                        {
                            title: "Untitled",
                            headerClass: "dropdown-header",
                            titleRowClass: "dropdown-header-title",
                            labelClass: "dropdown-header-label",
                            closeClass: "dropdown-header-close",
                            html: (s) =>
                                '<div class="' +
                                s.headerClass +
                                '"><div class="' +
                                s.titleRowClass +
                                '"><span class="' +
                                s.labelClass +
                                '">' +
                                s.title +
                                '</span><a class="' +
                                s.closeClass +
                                '">&times;</a></div></div>',
                        },
                        i
                    );
                e.on("initialize", () => {
                    var s = F(t.html(t)),
                        n = s.querySelector("." + t.closeClass);
                    n &&
                        n.addEventListener("click", (o) => {
                            y(o, !0), e.close();
                        }),
                        e.dropdown.insertBefore(s, e.dropdown.firstChild);
                });
            }
            function bt() {
                var i = this;
                i.hook("instead", "setCaret", (e) => {
                    i.settings.mode === "single" ||
                    !i.control.contains(i.control_input)
                        ? (e = i.items.length)
                        : ((e = Math.max(0, Math.min(i.items.length, e))),
                          e != i.caretPos &&
                              !i.isPending &&
                              i.controlChildren().forEach((t, s) => {
                                  s < e
                                      ? i.control_input.insertAdjacentElement(
                                            "beforebegin",
                                            t
                                        )
                                      : i.control.appendChild(t);
                              })),
                        (i.caretPos = e);
                }),
                    i.hook("instead", "moveCaret", (e) => {
                        if (!i.isFocused) return;
                        let t = i.getLastActive(e);
                        if (t) {
                            let s = J(t);
                            i.setCaret(e > 0 ? s + 1 : s),
                                i.setActiveItem(),
                                D(t, "last-active");
                        } else i.setCaret(i.caretPos + e);
                    });
            }
            function wt() {
                let i = this;
                (i.settings.shouldOpen = !0),
                    i.hook("before", "setup", () => {
                        (i.focus_node = i.control),
                            T(i.control_input, "dropdown-input");
                        let e = F('<div class="dropdown-input-wrap">');
                        e.append(i.control_input),
                            i.dropdown.insertBefore(e, i.dropdown.firstChild);
                        let t = F(
                            '<input class="items-placeholder" tabindex="-1" />'
                        );
                        (t.placeholder = i.settings.placeholder || ""),
                            i.control.append(t);
                    }),
                    i.on("initialize", () => {
                        i.control_input.addEventListener("keydown", (t) => {
                            switch (t.keyCode) {
                                case Ce:
                                    i.isOpen && (y(t, !0), i.close()),
                                        i.clearActiveItems();
                                    return;
                                case ue:
                                    i.focus_node.tabIndex = -1;
                                    break;
                            }
                            return i.onKeyDown.call(i, t);
                        }),
                            i.on("blur", () => {
                                i.focus_node.tabIndex = i.isDisabled
                                    ? -1
                                    : i.tabIndex;
                            }),
                            i.on("dropdown_open", () => {
                                i.control_input.focus();
                            });
                        let e = i.onBlur;
                        i.hook("instead", "onBlur", (t) => {
                            if (!(t && t.relatedTarget == i.control_input))
                                return e.call(i);
                        }),
                            O(i.control_input, "blur", () => i.onBlur()),
                            i.hook("before", "close", () => {
                                i.isOpen &&
                                    i.focus_node.focus({ preventScroll: !0 });
                            });
                    });
            }
            function St() {
                var i = this;
                i.on("initialize", () => {
                    var e = document.createElement("span"),
                        t = i.control_input;
                    (e.style.cssText =
                        "position:absolute; top:-99999px; left:-99999px; width:auto; padding:0; white-space:pre; "),
                        i.wrapper.appendChild(e);
                    var s = [
                        "letterSpacing",
                        "fontSize",
                        "fontFamily",
                        "fontWeight",
                        "textTransform",
                    ];
                    for (let o of s) e.style[o] = t.style[o];
                    var n = () => {
                        (e.textContent = t.value),
                            (t.style.width = e.clientWidth + "px");
                    };
                    n(),
                        i.on("update item_add item_remove", n),
                        O(t, "input", n),
                        O(t, "keyup", n),
                        O(t, "blur", n),
                        O(t, "update", n);
                });
            }
            function Ct() {
                var i = this,
                    e = i.deleteSelection;
                this.hook("instead", "deleteSelection", (t) =>
                    i.activeItems.length ? e.call(i, t) : !1
                );
            }
            function At() {
                this.hook("instead", "setActiveItem", () => {}),
                    this.hook("instead", "selectAll", () => {});
            }
            function It() {
                var i = this,
                    e = i.onKeyDown;
                i.hook("instead", "onKeyDown", (t) => {
                    var s, n, o, r;
                    if (!i.isOpen || !(t.keyCode === ce || t.keyCode === Ae))
                        return e.call(i, t);
                    (i.ignoreHover = !0),
                        (r = Y(i.activeOption, "[data-group]")),
                        (s = J(i.activeOption, "[data-selectable]")),
                        r &&
                            (t.keyCode === ce
                                ? (r = r.previousSibling)
                                : (r = r.nextSibling),
                            r &&
                                ((o = r.querySelectorAll("[data-selectable]")),
                                (n = o[Math.min(o.length - 1, s)]),
                                n && i.setActiveOption(n)));
                });
            }
            function xt(i) {
                let e = Object.assign(
                    {
                        label: "&times;",
                        title: "Remove",
                        className: "remove",
                        append: !0,
                    },
                    i
                );
                var t = this;
                if (e.append) {
                    var s =
                        '<a href="javascript:void(0)" class="' +
                        e.className +
                        '" tabindex="-1" title="' +
                        Z(e.title) +
                        '">' +
                        e.label +
                        "</a>";
                    t.hook("after", "setupTemplates", () => {
                        var n = t.settings.render.item;
                        t.settings.render.item = (o, r) => {
                            var l = F(n.call(t, o, r)),
                                c = F(s);
                            return (
                                l.appendChild(c),
                                O(c, "mousedown", (a) => {
                                    y(a, !0);
                                }),
                                O(c, "click", (a) => {
                                    t.isLocked ||
                                        (y(a, !0),
                                        !t.isLocked &&
                                            t.shouldDelete([l], a) &&
                                            (t.removeItem(l),
                                            t.refreshOptions(!1),
                                            t.inputState()));
                                }),
                                l
                            );
                        };
                    });
                }
            }
            function kt(i) {
                let e = this,
                    t = Object.assign(
                        { text: (s) => s[e.settings.labelField] },
                        i
                    );
                e.on("item_remove", function (s) {
                    if (e.isFocused && e.control_input.value.trim() === "") {
                        var n = e.options[s];
                        n && e.setTextboxValue(t.text.call(e, n));
                    }
                });
            }
            function Ft() {
                let i = this,
                    e = i.canLoad,
                    t = i.clearActiveOption,
                    s = i.loadCallback;
                var n = {},
                    o,
                    r = !1,
                    l,
                    c = [];
                if (
                    (i.settings.shouldLoadMore ||
                        (i.settings.shouldLoadMore = () => {
                            if (
                                o.clientHeight /
                                    (o.scrollHeight - o.scrollTop) >
                                0.9
                            )
                                return !0;
                            if (i.activeOption) {
                                var p = i.selectable(),
                                    S = Array.from(p).indexOf(i.activeOption);
                                if (S >= p.length - 2) return !0;
                            }
                            return !1;
                        }),
                    !i.settings.firstUrl)
                )
                    throw "virtual_scroll plugin requires a firstUrl() method";
                i.settings.sortField = [
                    { field: "$order" },
                    { field: "$score" },
                ];
                let a = (u) =>
                        typeof i.settings.maxOptions == "number" &&
                        o.children.length >= i.settings.maxOptions
                            ? !1
                            : !!(u in n && n[u]),
                    d = (u, p) => i.items.indexOf(p) >= 0 || c.indexOf(p) >= 0;
                (i.setNextUrl = (u, p) => {
                    n[u] = p;
                }),
                    (i.getUrl = (u) => {
                        if (u in n) {
                            let p = n[u];
                            return (n[u] = !1), p;
                        }
                        return (
                            i.clearPagination(), i.settings.firstUrl.call(i, u)
                        );
                    }),
                    (i.clearPagination = () => {
                        n = {};
                    }),
                    i.hook("instead", "clearActiveOption", () => {
                        if (!r) return t.call(i);
                    }),
                    i.hook("instead", "canLoad", (u) =>
                        u in n ? a(u) : e.call(i, u)
                    ),
                    i.hook("instead", "loadCallback", (u, p) => {
                        if (!r) i.clearOptions(d);
                        else if (l) {
                            let S = u[0];
                            S !== void 0 &&
                                (l.dataset.value = S[i.settings.valueField]);
                        }
                        s.call(i, u, p), (r = !1);
                    }),
                    i.hook("after", "refreshOptions", () => {
                        let u = i.lastValue;
                        var p;
                        a(u)
                            ? ((p = i.render("loading_more", { query: u })),
                              p &&
                                  (p.setAttribute("data-selectable", ""),
                                  (l = p)))
                            : u in n &&
                              !o.querySelector(".no-results") &&
                              (p = i.render("no_more_results", { query: u })),
                            p && (T(p, i.settings.optionClass), o.append(p));
                    }),
                    i.on("initialize", () => {
                        (c = Object.keys(i.options)),
                            (o = i.dropdown_content),
                            (i.settings.render = Object.assign(
                                {},
                                {
                                    loading_more: () =>
                                        '<div class="loading-more-results">Loading more results ... </div>',
                                    no_more_results: () =>
                                        '<div class="no-more-results">No more results</div>',
                                },
                                i.settings.render
                            )),
                            o.addEventListener("scroll", () => {
                                i.settings.shouldLoadMore.call(i) &&
                                    a(i.lastValue) &&
                                    (r ||
                                        ((r = !0),
                                        i.load.call(i, i.lastValue)));
                            });
                    });
            }
            return (
                P.define("change_listener", pt),
                P.define("checkbox_options", ht),
                P.define("clear_button", gt),
                P.define("drag_drop", yt),
                P.define("dropdown_header", Ot),
                P.define("caret_position", bt),
                P.define("dropdown_input", wt),
                P.define("input_autogrow", St),
                P.define("no_backspace_delete", Ct),
                P.define("no_active_items", At),
                P.define("optgroup_columns", It),
                P.define("remove_button", xt),
                P.define("restore_on_backspace", kt),
                P.define("virtual_scroll", Ft),
                P
            );
        });
    });
    var $e = Mt(Pe());
    window.TomSelect = $e.default;
})();
/*! Bundled license information:

tom-select/dist/js/tom-select.complete.js:
  (*! @orchidjs/unicode-variants | https://github.com/orchidjs/unicode-variants | Apache License (v2) *)
  (*! sifter.js | https://github.com/orchidjs/sifter.js | Apache License (v2) *)
*/
