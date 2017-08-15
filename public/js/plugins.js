/*!
 * jQuery UI Touch Punch 0.2.3
 *
 * Copyright 2011-2014, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *  jquery.ui.widget.js
 *  jquery.ui.mouse.js
 */
!function (a) {
    function f(a, b) {
        if (!(a.originalEvent.touches.length > 1)) {
            a.preventDefault();
            var c = a.originalEvent.changedTouches[0], d = document.createEvent("MouseEvents");
            d.initMouseEvent(b, !0, !0, window, 1, c.screenX, c.screenY, c.clientX, c.clientY, !1, !1, !1, !1, 0, null), a.target.dispatchEvent(d)
        }
    }

    if (a.support.touch = "ontouchend" in document, a.support.touch) {
        var e, b = a.ui.mouse.prototype, c = b._mouseInit, d = b._mouseDestroy;
        b._touchStart = function (a) {
            var b = this;
            !e && b._mouseCapture(a.originalEvent.changedTouches[0]) && (e = !0, b._touchMoved = !1, f(a, "mouseover"), f(a, "mousemove"), f(a, "mousedown"))
        }, b._touchMove = function (a) {
            e && (this._touchMoved = !0, f(a, "mousemove"))
        }, b._touchEnd = function (a) {
            e && (f(a, "mouseup"), f(a, "mouseout"), this._touchMoved || f(a, "click"), e = !1)
        }, b._mouseInit = function () {
            var b = this;
            b.element.bind({
                touchstart: a.proxy(b, "_touchStart"),
                touchmove: a.proxy(b, "_touchMove"),
                touchend: a.proxy(b, "_touchEnd")
            }), c.call(b)
        }, b._mouseDestroy = function () {
            var b = this;
            b.element.unbind({
                touchstart: a.proxy(b, "_touchStart"),
                touchmove: a.proxy(b, "_touchMove"),
                touchend: a.proxy(b, "_touchEnd")
            }), d.call(b)
        }
    }
}(jQuery);


/* CLUSER MANAGER */
(function () {
    var d = null;

    function e(a) {
        return function (b) {
            this[a] = b
        }
    }

    function h(a) {
        return function () {
            return this[a]
        }
    }

    var j;

    function k(a, b, c) {
        this.extend(k, google.maps.OverlayView);
        this.c = a;
        this.a = [];
        this.f = [];
        this.ca = [53, 56, 66, 78, 90];
        this.j = [];
        this.A = !1;
        c = c || {};
        this.g = c.gridSize || 60;
        this.l = c.minimumClusterSize || 2;
        this.J = c.maxZoom || d;
        this.j = c.styles || [];
        this.X = c.imagePath || this.Q;
        this.W = c.imageExtension || this.P;
        this.O = !0;
        if (c.zoomOnClick != void 0) this.O = c.zoomOnClick;
        this.r = !1;
        if (c.averageCenter != void 0) this.r = c.averageCenter;
        l(this);
        this.setMap(a);
        this.K = this.c.getZoom();
        var f = this;
        google.maps.event.addListener(this.c,
            "zoom_changed", function () {
                var a = f.c.getZoom();
                if (f.K != a) f.K = a, f.m()
            });
        google.maps.event.addListener(this.c, "idle", function () {
            f.i()
        });
        b && b.length && this.C(b, !1)
    }

    j = k.prototype;
    j.Q = "http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/images/m";
    j.P = "png";
    j.extend = function (a, b) {
        return function (a) {
            for (var b in a.prototype)this.prototype[b] = a.prototype[b];
            return this
        }.apply(a, [b])
    };
    j.onAdd = function () {
        if (!this.A) this.A = !0, n(this)
    };
    j.draw = function () {
    };
    function l(a) {
        if (!a.j.length)for (var b = 0, c; c = a.ca[b]; b++)a.j.push({
            url: a.X + (b + 1) + "." + a.W,
            height: c,
            width: c
        })
    }

    j.S = function () {
        for (var a = this.o(), b = new google.maps.LatLngBounds, c = 0, f; f = a[c]; c++)b.extend(f.getPosition());
        this.c.fitBounds(b)
    };
    j.z = h("j");
    j.o = h("a");
    j.V = function () {
        return this.a.length
    };
    j.ba = e("J");
    j.I = h("J");
    j.G = function (a, b) {
        for (var c = 0, f = a.length, g = f; g !== 0;)g = parseInt(g / 10, 10), c++;
        c = Math.min(c, b);
        return {text: f, index: c}
    };
    j.$ = e("G");
    j.H = h("G");
    j.C = function (a, b) {
        for (var c = 0, f; f = a[c]; c++)q(this, f);
        b || this.i()
    };
    function q(a, b) {
        b.s = !1;
        b.draggable && google.maps.event.addListener(b, "dragend", function () {
            b.s = !1;
            a.L()
        });
        a.a.push(b)
    }

    j.q = function (a, b) {
        q(this, a);
        b || this.i()
    };
    function r(a, b) {
        var c = -1;
        if (a.a.indexOf) c = a.a.indexOf(b); else for (var f = 0, g; g = a.a[f]; f++)if (g == b) {
            c = f;
            break
        }
        if (c == -1)return !1;
        b.setMap(d);
        a.a.splice(c, 1);
        return !0
    }

    j.Y = function (a, b) {
        var c = r(this, a);
        return !b && c ? (this.m(), this.i(), !0) : !1
    };
    j.Z = function (a, b) {
        for (var c = !1, f = 0, g; g = a[f]; f++)g = r(this, g), c = c || g;
        if (!b && c)return this.m(), this.i(), !0
    };
    j.U = function () {
        return this.f.length
    };
    j.getMap = h("c");
    j.setMap = e("c");
    j.w = h("g");
    j.aa = e("g");
    j.v = function (a) {
        var b = this.getProjection(), c = new google.maps.LatLng(a.getNorthEast().lat(), a.getNorthEast().lng()),
            f = new google.maps.LatLng(a.getSouthWest().lat(), a.getSouthWest().lng()), c = b.fromLatLngToDivPixel(c);
        c.x += this.g;
        c.y -= this.g;
        f = b.fromLatLngToDivPixel(f);
        f.x -= this.g;
        f.y += this.g;
        c = b.fromDivPixelToLatLng(c);
        b = b.fromDivPixelToLatLng(f);
        a.extend(c);
        a.extend(b);
        return a
    };
    j.R = function () {
        this.m(!0);
        this.a = []
    };
    j.m = function (a) {
        for (var b = 0, c; c = this.f[b]; b++)c.remove();
        for (b = 0; c = this.a[b]; b++)c.s = !1, a && c.setMap(d);
        this.f = []
    };
    j.L = function () {
        var a = this.f.slice();
        this.f.length = 0;
        this.m();
        this.i();
        window.setTimeout(function () {
            for (var b = 0, c; c = a[b]; b++)c.remove()
        }, 0)
    };
    j.i = function () {
        n(this)
    };
    function n(a) {
        if (a.A)for (var b = a.v(new google.maps.LatLngBounds(a.c.getBounds().getSouthWest(), a.c.getBounds().getNorthEast())), c = 0, f; f = a.a[c]; c++)if (!f.s && b.contains(f.getPosition())) {
            for (var g = a, u = 4E4, o = d, v = 0, m = void 0; m = g.f[v]; v++) {
                var i = m.getCenter();
                if (i) {
                    var p = f.getPosition();
                    if (!i || !p) i = 0; else var w = (p.lat() - i.lat()) * Math.PI / 180,
                        x = (p.lng() - i.lng()) * Math.PI / 180,
                        i = Math.sin(w / 2) * Math.sin(w / 2) + Math.cos(i.lat() * Math.PI / 180) * Math.cos(p.lat() * Math.PI / 180) * Math.sin(x / 2) * Math.sin(x / 2),
                        i = 6371 * 2 * Math.atan2(Math.sqrt(i),
                                Math.sqrt(1 - i));
                    i < u && (u = i, o = m)
                }
            }
            o && o.F.contains(f.getPosition()) ? o.q(f) : (m = new s(g), m.q(f), g.f.push(m))
        }
    }

    function s(a) {
        this.k = a;
        this.c = a.getMap();
        this.g = a.w();
        this.l = a.l;
        this.r = a.r;
        this.d = d;
        this.a = [];
        this.F = d;
        this.n = new t(this, a.z(), a.w())
    }

    j = s.prototype;
    j.q = function (a) {
        var b;
        a:if (this.a.indexOf) b = this.a.indexOf(a) != -1; else {
            b = 0;
            for (var c; c = this.a[b]; b++)if (c == a) {
                b = !0;
                break a
            }
            b = !1
        }
        if (b)return !1;
        if (this.d) {
            if (this.r) c = this.a.length + 1, b = (this.d.lat() * (c - 1) + a.getPosition().lat()) / c, c = (this.d.lng() * (c - 1) + a.getPosition().lng()) / c, this.d = new google.maps.LatLng(b, c), y(this)
        } else this.d = a.getPosition(), y(this);
        a.s = !0;
        this.a.push(a);
        b = this.a.length;
        b < this.l && a.getMap() != this.c && a.setMap(this.c);
        if (b == this.l)for (c = 0; c < b; c++)this.a[c].setMap(d);
        b >= this.l && a.setMap(d);
        a = this.c.getZoom();
        if ((b = this.k.I()) && a > b)for (a = 0; b = this.a[a]; a++)b.setMap(this.c); else if (this.a.length < this.l) z(this.n); else {
            b = this.k.H()(this.a, this.k.z().length);
            this.n.setCenter(this.d);
            a = this.n;
            a.B = b;
            a.ga = b.text;
            a.ea = b.index;
            if (a.b) a.b.innerHTML = b.text;
            b = Math.max(0, a.B.index - 1);
            b = Math.min(a.j.length - 1, b);
            b = a.j[b];
            a.da = b.url;
            a.h = b.height;
            a.p = b.width;
            a.M = b.textColor;
            a.e = b.anchor;
            a.N = b.textSize;
            a.D = b.backgroundPosition;
            this.n.show()
        }
        return !0
    };
    j.getBounds = function () {
        for (var a = new google.maps.LatLngBounds(this.d, this.d), b = this.o(), c = 0, f; f = b[c]; c++)a.extend(f.getPosition());
        return a
    };
    j.remove = function () {
        this.n.remove();
        this.a.length = 0;
        delete this.a
    };
    j.T = function () {
        return this.a.length
    };
    j.o = h("a");
    j.getCenter = h("d");
    function y(a) {
        a.F = a.k.v(new google.maps.LatLngBounds(a.d, a.d))
    }

    j.getMap = h("c");
    function t(a, b, c) {
        a.k.extend(t, google.maps.OverlayView);
        this.j = b;
        this.fa = c || 0;
        this.u = a;
        this.d = d;
        this.c = a.getMap();
        this.B = this.b = d;
        this.t = !1;
        this.setMap(this.c)
    }

    j = t.prototype;
    j.onAdd = function () {
        this.b = document.createElement("DIV");
        if (this.t) this.b.style.cssText = A(this, B(this, this.d)), this.b.innerHTML = this.B.text;
        this.getPanes().overlayMouseTarget.appendChild(this.b);
        var a = this;
        google.maps.event.addDomListener(this.b, "click", function () {
            var b = a.u.k;
            google.maps.event.trigger(b, "clusterclick", a.u);
            b.O && a.c.fitBounds(a.u.getBounds())
        })
    };
    function B(a, b) {
        var c = a.getProjection().fromLatLngToDivPixel(b);
        c.x -= parseInt(a.p / 2, 10);
        c.y -= parseInt(a.h / 2, 10);
        return c
    }

    j.draw = function () {
        if (this.t) {
            var a = B(this, this.d);
            this.b.style.top = a.y + "px";
            this.b.style.left = a.x + "px"
        }
    };
    function z(a) {
        if (a.b) a.b.style.display = "none";
        a.t = !1
    }

    j.show = function () {
        if (this.b) this.b.style.cssText = A(this, B(this, this.d)), this.b.style.display = "";
        this.t = !0
    };
    j.remove = function () {
        this.setMap(d)
    };
    j.onRemove = function () {
        if (this.b && this.b.parentNode) z(this), this.b.parentNode.removeChild(this.b), this.b = d
    };
    j.setCenter = e("d");
    function A(a, b) {
        var c = [];
        c.push("background-image:url(" + a.da + ");");
        c.push("background-position:" + (a.D ? a.D : "0 0") + ";");
        typeof a.e === "object" ? (typeof a.e[0] === "number" && a.e[0] > 0 && a.e[0] < a.h ? c.push("height:" + (a.h - a.e[0]) + "px; padding-top:" + a.e[0] + "px;") : c.push("height:" + a.h + "px; line-height:" + a.h + "px;"), typeof a.e[1] === "number" && a.e[1] > 0 && a.e[1] < a.p ? c.push("width:" + (a.p - a.e[1]) + "px; padding-left:" + a.e[1] + "px;") : c.push("width:" + a.p + "px; text-align:center;")) : c.push("height:" + a.h + "px; line-height:" + a.h +
            "px; width:" + a.p + "px; text-align:center;");
        c.push("cursor:pointer; top:" + b.y + "px; left:" + b.x + "px; color:" + (a.M ? a.M : "black") + "; position:absolute; font-size:" + (a.N ? a.N : 11) + "px; font-family:Arial,sans-serif; font-weight:bold");
        return c.join("")
    }

    window.MarkerClusterer = k;
    k.prototype.addMarker = k.prototype.q;
    k.prototype.addMarkers = k.prototype.C;
    k.prototype.clearMarkers = k.prototype.R;
    k.prototype.fitMapToMarkers = k.prototype.S;
    k.prototype.getCalculator = k.prototype.H;
    k.prototype.getGridSize = k.prototype.w;
    k.prototype.getExtendedBounds = k.prototype.v;
    k.prototype.getMap = k.prototype.getMap;
    k.prototype.getMarkers = k.prototype.o;
    k.prototype.getMaxZoom = k.prototype.I;
    k.prototype.getStyles = k.prototype.z;
    k.prototype.getTotalClusters = k.prototype.U;
    k.prototype.getTotalMarkers = k.prototype.V;
    k.prototype.redraw = k.prototype.i;
    k.prototype.removeMarker = k.prototype.Y;
    k.prototype.removeMarkers = k.prototype.Z;
    k.prototype.resetViewport = k.prototype.m;
    k.prototype.repaint = k.prototype.L;
    k.prototype.setCalculator = k.prototype.$;
    k.prototype.setGridSize = k.prototype.aa;
    k.prototype.setMaxZoom = k.prototype.ba;
    k.prototype.onAdd = k.prototype.onAdd;
    k.prototype.draw = k.prototype.draw;
    s.prototype.getCenter = s.prototype.getCenter;
    s.prototype.getSize = s.prototype.T;
    s.prototype.getMarkers = s.prototype.o;
    t.prototype.onAdd = t.prototype.onAdd;
    t.prototype.draw = t.prototype.draw;
    t.prototype.onRemove = t.prototype.onRemove;
})();

/**
 * jQuery Geocoding and Places Autocomplete Plugin - V 1.6.5
 *
 * @author Martin Kleppe <kleppe@ubilabs.net>, 2014
 * @author Ubilabs http://ubilabs.net, 2014
 * @license MIT License <http://www.opensource.org/licenses/mit-license.php>
 */// # $.geocomplete()
// ## jQuery Geocoding and Places Autocomplete Plugin
//
// * https://github.com/ubilabs/geocomplete/
// * by Martin Kleppe <kleppe@ubilabs.net>
(function (e, t, n, r) {
    function u(t, n) {
        this.options = e.extend(!0, {}, i, n), this.input = t, this.$input = e(t), this._defaults = i, this._name = "geocomplete", this.init()
    }

    var i = {
            bounds: !0,
            country: null,
            map: !1,
            details: !1,
            detailsAttribute: "name",
            detailsScope: null,
            autoselect: !0,
            location: !1,
            mapOptions: {zoom: 14, scrollwheel: !1, mapTypeId: "roadmap"},
            markerOptions: {draggable: !1},
            maxZoom: 16,
            types: ["geocode"],
            blur: !1,
            geocodeAfterResult: !1,
            restoreValueAfterBlur: !1
        },
        s = "street_address route intersection political country administrative_area_level_1 administrative_area_level_2 administrative_area_level_3 colloquial_area locality sublocality neighborhood premise subpremise postal_code natural_feature airport park point_of_interest post_box street_number floor room lat lng viewport location formatted_address location_type bounds".split(" "),
        o = "id place_id url website vicinity reference name rating international_phone_number icon formatted_phone_number".split(" ");
    e.extend(u.prototype, {
        init: function () {
            this.initMap(), this.initMarker(), this.initGeocoder(), this.initDetails(), this.initLocation()
        }, initMap: function () {
            if (!this.options.map)return;
            if (typeof this.options.map.setCenter == "function") {
                this.map = this.options.map;
                return
            }
            this.map = new google.maps.Map(e(this.options.map)[0], this.options.mapOptions), google.maps.event.addListener(this.map, "click", e.proxy(this.mapClicked, this)), google.maps.event.addListener(this.map, "dragend", e.proxy(this.mapDragged, this)), google.maps.event.addListener(this.map, "idle", e.proxy(this.mapIdle, this)), google.maps.event.addListener(this.map, "zoom_changed", e.proxy(this.mapZoomed, this))
        }, initMarker: function () {
            if (!this.map)return;
            var t = e.extend(this.options.markerOptions, {map: this.map});
            if (t.disabled)return;
            this.marker = new google.maps.Marker(t), google.maps.event.addListener(this.marker, "dragend", e.proxy(this.markerDragged, this))
        }, initGeocoder: function () {
            var t = !1, n = {
                types: this.options.types,
                bounds: this.options.bounds === !0 ? null : this.options.bounds,
                componentRestrictions: this.options.componentRestrictions
            };
            this.options.country && (n.componentRestrictions = {country: this.options.country}), this.autocomplete = new google.maps.places.Autocomplete(this.input, n), this.geocoder = new google.maps.Geocoder, this.map && this.options.bounds === !0 && this.autocomplete.bindTo("bounds", this.map), google.maps.event.addListener(this.autocomplete, "place_changed", e.proxy(this.placeChanged, this)), this.$input.on("keypress." + this._name, function (e) {
                if (e.keyCode === 13)return !1
            }), this.options.geocodeAfterResult === !0 && this.$input.bind("keypress." + this._name, e.proxy(function () {
                event.keyCode != 9 && this.selected === !0 && (this.selected = !1)
            }, this)), this.$input.bind("geocode." + this._name, e.proxy(function () {
                this.find()
            }, this)), this.$input.bind("geocode:result." + this._name, e.proxy(function () {
                this.lastInputVal = this.$input.val()
            }, this)), this.options.blur === !0 && this.$input.on("blur." + this._name, e.proxy(function () {
                if (this.options.geocodeAfterResult === !0 && this.selected === !0)return;
                this.options.restoreValueAfterBlur === !0 && this.selected === !0 ? setTimeout(e.proxy(this.restoreLastValue, this), 0) : this.find()
            }, this))
        }, initDetails: function () {
            function i(e) {
                r[e] = t.find("[" + n + "=" + e + "]")
            }

            if (!this.options.details)return;
            if (this.options.detailsScope)var t = e(this.input).parents(this.options.detailsScope).find(this.options.details); else var t = e(this.options.details);
            var n = this.options.detailsAttribute, r = {};
            e.each(s, function (e, t) {
                i(t), i(t + "_short")
            }), e.each(o, function (e, t) {
                i(t)
            }), this.$details = t, this.details = r
        }, initLocation: function () {
            var e = this.options.location, t;
            if (!e)return;
            if (typeof e == "string") {
                this.find(e);
                return
            }
            e instanceof Array && (t = new google.maps.LatLng(e[0], e[1])), e instanceof google.maps.LatLng && (t = e), t && (this.map && this.map.setCenter(t), this.marker && this.marker.setPosition(t))
        }, destroy: function () {
            this.map && (google.maps.event.clearInstanceListeners(this.map), google.maps.event.clearInstanceListeners(this.marker)), this.autocomplete.unbindAll(), google.maps.event.clearInstanceListeners(this.autocomplete), google.maps.event.clearInstanceListeners(this.input), this.$input.removeData(), this.$input.off(this._name), this.$input.unbind("." + this._name)
        }, find: function (e) {
            this.geocode({address: e || this.$input.val()})
        }, geocode: function (t) {
            if (!t.address)return;
            this.options.bounds && !t.bounds && (this.options.bounds === !0 ? t.bounds = this.map && this.map.getBounds() : t.bounds = this.options.bounds), this.options.country && (t.region = this.options.country), this.geocoder.geocode(t, e.proxy(this.handleGeocode, this))
        }, selectFirstResult: function () {
            var t = "";
            e(".pac-item-selected")[0] && (t = "-selected");
            var n = e(".pac-container:last .pac-item" + t + ":first span:nth-child(2)").text(),
                r = e(".pac-container:last .pac-item" + t + ":first span:nth-child(3)").text(), i = n;
            return r && (i += " - " + r), this.$input.val(i), i
        }, restoreLastValue: function () {
            this.lastInputVal && this.$input.val(this.lastInputVal)
        }, handleGeocode: function (e, t) {
            if (t === google.maps.GeocoderStatus.OK) {
                var n = e[0];
                this.$input.val(n.formatted_address), this.update(n), e.length > 1 && this.trigger("geocode:multiple", e)
            } else this.trigger("geocode:error", t)
        }, trigger: function (e, t) {
            this.$input.trigger(e, [t])
        }, center: function (e) {
            e.viewport ? (this.map.fitBounds(e.viewport), this.map.getZoom() > this.options.maxZoom && this.map.setZoom(this.options.maxZoom)) : (this.map.setZoom(this.options.maxZoom), this.map.setCenter(e.location)), this.marker && (this.marker.setPosition(e.location), this.marker.setAnimation(this.options.markerOptions.animation))
        }, update: function (e) {
            this.map && this.center(e.geometry), this.$details && this.fillDetails(e), this.trigger("geocode:result", e)
        }, fillDetails: function (t) {
            var n = {}, r = t.geometry, i = r.viewport, s = r.bounds;
            e.each(t.address_components, function (t, r) {
                var i = r.types[0];
                e.each(r.types, function (e, t) {
                    n[t] = r.long_name, n[t + "_short"] = r.short_name
                })
            }), e.each(o, function (e, r) {
                n[r] = t[r]
            }), e.extend(n, {
                formatted_address: t.formatted_address,
                location_type: r.location_type || "PLACES",
                viewport: i,
                bounds: s,
                location: r.location,
                lat: r.location.lat(),
                lng: r.location.lng()
            }), e.each(this.details, e.proxy(function (e, t) {
                var r = n[e];
                this.setDetail(t, r)
            }, this)), this.data = n
        }, setDetail: function (e, t) {
            t === r ? t = "" : typeof t.toUrlValue == "function" && (t = t.toUrlValue()), e.is(":input") ? e.val(t) : e.text(t)
        }, markerDragged: function (e) {
            this.trigger("geocode:dragged", e.latLng)
        }, mapClicked: function (e) {
            this.trigger("geocode:click", e.latLng)
        }, mapDragged: function (e) {
            this.trigger("geocode:mapdragged", this.map.getCenter())
        }, mapIdle: function (e) {
            this.trigger("geocode:idle", this.map.getCenter())
        }, mapZoomed: function (e) {
            this.trigger("geocode:zoom", this.map.getZoom())
        }, resetMarker: function () {
            this.marker.setPosition(this.data.location), this.setDetail(this.details.lat, this.data.location.lat()), this.setDetail(this.details.lng, this.data.location.lng())
        }, placeChanged: function () {
            var e = this.autocomplete.getPlace();
            this.selected = !0;
            if (!e.geometry) {
                if (this.options.autoselect) {
                    var t = this.selectFirstResult();
                    this.find(t)
                }
            } else this.update(e)
        }
    }), e.fn.geocomplete = function (t) {
        var n = "plugin_geocomplete";
        if (typeof t == "string") {
            var r = e(this).data(n) || e(this).geocomplete().data(n), i = r[t];
            return typeof i == "function" ? (i.apply(r, Array.prototype.slice.call(arguments, 1)), e(this)) : (arguments.length == 2 && (i = arguments[1]), i)
        }
        return this.each(function () {
            var r = e.data(this, n);
            r || (r = new u(this, t), e.data(this, n, r))
        })
    }
})(jQuery, window, document);


/**
 * @name InfoBox
 * @version 1.1.13 [March 19, 2014]
 * @author Gary Little (inspired by proof-of-concept code from Pamela Fox of Google)
 * @copyright Copyright 2010 Gary Little [gary at luxcentral.com]
 * @fileoverview InfoBox extends the Google Maps JavaScript API V3 <tt>OverlayView</tt> class.
 *  <p>
 *  An InfoBox behaves like a <tt>google.maps.InfoWindow</tt>, but it supports several
 *  additional properties for advanced styling. An InfoBox can also be used as a map label.
 *  <p>
 *  An InfoBox also fires the same events as a <tt>google.maps.InfoWindow</tt>.
 */

/*!
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function InfoBox(t) {
    t = t || {}, google.maps.OverlayView.apply(this, arguments), this.content_ = t.content || "", this.disableAutoPan_ = t.disableAutoPan || !1, this.maxWidth_ = t.maxWidth || 0, this.pixelOffset_ = t.pixelOffset || new google.maps.Size(0, 0), this.position_ = t.position || new google.maps.LatLng(0, 0), this.zIndex_ = t.zIndex || null, this.boxClass_ = t.boxClass || "infoBox", this.boxStyle_ = t.boxStyle || {}, this.closeBoxMargin_ = t.closeBoxMargin || "2px", this.closeBoxURL_ = t.closeBoxURL || "http://www.google.com/intl/en_us/mapfiles/close.gif", "" === t.closeBoxURL && (this.closeBoxURL_ = ""), this.infoBoxClearance_ = t.infoBoxClearance || new google.maps.Size(1, 1), "undefined" == typeof t.visible && ("undefined" == typeof t.isHidden ? t.visible = !0 : t.visible = !t.isHidden), this.isHidden_ = !t.visible, this.alignBottom_ = t.alignBottom || !1, this.pane_ = t.pane || "floatPane", this.enableEventPropagation_ = t.enableEventPropagation || !1, this.div_ = null, this.closeListener_ = null, this.moveListener_ = null, this.contextListener_ = null, this.eventListeners_ = null, this.fixedWidthSet_ = null
}
InfoBox.prototype = new google.maps.OverlayView, InfoBox.prototype.createInfoBoxDiv_ = function () {
    var t, e, i, o = this, s = function (t) {
        t.cancelBubble = !0, t.stopPropagation && t.stopPropagation()
    }, n = function (t) {
        t.returnValue = !1, t.preventDefault && t.preventDefault(), o.enableEventPropagation_ || s(t)
    };
    if (!this.div_) {
        if (this.div_ = document.createElement("div"), this.setBoxStyle_(), "undefined" == typeof this.content_.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + this.content_ : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(this.content_)), this.getPanes()[this.pane_].appendChild(this.div_), this.addClickHandler_(), this.div_.style.width ? this.fixedWidthSet_ = !0 : 0 !== this.maxWidth_ && this.div_.offsetWidth > this.maxWidth_ ? (this.div_.style.width = this.maxWidth_, this.div_.style.overflow = "auto", this.fixedWidthSet_ = !0) : (i = this.getBoxWidths_(), this.div_.style.width = this.div_.offsetWidth - i.left - i.right + "px", this.fixedWidthSet_ = !1), this.panBox_(this.disableAutoPan_), !this.enableEventPropagation_) {
            for (this.eventListeners_ = [], e = ["mousedown", "mouseover", "mouseout", "mouseup", "click", "dblclick", "touchstart", "touchend", "touchmove"], t = 0; t < e.length; t++)this.eventListeners_.push(google.maps.event.addDomListener(this.div_, e[t], s));
            this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (t) {
                this.style.cursor = "default"
            }))
        }
        this.contextListener_ = google.maps.event.addDomListener(this.div_, "contextmenu", n), google.maps.event.trigger(this, "domready")
    }
}, InfoBox.prototype.getCloseBoxImg_ = function () {
    var t = "";
    return "" !== this.closeBoxURL_ && (t = "<img", t += " src='" + this.closeBoxURL_ + "'", t += " align=right", t += " style='", t += " position: relative;", t += " cursor: pointer;", t += " margin: " + this.closeBoxMargin_ + ";", t += "'>"), t
}, InfoBox.prototype.addClickHandler_ = function () {
    var t;
    "" !== this.closeBoxURL_ ? (t = this.div_.firstChild, this.closeListener_ = google.maps.event.addDomListener(t, "click", this.getCloseClickHandler_())) : this.closeListener_ = null
}, InfoBox.prototype.getCloseClickHandler_ = function () {
    var t = this;
    return function (e) {
        e.cancelBubble = !0, e.stopPropagation && e.stopPropagation(), google.maps.event.trigger(t, "closeclick"), t.close()
    }
}, InfoBox.prototype.panBox_ = function (t) {
    var e, i, o = 0, s = 0;
    if (!t && (e = this.getMap(), e instanceof google.maps.Map)) {
        e.getBounds().contains(this.position_) || e.setCenter(this.position_), i = e.getBounds();
        var n = e.getDiv(), h = n.offsetWidth, d = n.offsetHeight, l = this.pixelOffset_.width,
            r = this.pixelOffset_.height, a = this.div_.offsetWidth, p = this.div_.offsetHeight,
            _ = this.infoBoxClearance_.width, f = this.infoBoxClearance_.height,
            v = this.getProjection().fromLatLngToContainerPixel(this.position_);
        if (v.x < -l + _ ? o = v.x + l - _ : v.x + a + l + _ > h && (o = v.x + a + l + _ - h), this.alignBottom_ ? v.y < -r + f + p ? s = v.y + r - f - p : v.y + r + f > d && (s = v.y + r + f - d) : v.y < -r + f ? s = v.y + r - f : v.y + p + r + f > d && (s = v.y + p + r + f - d), 0 !== o || 0 !== s) {
            {
                e.getCenter()
            }
            e.panBy(o, s)
        }
    }
}, InfoBox.prototype.setBoxStyle_ = function () {
    var t, e;
    if (this.div_) {
        this.div_.className = this.boxClass_, this.div_.style.cssText = "", e = this.boxStyle_;
        for (t in e)e.hasOwnProperty(t) && (this.div_.style[t] = e[t]);
        this.div_.style.WebkitTransform = "translateZ(0)", "undefined" != typeof this.div_.style.opacity && "" !== this.div_.style.opacity && (this.div_.style.MsFilter = '"progid:DXImageTransform.Microsoft.Alpha(Opacity=' + 100 * this.div_.style.opacity + ')"', this.div_.style.filter = "alpha(opacity=" + 100 * this.div_.style.opacity + ")"), this.div_.style.position = "absolute", this.div_.style.visibility = "hidden", null !== this.zIndex_ && (this.div_.style.zIndex = this.zIndex_)
    }
}, InfoBox.prototype.getBoxWidths_ = function () {
    var t, e = {top: 0, bottom: 0, left: 0, right: 0}, i = this.div_;
    return document.defaultView && document.defaultView.getComputedStyle ? (t = i.ownerDocument.defaultView.getComputedStyle(i, ""), t && (e.top = parseInt(t.borderTopWidth, 10) || 0, e.bottom = parseInt(t.borderBottomWidth, 10) || 0, e.left = parseInt(t.borderLeftWidth, 10) || 0, e.right = parseInt(t.borderRightWidth, 10) || 0)) : document.documentElement.currentStyle && i.currentStyle && (e.top = parseInt(i.currentStyle.borderTopWidth, 10) || 0, e.bottom = parseInt(i.currentStyle.borderBottomWidth, 10) || 0, e.left = parseInt(i.currentStyle.borderLeftWidth, 10) || 0, e.right = parseInt(i.currentStyle.borderRightWidth, 10) || 0), e
}, InfoBox.prototype.onRemove = function () {
    this.div_ && (this.div_.parentNode.removeChild(this.div_), this.div_ = null)
}, InfoBox.prototype.draw = function () {
    this.createInfoBoxDiv_();
    var t = this.getProjection().fromLatLngToDivPixel(this.position_);
    this.div_.style.left = t.x + this.pixelOffset_.width + "px", this.alignBottom_ ? this.div_.style.bottom = -(t.y + this.pixelOffset_.height) + "px" : this.div_.style.top = t.y + this.pixelOffset_.height + "px", this.isHidden_ ? this.div_.style.visibility = "hidden" : this.div_.style.visibility = "visible"
}, InfoBox.prototype.setOptions = function (t) {
    "undefined" != typeof t.boxClass && (this.boxClass_ = t.boxClass, this.setBoxStyle_()), "undefined" != typeof t.boxStyle && (this.boxStyle_ = t.boxStyle, this.setBoxStyle_()), "undefined" != typeof t.content && this.setContent(t.content), "undefined" != typeof t.disableAutoPan && (this.disableAutoPan_ = t.disableAutoPan), "undefined" != typeof t.maxWidth && (this.maxWidth_ = t.maxWidth), "undefined" != typeof t.pixelOffset && (this.pixelOffset_ = t.pixelOffset), "undefined" != typeof t.alignBottom && (this.alignBottom_ = t.alignBottom), "undefined" != typeof t.position && this.setPosition(t.position), "undefined" != typeof t.zIndex && this.setZIndex(t.zIndex), "undefined" != typeof t.closeBoxMargin && (this.closeBoxMargin_ = t.closeBoxMargin), "undefined" != typeof t.closeBoxURL && (this.closeBoxURL_ = t.closeBoxURL), "undefined" != typeof t.infoBoxClearance && (this.infoBoxClearance_ = t.infoBoxClearance), "undefined" != typeof t.isHidden && (this.isHidden_ = t.isHidden), "undefined" != typeof t.visible && (this.isHidden_ = !t.visible), "undefined" != typeof t.enableEventPropagation && (this.enableEventPropagation_ = t.enableEventPropagation), this.div_ && this.draw()
}, InfoBox.prototype.setContent = function (t) {
    this.content_ = t, this.div_ && (this.closeListener_ && (google.maps.event.removeListener(this.closeListener_), this.closeListener_ = null), this.fixedWidthSet_ || (this.div_.style.width = ""), "undefined" == typeof t.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + t : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(t)), this.fixedWidthSet_ || (this.div_.style.width = this.div_.offsetWidth + "px", "undefined" == typeof t.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + t : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(t))), this.addClickHandler_()), google.maps.event.trigger(this, "content_changed")
}, InfoBox.prototype.setPosition = function (t) {
    this.position_ = t, this.div_ && this.draw(), google.maps.event.trigger(this, "position_changed")
}, InfoBox.prototype.setZIndex = function (t) {
    this.zIndex_ = t, this.div_ && (this.div_.style.zIndex = t), google.maps.event.trigger(this, "zindex_changed")
}, InfoBox.prototype.setVisible = function (t) {
    this.isHidden_ = !t, this.div_ && (this.div_.style.visibility = this.isHidden_ ? "hidden" : "visible")
}, InfoBox.prototype.getContent = function () {
    return this.content_
}, InfoBox.prototype.getPosition = function () {
    return this.position_
}, InfoBox.prototype.getZIndex = function () {
    return this.zIndex_
}, InfoBox.prototype.getVisible = function () {
    var t;
    return t = "undefined" == typeof this.getMap() || null === this.getMap() ? !1 : !this.isHidden_
}, InfoBox.prototype.show = function () {
    this.isHidden_ = !1, this.div_ && (this.div_.style.visibility = "visible")
}, InfoBox.prototype.hide = function () {
    this.isHidden_ = !0, this.div_ && (this.div_.style.visibility = "hidden")
}, InfoBox.prototype.open = function (t, e) {
    var i = this;
    e && (this.position_ = e.getPosition(), this.moveListener_ = google.maps.event.addListener(e, "position_changed", function () {
        i.setPosition(this.getPosition())
    })), this.setMap(t), this.div_ && this.panBox_()
}, InfoBox.prototype.close = function () {
    var t;
    if (this.closeListener_ && (google.maps.event.removeListener(this.closeListener_), this.closeListener_ = null), this.eventListeners_) {
        for (t = 0; t < this.eventListeners_.length; t++)google.maps.event.removeListener(this.eventListeners_[t]);
        this.eventListeners_ = null
    }
    this.moveListener_ && (google.maps.event.removeListener(this.moveListener_), this.moveListener_ = null), this.contextListener_ && (google.maps.event.removeListener(this.contextListener_), this.contextListener_ = null), this.setMap(null)
};

/*! lightgallery - v1.2.3 - 2015-09-22
 * http://sachinchoolur.github.io/lightGallery/
 * Copyright (c) 2015 Sachin N; Licensed Apache 2.0 */
!function (a, b, c, d) {
    "use strict";
    function e(b, d) {
        return this.el = b, this.$el = a(b), this.s = a.extend({}, f, d), this.modules = {}, this.lGalleryOn = !1, this.lgBusy = !1, this.hideBartimeout = !1, this.isTouch = "ontouchstart" in c.documentElement, this.s.slideEndAnimatoin && (this.s.hideControlOnEnd = !1), this.s.dynamic ? this.$items = this.s.dynamicEl : "this" === this.s.selector ? this.$items = this.$el : "" !== this.s.selector ? this.$items = this.$el.find(a(this.s.selector)) : this.$items = this.$el.children(), this.$slide = "", this.$outer = "", this.init(), this
    }

    var f = {
        mode: "lg-slide",
        cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
        easing: "linear",
        speed: 600,
        height: "100%",
        width: "100%",
        addClass: "",
        startClass: "lg-start-zoom",
        backdropDuration: 150,
        hideBarsDelay: 6e3,
        useLeft: !1,
        closable: !0,
        loop: !0,
        escKey: !0,
        keyPress: !0,
        controls: !0,
        slideEndAnimatoin: !0,
        hideControlOnEnd: !1,
        mousewheel: !0,
        appendSubHtmlTo: ".lg-sub-html",
        preload: 1,
        showAfterLoad: !0,
        selector: "",
        nextHtml: "",
        prevHtml: "",
        index: !1,
        iframeMaxWidth: "100%",
        download: !0,
        counter: !0,
        appendCounterTo: ".lg-toolbar",
        swipeThreshold: 50,
        enableSwipe: !0,
        enableDrag: !0,
        dynamic: !1,
        dynamicEl: [],
        galleryId: 1
    };
    e.prototype.init = function () {
        var c = this;
        c.s.preload > c.$items.length && (c.s.preload = c.$items.length);
        var d = b.location.hash;
        d.indexOf("lg=" + this.s.galleryId) > 0 && (c.index = parseInt(d.split("&slide=")[1], 10), a("body").addClass("lg-from-hash"), a("body").hasClass("lg-on") || setTimeout(function () {
            c.build(c.index), a("body").addClass("lg-on")
        })), c.s.dynamic ? (c.$el.trigger("onBeforeOpen.lg"), c.index = c.s.index || 0, a("body").hasClass("lg-on") || setTimeout(function () {
            c.build(c.index), a("body").addClass("lg-on")
        })) : c.$items.on("click.lgcustom", function (b) {
            try {
                b.preventDefault(), b.preventDefault()
            } catch (d) {
                b.returnValue = !1
            }
            c.$el.trigger("onBeforeOpen.lg"), c.index = c.s.index || c.$items.index(this), a("body").hasClass("lg-on") || (c.build(c.index), a("body").addClass("lg-on"))
        })
    }, e.prototype.build = function (b) {
        var c = this;
        c.structure(), a.each(a.fn.lightGallery.modules, function (b) {
            c.modules[b] = new a.fn.lightGallery.modules[b](c.el)
        }), c.slide(b, !1, !1), c.s.keyPress && c.keyPress(), c.$items.length > 1 && (c.arrow(), setTimeout(function () {
            c.enableDrag(), c.enableSwipe()
        }, 50), c.s.mousewheel && c.mousewheel()), c.counter(), c.closeGallery(), c.$el.trigger("onAfterOpen.lg"), c.$outer.on("mousemove.lg click.lg touchstart.lg", function () {
            c.$outer.removeClass("lg-hide-items"), clearTimeout(c.hideBartimeout), c.hideBartimeout = setTimeout(function () {
                c.$outer.addClass("lg-hide-items")
            }, c.s.hideBarsDelay)
        })
    }, e.prototype.structure = function () {
        var c, d = "", e = "", f = 0, g = "", h = this;
        for (a("body").append('<div class="lg-backdrop"></div>'), a(".lg-backdrop").css("transition-duration", this.s.backdropDuration + "ms"), f = 0; f < this.$items.length; f++)d += '<div class="lg-item"></div>';
        if (this.s.controls && this.$items.length > 1 && (e = '<div class="lg-actions"><div class="lg-prev lg-icon">' + this.s.prevHtml + '</div><div class="lg-next lg-icon">' + this.s.nextHtml + "</div></div>"), ".lg-sub-html" === this.s.appendSubHtmlTo && (g = '<div class="lg-sub-html"></div>'), c = '<div class="lg-outer ' + this.s.addClass + " " + this.s.startClass + '"><div class="lg" style="width:' + this.s.width + "; height:" + this.s.height + '"><div class="lg-inner">' + d + '</div><div class="lg-toolbar group"><span class="lg-close lg-icon"></span></div>' + e + g + "</div></div>", a("body").append(c), this.$outer = a(".lg-outer"), this.$slide = this.$outer.find(".lg-item"), this.s.useLeft ? this.$outer.addClass("lg-use-left") : this.$outer.addClass("lg-use-css3"), h.setTop(), a(b).on("resize.lg orientationchange.lg", function () {
                setTimeout(function () {
                    h.setTop()
                }, 100)
            }), this.$slide.eq(this.index).addClass("lg-current"), this.doCss() ? this.$outer.addClass("lg-css3") : this.$outer.addClass("lg-css"), this.$outer.addClass(this.s.mode), this.s.enableDrag && this.$items.length > 1 && this.$outer.addClass("lg-grab"), this.s.showAfterLoad && this.$outer.addClass("lg-show-after-load"), this.doCss()) {
            var i = this.$outer.find(".lg-inner");
            i.css("transition-timing-function", this.s.cssEasing), i.css("transition-duration", this.s.speed + "ms")
        }
        a(".lg-backdrop").addClass("in"), setTimeout(function () {
            h.$outer.addClass("lg-visible")
        }, this.s.backdropDuration), this.s.download && this.$outer.find(".lg-toolbar").append('<a id="lg-download" target="_blank" download class="lg-download lg-icon"></a>')
    }, e.prototype.setTop = function () {
        if ("100%" !== this.s.height) {
            var c = a(b).height(), d = (c - parseInt(this.s.height, 10)) / 2, e = this.$outer.find(".lg");
            c >= parseInt(this.s.height, 10) ? e.css("top", d + "px") : e.css("top", "0px")
        }
    }, e.prototype.doCss = function () {
        var a = function () {
            var a = ["transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition"],
                b = c.documentElement, d = 0;
            for (d = 0; d < a.length; d++)if (a[d] in b.style)return !0
        };
        return a() ? !0 : !1
    }, e.prototype.isVideo = function (a, b) {
        var c;
        if (c = this.s.dynamic ? this.s.dynamicEl[b].html : this.$items.eq(b).attr("data-html"), !a && c)return {html5: !0};
        var d = a.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-]+)/i),
            e = a.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
            f = a.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i);
        return d ? {youtube: d} : e ? {vimeo: e} : f ? {dailymotion: f} : void 0
    }, e.prototype.counter = function () {
        this.s.counter && a(this.s.appendCounterTo).append('<div id="lg-counter"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter-all">' + this.$items.length + "</span></div>")
    }, e.prototype.addHtml = function (b) {
        var c = null;
        if (c = this.s.dynamic ? this.s.dynamicEl[b].subHtml : this.$items.eq(b).attr("data-sub-html"), "undefined" != typeof c && null !== c) {
            var d = c.substring(0, 1);
            c = "." === d || "#" === d ? a(c).html() : c
        } else c = "";
        ".lg-sub-html" === this.s.appendSubHtmlTo ? (this.$outer.find(this.s.appendSubHtmlTo).html(c), "" === c ? this.$outer.find(this.s.appendSubHtmlTo).addClass("lg-empty-html") : this.$outer.find(this.s.appendSubHtmlTo).removeClass("lg-empty-html")) : this.$slide.eq(b).append(c), this.$el.trigger("onAfterAppendSubHtml.lg", [b])
    }, e.prototype.preload = function (a) {
        var b = 1, c = 1;
        for (b = 1; b <= this.s.preload && !(b >= this.$items.length - a); b++)this.loadContent(a + b, !1, 0);
        for (c = 1; c <= this.s.preload && !(0 > a - c); c++)this.loadContent(a - c, !1, 0)
    }, e.prototype.loadContent = function (c, d, e) {
        var f, g, h, i, j, k, l = this, m = !1, n = function (c) {
            for (var d = [], e = [], f = 0; f < c.length; f++) {
                var h = c[f].split(" ");
                "" === h[0] && h.splice(0, 1), e.push(h[0]), d.push(h[1])
            }
            for (var i = a(b).width(), j = 0; j < d.length; j++)if (parseInt(d[j], 10) > i) {
                g = e[j];
                break
            }
        };
        if (l.s.dynamic) {
            if (l.s.dynamicEl[c].poster && (m = !0, h = l.s.dynamicEl[c].poster), k = l.s.dynamicEl[c].html, g = l.s.dynamicEl[c].src, l.s.dynamicEl[c].responsive) {
                var o = l.s.dynamicEl[c].responsive.split(",");
                n(o)
            }
            i = l.s.dynamicEl[c].srcset, j = l.s.dynamicEl[c].sizes
        } else {
            if (l.$items.eq(c).attr("data-poster") && (m = !0, h = l.$items.eq(c).attr("data-poster")), k = l.$items.eq(c).attr("data-html"), g = l.$items.eq(c).attr("href") || l.$items.eq(c).attr("data-src"), l.$items.eq(c).attr("data-responsive")) {
                var p = l.$items.eq(c).attr("data-responsive").split(",");
                n(p)
            }
            i = l.$items.eq(c).attr("data-srcset"), j = l.$items.eq(c).attr("data-sizes")
        }
        var q = !1;
        l.s.dynamic ? l.s.dynamicEl[c].iframe && (q = !0) : "true" === l.$items.eq(c).attr("data-iframe") && (q = !0);
        var r = l.isVideo(g, c);
        if (!l.$slide.eq(c).hasClass("lg-loaded")) {
            if (q) l.$slide.eq(c).prepend('<div class="lg-video-cont" style="max-width:' + l.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + g + '"  allowfullscreen="true"></iframe></div></div>'); else if (m) {
                var s = "";
                s = r && r.youtube ? "lg-has-youtube" : r && r.vimeo ? "lg-has-vimeo" : "lg-has-html5", l.$slide.eq(c).prepend('<div class="lg-video-cont ' + s + ' "><div class="lg-video"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + h + '" /></div></div>')
            } else r ? (l.$slide.eq(c).prepend('<div class="lg-video-cont "><div class="lg-video"></div></div>'), l.$el.trigger("hasVideo.lg", [c, g, k])) : l.$slide.eq(c).prepend('<div class="lg-img-wrap"> <img class="lg-object lg-image" src="' + g + '" /> </div>');
            if (l.$el.trigger("onAferAppendSlide.lg", [c]), f = l.$slide.eq(c).find(".lg-object"), j && f.attr("sizes", j), i) {
                f.attr("srcset", i);
                try {
                    picturefill({elements: [f[0]]})
                } catch (t) {
                    console.error("Make sure you have included Picturefill version 2")
                }
            }
            ".lg-sub-html" !== this.s.appendSubHtmlTo && l.addHtml(c), l.$slide.eq(c).addClass("lg-loaded")
        }
        l.$slide.eq(c).find(".lg-object").on("load.lg error.lg", function () {
            var b = 0;
            e && !a("body").hasClass("lg-from-hash") && (b = e), setTimeout(function () {
                l.$slide.eq(c).addClass("lg-complete"), l.$el.trigger("onSlideItemLoad.lg", [c, e || 0])
            }, b)
        }), r && r.html5 && !m && l.$slide.eq(c).addClass("lg-complete"), d === !0 && (l.$slide.eq(c).hasClass("lg-complete") ? l.preload(c) : l.$slide.eq(c).find(".lg-object").on("load.lg error.lg", function () {
            l.preload(c)
        }))
    }, e.prototype.slide = function (b, c, d) {
        var e = this.$outer.find(".lg-current").index(), f = this;
        if (!f.lGalleryOn || e !== b) {
            var g = this.$slide.length, h = f.lGalleryOn ? this.s.speed : 0, i = !1, j = !1;
            if (!f.lgBusy) {
                if (this.$el.trigger("onBeforeSlide.lg", [e, b, c, d]), f.lgBusy = !0, clearTimeout(f.hideBartimeout), ".lg-sub-html" === this.s.appendSubHtmlTo && setTimeout(function () {
                        f.addHtml(b)
                    }, h), this.arrowDisable(b), c) {
                    var k = b - 1, l = b + 1;
                    0 === b && e === g - 1 ? (l = 0, k = g - 1) : b === g - 1 && 0 === e && (l = 0, k = g - 1), this.$slide.removeClass("lg-prev-slide lg-current lg-next-slide"), f.$slide.eq(k).addClass("lg-prev-slide"), f.$slide.eq(l).addClass("lg-next-slide"), f.$slide.eq(b).addClass("lg-current")
                } else f.$outer.addClass("lg-no-trans"), this.$slide.removeClass("lg-prev-slide lg-next-slide"), e > b ? (j = !0, 0 !== b || e !== g - 1 || d || (j = !1, i = !0)) : b > e && (i = !0, b !== g - 1 || 0 !== e || d || (j = !0, i = !1)), j ? (this.$slide.eq(b).addClass("lg-prev-slide"), this.$slide.eq(e).addClass("lg-next-slide")) : i && (this.$slide.eq(b).addClass("lg-next-slide"), this.$slide.eq(e).addClass("lg-prev-slide")), setTimeout(function () {
                    f.$slide.removeClass("lg-current"), f.$slide.eq(b).addClass("lg-current"), f.$outer.removeClass("lg-no-trans")
                }, 50);
                if (f.lGalleryOn ? (setTimeout(function () {
                        f.loadContent(b, !0, 0)
                    }, this.s.speed + 50), setTimeout(function () {
                        f.lgBusy = !1, f.$el.trigger("onAfterSlide.lg", [e, b, c, d])
                    }, this.s.speed), f.doCss() || (f.$slide.fadeOut(f.s.speed), f.$slide.eq(b).fadeIn(f.s.speed))) : (f.loadContent(b, !0, f.s.backdropDuration), f.lgBusy = !1, f.$el.trigger("onAfterSlide.lg", [e, b, c, d]), f.doCss() || (f.$slide.fadeOut(50), f.$slide.eq(b).fadeIn(50))), this.s.download) {
                    var m;
                    m = f.s.dynamic ? f.s.dynamicEl[b].downloadUrl || f.s.dynamicEl[b].src : f.$items.eq(b).attr("data-download-url") || f.$items.eq(b).attr("href") || f.$items.eq(b).attr("data-src"), a("#lg-download").attr("href", m)
                }
                f.lGalleryOn = !0, this.s.counter && a("#lg-counter-current").text(b + 1)
            }
        }
    }, e.prototype.goToNextSlide = function (a) {
        var b = this;
        b.lgBusy || (b.index + 1 < b.$slide.length ? (b.index++, b.$el.trigger("onBeforeNextSlide.lg", [b.index]), b.slide(b.index, a, !1)) : b.s.loop ? (b.index = 0, b.$el.trigger("onBeforeNextSlide.lg", [b.index]), b.slide(b.index, a, !1)) : b.s.slideEndAnimatoin && (b.$outer.addClass("lg-right-end"), setTimeout(function () {
                b.$outer.removeClass("lg-right-end")
            }, 400)))
    }, e.prototype.goToPrevSlide = function (a) {
        var b = this;
        b.lgBusy || (b.index > 0 ? (b.index--, b.$el.trigger("onBeforePrevSlide.lg", [b.index, a]), b.slide(b.index, a, !1)) : b.s.loop ? (b.index = b.$items.length - 1, b.$el.trigger("onBeforePrevSlide.lg", [b.index, a]), b.slide(b.index, a, !1)) : b.s.slideEndAnimatoin && (b.$outer.addClass("lg-left-end"), setTimeout(function () {
                b.$outer.removeClass("lg-left-end")
            }, 400)))
    }, e.prototype.keyPress = function () {
        var c = this;
        this.$items.length > 1 && a(b).on("keyup.lg", function (a) {
            c.$items.length > 1 && (37 === a.keyCode && (a.preventDefault(), c.goToPrevSlide()), 39 === a.keyCode && (a.preventDefault(), c.goToNextSlide()))
        }), a(b).on("keydown.lg", function (a) {
            c.s.escKey === !0 && 27 === a.keyCode && (a.preventDefault(), c.$outer.hasClass("lg-thumb-open") ? c.$outer.removeClass("lg-thumb-open") : c.destroy())
        })
    }, e.prototype.arrow = function () {
        var a = this;
        this.$outer.find(".lg-prev").on("click.lg", function () {
            a.goToPrevSlide()
        }), this.$outer.find(".lg-next").on("click.lg", function () {
            a.goToNextSlide()
        })
    }, e.prototype.arrowDisable = function (a) {
        !this.s.loop && this.s.hideControlOnEnd && (a + 1 < this.$slide.length ? this.$outer.find(".lg-next").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-next").attr("disabled", "disabled").addClass("disabled"), a > 0 ? this.$outer.find(".lg-prev").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-prev").attr("disabled", "disabled").addClass("disabled"))
    }, e.prototype.setTranslate = function (a, b, c) {
        this.s.useLeft ? a.css("left", b) : a.css({transform: "translate3d(" + b + "px, " + c + "px, 0px)"})
    }, e.prototype.touchMove = function (b, c) {
        var d = c - b;
        this.$outer.addClass("lg-dragging"), this.setTranslate(this.$slide.eq(this.index), d, 0), this.setTranslate(a(".lg-prev-slide"), -this.$slide.eq(this.index).width() + d, 0), this.setTranslate(a(".lg-next-slide"), this.$slide.eq(this.index).width() + d, 0)
    }, e.prototype.touchEnd = function (a) {
        var b = this;
        "lg-slide" !== b.s.mode && b.$outer.addClass("lg-slide"), this.$slide.not(".lg-current, .lg-prev-slide, .lg-next-slide").css("opacity", "0"), setTimeout(function () {
            b.$outer.removeClass("lg-dragging"), 0 > a && Math.abs(a) > b.s.swipeThreshold ? b.goToNextSlide(!0) : a > 0 && Math.abs(a) > b.s.swipeThreshold ? b.goToPrevSlide(!0) : Math.abs(a) < 5 && b.$el.trigger("onSlideClick.lg"), b.$slide.removeAttr("style")
        }), setTimeout(function () {
            b.$outer.hasClass("lg-dragging") || "lg-slide" === b.s.mode || b.$outer.removeClass("lg-slide")
        }, b.s.speed + 100)
    }, e.prototype.enableSwipe = function () {
        var a = this, b = 0, c = 0, d = !1;
        a.s.enableSwipe && a.isTouch && a.doCss() && (a.$slide.on("touchstart.lg", function (c) {
            a.$outer.hasClass("lg-zoomed") || a.lgBusy || (c.preventDefault(), a.manageSwipeClass(), b = c.originalEvent.targetTouches[0].pageX)
        }), a.$slide.on("touchmove.lg", function (e) {
            a.$outer.hasClass("lg-zoomed") || (e.preventDefault(), c = e.originalEvent.targetTouches[0].pageX, a.touchMove(b, c), d = !0)
        }), a.$slide.on("touchend.lg", function () {
            a.$outer.hasClass("lg-zoomed") || (d ? (d = !1, a.touchEnd(c - b)) : a.$el.trigger("onSlideClick.lg"))
        }))
    }, e.prototype.enableDrag = function () {
        var c = this, d = 0, e = 0, f = !1, g = !1;
        c.s.enableDrag && !c.isTouch && c.doCss() && (c.$slide.on("mousedown.lg", function (b) {
            c.$outer.hasClass("lg-zoomed") || (a(b.target).hasClass("lg-object") || a(b.target).hasClass("lg-video-play")) && (b.preventDefault(), c.lgBusy || (c.manageSwipeClass(), d = b.pageX, f = !0, c.$outer.scrollLeft += 1, c.$outer.scrollLeft -= 1, c.$outer.removeClass("lg-grab").addClass("lg-grabbing"), c.$el.trigger("onDragstart.lg")))
        }), a(b).on("mousemove.lg", function (a) {
            f && (g = !0, e = a.pageX, c.touchMove(d, e), c.$el.trigger("onDragmove.lg"))
        }), a(b).on("mouseup.lg", function (b) {
            g ? (g = !1, c.touchEnd(e - d), c.$el.trigger("onDragend.lg")) : (a(b.target).hasClass("lg-object") || a(b.target).hasClass("lg-video-play")) && c.$el.trigger("onSlideClick.lg"), f && (f = !1, c.$outer.removeClass("lg-grabbing").addClass("lg-grab"))
        }))
    }, e.prototype.manageSwipeClass = function () {
        var a = this.index + 1, b = this.index - 1, c = this.$slide.length;
        this.s.loop && (0 === this.index ? b = c - 1 : this.index === c - 1 && (a = 0)), this.$slide.removeClass("lg-next-slide lg-prev-slide"), b > -1 && this.$slide.eq(b).addClass("lg-prev-slide"), this.$slide.eq(a).addClass("lg-next-slide")
    }, e.prototype.mousewheel = function () {
        var a = this;
        a.$outer.on("mousewheel.lg", function (b) {
            b.deltaY > 0 ? a.goToPrevSlide() : a.goToNextSlide(), b.preventDefault()
        })
    }, e.prototype.closeGallery = function () {
        var b = this, c = !1;
        this.$outer.find(".lg-close").on("click.lg", function () {
            b.destroy()
        }), b.s.closable && (b.$outer.on("mousedown.lg", function (b) {
            c = a(b.target).is(".lg-outer") || a(b.target).is(".lg-item ") || a(b.target).is(".lg-img-wrap") ? !0 : !1
        }), b.$outer.on("mouseup.lg", function (d) {
            (a(d.target).is(".lg-outer") || a(d.target).is(".lg-item ") || a(d.target).is(".lg-img-wrap") && c) && (b.$outer.hasClass("lg-dragging") || b.destroy())
        }))
    }, e.prototype.destroy = function (c) {
        var d = this;
        d.$el.trigger("onBeforeClose.lg"), c && (this.$items.off("click.lg click.lgcustom"), a.removeData(d.el, "lightGallery")), this.$el.off(".lg.tm"), a.each(a.fn.lightGallery.modules, function (a) {
            d.modules[a] && d.modules[a].destroy()
        }), this.lGalleryOn = !1, clearTimeout(d.hideBartimeout), this.hideBartimeout = !1, a(b).off(".lg"), a("body").removeClass("lg-on lg-from-hash"), d.$outer && d.$outer.removeClass("lg-visible"), a(".lg-backdrop").removeClass("in"), setTimeout(function () {
            d.$outer && d.$outer.remove(), a(".lg-backdrop").remove(), d.$el.trigger("onCloseAfter.lg")
        }, d.s.backdropDuration + 50)
    }, a.fn.lightGallery = function (b) {
        return this.each(function () {
            if (a.data(this, "lightGallery"))try {
                a(this).data("lightGallery").init()
            } catch (c) {
                console.error("lightGallery has not initiated properly")
            } else a.data(this, "lightGallery", new e(this, b))
        })
    }, a.fn.lightGallery.modules = {}
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {
        autoplay: !1,
        pause: 5e3,
        progressBar: !0,
        fourceAutoplay: !1,
        autoplayControls: !0,
        appendAutoplayControlsTo: ".lg-toolbar"
    }, f = function (b) {
        return this.core = a(b).data("lightGallery"), this.$el = a(b), this.core.$items.length < 2 ? !1 : (this.core.s = a.extend({}, e, this.core.s), this.interval = !1, this.fromAuto = !0, this.canceledOnTouch = !1, this.fourceAutoplayTemp = this.core.s.fourceAutoplay, this.core.doCss() || (this.core.s.progressBar = !1), this.init(), this)
    };
    f.prototype.init = function () {
        var a = this;
        a.core.s.autoplayControls && a.controls(), a.core.s.progressBar && a.core.$outer.find(".lg").append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>'), a.progress(), a.core.s.autoplay && a.startlAuto(), a.$el.on("onDragstart.lg.tm touchstart.lg.tm", function () {
            a.interval && (a.cancelAuto(), a.canceledOnTouch = !0)
        }), a.$el.on("onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm", function () {
            !a.interval && a.canceledOnTouch && (a.startlAuto(), a.canceledOnTouch = !1)
        })
    }, f.prototype.progress = function () {
        var a, b, c = this;
        c.$el.on("onBeforeSlide.lg.tm", function () {
            c.core.s.progressBar && c.fromAuto && (a = c.core.$outer.find(".lg-progress-bar"), b = c.core.$outer.find(".lg-progress"), c.interval && (b.removeAttr("style"), a.removeClass("lg-start"), setTimeout(function () {
                b.css("transition", "width " + (c.core.s.speed + c.core.s.pause) + "ms ease 0s"), a.addClass("lg-start")
            }, 20))), c.fromAuto || c.core.s.fourceAutoplay || c.cancelAuto(), c.fromAuto = !1
        })
    }, f.prototype.controls = function () {
        var b = this, c = '<span class="lg-autoplay-button lg-icon"></span>';
        a(this.core.s.appendAutoplayControlsTo).append(c), b.core.$outer.find(".lg-autoplay-button").on("click.lg", function () {
            a(b.core.$outer).hasClass("lg-show-autoplay") ? (b.cancelAuto(), b.core.s.fourceAutoplay = !1) : b.interval || (b.startlAuto(), b.core.s.fourceAutoplay = b.fourceAutoplayTemp)
        })
    }, f.prototype.startlAuto = function () {
        var a = this;
        a.core.$outer.find(".lg-progress").css("transition", "width " + (a.core.s.speed + a.core.s.pause) + "ms ease 0s"), a.core.$outer.addClass("lg-show-autoplay"), a.core.$outer.find(".lg-progress-bar").addClass("lg-start"), a.interval = setInterval(function () {
            a.core.index + 1 < a.core.$items.length ? a.core.index = a.core.index : a.core.index = -1, a.core.index++, a.fromAuto = !0, a.core.slide(a.core.index, !1, !1)
        }, a.core.s.speed + a.core.s.pause)
    }, f.prototype.cancelAuto = function () {
        clearInterval(this.interval), this.interval = !1, this.core.$outer.find(".lg-progress").removeAttr("style"), this.core.$outer.removeClass("lg-show-autoplay"), this.core.$outer.find(".lg-progress-bar").removeClass("lg-start")
    }, f.prototype.destroy = function () {
        this.cancelAuto(), this.core.$outer.find(".lg-progress-bar").remove()
    }, a.fn.lightGallery.modules.autoplay = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {fullScreen: !0}, f = function (b) {
        return this.core = a(b).data("lightGallery"), this.$el = a(b), this.core.s = a.extend({}, e, this.core.s), this.init(), this
    };
    f.prototype.init = function () {
        var a = "";
        if (this.core.s.fullScreen) {
            if (!(c.fullscreenEnabled || c.webkitFullscreenEnabled || c.mozFullScreenEnabled || c.msFullscreenEnabled))return;
            a = '<span class="lg-fullscreen lg-icon"></span>', this.core.$outer.find(".lg-toolbar").append(a), this.fullScreen()
        }
    }, f.prototype.reuestFullscreen = function () {
        var a = c.documentElement;
        a.requestFullscreen ? a.requestFullscreen() : a.msRequestFullscreen ? a.msRequestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullscreen && a.webkitRequestFullscreen()
    }, f.prototype.exitFullscreen = function () {
        c.exitFullscreen ? c.exitFullscreen() : c.msExitFullscreen ? c.msExitFullscreen() : c.mozCancelFullScreen ? c.mozCancelFullScreen() : c.webkitExitFullscreen && c.webkitExitFullscreen()
    }, f.prototype.fullScreen = function () {
        var b = this;
        a(c).on("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg", function () {
            b.core.$outer.toggleClass("lg-fullscreen-on")
        }), this.core.$outer.find(".lg-fullscreen").on("click.lg", function () {
            c.fullscreenElement || c.mozFullScreenElement || c.webkitFullscreenElement || c.msFullscreenElement ? b.exitFullscreen() : b.reuestFullscreen()
        })
    }, f.prototype.destroy = function () {
        this.exitFullscreen(), a(c).off("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg")
    }, a.fn.lightGallery.modules.fullscreen = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {pager: !1}, f = function (b) {
        return this.core = a(b).data("lightGallery"), this.$el = a(b), this.core.s = a.extend({}, e, this.core.s), this.core.s.pager && this.core.$items.length > 1 && this.init(), this
    };
    f.prototype.init = function () {
        var b, c, d, e = this, f = "";
        if (e.core.$outer.find(".lg").append('<div class="lg-pager-outer"></div>'), e.core.s.dynamic)for (var g = 0; g < e.core.s.dynamicEl.length; g++)f += '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + e.core.s.dynamicEl[g].thumb + '" /></div></span>'; else e.core.$items.each(function () {
            f += e.core.s.exThumbImage ? '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + a(this).attr(e.core.s.exThumbImage) + '" /></div></span>' : '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + a(this).find("img").attr("src") + '" /></div></span>'
        });
        c = e.core.$outer.find(".lg-pager-outer"), c.html(f), b = e.core.$outer.find(".lg-pager-cont"), b.on("click.lg touchend.lg", function () {
            var b = a(this);
            e.core.index = b.index(), e.core.slide(e.core.index, !1, !1)
        }), c.on("mouseover.lg", function () {
            clearTimeout(d), c.addClass("lg-pager-hover")
        }), c.on("mouseout.lg", function () {
            d = setTimeout(function () {
                c.removeClass("lg-pager-hover")
            })
        }), e.core.$el.on("onBeforeSlide.lg.tm", function (a, c, d) {
            b.removeClass("lg-pager-active"), b.eq(d).addClass("lg-pager-active")
        })
    }, f.prototype.destroy = function () {
    }, a.fn.lightGallery.modules.pager = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {
        thumbnail: !0,
        animateThumb: !0,
        currentPagerPosition: "middle",
        thumbWidth: 100,
        thumbContHeight: 100,
        thumbMargin: 5,
        exThumbImage: !1,
        showThumbByDefault: !0,
        toogleThumb: !0,
        pullCaptionUp: !0,
        enableThumbDrag: !0,
        enableThumbSwipe: !0,
        swipeThreshold: 50,
        loadYoutubeThumbnail: !0,
        youtubeThumbSize: 1,
        loadVimeoThumbnail: !0,
        vimeoThumbSize: "thumbnail_small",
        loadDailymotionThumbnail: !0
    }, f = function (b) {
        return this.core = a(b).data("lightGallery"), this.core.s = a.extend({}, e, this.core.s), this.$el = a(b), this.$thumbOuter = null, this.thumbOuterWidth = 0, this.thumbTotalWidth = this.core.$items.length * (this.core.s.thumbWidth + this.core.s.thumbMargin), this.thumbIndex = this.core.index, this.left = 0, this.init(), this
    };
    f.prototype.init = function () {
        this.core.s.thumbnail && this.core.$items.length > 1 && (this.core.s.showThumbByDefault && this.core.$outer.addClass("lg-thumb-open"), this.core.s.pullCaptionUp && this.core.$outer.addClass("lg-pull-caption-up"), this.build(), this.core.s.animateThumb ? (this.core.s.enableThumbDrag && !this.core.isTouch && this.core.doCss() && this.enableThumbDrag(), this.core.s.enableThumbSwipe && this.core.isTouch && this.core.doCss() && this.enableThumbSwipe(), this.thumbClickable = !1) : this.thumbClickable = !0, this.toogle(), this.thumbkeyPress())
    }, f.prototype.build = function () {
        function c(a, b, c) {
            var d, h = e.core.isVideo(a, c) || {}, i = "";
            h.youtube || h.vimeo || h.dailymotion ? h.youtube ? d = e.core.s.loadYoutubeThumbnail ? "//img.youtube.com/vi/" + h.youtube[1] + "/" + e.core.s.youtubeThumbSize + ".jpg" : b : h.vimeo ? e.core.s.loadVimeoThumbnail ? (d = "//i.vimeocdn.com/video/error_" + g + ".jpg", i = h.vimeo[1]) : d = b : h.dailymotion && (d = e.core.s.loadDailymotionThumbnail ? "//www.dailymotion.com/thumbnail/video/" + h.dailymotion[1] : b) : d = b, f += '<div data-vimeo-id="' + i + '" class="lg-thumb-item" style="width:' + e.core.s.thumbWidth + "px; margin-right: " + e.core.s.thumbMargin + 'px"><img src="' + d + '" /></div>', i = ""
        }

        var d, e = this, f = "", g = "", h = '<div class="lg-thumb-outer"><div class="lg-thumb group"></div></div>';
        switch (this.core.s.vimeoThumbSize) {
            case"thumbnail_large":
                g = "640";
                break;
            case"thumbnail_medium":
                g = "200x150";
                break;
            case"thumbnail_small":
                g = "100x75"
        }
        if (e.core.$outer.addClass("lg-has-thumb"), e.core.$outer.find(".lg").append(h), e.$thumbOuter = e.core.$outer.find(".lg-thumb-outer"), e.thumbOuterWidth = e.$thumbOuter.width(), e.core.s.animateThumb && e.core.$outer.find(".lg-thumb").css({
                width: e.thumbTotalWidth + "px",
                position: "relative"
            }), this.core.s.animateThumb && e.$thumbOuter.css("height", e.core.s.thumbContHeight + "px"), e.core.s.dynamic)for (var i = 0; i < e.core.s.dynamicEl.length; i++)c(e.core.s.dynamicEl[i].src, e.core.s.dynamicEl[i].thumb, i); else e.core.$items.each(function (b) {
            e.core.s.exThumbImage ? c(a(this).attr("href") || a(this).attr("data-src"), a(this).attr(e.core.s.exThumbImage), b) : c(a(this).attr("href") || a(this).attr("data-src"), a(this).find("img").attr("src"), b)
        });
        e.core.$outer.find(".lg-thumb").html(f), d = e.core.$outer.find(".lg-thumb-item"), d.each(function () {
            var b = a(this), c = b.attr("data-vimeo-id");
            c && a.getJSON("http://www.vimeo.com/api/v2/video/" + c + ".json?callback=?", {format: "json"}, function (a) {
                b.find("img").attr("src", a[0][e.core.s.vimeoThumbSize])
            })
        }), d.eq(e.core.index).addClass("active"), e.core.$el.on("onBeforeSlide.lg.tm", function () {
            d.removeClass("active"), d.eq(e.core.index).addClass("active")
        }), d.on("click.lg touchend.lg", function () {
            var b = a(this);
            setTimeout(function () {
                (e.thumbClickable && !e.core.lgBusy || !e.core.doCss()) && (e.core.index = b.index(), e.core.slide(e.core.index, !1, !0))
            }, 50)
        }), e.core.$el.on("onBeforeSlide.lg.tm", function () {
            e.animateThumb(e.core.index)
        }), a(b).on("resize.lg.thumb orientationchange.lg.thumb", function () {
            setTimeout(function () {
                e.animateThumb(e.core.index), e.thumbOuterWidth = e.$thumbOuter.width()
            }, 200)
        })
    }, f.prototype.setTranslate = function (a) {
        this.core.$outer.find(".lg-thumb").css({transform: "translate3d(-" + a + "px, 0px, 0px)"})
    }, f.prototype.animateThumb = function (a) {
        var b = this.core.$outer.find(".lg-thumb");
        if (this.core.s.animateThumb) {
            var c;
            switch (this.core.s.currentPagerPosition) {
                case"left":
                    c = 0;
                    break;
                case"middle":
                    c = this.thumbOuterWidth / 2 - this.core.s.thumbWidth / 2;
                    break;
                case"right":
                    c = this.thumbOuterWidth - this.core.s.thumbWidth
            }
            this.left = (this.core.s.thumbWidth + this.core.s.thumbMargin) * a - 1 - c, this.left > this.thumbTotalWidth - this.thumbOuterWidth && (this.left = this.thumbTotalWidth - this.thumbOuterWidth), this.left < 0 && (this.left = 0), this.core.lGalleryOn ? (b.hasClass("on") || this.core.$outer.find(".lg-thumb").css("transition-duration", this.core.s.speed + "ms"), this.core.doCss() || b.animate({left: -this.left + "px"}, this.core.s.speed)) : this.core.doCss() || b.css("left", -this.left + "px"), this.setTranslate(this.left)
        }
    }, f.prototype.enableThumbDrag = function () {
        var c = this, d = 0, e = 0, f = !1, g = !1, h = 0;
        c.$thumbOuter.addClass("lg-grab"), c.core.$outer.find(".lg-thumb").on("mousedown.lg.thumb", function (a) {
            c.thumbTotalWidth > c.thumbOuterWidth && (a.preventDefault(), d = a.pageX, f = !0, c.core.$outer.scrollLeft += 1, c.core.$outer.scrollLeft -= 1, c.thumbClickable = !1, c.$thumbOuter.removeClass("lg-grab").addClass("lg-grabbing"))
        }), a(b).on("mousemove.lg.thumb", function (a) {
            f && (h = c.left, g = !0, e = a.pageX, c.$thumbOuter.addClass("lg-dragging"), h -= e - d, h > c.thumbTotalWidth - c.thumbOuterWidth && (h = c.thumbTotalWidth - c.thumbOuterWidth), 0 > h && (h = 0), c.setTranslate(h))
        }), a(b).on("mouseup.lg.thumb", function () {
            g ? (g = !1, c.$thumbOuter.removeClass("lg-dragging"), c.left = h, Math.abs(e - d) < c.core.s.swipeThreshold && (c.thumbClickable = !0)) : c.thumbClickable = !0, f && (f = !1, c.$thumbOuter.removeClass("lg-grabbing").addClass("lg-grab"))
        })
    }, f.prototype.enableThumbSwipe = function () {
        var a = this, b = 0, c = 0, d = !1, e = 0;
        a.core.$outer.find(".lg-thumb").on("touchstart.lg", function (c) {
            a.thumbTotalWidth > a.thumbOuterWidth && (c.preventDefault(), b = c.originalEvent.targetTouches[0].pageX, a.thumbClickable = !1)
        }), a.core.$outer.find(".lg-thumb").on("touchmove.lg", function (f) {
            a.thumbTotalWidth > a.thumbOuterWidth && (f.preventDefault(), c = f.originalEvent.targetTouches[0].pageX, d = !0, a.$thumbOuter.addClass("lg-dragging"), e = a.left, e -= c - b, e > a.thumbTotalWidth - a.thumbOuterWidth && (e = a.thumbTotalWidth - a.thumbOuterWidth), 0 > e && (e = 0), a.setTranslate(e))
        }), a.core.$outer.find(".lg-thumb").on("touchend.lg", function () {
            a.thumbTotalWidth > a.thumbOuterWidth && d ? (d = !1, a.$thumbOuter.removeClass("lg-dragging"), Math.abs(c - b) < a.core.s.swipeThreshold && (a.thumbClickable = !0), a.left = e) : a.thumbClickable = !0
        })
    }, f.prototype.toogle = function () {
        var a = this;
        a.core.s.toogleThumb && (a.core.$outer.addClass("lg-can-toggle"), a.$thumbOuter.append('<span class="lg-toogle-thumb lg-icon"></span>'), a.core.$outer.find(".lg-toogle-thumb").on("click.lg", function () {
            a.core.$outer.toggleClass("lg-thumb-open")
        }))
    }, f.prototype.thumbkeyPress = function () {
        var c = this;
        a(b).on("keydown.lg.thumb", function (a) {
            38 === a.keyCode ? (a.preventDefault(), c.core.$outer.addClass("lg-thumb-open")) : 40 === a.keyCode && (a.preventDefault(), c.core.$outer.removeClass("lg-thumb-open"))
        })
    }, f.prototype.destroy = function () {
        this.core.s.thumbnail && this.core.$items.length > 1 && (a(b).off("resize.lg.thumb orientationchange.lg.thumb keydown.lg.thumb"), this.$thumbOuter.remove(), this.core.$outer.removeClass("lg-has-thumb"))
    }, a.fn.lightGallery.modules.Thumbnail = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {
        videoMaxWidth: "855px",
        youtubePlayerParams: !1,
        vimeoPlayerParams: !1,
        dailymotionPlayerParams: !1,
        videojs: !1
    }, f = function (b) {
        return this.core = a(b).data("lightGallery"), this.$el = a(b), this.core.s = a.extend({}, e, this.core.s), this.videoLoaded = !1, this.init(), this
    };
    f.prototype.init = function () {
        var b = this;
        b.core.$el.on("hasVideo.lg.tm", function (a, c, d, e) {
            if (b.core.$slide.eq(c).find(".lg-video").append(b.loadVideo(d, "lg-object", !0, c, e)), e)if (b.core.s.videojs)try {
                videojs(b.core.$slide.eq(c).find(".lg-html5").get(0), {}, function () {
                    b.videoLoaded || this.play()
                })
            } catch (f) {
                console.error("Make sure you have included videojs")
            } else b.core.$slide.eq(c).find(".lg-html5").get(0).play()
        }), b.core.$el.on("onAferAppendSlide.lg.tm", function (a, c) {
            b.core.$slide.eq(c).find(".lg-video-cont").css("max-width", b.core.s.videoMaxWidth), b.videoLoaded = !0
        });
        var c = function (a) {
            if (a.find(".lg-object").hasClass("lg-has-poster"))if (a.hasClass("lg-has-video")) {
                var c = a.find(".lg-youtube").get(0), d = a.find(".lg-vimeo").get(0),
                    e = a.find(".lg-dailymotion").get(0), f = a.find(".lg-html5").get(0);
                if (c) c.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*"); else if (d)try {
                    $f(d).api("play")
                } catch (g) {
                    console.error("Make sure you have included froogaloop2 js")
                } else if (e) e.contentWindow.postMessage("play", "*"); else if (f)if (b.core.s.videojs)try {
                    videojs(f).play()
                } catch (g) {
                    console.error("Make sure you have included videojs")
                } else f.play();
                a.addClass("lg-video-palying")
            } else {
                a.addClass("lg-video-palying lg-has-video");
                var h, i, j = function (c, d) {
                    if (a.find(".lg-video").append(b.loadVideo(c, "", !1, b.core.index, d)), d)if (b.core.s.videojs)try {
                        videojs(b.core.$slide.eq(b.core.index).find(".lg-html5").get(0), {}, function () {
                            this.play()
                        })
                    } catch (e) {
                        console.error("Make sure you have included videojs")
                    } else b.core.$slide.eq(b.core.index).find(".lg-html5").get(0).play()
                };
                b.core.s.dynamic ? (h = b.core.s.dynamicEl[b.core.index].src, i = b.core.s.dynamicEl[b.core.index].html, j(h, i)) : (h = b.core.$items.eq(b.core.index).attr("data-src"), i = b.core.$items.eq(b.core.index).attr("data-html"), j(h, i));
                var k = a.find(".lg-object");
                a.find(".lg-video").append(k), a.find(".lg-video-object").hasClass("lg-html5") || (a.removeClass("lg-complete"), a.find(".lg-video-object").on("load.lg error.lg", function () {
                    a.addClass("lg-complete")
                }))
            }
        };
        b.core.doCss() && b.core.$items.length > 1 && (b.core.s.enableSwipe && b.core.isTouch || b.core.s.enableDrag && !b.core.isTouch) ? b.core.$el.on("onSlideClick.lg.tm", function () {
            var a = b.core.$slide.eq(b.core.index);
            c(a)
        }) : b.core.$slide.on("click.lg", function () {
            c(a(this))
        }), b.core.$el.on("onBeforeSlide.lg.tm", function (a, c) {
            var d = b.core.$slide.eq(c), e = d.find(".lg-youtube").get(0), f = d.find(".lg-vimeo").get(0),
                g = d.find(".lg-dailymotion").get(0), h = d.find(".lg-html5").get(0);
            if (e) e.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*"); else if (f)try {
                $f(f).api("pause")
            } catch (i) {
                console.error("Make sure you have included froogaloop2 js")
            } else if (g) g.contentWindow.postMessage("pause", "*"); else if (h)if (b.core.s.videojs)try {
                videojs(h).pause()
            } catch (i) {
                console.error("Make sure you have included videojs")
            } else h.pause()
        }), b.core.$el.on("onAfterSlide.lg.tm", function (a, c) {
            b.core.$slide.eq(c).removeClass("lg-video-palying")
        })
    }, f.prototype.loadVideo = function (b, c, d, e, f) {
        var g = "", h = 1, i = "", j = this.core.isVideo(b, e) || {};
        if (d && (h = this.videoLoaded ? 0 : 1), j.youtube) i = "?wmode=opaque&autoplay=" + h + "&enablejsapi=1", this.core.s.youtubePlayerParams && (i = i + "&" + a.param(this.core.s.youtubePlayerParams)), g = '<iframe class="lg-video-object lg-youtube ' + c + '" width="560" height="315" src="//www.youtube.com/embed/' + j.youtube[1] + i + '" frameborder="0" allowfullscreen></iframe>'; else if (j.vimeo) i = "?autoplay=" + h + "&api=1", this.core.s.vimeoPlayerParams && (i = i + "&" + a.param(this.core.s.vimeoPlayerParams)), g = '<iframe class="lg-video-object lg-vimeo ' + c + '" width="560" height="315"  src="http://player.vimeo.com/video/' + j.vimeo[1] + i + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; else if (j.dailymotion) i = "?wmode=opaque&autoplay=" + h + "&api=postMessage", this.core.s.dailymotionPlayerParams && (i = i + "&" + a.param(this.core.s.dailymotionPlayerParams)), g = '<iframe class="lg-video-object lg-dailymotion ' + c + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + j.dailymotion[1] + i + '" frameborder="0" allowfullscreen></iframe>'; else if (j.html5) {
            var k = f.substring(0, 1);
            ("." === k || "#" === k) && (f = a(f).html()), g = f
        }
        return g
    }, f.prototype.destroy = function () {
        this.videoLoaded = !1
    }, a.fn.lightGallery.modules.video = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {scale: 1, zoom: !0, enableZoomAfter: 300}, f = function (c) {
        return this.core = a(c).data("lightGallery"), this.core.s = a.extend({}, e, this.core.s), this.core.s.zoom && this.core.doCss() && (this.init(), this.zoomabletimeout = !1, this.pageX = a(b).width() / 2, this.pageY = a(b).height() / 2 + a(b).scrollTop()), this
    };
    f.prototype.init = function () {
        var c = this, d = '<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';
        this.core.$outer.find(".lg-toolbar").append(d), c.core.$el.on("onSlideItemLoad.lg.tm.zoom", function (b, d, e) {
            var f = c.core.s.enableZoomAfter + e;
            a("body").hasClass("lg-from-hash") && e ? f = 0 : a("body").removeClass("lg-from-hash"), c.zoomabletimeout = setTimeout(function () {
                c.core.$slide.eq(d).addClass("lg-zoomable")
            }, f + 30)
        });
        var e = 1, f = function (d) {
            var e, f, g = c.core.$outer.find(".lg-current .lg-image"), h = (a(b).width() - g.width()) / 2,
                i = (a(b).height() - g.height()) / 2 + a(b).scrollTop();
            e = c.pageX - h, f = c.pageY - i;
            var j = (d - 1) * e, k = (d - 1) * f;
            g.css("transform", "scale3d(" + d + ", " + d + ", 1)").attr("data-scale", d), g.parent().css("transform", "translate3d(-" + j + "px, -" + k + "px, 0)").attr("data-x", j).attr("data-y", k)
        }, g = function () {
            e > 1 ? c.core.$outer.addClass("lg-zoomed") : c.resetZoom(), 1 > e && (e = 1), f(e)
        };
        c.core.$el.on("onAferAppendSlide.lg.tm.zoom", function (a, b) {
            var d = c.core.$slide.eq(b).find(".lg-image");
            d.dblclick(function (a) {
                var f, h = d.width(), i = c.core.$items.eq(b).attr("data-width") || d[0].naturalWidth || h;
                c.core.$outer.hasClass("lg-zoomed") ? e = 1 : i > h && (f = i / h, e = f || 2), c.pageX = a.pageX, c.pageY = a.pageY, g(), setTimeout(function () {
                    c.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
                }, 10)
            })
        }), a(b).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom", function () {
            c.pageX = a(b).width() / 2, c.pageY = a(b).height() / 2 + a(b).scrollTop(), f(e)
        }), a("#lg-zoom-out").on("click.lg", function () {
            c.core.$outer.find(".lg-current .lg-image").length && (e -= c.core.s.scale, g())
        }), a("#lg-zoom-in").on("click.lg", function () {
            c.core.$outer.find(".lg-current .lg-image").length && (e += c.core.s.scale, g())
        }), c.core.$el.on("onBeforeSlide.lg.tm", function () {
            c.resetZoom()
        }), c.core.isTouch || c.zoomDrag(), c.core.isTouch && c.zoomSwipe()
    }, f.prototype.resetZoom = function () {
        this.core.$outer.removeClass("lg-zoomed"), this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"), this.core.$slide.find(".lg-image").removeAttr("style data-scale"), this.pageX = a(b).width() / 2, this.pageY = a(b).height() / 2 + a(b).scrollTop()
    }, f.prototype.zoomSwipe = function () {
        var a = this, b = {}, c = {}, d = !1, e = !1, f = !1;
        a.core.$slide.on("touchstart.lg", function (c) {
            if (a.core.$outer.hasClass("lg-zoomed")) {
                var d = a.core.$slide.eq(a.core.index).find(".lg-object");
                f = d.outerHeight() * d.attr("data-scale") > a.core.$outer.find(".lg").height(), e = d.outerWidth() * d.attr("data-scale") > a.core.$outer.find(".lg").width(), (e || f) && (c.preventDefault(), b = {
                    x: c.originalEvent.targetTouches[0].pageX,
                    y: c.originalEvent.targetTouches[0].pageY
                })
            }
        }), a.core.$slide.on("touchmove.lg", function (g) {
            if (a.core.$outer.hasClass("lg-zoomed")) {
                var h, i, j = a.core.$slide.eq(a.core.index).find(".lg-img-wrap");
                g.preventDefault(), d = !0, c = g.originalEvent.targetTouches[0].pageX, c = {
                    x: g.originalEvent.targetTouches[0].pageX,
                    y: g.originalEvent.targetTouches[0].pageY
                }, a.core.$outer.addClass("lg-zoom-dragging"), i = f ? -Math.abs(j.attr("data-y")) + (c.y - b.y) : -Math.abs(j.attr("data-y")), h = e ? -Math.abs(j.attr("data-x")) + (c.x - b.x) : -Math.abs(j.attr("data-x")), j.css("transform", "translate3d(" + h + "px, " + i + "px, 0)")
            }
        }), a.core.$slide.on("touchend.lg", function () {
            a.core.$outer.hasClass("lg-zoomed") && d && (d = !1, a.core.$outer.removeClass("lg-zoom-dragging"), a.touchendZoom(b, c, e, f))
        })
    }, f.prototype.zoomDrag = function () {
        var c = this, d = {}, e = {}, f = !1, g = !1, h = !1, i = !1;
        c.core.$slide.on("mousedown.lg.zoom", function (b) {
            var e = c.core.$slide.eq(c.core.index).find(".lg-object");
            i = e.outerHeight() * e.attr("data-scale") > c.core.$outer.find(".lg").height(), h = e.outerWidth() * e.attr("data-scale") > c.core.$outer.find(".lg").width(), c.core.$outer.hasClass("lg-zoomed") && a(b.target).hasClass("lg-object") && (h || i) && (b.preventDefault(), d = {
                x: b.pageX,
                y: b.pageY
            }, f = !0, c.core.$outer.scrollLeft += 1, c.core.$outer.scrollLeft -= 1, c.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))
        }), a(b).on("mousemove.lg.zoom", function (a) {
            if (f) {
                var b, j, k = c.core.$slide.eq(c.core.index).find(".lg-img-wrap");
                g = !0, e = {
                    x: a.pageX,
                    y: a.pageY
                }, c.core.$outer.addClass("lg-zoom-dragging"), j = i ? -Math.abs(k.attr("data-y")) + (e.y - d.y) : -Math.abs(k.attr("data-y")), b = h ? -Math.abs(k.attr("data-x")) + (e.x - d.x) : -Math.abs(k.attr("data-x")), k.css("transform", "translate3d(" + b + "px, " + j + "px, 0)")
            }
        }), a(b).on("mouseup.lg.zoom", function (a) {
            f && (f = !1, c.core.$outer.removeClass("lg-zoom-dragging"), !g || d.x === e.x && d.y === e.y || (e = {
                x: a.pageX,
                y: a.pageY
            }, c.touchendZoom(d, e, h, i)), g = !1), c.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
        })
    }, f.prototype.touchendZoom = function (a, b, c, d) {
        var e = this, f = e.core.$slide.eq(e.core.index).find(".lg-img-wrap"),
            g = e.core.$slide.eq(e.core.index).find(".lg-object"), h = -Math.abs(f.attr("data-x")) + (b.x - a.x),
            i = -Math.abs(f.attr("data-y")) + (b.y - a.y),
            j = (e.core.$outer.find(".lg").height() - g.outerHeight()) / 2,
            k = Math.abs(g.outerHeight() * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").height() + j),
            l = (e.core.$outer.find(".lg").width() - g.outerWidth()) / 2,
            m = Math.abs(g.outerWidth() * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").width() + l);
        d && (-k >= i ? i = -k : i >= -j && (i = -j)), c && (-m >= h ? h = -m : h >= -l && (h = -l)), d ? f.attr("data-y", Math.abs(i)) : i = -Math.abs(f.attr("data-y")), c ? f.attr("data-x", Math.abs(h)) : h = -Math.abs(f.attr("data-x")), f.css("transform", "translate3d(" + h + "px, " + i + "px, 0)")
    }, f.prototype.destroy = function () {
        var c = this;
        c.core.$el.off(".lg.zoom"), a(b).off(".lg.zoom"), c.core.$slide.off(".lg.zoom"), c.core.$el.off(".lg.tm.zoom"), c.resetZoom(), clearTimeout(c.zoomabletimeout), c.zoomabletimeout = !1
    }, a.fn.lightGallery.modules.zoom = f
}(jQuery, window, document), function (a, b, c, d) {
    "use strict";
    var e = {hash: !0}, f = function (c) {
        return this.core = a(c).data("lightGallery"), this.core.s = a.extend({}, e, this.core.s), this.core.s.hash && (this.oldHash = b.location.hash, this.init()), this
    };
    f.prototype.init = function () {
        var c, d = this;
        d.core.$el.on("onAfterSlide.lg.tm", function (a, c, e) {
            b.location.hash = "lg=" + d.core.s.galleryId + "&slide=" + e
        }), a(b).on("hashchange", function () {
            c = b.location.hash;
            var a = parseInt(c.split("&slide=")[1], 10);
            c.indexOf("lg=" + d.core.s.galleryId) > -1 ? d.core.slide(a) : d.core.lGalleryOn && d.core.destroy()
        })
    }, f.prototype.destroy = function () {
        this.oldHash && this.oldHash.indexOf("lg=" + this.core.s.galleryId) < 0 ? b.location.hash = this.oldHash : history.pushState ? history.pushState("", c.title, b.location.pathname + b.location.search) : b.location.hash = ""
    }, a.fn.lightGallery.modules.hash = f
}(jQuery, window, document);

/*
 * jQuery appear plugin
 *
 * Copyright (c) 2012 Andrey Sidorov
 * licensed under MIT license.
 *
 * https://github.com/morr/jquery.appear/
 *
 * Version: 0.3.6
 */

!function (e) {
    function r() {
        o = !1;
        for (var r = 0, t = i.length; t > r; r++) {
            var n = e(i[r]).filter(function () {
                return e(this).is(":appeared")
            });
            if (n.trigger("appear", [n]), p[r]) {
                var a = p[r].not(n);
                a.trigger("disappear", [a])
            }
            p[r] = n
        }
    }

    function t(e) {
        i.push(e), p.push()
    }

    var i = [], n = !1, o = !1, a = {interval: 250, force_process: !1}, f = e(window), p = [];
    e.expr[":"].appeared = function (r) {
        var t = e(r);
        if (!t.is(":visible"))return !1;
        var i = f.scrollLeft(), n = f.scrollTop(), o = t.offset(), a = o.left, p = o.top;
        return p + t.height() >= n && p - (t.data("appear-top-offset") || 0) <= n + f.height() && a + t.width() >= i && a - (t.data("appear-left-offset") || 0) <= i + f.width() ? !0 : !1
    }, e.fn.extend({
        appear: function (i) {
            var f = e.extend({}, a, i || {}), p = this.selector || this;
            if (!n) {
                var u = function () {
                    o || (o = !0, setTimeout(r, f.interval))
                };
                e(window).scroll(u).resize(u), n = !0
            }
            return f.force_process && setTimeout(r, f.interval), t(p), e(p)
        }
    }), e.extend({
        force_appear: function () {
            return n ? (r(), !0) : !1
        }
    })
}(function () {
    return "undefined" != typeof module ? require("jquery") : jQuery
}());

/*
 * jQuery countTo
 * Copyright (c) 2012-2014 Matt Huggins
 * licensed under MIT license.
 */

!function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require("jquery") : jQuery)
}(function (t) {
    function e(t, e) {
        return t.toFixed(e.decimals)
    }

    var o = function (e, i) {
        this.$element = t(e), this.options = t.extend({}, o.DEFAULTS, this.dataOptions(), i), this.init()
    };
    o.DEFAULTS = {
        from: 0,
        to: 0,
        speed: 1e3,
        refreshInterval: 100,
        decimals: 0,
        formatter: e,
        onUpdate: null,
        onComplete: null
    }, o.prototype.init = function () {
        this.value = this.options.from, this.loops = Math.ceil(this.options.speed / this.options.refreshInterval), this.loopCount = 0, this.increment = (this.options.to - this.options.from) / this.loops
    }, o.prototype.dataOptions = function () {
        var t = {
            from: this.$element.data("from"),
            to: this.$element.data("to"),
            speed: this.$element.data("speed"),
            refreshInterval: this.$element.data("refresh-interval"),
            decimals: this.$element.data("decimals")
        }, e = Object.keys(t);
        for (var o in e) {
            var i = e[o];
            "undefined" == typeof t[i] && delete t[i]
        }
        return t
    }, o.prototype.update = function () {
        this.value += this.increment, this.loopCount++, this.render(), "function" == typeof this.options.onUpdate && this.options.onUpdate.call(this.$element, this.value), this.loopCount >= this.loops && (clearInterval(this.interval), this.value = this.options.to, "function" == typeof this.options.onComplete && this.options.onComplete.call(this.$element, this.value))
    }, o.prototype.render = function () {
        var t = this.options.formatter.call(this.$element, this.value, this.options);
        this.$element.text(t)
    }, o.prototype.restart = function () {
        this.stop(), this.init(), this.start()
    }, o.prototype.start = function () {
        this.stop(), this.render(), this.interval = setInterval(this.update.bind(this), this.options.refreshInterval)
    }, o.prototype.stop = function () {
        this.interval && clearInterval(this.interval)
    }, o.prototype.toggle = function () {
        this.interval ? this.stop() : this.start()
    }, t.fn.countTo = function (e) {
        return this.each(function () {
            var i = t(this), n = i.data("countTo"), s = !n || "object" == typeof e, r = "object" == typeof e ? e : {},
                a = "string" == typeof e ? e : "start";
            s && (n && n.stop(), i.data("countTo", n = new o(this, r))), n[a].call(n)
        })
    }
});

/*owl carousel */


"function" !== typeof Object.create && (Object.create = function (f) {
    function g() {
    }

    g.prototype = f;
    return new g
});
(function (f, g, k) {
    var l = {
        init: function (a, b) {
            this.$elem = f(b);
            this.options = f.extend({}, f.fn.owlCarousel.options, this.$elem.data(), a);
            this.userOptions = a;
            this.loadContent()
        }, loadContent: function () {
            function a(a) {
                var d, e = "";
                if ("function" === typeof b.options.jsonSuccess) b.options.jsonSuccess.apply(this, [a]); else {
                    for (d in a.owl)a.owl.hasOwnProperty(d) && (e += a.owl[d].item);
                    b.$elem.html(e)
                }
                b.logIn()
            }

            var b = this, e;
            "function" === typeof b.options.beforeInit && b.options.beforeInit.apply(this, [b.$elem]);
            "string" === typeof b.options.jsonPath ?
                (e = b.options.jsonPath, f.getJSON(e, a)) : b.logIn()
        }, logIn: function () {
            this.$elem.data("owl-originalStyles", this.$elem.attr("style"));
            this.$elem.data("owl-originalClasses", this.$elem.attr("class"));
            this.$elem.css({opacity: 0});
            this.orignalItems = this.options.items;
            this.checkBrowser();
            this.wrapperWidth = 0;
            this.checkVisible = null;
            this.setVars()
        }, setVars: function () {
            if (0 === this.$elem.children().length)return !1;
            this.baseClass();
            this.eventTypes();
            this.$userItems = this.$elem.children();
            this.itemsAmount = this.$userItems.length;
            this.wrapItems();
            this.$owlItems = this.$elem.find(".owl-item");
            this.$owlWrapper = this.$elem.find(".owl-wrapper");
            this.playDirection = "next";
            this.prevItem = 0;
            this.prevArr = [0];
            this.currentItem = 0;
            this.customEvents();
            this.onStartup()
        }, onStartup: function () {
            this.updateItems();
            this.calculateAll();
            this.buildControls();
            this.updateControls();
            this.response();
            this.moveEvents();
            this.stopOnHover();
            this.owlStatus();
            !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle);
            !0 === this.options.autoPlay &&
            (this.options.autoPlay = 5E3);
            this.play();
            this.$elem.find(".owl-wrapper").css("display", "block");
            this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility();
            this.onstartup = !1;
            this.eachMoveUpdate();
            "function" === typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem])
        }, eachMoveUpdate: function () {
            !0 === this.options.lazyLoad && this.lazyLoad();
            !0 === this.options.autoHeight && this.autoHeight();
            this.onVisibleItems();
            "function" === typeof this.options.afterAction && this.options.afterAction.apply(this,
                [this.$elem])
        }, updateVars: function () {
            "function" === typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]);
            this.watchVisibility();
            this.updateItems();
            this.calculateAll();
            this.updatePosition();
            this.updateControls();
            this.eachMoveUpdate();
            "function" === typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem])
        }, reload: function () {
            var a = this;
            g.setTimeout(function () {
                a.updateVars()
            }, 0)
        }, watchVisibility: function () {
            var a = this;
            if (!1 === a.$elem.is(":visible")) a.$elem.css({opacity: 0}),
                g.clearInterval(a.autoPlayInterval), g.clearInterval(a.checkVisible); else return !1;
            a.checkVisible = g.setInterval(function () {
                a.$elem.is(":visible") && (a.reload(), a.$elem.animate({opacity: 1}, 200), g.clearInterval(a.checkVisible))
            }, 500)
        }, wrapItems: function () {
            this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');
            this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
            this.wrapperOuter = this.$elem.find(".owl-wrapper-outer");
            this.$elem.css("display", "block")
        },
        baseClass: function () {
            var a = this.$elem.hasClass(this.options.baseClass), b = this.$elem.hasClass(this.options.theme);
            a || this.$elem.addClass(this.options.baseClass);
            b || this.$elem.addClass(this.options.theme)
        }, updateItems: function () {
            var a, b;
            if (!1 === this.options.responsive)return !1;
            if (!0 === this.options.singleItem)return this.options.items = this.orignalItems = 1, this.options.itemsCustom = !1, this.options.itemsDesktop = !1, this.options.itemsDesktopSmall = !1, this.options.itemsTablet = !1, this.options.itemsTabletSmall =
                !1, this.options.itemsMobile = !1;
            a = f(this.options.responsiveBaseWidth).width();
            a > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems);
            if (!1 !== this.options.itemsCustom)for (this.options.itemsCustom.sort(function (a, b) {
                return a[0] - b[0]
            }), b = 0; b < this.options.itemsCustom.length; b += 1)this.options.itemsCustom[b][0] <= a && (this.options.items = this.options.itemsCustom[b][1]); else a <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]),
            a <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]), a <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]), a <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]), a <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
            this.options.items > this.itemsAmount &&
            !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
        }, response: function () {
            var a = this, b, e;
            if (!0 !== a.options.responsive)return !1;
            e = f(g).width();
            a.resizer = function () {
                f(g).width() !== e && (!1 !== a.options.autoPlay && g.clearInterval(a.autoPlayInterval), g.clearTimeout(b), b = g.setTimeout(function () {
                    e = f(g).width();
                    a.updateVars()
                }, a.options.responsiveRefreshRate))
            };
            f(g).resize(a.resizer)
        }, updatePosition: function () {
            this.jumpTo(this.currentItem);
            !1 !== this.options.autoPlay && this.checkAp()
        }, appendItemsSizes: function () {
            var a =
                this, b = 0, e = a.itemsAmount - a.options.items;
            a.$owlItems.each(function (c) {
                var d = f(this);
                d.css({width: a.itemWidth}).data("owl-item", Number(c));
                if (0 === c % a.options.items || c === e) c > e || (b += 1);
                d.data("owl-roundPages", b)
            })
        }, appendWrapperSizes: function () {
            this.$owlWrapper.css({width: this.$owlItems.length * this.itemWidth * 2, left: 0});
            this.appendItemsSizes()
        }, calculateAll: function () {
            this.calculateWidth();
            this.appendWrapperSizes();
            this.loops();
            this.max()
        }, calculateWidth: function () {
            this.itemWidth = Math.round(this.$elem.width() /
                this.options.items)
        }, max: function () {
            var a = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth);
            this.options.items > this.itemsAmount ? this.maximumPixels = a = this.maximumItem = 0 : (this.maximumItem = this.itemsAmount - this.options.items, this.maximumPixels = a);
            return a
        }, min: function () {
            return 0
        }, loops: function () {
            var a = 0, b = 0, e, c;
            this.positionsInArray = [0];
            this.pagesInArray = [];
            for (e = 0; e < this.itemsAmount; e += 1)b += this.itemWidth, this.positionsInArray.push(-b), !0 === this.options.scrollPerPage && (c = f(this.$owlItems[e]),
                c = c.data("owl-roundPages"), c !== a && (this.pagesInArray[a] = this.positionsInArray[e], a = c))
        }, buildControls: function () {
            if (!0 === this.options.navigation || !0 === this.options.pagination) this.owlControls = f('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem);
            !0 === this.options.pagination && this.buildPagination();
            !0 === this.options.navigation && this.buildButtons()
        }, buildButtons: function () {
            var a = this, b = f('<div class="owl-buttons"/>');
            a.owlControls.append(b);
            a.buttonPrev =
                f("<div/>", {"class": "owl-prev", html: a.options.navigationText[0] || ""});
            a.buttonNext = f("<div/>", {"class": "owl-next", html: a.options.navigationText[1] || ""});
            b.append(a.buttonPrev).append(a.buttonNext);
            b.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function (a) {
                a.preventDefault()
            });
            b.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function (b) {
                b.preventDefault();
                f(this).hasClass("owl-next") ? a.next() : a.prev()
            })
        }, buildPagination: function () {
            var a = this;
            a.paginationWrapper =
                f('<div class="owl-pagination"/>');
            a.owlControls.append(a.paginationWrapper);
            a.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function (b) {
                b.preventDefault();
                Number(f(this).data("owl-page")) !== a.currentItem && a.goTo(Number(f(this).data("owl-page")), !0)
            })
        }, updatePagination: function () {
            var a, b, e, c, d, g;
            if (!1 === this.options.pagination)return !1;
            this.paginationWrapper.html("");
            a = 0;
            b = this.itemsAmount - this.itemsAmount % this.options.items;
            for (c = 0; c < this.itemsAmount; c += 1)0 === c % this.options.items &&
            (a += 1, b === c && (e = this.itemsAmount - this.options.items), d = f("<div/>", {"class": "owl-page"}), g = f("<span></span>", {
                text: !0 === this.options.paginationNumbers ? a : "",
                "class": !0 === this.options.paginationNumbers ? "owl-numbers" : ""
            }), d.append(g), d.data("owl-page", b === c ? e : c), d.data("owl-roundPages", a), this.paginationWrapper.append(d));
            this.checkPagination()
        }, checkPagination: function () {
            var a = this;
            if (!1 === a.options.pagination)return !1;
            a.paginationWrapper.find(".owl-page").each(function () {
                f(this).data("owl-roundPages") ===
                f(a.$owlItems[a.currentItem]).data("owl-roundPages") && (a.paginationWrapper.find(".owl-page").removeClass("active"), f(this).addClass("active"))
            })
        }, checkNavigation: function () {
            if (!1 === this.options.navigation)return !1;
            !1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.removeClass("disabled")) : this.currentItem ===
            this.maximumItem ? (this.buttonPrev.removeClass("disabled"), this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"), this.buttonNext.removeClass("disabled")))
        }, updateControls: function () {
            this.updatePagination();
            this.checkNavigation();
            this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show())
        }, destroyControls: function () {
            this.owlControls && this.owlControls.remove()
        }, next: function (a) {
            if (this.isTransition)return !1;
            this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1;
            if (this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0))if (!0 === this.options.rewindNav) this.currentItem = 0, a = "rewind"; else return this.currentItem = this.maximumItem, !1;
            this.goTo(this.currentItem, a)
        }, prev: function (a) {
            if (this.isTransition)return !1;
            this.currentItem = !0 === this.options.scrollPerPage && 0 < this.currentItem && this.currentItem < this.options.items ? 0 : this.currentItem - (!0 === this.options.scrollPerPage ?
                    this.options.items : 1);
            if (0 > this.currentItem)if (!0 === this.options.rewindNav) this.currentItem = this.maximumItem, a = "rewind"; else return this.currentItem = 0, !1;
            this.goTo(this.currentItem, a)
        }, goTo: function (a, b, e) {
            var c = this;
            if (c.isTransition)return !1;
            "function" === typeof c.options.beforeMove && c.options.beforeMove.apply(this, [c.$elem]);
            a >= c.maximumItem ? a = c.maximumItem : 0 >= a && (a = 0);
            c.currentItem = c.owl.currentItem = a;
            if (!1 !== c.options.transitionStyle && "drag" !== e && 1 === c.options.items && !0 === c.browser.support3d)return c.swapSpeed(0),
                !0 === c.browser.support3d ? c.transition3d(c.positionsInArray[a]) : c.css2slide(c.positionsInArray[a], 1), c.afterGo(), c.singleItemTransition(), !1;
            a = c.positionsInArray[a];
            !0 === c.browser.support3d ? (c.isCss3Finish = !1, !0 === b ? (c.swapSpeed("paginationSpeed"), g.setTimeout(function () {
                c.isCss3Finish = !0
            }, c.options.paginationSpeed)) : "rewind" === b ? (c.swapSpeed(c.options.rewindSpeed), g.setTimeout(function () {
                c.isCss3Finish = !0
            }, c.options.rewindSpeed)) : (c.swapSpeed("slideSpeed"), g.setTimeout(function () {
                    c.isCss3Finish = !0
                },
                c.options.slideSpeed)), c.transition3d(a)) : !0 === b ? c.css2slide(a, c.options.paginationSpeed) : "rewind" === b ? c.css2slide(a, c.options.rewindSpeed) : c.css2slide(a, c.options.slideSpeed);
            c.afterGo()
        }, jumpTo: function (a) {
            "function" === typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]);
            a >= this.maximumItem || -1 === a ? a = this.maximumItem : 0 >= a && (a = 0);
            this.swapSpeed(0);
            !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[a]) : this.css2slide(this.positionsInArray[a], 1);
            this.currentItem =
                this.owl.currentItem = a;
            this.afterGo()
        }, afterGo: function () {
            this.prevArr.push(this.currentItem);
            this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2];
            this.prevArr.shift(0);
            this.prevItem !== this.currentItem && (this.checkPagination(), this.checkNavigation(), this.eachMoveUpdate(), !1 !== this.options.autoPlay && this.checkAp());
            "function" === typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem])
        }, stop: function () {
            this.apStatus = "stop";
            g.clearInterval(this.autoPlayInterval)
        },
        checkAp: function () {
            "stop" !== this.apStatus && this.play()
        }, play: function () {
            var a = this;
            a.apStatus = "play";
            if (!1 === a.options.autoPlay)return !1;
            g.clearInterval(a.autoPlayInterval);
            a.autoPlayInterval = g.setInterval(function () {
                a.next(!0)
            }, a.options.autoPlay)
        }, swapSpeed: function (a) {
            "slideSpeed" === a ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === a ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" !== typeof a && this.$owlWrapper.css(this.addCssSpeed(a))
        },
        addCssSpeed: function (a) {
            return {
                "-webkit-transition": "all " + a + "ms ease",
                "-moz-transition": "all " + a + "ms ease",
                "-o-transition": "all " + a + "ms ease",
                transition: "all " + a + "ms ease"
            }
        }, removeTransition: function () {
            return {"-webkit-transition": "", "-moz-transition": "", "-o-transition": "", transition: ""}
        }, doTranslate: function (a) {
            return {
                "-webkit-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-moz-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-o-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-ms-transform": "translate3d(" +
                a + "px, 0px, 0px)",
                transform: "translate3d(" + a + "px, 0px,0px)"
            }
        }, transition3d: function (a) {
            this.$owlWrapper.css(this.doTranslate(a))
        }, css2move: function (a) {
            this.$owlWrapper.css({left: a})
        }, css2slide: function (a, b) {
            var e = this;
            e.isCssFinish = !1;
            e.$owlWrapper.stop(!0, !0).animate({left: a}, {
                duration: b || e.options.slideSpeed, complete: function () {
                    e.isCssFinish = !0
                }
            })
        }, checkBrowser: function () {
            var a = k.createElement("div");
            a.style.cssText = "  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";
            a = a.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);
            this.browser = {
                support3d: null !== a && 1 === a.length,
                isTouch: "ontouchstart" in g || g.navigator.msMaxTouchPoints
            }
        }, moveEvents: function () {
            if (!1 !== this.options.mouseDrag || !1 !== this.options.touchDrag) this.gestures(), this.disabledEvents()
        }, eventTypes: function () {
            var a = ["s", "e", "x"];
            this.ev_types = {};
            !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? a = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] :
                !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? a = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (a = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]);
            this.ev_types.start = a[0];
            this.ev_types.move = a[1];
            this.ev_types.end = a[2]
        }, disabledEvents: function () {
            this.$elem.on("dragstart.owl", function (a) {
                a.preventDefault()
            });
            this.$elem.on("mousedown.disableTextSelect", function (a) {
                return f(a.target).is("input, textarea, select, option")
            })
        },
        gestures: function () {
            function a(a) {
                if (void 0 !== a.touches)return {x: a.touches[0].pageX, y: a.touches[0].pageY};
                if (void 0 === a.touches) {
                    if (void 0 !== a.pageX)return {x: a.pageX, y: a.pageY};
                    if (void 0 === a.pageX)return {x: a.clientX, y: a.clientY}
                }
            }

            function b(a) {
                "on" === a ? (f(k).on(d.ev_types.move, e), f(k).on(d.ev_types.end, c)) : "off" === a && (f(k).off(d.ev_types.move), f(k).off(d.ev_types.end))
            }

            function e(b) {
                b = b.originalEvent || b || g.event;
                d.newPosX = a(b).x - h.offsetX;
                d.newPosY = a(b).y - h.offsetY;
                d.newRelativeX = d.newPosX - h.relativePos;
                "function" === typeof d.options.startDragging && !0 !== h.dragging && 0 !== d.newRelativeX && (h.dragging = !0, d.options.startDragging.apply(d, [d.$elem]));
                (8 < d.newRelativeX || -8 > d.newRelativeX) && !0 === d.browser.isTouch && (void 0 !== b.preventDefault ? b.preventDefault() : b.returnValue = !1, h.sliding = !0);
                (10 < d.newPosY || -10 > d.newPosY) && !1 === h.sliding && f(k).off("touchmove.owl");
                d.newPosX = Math.max(Math.min(d.newPosX, d.newRelativeX / 5), d.maximumPixels + d.newRelativeX / 5);
                !0 === d.browser.support3d ? d.transition3d(d.newPosX) : d.css2move(d.newPosX)
            }

            function c(a) {
                a = a.originalEvent || a || g.event;
                var c;
                a.target = a.target || a.srcElement;
                h.dragging = !1;
                !0 !== d.browser.isTouch && d.$owlWrapper.removeClass("grabbing");
                d.dragDirection = 0 > d.newRelativeX ? d.owl.dragDirection = "left" : d.owl.dragDirection = "right";
                0 !== d.newRelativeX && (c = d.getNewPosition(), d.goTo(c, !1, "drag"), h.targetElement === a.target && !0 !== d.browser.isTouch && (f(a.target).on("click.disable", function (a) {
                    a.stopImmediatePropagation();
                    a.stopPropagation();
                    a.preventDefault();
                    f(a.target).off("click.disable")
                }),
                    a = f._data(a.target, "events").click, c = a.pop(), a.splice(0, 0, c)));
                b("off")
            }

            var d = this, h = {
                offsetX: 0,
                offsetY: 0,
                baseElWidth: 0,
                relativePos: 0,
                position: null,
                minSwipe: null,
                maxSwipe: null,
                sliding: null,
                dargging: null,
                targetElement: null
            };
            d.isCssFinish = !0;
            d.$elem.on(d.ev_types.start, ".owl-wrapper", function (c) {
                c = c.originalEvent || c || g.event;
                var e;
                if (3 === c.which)return !1;
                if (!(d.itemsAmount <= d.options.items)) {
                    if (!1 === d.isCssFinish && !d.options.dragBeforeAnimFinish || !1 === d.isCss3Finish && !d.options.dragBeforeAnimFinish)return !1;
                    !1 !== d.options.autoPlay && g.clearInterval(d.autoPlayInterval);
                    !0 === d.browser.isTouch || d.$owlWrapper.hasClass("grabbing") || d.$owlWrapper.addClass("grabbing");
                    d.newPosX = 0;
                    d.newRelativeX = 0;
                    f(this).css(d.removeTransition());
                    e = f(this).position();
                    h.relativePos = e.left;
                    h.offsetX = a(c).x - e.left;
                    h.offsetY = a(c).y - e.top;
                    b("on");
                    h.sliding = !1;
                    h.targetElement = c.target || c.srcElement
                }
            })
        }, getNewPosition: function () {
            var a = this.closestItem();
            a > this.maximumItem ? a = this.currentItem = this.maximumItem : 0 <= this.newPosX && (this.currentItem =
                    a = 0);
            return a
        }, closestItem: function () {
            var a = this, b = !0 === a.options.scrollPerPage ? a.pagesInArray : a.positionsInArray, e = a.newPosX,
                c = null;
            f.each(b, function (d, g) {
                e - a.itemWidth / 20 > b[d + 1] && e - a.itemWidth / 20 < g && "left" === a.moveDirection() ? (c = g, a.currentItem = !0 === a.options.scrollPerPage ? f.inArray(c, a.positionsInArray) : d) : e + a.itemWidth / 20 < g && e + a.itemWidth / 20 > (b[d + 1] || b[d] - a.itemWidth) && "right" === a.moveDirection() && (!0 === a.options.scrollPerPage ? (c = b[d + 1] || b[b.length - 1], a.currentItem = f.inArray(c, a.positionsInArray)) :
                        (c = b[d + 1], a.currentItem = d + 1))
            });
            return a.currentItem
        }, moveDirection: function () {
            var a;
            0 > this.newRelativeX ? (a = "right", this.playDirection = "next") : (a = "left", this.playDirection = "prev");
            return a
        }, customEvents: function () {
            var a = this;
            a.$elem.on("owl.next", function () {
                a.next()
            });
            a.$elem.on("owl.prev", function () {
                a.prev()
            });
            a.$elem.on("owl.play", function (b, e) {
                a.options.autoPlay = e;
                a.play();
                a.hoverStatus = "play"
            });
            a.$elem.on("owl.stop", function () {
                a.stop();
                a.hoverStatus = "stop"
            });
            a.$elem.on("owl.goTo", function (b, e) {
                a.goTo(e)
            });
            a.$elem.on("owl.jumpTo", function (b, e) {
                a.jumpTo(e)
            })
        }, stopOnHover: function () {
            var a = this;
            !0 === a.options.stopOnHover && !0 !== a.browser.isTouch && !1 !== a.options.autoPlay && (a.$elem.on("mouseover", function () {
                a.stop()
            }), a.$elem.on("mouseout", function () {
                "stop" !== a.hoverStatus && a.play()
            }))
        }, lazyLoad: function () {
            var a, b, e, c, d;
            if (!1 === this.options.lazyLoad)return !1;
            for (a = 0; a < this.itemsAmount; a += 1)b = f(this.$owlItems[a]), "loaded" !== b.data("owl-loaded") && (e = b.data("owl-item"), c = b.find(".lazyOwl"), "string" !== typeof c.data("src") ?
                b.data("owl-loaded", "loaded") : (void 0 === b.data("owl-loaded") && (c.hide(), b.addClass("loading").data("owl-loaded", "checked")), (d = !0 === this.options.lazyFollow ? e >= this.currentItem : !0) && e < this.currentItem + this.options.items && c.length && this.lazyPreload(b, c)))
        }, lazyPreload: function (a, b) {
            function e() {
                a.data("owl-loaded", "loaded").removeClass("loading");
                b.removeAttr("data-src");
                "fade" === d.options.lazyEffect ? b.fadeIn(400) : b.show();
                "function" === typeof d.options.afterLazyLoad && d.options.afterLazyLoad.apply(this,
                    [d.$elem])
            }

            function c() {
                f += 1;
                d.completeImg(b.get(0)) || !0 === k ? e() : 100 >= f ? g.setTimeout(c, 100) : e()
            }

            var d = this, f = 0, k;
            "DIV" === b.prop("tagName") ? (b.css("background-image", "url(" + b.data("src") + ")"), k = !0) : b[0].src = b.data("src");
            c()
        }, autoHeight: function () {
            function a() {
                var a = f(e.$owlItems[e.currentItem]).height();
                e.wrapperOuter.css("height", a + "px");
                e.wrapperOuter.hasClass("autoHeight") || g.setTimeout(function () {
                    e.wrapperOuter.addClass("autoHeight")
                }, 0)
            }

            function b() {
                d += 1;
                e.completeImg(c.get(0)) ? a() : 100 >= d ? g.setTimeout(b,
                    100) : e.wrapperOuter.css("height", "")
            }

            var e = this, c = f(e.$owlItems[e.currentItem]).find("img"), d;
            void 0 !== c.get(0) ? (d = 0, b()) : a()
        }, completeImg: function (a) {
            return !a.complete || "undefined" !== typeof a.naturalWidth && 0 === a.naturalWidth ? !1 : !0
        }, onVisibleItems: function () {
            var a;
            !0 === this.options.addClassActive && this.$owlItems.removeClass("active");
            this.visibleItems = [];
            for (a = this.currentItem; a < this.currentItem + this.options.items; a += 1)this.visibleItems.push(a), !0 === this.options.addClassActive && f(this.$owlItems[a]).addClass("active");
            this.owl.visibleItems = this.visibleItems
        }, transitionTypes: function (a) {
            this.outClass = "owl-" + a + "-out";
            this.inClass = "owl-" + a + "-in"
        }, singleItemTransition: function () {
            var a = this, b = a.outClass, e = a.inClass, c = a.$owlItems.eq(a.currentItem),
                d = a.$owlItems.eq(a.prevItem),
                f = Math.abs(a.positionsInArray[a.currentItem]) + a.positionsInArray[a.prevItem],
                g = Math.abs(a.positionsInArray[a.currentItem]) + a.itemWidth / 2;
            a.isTransition = !0;
            a.$owlWrapper.addClass("owl-origin").css({
                "-webkit-transform-origin": g + "px", "-moz-perspective-origin": g +
                "px", "perspective-origin": g + "px"
            });
            d.css({
                position: "relative",
                left: f + "px"
            }).addClass(b).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function () {
                a.endPrev = !0;
                d.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
                a.clearTransStyle(d, b)
            });
            c.addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function () {
                a.endCurrent = !0;
                c.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
                a.clearTransStyle(c, e)
            })
        }, clearTransStyle: function (a,
                                      b) {
            a.css({position: "", left: ""}).removeClass(b);
            this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"), this.isTransition = this.endCurrent = this.endPrev = !1)
        }, owlStatus: function () {
            this.owl = {
                userOptions: this.userOptions,
                baseElement: this.$elem,
                userItems: this.$userItems,
                owlItems: this.$owlItems,
                currentItem: this.currentItem,
                prevItem: this.prevItem,
                visibleItems: this.visibleItems,
                isTouch: this.browser.isTouch,
                browser: this.browser,
                dragDirection: this.dragDirection
            }
        }, clearEvents: function () {
            this.$elem.off(".owl owl mousedown.disableTextSelect");
            f(k).off(".owl owl");
            f(g).off("resize", this.resizer)
        }, unWrap: function () {
            0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(), this.$userItems.unwrap().unwrap(), this.owlControls && this.owlControls.remove());
            this.clearEvents();
            this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses"))
        }, destroy: function () {
            this.stop();
            g.clearInterval(this.checkVisible);
            this.unWrap();
            this.$elem.removeData()
        }, reinit: function (a) {
            a = f.extend({}, this.userOptions,
                a);
            this.unWrap();
            this.init(a, this.$elem)
        }, addItem: function (a, b) {
            var e;
            if (!a)return !1;
            if (0 === this.$elem.children().length)return this.$elem.append(a), this.setVars(), !1;
            this.unWrap();
            e = void 0 === b || -1 === b ? -1 : b;
            e >= this.$userItems.length || -1 === e ? this.$userItems.eq(-1).after(a) : this.$userItems.eq(e).before(a);
            this.setVars()
        }, removeItem: function (a) {
            if (0 === this.$elem.children().length)return !1;
            a = void 0 === a || -1 === a ? -1 : a;
            this.unWrap();
            this.$userItems.eq(a).remove();
            this.setVars()
        }
    };
    f.fn.owlCarousel = function (a) {
        return this.each(function () {
            if (!0 ===
                f(this).data("owl-init"))return !1;
            f(this).data("owl-init", !0);
            var b = Object.create(l);
            b.init(a, this);
            f.data(this, "owlCarousel", b)
        })
    };
    f.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: !1,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        singleItem: !1,
        itemsScaleUp: !1,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1E3,
        autoPlay: !1,
        stopOnHover: !1,
        navigation: !1,
        navigationText: ["prev", "next"],
        rewindNav: !0,
        scrollPerPage: !1,
        pagination: !0,
        paginationNumbers: !1,
        responsive: !0,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: g,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: !1,
        lazyFollow: !0,
        lazyEffect: "fade",
        autoHeight: !1,
        jsonPath: !1,
        jsonSuccess: !1,
        dragBeforeAnimFinish: !0,
        mouseDrag: !0,
        touchDrag: !0,
        addClassActive: !1,
        transitionStyle: !1,
        beforeUpdate: !1,
        afterUpdate: !1,
        beforeInit: !1,
        afterInit: !1,
        beforeMove: !1,
        afterMove: !1,
        afterAction: !1,
        startDragging: !1,
        afterLazyLoad: !1
    }
})(jQuery, window, document);

/**
 * selectFx.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
!function (s) {
    "use strict";
    function e(s) {
        return new RegExp("(^|\\s+)" + s + "(\\s+|$)")
    }

    function n(s, e) {
        var n = a(s, e) ? c : t;
        n(s, e)
    }

    var a, t, c;
    "classList" in document.documentElement ? (a = function (s, e) {
        return s.classList.contains(e)
    }, t = function (s, e) {
        s.classList.add(e)
    }, c = function (s, e) {
        s.classList.remove(e)
    }) : (a = function (s, n) {
        return e(n).test(s.className)
    }, t = function (s, e) {
        a(s, e) || (s.className = s.className + " " + e)
    }, c = function (s, n) {
        s.className = s.className.replace(e(n), " ")
    });
    var i = {hasClass: a, addClass: t, removeClass: c, toggleClass: n, has: a, add: t, remove: c, toggle: n};
    "function" == typeof define && define.amd ? define(i) : s.classie = i
}(window);
!function (e) {
    "use strict";
    function t(e, t) {
        if (!e)return !1;
        for (var s = e.target || e.srcElement || e || !1; s && s != t;)s = s.parentNode || !1;
        return s !== !1
    }

    function s(e, t) {
        for (var s in t)t.hasOwnProperty(s) && (e[s] = t[s]);
        return e
    }

    function l(e, t) {
        this.el = e, this.options = s({}, this.options), s(this.options, t), this._init()
    }

    l.prototype.options = {
        newTab: !0, stickyPlaceholder: !0, onChange: function (e) {
            return !1
        }
    }, l.prototype._init = function () {
        var e = this.el.querySelector("option[selected]");
        this.hasDefaultPlaceholder = e && e.disabled, this.selectedOpt = e || this.el.querySelector("option"), this._createSelectEl(), this.selOpts = [].slice.call(this.selEl.querySelectorAll("li[data-option]")), this.selOptsCount = this.selOpts.length, this.current = this.selOpts.indexOf(this.selEl.querySelector("li.cs-selected")) || -1, this.selPlaceholder = this.selEl.querySelector("span.cs-placeholder"), this._initEvents()
    }, l.prototype._createSelectEl = function () {
        var e = "", t = function (e) {
            var t = "", s = "", l = "";
            return !e.selectedOpt || this.foundSelected || this.hasDefaultPlaceholder || (s += "cs-selected ", this.foundSelected = !0), e.getAttribute("data-class") && (s += e.getAttribute("data-class")), e.getAttribute("data-link") && (l = "data-link=" + e.getAttribute("data-link")), "" !== s && (t = 'class="' + s + '" '), "<li " + t + l + ' data-option data-value="' + e.value + '"><span>' + e.textContent + "</span></li>"
        };
        [].slice.call(this.el.children).forEach(function (s) {
            if (!s.disabled) {
                var l = s.tagName.toLowerCase();
                "option" === l ? e += t(s) : "optgroup" === l && (e += '<li class="cs-optgroup"><span>' + s.label + "</span><ul>", [].slice.call(s.children).forEach(function (s) {
                        e += t(s)
                    }), e += "</ul></li>")
            }
        });
        var s = '<div class="cs-options"><ul>' + e + "</ul></div>";
        this.selEl = document.createElement("div"), this.selEl.className = this.el.className, this.selEl.tabIndex = this.el.tabIndex, this.selEl.innerHTML = '<span class="cs-placeholder">' + this.selectedOpt.textContent + "</span>" + s, this.el.parentNode.appendChild(this.selEl), this.selEl.appendChild(this.el)
    }, l.prototype._initEvents = function () {
        var e = this;
        this.selPlaceholder.addEventListener("click", function () {
            e._toggleSelect()
        }), this.selOpts.forEach(function (t, s) {
            t.addEventListener("click", function () {
                e.current = s, e._changeOption(), e._toggleSelect()
            })
        }), document.addEventListener("click", function (s) {
            var l = s.target;
            e._isOpen() && l !== e.selEl && !t(l, e.selEl) && e._toggleSelect()
        }), this.selEl.addEventListener("keydown", function (t) {
            var s = t.keyCode || t.which;
            switch (s) {
                case 38:
                    t.preventDefault(), e._navigateOpts("prev");
                    break;
                case 40:
                    t.preventDefault(), e._navigateOpts("next");
                    break;
                case 32:
                    t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && e._changeOption(), e._toggleSelect();
                    break;
                case 13:
                    t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && (e._changeOption(), e._toggleSelect());
                    break;
                case 27:
                    t.preventDefault(), e._isOpen() && e._toggleSelect()
            }
        })
    }, l.prototype._navigateOpts = function (e) {
        this._isOpen() || this._toggleSelect();
        var t = "undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent ? this.preSelCurrent : this.current;
        ("prev" === e && t > 0 || "next" === e && t < this.selOptsCount - 1) && (this.preSelCurrent = "next" === e ? t + 1 : t - 1, this._removeFocus(), classie.add(this.selOpts[this.preSelCurrent], "cs-focus"))
    }, l.prototype._toggleSelect = function () {
        this._removeFocus(), this._isOpen() ? (-1 !== this.current && (this.selPlaceholder.textContent = this.selOpts[this.current].textContent), classie.remove(this.selEl, "cs-active")) : (this.hasDefaultPlaceholder && this.options.stickyPlaceholder && (this.selPlaceholder.textContent = this.selectedOpt.textContent), classie.add(this.selEl, "cs-active"))
    }, l.prototype._changeOption = function () {
        "undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent && (this.current = this.preSelCurrent, this.preSelCurrent = -1);
        var t = this.selOpts[this.current];
        this.selPlaceholder.textContent = t.textContent, this.el.value = t.getAttribute("data-value");
        var s = this.selEl.querySelector("li.cs-selected");
        s && classie.remove(s, "cs-selected"), classie.add(t, "cs-selected"), t.getAttribute("data-link") && (this.options.newTab ? e.open(t.getAttribute("data-link"), "_blank") : e.location = t.getAttribute("data-link")), this.options.onChange(this.el.value)
    }, l.prototype._isOpen = function (e) {
        return classie.has(this.selEl, "cs-active")
    }, l.prototype._removeFocus = function (e) {
        var t = this.selEl.querySelector("li.cs-focus");
        t && classie.remove(t, "cs-focus")
    }, e.SelectFx = l
}(window);

/*
 Plugin: jQuery Parallax
 Version 1.1.3
 Author: Ian Lunn
 Twitter: @IanLunn
 Author URL: http://www.ianlunn.co.uk/
 Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
 */

!function (n) {
    var t = n(window), e = t.height();
    t.resize(function () {
        e = t.height()
    }), n.fn.parallax = function (o, i, r) {
        function u() {
            var r = t.scrollTop();
            a.each(function () {
                var t = n(this), u = t.offset().top, c = h(t);
                r > u + c || u > r + e || a.css("backgroundPosition", o + " " + Math.round((l - r) * i) + "px")
            })
        }

        var h, l, a = n(this);
        a.each(function () {
            l = a.offset().top
        }), h = r ? function (n) {
            return n.outerHeight(!0)
        } : function (n) {
            return n.height()
        }, (arguments.length < 1 || null === o) && (o = "50%"), (arguments.length < 2 || null === i) && (i = .1), (arguments.length < 3 || null === r) && (r = !0), t.bind("scroll", u).resize(u), u()
    }
}(jQuery);

/*!
 * Isotope PACKAGED v2.2.2
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */

!function (a) {
    function b() {
    }

    function c(a) {
        function c(b) {
            b.prototype.option || (b.prototype.option = function (b) {
                a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
            })
        }

        function e(b, c) {
            a.fn[b] = function (e) {
                if ("string" == typeof e) {
                    for (var g = d.call(arguments, 1), h = 0, i = this.length; i > h; h++) {
                        var j = this[h], k = a.data(j, b);
                        if (k)if (a.isFunction(k[e]) && "_" !== e.charAt(0)) {
                            var l = k[e].apply(k, g);
                            if (void 0 !== l)return l
                        } else f("no such method '" + e + "' for " + b + " instance"); else f("cannot call methods on " + b + " prior to initialization; attempted to call '" + e + "'")
                    }
                    return this
                }
                return this.each(function () {
                    var d = a.data(this, b);
                    d ? (d.option(e), d._init()) : (d = new c(this, e), a.data(this, b, d))
                })
            }
        }

        if (a) {
            var f = "undefined" == typeof console ? b : function (a) {
                console.error(a)
            };
            return a.bridget = function (a, b) {
                c(b), e(a, b)
            }, a.bridget
        }
    }

    var d = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], c) : c("object" == typeof exports ? require("jquery") : a.jQuery)
}(window), function (a) {
    function b(b) {
        var c = a.event;
        return c.target = c.target || c.srcElement || b, c
    }

    var c = document.documentElement, d = function () {
    };
    c.addEventListener ? d = function (a, b, c) {
        a.addEventListener(b, c, !1)
    } : c.attachEvent && (d = function (a, c, d) {
            a[c + d] = d.handleEvent ? function () {
                var c = b(a);
                d.handleEvent.call(d, c)
            } : function () {
                var c = b(a);
                d.call(a, c)
            }, a.attachEvent("on" + c, a[c + d])
        });
    var e = function () {
    };
    c.removeEventListener ? e = function (a, b, c) {
        a.removeEventListener(b, c, !1)
    } : c.detachEvent && (e = function (a, b, c) {
            a.detachEvent("on" + b, a[b + c]);
            try {
                delete a[b + c]
            } catch (d) {
                a[b + c] = void 0
            }
        });
    var f = {bind: d, unbind: e};
    "function" == typeof define && define.amd ? define("eventie/eventie", f) : "object" == typeof exports ? module.exports = f : a.eventie = f
}(window), function () {
    "use strict";
    function a() {
    }

    function b(a, b) {
        for (var c = a.length; c--;)if (a[c].listener === b)return c;
        return -1
    }

    function c(a) {
        return function () {
            return this[a].apply(this, arguments)
        }
    }

    var d = a.prototype, e = this, f = e.EventEmitter;
    d.getListeners = function (a) {
        var b, c, d = this._getEvents();
        if (a instanceof RegExp) {
            b = {};
            for (c in d)d.hasOwnProperty(c) && a.test(c) && (b[c] = d[c])
        } else b = d[a] || (d[a] = []);
        return b
    }, d.flattenListeners = function (a) {
        var b, c = [];
        for (b = 0; b < a.length; b += 1)c.push(a[b].listener);
        return c
    }, d.getListenersAsObject = function (a) {
        var b, c = this.getListeners(a);
        return c instanceof Array && (b = {}, b[a] = c), b || c
    }, d.addListener = function (a, c) {
        var d, e = this.getListenersAsObject(a), f = "object" == typeof c;
        for (d in e)e.hasOwnProperty(d) && -1 === b(e[d], c) && e[d].push(f ? c : {listener: c, once: !1});
        return this
    }, d.on = c("addListener"), d.addOnceListener = function (a, b) {
        return this.addListener(a, {listener: b, once: !0})
    }, d.once = c("addOnceListener"), d.defineEvent = function (a) {
        return this.getListeners(a), this
    }, d.defineEvents = function (a) {
        for (var b = 0; b < a.length; b += 1)this.defineEvent(a[b]);
        return this
    }, d.removeListener = function (a, c) {
        var d, e, f = this.getListenersAsObject(a);
        for (e in f)f.hasOwnProperty(e) && (d = b(f[e], c), -1 !== d && f[e].splice(d, 1));
        return this
    }, d.off = c("removeListener"), d.addListeners = function (a, b) {
        return this.manipulateListeners(!1, a, b)
    }, d.removeListeners = function (a, b) {
        return this.manipulateListeners(!0, a, b)
    }, d.manipulateListeners = function (a, b, c) {
        var d, e, f = a ? this.removeListener : this.addListener, g = a ? this.removeListeners : this.addListeners;
        if ("object" != typeof b || b instanceof RegExp)for (d = c.length; d--;)f.call(this, b, c[d]); else for (d in b)b.hasOwnProperty(d) && (e = b[d]) && ("function" == typeof e ? f.call(this, d, e) : g.call(this, d, e));
        return this
    }, d.removeEvent = function (a) {
        var b, c = typeof a, d = this._getEvents();
        if ("string" === c) delete d[a]; else if (a instanceof RegExp)for (b in d)d.hasOwnProperty(b) && a.test(b) && delete d[b]; else delete this._events;
        return this
    }, d.removeAllListeners = c("removeEvent"), d.emitEvent = function (a, b) {
        var c, d, e, f, g = this.getListenersAsObject(a);
        for (e in g)if (g.hasOwnProperty(e))for (d = g[e].length; d--;)c = g[e][d], c.once === !0 && this.removeListener(a, c.listener), f = c.listener.apply(this, b || []), f === this._getOnceReturnValue() && this.removeListener(a, c.listener);
        return this
    }, d.trigger = c("emitEvent"), d.emit = function (a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(a, b)
    }, d.setOnceReturnValue = function (a) {
        return this._onceReturnValue = a, this
    }, d._getOnceReturnValue = function () {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, d._getEvents = function () {
        return this._events || (this._events = {})
    }, a.noConflict = function () {
        return e.EventEmitter = f, a
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
        return a
    }) : "object" == typeof module && module.exports ? module.exports = a : e.EventEmitter = a
}.call(this), function (a) {
    function b(a) {
        if (a) {
            if ("string" == typeof d[a])return a;
            a = a.charAt(0).toUpperCase() + a.slice(1);
            for (var b, e = 0, f = c.length; f > e; e++)if (b = c[e] + a, "string" == typeof d[b])return b
        }
    }

    var c = "Webkit Moz ms Ms O".split(" "), d = document.documentElement.style;
    "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function () {
        return b
    }) : "object" == typeof exports ? module.exports = b : a.getStyleProperty = b
}(window), function (a, b) {
    function c(a) {
        var b = parseFloat(a), c = -1 === a.indexOf("%") && !isNaN(b);
        return c && b
    }

    function d() {
    }

    function e() {
        for (var a = {
            width: 0,
            height: 0,
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0
        }, b = 0, c = h.length; c > b; b++) {
            var d = h[b];
            a[d] = 0
        }
        return a
    }

    function f(b) {
        function d() {
            if (!m) {
                m = !0;
                var d = a.getComputedStyle;
                if (j = function () {
                        var a = d ? function (a) {
                            return d(a, null)
                        } : function (a) {
                            return a.currentStyle
                        };
                        return function (b) {
                            var c = a(b);
                            return c || g("Style returned " + c + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), c
                        }
                    }(), k = b("boxSizing")) {
                    var e = document.createElement("div");
                    e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style[k] = "border-box";
                    var f = document.body || document.documentElement;
                    f.appendChild(e);
                    var h = j(e);
                    l = 200 === c(h.width), f.removeChild(e)
                }
            }
        }

        function f(a) {
            if (d(), "string" == typeof a && (a = document.querySelector(a)), a && "object" == typeof a && a.nodeType) {
                var b = j(a);
                if ("none" === b.display)return e();
                var f = {};
                f.width = a.offsetWidth, f.height = a.offsetHeight;
                for (var g = f.isBorderBox = !(!k || !b[k] || "border-box" !== b[k]), m = 0, n = h.length; n > m; m++) {
                    var o = h[m], p = b[o];
                    p = i(a, p);
                    var q = parseFloat(p);
                    f[o] = isNaN(q) ? 0 : q
                }
                var r = f.paddingLeft + f.paddingRight, s = f.paddingTop + f.paddingBottom,
                    t = f.marginLeft + f.marginRight, u = f.marginTop + f.marginBottom,
                    v = f.borderLeftWidth + f.borderRightWidth, w = f.borderTopWidth + f.borderBottomWidth, x = g && l,
                    y = c(b.width);
                y !== !1 && (f.width = y + (x ? 0 : r + v));
                var z = c(b.height);
                return z !== !1 && (f.height = z + (x ? 0 : s + w)), f.innerWidth = f.width - (r + v), f.innerHeight = f.height - (s + w), f.outerWidth = f.width + t, f.outerHeight = f.height + u, f
            }
        }

        function i(b, c) {
            if (a.getComputedStyle || -1 === c.indexOf("%"))return c;
            var d = b.style, e = d.left, f = b.runtimeStyle, g = f && f.left;
            return g && (f.left = b.currentStyle.left), d.left = c, c = d.pixelLeft, d.left = e, g && (f.left = g), c
        }

        var j, k, l, m = !1;
        return f
    }

    var g = "undefined" == typeof console ? d : function (a) {
            console.error(a)
        },
        h = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
    "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], f) : "object" == typeof exports ? module.exports = f(require("desandro-get-style-property")) : a.getSize = f(a.getStyleProperty)
}(window), function (a) {
    function b(a) {
        "function" == typeof a && (b.isReady ? a() : g.push(a))
    }

    function c(a) {
        var c = "readystatechange" === a.type && "complete" !== f.readyState;
        b.isReady || c || d()
    }

    function d() {
        b.isReady = !0;
        for (var a = 0, c = g.length; c > a; a++) {
            var d = g[a];
            d()
        }
    }

    function e(e) {
        return "complete" === f.readyState ? d() : (e.bind(f, "DOMContentLoaded", c), e.bind(f, "readystatechange", c), e.bind(a, "load", c)), b
    }

    var f = a.document, g = [];
    b.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], e) : "object" == typeof exports ? module.exports = e(require("eventie")) : a.docReady = e(a.eventie)
}(window), function (a) {
    "use strict";
    function b(a, b) {
        return a[g](b)
    }

    function c(a) {
        if (!a.parentNode) {
            var b = document.createDocumentFragment();
            b.appendChild(a)
        }
    }

    function d(a, b) {
        c(a);
        for (var d = a.parentNode.querySelectorAll(b), e = 0, f = d.length; f > e; e++)if (d[e] === a)return !0;
        return !1
    }

    function e(a, d) {
        return c(a), b(a, d)
    }

    var f, g = function () {
        if (a.matches)return "matches";
        if (a.matchesSelector)return "matchesSelector";
        for (var b = ["webkit", "moz", "ms", "o"], c = 0, d = b.length; d > c; c++) {
            var e = b[c], f = e + "MatchesSelector";
            if (a[f])return f
        }
    }();
    if (g) {
        var h = document.createElement("div"), i = b(h, "div");
        f = i ? b : e
    } else f = d;
    "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function () {
        return f
    }) : "object" == typeof exports ? module.exports = f : window.matchesSelector = f
}(Element.prototype), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function (c, d) {
        return b(a, c, d)
    }) : "object" == typeof exports ? module.exports = b(a, require("doc-ready"), require("desandro-matches-selector")) : a.fizzyUIUtils = b(a, a.docReady, a.matchesSelector)
}(window, function (a, b, c) {
    var d = {};
    d.extend = function (a, b) {
        for (var c in b)a[c] = b[c];
        return a
    }, d.modulo = function (a, b) {
        return (a % b + b) % b
    };
    var e = Object.prototype.toString;
    d.isArray = function (a) {
        return "[object Array]" == e.call(a)
    }, d.makeArray = function (a) {
        var b = [];
        if (d.isArray(a)) b = a; else if (a && "number" == typeof a.length)for (var c = 0, e = a.length; e > c; c++)b.push(a[c]); else b.push(a);
        return b
    }, d.indexOf = Array.prototype.indexOf ? function (a, b) {
        return a.indexOf(b)
    } : function (a, b) {
        for (var c = 0, d = a.length; d > c; c++)if (a[c] === b)return c;
        return -1
    }, d.removeFrom = function (a, b) {
        var c = d.indexOf(a, b);
        -1 != c && a.splice(c, 1)
    }, d.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function (a) {
        return a instanceof HTMLElement
    } : function (a) {
        return a && "object" == typeof a && 1 == a.nodeType && "string" == typeof a.nodeName
    }, d.setText = function () {
        function a(a, c) {
            b = b || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), a[b] = c
        }

        var b;
        return a
    }(), d.getParent = function (a, b) {
        for (; a != document.body;)if (a = a.parentNode, c(a, b))return a
    }, d.getQueryElement = function (a) {
        return "string" == typeof a ? document.querySelector(a) : a
    }, d.handleEvent = function (a) {
        var b = "on" + a.type;
        this[b] && this[b](a)
    }, d.filterFindElements = function (a, b) {
        a = d.makeArray(a);
        for (var e = [], f = 0, g = a.length; g > f; f++) {
            var h = a[f];
            if (d.isElement(h))if (b) {
                c(h, b) && e.push(h);
                for (var i = h.querySelectorAll(b), j = 0, k = i.length; k > j; j++)e.push(i[j])
            } else e.push(h)
        }
        return e
    }, d.debounceMethod = function (a, b, c) {
        var d = a.prototype[b], e = b + "Timeout";
        a.prototype[b] = function () {
            var a = this[e];
            a && clearTimeout(a);
            var b = arguments, f = this;
            this[e] = setTimeout(function () {
                d.apply(f, b), delete f[e]
            }, c || 100)
        }
    }, d.toDashed = function (a) {
        return a.replace(/(.)([A-Z])/g, function (a, b, c) {
            return b + "-" + c
        }).toLowerCase()
    };
    var f = a.console;
    return d.htmlInit = function (c, e) {
        b(function () {
            for (var b = d.toDashed(e), g = document.querySelectorAll(".js-" + b), h = "data-" + b + "-options", i = 0, j = g.length; j > i; i++) {
                var k, l = g[i], m = l.getAttribute(h);
                try {
                    k = m && JSON.parse(m)
                } catch (n) {
                    f && f.error("Error parsing " + h + " on " + l.nodeName.toLowerCase() + (l.id ? "#" + l.id : "") + ": " + n);
                    continue
                }
                var o = new c(l, k), p = a.jQuery;
                p && p.data(l, e, o)
            }
        })
    }, d
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function (c, d, e, f) {
        return b(a, c, d, e, f)
    }) : "object" == typeof exports ? module.exports = b(a, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (a.Outlayer = {}, a.Outlayer.Item = b(a, a.EventEmitter, a.getSize, a.getStyleProperty, a.fizzyUIUtils))
}(window, function (a, b, c, d, e) {
    "use strict";
    function f(a) {
        for (var b in a)return !1;
        return b = null, !0
    }

    function g(a, b) {
        a && (this.element = a, this.layout = b, this.position = {x: 0, y: 0}, this._create())
    }

    function h(a) {
        return a.replace(/([A-Z])/g, function (a) {
            return "-" + a.toLowerCase()
        })
    }

    var i = a.getComputedStyle, j = i ? function (a) {
        return i(a, null)
    } : function (a) {
        return a.currentStyle
    }, k = d("transition"), l = d("transform"), m = k && l, n = !!d("perspective"), o = {
        WebkitTransition: "webkitTransitionEnd",
        MozTransition: "transitionend",
        OTransition: "otransitionend",
        transition: "transitionend"
    }[k], p = ["transform", "transition", "transitionDuration", "transitionProperty"], q = function () {
        for (var a = {}, b = 0, c = p.length; c > b; b++) {
            var e = p[b], f = d(e);
            f && f !== e && (a[e] = f)
        }
        return a
    }();
    e.extend(g.prototype, b.prototype), g.prototype._create = function () {
        this._transn = {ingProperties: {}, clean: {}, onEnd: {}}, this.css({position: "absolute"})
    }, g.prototype.handleEvent = function (a) {
        var b = "on" + a.type;
        this[b] && this[b](a)
    }, g.prototype.getSize = function () {
        this.size = c(this.element)
    }, g.prototype.css = function (a) {
        var b = this.element.style;
        for (var c in a) {
            var d = q[c] || c;
            b[d] = a[c]
        }
    }, g.prototype.getPosition = function () {
        var a = j(this.element), b = this.layout.options, c = b.isOriginLeft, d = b.isOriginTop,
            e = a[c ? "left" : "right"], f = a[d ? "top" : "bottom"], g = this.layout.size,
            h = -1 != e.indexOf("%") ? parseFloat(e) / 100 * g.width : parseInt(e, 10),
            i = -1 != f.indexOf("%") ? parseFloat(f) / 100 * g.height : parseInt(f, 10);
        h = isNaN(h) ? 0 : h, i = isNaN(i) ? 0 : i, h -= c ? g.paddingLeft : g.paddingRight, i -= d ? g.paddingTop : g.paddingBottom, this.position.x = h, this.position.y = i
    }, g.prototype.layoutPosition = function () {
        var a = this.layout.size, b = this.layout.options, c = {}, d = b.isOriginLeft ? "paddingLeft" : "paddingRight",
            e = b.isOriginLeft ? "left" : "right", f = b.isOriginLeft ? "right" : "left", g = this.position.x + a[d];
        c[e] = this.getXValue(g), c[f] = "";
        var h = b.isOriginTop ? "paddingTop" : "paddingBottom", i = b.isOriginTop ? "top" : "bottom",
            j = b.isOriginTop ? "bottom" : "top", k = this.position.y + a[h];
        c[i] = this.getYValue(k), c[j] = "", this.css(c), this.emitEvent("layout", [this])
    }, g.prototype.getXValue = function (a) {
        var b = this.layout.options;
        return b.percentPosition && !b.isHorizontal ? a / this.layout.size.width * 100 + "%" : a + "px"
    }, g.prototype.getYValue = function (a) {
        var b = this.layout.options;
        return b.percentPosition && b.isHorizontal ? a / this.layout.size.height * 100 + "%" : a + "px"
    }, g.prototype._transitionTo = function (a, b) {
        this.getPosition();
        var c = this.position.x, d = this.position.y, e = parseInt(a, 10), f = parseInt(b, 10),
            g = e === this.position.x && f === this.position.y;
        if (this.setPosition(a, b), g && !this.isTransitioning)return void this.layoutPosition();
        var h = a - c, i = b - d, j = {};
        j.transform = this.getTranslate(h, i), this.transition({
            to: j,
            onTransitionEnd: {transform: this.layoutPosition},
            isCleaning: !0
        })
    }, g.prototype.getTranslate = function (a, b) {
        var c = this.layout.options;
        return a = c.isOriginLeft ? a : -a, b = c.isOriginTop ? b : -b, n ? "translate3d(" + a + "px, " + b + "px, 0)" : "translate(" + a + "px, " + b + "px)"
    }, g.prototype.goTo = function (a, b) {
        this.setPosition(a, b), this.layoutPosition()
    }, g.prototype.moveTo = m ? g.prototype._transitionTo : g.prototype.goTo, g.prototype.setPosition = function (a, b) {
        this.position.x = parseInt(a, 10), this.position.y = parseInt(b, 10)
    }, g.prototype._nonTransition = function (a) {
        this.css(a.to), a.isCleaning && this._removeStyles(a.to);
        for (var b in a.onTransitionEnd)a.onTransitionEnd[b].call(this)
    }, g.prototype._transition = function (a) {
        if (!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(a);
        var b = this._transn;
        for (var c in a.onTransitionEnd)b.onEnd[c] = a.onTransitionEnd[c];
        for (c in a.to)b.ingProperties[c] = !0, a.isCleaning && (b.clean[c] = !0);
        if (a.from) {
            this.css(a.from);
            var d = this.element.offsetHeight;
            d = null
        }
        this.enableTransition(a.to), this.css(a.to), this.isTransitioning = !0
    };
    var r = "opacity," + h(q.transform || "transform");
    g.prototype.enableTransition = function () {
        this.isTransitioning || (this.css({
            transitionProperty: r,
            transitionDuration: this.layout.options.transitionDuration
        }), this.element.addEventListener(o, this, !1))
    }, g.prototype.transition = g.prototype[k ? "_transition" : "_nonTransition"], g.prototype.onwebkitTransitionEnd = function (a) {
        this.ontransitionend(a)
    }, g.prototype.onotransitionend = function (a) {
        this.ontransitionend(a)
    };
    var s = {"-webkit-transform": "transform", "-moz-transform": "transform", "-o-transform": "transform"};
    g.prototype.ontransitionend = function (a) {
        if (a.target === this.element) {
            var b = this._transn, c = s[a.propertyName] || a.propertyName;
            if (delete b.ingProperties[c], f(b.ingProperties) && this.disableTransition(), c in b.clean && (this.element.style[a.propertyName] = "", delete b.clean[c]), c in b.onEnd) {
                var d = b.onEnd[c];
                d.call(this), delete b.onEnd[c]
            }
            this.emitEvent("transitionEnd", [this])
        }
    }, g.prototype.disableTransition = function () {
        this.removeTransitionStyles(), this.element.removeEventListener(o, this, !1), this.isTransitioning = !1
    }, g.prototype._removeStyles = function (a) {
        var b = {};
        for (var c in a)b[c] = "";
        this.css(b)
    };
    var t = {transitionProperty: "", transitionDuration: ""};
    return g.prototype.removeTransitionStyles = function () {
        this.css(t)
    }, g.prototype.removeElem = function () {
        this.element.parentNode.removeChild(this.element), this.css({display: ""}), this.emitEvent("remove", [this])
    }, g.prototype.remove = function () {
        if (!k || !parseFloat(this.layout.options.transitionDuration))return void this.removeElem();
        var a = this;
        this.once("transitionEnd", function () {
            a.removeElem()
        }), this.hide()
    }, g.prototype.reveal = function () {
        delete this.isHidden, this.css({display: ""});
        var a = this.layout.options, b = {}, c = this.getHideRevealTransitionEndProperty("visibleStyle");
        b[c] = this.onRevealTransitionEnd, this.transition({
            from: a.hiddenStyle,
            to: a.visibleStyle,
            isCleaning: !0,
            onTransitionEnd: b
        })
    }, g.prototype.onRevealTransitionEnd = function () {
        this.isHidden || this.emitEvent("reveal")
    }, g.prototype.getHideRevealTransitionEndProperty = function (a) {
        var b = this.layout.options[a];
        if (b.opacity)return "opacity";
        for (var c in b)return c
    }, g.prototype.hide = function () {
        this.isHidden = !0, this.css({display: ""});
        var a = this.layout.options, b = {}, c = this.getHideRevealTransitionEndProperty("hiddenStyle");
        b[c] = this.onHideTransitionEnd, this.transition({
            from: a.visibleStyle,
            to: a.hiddenStyle,
            isCleaning: !0,
            onTransitionEnd: b
        })
    }, g.prototype.onHideTransitionEnd = function () {
        this.isHidden && (this.css({display: "none"}), this.emitEvent("hide"))
    }, g.prototype.destroy = function () {
        this.css({position: "", left: "", right: "", top: "", bottom: "", transition: "", transform: ""})
    }, g
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (c, d, e, f, g) {
        return b(a, c, d, e, f, g)
    }) : "object" == typeof exports ? module.exports = b(a, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : a.Outlayer = b(a, a.eventie, a.EventEmitter, a.getSize, a.fizzyUIUtils, a.Outlayer.Item)
}(window, function (a, b, c, d, e, f) {
    "use strict";
    function g(a, b) {
        var c = e.getQueryElement(a);
        if (!c)return void(h && h.error("Bad element for " + this.constructor.namespace + ": " + (c || a)));
        this.element = c, i && (this.$element = i(this.element)), this.options = e.extend({}, this.constructor.defaults), this.option(b);
        var d = ++k;
        this.element.outlayerGUID = d, l[d] = this, this._create(), this.options.isInitLayout && this.layout()
    }

    var h = a.console, i = a.jQuery, j = function () {
    }, k = 0, l = {};
    return g.namespace = "outlayer", g.Item = f, g.defaults = {
        containerStyle: {position: "relative"},
        isInitLayout: !0,
        isOriginLeft: !0,
        isOriginTop: !0,
        isResizeBound: !0,
        isResizingContainer: !0,
        transitionDuration: "0.4s",
        hiddenStyle: {opacity: 0, transform: "scale(0.001)"},
        visibleStyle: {opacity: 1, transform: "scale(1)"}
    }, e.extend(g.prototype, c.prototype), g.prototype.option = function (a) {
        e.extend(this.options, a)
    }, g.prototype._create = function () {
        this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), e.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
    }, g.prototype.reloadItems = function () {
        this.items = this._itemize(this.element.children)
    }, g.prototype._itemize = function (a) {
        for (var b = this._filterFindItemElements(a), c = this.constructor.Item, d = [], e = 0, f = b.length; f > e; e++) {
            var g = b[e], h = new c(g, this);
            d.push(h)
        }
        return d
    }, g.prototype._filterFindItemElements = function (a) {
        return e.filterFindElements(a, this.options.itemSelector)
    }, g.prototype.getItemElements = function () {
        for (var a = [], b = 0, c = this.items.length; c > b; b++)a.push(this.items[b].element);
        return a
    }, g.prototype.layout = function () {
        this._resetLayout(), this._manageStamps();
        var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
        this.layoutItems(this.items, a), this._isLayoutInited = !0
    }, g.prototype._init = g.prototype.layout, g.prototype._resetLayout = function () {
        this.getSize()
    }, g.prototype.getSize = function () {
        this.size = d(this.element)
    }, g.prototype._getMeasurement = function (a, b) {
        var c, f = this.options[a];
        f ? ("string" == typeof f ? c = this.element.querySelector(f) : e.isElement(f) && (c = f), this[a] = c ? d(c)[b] : f) : this[a] = 0
    }, g.prototype.layoutItems = function (a, b) {
        a = this._getItemsForLayout(a), this._layoutItems(a, b), this._postLayout()
    }, g.prototype._getItemsForLayout = function (a) {
        for (var b = [], c = 0, d = a.length; d > c; c++) {
            var e = a[c];
            e.isIgnored || b.push(e)
        }
        return b
    }, g.prototype._layoutItems = function (a, b) {
        if (this._emitCompleteOnItems("layout", a), a && a.length) {
            for (var c = [], d = 0, e = a.length; e > d; d++) {
                var f = a[d], g = this._getItemLayoutPosition(f);
                g.item = f, g.isInstant = b || f.isLayoutInstant, c.push(g)
            }
            this._processLayoutQueue(c)
        }
    }, g.prototype._getItemLayoutPosition = function () {
        return {x: 0, y: 0}
    }, g.prototype._processLayoutQueue = function (a) {
        for (var b = 0, c = a.length; c > b; b++) {
            var d = a[b];
            this._positionItem(d.item, d.x, d.y, d.isInstant)
        }
    }, g.prototype._positionItem = function (a, b, c, d) {
        d ? a.goTo(b, c) : a.moveTo(b, c)
    }, g.prototype._postLayout = function () {
        this.resizeContainer()
    }, g.prototype.resizeContainer = function () {
        if (this.options.isResizingContainer) {
            var a = this._getContainerSize();
            a && (this._setContainerMeasure(a.width, !0), this._setContainerMeasure(a.height, !1))
        }
    }, g.prototype._getContainerSize = j, g.prototype._setContainerMeasure = function (a, b) {
        if (void 0 !== a) {
            var c = this.size;
            c.isBorderBox && (a += b ? c.paddingLeft + c.paddingRight + c.borderLeftWidth + c.borderRightWidth : c.paddingBottom + c.paddingTop + c.borderTopWidth + c.borderBottomWidth), a = Math.max(a, 0), this.element.style[b ? "width" : "height"] = a + "px"
        }
    }, g.prototype._emitCompleteOnItems = function (a, b) {
        function c() {
            e.dispatchEvent(a + "Complete", null, [b])
        }

        function d() {
            g++, g === f && c()
        }

        var e = this, f = b.length;
        if (!b || !f)return void c();
        for (var g = 0, h = 0, i = b.length; i > h; h++) {
            var j = b[h];
            j.once(a, d)
        }
    }, g.prototype.dispatchEvent = function (a, b, c) {
        var d = b ? [b].concat(c) : c;
        if (this.emitEvent(a, d), i)if (this.$element = this.$element || i(this.element), b) {
            var e = i.Event(b);
            e.type = a, this.$element.trigger(e, c)
        } else this.$element.trigger(a, c)
    }, g.prototype.ignore = function (a) {
        var b = this.getItem(a);
        b && (b.isIgnored = !0)
    }, g.prototype.unignore = function (a) {
        var b = this.getItem(a);
        b && delete b.isIgnored
    }, g.prototype.stamp = function (a) {
        if (a = this._find(a)) {
            this.stamps = this.stamps.concat(a);
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                this.ignore(d)
            }
        }
    }, g.prototype.unstamp = function (a) {
        if (a = this._find(a))for (var b = 0, c = a.length; c > b; b++) {
            var d = a[b];
            e.removeFrom(this.stamps, d), this.unignore(d)
        }
    }, g.prototype._find = function (a) {
        return a ? ("string" == typeof a && (a = this.element.querySelectorAll(a)), a = e.makeArray(a)) : void 0
    }, g.prototype._manageStamps = function () {
        if (this.stamps && this.stamps.length) {
            this._getBoundingRect();
            for (var a = 0, b = this.stamps.length; b > a; a++) {
                var c = this.stamps[a];
                this._manageStamp(c)
            }
        }
    }, g.prototype._getBoundingRect = function () {
        var a = this.element.getBoundingClientRect(), b = this.size;
        this._boundingRect = {
            left: a.left + b.paddingLeft + b.borderLeftWidth,
            top: a.top + b.paddingTop + b.borderTopWidth,
            right: a.right - (b.paddingRight + b.borderRightWidth),
            bottom: a.bottom - (b.paddingBottom + b.borderBottomWidth)
        }
    }, g.prototype._manageStamp = j, g.prototype._getElementOffset = function (a) {
        var b = a.getBoundingClientRect(), c = this._boundingRect, e = d(a), f = {
            left: b.left - c.left - e.marginLeft,
            top: b.top - c.top - e.marginTop,
            right: c.right - b.right - e.marginRight,
            bottom: c.bottom - b.bottom - e.marginBottom
        };
        return f
    }, g.prototype.handleEvent = function (a) {
        var b = "on" + a.type;
        this[b] && this[b](a)
    }, g.prototype.bindResize = function () {
        this.isResizeBound || (b.bind(a, "resize", this), this.isResizeBound = !0)
    }, g.prototype.unbindResize = function () {
        this.isResizeBound && b.unbind(a, "resize", this), this.isResizeBound = !1
    }, g.prototype.onresize = function () {
        function a() {
            b.resize(), delete b.resizeTimeout
        }

        this.resizeTimeout && clearTimeout(this.resizeTimeout);
        var b = this;
        this.resizeTimeout = setTimeout(a, 100)
    }, g.prototype.resize = function () {
        this.isResizeBound && this.needsResizeLayout() && this.layout()
    }, g.prototype.needsResizeLayout = function () {
        var a = d(this.element), b = this.size && a;
        return b && a.innerWidth !== this.size.innerWidth
    }, g.prototype.addItems = function (a) {
        var b = this._itemize(a);
        return b.length && (this.items = this.items.concat(b)), b
    }, g.prototype.appended = function (a) {
        var b = this.addItems(a);
        b.length && (this.layoutItems(b, !0), this.reveal(b))
    }, g.prototype.prepended = function (a) {
        var b = this._itemize(a);
        if (b.length) {
            var c = this.items.slice(0);
            this.items = b.concat(c), this._resetLayout(), this._manageStamps(), this.layoutItems(b, !0), this.reveal(b), this.layoutItems(c)
        }
    }, g.prototype.reveal = function (a) {
        this._emitCompleteOnItems("reveal", a);
        for (var b = a && a.length, c = 0; b && b > c; c++) {
            var d = a[c];
            d.reveal()
        }
    }, g.prototype.hide = function (a) {
        this._emitCompleteOnItems("hide", a);
        for (var b = a && a.length, c = 0; b && b > c; c++) {
            var d = a[c];
            d.hide()
        }
    }, g.prototype.revealItemElements = function (a) {
        var b = this.getItems(a);
        this.reveal(b)
    }, g.prototype.hideItemElements = function (a) {
        var b = this.getItems(a);
        this.hide(b)
    }, g.prototype.getItem = function (a) {
        for (var b = 0, c = this.items.length; c > b; b++) {
            var d = this.items[b];
            if (d.element === a)return d
        }
    }, g.prototype.getItems = function (a) {
        a = e.makeArray(a);
        for (var b = [], c = 0, d = a.length; d > c; c++) {
            var f = a[c], g = this.getItem(f);
            g && b.push(g)
        }
        return b
    }, g.prototype.remove = function (a) {
        var b = this.getItems(a);
        if (this._emitCompleteOnItems("remove", b), b && b.length)for (var c = 0, d = b.length; d > c; c++) {
            var f = b[c];
            f.remove(), e.removeFrom(this.items, f)
        }
    }, g.prototype.destroy = function () {
        var a = this.element.style;
        a.height = "", a.position = "", a.width = "";
        for (var b = 0, c = this.items.length; c > b; b++) {
            var d = this.items[b];
            d.destroy()
        }
        this.unbindResize();
        var e = this.element.outlayerGUID;
        delete l[e], delete this.element.outlayerGUID, i && i.removeData(this.element, this.constructor.namespace)
    }, g.data = function (a) {
        a = e.getQueryElement(a);
        var b = a && a.outlayerGUID;
        return b && l[b]
    }, g.create = function (a, b) {
        function c() {
            g.apply(this, arguments)
        }

        return Object.create ? c.prototype = Object.create(g.prototype) : e.extend(c.prototype, g.prototype), c.prototype.constructor = c, c.defaults = e.extend({}, g.defaults), e.extend(c.defaults, b), c.prototype.settings = {}, c.namespace = a, c.data = g.data, c.Item = function () {
            f.apply(this, arguments)
        }, c.Item.prototype = new f, e.htmlInit(c, a), i && i.bridget && i.bridget(a, c), c
    }, g.Item = f, g
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.Item = b(a.Outlayer))
}(window, function (a) {
    "use strict";
    function b() {
        a.Item.apply(this, arguments)
    }

    b.prototype = new a.Item, b.prototype._create = function () {
        this.id = this.layout.itemGUID++, a.Item.prototype._create.call(this), this.sortData = {}
    }, b.prototype.updateSortData = function () {
        if (!this.isIgnored) {
            this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
            var a = this.layout.options.getSortData, b = this.layout._sorters;
            for (var c in a) {
                var d = b[c];
                this.sortData[c] = d(this.element, this)
            }
        }
    };
    var c = b.prototype.destroy;
    return b.prototype.destroy = function () {
        c.apply(this, arguments), this.css({display: ""})
    }, b
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("get-size"), require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.LayoutMode = b(a.getSize, a.Outlayer))
}(window, function (a, b) {
    "use strict";
    function c(a) {
        this.isotope = a, a && (this.options = a.options[this.namespace], this.element = a.element, this.items = a.filteredItems, this.size = a.size)
    }

    return function () {
        function a(a) {
            return function () {
                return b.prototype[a].apply(this.isotope, arguments)
            }
        }

        for (var d = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], e = 0, f = d.length; f > e; e++) {
            var g = d[e];
            c.prototype[g] = a(g)
        }
    }(), c.prototype.needsVerticalResizeLayout = function () {
        var b = a(this.isotope.element), c = this.isotope.size && b;
        return c && b.innerHeight != this.isotope.size.innerHeight
    }, c.prototype._getMeasurement = function () {
        this.isotope._getMeasurement.apply(this, arguments)
    }, c.prototype.getColumnWidth = function () {
        this.getSegmentSize("column", "Width")
    }, c.prototype.getRowHeight = function () {
        this.getSegmentSize("row", "Height")
    }, c.prototype.getSegmentSize = function (a, b) {
        var c = a + b, d = "outer" + b;
        if (this._getMeasurement(c, d), !this[c]) {
            var e = this.getFirstItemSize();
            this[c] = e && e[d] || this.isotope.size["inner" + b]
        }
    }, c.prototype.getFirstItemSize = function () {
        var b = this.isotope.filteredItems[0];
        return b && b.element && a(b.element)
    }, c.prototype.layout = function () {
        this.isotope.layout.apply(this.isotope, arguments)
    }, c.prototype.getSize = function () {
        this.isotope.getSize(), this.size = this.isotope.size
    }, c.modes = {}, c.create = function (a, b) {
        function d() {
            c.apply(this, arguments)
        }

        return d.prototype = new c, b && (d.options = b), d.prototype.namespace = a, c.modes[a] = d, d
    }, c
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], b) : "object" == typeof exports ? module.exports = b(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : a.Masonry = b(a.Outlayer, a.getSize, a.fizzyUIUtils)
}(window, function (a, b, c) {
    var d = a.create("masonry");
    return d.prototype._resetLayout = function () {
        this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
        var a = this.cols;
        for (this.colYs = []; a--;)this.colYs.push(0);
        this.maxY = 0
    }, d.prototype.measureColumns = function () {
        if (this.getContainerWidth(), !this.columnWidth) {
            var a = this.items[0], c = a && a.element;
            this.columnWidth = c && b(c).outerWidth || this.containerWidth
        }
        var d = this.columnWidth += this.gutter, e = this.containerWidth + this.gutter, f = e / d, g = d - e % d,
            h = g && 1 > g ? "round" : "floor";
        f = Math[h](f), this.cols = Math.max(f, 1)
    }, d.prototype.getContainerWidth = function () {
        var a = this.options.isFitWidth ? this.element.parentNode : this.element, c = b(a);
        this.containerWidth = c && c.innerWidth
    }, d.prototype._getItemLayoutPosition = function (a) {
        a.getSize();
        var b = a.size.outerWidth % this.columnWidth, d = b && 1 > b ? "round" : "ceil",
            e = Math[d](a.size.outerWidth / this.columnWidth);
        e = Math.min(e, this.cols);
        for (var f = this._getColGroup(e), g = Math.min.apply(Math, f), h = c.indexOf(f, g), i = {
            x: this.columnWidth * h,
            y: g
        }, j = g + a.size.outerHeight, k = this.cols + 1 - f.length, l = 0; k > l; l++)this.colYs[h + l] = j;
        return i
    }, d.prototype._getColGroup = function (a) {
        if (2 > a)return this.colYs;
        for (var b = [], c = this.cols + 1 - a, d = 0; c > d; d++) {
            var e = this.colYs.slice(d, d + a);
            b[d] = Math.max.apply(Math, e)
        }
        return b
    }, d.prototype._manageStamp = function (a) {
        var c = b(a), d = this._getElementOffset(a), e = this.options.isOriginLeft ? d.left : d.right,
            f = e + c.outerWidth, g = Math.floor(e / this.columnWidth);
        g = Math.max(0, g);
        var h = Math.floor(f / this.columnWidth);
        h -= f % this.columnWidth ? 0 : 1, h = Math.min(this.cols - 1, h);
        for (var i = (this.options.isOriginTop ? d.top : d.bottom) + c.outerHeight, j = g; h >= j; j++)this.colYs[j] = Math.max(i, this.colYs[j])
    }, d.prototype._getContainerSize = function () {
        this.maxY = Math.max.apply(Math, this.colYs);
        var a = {height: this.maxY};
        return this.options.isFitWidth && (a.width = this._getContainerFitWidth()), a
    }, d.prototype._getContainerFitWidth = function () {
        for (var a = 0, b = this.cols; --b && 0 === this.colYs[b];)a++;
        return (this.cols - a) * this.columnWidth - this.gutter
    }, d.prototype.needsResizeLayout = function () {
        var a = this.containerWidth;
        return this.getContainerWidth(), a !== this.containerWidth
    }, d
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode"), require("masonry-layout")) : b(a.Isotope.LayoutMode, a.Masonry)
}(window, function (a, b) {
    "use strict";
    function c(a, b) {
        for (var c in b)a[c] = b[c];
        return a
    }

    var d = a.create("masonry"), e = d.prototype._getElementOffset, f = d.prototype.layout,
        g = d.prototype._getMeasurement;
    c(d.prototype, b.prototype), d.prototype._getElementOffset = e, d.prototype.layout = f, d.prototype._getMeasurement = g;
    var h = d.prototype.measureColumns;
    d.prototype.measureColumns = function () {
        this.items = this.isotope.filteredItems, h.call(this)
    };
    var i = d.prototype._manageStamp;
    return d.prototype._manageStamp = function () {
        this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, i.apply(this, arguments)
    }, d
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
}(window, function (a) {
    "use strict";
    var b = a.create("fitRows");
    return b.prototype._resetLayout = function () {
        this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
    }, b.prototype._getItemLayoutPosition = function (a) {
        a.getSize();
        var b = a.size.outerWidth + this.gutter, c = this.isotope.size.innerWidth + this.gutter;
        0 !== this.x && b + this.x > c && (this.x = 0, this.y = this.maxY);
        var d = {x: this.x, y: this.y};
        return this.maxY = Math.max(this.maxY, this.y + a.size.outerHeight), this.x += b, d
    }, b.prototype._getContainerSize = function () {
        return {height: this.maxY}
    }, b
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
}(window, function (a) {
    "use strict";
    var b = a.create("vertical", {horizontalAlignment: 0});
    return b.prototype._resetLayout = function () {
        this.y = 0
    }, b.prototype._getItemLayoutPosition = function (a) {
        a.getSize();
        var b = (this.isotope.size.innerWidth - a.size.outerWidth) * this.options.horizontalAlignment, c = this.y;
        return this.y += a.size.outerHeight, {x: b, y: c}
    }, b.prototype._getContainerSize = function () {
        return {height: this.y}
    }, b
}), function (a, b) {
    "use strict";
    "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], function (c, d, e, f, g, h) {
        return b(a, c, d, e, f, g, h)
    }) : "object" == typeof exports ? module.exports = b(a, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("./item"), require("./layout-mode"), require("./layout-modes/masonry"), require("./layout-modes/fit-rows"), require("./layout-modes/vertical")) : a.Isotope = b(a, a.Outlayer, a.getSize, a.matchesSelector, a.fizzyUIUtils, a.Isotope.Item, a.Isotope.LayoutMode)
}(window, function (a, b, c, d, e, f, g) {
    function h(a, b) {
        return function (c, d) {
            for (var e = 0, f = a.length; f > e; e++) {
                var g = a[e], h = c.sortData[g], i = d.sortData[g];
                if (h > i || i > h) {
                    var j = void 0 !== b[g] ? b[g] : b, k = j ? 1 : -1;
                    return (h > i ? 1 : -1) * k
                }
            }
            return 0
        }
    }

    var i = a.jQuery, j = String.prototype.trim ? function (a) {
        return a.trim()
    } : function (a) {
        return a.replace(/^\s+|\s+$/g, "")
    }, k = document.documentElement, l = k.textContent ? function (a) {
        return a.textContent
    } : function (a) {
        return a.innerText
    }, m = b.create("isotope", {layoutMode: "masonry", isJQueryFiltering: !0, sortAscending: !0});
    m.Item = f, m.LayoutMode = g, m.prototype._create = function () {
        this.itemGUID = 0, this._sorters = {}, this._getSorters(), b.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
        for (var a in g.modes)this._initLayoutMode(a)
    }, m.prototype.reloadItems = function () {
        this.itemGUID = 0, b.prototype.reloadItems.call(this)
    }, m.prototype._itemize = function () {
        for (var a = b.prototype._itemize.apply(this, arguments), c = 0, d = a.length; d > c; c++) {
            var e = a[c];
            e.id = this.itemGUID++
        }
        return this._updateItemsSortData(a), a
    }, m.prototype._initLayoutMode = function (a) {
        var b = g.modes[a], c = this.options[a] || {};
        this.options[a] = b.options ? e.extend(b.options, c) : c, this.modes[a] = new b(this)
    }, m.prototype.layout = function () {
        return !this._isLayoutInited && this.options.isInitLayout ? void this.arrange() : void this._layout()
    }, m.prototype._layout = function () {
        var a = this._getIsInstant();
        this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, a), this._isLayoutInited = !0
    }, m.prototype.arrange = function (a) {
        function b() {
            d.reveal(c.needReveal), d.hide(c.needHide)
        }

        this.option(a), this._getIsInstant();
        var c = this._filter(this.items);
        this.filteredItems = c.matches;
        var d = this;
        this._bindArrangeComplete(), this._isInstant ? this._noTransition(b) : b(), this._sort(), this._layout()
    }, m.prototype._init = m.prototype.arrange, m.prototype._getIsInstant = function () {
        var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
        return this._isInstant = a, a
    }, m.prototype._bindArrangeComplete = function () {
        function a() {
            b && c && d && e.dispatchEvent("arrangeComplete", null, [e.filteredItems])
        }

        var b, c, d, e = this;
        this.once("layoutComplete", function () {
            b = !0, a()
        }), this.once("hideComplete", function () {
            c = !0, a()
        }), this.once("revealComplete", function () {
            d = !0, a()
        })
    }, m.prototype._filter = function (a) {
        var b = this.options.filter;
        b = b || "*";
        for (var c = [], d = [], e = [], f = this._getFilterTest(b), g = 0, h = a.length; h > g; g++) {
            var i = a[g];
            if (!i.isIgnored) {
                var j = f(i);
                j && c.push(i), j && i.isHidden ? d.push(i) : j || i.isHidden || e.push(i)
            }
        }
        return {matches: c, needReveal: d, needHide: e}
    }, m.prototype._getFilterTest = function (a) {
        return i && this.options.isJQueryFiltering ? function (b) {
            return i(b.element).is(a)
        } : "function" == typeof a ? function (b) {
            return a(b.element)
        } : function (b) {
            return d(b.element, a)
        }
    }, m.prototype.updateSortData = function (a) {
        var b;
        a ? (a = e.makeArray(a), b = this.getItems(a)) : b = this.items, this._getSorters(), this._updateItemsSortData(b)
    }, m.prototype._getSorters = function () {
        var a = this.options.getSortData;
        for (var b in a) {
            var c = a[b];
            this._sorters[b] = n(c)
        }
    }, m.prototype._updateItemsSortData = function (a) {
        for (var b = a && a.length, c = 0; b && b > c; c++) {
            var d = a[c];
            d.updateSortData()
        }
    };
    var n = function () {
        function a(a) {
            if ("string" != typeof a)return a;
            var c = j(a).split(" "), d = c[0], e = d.match(/^\[(.+)\]$/), f = e && e[1], g = b(f, d),
                h = m.sortDataParsers[c[1]];
            return a = h ? function (a) {
                return a && h(g(a))
            } : function (a) {
                return a && g(a)
            }
        }

        function b(a, b) {
            var c;
            return c = a ? function (b) {
                return b.getAttribute(a)
            } : function (a) {
                var c = a.querySelector(b);
                return c && l(c)
            }
        }

        return a
    }();
    m.sortDataParsers = {
        parseInt: function (a) {
            return parseInt(a, 10)
        }, parseFloat: function (a) {
            return parseFloat(a)
        }
    }, m.prototype._sort = function () {
        var a = this.options.sortBy;
        if (a) {
            var b = [].concat.apply(a, this.sortHistory), c = h(b, this.options.sortAscending);
            this.filteredItems.sort(c), a != this.sortHistory[0] && this.sortHistory.unshift(a)
        }
    }, m.prototype._mode = function () {
        var a = this.options.layoutMode, b = this.modes[a];
        if (!b)throw new Error("No layout mode: " + a);
        return b.options = this.options[a], b
    }, m.prototype._resetLayout = function () {
        b.prototype._resetLayout.call(this), this._mode()._resetLayout()
    }, m.prototype._getItemLayoutPosition = function (a) {
        return this._mode()._getItemLayoutPosition(a)
    }, m.prototype._manageStamp = function (a) {
        this._mode()._manageStamp(a)
    }, m.prototype._getContainerSize = function () {
        return this._mode()._getContainerSize()
    }, m.prototype.needsResizeLayout = function () {
        return this._mode().needsResizeLayout()
    }, m.prototype.appended = function (a) {
        var b = this.addItems(a);
        if (b.length) {
            var c = this._filterRevealAdded(b);
            this.filteredItems = this.filteredItems.concat(c)
        }
    }, m.prototype.prepended = function (a) {
        var b = this._itemize(a);
        if (b.length) {
            this._resetLayout(), this._manageStamps();
            var c = this._filterRevealAdded(b);
            this.layoutItems(this.filteredItems), this.filteredItems = c.concat(this.filteredItems), this.items = b.concat(this.items)
        }
    }, m.prototype._filterRevealAdded = function (a) {
        var b = this._filter(a);
        return this.hide(b.needHide), this.reveal(b.matches), this.layoutItems(b.matches, !0), b.matches
    }, m.prototype.insert = function (a) {
        var b = this.addItems(a);
        if (b.length) {
            var c, d, e = b.length;
            for (c = 0; e > c; c++)d = b[c], this.element.appendChild(d.element);
            var f = this._filter(b).matches;
            for (c = 0; e > c; c++)b[c].isLayoutInstant = !0;
            for (this.arrange(), c = 0; e > c; c++)delete b[c].isLayoutInstant;
            this.reveal(f)
        }
    };
    var o = m.prototype.remove;
    return m.prototype.remove = function (a) {
        a = e.makeArray(a);
        var b = this.getItems(a);
        o.call(this, a);
        var c = b && b.length;
        if (c)for (var d = 0; c > d; d++) {
            var f = b[d];
            e.removeFrom(this.filteredItems, f)
        }
    }, m.prototype.shuffle = function () {
        for (var a = 0, b = this.items.length; b > a; a++) {
            var c = this.items[a];
            c.sortData.random = Math.random()
        }
        this.options.sortBy = "random", this._sort(), this._layout()
    }, m.prototype._noTransition = function (a) {
        var b = this.options.transitionDuration;
        this.options.transitionDuration = 0;
        var c = a.call(this);
        return this.options.transitionDuration = b, c
    }, m.prototype.getFilteredItemElements = function () {
        for (var a = [], b = 0, c = this.filteredItems.length; c > b; b++)a.push(this.filteredItems[b].element);
        return a
    }, m
});

/*!
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @version 4.2.8
 *
 * File input styled for Bootstrap 3.0 that utilizes HTML5 File Input's advanced
 * features including the FileReader API.
 *
 * The plugin drastically enhances the HTML file input to preview multiple files on the client before
 * upload. In addition it provides the ability to preview content of images, text, videos, audio, html,
 * flash and other objects. It also offers the ability to upload and delete files using AJAX, and add
 * files in batches (i.e. preview, append, or remove before upload).
 *
 * Author: Kartik Visweswaran
 * Copyright: 2015, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
!function (e) {
    "use strict";
    e.fn.fileinputLocales = {};
    var i, t, a, r, n, l, o, s, d, c, p, u, f, v, g, m, h, w, b, C, x, y, T, F, I, E, k, S, $, P, D, U, A, j, L, z, O,
        R, M, B, N, Z, H, W, _, q, V, K, X, J, Q, Y;
    i = function (e) {
        if ("Microsoft Internet Explorer" !== navigator.appName)return !1;
        if (10 === e)return new RegExp("msie\\s" + e, "i").test(navigator.userAgent);
        var i, t = document.createElement("div");
        return t.innerHTML = "<!--[if IE " + e + "]> <i></i> <![endif]-->", i = t.getElementsByTagName("i").length, document.body.appendChild(t), t.parentNode.removeChild(t), i
    }, t = function () {
        return new RegExp("Edge/[0-9]+", "i").test(navigator.userAgent)
    }, a = function (e, i, t, a) {
        var r = a ? i : i + ".fileinput";
        e.off(r).on(r, t)
    }, r = {
        data: {}, init: function (e) {
            var i = e.initialPreview, t = e.id;
            i.length > 0 && !_(i) && (i = i.split(e.initialPreviewDelimiter)), r.data[t] = {
                content: i,
                config: e.initialPreviewConfig,
                tags: e.initialPreviewThumbTags,
                delimiter: e.initialPreviewDelimiter,
                template: e.previewGenericTemplate,
                msg: function (i) {
                    return e.getMsgSelected(i)
                },
                initId: e.previewInitId,
                footer: e.getLayoutTemplate("footer").replace(/\{progress}/g, e.renderThumbProgress()),
                isDelete: e.initialPreviewShowDelete,
                caption: e.initialCaption,
                actions: function (i, t, a, r, n) {
                    return e.renderFileActions(i, t, a, r, n)
                }
            }
        }, fetch: function (e) {
            return r.data[e].content.filter(function (e) {
                return null !== e
            })
        }, count: function (e, i) {
            return r.data[e] && r.data[e].content ? i ? r.data[e].content.length : r.fetch(e).length : 0
        }, get: function (i, t, a) {
            var n, l, o = "init_" + t, s = r.data[i], d = s.config[t], c = s.initId + "-" + o,
                p = " file-preview-initial";
            return a = void 0 === a ? !0 : a, null === s.content[t] ? "" : (W(d) || W(d.frameClass) || (p += " " + d.frameClass), n = s.template.replace(/\{previewId}/g, c).replace(/\{frameClass}/g, p).replace(/\{fileindex}/g, o).replace(/\{content}/g, s.content[t]).replace(/\{footer}/g, r.footer(i, t, a)), s.tags.length && s.tags[t] && (n = J(n, s.tags[t])), W(d) || W(d.frameAttr) || (l = e(document.createElement("div")).html(n), l.find(".file-preview-initial").attr(d.frameAttr), n = l.html(), l.remove()), n)
        }, add: function (i, t, a, n, l) {
            var o, s = e.extend(!0, {}, r.data[i]);
            return _(t) || (t = t.split(s.delimiter)), l ? (o = s.content.push(t) - 1, s.config[o] = a, s.tags[o] = n) : (o = t.length, s.content = t, s.config = a, s.tags = n), r.data[i] = s, o
        }, set: function (i, t, a, n, l) {
            var o, s, d = e.extend(!0, {}, r.data[i]);
            if (t && t.length && (_(t) || (t = t.split(d.delimiter)), s = t.filter(function (e) {
                    return null !== e
                }), s.length)) {
                if (void 0 === d.content && (d.content = []), void 0 === d.config && (d.config = []), void 0 === d.tags && (d.tags = []), l) {
                    for (o = 0; o < t.length; o++)t[o] && d.content.push(t[o]);
                    for (o = 0; o < a.length; o++)a[o] && d.config.push(a[o]);
                    for (o = 0; o < n.length; o++)n[o] && d.tags.push(n[o])
                } else d.content = t, d.config = a, d.tags = n;
                r.data[i] = d
            }
        }, unset: function (e, i) {
            var t = r.count(e);
            if (t) {
                if (1 === t)return r.data[e].content = [], void(r.data[e].config = []);
                r.data[e].content[i] = null, r.data[e].config[i] = null
            }
        }, out: function (e) {
            var i, t = "", a = r.data[e], n = r.count(e, !0);
            if (0 === n)return {content: "", caption: ""};
            for (var l = 0; n > l; l++)t += r.get(e, l);
            return i = a.msg(r.count(e)), {content: t, caption: i}
        }, footer: function (e, i, t) {
            var a = r.data[e];
            if (t = void 0 === t ? !0 : t, 0 === a.config.length || W(a.config[i]))return "";
            var n = a.config[i], l = q("caption", n) ? n.caption : "", o = q("width", n) ? n.width : "auto",
                s = q("url", n) ? n.url : !1, d = q("key", n) ? n.key : null, c = s === !1 && t,
                p = a.isDelete ? a.actions(!1, !0, c, s, d) : "", u = a.footer.replace(/\{actions}/g, p);
            return u.replace(/\{caption}/g, l).replace(/\{width}/g, o).replace(/\{indicator}/g, "").replace(/\{indicatorTitle}/g, "")
        }
    }, n = function (e, i) {
        return i = i || 0, "number" == typeof e ? e : ("string" == typeof e && (e = parseFloat(e)), isNaN(e) ? i : e)
    }, l = function () {
        return window.File && window.FileReader
    }, o = function () {
        var e = document.createElement("div");
        return !i(9) && !t() && (void 0 !== e.draggable || void 0 !== e.ondragstart && void 0 !== e.ondrop)
    }, s = function () {
        return l() && window.FormData
    }, d = function (e, i) {
        e.removeClass(i).addClass(i)
    }, c = 'style="width:{width};height:{height};"', p = '      <param name="controller" value="true" />\n      <param name="allowFullScreen" value="true" />\n      <param name="allowScriptAccess" value="always" />\n      <param name="autoPlay" value="false" />\n      <param name="autoStart" value="false" />\n      <param name="quality" value="high" />\n', u = '<div class="file-preview-other">\n   <span class="{previewFileIconClass}">{previewFileIcon}</span>\n</div>', f = {
        removeIcon: '<i class="glyphicon glyphicon-trash text-danger"></i>',
        removeClass: "btn btn-xs btn-default",
        removeTitle: "Remove file",
        uploadIcon: '<i class="glyphicon glyphicon-upload text-info"></i>',
        uploadClass: "btn btn-xs btn-default",
        uploadTitle: "Upload file",
        indicatorNew: '<i class="glyphicon glyphicon-hand-down text-warning"></i>',
        indicatorSuccess: '<i class="glyphicon glyphicon-ok-sign text-success"></i>',
        indicatorError: '<i class="glyphicon glyphicon-exclamation-sign text-danger"></i>',
        indicatorLoading: '<i class="glyphicon glyphicon-hand-up text-muted"></i>',
        indicatorNewTitle: "Not uploaded yet",
        indicatorSuccessTitle: "Uploaded",
        indicatorErrorTitle: "Upload Error",
        indicatorLoadingTitle: "Uploading ..."
    }, v = '{preview}\n<div class="kv-upload-progress hide"></div>\n<div class="input-group {class}">\n   {caption}\n   <div class="input-group-btn">\n       {remove}\n       {cancel}\n       {upload}\n       {browse}\n   </div>\n</div>', g = '{preview}\n<div class="kv-upload-progress hide"></div>\n{remove}\n{cancel}\n{upload}\n{browse}\n', m = '<div class="file-preview {class}">\n    {close}    <div class="{dropClass}">\n    <div class="file-preview-thumbnails">\n    </div>\n    <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>\n    <div class="kv-fileinput-error"></div>\n    </div>\n</div>', w = '<div class="close fileinput-remove">&times;</div>\n', h = '<span class="glyphicon glyphicon-file kv-caption-icon"></span>', b = '<div tabindex="500" class="form-control file-caption {class}">\n   <div class="file-caption-name"></div>\n</div>\n', C = '<button type="{type}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</button>', x = '<a href="{href}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</a>', y = '<div tabindex="500" class="{css}"{status}>{icon}{label}</div>', T = '<div id="{id}" class="file-preview-detail-modal modal fade" tabindex="-1">\n  <div class="modal-dialog modal-lg">\n    <div class="modal-content">\n      <div class="modal-header">\n        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\n        <h3 class="modal-title">{heading} <small>{title}</small></h3>\n      </div>\n      <div class="modal-body">\n           <pre>{body}</pre>\n      </div>\n    </div>\n  </div>\n</div>', F = '<div class="progress">\n    <div class="{class}" role="progressbar" aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100" style="width:{percent}%;">\n        {percent}%\n     </div>\n</div>', I = '<div class="file-thumbnail-footer">\n    <div class="file-footer-caption" title="{caption}">{caption}</div>\n    {progress} {actions}\n</div>', E = '<div class="file-actions">\n    <div class="file-footer-buttons">\n        {upload}{delete}{other}    </div>\n    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n    <div class="clearfix"></div>\n</div>', k = '<button type="button" class="kv-file-remove {removeClass}" title="{removeTitle}"{dataUrl}{dataKey}>{removeIcon}</button>\n', S = '<button type="button" class="kv-file-upload {uploadClass}" title="{uploadTitle}">   {uploadIcon}\n</button>\n', $ = '<button type="button" class="btn btn-default btn-xs btn-block" title="{zoomTitle}: {caption}" onclick="{dialog}">\n   {zoomInd}\n</button>\n', P = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">\n   {content}\n   {footer}\n</div>\n', D = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">\n    <object class="file-object" data="{data}" type="{type}" width="{width}" height="{height}">\n       ' + u + "\n    </object>\n   {footer}\n</div>", U = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">\n   <img src="{data}" class="file-preview-image" title="{caption}" alt="{caption}" ' + c + ">\n   {footer}\n</div>\n", A = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">\n   <pre class="file-preview-text" title="{caption}" ' + c + ">{data}</pre>\n   {zoom}\n   {footer}\n</div>", j = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}" title="{caption}" ' + c + '>\n   <video width="{width}" height="{height}" controls>\n       <source src="{data}" type="{type}">\n       ' + u + "\n   </video>\n   {footer}\n</div>\n", L = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}" title="{caption}" ' + c + '>\n   <audio controls>\n       <source src="{data}" type="{type}">\n       ' + u + "\n   </audio>\n   {footer}\n</div>", z = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}" title="{caption}" ' + c + '>\n   <object class="file-object" type="application/x-shockwave-flash" width="{width}" height="{height}" data="{data}">\n' + p + "       " + u + "\n   </object>\n   {footer}\n</div>\n", O = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}" title="{caption}" ' + c + '>\n   <object class="file-object" data="{data}" type="{type}" width="{width}" height="{height}">\n       <param name="movie" value="{caption}" />\n' + p + "         " + u + "\n   </object>\n   {footer}\n</div>", R = '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}" title="{caption}" ' + c + '>\n   <div class="file-preview-other-frame">\n   ' + u + '\n   </div>\n   <div class="file-preview-other-footer">{footer}</div>\n</div>', M = {
        main1: v,
        main2: g,
        preview: m,
        close: w,
        zoom: $,
        icon: h,
        caption: b,
        modal: T,
        progress: F,
        footer: I,
        actions: E,
        actionDelete: k,
        actionUpload: S,
        btnDefault: C,
        btnLink: x,
        btnBrowse: y
    }, B = {
        generic: P,
        html: D,
        image: U,
        text: A,
        video: j,
        audio: L,
        flash: z,
        object: O,
        other: R
    }, N = ["image", "html", "text", "video", "audio", "flash", "object"], Z = {
        image: {width: "auto", height: "160px"},
        html: {width: "213px", height: "160px"},
        text: {width: "160px", height: "136px"},
        video: {width: "213px", height: "160px"},
        audio: {width: "213px", height: "80px"},
        flash: {width: "213px", height: "160px"},
        object: {width: "160px", height: "160px"},
        other: {width: "160px", height: "160px"}
    }, H = {
        image: function (e, i) {
            return void 0 !== e ? e.match("image.*") : i.match(/\.(gif|png|jpe?g)$/i)
        }, html: function (e, i) {
            return void 0 !== e ? "text/html" === e : i.match(/\.(htm|html)$/i)
        }, text: function (e, i) {
            return void 0 !== e && e.match("text.*") || i.match(/\.(txt|md|csv|nfo|ini|json|php|js|css)$/i)
        }, video: function (e, i) {
            return void 0 !== e && e.match(/\.video\/(ogg|mp4|webm|3gp)$/i) || i.match(/\.(og?|mp4|webm|3gp)$/i)
        }, audio: function (e, i) {
            return void 0 !== e && e.match(/\.audio\/(ogg|mp3|wav)$/i) || i.match(/\.(ogg|mp3|wav)$/i)
        }, flash: function (e, i) {
            return void 0 !== e && "application/x-shockwave-flash" === e || i.match(/\.(swf)$/i)
        }, object: function () {
            return !0
        }, other: function () {
            return !0
        }
    }, W = function (i, t) {
        return void 0 === i || null === i || 0 === i.length || t && "" === e.trim(i)
    }, _ = function (e) {
        return Array.isArray(e) || "[object Array]" === Object.prototype.toString.call(e)
    }, q = function (e, i) {
        return "object" == typeof i && e in i
    }, V = function (i, t, a) {
        return W(i) || W(i[t]) ? a : e(i[t])
    }, K = function () {
        return Math.round((new Date).getTime() + 100 * Math.random())
    }, X = function (e) {
        return e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;")
    }, J = function (i, t) {
        var a = i;
        return t ? (e.each(t, function (e, i) {
            "function" == typeof i && (i = i()), a = a.split(e).join(i)
        }), a) : a
    }, Q = window.URL || window.webkitURL, Y = function (t, a) {
        var r = this;
        r.$element = e(t), r.validate() && (r.isPreviewable = l(), r.isIE9 = i(9), r.isIE10 = i(10), r.isPreviewable || r.isIE9 ? (r.init(a), r.listen()) : r.$element.removeClass("file-loading"))
    }, Y.prototype = {
        constructor: Y, validate: function () {
            var e, i = this;
            return "file" === i.$element.attr("type") ? !0 : (e = '<div class="help-block alert alert-warning"><h4>Invalid Input Type</h4>You must set an input <code>type = file</code> for <b>bootstrap-fileinput</b> plugin to initialize.</div>', i.$element.after(e), !1)
        }, init: function (i) {
            var t, a = this, l = a.$element;
            e.each(i, function (e, i) {
                switch (e) {
                    case"minFileCount":
                    case"maxFileCount":
                    case"maxFileSize":
                        a[e] = n(i);
                        break;
                    default:
                        a[e] = i
                }
            }), a.fileInputCleared = !1, a.fileBatchCompleted = !0, a.isPreviewable || (a.showPreview = !1), a.uploadFileAttr = W(l.attr("name")) ? "file_data" : l.attr("name"), a.reader = null, a.formdata = {}, a.clearStack(), a.uploadCount = 0, a.uploadStatus = {}, a.uploadLog = [], a.uploadAsyncCount = 0, a.loadedImages = [], a.totalImagesCount = 0, a.ajaxRequests = [], a.isError = !1, a.ajaxAborted = !1, a.cancelling = !1, t = a.getLayoutTemplate("progress"), a.progressTemplate = t.replace("{class}", a.progressClass), a.progressCompleteTemplate = t.replace("{class}", a.progressCompleteClass), a.dropZoneEnabled = o() && a.dropZoneEnabled, a.isDisabled = a.$element.attr("disabled") || a.$element.attr("readonly"), a.isUploadable = s() && !W(a.uploadUrl), a.slug = "function" == typeof i.slugCallback ? i.slugCallback : a.slugDefault, a.mainTemplate = a.getLayoutTemplate(a.showCaption ? "main1" : "main2"), a.captionTemplate = a.getLayoutTemplate("caption"), a.previewGenericTemplate = a.getPreviewTemplate("generic"), a.resizeImage && (a.maxImageWidth || a.maxImageHeight) && (a.imageCanvas = document.createElement("canvas"), a.imageCanvasContext = a.imageCanvas.getContext("2d")), W(a.$element.attr("id")) && a.$element.attr("id", K()), void 0 === a.$container ? a.$container = a.createContainer() : a.refreshContainer(), a.$progress = a.$container.find(".kv-upload-progress"), a.$btnUpload = a.$container.find(".fileinput-upload"), a.$captionContainer = V(i, "elCaptionContainer", a.$container.find(".file-caption")), a.$caption = V(i, "elCaptionText", a.$container.find(".file-caption-name")), a.$previewContainer = V(i, "elPreviewContainer", a.$container.find(".file-preview")), a.$preview = V(i, "elPreviewImage", a.$container.find(".file-preview-thumbnails")), a.$previewStatus = V(i, "elPreviewStatus", a.$container.find(".file-preview-status")), a.$errorContainer = V(i, "elErrorContainer", a.$previewContainer.find(".kv-fileinput-error")), W(a.msgErrorClass) || d(a.$errorContainer, a.msgErrorClass), a.$errorContainer.hide(), a.fileActionSettings = e.extend(f, i.fileActionSettings), a.previewInitId = "preview-" + K(), a.id = a.$element.attr("id"), r.init(a), a.initPreview(!0), a.initPreviewDeletes(), a.options = i, a.setFileDropZoneTitle(), a.$element.removeClass("file-loading"), a.$element.attr("disabled") && a.disable()
        }, parseError: function (i, t, a) {
            var r = this, n = e.trim(t + ""), l = "." === n.slice(-1) ? "" : ".",
                o = void 0 !== i.responseJSON && void 0 !== i.responseJSON.error ? i.responseJSON.error : i.responseText;
            return r.cancelling && r.msgUploadAborted && (n = r.msgUploadAborted), r.showAjaxErrorDetails && o ? (o = e.trim(o.replace(/\n\s*\n/g, "\n")), o = o.length > 0 ? "<pre>" + o + "</pre>" : "", n += l + o) : n += l, r.cancelling = !1, a ? "<b>" + a + ": </b>" + n : n
        }, raise: function (i, t) {
            var a = this, r = e.Event(i);
            if (void 0 !== t ? a.$element.trigger(r, t) : a.$element.trigger(r), r.isDefaultPrevented())return !1;
            if (!r.result)return r.result;
            switch (i) {
                case"filebatchuploadcomplete":
                case"filebatchuploadsuccess":
                case"fileuploaded":
                case"fileclear":
                case"filecleared":
                case"filereset":
                case"fileerror":
                case"filefoldererror":
                case"fileuploaderror":
                case"filebatchuploaderror":
                case"filedeleteerror":
                case"filecustomerror":
                case"filesuccessremove":
                    break;
                default:
                    a.ajaxAborted = r.result
            }
            return !0
        }, getLayoutTemplate: function (e) {
            var i = this, t = q(e, i.layoutTemplates) ? i.layoutTemplates[e] : M[e];
            return W(i.customLayoutTags) ? t : J(t, i.customLayoutTags)
        }, getPreviewTemplate: function (e) {
            var i = this, t = q(e, i.previewTemplates) ? i.previewTemplates[e] : B[e];
            return W(i.customPreviewTags) ? t : J(t, i.customPreviewTags)
        }, parseFilePreviewIcon: function (i, t) {
            var a, r = this, n = r.previewFileIcon;
            return t && t.indexOf(".") > -1 && (a = t.split(".").pop(), r.previewFileIconSettings && r.previewFileIconSettings[a] && (n = r.previewFileIconSettings[a]), r.previewFileExtSettings && e.each(r.previewFileExtSettings, function (e, i) {
                r.previewFileIconSettings[e] && i(a) && (n = r.previewFileIconSettings[e])
            })), i.indexOf("{previewFileIcon}") > -1 ? i.replace(/\{previewFileIconClass}/g, r.previewFileIconClass).replace(/\{previewFileIcon}/g, n) : i
        }, getOutData: function (e, i, t) {
            var a = this;
            return e = e || {}, i = i || {}, t = t || a.filestack.slice(0) || {}, {
                form: a.formdata,
                files: t,
                filenames: a.filenames,
                extra: a.getExtraData(),
                response: i,
                reader: a.reader,
                jqXHR: e
            }
        }, listen: function () {
            var i = this, t = i.$element, r = i.$captionContainer, n = i.$btnFile, l = t.closest("form"),
                o = i.$container;
            a(t, "change", e.proxy(i.change, i)), a(n, "click", function () {
                i.raise("filebrowse"), i.isError && !i.isUploadable && i.clear(), r.focus()
            }), a(l, "reset", e.proxy(i.reset, i)), a(o.find(".fileinput-remove:not([disabled])"), "click", e.proxy(i.clear, i)), a(o.find(".fileinput-cancel"), "click", e.proxy(i.cancel, i)), i.isUploadable && i.dropZoneEnabled && i.showPreview && i.initDragDrop(), i.isUploadable || a(l, "submit", e.proxy(i.submitForm, i)), a(i.$container.find(".fileinput-upload"), "click", function (t) {
                var a, r = e(this), n = !r.hasClass("disabled") && W(r.attr("disabled"));
                return i.isUploadable ? (t.preventDefault(), void(n && i.upload())) : void(n && "submit" !== r.attr("type") && (a = r.closest("form"), a.length && a.trigger("submit"), t.preventDefault()))
            })
        }, submitForm: function () {
            var e = this, i = e.$element, t = i.get(0).files;
            return t && e.minFileCount > 0 && e.getFileCount(t.length) < e.minFileCount ? (e.noFilesError({}), !1) : !e.abort({})
        }, abort: function (i) {
            var t, a = this;
            return a.ajaxAborted && "object" == typeof a.ajaxAborted && void 0 !== a.ajaxAborted.message ? (t = e.extend(a.getOutData(), i), t.abortData = a.ajaxAborted.data || {}, t.abortMessage = a.ajaxAborted.message, a.cancel(), a.setProgress(100), a.showUploadError(a.ajaxAborted.message, t, "filecustomerror"), !0) : !1
        }, noFilesError: function (e) {
            var i = this, t = i.minFileCount > 1 ? i.filePlural : i.fileSingle,
                a = i.msgFilesTooLess.replace("{n}", i.minFileCount).replace("{files}", t), r = i.$errorContainer;
            i.addError(a), i.isError = !0, i.updateFileDetails(0), r.fadeIn(800), i.raise("fileerror", [e]), i.clearFileInput(), d(i.$container, "has-error")
        }, setProgress: function (e, i) {
            var t = this, a = Math.min(e, 100), r = 100 > a ? t.progressTemplate : t.progressCompleteTemplate;
            i = i || t.$progress, W(r) || i.html(r.replace(/\{percent}/g, a))
        }, lock: function () {
            var e = this;
            e.resetErrors(), e.disable(), e.showRemove && d(e.$container.find(".fileinput-remove"), "hide"), e.showCancel && e.$container.find(".fileinput-cancel").removeClass("hide"), e.raise("filelock", [e.filestack, e.getExtraData()])
        }, unlock: function (e) {
            var i = this;
            void 0 === e && (e = !0), i.enable(), i.showCancel && d(i.$container.find(".fileinput-cancel"), "hide"), i.showRemove && i.$container.find(".fileinput-remove").removeClass("hide"), e && i.resetFileStack(), i.raise("fileunlock", [i.filestack, i.getExtraData()])
        }, resetFileStack: function () {
            var i = this, t = 0, a = [], r = [];
            i.getThumbs().each(function () {
                var n = e(this), l = n.attr("data-fileindex"), o = i.filestack[l];
                -1 !== l && (void 0 !== o ? (a[t] = o, r[t] = i.getFileName(o), n.attr({
                    id: i.previewInitId + "-" + t,
                    "data-fileindex": t
                }), t++) : n.attr({id: "uploaded-" + K(), "data-fileindex": "-1"}))
            }), i.filestack = a, i.filenames = r
        }, destroy: function () {
            var e = this, i = e.$container;
            i.find(".file-drop-zone").off(), e.$element.insertBefore(i).off(".fileinput").removeData(), i.off().remove()
        }, refresh: function (i) {
            var t = this, a = t.$element;
            i = i ? e.extend(t.options, i) : t.options, t.destroy(), a.fileinput(i), a.val() && a.trigger("change.fileinput")
        }, initDragDrop: function () {
            var i = this, t = i.$container.find(".file-drop-zone"),
                r = "dragenter.fileinput dragover.fileinput drop.fileinput";
            a(t, "dragenter.fileinput dragover.fileinput", function (t) {
                var a = e.inArray("Files", t.originalEvent.dataTransfer.types) > -1;
                return t.stopPropagation(), t.preventDefault(), i.isDisabled || !a ? (t.originalEvent.dataTransfer.effectAllowed = "none", void(t.originalEvent.dataTransfer.dropEffect = "none")) : void d(e(this), "file-highlighted")
            }, !0), a(t, "dragleave", function (t) {
                t.stopPropagation(), t.preventDefault(), i.isDisabled || e(this).removeClass("file-highlighted")
            }), a(t, "drop", function (t) {
                t.preventDefault(), i.isDisabled || W(t.originalEvent.dataTransfer.files) || (i.change(t, "dragdrop"), e(this).removeClass("file-highlighted"))
            }), a(e(document), r, function (e) {
                e.stopPropagation(), e.preventDefault()
            }, !0)
        }, setFileDropZoneTitle: function () {
            var e = this, i = e.$container.find(".file-drop-zone");
            i.find("." + e.dropZoneTitleClass).remove(), e.isUploadable && e.showPreview && 0 !== i.length && !(e.getFileStack().length > 0) && e.dropZoneEnabled && (0 === i.find(".file-preview-frame").length && W(e.defaultPreviewContent) && i.prepend('<div class="' + e.dropZoneTitleClass + '">' + e.dropZoneTitle + "</div>"), e.$container.removeClass("file-input-new"), d(e.$container, "file-input-ajax-new"))
        }, errorsExist: function () {
            var i, t = this;
            return t.$errorContainer.find("li").length ? !0 : (i = e(document.createElement("div")).html(t.$errorContainer.html()), i.find("span.kv-error-close").remove(), i.find("ul").remove(), e.trim(i.text()).length ? !0 : !1)
        }, getMsgSelected: function (e) {
            var i = this, t = 1 === e ? i.fileSingle : i.filePlural;
            return i.msgSelected.replace("{n}", e).replace("{files}", t)
        }, renderThumbProgress: function () {
            return '<div class="file-thumb-progress hide">' + this.progressTemplate.replace(/\{percent}/g, "0") + "</div>"
        }, renderFileFooter: function (e, i) {
            var t, a, r = this, n = r.fileActionSettings, l = r.getLayoutTemplate("footer");
            return r.isUploadable ? (t = l.replace(/\{actions}/g, r.renderFileActions(!0, !0, !1, !1, !1)), a = t.replace(/\{caption}/g, e).replace(/\{width}/g, i).replace(/\{progress}/g, r.renderThumbProgress()).replace(/\{indicator}/g, n.indicatorNew).replace(/\{indicatorTitle}/g, n.indicatorNewTitle)) : a = l.replace(/\{actions}/g, "").replace(/\{caption}/g, e).replace(/\{progress}/g, "").replace(/\{width}/g, i).replace(/\{indicator}/g, "").replace(/\{indicatorTitle}/g, ""), a = J(a, r.previewThumbTags)
        }, renderFileActions: function (e, i, t, a, r) {
            if (!e && !i)return "";
            var n = this, l = a === !1 ? "" : ' data-url="' + a + '"', o = r === !1 ? "" : ' data-key="' + r + '"',
                s = n.getLayoutTemplate("actionDelete"), d = "", c = n.getLayoutTemplate("actions"),
                p = n.otherActionButtons.replace(/\{dataKey}/g, o), u = n.fileActionSettings,
                f = t ? u.removeClass + " disabled" : u.removeClass;
            return s = s.replace(/\{removeClass}/g, f).replace(/\{removeIcon}/g, u.removeIcon).replace(/\{removeTitle}/g, u.removeTitle).replace(/\{dataUrl}/g, l).replace(/\{dataKey}/g, o), e && (d = n.getLayoutTemplate("actionUpload").replace(/\{uploadClass}/g, u.uploadClass).replace(/\{uploadIcon}/g, u.uploadIcon).replace(/\{uploadTitle}/g, u.uploadTitle)), c.replace(/\{delete}/g, s).replace(/\{upload}/g, d).replace(/\{other}/g, p)
        }, setThumbStatus: function (e, i) {
            var t = this;
            if (t.showPreview) {
                var a = "indicator" + i, r = a + "Title", n = "file-preview-" + i.toLowerCase(),
                    l = e.find(".file-upload-indicator"), o = t.fileActionSettings;
                e.removeClass("file-preview-success file-preview-error file-preview-loading"), "Error" === i && e.find(".kv-file-upload").attr("disabled", !0), l.html(o[a]), l.attr("title", o[r]), e.addClass(n)
            }
        }, clearPreview: function () {
            var e = this,
                i = e.$preview.find(e.showUploadedThumbs ? ".file-preview-frame:not(.file-preview-success)" : ".file-preview-frame");
            i.remove(), e.$preview.find(".file-preview-frame").length && e.showPreview || e.resetUpload(), e.validateDefaultPreview()
        }, initPreview: function (e) {
            var i, t = this, a = t.initialCaption || "";
            return r.count(t.id) ? (i = r.out(t.id), a = e && t.initialCaption ? t.initialCaption : i.caption, t.$preview.html(i.content), t.setCaption(a), void(W(i.content) || t.$container.removeClass("file-input-new"))) : (t.clearPreview(), void(e ? t.setCaption(a) : t.initCaption()))
        }, initPreviewDeletes: function () {
            var i = this, t = i.deleteExtraData || {}, n = function () {
                var e = i.isUploadable ? r.count(i.id) : i.$element.get(0).files.length;
                0 !== i.$preview.find(".kv-file-remove").length || e || (i.reset(), i.initialCaption = "")
            };
            i.$preview.find(".kv-file-remove").each(function () {
                var l = e(this), o = l.data("url") || i.deleteUrl, s = l.data("key");
                if (!W(o) && void 0 !== s) {
                    var c, p, u, f, v = l.closest(".file-preview-frame"), g = r.data[i.id], m = v.data("fileindex");
                    m = parseInt(m.replace("init_", "")), u = W(g.config) && W(g.config[m]) ? null : g.config[m], f = W(u) || W(u.extra) ? t : u.extra, "function" == typeof f && (f = f()), p = {
                        id: l.attr("id"),
                        key: s,
                        extra: f
                    }, c = e.extend({
                        url: o,
                        type: "POST",
                        dataType: "json",
                        data: e.extend({key: s}, f),
                        beforeSend: function (e) {
                            i.ajaxAborted = !1, i.raise("filepredelete", [s, e, f]), i.ajaxAborted ? e.abort() : (d(v, "file-uploading"), d(l, "disabled"))
                        },
                        success: function (e, t, a) {
                            var o, d;
                            return W(e) || W(e.error) ? (r.unset(i.id, m), o = r.count(i.id), d = o > 0 ? i.getMsgSelected(o) : "", i.raise("filedeleted", [s, a, f]), i.setCaption(d), v.removeClass("file-uploading").addClass("file-deleted"), void v.fadeOut("slow", function () {
                                i.clearObjects(v), v.remove(), n(), o || 0 !== i.getFileStack().length || (i.setCaption(""), i.reset())
                            })) : (p.jqXHR = a, p.response = e, i.showError(e.error, p, "filedeleteerror"), v.removeClass("file-uploading"), l.removeClass("disabled"), void n())
                        },
                        error: function (e, t, a) {
                            var r = i.parseError(e, a);
                            p.jqXHR = e, p.response = {}, i.showError(r, p, "filedeleteerror"), v.removeClass("file-uploading"), n()
                        }
                    }, i.ajaxDeleteSettings), a(l, "click", function () {
                        return i.validateMinCount() ? void e.ajax(c) : !1
                    })
                }
            })
        }, clearObjects: function (i) {
            i.find("video audio").each(function () {
                this.pause(), e(this).remove()
            }), i.find("img object div").each(function () {
                e(this).remove()
            })
        }, clearFileInput: function () {
            var i, t, a, r = this, n = r.$element;
            W(n.val()) || (r.isIE9 || r.isIE10 ? (i = n.closest("form"), t = e(document.createElement("form")), a = e(document.createElement("div")), n.before(a), i.length ? i.after(t) : a.after(t), t.append(n).trigger("reset"), a.before(n).remove(), t.remove()) : n.val(""), r.fileInputCleared = !0)
        }, resetUpload: function () {
            var e = this;
            e.uploadCache = {
                content: [],
                config: [],
                tags: [],
                append: !0
            }, e.uploadCount = 0, e.uploadStatus = {}, e.uploadLog = [], e.uploadAsyncCount = 0, e.loadedImages = [], e.totalImagesCount = 0, e.$btnUpload.removeAttr("disabled"), e.setProgress(0), d(e.$progress, "hide"), e.resetErrors(!1), e.ajaxAborted = !1, e.ajaxRequests = [], e.resetCanvas()
        }, resetCanvas: function () {
            var e = this;
            e.canvas && e.imageCanvasContext && e.imageCanvasContext.clearRect(0, 0, e.canvas.width, e.canvas.height)
        }, cancel: function () {
            var i, t = this, a = t.ajaxRequests, r = a.length;
            if (r > 0)for (i = 0; r > i; i += 1)t.cancelling = !0, a[i].abort();
            t.getThumbs().each(function () {
                var i = e(this), a = i.attr("data-fileindex");
                i.removeClass("file-uploading"), void 0 !== t.filestack[a] && (i.find(".kv-file-upload").removeClass("disabled").removeAttr("disabled"), i.find(".kv-file-remove").removeClass("disabled").removeAttr("disabled")), t.unlock()
            })
        }, cleanMemory: function (e) {
            var i = e.is("img") ? e.attr("src") : e.find("source").attr("src");
            Q.revokeObjectURL(i)
        }, hasInitialPreview: function () {
            var e = this;
            return !e.overwriteInitial && r.count(e.id)
        }, clear: function () {
            var i, t = this;
            t.$btnUpload.removeAttr("disabled"), t.getThumbs().find("video,audio,img").each(function () {
                t.cleanMemory(e(this))
            }), t.resetUpload(), t.clearStack(), t.clearFileInput(), t.resetErrors(!0), t.raise("fileclear"), t.hasInitialPreview() ? (t.showFileIcon(), t.resetPreview(), t.initPreviewDeletes(), t.$container.removeClass("file-input-new")) : (t.getThumbs().each(function () {
                t.clearObjects(e(this))
            }), t.isUploadable && (r.data[t.id] = {}), t.$preview.html(""), i = !t.overwriteInitial && t.initialCaption.length > 0 ? t.initialCaption : "", t.setCaption(i), t.$caption.attr("title", ""), d(t.$container, "file-input-new"), t.validateDefaultPreview()), 0 === t.$container.find(".file-preview-frame").length && (t.initCaption() || t.$captionContainer.find(".kv-caption-icon").hide()), t.hideFileIcon(), t.raise("filecleared"), t.$captionContainer.focus(), t.setFileDropZoneTitle()
        }, resetPreview: function () {
            var e, i, t = this;
            r.count(t.id) ? (e = r.out(t.id), t.$preview.html(e.content), i = t.initialCaption ? t.initialCaption : e.caption, t.setCaption(i)) : (t.clearPreview(), t.initCaption())
        }, clearDefaultPreview: function () {
            var e = this;
            e.$preview.find(".file-default-preview").remove()
        }, validateDefaultPreview: function () {
            var e = this;
            e.showPreview && !W(e.defaultPreviewContent) && (e.$preview.html('<div class="file-default-preview">' + e.defaultPreviewContent + "</div>"), e.$container.removeClass("file-input-new"))
        }, resetPreviewThumbs: function (e) {
            var i, t = this;
            return e ? (t.clearPreview(), void t.clearStack()) : void(t.hasInitialPreview() ? (i = r.out(t.id), t.$preview.html(i.content), t.setCaption(i.caption), t.initPreviewDeletes()) : t.clearPreview())
        }, reset: function () {
            var e = this;
            e.resetPreview(), e.$container.find(".fileinput-filename").text(""), e.raise("filereset"), d(e.$container, "file-input-new"), (e.$preview.find(".file-preview-frame").length || e.isUploadable && e.dropZoneEnabled) && e.$container.removeClass("file-input-new"), e.setFileDropZoneTitle(), e.clearStack(), e.formdata = {}
        }, disable: function () {
            var e = this;
            e.isDisabled = !0, e.raise("filedisabled"), e.$element.attr("disabled", "disabled"), e.$container.find(".kv-fileinput-caption").addClass("file-caption-disabled"), e.$container.find(".btn-file, .fileinput-remove, .fileinput-upload, .file-preview-frame button").attr("disabled", !0), e.initDragDrop()
        }, enable: function () {
            var e = this;
            e.isDisabled = !1, e.raise("fileenabled"), e.$element.removeAttr("disabled"), e.$container.find(".kv-fileinput-caption").removeClass("file-caption-disabled"), e.$container.find(".btn-file, .fileinput-remove, .fileinput-upload, .file-preview-frame button").removeAttr("disabled"), e.initDragDrop()
        }, getThumbs: function (e) {
            return e = e || "", this.$preview.find(".file-preview-frame:not(.file-preview-initial)" + e)
        }, getExtraData: function (e, i) {
            var t = this, a = t.uploadExtraData;
            return "function" == typeof t.uploadExtraData && (a = t.uploadExtraData(e, i)), a
        }, uploadExtra: function (i, t) {
            var a = this, r = a.getExtraData(i, t);
            0 !== r.length && e.each(r, function (e, i) {
                a.formdata.append(e, i)
            })
        }, setAsyncUploadStatus: function (i, t, a) {
            var r = this, n = 0;
            r.setProgress(t, e("#" + i).find(".file-thumb-progress")), r.uploadStatus[i] = t, e.each(r.uploadStatus, function (e, i) {
                n += i
            }), r.setProgress(Math.ceil(n / a))
        }, initXhr: function (e, i, t) {
            var a = this;
            return e.upload && e.upload.addEventListener("progress", function (e) {
                var r = 0, n = e.loaded || e.position, l = e.total;
                e.lengthComputable && (r = Math.ceil(n / l * 100)), i ? a.setAsyncUploadStatus(i, r, t) : a.setProgress(Math.ceil(r))
            }, !1), e
        }, ajaxSubmit: function (i, t, a, r, n, l) {
            var o, s = this;
            s.raise("filepreajax", [n, l]), s.uploadExtra(n, l), o = e.extend({
                xhr: function () {
                    var i = e.ajaxSettings.xhr();
                    return s.initXhr(i, n, s.getFileStack().length)
                },
                url: s.uploadUrl,
                type: "POST",
                dataType: "json",
                data: s.formdata,
                cache: !1,
                processData: !1,
                contentType: !1,
                beforeSend: i,
                success: t,
                complete: a,
                error: r
            }, s.ajaxSettings), s.ajaxRequests.push(e.ajax(o))
        }, initUploadSuccess: function (i, t, a) {
            var n, l, o, s, d, c, p, u, f = this;
            f.showPreview && "object" == typeof i && !e.isEmptyObject(i) && void 0 !== i.initialPreview && i.initialPreview.length > 0 && (f.hasInitData = !0, d = i.initialPreview || [], c = i.initialPreviewConfig || [], p = i.initialPreviewThumbTags || [], n = void 0 === i.append || i.append ? !0 : !1, f.overwriteInitial = !1, void 0 !== t ? a ? (u = t.attr("data-fileindex"), f.uploadCache.content[u] = d[0], f.uploadCache.config[u] = c[0], f.uploadCache.tags[u] = p[0], f.uploadCache.append = n) : (o = r.add(f.id, d, c[0], p[0], n), l = r.get(f.id, o, !1), s = e(l).hide(), t.after(s).fadeOut("slow", function () {
                s.fadeIn("slow").css("display:inline-block"), f.initPreviewDeletes(), f.clearFileInput(), t.remove()
            })) : (r.set(f.id, d, c, p, n), f.initPreview(), f.initPreviewDeletes()))
        }, initSuccessThumbs: function () {
            var i = this;
            i.showPreview && i.getThumbs(".file-preview-success").each(function () {
                var t = e(this), r = t.find(".kv-file-remove");
                r.removeAttr("disabled"), a(r, "click", function () {
                    var e = i.raise("filesuccessremove", [t.attr("id"), t.data("fileindex")]);
                    i.cleanMemory(t), e !== !1 && t.fadeOut("slow", function () {
                        t.remove(), i.$preview.find(".file-preview-frame").length || i.reset()
                    })
                })
            })
        }, checkAsyncComplete: function () {
            var i, t, a = this;
            for (t = 0; t < a.filestack.length; t++)if (a.filestack[t] && (i = a.previewInitId + "-" + t, -1 === e.inArray(i, a.uploadLog)))return !1;
            return a.uploadAsyncCount === a.uploadLog.length
        }, uploadSingle: function (i, t, a) {
            var n, l, o, s, c, p, u, f, v, g, m = this, h = m.getFileStack().length, w = new FormData,
                b = m.previewInitId + "-" + i, C = m.filestack.length > 0 || !e.isEmptyObject(m.uploadExtraData),
                x = {id: b, index: i};
            m.formdata = w, m.showPreview && (l = e("#" + b + ":not(.file-preview-initial)"), s = l.find(".kv-file-upload"), c = l.find(".kv-file-remove"), e("#" + b).find(".file-thumb-progress").removeClass("hide")), 0 === h || !C || s && s.hasClass("disabled") || m.abort(x) || (g = function (e, i) {
                m.updateStack(e, void 0), m.uploadLog.push(i), m.checkAsyncComplete() && (m.fileBatchCompleted = !0)
            }, o = function () {
                m.fileBatchCompleted && setTimeout(function () {
                    m.showPreview && (r.set(m.id, m.uploadCache.content, m.uploadCache.config, m.uploadCache.tags, m.uploadCache.append), m.hasInitData && (m.initPreview(), m.initPreviewDeletes())), m.unlock(), m.clearFileInput(), m.raise("filebatchuploadcomplete", [m.filestack, m.getExtraData()]), m.uploadCount = 0, m.uploadStatus = {}, m.uploadLog = [], m.setProgress(100)
                }, 100)
            }, p = function (t) {
                n = m.getOutData(t), m.fileBatchCompleted = !1, m.showPreview && (l.hasClass("file-preview-success") || (m.setThumbStatus(l, "Loading"), d(l, "file-uploading")), s.attr("disabled", !0), c.attr("disabled", !0)), a || m.lock(), m.raise("filepreupload", [n, b, i]), x = e.extend(x, n), m.abort(x) && (t.abort(), m.setProgress(100))
            }, u = function (t, r, o) {
                n = m.getOutData(o, t), x = e.extend(x, n), setTimeout(function () {
                    W(t) || W(t.error) ? (m.showPreview && (m.setThumbStatus(l, "Success"), s.hide(), m.initUploadSuccess(t, l, a)), m.raise("fileuploaded", [n, b, i]), a ? g(i, b) : (m.resetFileStack(), m.updateStack(i, void 0))) : (m.setThumbStatus(l, "Error"), m.showUploadError(t.error, x), a && g(i, b))
                }, 100)
            }, f = function () {
                setTimeout(function () {
                    m.showPreview && (s.removeAttr("disabled"), c.removeAttr("disabled"), l.removeClass("file-uploading")), a ? o() : m.unlock(!1), m.initSuccessThumbs()
                }, 100)
            }, v = function (r, n, o) {
                var s = m.parseError(r, o, a ? t[i].name : null);
                setTimeout(function () {
                    a && g(i, b), m.uploadStatus[b] = 100, m.setThumbStatus(l, "Error"), x = e.extend(x, m.getOutData(r)), m.showUploadError(s, x)
                }, 100)
            }, w.append(m.uploadFileAttr, t[i], m.filenames[i]), w.append("file_id", i), m.ajaxSubmit(p, u, f, v, b, i))
        }, uploadBatch: function () {
            var i, t, a, r, n, l = this, o = l.filestack, s = o.length, c = {},
                p = l.filestack.length > 0 || !e.isEmptyObject(l.uploadExtraData);
            l.formdata = new FormData, 0 !== s && p && !l.abort(c) && (i = function () {
                e.each(o, function (e) {
                    l.updateStack(e, void 0)
                }), l.clearFileInput()
            }, t = function (i) {
                l.lock();
                var t = l.getOutData(i);
                l.showPreview && l.getThumbs().each(function () {
                    var i = e(this), t = i.find(".kv-file-upload"), a = i.find(".kv-file-remove");
                    i.hasClass("file-preview-success") || (l.setThumbStatus(i, "Loading"), d(i, "file-uploading")), t.attr("disabled", !0), a.attr("disabled", !0)
                }), l.raise("filebatchpreupload", [t]), l.abort(t) && (i.abort(), l.setProgress(100))
            }, a = function (t, a, r) {
                var n = l.getOutData(r, t), o = l.getThumbs(), s = 0, d = W(t) || W(t.errorkeys) ? [] : t.errorkeys;
                W(t) || W(t.error) ? (l.raise("filebatchuploadsuccess", [n]), i(), l.showPreview ? (o.each(function () {
                    var i = e(this), t = i.find(".kv-file-upload");
                    i.find(".kv-file-upload").hide(), l.setThumbStatus(i, "Success"), i.removeClass("file-uploading"), t.removeAttr("disabled")
                }), l.initUploadSuccess(t)) : l.reset()) : (l.showPreview && (o.each(function () {
                    var i = e(this), t = i.find(".kv-file-remove"), a = i.find(".kv-file-upload");
                    return i.removeClass("file-uploading"), a.removeAttr("disabled"), t.removeAttr("disabled"), 0 === d.length ? void l.setThumbStatus(i, "Error") : (-1 !== e.inArray(s, d) ? l.setThumbStatus(i, "Error") : (i.find(".kv-file-upload").hide(), l.setThumbStatus(i, "Success"), l.updateStack(s, void 0)), void s++)
                }), l.initUploadSuccess(t)), l.showUploadError(t.error, n, "filebatchuploaderror"))
            }, r = function () {
                l.setProgress(100), l.unlock(), l.initSuccessThumbs(), l.clearFileInput(), l.raise("filebatchuploadcomplete", [l.filestack, l.getExtraData()])
            }, n = function (i, t, a) {
                var r = l.getOutData(i), n = l.parseError(i, a);
                l.showUploadError(n, r, "filebatchuploaderror"), l.uploadFileCount = s - 1, l.showPreview && (l.getThumbs().each(function () {
                    var i = e(this), t = i.attr("data-fileindex");
                    i.removeClass("file-uploading"), void 0 !== l.filestack[t] && l.setThumbStatus(i, "Error")
                }), l.getThumbs().removeClass("file-uploading"), l.getThumbs(" .kv-file-upload").removeAttr("disabled"), l.getThumbs(" .kv-file-delete").removeAttr("disabled"))
            }, e.each(o, function (e, i) {
                W(o[e]) || l.formdata.append(l.uploadFileAttr, i, l.filenames[e])
            }), l.ajaxSubmit(t, a, r, n))
        }, uploadExtraOnly: function () {
            var e, i, t, a, r = this, n = {};
            r.formdata = new FormData, r.abort(n) || (e = function (e) {
                r.lock();
                var i = r.getOutData(e);
                r.raise("filebatchpreupload", [i]), r.setProgress(50), n.data = i, n.xhr = e, r.abort(n) && (e.abort(), r.setProgress(100))
            }, i = function (e, i, t) {
                var a = r.getOutData(t, e);
                W(e) || W(e.error) ? (r.raise("filebatchuploadsuccess", [a]), r.clearFileInput(), r.initUploadSuccess(e)) : r.showUploadError(e.error, a, "filebatchuploaderror")
            }, t = function () {
                r.setProgress(100), r.unlock(), r.clearFileInput(), r.raise("filebatchuploadcomplete", [r.filestack, r.getExtraData()])
            }, a = function (e, i, t) {
                var a = r.getOutData(e), l = r.parseError(e, t);
                n.data = a, r.showUploadError(l, a, "filebatchuploaderror")
            }, r.ajaxSubmit(e, i, t, a))
        }, upload: function () {
            var i, t, a, r = this, n = r.getFileStack().length, l = {}, o = !e.isEmptyObject(r.getExtraData());
            if (r.minFileCount > 0 && r.getFileCount(n) < r.minFileCount)return void r.noFilesError(l);
            if (r.isUploadable && !r.isDisabled && (0 !== n || o)) {
                if (r.resetUpload(), r.$progress.removeClass("hide"), r.uploadCount = 0, r.uploadStatus = {}, r.uploadLog = [], r.lock(), r.setProgress(2), 0 === n && o)return void r.uploadExtraOnly();
                if (a = r.filestack.length, r.hasInitData = !1, r.uploadAsync) {
                    for (t = r.getOutData(), r.raise("filebatchpreupload", [t]), r.fileBatchCompleted = !1, r.uploadCache = {
                        content: [],
                        config: [],
                        tags: [],
                        append: !0
                    }, r.uploadAsyncCount = r.getFileStack().length, i = 0; a > i; i++)r.uploadCache.content[i] = null, r.uploadCache.config[i] = null, r.uploadCache.tags[i] = null;
                    for (i = 0; a > i; i++)void 0 !== r.filestack[i] && r.uploadSingle(i, r.filestack, !0)
                } else r.uploadBatch()
            }
        }, initFileActions: function () {
            var i = this;
            i.showPreview && (i.$preview.find(".kv-file-remove").each(function () {
                var t, n, l, o, s = e(this), d = s.closest(".file-preview-frame"), c = d.attr("id"),
                    p = d.attr("data-fileindex");
                a(s, "click", function () {
                    return o = i.raise("filepreremove", [c, p]), o !== !1 && i.validateMinCount() ? (t = d.hasClass("file-preview-error"), i.cleanMemory(d), void d.fadeOut("slow", function () {
                        i.updateStack(p, void 0), i.clearObjects(d), d.remove(), c && t && i.$errorContainer.find('li[data-file-id="' + c + '"]').fadeOut("fast", function () {
                            e(this).remove(), i.errorsExist() || i.resetErrors()
                        });
                        var a = i.getFileStack(!0), o = a.length, s = r.count(i.id),
                            u = i.showPreview && i.$preview.find(".file-preview-frame").length;
                        i.clearFileInput(), 0 !== o || 0 !== s || u ? (n = s + o, l = n > 1 ? i.getMsgSelected(n) : a[0] ? i.getFileNames()[0] : "", i.setCaption(l)) : i.reset(), i.raise("fileremoved", [c, p])
                    })) : !1
                })
            }), i.$preview.find(".kv-file-upload").each(function () {
                var t = e(this);
                a(t, "click", function () {
                    var e = t.closest(".file-preview-frame"), a = e.attr("data-fileindex");
                    e.hasClass("file-preview-error") || i.uploadSingle(a, i.filestack, !1)
                })
            }))
        }, hideFileIcon: function () {
            this.overwriteInitial && this.$captionContainer.find(".kv-caption-icon").hide()
        }, showFileIcon: function () {
            this.$captionContainer.find(".kv-caption-icon").show()
        }, addError: function (e) {
            var i = this, t = i.$errorContainer;
            e && t.length && (t.html(i.errorCloseButton + e), t.find(".kv-error-close").off("click").on("click", function () {
                t.fadeOut("slow")
            }))
        }, resetErrors: function (e) {
            var i = this, t = i.$errorContainer;
            i.isError = !1, i.$container.removeClass("has-error"), t.html(""), e ? t.fadeOut("slow") : t.hide()
        }, showFolderError: function (e) {
            var i = this, t = i.$errorContainer;
            e && (i.addError(i.msgFoldersNotAllowed.replace(/\{n}/g, e)), t.fadeIn(800), d(i.$container, "has-error"), i.raise("filefoldererror", [e]))
        }, showUploadError: function (e, i, t) {
            var a = this, r = a.$errorContainer, n = t || "fileuploaderror",
                l = i && i.id ? '<li data-file-id="' + i.id + '">' + e + "</li>" : "<li>" + e + "</li>";
            return 0 === r.find("ul").length ? a.addError("<ul>" + l + "</ul>") : r.find("ul").append(l), r.fadeIn(800), a.raise(n, [i]), a.$container.removeClass("file-input-new"), d(a.$container, "has-error"), !0
        }, showError: function (e, i, t) {
            var a = this, r = a.$errorContainer, n = t || "fileerror";
            return i = i || {}, i.reader = a.reader, a.addError(e), r.fadeIn(800), a.raise(n, [i]), a.isUploadable || a.clearFileInput(), a.$container.removeClass("file-input-new"), d(a.$container, "has-error"), a.$btnUpload.attr("disabled", !0), !0
        }, errorHandler: function (e, i) {
            var t = this, a = e.target.error;
            t.showError(a.code === a.NOT_FOUND_ERR ? t.msgFileNotFound.replace("{name}", i) : a.code === a.SECURITY_ERR ? t.msgFileSecured.replace("{name}", i) : a.code === a.NOT_READABLE_ERR ? t.msgFileNotReadable.replace("{name}", i) : a.code === a.ABORT_ERR ? t.msgFilePreviewAborted.replace("{name}", i) : t.msgFilePreviewError.replace("{name}", i))
        }, parseFileType: function (e) {
            var i, t, a, r, n = this;
            for (r = 0; r < N.length; r += 1)if (a = N[r], i = q(a, n.fileTypeSettings) ? n.fileTypeSettings[a] : H[a], t = i(e.type, e.name) ? a : "", !W(t))return t;
            return "other"
        }, previewDefault: function (i, t, a) {
            if (this.showPreview) {
                var r = this, n = "", l = i ? i.name : "", o = Q.createObjectURL(i),
                    s = t.slice(t.lastIndexOf("-") + 1), d = r.previewSettings.other || Z.other,
                    c = r.renderFileFooter(i.name, d.width),
                    p = r.parseFilePreviewIcon(r.getPreviewTemplate("other"), l);
                a === !0 && (r.isUploadable || (c += '<div class="file-other-error" title="' + r.fileActionSettings.indicatorErrorTitle + '">' + r.fileActionSettings.indicatorError + "</div>")), r.clearDefaultPreview(), r.$preview.append("\n" + p.replace(/\{previewId}/g, t).replace(/\{frameClass}/g, n).replace(/\{fileindex}/g, s).replace(/\{caption}/g, r.slug(i.name)).replace(/\{width}/g, d.width).replace(/\{height}/g, d.height).replace(/\{type}/g, i.type).replace(/\{data}/g, o).replace(/\{footer}/g, c)), a === !0 && r.isUploadable && r.setThumbStatus(e("#" + t), "Error")
            }
        }, previewFile: function (e, i, t, a, r) {
            if (this.showPreview) {
                var n, l, o, s = this, d = s.parseFileType(i), c = i ? i.name : "", p = s.slug(c),
                    u = s.allowedPreviewTypes, f = s.allowedPreviewMimeTypes, v = s.getPreviewTemplate(d),
                    g = u && u.indexOf(d) >= 0, m = q(d, s.previewSettings) ? s.previewSettings[d] : Z[d],
                    h = f && -1 !== f.indexOf(i.type), w = s.renderFileFooter(p, m.width), b = "",
                    C = a.slice(a.lastIndexOf("-") + 1);
                g || h ? (v = s.parseFilePreviewIcon(v, c.split(".").pop()), "text" === d ? (l = X(t.target.result), o = "text-" + K(), n = v.replace(/\{zoom}/g, s.getLayoutTemplate("zoom")), b = s.getLayoutTemplate("modal").replace("{id}", o).replace(/\{title}/g, p).replace(/\{body}/g, l).replace(/\{heading}/g, s.msgZoomModalHeading), n = n.replace(/\{previewId}/g, a).replace(/\{caption}/g, p).replace(/\{width}/g, m.width).replace(/\{height}/g, m.height).replace(/\{frameClass}/g, "").replace(/\{zoomInd}/g, s.zoomIndicator).replace(/\{footer}/g, w).replace(/\{fileindex}/g, C).replace(/\{type}/g, i.type).replace(/\{zoomTitle}/g, s.msgZoomTitle).replace(/\{dialog}/g, "$('#" + o + "').modal('show')").replace(/\{data}/g, l) + b) : n = v.replace(/\{previewId}/g, a).replace(/\{caption}/g, p).replace(/\{frameClass}/g, "").replace(/\{type}/g, i.type).replace(/\{fileindex}/g, C).replace(/\{width}/g, m.width).replace(/\{height}/g, m.height).replace(/\{footer}/g, w).replace(/\{data}/g, r), s.clearDefaultPreview(), s.$preview.append("\n" + n), s.validateImage(e, a, p, i.type)) : s.previewDefault(i, a)
            }
        }, slugDefault: function (e) {
            return W(e) ? "" : e.split(/(\\|\/)/g).pop().replace(/[^\w\u00C0-\u017F\-.\\\/ ]+/g, "")
        }, readFiles: function (i) {
            this.reader = new FileReader;
            var t, a = this, r = a.$element, n = a.$preview, l = a.reader, o = a.$previewContainer,
                s = a.$previewStatus, d = a.msgLoading, c = a.msgProgress, p = a.previewInitId, u = i.length,
                f = a.fileTypeSettings, v = a.filestack.length, g = function (r, n, l, o) {
                    var s = e.extend(a.getOutData({}, {}, i), {id: l, index: o}), d = {id: l, index: o, file: n, files: i};
                    return a.previewDefault(n, l, !0), a.isUploadable && a.pushStack(void 0), setTimeout(t(o + 1), 100), a.initFileActions(), a.isUploadable ? a.showUploadError(r, s) : a.showError(r, d)
                };
            a.loadedImages = [], a.totalImagesCount = 0, e.each(i, function (e, i) {
                var t = "image", r = q(t, a.fileTypeSettings) ? a.fileTypeSettings[t] : H[t];
                r && r(i.type) && a.totalImagesCount++
            }), t = function (e) {
                if (W(r.attr("multiple")) && (u = 1), e >= u)return a.isUploadable && a.filestack.length > 0 ? a.raise("filebatchselected", [a.getFileStack()]) : a.raise("filebatchselected", [i]), o.removeClass("file-thumb-loading"), void s.html("");
                var m, h, w, b, C, x, y = v + e, T = p + "-" + y, F = i[e], I = a.slug(F.name), E = (F.size || 0) / 1e3,
                    k = "", S = Q.createObjectURL(F), $ = 0, P = a.allowedFileTypes, D = W(P) ? "" : P.join(", "),
                    U = a.allowedFileExtensions, A = W(U) ? "" : U.join(", ");
                if (W(U) || (k = new RegExp("\\.(" + U.join("|") + ")$", "i")), E = E.toFixed(2), a.maxFileSize > 0 && E > a.maxFileSize)return b = a.msgSizeTooLarge.replace("{name}", I).replace("{size}", E).replace("{maxSize}", a.maxFileSize), void(a.isError = g(b, F, T, e));
                if (!W(P) && _(P)) {
                    for (w = 0; w < P.length; w += 1)C = P[w], h = f[C], x = void 0 !== h && h(F.type, I), $ += W(x) ? 0 : x.length;
                    if (0 === $)return b = a.msgInvalidFileType.replace("{name}", I).replace("{types}", D), void(a.isError = g(b, F, T, e))
                }
                return 0 !== $ || W(U) || !_(U) || W(k) || (x = I.match(k), $ += W(x) ? 0 : x.length, 0 !== $) ? a.showPreview ? (n.length > 0 && void 0 !== FileReader ? (s.html(d.replace("{index}", e + 1).replace("{files}", u)), o.addClass("file-thumb-loading"), l.onerror = function (e) {
                    a.errorHandler(e, I)
                }, l.onload = function (i) {
                    a.previewFile(e, F, i, T, S), a.initFileActions()
                }, l.onloadend = function () {
                    b = c.replace("{index}", e + 1).replace("{files}", u).replace("{percent}", 50).replace("{name}", I), setTimeout(function () {
                        s.html(b), a.updateFileDetails(u), t(e + 1)
                    }, 100), a.raise("fileloaded", [F, T, e, l])
                }, l.onprogress = function (i) {
                    if (i.lengthComputable) {
                        var t = i.loaded / i.total * 100, a = Math.ceil(t);
                        b = c.replace("{index}", e + 1).replace("{files}", u).replace("{percent}", a).replace("{name}", I), setTimeout(function () {
                            s.html(b)
                        }, 100)
                    }
                }, m = q("text", f) ? f.text : H.text, m(F.type, I) ? l.readAsText(F, a.textEncoding) : l.readAsArrayBuffer(F)) : (a.previewDefault(F, T), setTimeout(function () {
                    t(e + 1), a.updateFileDetails(u)
                }, 100), a.raise("fileloaded", [F, T, e, l])), void a.pushStack(F)) : (a.pushStack(F), setTimeout(t(e + 1), 100), void a.raise("fileloaded", [F, T, e, l])) : (b = a.msgInvalidFileExtension.replace("{name}", I).replace("{extensions}", A), void(a.isError = g(b, F, T, e)))
            }, t(0), a.updateFileDetails(u, !1)
        }, updateFileDetails: function (e) {
            var i = this, t = i.$element, a = i.getFileStack(), n = t.val() || a.length && a[0].name || "",
                l = i.slug(n), o = i.isUploadable ? a.length : e, s = r.count(i.id) + o,
                d = o > 1 ? i.getMsgSelected(s) : l;
            i.isError ? (i.$previewContainer.removeClass("file-thumb-loading"), i.$previewStatus.html(""), i.$captionContainer.find(".kv-caption-icon").hide()) : i.showFileIcon(), i.setCaption(d, i.isError), i.$container.removeClass("file-input-new file-input-ajax-new"), 1 === arguments.length && i.raise("fileselect", [e, l]), r.count(i.id) && i.initPreviewDeletes()
        }, validateMinCount: function () {
            var e = this, i = e.isUploadable ? e.getFileStack().length : e.$element.get(0).files.length;
            return e.validateInitialCount && e.minFileCount > 0 && e.getFileCount(i - 1) < e.minFileCount ? (e.noFilesError({}), !1) : !0
        }, getFileCount: function (e) {
            var i = this, t = 0;
            return i.validateInitialCount && !i.overwriteInitial && (t = r.count(i.id), e += t), e
        }, change: function (i) {
            var t = this, a = t.$element;
            if (!t.isUploadable && W(a.val()) && t.fileInputCleared)return void(t.fileInputCleared = !1);
            t.fileInputCleared = !1;
            var n, l, o, s, d, c, p = arguments.length > 1, u = p ? i.originalEvent.dataTransfer.files : a.get(0).files,
                f = W(a.attr("multiple")), v = 0, g = 0, m = t.filestack.length, h = t.isUploadable, w = f && m > 0,
                b = function (i, a, r, n) {
                    var l = e.extend(t.getOutData({}, {}, u), {id: r, index: n}),
                        o = {id: r, index: n, file: a, files: u};
                    return t.isUploadable ? t.showUploadError(i, l) : t.showError(i, o)
                };
            if (t.reader = null, t.resetUpload(), t.hideFileIcon(), t.isUploadable && t.$container.find(".file-drop-zone ." + t.dropZoneTitleClass).remove(), p)for (n = []; u[v];)s = u[v], s.type || s.size % 4096 !== 0 ? n.push(s) : g++, v++; else n = void 0 === i.target.files ? i.target && i.target.value ? [{name: i.target.value.replace(/^.+\\/, "")}] : [] : i.target.files;
            if (W(n) || 0 === n.length)return h || t.clear(), t.showFolderError(g), void t.raise("fileselectnone");
            if (t.resetErrors(), c = n.length, o = t.isUploadable ? t.getFileStack().length + c : c, o = t.getFileCount(o), t.maxFileCount > 0 && o > t.maxFileCount) {
                if (!t.autoReplace || c > t.maxFileCount)return d = t.autoReplace && c > t.maxFileCount ? c : o, l = t.msgFilesTooMany.replace("{m}", t.maxFileCount).replace("{n}", d), t.isError = b(l, null, null, null), t.$captionContainer.find(".kv-caption-icon").hide(), t.setCaption("", !0), void t.$container.removeClass("file-input-new file-input-ajax-new");
                o > t.maxFileCount && t.resetPreviewThumbs(h)
            } else!h || w ? (t.resetPreviewThumbs(!1), w && t.clearStack()) : !h || 0 !== m || r.count(t.id) && !t.overwriteInitial || t.resetPreviewThumbs(!0);
            t.isPreviewable ? t.readFiles(n) : t.updateFileDetails(1), t.showFolderError(g)
        }, getFileName: function (e) {
            return e && e.name ? this.slug(e.name) : void 0
        }, getFileNames: function (e) {
            var i = this;
            return i.filenames.filter(function (i) {
                return e ? void 0 !== i : void 0 !== i && null !== i
            })
        }, getFileStack: function (e) {
            var i = this;
            return i.filestack.filter(function (i) {
                return e ? void 0 !== i : void 0 !== i && null !== i
            })
        }, clearStack: function () {
            var e = this;
            e.filestack = [], e.filenames = []
        }, updateStack: function (e, i) {
            var t = this;
            t.filestack[e] = i, t.filenames[e] = t.getFileName(i)
        }, pushStack: function (e) {
            var i = this;
            i.filestack.push(e), i.filenames.push(i.getFileName(e))
        }, checkDimensions: function (e, i, t, a, r, n, l) {
            var o, s, d, c, p = this, u = "Small" === i ? "min" : "max", f = p[u + "Image" + n];
            !W(f) && t.length && (d = t[0], s = "Width" === n ? d.naturalWidth || d.width : d.naturalHeight || d.height, c = "Small" === i ? s >= f : f >= s, c || (o = p["msgImage" + n + i].replace("{name}", r).replace("{size}", f), p.showUploadError(o, l), p.setThumbStatus(a, "Error"), p.updateStack(e, null)))
        }, validateImage: function (e, i, t, r) {
            var n, l, o, s = this, d = s.$preview, c = d.find("#" + i), p = c.find("img");
            t = t || "Untitled", p.length && a(p, "load", function () {
                l = c.width(), o = d.width(), l > o && (p.css("width", "100%"), c.css("width", "97%")), n = {
                    ind: e,
                    id: i
                }, s.checkDimensions(e, "Small", p, c, t, "Width", n), s.checkDimensions(e, "Small", p, c, t, "Height", n), s.resizeImage || (s.checkDimensions(e, "Large", p, c, t, "Width", n), s.checkDimensions(e, "Large", p, c, t, "Height", n)), s.raise("fileimageloaded", [i]), s.loadedImages.push({
                    ind: e,
                    img: p,
                    thumb: c,
                    pid: i,
                    typ: r
                }), s.validateAllImages(), Q.revokeObjectURL(p.attr("src"))
            })
        }, validateAllImages: function () {
            var e, i, t, a, r, n, l, o = this, s = {};
            if (o.loadedImages.length === o.totalImagesCount && (o.raise("fileimagesloaded"), o.resizeImage)) {
                for (l = o.isUploadable ? o.showUploadError : o.showError, e = 0; e < o.loadedImages.length; e++)i = o.loadedImages[e], t = i.img, a = i.thumb, r = i.pid, n = i.ind, s = {
                    id: r,
                    index: n
                }, o.getResizedImage(t[0], i.typ, r, n) || (l(o.msgImageResizeError, s, "fileimageresizeerror"), o.setThumbStatus(a, "Error"), o.updateStack(n, void 0));
                o.raise("fileimagesresized")
            }
        }, getResizedImage: function (e, i, t, a) {
            var r, n, l = this, o = e.naturalWidth, s = e.naturalHeight, d = 1, c = l.maxImageWidth || o,
                p = l.maxImageHeight || s, u = o && s, f = l.imageCanvas, v = l.imageCanvasContext;
            if (!u)return !1;
            if (o === c && s === p)return !0;
            i = i || l.resizeDefaultImageType, r = o > c, n = s > p, d = "width" === l.resizePreference ? r ? c / o : n ? p / s : 1 : n ? p / s : r ? c / o : 1, l.resetCanvas(), o *= d, s *= d, f.width = o, f.height = s;
            try {
                return v.drawImage(e, 0, 0, o, s), f.toBlob(function (e) {
                    l.raise("fileimageresized", [t, a]), l.filestack[a] = e
                }, i, l.resizeQuality), !0
            } catch (g) {
                return !1
            }
        }, initCaption: function () {
            var e = this, i = e.initialCaption || "";
            return e.overwriteInitial || W(i) ? (e.$caption.html(""), !1) : (e.setCaption(i), !0)
        }, setCaption: function (i, t) {
            var a, r, n = this;
            if (t) a = e("<div>" + n.msgValidationError + "</div>").text(), r = '<span class="' + n.msgValidationErrorClass + '">' + n.msgValidationErrorIcon + a + "</span>"; else {
                if (W(i) || 0 === n.$caption.length)return;
                a = e("<div>" + i + "</div>").text(), r = n.getLayoutTemplate("icon") + a
            }
            n.$caption.html(r), n.$caption.attr("title", a), n.$captionContainer.find(".file-caption-ellipsis").attr("title", a)
        }, initBrowse: function (e) {
            var i = this;
            i.$btnFile = e.find(".btn-file"), i.$btnFile.append(i.$element)
        }, createContainer: function () {
            var i = this,
                t = e(document.createElement("div")).attr({"class": "file-input file-input-new"}).html(i.renderMain());
            return i.$element.before(t), i.initBrowse(t), t
        }, refreshContainer: function () {
            var e = this, i = e.$container;
            i.before(e.$element), i.html(e.renderMain()), e.initBrowse(i)
        }, renderMain: function () {
            var e = this, i = e.isUploadable && e.dropZoneEnabled ? " file-drop-zone" : "file-drop-disabled",
                t = e.showClose ? e.getLayoutTemplate("close") : "",
                a = e.showPreview ? e.getLayoutTemplate("preview").replace(/\{class}/g, e.previewClass).replace(/\{dropClass}/g, i) : "",
                r = e.isDisabled ? e.captionClass + " file-caption-disabled" : e.captionClass,
                n = e.captionTemplate.replace(/\{class}/g, r + " kv-fileinput-caption");
            return e.mainTemplate.replace(/\{class}/g, e.mainClass).replace(/\{preview}/g, a).replace(/\{close}/g, t).replace(/\{caption}/g, n).replace(/\{upload}/g, e.renderButton("upload")).replace(/\{remove}/g, e.renderButton("remove")).replace(/\{cancel}/g, e.renderButton("cancel")).replace(/\{browse}/g, e.renderButton("browse"))
        }, renderButton: function (e) {
            var i = this, t = i.getLayoutTemplate("btnDefault"), a = i[e + "Class"], r = i[e + "Title"],
                n = i[e + "Icon"], l = i[e + "Label"], o = i.isDisabled ? " disabled" : "", s = "button";
            switch (e) {
                case"remove":
                    if (!i.showRemove)return "";
                    break;
                case"cancel":
                    if (!i.showCancel)return "";
                    a += " hide";
                    break;
                case"upload":
                    if (!i.showUpload)return "";
                    i.isUploadable && !i.isDisabled ? t = i.getLayoutTemplate("btnLink").replace("{href}", i.uploadUrl) : s = "submit";
                    break;
                case"browse":
                    t = i.getLayoutTemplate("btnBrowse");
                    break;
                default:
                    return ""
            }
            return a += "browse" === e ? " btn-file" : " fileinput-" + e + " fileinput-" + e + "-button", W(l) || (l = ' <span class="' + i.buttonLabelClass + '">' + l + "</span>"), t.replace("{type}", s).replace("{css}", a).replace("{title}", r).replace("{status}", o).replace("{icon}", n).replace("{label}", l)
        }
    }, e.fn.fileinput = function (t) {
        if (l() || i(9)) {
            var a = Array.apply(null, arguments), r = [];
            switch (a.shift(), this.each(function () {
                var i, n = e(this), l = n.data("fileinput"), o = "object" == typeof t && t,
                    s = o.language || n.data("language") || "en";
                l || (i = e.extend({}, e.fn.fileinput.defaults), "en" === s || W(e.fn.fileinputLocales[s]) || (i = e.extend(i, e.fn.fileinputLocales[s])), l = new Y(this, e.extend(i, o, n.data())), n.data("fileinput", l)), "string" == typeof t && r.push(l[t].apply(l, a))
            }), r.length) {
                case 0:
                    return this;
                case 1:
                    return r[0];
                default:
                    return r
            }
        }
    }, e.fn.fileinput.defaults = {
        language: "en",
        showCaption: !0,
        showPreview: !0,
        showRemove: !0,
        showUpload: !0,
        showCancel: !0,
        showClose: !0,
        showUploadedThumbs: !0,
        autoReplace: !1,
        mainClass: "",
        previewClass: "",
        captionClass: "",
        mainTemplate: null,
        initialCaption: "",
        initialPreview: [],
        initialPreviewDelimiter: "*$$*",
        initialPreviewConfig: [],
        initialPreviewThumbTags: [],
        previewThumbTags: {},
        initialPreviewShowDelete: !0,
        deleteUrl: "",
        deleteExtraData: {},
        overwriteInitial: !0,
        layoutTemplates: M,
        previewTemplates: B,
        allowedPreviewTypes: N,
        allowedPreviewMimeTypes: null,
        allowedFileTypes: null,
        allowedFileExtensions: null,
        defaultPreviewContent: null,
        customLayoutTags: {},
        customPreviewTags: {},
        previewSettings: Z,
        fileTypeSettings: H,
        previewFileIcon: '<i class="glyphicon glyphicon-file"></i>',
        previewFileIconClass: "file-icon-4x",
        previewFileIconSettings: {},
        previewFileExtSettings: {},
        buttonLabelClass: "hidden-xs",
        browseIcon: '',
        browseClass: "btn btn-primary",
        removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
        removeClass: "btn btn-default",
        cancelIcon: '<i class="glyphicon glyphicon-ban-circle"></i>',
        cancelClass: "btn btn-default",
        uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
        uploadClass: "btn btn-default",
        uploadUrl: null,
        uploadAsync: !0,
        uploadExtraData: {},
        minImageWidth: null,
        minImageHeight: null,
        maxImageWidth: null,
        maxImageHeight: null,
        resizeImage: !1,
        resizePreference: "width",
        resizeQuality: .92,
        resizeDefaultImageType: "image/jpeg",
        maxFileSize: 0,
        minFileCount: 0,
        maxFileCount: 0,
        validateInitialCount: !1,
        msgValidationErrorClass: "text-danger",
        msgValidationErrorIcon: '<i class="glyphicon glyphicon-exclamation-sign"></i> ',
        msgErrorClass: "file-error-message",
        progressThumbClass: "progress-bar progress-bar-success progress-bar-striped active",
        progressClass: "progress-bar progress-bar-success progress-bar-striped active",
        progressCompleteClass: "progress-bar progress-bar-success",
        previewFileType: "image",
        zoomIndicator: '<i class="glyphicon glyphicon-zoom-in"></i>',
        elCaptionContainer: null,
        elCaptionText: null,
        elPreviewContainer: null,
        elPreviewImage: null,
        elPreviewStatus: null,
        elErrorContainer: null,
        errorCloseButton: '<span class="close kv-error-close">&times;</span>',
        slugCallback: null,
        dropZoneEnabled: !0,
        dropZoneTitleClass: "file-drop-zone-title",
        fileActionSettings: {},
        otherActionButtons: "",
        textEncoding: "UTF-8",
        ajaxSettings: {},
        ajaxDeleteSettings: {},
        showAjaxErrorDetails: !0
    }, e.fn.fileinputLocales.en = {
        fileSingle: "file",
        filePlural: "files",
        browseLabel: "Add Photos",
        removeLabel: "Remove",
        removeTitle: "Clear selected files",
        cancelLabel: "Cancel",
        cancelTitle: "Abort ongoing upload",
        uploadLabel: "Upload",
        uploadTitle: "Upload selected files",
        msgZoomTitle: "View details",
        msgZoomModalHeading: "Detailed Preview",
        msgSizeTooLarge: 'File "{name}" (<b>{size} KB</b>) exceeds maximum allowed upload size of <b>{maxSize} KB</b>.',
        msgFilesTooLess: "You must select at least <b>{n}</b> {files} to upload.",
        msgFilesTooMany: "Number of files selected for upload <b>({n})</b> exceeds maximum allowed limit of <b>{m}</b>.",
        msgFileNotFound: 'File "{name}" not found!',
        msgFileSecured: 'Security restrictions prevent reading the file "{name}".',
        msgFileNotReadable: 'File "{name}" is not readable.',
        msgFilePreviewAborted: 'File preview aborted for "{name}".',
        msgFilePreviewError: 'An error occurred while reading the file "{name}".',
        msgInvalidFileType: 'Invalid type for file "{name}". Only "{types}" files are supported.',
        msgInvalidFileExtension: 'Invalid extension for file "{name}". Only "{extensions}" files are supported.',
        msgUploadAborted: "The file upload was aborted",
        msgValidationError: "File Upload Error",
        msgLoading: "Loading file {index} of {files} &hellip;",
        msgProgress: "Loading file {index} of {files} - {name} - {percent}% completed.",
        msgSelected: "{n} {files} selected",
        msgFoldersNotAllowed: "Drag & drop files only! {n} folder(s) dropped were skipped.",
        msgImageWidthSmall: 'Width of image file "{name}" must be at least {size} px.',
        msgImageHeightSmall: 'Height of image file "{name}" must be at least {size} px.',
        msgImageWidthLarge: 'Width of image file "{name}" cannot exceed {size} px.',
        msgImageHeightLarge: 'Height of image file "{name}" cannot exceed {size} px.',
        msgImageResizeError: "Could not get the image dimensions to resize.",
        msgImageResizeException: "Error while resizing the image.<pre>{errors}</pre>",
        dropZoneTitle: "Drop photos here or use the button on the left to add photos"
    }, e.extend(e.fn.fileinput.defaults, e.fn.fileinputLocales.en), e.fn.fileinput.Constructor = Y, e(document).ready(function () {
        var i = e("input.file[type=file]");
        i.length && i.fileinput()
    })
}(window.jQuery);

/*! WOW - v1.1.2 - 2015-08-19
 * Copyright (c) 2015 Matthieu Aussaguel; Licensed MIT */
(function () {
    var a, b, c, d, e, f = function (a, b) {
        return function () {
            return a.apply(b, arguments)
        }
    }, g = [].indexOf || function (a) {
            for (var b = 0, c = this.length; c > b; b++)if (b in this && this[b] === a)return b;
            return -1
        };
    b = function () {
        function a() {
        }

        return a.prototype.extend = function (a, b) {
            var c, d;
            for (c in b)d = b[c], null == a[c] && (a[c] = d);
            return a
        }, a.prototype.isMobile = function (a) {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)
        }, a.prototype.createEvent = function (a, b, c, d) {
            var e;
            return null == b && (b = !1), null == c && (c = !1), null == d && (d = null), null != document.createEvent ? (e = document.createEvent("CustomEvent"), e.initCustomEvent(a, b, c, d)) : null != document.createEventObject ? (e = document.createEventObject(), e.eventType = a) : e.eventName = a, e
        }, a.prototype.emitEvent = function (a, b) {
            return null != a.dispatchEvent ? a.dispatchEvent(b) : b in (null != a) ? a[b]() : "on" + b in (null != a) ? a["on" + b]() : void 0
        }, a.prototype.addEvent = function (a, b, c) {
            return null != a.addEventListener ? a.addEventListener(b, c, !1) : null != a.attachEvent ? a.attachEvent("on" + b, c) : a[b] = c
        }, a.prototype.removeEvent = function (a, b, c) {
            return null != a.removeEventListener ? a.removeEventListener(b, c, !1) : null != a.detachEvent ? a.detachEvent("on" + b, c) : delete a[b]
        }, a.prototype.innerHeight = function () {
            return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
        }, a
    }(), c = this.WeakMap || this.MozWeakMap || (c = function () {
            function a() {
                this.keys = [], this.values = []
            }

            return a.prototype.get = function (a) {
                var b, c, d, e, f;
                for (f = this.keys, b = d = 0, e = f.length; e > d; b = ++d)if (c = f[b], c === a)return this.values[b]
            }, a.prototype.set = function (a, b) {
                var c, d, e, f, g;
                for (g = this.keys, c = e = 0, f = g.length; f > e; c = ++e)if (d = g[c], d === a)return void(this.values[c] = b);
                return this.keys.push(a), this.values.push(b)
            }, a
        }()), a = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (a = function () {
            function a() {
                "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
            }

            return a.notSupported = !0, a.prototype.observe = function () {
            }, a
        }()), d = this.getComputedStyle || function (a) {
            return this.getPropertyValue = function (b) {
                var c;
                return "float" === b && (b = "styleFloat"), e.test(b) && b.replace(e, function (a, b) {
                    return b.toUpperCase()
                }), (null != (c = a.currentStyle) ? c[b] : void 0) || null
            }, this
        }, e = /(\-([a-z]){1})/g, this.WOW = function () {
        function e(a) {
            null == a && (a = {}), this.scrollCallback = f(this.scrollCallback, this), this.scrollHandler = f(this.scrollHandler, this), this.resetAnimation = f(this.resetAnimation, this), this.start = f(this.start, this), this.scrolled = !0, this.config = this.util().extend(a, this.defaults), null != a.scrollContainer && (this.config.scrollContainer = document.querySelector(a.scrollContainer)), this.animationNameCache = new c, this.wowEvent = this.util().createEvent(this.config.boxClass)
        }

        return e.prototype.defaults = {
            boxClass: "wow",
            animateClass: "animated",
            offset: 0,
            mobile: !0,
            live: !0,
            callback: null,
            scrollContainer: null
        }, e.prototype.init = function () {
            var a;
            return this.element = window.document.documentElement, "interactive" === (a = document.readyState) || "complete" === a ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
        }, e.prototype.start = function () {
            var b, c, d, e;
            if (this.stopped = !1, this.boxes = function () {
                    var a, c, d, e;
                    for (d = this.element.querySelectorAll("." + this.config.boxClass), e = [], a = 0, c = d.length; c > a; a++)b = d[a], e.push(b);
                    return e
                }.call(this), this.all = function () {
                    var a, c, d, e;
                    for (d = this.boxes, e = [], a = 0, c = d.length; c > a; a++)b = d[a], e.push(b);
                    return e
                }.call(this), this.boxes.length)if (this.disabled()) this.resetStyle(); else for (e = this.boxes, c = 0, d = e.length; d > c; c++)b = e[c], this.applyStyle(b, !0);
            return this.disabled() || (this.util().addEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live ? new a(function (a) {
                return function (b) {
                    var c, d, e, f, g;
                    for (g = [], c = 0, d = b.length; d > c; c++)f = b[c], g.push(function () {
                        var a, b, c, d;
                        for (c = f.addedNodes || [], d = [], a = 0, b = c.length; b > a; a++)e = c[a], d.push(this.doSync(e));
                        return d
                    }.call(a));
                    return g
                }
            }(this)).observe(document.body, {childList: !0, subtree: !0}) : void 0
        }, e.prototype.stop = function () {
            return this.stopped = !0, this.util().removeEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0
        }, e.prototype.sync = function () {
            return a.notSupported ? this.doSync(this.element) : void 0
        }, e.prototype.doSync = function (a) {
            var b, c, d, e, f;
            if (null == a && (a = this.element), 1 === a.nodeType) {
                for (a = a.parentNode || a, e = a.querySelectorAll("." + this.config.boxClass), f = [], c = 0, d = e.length; d > c; c++)b = e[c], g.call(this.all, b) < 0 ? (this.boxes.push(b), this.all.push(b), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(b, !0), f.push(this.scrolled = !0)) : f.push(void 0);
                return f
            }
        }, e.prototype.show = function (a) {
            return this.applyStyle(a), a.className = a.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(a), this.util().emitEvent(a, this.wowEvent), this.util().addEvent(a, "animationend", this.resetAnimation), this.util().addEvent(a, "oanimationend", this.resetAnimation), this.util().addEvent(a, "webkitAnimationEnd", this.resetAnimation), this.util().addEvent(a, "MSAnimationEnd", this.resetAnimation), a
        }, e.prototype.applyStyle = function (a, b) {
            var c, d, e;
            return d = a.getAttribute("data-wow-duration"), c = a.getAttribute("data-wow-delay"), e = a.getAttribute("data-wow-iteration"), this.animate(function (f) {
                return function () {
                    return f.customStyle(a, b, d, c, e)
                }
            }(this))
        }, e.prototype.animate = function () {
            return "requestAnimationFrame" in window ? function (a) {
                return window.requestAnimationFrame(a)
            } : function (a) {
                return a()
            }
        }(), e.prototype.resetStyle = function () {
            var a, b, c, d, e;
            for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++)a = d[b], e.push(a.style.visibility = "visible");
            return e
        }, e.prototype.resetAnimation = function (a) {
            var b;
            return a.type.toLowerCase().indexOf("animationend") >= 0 ? (b = a.target || a.srcElement, b.className = b.className.replace(this.config.animateClass, "").trim()) : void 0
        }, e.prototype.customStyle = function (a, b, c, d, e) {
            return b && this.cacheAnimationName(a), a.style.visibility = b ? "hidden" : "visible", c && this.vendorSet(a.style, {animationDuration: c}), d && this.vendorSet(a.style, {animationDelay: d}), e && this.vendorSet(a.style, {animationIterationCount: e}), this.vendorSet(a.style, {animationName: b ? "none" : this.cachedAnimationName(a)}), a
        }, e.prototype.vendors = ["moz", "webkit"], e.prototype.vendorSet = function (a, b) {
            var c, d, e, f;
            d = [];
            for (c in b)e = b[c], a["" + c] = e, d.push(function () {
                var b, d, g, h;
                for (g = this.vendors, h = [], b = 0, d = g.length; d > b; b++)f = g[b], h.push(a["" + f + c.charAt(0).toUpperCase() + c.substr(1)] = e);
                return h
            }.call(this));
            return d
        }, e.prototype.vendorCSS = function (a, b) {
            var c, e, f, g, h, i;
            for (h = d(a), g = h.getPropertyCSSValue(b), f = this.vendors, c = 0, e = f.length; e > c; c++)i = f[c], g = g || h.getPropertyCSSValue("-" + i + "-" + b);
            return g
        }, e.prototype.animationName = function (a) {
            var b;
            try {
                b = this.vendorCSS(a, "animation-name").cssText
            } catch (c) {
                b = d(a).getPropertyValue("animation-name")
            }
            return "none" === b ? "" : b
        }, e.prototype.cacheAnimationName = function (a) {
            return this.animationNameCache.set(a, this.animationName(a))
        }, e.prototype.cachedAnimationName = function (a) {
            return this.animationNameCache.get(a)
        }, e.prototype.scrollHandler = function () {
            return this.scrolled = !0
        }, e.prototype.scrollCallback = function () {
            var a;
            return !this.scrolled || (this.scrolled = !1, this.boxes = function () {
                var b, c, d, e;
                for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++)a = d[b], a && (this.isVisible(a) ? this.show(a) : e.push(a));
                return e
            }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop()
        }, e.prototype.offsetTop = function (a) {
            for (var b; void 0 === a.offsetTop;)a = a.parentNode;
            for (b = a.offsetTop; a = a.offsetParent;)b += a.offsetTop;
            return b
        }, e.prototype.isVisible = function (a) {
            var b, c, d, e, f;
            return c = a.getAttribute("data-wow-offset") || this.config.offset, f = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset, e = f + Math.min(this.element.clientHeight, this.util().innerHeight()) - c, d = this.offsetTop(a), b = d + a.clientHeight, e >= d && b >= f
        }, e.prototype.util = function () {
            return null != this._util ? this._util : this._util = new b
        }, e.prototype.disabled = function () {
            return !this.config.mobile && this.util().isMobile(navigator.userAgent)
        }, e
    }()
}).call(this);


/**
 * Swiper 3.1.7
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 *
 * http://www.idangero.us/swiper/
 *
 * Copyright 2015, Vladimir Kharlampidi
 * The iDangero.us
 * http://www.idangero.us/
 *
 * Licensed under MIT
 *
 * Released on: October 10, 2015
 */
!function () {
    "use strict";
    function e(e) {
        e.fn.swiper = function (a) {
            var s;
            return e(this).each(function () {
                var e = new t(this, a);
                s || (s = e)
            }), s
        }
    }

    var a, t = function (e, s) {
        function r() {
            return "horizontal" === v.params.direction
        }

        function i(e) {
            return Math.floor(e)
        }

        function n() {
            v.autoplayTimeoutId = setTimeout(function () {
                v.params.loop ? (v.fixLoop(), v._slideNext()) : v.isEnd ? s.autoplayStopOnLast ? v.stopAutoplay() : v._slideTo(0) : v._slideNext()
            }, v.params.autoplay)
        }

        function o(e, t) {
            var s = a(e.target);
            if (!s.is(t))if ("string" == typeof t) s = s.parents(t); else if (t.nodeType) {
                var r;
                return s.parents().each(function (e, a) {
                    a === t && (r = t)
                }), r ? t : void 0
            }
            return 0 === s.length ? void 0 : s[0]
        }

        function l(e, a) {
            a = a || {};
            var t = window.MutationObserver || window.WebkitMutationObserver, s = new t(function (e) {
                e.forEach(function (e) {
                    v.onResize(!0), v.emit("onObserverUpdate", v, e)
                })
            });
            s.observe(e, {
                attributes: "undefined" == typeof a.attributes ? !0 : a.attributes,
                childList: "undefined" == typeof a.childList ? !0 : a.childList,
                characterData: "undefined" == typeof a.characterData ? !0 : a.characterData
            }), v.observers.push(s)
        }

        function p(e) {
            e.originalEvent && (e = e.originalEvent);
            var a = e.keyCode || e.charCode;
            if (!v.params.allowSwipeToNext && (r() && 39 === a || !r() && 40 === a))return !1;
            if (!v.params.allowSwipeToPrev && (r() && 37 === a || !r() && 38 === a))return !1;
            if (!(e.shiftKey || e.altKey || e.ctrlKey || e.metaKey || document.activeElement && document.activeElement.nodeName && ("input" === document.activeElement.nodeName.toLowerCase() || "textarea" === document.activeElement.nodeName.toLowerCase()))) {
                if (37 === a || 39 === a || 38 === a || 40 === a) {
                    var t = !1;
                    if (v.container.parents(".swiper-slide").length > 0 && 0 === v.container.parents(".swiper-slide-active").length)return;
                    var s = {left: window.pageXOffset, top: window.pageYOffset}, i = window.innerWidth,
                        n = window.innerHeight, o = v.container.offset();
                    v.rtl && (o.left = o.left - v.container[0].scrollLeft);
                    for (var l = [[o.left, o.top], [o.left + v.width, o.top], [o.left, o.top + v.height], [o.left + v.width, o.top + v.height]], p = 0; p < l.length; p++) {
                        var d = l[p];
                        d[0] >= s.left && d[0] <= s.left + i && d[1] >= s.top && d[1] <= s.top + n && (t = !0)
                    }
                    if (!t)return
                }
                r() ? ((37 === a || 39 === a) && (e.preventDefault ? e.preventDefault() : e.returnValue = !1), (39 === a && !v.rtl || 37 === a && v.rtl) && v.slideNext(), (37 === a && !v.rtl || 39 === a && v.rtl) && v.slidePrev()) : ((38 === a || 40 === a) && (e.preventDefault ? e.preventDefault() : e.returnValue = !1), 40 === a && v.slideNext(), 38 === a && v.slidePrev())
            }
        }

        function d(e) {
            e.originalEvent && (e = e.originalEvent);
            var a = v.mousewheel.event, t = 0;
            if (e.detail) t = -e.detail; else if ("mousewheel" === a)if (v.params.mousewheelForceToAxis)if (r()) {
                if (!(Math.abs(e.wheelDeltaX) > Math.abs(e.wheelDeltaY)))return;
                t = e.wheelDeltaX
            } else {
                if (!(Math.abs(e.wheelDeltaY) > Math.abs(e.wheelDeltaX)))return;
                t = e.wheelDeltaY
            } else t = e.wheelDelta; else if ("DOMMouseScroll" === a) t = -e.detail; else if ("wheel" === a)if (v.params.mousewheelForceToAxis)if (r()) {
                if (!(Math.abs(e.deltaX) > Math.abs(e.deltaY)))return;
                t = -e.deltaX
            } else {
                if (!(Math.abs(e.deltaY) > Math.abs(e.deltaX)))return;
                t = -e.deltaY
            } else t = Math.abs(e.deltaX) > Math.abs(e.deltaY) ? -e.deltaX : -e.deltaY;
            if (v.params.mousewheelInvert && (t = -t), v.params.freeMode) {
                var s = v.getWrapperTranslate() + t * v.params.mousewheelSensitivity;
                if (s > v.minTranslate() && (s = v.minTranslate()), s < v.maxTranslate() && (s = v.maxTranslate()), v.setWrapperTransition(0), v.setWrapperTranslate(s), v.updateProgress(), v.updateActiveIndex(), v.params.freeModeSticky && (clearTimeout(v.mousewheel.timeout), v.mousewheel.timeout = setTimeout(function () {
                        v.slideReset()
                    }, 300)), 0 === s || s === v.maxTranslate())return
            } else {
                if ((new window.Date).getTime() - v.mousewheel.lastScrollTime > 60)if (0 > t)if (v.isEnd && !v.params.loop || v.animating) {
                    if (v.params.mousewheelReleaseOnEdges)return !0
                } else v.slideNext(); else if (v.isBeginning && !v.params.loop || v.animating) {
                    if (v.params.mousewheelReleaseOnEdges)return !0
                } else v.slidePrev();
                v.mousewheel.lastScrollTime = (new window.Date).getTime()
            }
            return v.params.autoplay && v.stopAutoplay(), e.preventDefault ? e.preventDefault() : e.returnValue = !1, !1
        }

        function c(e, t) {
            e = a(e);
            var s, i, n;
            s = e.attr("data-swiper-parallax") || "0", i = e.attr("data-swiper-parallax-x"), n = e.attr("data-swiper-parallax-y"), i || n ? (i = i || "0", n = n || "0") : r() ? (i = s, n = "0") : (n = s, i = "0"), i = i.indexOf("%") >= 0 ? parseInt(i, 10) * t + "%" : i * t + "px", n = n.indexOf("%") >= 0 ? parseInt(n, 10) * t + "%" : n * t + "px", e.transform("translate3d(" + i + ", " + n + ",0px)")
        }

        function u(e) {
            return 0 !== e.indexOf("on") && (e = e[0] !== e[0].toUpperCase() ? "on" + e[0].toUpperCase() + e.substring(1) : "on" + e), e
        }

        if (!(this instanceof t))return new t(e, s);
        var m = {
            direction: "horizontal",
            touchEventsTarget: "container",
            initialSlide: 0,
            speed: 300,
            autoplay: !1,
            autoplayDisableOnInteraction: !0,
            iOSEdgeSwipeDetection: !1,
            iOSEdgeSwipeThreshold: 20,
            freeMode: !1,
            freeModeMomentum: !0,
            freeModeMomentumRatio: 1,
            freeModeMomentumBounce: !0,
            freeModeMomentumBounceRatio: 1,
            freeModeSticky: !1,
            freeModeMinimumVelocity: .02,
            setWrapperSize: !1,
            virtualTranslate: !1,
            effect: "slide",
            coverflow: {rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: !0},
            cube: {slideShadows: !0, shadow: !0, shadowOffset: 20, shadowScale: .94},
            fade: {crossFade: !1},
            parallax: !1,
            scrollbar: null,
            scrollbarHide: !0,
            scrollbarDraggable: !1,
            scrollbarSnapOnRelease: !1,
            keyboardControl: !1,
            mousewheelControl: !1,
            mousewheelReleaseOnEdges: !1,
            mousewheelInvert: !1,
            mousewheelForceToAxis: !1,
            mousewheelSensitivity: 1,
            hashnav: !1,
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerColumn: 1,
            slidesPerColumnFill: "column",
            slidesPerGroup: 1,
            centeredSlides: !1,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
            roundLengths: !1,
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: !0,
            shortSwipes: !0,
            longSwipes: !0,
            longSwipesRatio: .5,
            longSwipesMs: 300,
            followFinger: !0,
            onlyExternal: !1,
            threshold: 0,
            touchMoveStopPropagation: !0,
            pagination: null,
            paginationElement: "span",
            paginationClickable: !1,
            paginationHide: !1,
            paginationBulletRender: null,
            resistance: !0,
            resistanceRatio: .85,
            nextButton: null,
            prevButton: null,
            watchSlidesProgress: !1,
            watchSlidesVisibility: !1,
            grabCursor: !1,
            preventClicks: !0,
            preventClicksPropagation: !0,
            slideToClickedSlide: !1,
            lazyLoading: !1,
            lazyLoadingInPrevNext: !1,
            lazyLoadingOnTransitionStart: !1,
            preloadImages: !0,
            updateOnImagesReady: !0,
            loop: !1,
            loopAdditionalSlides: 0,
            loopedSlides: null,
            control: void 0,
            controlInverse: !1,
            controlBy: "slide",
            allowSwipeToPrev: !0,
            allowSwipeToNext: !0,
            swipeHandler: null,
            noSwiping: !0,
            noSwipingClass: "swiper-no-swiping",
            slideClass: "swiper-slide",
            slideActiveClass: "swiper-slide-active",
            slideVisibleClass: "swiper-slide-visible",
            slideDuplicateClass: "swiper-slide-duplicate",
            slideNextClass: "swiper-slide-next",
            slidePrevClass: "swiper-slide-prev",
            wrapperClass: "swiper-wrapper",
            bulletClass: "swiper-pagination-bullet",
            bulletActiveClass: "swiper-pagination-bullet-active",
            buttonDisabledClass: "swiper-button-disabled",
            paginationHiddenClass: "swiper-pagination-hidden",
            observer: !1,
            observeParents: !1,
            a11y: !1,
            prevSlideMessage: "Previous slide",
            nextSlideMessage: "Next slide",
            firstSlideMessage: "This is the first slide",
            lastSlideMessage: "This is the last slide",
            paginationBulletMessage: "Go to slide {{index}}",
            runCallbacksOnInit: !0
        }, f = s && s.virtualTranslate;
        s = s || {};
        for (var h in m)if ("undefined" == typeof s[h]) s[h] = m[h]; else if ("object" == typeof s[h])for (var g in m[h])"undefined" == typeof s[h][g] && (s[h][g] = m[h][g]);
        var v = this;
        if (v.params = s, v.classNames = [], "undefined" != typeof a && "undefined" != typeof Dom7 && (a = Dom7), ("undefined" != typeof a || (a = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery : Dom7)) && (v.$ = a, v.container = a(e), 0 !== v.container.length)) {
            if (v.container.length > 1)return void v.container.each(function () {
                new t(this, s)
            });
            v.container[0].swiper = v, v.container.data("swiper", v), v.classNames.push("swiper-container-" + v.params.direction), v.params.freeMode && v.classNames.push("swiper-container-free-mode"), v.support.flexbox || (v.classNames.push("swiper-container-no-flexbox"), v.params.slidesPerColumn = 1), (v.params.parallax || v.params.watchSlidesVisibility) && (v.params.watchSlidesProgress = !0), ["cube", "coverflow"].indexOf(v.params.effect) >= 0 && (v.support.transforms3d ? (v.params.watchSlidesProgress = !0, v.classNames.push("swiper-container-3d")) : v.params.effect = "slide"), "slide" !== v.params.effect && v.classNames.push("swiper-container-" + v.params.effect), "cube" === v.params.effect && (v.params.resistanceRatio = 0, v.params.slidesPerView = 1, v.params.slidesPerColumn = 1, v.params.slidesPerGroup = 1, v.params.centeredSlides = !1, v.params.spaceBetween = 0, v.params.virtualTranslate = !0, v.params.setWrapperSize = !1), "fade" === v.params.effect && (v.params.slidesPerView = 1, v.params.slidesPerColumn = 1, v.params.slidesPerGroup = 1, v.params.watchSlidesProgress = !0, v.params.spaceBetween = 0, "undefined" == typeof f && (v.params.virtualTranslate = !0)), v.params.grabCursor && v.support.touch && (v.params.grabCursor = !1), v.wrapper = v.container.children("." + v.params.wrapperClass), v.params.pagination && (v.paginationContainer = a(v.params.pagination), v.params.paginationClickable && v.paginationContainer.addClass("swiper-pagination-clickable")), v.rtl = r() && ("rtl" === v.container[0].dir.toLowerCase() || "rtl" === v.container.css("direction")), v.rtl && v.classNames.push("swiper-container-rtl"), v.rtl && (v.wrongRTL = "-webkit-box" === v.wrapper.css("display")), v.params.slidesPerColumn > 1 && v.classNames.push("swiper-container-multirow"), v.device.android && v.classNames.push("swiper-container-android"), v.container.addClass(v.classNames.join(" ")), v.translate = 0, v.progress = 0, v.velocity = 0, v.lockSwipeToNext = function () {
                v.params.allowSwipeToNext = !1
            }, v.lockSwipeToPrev = function () {
                v.params.allowSwipeToPrev = !1
            }, v.lockSwipes = function () {
                v.params.allowSwipeToNext = v.params.allowSwipeToPrev = !1
            }, v.unlockSwipeToNext = function () {
                v.params.allowSwipeToNext = !0
            }, v.unlockSwipeToPrev = function () {
                v.params.allowSwipeToPrev = !0
            }, v.unlockSwipes = function () {
                v.params.allowSwipeToNext = v.params.allowSwipeToPrev = !0
            }, v.params.grabCursor && (v.container[0].style.cursor = "move", v.container[0].style.cursor = "-webkit-grab", v.container[0].style.cursor = "-moz-grab", v.container[0].style.cursor = "grab"), v.imagesToLoad = [], v.imagesLoaded = 0, v.loadImage = function (e, a, t, s, r) {
                function i() {
                    r && r()
                }

                var n;
                e.complete && s ? i() : a ? (n = new window.Image, n.onload = i, n.onerror = i, t && (n.srcset = t), a && (n.src = a)) : i()
            }, v.preloadImages = function () {
                function e() {
                    "undefined" != typeof v && null !== v && (void 0 !== v.imagesLoaded && v.imagesLoaded++, v.imagesLoaded === v.imagesToLoad.length && (v.params.updateOnImagesReady && v.update(), v.emit("onImagesReady", v)))
                }

                v.imagesToLoad = v.container.find("img");
                for (var a = 0; a < v.imagesToLoad.length; a++)v.loadImage(v.imagesToLoad[a], v.imagesToLoad[a].currentSrc || v.imagesToLoad[a].getAttribute("src"), v.imagesToLoad[a].srcset || v.imagesToLoad[a].getAttribute("srcset"), !0, e)
            }, v.autoplayTimeoutId = void 0, v.autoplaying = !1, v.autoplayPaused = !1, v.startAutoplay = function () {
                return "undefined" != typeof v.autoplayTimeoutId ? !1 : v.params.autoplay ? v.autoplaying ? !1 : (v.autoplaying = !0, v.emit("onAutoplayStart", v), void n()) : !1
            }, v.stopAutoplay = function (e) {
                v.autoplayTimeoutId && (v.autoplayTimeoutId && clearTimeout(v.autoplayTimeoutId), v.autoplaying = !1, v.autoplayTimeoutId = void 0, v.emit("onAutoplayStop", v))
            }, v.pauseAutoplay = function (e) {
                v.autoplayPaused || (v.autoplayTimeoutId && clearTimeout(v.autoplayTimeoutId), v.autoplayPaused = !0, 0 === e ? (v.autoplayPaused = !1, n()) : v.wrapper.transitionEnd(function () {
                    v && (v.autoplayPaused = !1, v.autoplaying ? n() : v.stopAutoplay())
                }))
            }, v.minTranslate = function () {
                return -v.snapGrid[0]
            }, v.maxTranslate = function () {
                return -v.snapGrid[v.snapGrid.length - 1]
            }, v.updateContainerSize = function () {
                var e, a;
                e = "undefined" != typeof v.params.width ? v.params.width : v.container[0].clientWidth, a = "undefined" != typeof v.params.height ? v.params.height : v.container[0].clientHeight, 0 === e && r() || 0 === a && !r() || (e = e - parseInt(v.container.css("padding-left"), 10) - parseInt(v.container.css("padding-right"), 10), a = a - parseInt(v.container.css("padding-top"), 10) - parseInt(v.container.css("padding-bottom"), 10), v.width = e, v.height = a, v.size = r() ? v.width : v.height)
            }, v.updateSlidesSize = function () {
                v.slides = v.wrapper.children("." + v.params.slideClass), v.snapGrid = [], v.slidesGrid = [], v.slidesSizesGrid = [];
                var e, a = v.params.spaceBetween, t = -v.params.slidesOffsetBefore, s = 0, n = 0;
                "string" == typeof a && a.indexOf("%") >= 0 && (a = parseFloat(a.replace("%", "")) / 100 * v.size), v.virtualSize = -a, v.rtl ? v.slides.css({
                    marginLeft: "",
                    marginTop: ""
                }) : v.slides.css({marginRight: "", marginBottom: ""});
                var o;
                v.params.slidesPerColumn > 1 && (o = Math.floor(v.slides.length / v.params.slidesPerColumn) === v.slides.length / v.params.slidesPerColumn ? v.slides.length : Math.ceil(v.slides.length / v.params.slidesPerColumn) * v.params.slidesPerColumn, "auto" !== v.params.slidesPerView && "row" === v.params.slidesPerColumnFill && (o = Math.max(o, v.params.slidesPerView * v.params.slidesPerColumn)));
                var l, p = v.params.slidesPerColumn, d = o / p,
                    c = d - (v.params.slidesPerColumn * d - v.slides.length);
                for (e = 0; e < v.slides.length; e++) {
                    l = 0;
                    var u = v.slides.eq(e);
                    if (v.params.slidesPerColumn > 1) {
                        var m, f, h;
                        "column" === v.params.slidesPerColumnFill ? (f = Math.floor(e / p), h = e - f * p, (f > c || f === c && h === p - 1) && ++h >= p && (h = 0, f++), m = f + h * o / p, u.css({
                            "-webkit-box-ordinal-group": m,
                            "-moz-box-ordinal-group": m,
                            "-ms-flex-order": m,
                            "-webkit-order": m,
                            order: m
                        })) : (h = Math.floor(e / d), f = e - h * d), u.css({"margin-top": 0 !== h && v.params.spaceBetween && v.params.spaceBetween + "px"}).attr("data-swiper-column", f).attr("data-swiper-row", h)
                    }
                    "none" !== u.css("display") && ("auto" === v.params.slidesPerView ? (l = r() ? u.outerWidth(!0) : u.outerHeight(!0), v.params.roundLengths && (l = i(l))) : (l = (v.size - (v.params.slidesPerView - 1) * a) / v.params.slidesPerView, v.params.roundLengths && (l = i(l)), r() ? v.slides[e].style.width = l + "px" : v.slides[e].style.height = l + "px"), v.slides[e].swiperSlideSize = l, v.slidesSizesGrid.push(l), v.params.centeredSlides ? (t = t + l / 2 + s / 2 + a, 0 === e && (t = t - v.size / 2 - a), Math.abs(t) < .001 && (t = 0), n % v.params.slidesPerGroup === 0 && v.snapGrid.push(t), v.slidesGrid.push(t)) : (n % v.params.slidesPerGroup === 0 && v.snapGrid.push(t), v.slidesGrid.push(t), t = t + l + a), v.virtualSize += l + a, s = l, n++)
                }
                v.virtualSize = Math.max(v.virtualSize, v.size) + v.params.slidesOffsetAfter;
                var g;
                if (v.rtl && v.wrongRTL && ("slide" === v.params.effect || "coverflow" === v.params.effect) && v.wrapper.css({width: v.virtualSize + v.params.spaceBetween + "px"}), (!v.support.flexbox || v.params.setWrapperSize) && (r() ? v.wrapper.css({width: v.virtualSize + v.params.spaceBetween + "px"}) : v.wrapper.css({height: v.virtualSize + v.params.spaceBetween + "px"})), v.params.slidesPerColumn > 1 && (v.virtualSize = (l + v.params.spaceBetween) * o, v.virtualSize = Math.ceil(v.virtualSize / v.params.slidesPerColumn) - v.params.spaceBetween, v.wrapper.css({width: v.virtualSize + v.params.spaceBetween + "px"}), v.params.centeredSlides)) {
                    for (g = [], e = 0; e < v.snapGrid.length; e++)v.snapGrid[e] < v.virtualSize + v.snapGrid[0] && g.push(v.snapGrid[e]);
                    v.snapGrid = g
                }
                if (!v.params.centeredSlides) {
                    for (g = [], e = 0; e < v.snapGrid.length; e++)v.snapGrid[e] <= v.virtualSize - v.size && g.push(v.snapGrid[e]);
                    v.snapGrid = g, Math.floor(v.virtualSize - v.size) > Math.floor(v.snapGrid[v.snapGrid.length - 1]) && v.snapGrid.push(v.virtualSize - v.size)
                }
                0 === v.snapGrid.length && (v.snapGrid = [0]), 0 !== v.params.spaceBetween && (r() ? v.rtl ? v.slides.css({marginLeft: a + "px"}) : v.slides.css({marginRight: a + "px"}) : v.slides.css({marginBottom: a + "px"})), v.params.watchSlidesProgress && v.updateSlidesOffset()
            }, v.updateSlidesOffset = function () {
                for (var e = 0; e < v.slides.length; e++)v.slides[e].swiperSlideOffset = r() ? v.slides[e].offsetLeft : v.slides[e].offsetTop
            }, v.updateSlidesProgress = function (e) {
                if ("undefined" == typeof e && (e = v.translate || 0), 0 !== v.slides.length) {
                    "undefined" == typeof v.slides[0].swiperSlideOffset && v.updateSlidesOffset();
                    var a = -e;
                    v.rtl && (a = e);
                    v.container[0].getBoundingClientRect(), r() ? "left" : "top", r() ? "right" : "bottom";
                    v.slides.removeClass(v.params.slideVisibleClass);
                    for (var t = 0; t < v.slides.length; t++) {
                        var s = v.slides[t],
                            i = (a - s.swiperSlideOffset) / (s.swiperSlideSize + v.params.spaceBetween);
                        if (v.params.watchSlidesVisibility) {
                            var n = -(a - s.swiperSlideOffset), o = n + v.slidesSizesGrid[t],
                                l = n >= 0 && n < v.size || o > 0 && o <= v.size || 0 >= n && o >= v.size;
                            l && v.slides.eq(t).addClass(v.params.slideVisibleClass)
                        }
                        s.progress = v.rtl ? -i : i
                    }
                }
            }, v.updateProgress = function (e) {
                "undefined" == typeof e && (e = v.translate || 0);
                var a = v.maxTranslate() - v.minTranslate();
                0 === a ? (v.progress = 0, v.isBeginning = v.isEnd = !0) : (v.progress = (e - v.minTranslate()) / a, v.isBeginning = v.progress <= 0, v.isEnd = v.progress >= 1), v.isBeginning && v.emit("onReachBeginning", v), v.isEnd && v.emit("onReachEnd", v), v.params.watchSlidesProgress && v.updateSlidesProgress(e), v.emit("onProgress", v, v.progress)
            }, v.updateActiveIndex = function () {
                var e, a, t, s = v.rtl ? v.translate : -v.translate;
                for (a = 0; a < v.slidesGrid.length; a++)"undefined" != typeof v.slidesGrid[a + 1] ? s >= v.slidesGrid[a] && s < v.slidesGrid[a + 1] - (v.slidesGrid[a + 1] - v.slidesGrid[a]) / 2 ? e = a : s >= v.slidesGrid[a] && s < v.slidesGrid[a + 1] && (e = a + 1) : s >= v.slidesGrid[a] && (e = a);
                (0 > e || "undefined" == typeof e) && (e = 0), t = Math.floor(e / v.params.slidesPerGroup), t >= v.snapGrid.length && (t = v.snapGrid.length - 1), e !== v.activeIndex && (v.snapIndex = t, v.previousIndex = v.activeIndex, v.activeIndex = e, v.updateClasses())
            }, v.updateClasses = function () {
                v.slides.removeClass(v.params.slideActiveClass + " " + v.params.slideNextClass + " " + v.params.slidePrevClass);
                var e = v.slides.eq(v.activeIndex);
                if (e.addClass(v.params.slideActiveClass), e.next("." + v.params.slideClass).addClass(v.params.slideNextClass), e.prev("." + v.params.slideClass).addClass(v.params.slidePrevClass), v.bullets && v.bullets.length > 0) {
                    v.bullets.removeClass(v.params.bulletActiveClass);
                    var t;
                    v.params.loop ? (t = Math.ceil(v.activeIndex - v.loopedSlides) / v.params.slidesPerGroup, t > v.slides.length - 1 - 2 * v.loopedSlides && (t -= v.slides.length - 2 * v.loopedSlides), t > v.bullets.length - 1 && (t -= v.bullets.length)) : t = "undefined" != typeof v.snapIndex ? v.snapIndex : v.activeIndex || 0, v.paginationContainer.length > 1 ? v.bullets.each(function () {
                        a(this).index() === t && a(this).addClass(v.params.bulletActiveClass)
                    }) : v.bullets.eq(t).addClass(v.params.bulletActiveClass)
                }
                v.params.loop || (v.params.prevButton && (v.isBeginning ? (a(v.params.prevButton).addClass(v.params.buttonDisabledClass), v.params.a11y && v.a11y && v.a11y.disable(a(v.params.prevButton))) : (a(v.params.prevButton).removeClass(v.params.buttonDisabledClass), v.params.a11y && v.a11y && v.a11y.enable(a(v.params.prevButton)))), v.params.nextButton && (v.isEnd ? (a(v.params.nextButton).addClass(v.params.buttonDisabledClass), v.params.a11y && v.a11y && v.a11y.disable(a(v.params.nextButton))) : (a(v.params.nextButton).removeClass(v.params.buttonDisabledClass), v.params.a11y && v.a11y && v.a11y.enable(a(v.params.nextButton)))))
            }, v.updatePagination = function () {
                if (v.params.pagination && v.paginationContainer && v.paginationContainer.length > 0) {
                    for (var e = "", a = v.params.loop ? Math.ceil((v.slides.length - 2 * v.loopedSlides) / v.params.slidesPerGroup) : v.snapGrid.length, t = 0; a > t; t++)e += v.params.paginationBulletRender ? v.params.paginationBulletRender(t, v.params.bulletClass) : "<" + v.params.paginationElement + ' class="' + v.params.bulletClass + '"></' + v.params.paginationElement + ">";
                    v.paginationContainer.html(e), v.bullets = v.paginationContainer.find("." + v.params.bulletClass), v.params.paginationClickable && v.params.a11y && v.a11y && v.a11y.initPagination()
                }
            }, v.update = function (e) {
                function a() {
                    s = Math.min(Math.max(v.translate, v.maxTranslate()), v.minTranslate()), v.setWrapperTranslate(s), v.updateActiveIndex(), v.updateClasses()
                }

                if (v.updateContainerSize(), v.updateSlidesSize(), v.updateProgress(), v.updatePagination(), v.updateClasses(), v.params.scrollbar && v.scrollbar && v.scrollbar.set(), e) {
                    var t, s;
                    v.controller && v.controller.spline && (v.controller.spline = void 0), v.params.freeMode ? a() : (t = ("auto" === v.params.slidesPerView || v.params.slidesPerView > 1) && v.isEnd && !v.params.centeredSlides ? v.slideTo(v.slides.length - 1, 0, !1, !0) : v.slideTo(v.activeIndex, 0, !1, !0), t || a())
                }
            }, v.onResize = function (e) {
                var a = v.params.allowSwipeToPrev, t = v.params.allowSwipeToNext;
                if (v.params.allowSwipeToPrev = v.params.allowSwipeToNext = !0, v.updateContainerSize(), v.updateSlidesSize(), ("auto" === v.params.slidesPerView || v.params.freeMode || e) && v.updatePagination(), v.params.scrollbar && v.scrollbar && v.scrollbar.set(), v.controller && v.controller.spline && (v.controller.spline = void 0), v.params.freeMode) {
                    var s = Math.min(Math.max(v.translate, v.maxTranslate()), v.minTranslate());
                    v.setWrapperTranslate(s), v.updateActiveIndex(), v.updateClasses()
                } else v.updateClasses(), ("auto" === v.params.slidesPerView || v.params.slidesPerView > 1) && v.isEnd && !v.params.centeredSlides ? v.slideTo(v.slides.length - 1, 0, !1, !0) : v.slideTo(v.activeIndex, 0, !1, !0);
                v.params.allowSwipeToPrev = a, v.params.allowSwipeToNext = t
            };
            var w = ["mousedown", "mousemove", "mouseup"];
            window.navigator.pointerEnabled ? w = ["pointerdown", "pointermove", "pointerup"] : window.navigator.msPointerEnabled && (w = ["MSPointerDown", "MSPointerMove", "MSPointerUp"]), v.touchEvents = {
                start: v.support.touch || !v.params.simulateTouch ? "touchstart" : w[0],
                move: v.support.touch || !v.params.simulateTouch ? "touchmove" : w[1],
                end: v.support.touch || !v.params.simulateTouch ? "touchend" : w[2]
            }, (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) && ("container" === v.params.touchEventsTarget ? v.container : v.wrapper).addClass("swiper-wp8-" + v.params.direction), v.initEvents = function (e) {
                var t = e ? "off" : "on", r = e ? "removeEventListener" : "addEventListener",
                    i = "container" === v.params.touchEventsTarget ? v.container[0] : v.wrapper[0],
                    n = v.support.touch ? i : document, o = v.params.nested ? !0 : !1;
                v.browser.ie ? (i[r](v.touchEvents.start, v.onTouchStart, !1), n[r](v.touchEvents.move, v.onTouchMove, o), n[r](v.touchEvents.end, v.onTouchEnd, !1)) : (v.support.touch && (i[r](v.touchEvents.start, v.onTouchStart, !1), i[r](v.touchEvents.move, v.onTouchMove, o), i[r](v.touchEvents.end, v.onTouchEnd, !1)), !s.simulateTouch || v.device.ios || v.device.android || (i[r]("mousedown", v.onTouchStart, !1), document[r]("mousemove", v.onTouchMove, o), document[r]("mouseup", v.onTouchEnd, !1))), window[r]("resize", v.onResize), v.params.nextButton && (a(v.params.nextButton)[t]("click", v.onClickNext), v.params.a11y && v.a11y && a(v.params.nextButton)[t]("keydown", v.a11y.onEnterKey)), v.params.prevButton && (a(v.params.prevButton)[t]("click", v.onClickPrev), v.params.a11y && v.a11y && a(v.params.prevButton)[t]("keydown", v.a11y.onEnterKey)), v.params.pagination && v.params.paginationClickable && (a(v.paginationContainer)[t]("click", "." + v.params.bulletClass, v.onClickIndex), v.params.a11y && v.a11y && a(v.paginationContainer)[t]("keydown", "." + v.params.bulletClass, v.a11y.onEnterKey)), (v.params.preventClicks || v.params.preventClicksPropagation) && i[r]("click", v.preventClicks, !0)
            }, v.attachEvents = function (e) {
                v.initEvents()
            }, v.detachEvents = function () {
                v.initEvents(!0)
            }, v.allowClick = !0, v.preventClicks = function (e) {
                v.allowClick || (v.params.preventClicks && e.preventDefault(), v.params.preventClicksPropagation && v.animating && (e.stopPropagation(), e.stopImmediatePropagation()))
            }, v.onClickNext = function (e) {
                e.preventDefault(), (!v.isEnd || v.params.loop) && v.slideNext()
            }, v.onClickPrev = function (e) {
                e.preventDefault(), (!v.isBeginning || v.params.loop) && v.slidePrev()
            }, v.onClickIndex = function (e) {
                e.preventDefault();
                var t = a(this).index() * v.params.slidesPerGroup;
                v.params.loop && (t += v.loopedSlides), v.slideTo(t)
            }, v.updateClickedSlide = function (e) {
                var t = o(e, "." + v.params.slideClass), s = !1;
                if (t)for (var r = 0; r < v.slides.length; r++)v.slides[r] === t && (s = !0);
                if (!t || !s)return v.clickedSlide = void 0, void(v.clickedIndex = void 0);
                if (v.clickedSlide = t, v.clickedIndex = a(t).index(), v.params.slideToClickedSlide && void 0 !== v.clickedIndex && v.clickedIndex !== v.activeIndex) {
                    var i, n = v.clickedIndex;
                    if (v.params.loop) {
                        if (v.animating)return;
                        i = a(v.clickedSlide).attr("data-swiper-slide-index"), v.params.centeredSlides ? n < v.loopedSlides - v.params.slidesPerView / 2 || n > v.slides.length - v.loopedSlides + v.params.slidesPerView / 2 ? (v.fixLoop(), n = v.wrapper.children("." + v.params.slideClass + '[data-swiper-slide-index="' + i + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function () {
                            v.slideTo(n)
                        }, 0)) : v.slideTo(n) : n > v.slides.length - v.params.slidesPerView ? (v.fixLoop(), n = v.wrapper.children("." + v.params.slideClass + '[data-swiper-slide-index="' + i + '"]:not(.swiper-slide-duplicate)').eq(0).index(), setTimeout(function () {
                            v.slideTo(n)
                        }, 0)) : v.slideTo(n)
                    } else v.slideTo(n)
                }
            };
            var y, b, T, x, S, C, M, P, z, I = "input, select, textarea, button", E = Date.now(), k = [];
            v.animating = !1, v.touches = {startX: 0, startY: 0, currentX: 0, currentY: 0, diff: 0};
            var D, L;
            if (v.onTouchStart = function (e) {
                    if (e.originalEvent && (e = e.originalEvent), D = "touchstart" === e.type, D || !("which" in e) || 3 !== e.which) {
                        if (v.params.noSwiping && o(e, "." + v.params.noSwipingClass))return void(v.allowClick = !0);
                        if (!v.params.swipeHandler || o(e, v.params.swipeHandler)) {
                            var t = v.touches.currentX = "touchstart" === e.type ? e.targetTouches[0].pageX : e.pageX,
                                s = v.touches.currentY = "touchstart" === e.type ? e.targetTouches[0].pageY : e.pageY;
                            if (!(v.device.ios && v.params.iOSEdgeSwipeDetection && t <= v.params.iOSEdgeSwipeThreshold)) {
                                if (y = !0, b = !1, x = void 0, L = void 0, v.touches.startX = t, v.touches.startY = s, T = Date.now(), v.allowClick = !0, v.updateContainerSize(), v.swipeDirection = void 0, v.params.threshold > 0 && (M = !1), "touchstart" !== e.type) {
                                    var r = !0;
                                    a(e.target).is(I) && (r = !1), document.activeElement && a(document.activeElement).is(I) && document.activeElement.blur(), r && e.preventDefault()
                                }
                                v.emit("onTouchStart", v, e)
                            }
                        }
                    }
                }, v.onTouchMove = function (e) {
                    if (e.originalEvent && (e = e.originalEvent), !(D && "mousemove" === e.type || e.preventedByNestedSwiper)) {
                        if (v.params.onlyExternal)return v.allowClick = !1, void(y && (v.touches.startX = v.touches.currentX = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX, v.touches.startY = v.touches.currentY = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY, T = Date.now()));
                        if (D && document.activeElement && e.target === document.activeElement && a(e.target).is(I))return b = !0, void(v.allowClick = !1);
                        if (v.emit("onTouchMove", v, e), !(e.targetTouches && e.targetTouches.length > 1)) {
                            if (v.touches.currentX = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX, v.touches.currentY = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY, "undefined" == typeof x) {
                                var t = 180 * Math.atan2(Math.abs(v.touches.currentY - v.touches.startY), Math.abs(v.touches.currentX - v.touches.startX)) / Math.PI;
                                x = r() ? t > v.params.touchAngle : 90 - t > v.params.touchAngle
                            }
                            if (x && v.emit("onTouchMoveOpposite", v, e), "undefined" == typeof L && v.browser.ieTouch && (v.touches.currentX !== v.touches.startX || v.touches.currentY !== v.touches.startY) && (L = !0), y) {
                                if (x)return void(y = !1);
                                if (L || !v.browser.ieTouch) {
                                    v.allowClick = !1, v.emit("onSliderMove", v, e), e.preventDefault(), v.params.touchMoveStopPropagation && !v.params.nested && e.stopPropagation(), b || (s.loop && v.fixLoop(), C = v.getWrapperTranslate(), v.setWrapperTransition(0), v.animating && v.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"), v.params.autoplay && v.autoplaying && (v.params.autoplayDisableOnInteraction ? v.stopAutoplay() : v.pauseAutoplay()), z = !1, v.params.grabCursor && (v.container[0].style.cursor = "move", v.container[0].style.cursor = "-webkit-grabbing", v.container[0].style.cursor = "-moz-grabbin", v.container[0].style.cursor = "grabbing")), b = !0;
                                    var i = v.touches.diff = r() ? v.touches.currentX - v.touches.startX : v.touches.currentY - v.touches.startY;
                                    i *= v.params.touchRatio, v.rtl && (i = -i), v.swipeDirection = i > 0 ? "prev" : "next", S = i + C;
                                    var n = !0;
                                    if (i > 0 && S > v.minTranslate() ? (n = !1, v.params.resistance && (S = v.minTranslate() - 1 + Math.pow(-v.minTranslate() + C + i, v.params.resistanceRatio))) : 0 > i && S < v.maxTranslate() && (n = !1, v.params.resistance && (S = v.maxTranslate() + 1 - Math.pow(v.maxTranslate() - C - i, v.params.resistanceRatio))), n && (e.preventedByNestedSwiper = !0), !v.params.allowSwipeToNext && "next" === v.swipeDirection && C > S && (S = C), !v.params.allowSwipeToPrev && "prev" === v.swipeDirection && S > C && (S = C), v.params.followFinger) {
                                        if (v.params.threshold > 0) {
                                            if (!(Math.abs(i) > v.params.threshold || M))return void(S = C);
                                            if (!M)return M = !0, v.touches.startX = v.touches.currentX, v.touches.startY = v.touches.currentY, S = C, void(v.touches.diff = r() ? v.touches.currentX - v.touches.startX : v.touches.currentY - v.touches.startY)
                                        }
                                        (v.params.freeMode || v.params.watchSlidesProgress) && v.updateActiveIndex(), v.params.freeMode && (0 === k.length && k.push({
                                            position: v.touches[r() ? "startX" : "startY"],
                                            time: T
                                        }), k.push({
                                            position: v.touches[r() ? "currentX" : "currentY"],
                                            time: (new window.Date).getTime()
                                        })), v.updateProgress(S), v.setWrapperTranslate(S)
                                    }
                                }
                            }
                        }
                    }
                }, v.onTouchEnd = function (e) {
                    if (e.originalEvent && (e = e.originalEvent), v.emit("onTouchEnd", v, e), y) {
                        v.params.grabCursor && b && y && (v.container[0].style.cursor = "move", v.container[0].style.cursor = "-webkit-grab", v.container[0].style.cursor = "-moz-grab", v.container[0].style.cursor = "grab");
                        var t = Date.now(), s = t - T;
                        if (v.allowClick && (v.updateClickedSlide(e), v.emit("onTap", v, e), 300 > s && t - E > 300 && (P && clearTimeout(P), P = setTimeout(function () {
                                v && (v.params.paginationHide && v.paginationContainer.length > 0 && !a(e.target).hasClass(v.params.bulletClass) && v.paginationContainer.toggleClass(v.params.paginationHiddenClass), v.emit("onClick", v, e))
                            }, 300)), 300 > s && 300 > t - E && (P && clearTimeout(P), v.emit("onDoubleTap", v, e))), E = Date.now(), setTimeout(function () {
                                v && (v.allowClick = !0)
                            }, 0), !y || !b || !v.swipeDirection || 0 === v.touches.diff || S === C)return void(y = b = !1);
                        y = b = !1;
                        var r;
                        if (r = v.params.followFinger ? v.rtl ? v.translate : -v.translate : -S, v.params.freeMode) {
                            if (r < -v.minTranslate())return void v.slideTo(v.activeIndex);
                            if (r > -v.maxTranslate())return void(v.slides.length < v.snapGrid.length ? v.slideTo(v.snapGrid.length - 1) : v.slideTo(v.slides.length - 1));
                            if (v.params.freeModeMomentum) {
                                if (k.length > 1) {
                                    var i = k.pop(), n = k.pop(), o = i.position - n.position, l = i.time - n.time;
                                    v.velocity = o / l, v.velocity = v.velocity / 2, Math.abs(v.velocity) < v.params.freeModeMinimumVelocity && (v.velocity = 0), (l > 150 || (new window.Date).getTime() - i.time > 300) && (v.velocity = 0)
                                } else v.velocity = 0;
                                k.length = 0;
                                var p = 1e3 * v.params.freeModeMomentumRatio, d = v.velocity * p, c = v.translate + d;
                                v.rtl && (c = -c);
                                var u, m = !1, f = 20 * Math.abs(v.velocity) * v.params.freeModeMomentumBounceRatio;
                                if (c < v.maxTranslate()) v.params.freeModeMomentumBounce ? (c + v.maxTranslate() < -f && (c = v.maxTranslate() - f), u = v.maxTranslate(), m = !0, z = !0) : c = v.maxTranslate(); else if (c > v.minTranslate()) v.params.freeModeMomentumBounce ? (c - v.minTranslate() > f && (c = v.minTranslate() + f), u = v.minTranslate(), m = !0, z = !0) : c = v.minTranslate(); else if (v.params.freeModeSticky) {
                                    var h, g = 0;
                                    for (g = 0; g < v.snapGrid.length; g += 1)if (v.snapGrid[g] > -c) {
                                        h = g;
                                        break
                                    }
                                    c = Math.abs(v.snapGrid[h] - c) < Math.abs(v.snapGrid[h - 1] - c) || "next" === v.swipeDirection ? v.snapGrid[h] : v.snapGrid[h - 1], v.rtl || (c = -c)
                                }
                                if (0 !== v.velocity) p = v.rtl ? Math.abs((-c - v.translate) / v.velocity) : Math.abs((c - v.translate) / v.velocity); else if (v.params.freeModeSticky)return void v.slideReset();
                                v.params.freeModeMomentumBounce && m ? (v.updateProgress(u), v.setWrapperTransition(p), v.setWrapperTranslate(c), v.onTransitionStart(), v.animating = !0, v.wrapper.transitionEnd(function () {
                                    v && z && (v.emit("onMomentumBounce", v), v.setWrapperTransition(v.params.speed), v.setWrapperTranslate(u), v.wrapper.transitionEnd(function () {
                                        v && v.onTransitionEnd()
                                    }))
                                })) : v.velocity ? (v.updateProgress(c), v.setWrapperTransition(p), v.setWrapperTranslate(c), v.onTransitionStart(), v.animating || (v.animating = !0, v.wrapper.transitionEnd(function () {
                                    v && v.onTransitionEnd()
                                }))) : v.updateProgress(c), v.updateActiveIndex()
                            }
                            return void((!v.params.freeModeMomentum || s >= v.params.longSwipesMs) && (v.updateProgress(), v.updateActiveIndex()))
                        }
                        var w, x = 0, M = v.slidesSizesGrid[0];
                        for (w = 0; w < v.slidesGrid.length; w += v.params.slidesPerGroup)"undefined" != typeof v.slidesGrid[w + v.params.slidesPerGroup] ? r >= v.slidesGrid[w] && r < v.slidesGrid[w + v.params.slidesPerGroup] && (x = w, M = v.slidesGrid[w + v.params.slidesPerGroup] - v.slidesGrid[w]) : r >= v.slidesGrid[w] && (x = w, M = v.slidesGrid[v.slidesGrid.length - 1] - v.slidesGrid[v.slidesGrid.length - 2]);
                        var I = (r - v.slidesGrid[x]) / M;
                        if (s > v.params.longSwipesMs) {
                            if (!v.params.longSwipes)return void v.slideTo(v.activeIndex);
                            "next" === v.swipeDirection && (I >= v.params.longSwipesRatio ? v.slideTo(x + v.params.slidesPerGroup) : v.slideTo(x)), "prev" === v.swipeDirection && (I > 1 - v.params.longSwipesRatio ? v.slideTo(x + v.params.slidesPerGroup) : v.slideTo(x))
                        } else {
                            if (!v.params.shortSwipes)return void v.slideTo(v.activeIndex);
                            "next" === v.swipeDirection && v.slideTo(x + v.params.slidesPerGroup), "prev" === v.swipeDirection && v.slideTo(x)
                        }
                    }
                }, v._slideTo = function (e, a) {
                    return v.slideTo(e, a, !0, !0)
                }, v.slideTo = function (e, a, t, s) {
                    "undefined" == typeof t && (t = !0), "undefined" == typeof e && (e = 0), 0 > e && (e = 0), v.snapIndex = Math.floor(e / v.params.slidesPerGroup), v.snapIndex >= v.snapGrid.length && (v.snapIndex = v.snapGrid.length - 1);
                    var i = -v.snapGrid[v.snapIndex];
                    v.params.autoplay && v.autoplaying && (s || !v.params.autoplayDisableOnInteraction ? v.pauseAutoplay(a) : v.stopAutoplay()), v.updateProgress(i);
                    for (var n = 0; n < v.slidesGrid.length; n++)-Math.floor(100 * i) >= Math.floor(100 * v.slidesGrid[n]) && (e = n);
                    if (!v.params.allowSwipeToNext && i < v.translate && i < v.minTranslate())return !1;
                    if (!v.params.allowSwipeToPrev && i > v.translate && i > v.maxTranslate() && (v.activeIndex || 0) !== e)return !1;
                    if ("undefined" == typeof a && (a = v.params.speed), v.previousIndex = v.activeIndex || 0, v.activeIndex = e, i === v.translate)return v.updateClasses(), !1;
                    v.updateClasses(), v.onTransitionStart(t);
                    r() ? i : 0, r() ? 0 : i;
                    return 0 === a ? (v.setWrapperTransition(0), v.setWrapperTranslate(i), v.onTransitionEnd(t)) : (v.setWrapperTransition(a), v.setWrapperTranslate(i), v.animating || (v.animating = !0, v.wrapper.transitionEnd(function () {
                        v && v.onTransitionEnd(t)
                    }))), !0
                }, v.onTransitionStart = function (e) {
                    "undefined" == typeof e && (e = !0), v.lazy && v.lazy.onTransitionStart(), e && (v.emit("onTransitionStart", v), v.activeIndex !== v.previousIndex && v.emit("onSlideChangeStart", v))
                }, v.onTransitionEnd = function (e) {
                    v.animating = !1, v.setWrapperTransition(0), "undefined" == typeof e && (e = !0), v.lazy && v.lazy.onTransitionEnd(), e && (v.emit("onTransitionEnd", v), v.activeIndex !== v.previousIndex && v.emit("onSlideChangeEnd", v)), v.params.hashnav && v.hashnav && v.hashnav.setHash()
                }, v.slideNext = function (e, a, t) {
                    if (v.params.loop) {
                        if (v.animating)return !1;
                        v.fixLoop();
                        v.container[0].clientLeft;
                        return v.slideTo(v.activeIndex + v.params.slidesPerGroup, a, e, t)
                    }
                    return v.slideTo(v.activeIndex + v.params.slidesPerGroup, a, e, t)
                }, v._slideNext = function (e) {
                    return v.slideNext(!0, e, !0)
                }, v.slidePrev = function (e, a, t) {
                    if (v.params.loop) {
                        if (v.animating)return !1;
                        v.fixLoop();
                        v.container[0].clientLeft;
                        return v.slideTo(v.activeIndex - 1, a, e, t)
                    }
                    return v.slideTo(v.activeIndex - 1, a, e, t)
                }, v._slidePrev = function (e) {
                    return v.slidePrev(!0, e, !0)
                }, v.slideReset = function (e, a, t) {
                    return v.slideTo(v.activeIndex, a, e)
                }, v.setWrapperTransition = function (e, a) {
                    v.wrapper.transition(e), "slide" !== v.params.effect && v.effects[v.params.effect] && v.effects[v.params.effect].setTransition(e), v.params.parallax && v.parallax && v.parallax.setTransition(e), v.params.scrollbar && v.scrollbar && v.scrollbar.setTransition(e), v.params.control && v.controller && v.controller.setTransition(e, a), v.emit("onSetTransition", v, e)
                }, v.setWrapperTranslate = function (e, a, t) {
                    var s = 0, n = 0, o = 0;
                    r() ? s = v.rtl ? -e : e : n = e, v.params.roundLengths && (s = i(s), n = i(n)), v.params.virtualTranslate || (v.support.transforms3d ? v.wrapper.transform("translate3d(" + s + "px, " + n + "px, " + o + "px)") : v.wrapper.transform("translate(" + s + "px, " + n + "px)")), v.translate = r() ? s : n, a && v.updateActiveIndex(), "slide" !== v.params.effect && v.effects[v.params.effect] && v.effects[v.params.effect].setTranslate(v.translate), v.params.parallax && v.parallax && v.parallax.setTranslate(v.translate), v.params.scrollbar && v.scrollbar && v.scrollbar.setTranslate(v.translate), v.params.control && v.controller && v.controller.setTranslate(v.translate, t), v.emit("onSetTranslate", v, v.translate)
                }, v.getTranslate = function (e, a) {
                    var t, s, r, i;
                    return "undefined" == typeof a && (a = "x"), v.params.virtualTranslate ? v.rtl ? -v.translate : v.translate : (r = window.getComputedStyle(e, null), window.WebKitCSSMatrix ? (s = r.transform || r.webkitTransform, s.split(",").length > 6 && (s = s.split(", ").map(function (e) {
                        return e.replace(",", ".")
                    }).join(", ")), i = new window.WebKitCSSMatrix("none" === s ? "" : s)) : (i = r.MozTransform || r.OTransform || r.MsTransform || r.msTransform || r.transform || r.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), t = i.toString().split(",")), "x" === a && (s = window.WebKitCSSMatrix ? i.m41 : 16 === t.length ? parseFloat(t[12]) : parseFloat(t[4])), "y" === a && (s = window.WebKitCSSMatrix ? i.m42 : 16 === t.length ? parseFloat(t[13]) : parseFloat(t[5])), v.rtl && s && (s = -s), s || 0)
                }, v.getWrapperTranslate = function (e) {
                    return "undefined" == typeof e && (e = r() ? "x" : "y"), v.getTranslate(v.wrapper[0], e)
                }, v.observers = [], v.initObservers = function () {
                    if (v.params.observeParents)for (var e = v.container.parents(), a = 0; a < e.length; a++)l(e[a]);
                    l(v.container[0], {childList: !1}), l(v.wrapper[0], {attributes: !1})
                }, v.disconnectObservers = function () {
                    for (var e = 0; e < v.observers.length; e++)v.observers[e].disconnect();
                    v.observers = []
                }, v.createLoop = function () {
                    v.wrapper.children("." + v.params.slideClass + "." + v.params.slideDuplicateClass).remove();
                    var e = v.wrapper.children("." + v.params.slideClass);
                    "auto" !== v.params.slidesPerView || v.params.loopedSlides || (v.params.loopedSlides = e.length), v.loopedSlides = parseInt(v.params.loopedSlides || v.params.slidesPerView, 10), v.loopedSlides = v.loopedSlides + v.params.loopAdditionalSlides, v.loopedSlides > e.length && (v.loopedSlides = e.length);
                    var t, s = [], r = [];
                    for (e.each(function (t, i) {
                        var n = a(this);
                        t < v.loopedSlides && r.push(i), t < e.length && t >= e.length - v.loopedSlides && s.push(i), n.attr("data-swiper-slide-index", t)
                    }), t = 0; t < r.length; t++)v.wrapper.append(a(r[t].cloneNode(!0)).addClass(v.params.slideDuplicateClass));
                    for (t = s.length - 1; t >= 0; t--)v.wrapper.prepend(a(s[t].cloneNode(!0)).addClass(v.params.slideDuplicateClass))
                }, v.destroyLoop = function () {
                    v.wrapper.children("." + v.params.slideClass + "." + v.params.slideDuplicateClass).remove(), v.slides.removeAttr("data-swiper-slide-index")
                }, v.fixLoop = function () {
                    var e;
                    v.activeIndex < v.loopedSlides ? (e = v.slides.length - 3 * v.loopedSlides + v.activeIndex, e += v.loopedSlides, v.slideTo(e, 0, !1, !0)) : ("auto" === v.params.slidesPerView && v.activeIndex >= 2 * v.loopedSlides || v.activeIndex > v.slides.length - 2 * v.params.slidesPerView) && (e = -v.slides.length + v.activeIndex + v.loopedSlides, e += v.loopedSlides, v.slideTo(e, 0, !1, !0))
                }, v.appendSlide = function (e) {
                    if (v.params.loop && v.destroyLoop(), "object" == typeof e && e.length)for (var a = 0; a < e.length; a++)e[a] && v.wrapper.append(e[a]); else v.wrapper.append(e);
                    v.params.loop && v.createLoop(), v.params.observer && v.support.observer || v.update(!0)
                }, v.prependSlide = function (e) {
                    v.params.loop && v.destroyLoop();
                    var a = v.activeIndex + 1;
                    if ("object" == typeof e && e.length) {
                        for (var t = 0; t < e.length; t++)e[t] && v.wrapper.prepend(e[t]);
                        a = v.activeIndex + e.length
                    } else v.wrapper.prepend(e);
                    v.params.loop && v.createLoop(), v.params.observer && v.support.observer || v.update(!0), v.slideTo(a, 0, !1)
                }, v.removeSlide = function (e) {
                    v.params.loop && (v.destroyLoop(), v.slides = v.wrapper.children("." + v.params.slideClass));
                    var a, t = v.activeIndex;
                    if ("object" == typeof e && e.length) {
                        for (var s = 0; s < e.length; s++)a = e[s], v.slides[a] && v.slides.eq(a).remove(), t > a && t--;
                        t = Math.max(t, 0)
                    } else a = e, v.slides[a] && v.slides.eq(a).remove(), t > a && t--, t = Math.max(t, 0);
                    v.params.loop && v.createLoop(), v.params.observer && v.support.observer || v.update(!0), v.params.loop ? v.slideTo(t + v.loopedSlides, 0, !1) : v.slideTo(t, 0, !1)
                }, v.removeAllSlides = function () {
                    for (var e = [], a = 0; a < v.slides.length; a++)e.push(a);
                    v.removeSlide(e)
                }, v.effects = {
                    fade: {
                        setTranslate: function () {
                            for (var e = 0; e < v.slides.length; e++) {
                                var a = v.slides.eq(e), t = a[0].swiperSlideOffset, s = -t;
                                v.params.virtualTranslate || (s -= v.translate);
                                var i = 0;
                                r() || (i = s, s = 0);
                                var n = v.params.fade.crossFade ? Math.max(1 - Math.abs(a[0].progress), 0) : 1 + Math.min(Math.max(a[0].progress, -1), 0);
                                a.css({opacity: n}).transform("translate3d(" + s + "px, " + i + "px, 0px)")
                            }
                        }, setTransition: function (e) {
                            if (v.slides.transition(e), v.params.virtualTranslate && 0 !== e) {
                                var a = !1;
                                v.slides.transitionEnd(function () {
                                    if (!a && v) {
                                        a = !0, v.animating = !1;
                                        for (var e = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], t = 0; t < e.length; t++)v.wrapper.trigger(e[t])
                                    }
                                })
                            }
                        }
                    }, cube: {
                        setTranslate: function () {
                            var e, t = 0;
                            v.params.cube.shadow && (r() ? (e = v.wrapper.find(".swiper-cube-shadow"), 0 === e.length && (e = a('<div class="swiper-cube-shadow"></div>'), v.wrapper.append(e)), e.css({height: v.width + "px"})) : (e = v.container.find(".swiper-cube-shadow"), 0 === e.length && (e = a('<div class="swiper-cube-shadow"></div>'), v.container.append(e))));
                            for (var s = 0; s < v.slides.length; s++) {
                                var i = v.slides.eq(s), n = 90 * s, o = Math.floor(n / 360);
                                v.rtl && (n = -n, o = Math.floor(-n / 360));
                                var l = Math.max(Math.min(i[0].progress, 1), -1), p = 0, d = 0, c = 0;
                                s % 4 === 0 ? (p = 4 * -o * v.size, c = 0) : (s - 1) % 4 === 0 ? (p = 0, c = 4 * -o * v.size) : (s - 2) % 4 === 0 ? (p = v.size + 4 * o * v.size, c = v.size) : (s - 3) % 4 === 0 && (p = -v.size, c = 3 * v.size + 4 * v.size * o), v.rtl && (p = -p), r() || (d = p, p = 0);
                                var u = "rotateX(" + (r() ? 0 : -n) + "deg) rotateY(" + (r() ? n : 0) + "deg) translate3d(" + p + "px, " + d + "px, " + c + "px)";
                                if (1 >= l && l > -1 && (t = 90 * s + 90 * l, v.rtl && (t = 90 * -s - 90 * l)), i.transform(u), v.params.cube.slideShadows) {
                                    var m = r() ? i.find(".swiper-slide-shadow-left") : i.find(".swiper-slide-shadow-top"),
                                        f = r() ? i.find(".swiper-slide-shadow-right") : i.find(".swiper-slide-shadow-bottom");
                                    0 === m.length && (m = a('<div class="swiper-slide-shadow-' + (r() ? "left" : "top") + '"></div>'), i.append(m)), 0 === f.length && (f = a('<div class="swiper-slide-shadow-' + (r() ? "right" : "bottom") + '"></div>'), i.append(f));
                                    i[0].progress;
                                    m.length && (m[0].style.opacity = -i[0].progress), f.length && (f[0].style.opacity = i[0].progress)
                                }
                            }
                            if (v.wrapper.css({
                                    "-webkit-transform-origin": "50% 50% -" + v.size / 2 + "px",
                                    "-moz-transform-origin": "50% 50% -" + v.size / 2 + "px",
                                    "-ms-transform-origin": "50% 50% -" + v.size / 2 + "px",
                                    "transform-origin": "50% 50% -" + v.size / 2 + "px"
                                }), v.params.cube.shadow)if (r()) e.transform("translate3d(0px, " + (v.width / 2 + v.params.cube.shadowOffset) + "px, " + -v.width / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + v.params.cube.shadowScale + ")"); else {
                                var h = Math.abs(t) - 90 * Math.floor(Math.abs(t) / 90),
                                    g = 1.5 - (Math.sin(2 * h * Math.PI / 360) / 2 + Math.cos(2 * h * Math.PI / 360) / 2),
                                    w = v.params.cube.shadowScale, y = v.params.cube.shadowScale / g,
                                    b = v.params.cube.shadowOffset;
                                e.transform("scale3d(" + w + ", 1, " + y + ") translate3d(0px, " + (v.height / 2 + b) + "px, " + -v.height / 2 / y + "px) rotateX(-90deg)")
                            }
                            var T = v.isSafari || v.isUiWebView ? -v.size / 2 : 0;
                            v.wrapper.transform("translate3d(0px,0," + T + "px) rotateX(" + (r() ? 0 : t) + "deg) rotateY(" + (r() ? -t : 0) + "deg)")
                        }, setTransition: function (e) {
                            v.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), v.params.cube.shadow && !r() && v.container.find(".swiper-cube-shadow").transition(e)
                        }
                    }, coverflow: {
                        setTranslate: function () {
                            for (var e = v.translate, t = r() ? -e + v.width / 2 : -e + v.height / 2, s = r() ? v.params.coverflow.rotate : -v.params.coverflow.rotate, i = v.params.coverflow.depth, n = 0, o = v.slides.length; o > n; n++) {
                                var l = v.slides.eq(n), p = v.slidesSizesGrid[n], d = l[0].swiperSlideOffset,
                                    c = (t - d - p / 2) / p * v.params.coverflow.modifier, u = r() ? s * c : 0,
                                    m = r() ? 0 : s * c, f = -i * Math.abs(c),
                                    h = r() ? 0 : v.params.coverflow.stretch * c,
                                    g = r() ? v.params.coverflow.stretch * c : 0;
                                Math.abs(g) < .001 && (g = 0), Math.abs(h) < .001 && (h = 0), Math.abs(f) < .001 && (f = 0), Math.abs(u) < .001 && (u = 0), Math.abs(m) < .001 && (m = 0);
                                var w = "translate3d(" + g + "px," + h + "px," + f + "px)  rotateX(" + m + "deg) rotateY(" + u + "deg)";
                                if (l.transform(w), l[0].style.zIndex = -Math.abs(Math.round(c)) + 1, v.params.coverflow.slideShadows) {
                                    var y = r() ? l.find(".swiper-slide-shadow-left") : l.find(".swiper-slide-shadow-top"),
                                        b = r() ? l.find(".swiper-slide-shadow-right") : l.find(".swiper-slide-shadow-bottom");
                                    0 === y.length && (y = a('<div class="swiper-slide-shadow-' + (r() ? "left" : "top") + '"></div>'), l.append(y)), 0 === b.length && (b = a('<div class="swiper-slide-shadow-' + (r() ? "right" : "bottom") + '"></div>'), l.append(b)), y.length && (y[0].style.opacity = c > 0 ? c : 0), b.length && (b[0].style.opacity = -c > 0 ? -c : 0)
                                }
                            }
                            if (v.browser.ie) {
                                var T = v.wrapper[0].style;
                                T.perspectiveOrigin = t + "px 50%"
                            }
                        }, setTransition: function (e) {
                            v.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)
                        }
                    }
                }, v.lazy = {
                    initialImageLoaded: !1, loadImageInSlide: function (e, t) {
                        if ("undefined" != typeof e && ("undefined" == typeof t && (t = !0), 0 !== v.slides.length)) {
                            var s = v.slides.eq(e),
                                r = s.find(".swiper-lazy:not(.swiper-lazy-loaded):not(.swiper-lazy-loading)");
                            !s.hasClass("swiper-lazy") || s.hasClass("swiper-lazy-loaded") || s.hasClass("swiper-lazy-loading") || (r = r.add(s[0])), 0 !== r.length && r.each(function () {
                                var e = a(this);
                                e.addClass("swiper-lazy-loading");
                                var r = e.attr("data-background"), i = e.attr("data-src"), n = e.attr("data-srcset");
                                v.loadImage(e[0], i || r, n, !1, function () {
                                    if (r ? (e.css("background-image", "url(" + r + ")"), e.removeAttr("data-background")) : (n && (e.attr("srcset", n), e.removeAttr("data-srcset")), i && (e.attr("src", i), e.removeAttr("data-src"))), e.addClass("swiper-lazy-loaded").removeClass("swiper-lazy-loading"), s.find(".swiper-lazy-preloader, .preloader").remove(), v.params.loop && t) {
                                        var a = s.attr("data-swiper-slide-index");
                                        if (s.hasClass(v.params.slideDuplicateClass)) {
                                            var o = v.wrapper.children('[data-swiper-slide-index="' + a + '"]:not(.' + v.params.slideDuplicateClass + ")");
                                            v.lazy.loadImageInSlide(o.index(), !1)
                                        } else {
                                            var l = v.wrapper.children("." + v.params.slideDuplicateClass + '[data-swiper-slide-index="' + a + '"]');
                                            v.lazy.loadImageInSlide(l.index(), !1)
                                        }
                                    }
                                    v.emit("onLazyImageReady", v, s[0], e[0])
                                }), v.emit("onLazyImageLoad", v, s[0], e[0])
                            })
                        }
                    }, load: function () {
                        var e;
                        if (v.params.watchSlidesVisibility) v.wrapper.children("." + v.params.slideVisibleClass).each(function () {
                            v.lazy.loadImageInSlide(a(this).index())
                        }); else if (v.params.slidesPerView > 1)for (e = v.activeIndex; e < v.activeIndex + v.params.slidesPerView; e++)v.slides[e] && v.lazy.loadImageInSlide(e); else v.lazy.loadImageInSlide(v.activeIndex);
                        if (v.params.lazyLoadingInPrevNext)if (v.params.slidesPerView > 1) {
                            for (e = v.activeIndex + v.params.slidesPerView; e < v.activeIndex + v.params.slidesPerView + v.params.slidesPerView; e++)v.slides[e] && v.lazy.loadImageInSlide(e);
                            for (e = v.activeIndex - v.params.slidesPerView; e < v.activeIndex; e++)v.slides[e] && v.lazy.loadImageInSlide(e)
                        } else {
                            var t = v.wrapper.children("." + v.params.slideNextClass);
                            t.length > 0 && v.lazy.loadImageInSlide(t.index());
                            var s = v.wrapper.children("." + v.params.slidePrevClass);
                            s.length > 0 && v.lazy.loadImageInSlide(s.index())
                        }
                    }, onTransitionStart: function () {
                        v.params.lazyLoading && (v.params.lazyLoadingOnTransitionStart || !v.params.lazyLoadingOnTransitionStart && !v.lazy.initialImageLoaded) && v.lazy.load()
                    }, onTransitionEnd: function () {
                        v.params.lazyLoading && !v.params.lazyLoadingOnTransitionStart && v.lazy.load()
                    }
                }, v.scrollbar = {
                    isTouched: !1, setDragPosition: function (e) {
                        var a = v.scrollbar,
                            t = r() ? "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX || e.clientX : "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY || e.clientY,
                            s = t - a.track.offset()[r() ? "left" : "top"] - a.dragSize / 2,
                            i = -v.minTranslate() * a.moveDivider, n = -v.maxTranslate() * a.moveDivider;
                        i > s ? s = i : s > n && (s = n), s = -s / a.moveDivider, v.updateProgress(s), v.setWrapperTranslate(s, !0)
                    }, dragStart: function (e) {
                        var a = v.scrollbar;
                        a.isTouched = !0, e.preventDefault(), e.stopPropagation(), a.setDragPosition(e), clearTimeout(a.dragTimeout), a.track.transition(0), v.params.scrollbarHide && a.track.css("opacity", 1), v.wrapper.transition(100), a.drag.transition(100), v.emit("onScrollbarDragStart", v)
                    }, dragMove: function (e) {
                        var a = v.scrollbar;
                        a.isTouched && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, a.setDragPosition(e), v.wrapper.transition(0), a.track.transition(0), a.drag.transition(0), v.emit("onScrollbarDragMove", v))
                    }, dragEnd: function (e) {
                        var a = v.scrollbar;
                        a.isTouched && (a.isTouched = !1, v.params.scrollbarHide && (clearTimeout(a.dragTimeout), a.dragTimeout = setTimeout(function () {
                            a.track.css("opacity", 0), a.track.transition(400)
                        }, 1e3)), v.emit("onScrollbarDragEnd", v), v.params.scrollbarSnapOnRelease && v.slideReset())
                    }, enableDraggable: function () {
                        var e = v.scrollbar, t = v.support.touch ? e.track : document;
                        a(e.track).on(v.touchEvents.start, e.dragStart), a(t).on(v.touchEvents.move, e.dragMove), a(t).on(v.touchEvents.end, e.dragEnd)
                    }, disableDraggable: function () {
                        var e = v.scrollbar, t = v.support.touch ? e.track : document;
                        a(e.track).off(v.touchEvents.start, e.dragStart), a(t).off(v.touchEvents.move, e.dragMove), a(t).off(v.touchEvents.end, e.dragEnd)
                    }, set: function () {
                        if (v.params.scrollbar) {
                            var e = v.scrollbar;
                            e.track = a(v.params.scrollbar), e.drag = e.track.find(".swiper-scrollbar-drag"), 0 === e.drag.length && (e.drag = a('<div class="swiper-scrollbar-drag"></div>'), e.track.append(e.drag)), e.drag[0].style.width = "", e.drag[0].style.height = "", e.trackSize = r() ? e.track[0].offsetWidth : e.track[0].offsetHeight, e.divider = v.size / v.virtualSize, e.moveDivider = e.divider * (e.trackSize / v.size), e.dragSize = e.trackSize * e.divider, r() ? e.drag[0].style.width = e.dragSize + "px" : e.drag[0].style.height = e.dragSize + "px", e.divider >= 1 ? e.track[0].style.display = "none" : e.track[0].style.display = "", v.params.scrollbarHide && (e.track[0].style.opacity = 0)
                        }
                    }, setTranslate: function () {
                        if (v.params.scrollbar) {
                            var e, a = v.scrollbar, t = (v.translate || 0, a.dragSize);
                            e = (a.trackSize - a.dragSize) * v.progress, v.rtl && r() ? (e = -e, e > 0 ? (t = a.dragSize - e, e = 0) : -e + a.dragSize > a.trackSize && (t = a.trackSize + e)) : 0 > e ? (t = a.dragSize + e, e = 0) : e + a.dragSize > a.trackSize && (t = a.trackSize - e), r() ? (v.support.transforms3d ? a.drag.transform("translate3d(" + e + "px, 0, 0)") : a.drag.transform("translateX(" + e + "px)"), a.drag[0].style.width = t + "px") : (v.support.transforms3d ? a.drag.transform("translate3d(0px, " + e + "px, 0)") : a.drag.transform("translateY(" + e + "px)"), a.drag[0].style.height = t + "px"), v.params.scrollbarHide && (clearTimeout(a.timeout), a.track[0].style.opacity = 1, a.timeout = setTimeout(function () {
                                a.track[0].style.opacity = 0, a.track.transition(400)
                            }, 1e3))
                        }
                    }, setTransition: function (e) {
                        v.params.scrollbar && v.scrollbar.drag.transition(e)
                    }
                }, v.controller = {
                    LinearSpline: function (e, a) {
                        this.x = e, this.y = a, this.lastIndex = e.length - 1;
                        var t, s;
                        this.x.length;
                        this.interpolate = function (e) {
                            return e ? (s = r(this.x, e), t = s - 1, (e - this.x[t]) * (this.y[s] - this.y[t]) / (this.x[s] - this.x[t]) + this.y[t]) : 0
                        };
                        var r = function () {
                            var e, a, t;
                            return function (s, r) {
                                for (a = -1, e = s.length; e - a > 1;)s[t = e + a >> 1] <= r ? a = t : e = t;
                                return e
                            }
                        }()
                    }, getInterpolateFunction: function (e) {
                        v.controller.spline || (v.controller.spline = v.params.loop ? new v.controller.LinearSpline(v.slidesGrid, e.slidesGrid) : new v.controller.LinearSpline(v.snapGrid, e.snapGrid))
                    }, setTranslate: function (e, a) {
                        function s(a) {
                            e = a.rtl && "horizontal" === a.params.direction ? -v.translate : v.translate, "slide" === v.params.controlBy && (v.controller.getInterpolateFunction(a), i = -v.controller.spline.interpolate(-e)), i && "container" !== v.params.controlBy || (r = (a.maxTranslate() - a.minTranslate()) / (v.maxTranslate() - v.minTranslate()), i = (e - v.minTranslate()) * r + a.minTranslate()), v.params.controlInverse && (i = a.maxTranslate() - i), a.updateProgress(i), a.setWrapperTranslate(i, !1, v), a.updateActiveIndex()
                        }

                        var r, i, n = v.params.control;
                        if (v.isArray(n))for (var o = 0; o < n.length; o++)n[o] !== a && n[o] instanceof t && s(n[o]); else n instanceof t && a !== n && s(n)
                    }, setTransition: function (e, a) {
                        function s(a) {
                            a.setWrapperTransition(e, v), 0 !== e && (a.onTransitionStart(), a.wrapper.transitionEnd(function () {
                                i && (a.params.loop && "slide" === v.params.controlBy && a.fixLoop(), a.onTransitionEnd())
                            }))
                        }

                        var r, i = v.params.control;
                        if (v.isArray(i))for (r = 0; r < i.length; r++)i[r] !== a && i[r] instanceof t && s(i[r]); else i instanceof t && a !== i && s(i)
                    }
                }, v.hashnav = {
                    init: function () {
                        if (v.params.hashnav) {
                            v.hashnav.initialized = !0;
                            var e = document.location.hash.replace("#", "");
                            if (e)for (var a = 0, t = 0, s = v.slides.length; s > t; t++) {
                                var r = v.slides.eq(t), i = r.attr("data-hash");
                                if (i === e && !r.hasClass(v.params.slideDuplicateClass)) {
                                    var n = r.index();
                                    v.slideTo(n, a, v.params.runCallbacksOnInit, !0)
                                }
                            }
                        }
                    }, setHash: function () {
                        v.hashnav.initialized && v.params.hashnav && (document.location.hash = v.slides.eq(v.activeIndex).attr("data-hash") || "")
                    }
                }, v.disableKeyboardControl = function () {
                    a(document).off("keydown", p)
                }, v.enableKeyboardControl = function () {
                    a(document).on("keydown", p)
                }, v.mousewheel = {
                    event: !1,
                    lastScrollTime: (new window.Date).getTime()
                }, v.params.mousewheelControl) {
                try {
                    new window.WheelEvent("wheel"), v.mousewheel.event = "wheel"
                } catch (G) {
                }
                v.mousewheel.event || void 0 === document.onmousewheel || (v.mousewheel.event = "mousewheel"), v.mousewheel.event || (v.mousewheel.event = "DOMMouseScroll")
            }
            v.disableMousewheelControl = function () {
                return v.mousewheel.event ? (v.container.off(v.mousewheel.event, d), !0) : !1
            }, v.enableMousewheelControl = function () {
                return v.mousewheel.event ? (v.container.on(v.mousewheel.event, d), !0) : !1
            }, v.parallax = {
                setTranslate: function () {
                    v.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                        c(this, v.progress)
                    }), v.slides.each(function () {
                        var e = a(this);
                        e.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                            var a = Math.min(Math.max(e[0].progress, -1), 1);
                            c(this, a)
                        })
                    })
                }, setTransition: function (e) {
                    "undefined" == typeof e && (e = v.params.speed), v.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function () {
                        var t = a(this), s = parseInt(t.attr("data-swiper-parallax-duration"), 10) || e;
                        0 === e && (s = 0), t.transition(s)
                    })
                }
            }, v._plugins = [];
            for (var B in v.plugins) {
                var O = v.plugins[B](v, v.params[B]);
                O && v._plugins.push(O)
            }
            return v.callPlugins = function (e) {
                for (var a = 0; a < v._plugins.length; a++)e in v._plugins[a] && v._plugins[a][e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            }, v.emitterEventListeners = {}, v.emit = function (e) {
                v.params[e] && v.params[e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                var a;
                if (v.emitterEventListeners[e])for (a = 0; a < v.emitterEventListeners[e].length; a++)v.emitterEventListeners[e][a](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                v.callPlugins && v.callPlugins(e, arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            }, v.on = function (e, a) {
                return e = u(e), v.emitterEventListeners[e] || (v.emitterEventListeners[e] = []), v.emitterEventListeners[e].push(a), v
            }, v.off = function (e, a) {
                var t;
                if (e = u(e), "undefined" == typeof a)return v.emitterEventListeners[e] = [], v;
                if (v.emitterEventListeners[e] && 0 !== v.emitterEventListeners[e].length) {
                    for (t = 0; t < v.emitterEventListeners[e].length; t++)v.emitterEventListeners[e][t] === a && v.emitterEventListeners[e].splice(t, 1);
                    return v
                }
            }, v.once = function (e, a) {
                e = u(e);
                var t = function () {
                    a(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]), v.off(e, t)
                };
                return v.on(e, t), v
            }, v.a11y = {
                makeFocusable: function (e) {
                    return e.attr("tabIndex", "0"), e
                },
                addRole: function (e, a) {
                    return e.attr("role", a), e
                },
                addLabel: function (e, a) {
                    return e.attr("aria-label", a), e
                },
                disable: function (e) {
                    return e.attr("aria-disabled", !0), e
                },
                enable: function (e) {
                    return e.attr("aria-disabled", !1), e
                },
                onEnterKey: function (e) {
                    13 === e.keyCode && (a(e.target).is(v.params.nextButton) ? (v.onClickNext(e), v.isEnd ? v.a11y.notify(v.params.lastSlideMessage) : v.a11y.notify(v.params.nextSlideMessage)) : a(e.target).is(v.params.prevButton) && (v.onClickPrev(e), v.isBeginning ? v.a11y.notify(v.params.firstSlideMessage) : v.a11y.notify(v.params.prevSlideMessage)), a(e.target).is("." + v.params.bulletClass) && a(e.target)[0].click())
                },
                liveRegion: a('<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>'),
                notify: function (e) {
                    var a = v.a11y.liveRegion;
                    0 !== a.length && (a.html(""), a.html(e))
                },
                init: function () {
                    if (v.params.nextButton) {
                        var e = a(v.params.nextButton);
                        v.a11y.makeFocusable(e), v.a11y.addRole(e, "button"), v.a11y.addLabel(e, v.params.nextSlideMessage)
                    }
                    if (v.params.prevButton) {
                        var t = a(v.params.prevButton);
                        v.a11y.makeFocusable(t), v.a11y.addRole(t, "button"), v.a11y.addLabel(t, v.params.prevSlideMessage)
                    }
                    a(v.container).append(v.a11y.liveRegion)
                },
                initPagination: function () {
                    v.params.pagination && v.params.paginationClickable && v.bullets && v.bullets.length && v.bullets.each(function () {
                        var e = a(this);
                        v.a11y.makeFocusable(e), v.a11y.addRole(e, "button"), v.a11y.addLabel(e, v.params.paginationBulletMessage.replace(/{{index}}/, e.index() + 1))
                    })
                },
                destroy: function () {
                    v.a11y.liveRegion && v.a11y.liveRegion.length > 0 && v.a11y.liveRegion.remove()
                }
            }, v.init = function () {
                v.params.loop && v.createLoop(), v.updateContainerSize(), v.updateSlidesSize(), v.updatePagination(), v.params.scrollbar && v.scrollbar && (v.scrollbar.set(), v.params.scrollbarDraggable && v.scrollbar.enableDraggable()), "slide" !== v.params.effect && v.effects[v.params.effect] && (v.params.loop || v.updateProgress(), v.effects[v.params.effect].setTranslate()), v.params.loop ? v.slideTo(v.params.initialSlide + v.loopedSlides, 0, v.params.runCallbacksOnInit) : (v.slideTo(v.params.initialSlide, 0, v.params.runCallbacksOnInit), 0 === v.params.initialSlide && (v.parallax && v.params.parallax && v.parallax.setTranslate(), v.lazy && v.params.lazyLoading && (v.lazy.load(), v.lazy.initialImageLoaded = !0))), v.attachEvents(), v.params.observer && v.support.observer && v.initObservers(), v.params.preloadImages && !v.params.lazyLoading && v.preloadImages(), v.params.autoplay && v.startAutoplay(), v.params.keyboardControl && v.enableKeyboardControl && v.enableKeyboardControl(), v.params.mousewheelControl && v.enableMousewheelControl && v.enableMousewheelControl(), v.params.hashnav && v.hashnav && v.hashnav.init(), v.params.a11y && v.a11y && v.a11y.init(), v.emit("onInit", v)
            }, v.cleanupStyles = function () {
                v.container.removeClass(v.classNames.join(" ")).removeAttr("style"), v.wrapper.removeAttr("style"), v.slides && v.slides.length && v.slides.removeClass([v.params.slideVisibleClass, v.params.slideActiveClass, v.params.slideNextClass, v.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row"), v.paginationContainer && v.paginationContainer.length && v.paginationContainer.removeClass(v.params.paginationHiddenClass), v.bullets && v.bullets.length && v.bullets.removeClass(v.params.bulletActiveClass), v.params.prevButton && a(v.params.prevButton).removeClass(v.params.buttonDisabledClass), v.params.nextButton && a(v.params.nextButton).removeClass(v.params.buttonDisabledClass), v.params.scrollbar && v.scrollbar && (v.scrollbar.track && v.scrollbar.track.length && v.scrollbar.track.removeAttr("style"), v.scrollbar.drag && v.scrollbar.drag.length && v.scrollbar.drag.removeAttr("style"))
            }, v.destroy = function (e, a) {
                v.detachEvents(), v.stopAutoplay(), v.params.scrollbar && v.scrollbar && v.params.scrollbarDraggable && v.scrollbar.disableDraggable(), v.params.loop && v.destroyLoop(), a && v.cleanupStyles(), v.disconnectObservers(), v.params.keyboardControl && v.disableKeyboardControl && v.disableKeyboardControl(), v.params.mousewheelControl && v.disableMousewheelControl && v.disableMousewheelControl(), v.params.a11y && v.a11y && v.a11y.destroy(), v.emit("onDestroy"), e !== !1 && (v = null)
            }, v.init(), v
        }
    };
    t.prototype = {
        isSafari: function () {
            var e = navigator.userAgent.toLowerCase();
            return e.indexOf("safari") >= 0 && e.indexOf("chrome") < 0 && e.indexOf("android") < 0
        }(),
        isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent),
        isArray: function (e) {
            return "[object Array]" === Object.prototype.toString.apply(e)
        },
        browser: {
            ie: window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
            ieTouch: window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 1 || window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 1
        },
        device: function () {
            var e = navigator.userAgent, a = e.match(/(Android);?[\s\/]+([\d.]+)?/),
                t = e.match(/(iPad).*OS\s([\d_]+)/), s = e.match(/(iPod)(.*OS\s([\d_]+))?/),
                r = !t && e.match(/(iPhone\sOS)\s([\d_]+)/);
            return {ios: t || r || s, android: a}
        }(),
        support: {
            touch: window.Modernizr && Modernizr.touch === !0 || function () {
                return !!("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)
            }(), transforms3d: window.Modernizr && Modernizr.csstransforms3d === !0 || function () {
                var e = document.createElement("div").style;
                return "webkitPerspective" in e || "MozPerspective" in e || "OPerspective" in e || "MsPerspective" in e || "perspective" in e
            }(), flexbox: function () {
                for (var e = document.createElement("div").style, a = "alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "), t = 0; t < a.length; t++)if (a[t] in e)return !0
            }(), observer: function () {
                return "MutationObserver" in window || "WebkitMutationObserver" in window
            }()
        },
        plugins: {}
    };
    for (var s = ["jQuery", "Zepto", "Dom7"], r = 0; r < s.length; r++)window[s[r]] && e(window[s[r]]);
    var i;
    i = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery : Dom7, i && ("transitionEnd" in i.fn || (i.fn.transitionEnd = function (e) {
        function a(i) {
            if (i.target === this)for (e.call(this, i), t = 0; t < s.length; t++)r.off(s[t], a)
        }

        var t, s = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
            r = this;
        if (e)for (t = 0; t < s.length; t++)r.on(s[t], a);
        return this
    }), "transform" in i.fn || (i.fn.transform = function (e) {
        for (var a = 0; a < this.length; a++) {
            var t = this[a].style;
            t.webkitTransform = t.MsTransform = t.msTransform = t.MozTransform = t.OTransform = t.transform = e
        }
        return this
    }), "transition" in i.fn || (i.fn.transition = function (e) {
        "string" != typeof e && (e += "ms");
        for (var a = 0; a < this.length; a++) {
            var t = this[a].style;
            t.webkitTransitionDuration = t.MsTransitionDuration = t.msTransitionDuration = t.MozTransitionDuration = t.OTransitionDuration = t.transitionDuration = e
        }
        return this
    })), window.Swiper = t
}(), "undefined" != typeof module ? module.exports = window.Swiper : "function" == typeof define && define.amd && define([], function () {
        "use strict";
        return window.Swiper
    });
//# sourceMappingURL=swiper/maps/swiper.jquery.min.js.map


(function () {/*
 OverlappingMarkerSpiderfier
 https://github.com/jawj/OverlappingMarkerSpiderfier
 Copyright (c) 2011 - 2012 George MacKerron
 Released under the MIT licence: http://opensource.org/licenses/mit-license
 Note: The Google Maps API v3 must be included *before* this code
 */
    var h = !0, u = null, v = !1;
    (function () {
        var A, B = {}.hasOwnProperty, C = [].slice;
        if (((A = this.google) != u ? A.maps : void 0) != u) this.OverlappingMarkerSpiderfier = function () {
            function w(b, d) {
                var a, g, f, e, c = this;
                this.map = b;
                d == u && (d = {});
                for (a in d)B.call(d, a) && (g = d[a], this[a] = g);
                this.e = new this.constructor.g(this.map);
                this.n();
                this.b = {};
                e = ["click", "zoom_changed", "maptypeid_changed"];
                g = 0;
                for (f = e.length; g < f; g++)a = e[g], p.addListener(this.map, a, function () {
                    return c.unspiderfy()
                })
            }

            var p, s, t, q, k, c, y, z;
            c = w.prototype;
            z = [w, c];
            q = 0;
            for (k = z.length; q < k; q++)t =
                z[q], t.VERSION = "0.3.3";
            s = google.maps;
            p = s.event;
            k = s.MapTypeId;
            y = 2 * Math.PI;
            c.keepSpiderfied = v;
            c.markersWontHide = v;
            c.markersWontMove = v;
            c.nearbyDistance = 20;
            c.circleSpiralSwitchover = 9;
            c.circleFootSeparation = 23;
            c.circleStartAngle = y / 12;
            c.spiralFootSeparation = 26;
            c.spiralLengthStart = 11;
            c.spiralLengthFactor = 4;
            c.spiderfiedZIndex = 1E3;
            c.usualLegZIndex = 10;
            c.highlightedLegZIndex = 20;
            c.legWeight = 1.5;
            c.legColors = {usual: {}, highlighted: {}};
            q = c.legColors.usual;
            t = c.legColors.highlighted;
            q[k.HYBRID] = q[k.SATELLITE] = "#fff";
            t[k.HYBRID] = t[k.SATELLITE] = "#f00";
            q[k.TERRAIN] = q[k.ROADMAP] = "#444";
            t[k.TERRAIN] = t[k.ROADMAP] = "#f00";
            c.n = function () {
                this.a = [];
                this.j = []
            };
            c.addMarker = function (b) {
                var d, a = this;
                if (b._oms != u)return this;
                b._oms = h;
                d = [p.addListener(b, "click", function (d) {
                    return a.F(b, d)
                })];
                this.markersWontHide || d.push(p.addListener(b, "visible_changed", function () {
                    return a.o(b, v)
                }));
                this.markersWontMove || d.push(p.addListener(b, "position_changed", function () {
                    return a.o(b, h)
                }));
                this.j.push(d);
                this.a.push(b);
                return this
            };
            c.o = function (b,
                            d) {
                if (b._omsData != u && (d || !b.getVisible()) && !(this.s != u || this.t != u))return this.unspiderfy(d ? b : u)
            };
            c.getMarkers = function () {
                return this.a.slice(0)
            };
            c.removeMarker = function (b) {
                var d, a, g, f, e;
                b._omsData != u && this.unspiderfy();
                d = this.m(this.a, b);
                if (0 > d)return this;
                g = this.j.splice(d, 1)[0];
                f = 0;
                for (e = g.length; f < e; f++)a = g[f], p.removeListener(a);
                delete b._oms;
                this.a.splice(d, 1);
                return this
            };
            c.clearMarkers = function () {
                var b, d, a, g, f, e, c, m;
                this.unspiderfy();
                m = this.a;
                b = g = 0;
                for (e = m.length; g < e; b = ++g) {
                    a = m[b];
                    d = this.j[b];
                    f = 0;
                    for (c = d.length; f < c; f++)b = d[f], p.removeListener(b);
                    delete a._oms
                }
                this.n();
                return this
            };
            c.addListener = function (b, d) {
                var a, g;
                ((g = (a = this.b)[b]) != u ? g : a[b] = []).push(d);
                return this
            };
            c.removeListener = function (b, d) {
                var a;
                a = this.m(this.b[b], d);
                0 > a || this.b[b].splice(a, 1);
                return this
            };
            c.clearListeners = function (b) {
                this.b[b] = [];
                return this
            };
            c.trigger = function () {
                var b, d, a, g, f, e;
                d = arguments[0];
                b = 2 <= arguments.length ? C.call(arguments, 1) : [];
                d = (a = this.b[d]) != u ? a : [];
                e = [];
                g = 0;
                for (f = d.length; g < f; g++)a = d[g], e.push(a.apply(u,
                    b));
                return e
            };
            c.u = function (b, d) {
                var a, g, f, e, c;
                f = this.circleFootSeparation * (2 + b) / y;
                g = y / b;
                c = [];
                for (a = e = 0; 0 <= b ? e < b : e > b; a = 0 <= b ? ++e : --e)a = this.circleStartAngle + a * g, c.push(new s.Point(d.x + f * Math.cos(a), d.y + f * Math.sin(a)));
                return c
            };
            c.v = function (b, d) {
                var a, g, f, e, c;
                f = this.spiralLengthStart;
                a = 0;
                c = [];
                for (g = e = 0; 0 <= b ? e < b : e > b; g = 0 <= b ? ++e : --e)a += this.spiralFootSeparation / f + 5E-4 * g, g = new s.Point(d.x + f * Math.cos(a), d.y + f * Math.sin(a)), f += y * this.spiralLengthFactor / a, c.push(g);
                return c
            };
            c.F = function (b, d) {
                var a, g, f, e, c,
                    m, l, x, n;
                e = b._omsData != u;
                (!e || !this.keepSpiderfied) && this.unspiderfy();
                if (e || this.map.getStreetView().getVisible() || "GoogleEarthAPI" === this.map.getMapTypeId())return this.trigger("click", b, d);
                e = [];
                c = [];
                a = this.nearbyDistance;
                m = a * a;
                f = this.c(b.position);
                n = this.a;
                l = 0;
                for (x = n.length; l < x; l++)a = n[l], a.map != u && a.getVisible() && (g = this.c(a.position), this.f(g, f) < m ? e.push({
                    A: a,
                    p: g
                }) : c.push(a));
                return 1 === e.length ? this.trigger("click", b, d) : this.G(e, c)
            };
            c.markersNearMarker = function (b, d) {
                var a, g, f, e, c, m, l, x, n, p;
                d == u && (d = v);
                if (this.e.getProjection() == u)throw"Must wait for 'idle' event on map before calling markersNearMarker";
                a = this.nearbyDistance;
                c = a * a;
                f = this.c(b.position);
                e = [];
                x = this.a;
                m = 0;
                for (l = x.length; m < l; m++)if (a = x[m], !(a === b || a.map == u || !a.getVisible()))if (g = this.c((n = (p = a._omsData) != u ? p.l : void 0) != u ? n : a.position), this.f(g, f) < c && (e.push(a), d))break;
                return e
            };
            c.markersNearAnyOtherMarker = function () {
                var b, d, a, g, c, e, r, m, l, p, n, k;
                if (this.e.getProjection() == u)throw"Must wait for 'idle' event on map before calling markersNearAnyOtherMarker";
                e = this.nearbyDistance;
                b = e * e;
                g = this.a;
                e = [];
                n = 0;
                for (a = g.length; n < a; n++)d = g[n], e.push({
                    q: this.c((r = (l = d._omsData) != u ? l.l : void 0) != u ? r : d.position),
                    d: v
                });
                n = this.a;
                d = r = 0;
                for (l = n.length; r < l; d = ++r)if (a = n[d], a.map != u && a.getVisible() && (g = e[d], !g.d)) {
                    k = this.a;
                    a = m = 0;
                    for (p = k.length; m < p; a = ++m)if (c = k[a], a !== d && (c.map != u && c.getVisible()) && (c = e[a], (!(a < d) || c.d) && this.f(g.q, c.q) < b)) {
                        g.d = c.d = h;
                        break
                    }
                }
                n = this.a;
                a = [];
                b = r = 0;
                for (l = n.length; r < l; b = ++r)d = n[b], e[b].d && a.push(d);
                return a
            };
            c.z = function (b) {
                var d = this;
                return {
                    h: function () {
                        return b._omsData.i.setOptions({
                            strokeColor: d.legColors.highlighted[d.map.mapTypeId],
                            zIndex: d.highlightedLegZIndex
                        })
                    }, k: function () {
                        return b._omsData.i.setOptions({
                            strokeColor: d.legColors.usual[d.map.mapTypeId],
                            zIndex: d.usualLegZIndex
                        })
                    }
                }
            };
            c.G = function (b, d) {
                var a, c, f, e, r, m, l, k, n, q;
                this.s = h;
                q = b.length;
                a = this.C(function () {
                    var a, d, c;
                    c = [];
                    a = 0;
                    for (d = b.length; a < d; a++)k = b[a], c.push(k.p);
                    return c
                }());
                e = q >= this.circleSpiralSwitchover ? this.v(q, a).reverse() : this.u(q, a);
                a = function () {
                    var a, d, k, q = this;
                    k = [];
                    a = 0;
                    for (d = e.length; a < d; a++)f = e[a], c = this.D(f), n = this.B(b, function (a) {
                        return q.f(a.p, f)
                    }),
                        l = n.A, m = new s.Polyline({
                        map: this.map,
                        path: [l.position, c],
                        strokeColor: this.legColors.usual[this.map.mapTypeId],
                        strokeWeight: this.legWeight,
                        zIndex: this.usualLegZIndex
                    }), l._omsData = {
                        l: l.position,
                        i: m
                    }, this.legColors.highlighted[this.map.mapTypeId] !== this.legColors.usual[this.map.mapTypeId] && (r = this.z(l), l._omsData.w = {
                        h: p.addListener(l, "mouseover", r.h),
                        k: p.addListener(l, "mouseout", r.k)
                    }), l.setPosition(c), l.setZIndex(Math.round(this.spiderfiedZIndex + f.y)), k.push(l);
                    return k
                }.call(this);
                delete this.s;
                this.r =
                    h;
                return this.trigger("spiderfy", a, d)
            };
            c.unspiderfy = function (b) {
                var d, a, c, f, e, k, m;
                b == u && (b = u);
                if (this.r == u)return this;
                this.t = h;
                f = [];
                c = [];
                m = this.a;
                e = 0;
                for (k = m.length; e < k; e++)a = m[e], a._omsData != u ? (a._omsData.i.setMap(u), a !== b && a.setPosition(a._omsData.l), a.setZIndex(u), d = a._omsData.w, d != u && (p.removeListener(d.h), p.removeListener(d.k)), delete a._omsData, f.push(a)) : c.push(a);
                delete this.t;
                delete this.r;
                this.trigger("unspiderfy", f, c);
                return this
            };
            c.f = function (b, d) {
                var a, c;
                a = b.x - d.x;
                c = b.y - d.y;
                return a *
                    a + c * c
            };
            c.C = function (b) {
                var d, a, c, f, e;
                f = a = c = 0;
                for (e = b.length; f < e; f++)d = b[f], a += d.x, c += d.y;
                b = b.length;
                return new s.Point(a / b, c / b)
            };
            c.c = function (b) {
                return this.e.getProjection().fromLatLngToDivPixel(b)
            };
            c.D = function (b) {
                return this.e.getProjection().fromDivPixelToLatLng(b)
            };
            c.B = function (b, c) {
                var a, g, f, e, k, m;
                f = k = 0;
                for (m = b.length; k < m; f = ++k)if (e = b[f], e = c(e), "undefined" === typeof a || a === u || e < g) g = e, a = f;
                return b.splice(a, 1)[0]
            };
            c.m = function (b, c) {
                var a, g, f, e;
                if (b.indexOf != u)return b.indexOf(c);
                a = f = 0;
                for (e = b.length; f <
                e; a = ++f)if (g = b[a], g === c)return a;
                return -1
            };
            w.g = function (b) {
                return this.setMap(b)
            };
            w.g.prototype = new s.OverlayView;
            w.g.prototype.draw = function () {
            };
            return w
        }()
    }).call(this);
}).call(this);
/* Tue 7 May 2013 14:56:02 BST */

/*!
 * Bootstrap-select v1.9.3 (http://silviomoreto.github.io/bootstrap-select)
 *
 * Copyright 2013-2015 bootstrap-select
 * Licensed under MIT (https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE)
 */
!function (a, b) {
    "function" == typeof define && define.amd ? define(["jquery"], function (a) {
        return b(a)
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery)
}(this, function (a) {
    !function (a) {
        "use strict";
        function b(b) {
            var c = [{re: /[\xC0-\xC6]/g, ch: "A"}, {re: /[\xE0-\xE6]/g, ch: "a"}, {
                re: /[\xC8-\xCB]/g,
                ch: "E"
            }, {re: /[\xE8-\xEB]/g, ch: "e"}, {re: /[\xCC-\xCF]/g, ch: "I"}, {
                re: /[\xEC-\xEF]/g,
                ch: "i"
            }, {re: /[\xD2-\xD6]/g, ch: "O"}, {re: /[\xF2-\xF6]/g, ch: "o"}, {
                re: /[\xD9-\xDC]/g,
                ch: "U"
            }, {re: /[\xF9-\xFC]/g, ch: "u"}, {re: /[\xC7-\xE7]/g, ch: "c"}, {re: /[\xD1]/g, ch: "N"}, {
                re: /[\xF1]/g,
                ch: "n"
            }];
            return a.each(c, function () {
                b = b.replace(this.re, this.ch)
            }), b
        }

        function c(a) {
            var b = {"&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#x27;", "`": "&#x60;"},
                c = "(?:" + Object.keys(b).join("|") + ")", d = new RegExp(c), e = new RegExp(c, "g"),
                f = null == a ? "" : "" + a;
            return d.test(f) ? f.replace(e, function (a) {
                return b[a]
            }) : f
        }

        function d(b, c) {
            var d = arguments, f = b, g = c;
            [].shift.apply(d);
            var h, i = this.each(function () {
                var b = a(this);
                if (b.is("select")) {
                    var c = b.data("selectpicker"), i = "object" == typeof f && f;
                    if (c) {
                        if (i)for (var j in i)i.hasOwnProperty(j) && (c.options[j] = i[j])
                    } else {
                        var k = a.extend({}, e.DEFAULTS, a.fn.selectpicker.defaults || {}, b.data(), i);
                        k.template = a.extend({}, e.DEFAULTS.template, a.fn.selectpicker.defaults ? a.fn.selectpicker.defaults.template : {}, b.data().template, i.template), b.data("selectpicker", c = new e(this, k, g))
                    }
                    "string" == typeof f && (h = c[f] instanceof Function ? c[f].apply(c, d) : c.options[f])
                }
            });
            return "undefined" != typeof h ? h : i
        }

        String.prototype.includes || !function () {
            var a = {}.toString, b = function () {
                try {
                    var a = {}, b = Object.defineProperty, c = b(a, a, a) && b
                } catch (d) {
                }
                return c
            }(), c = "".indexOf, d = function (b) {
                if (null == this)throw new TypeError;
                var d = String(this);
                if (b && "[object RegExp]" == a.call(b))throw new TypeError;
                var e = d.length, f = String(b), g = f.length, h = arguments.length > 1 ? arguments[1] : void 0,
                    i = h ? Number(h) : 0;
                i != i && (i = 0);
                var j = Math.min(Math.max(i, 0), e);
                return g + j > e ? !1 : -1 != c.call(d, f, i)
            };
            b ? b(String.prototype, "includes", {
                value: d,
                configurable: !0,
                writable: !0
            }) : String.prototype.includes = d
        }(), String.prototype.startsWith || !function () {
            var a = function () {
                try {
                    var a = {}, b = Object.defineProperty, c = b(a, a, a) && b
                } catch (d) {
                }
                return c
            }(), b = {}.toString, c = function (a) {
                if (null == this)throw new TypeError;
                var c = String(this);
                if (a && "[object RegExp]" == b.call(a))throw new TypeError;
                var d = c.length, e = String(a), f = e.length, g = arguments.length > 1 ? arguments[1] : void 0,
                    h = g ? Number(g) : 0;
                h != h && (h = 0);
                var i = Math.min(Math.max(h, 0), d);
                if (f + i > d)return !1;
                for (var j = -1; ++j < f;)if (c.charCodeAt(i + j) != e.charCodeAt(j))return !1;
                return !0
            };
            a ? a(String.prototype, "startsWith", {
                value: c,
                configurable: !0,
                writable: !0
            }) : String.prototype.startsWith = c
        }(), Object.keys || (Object.keys = function (a, b, c) {
            c = [];
            for (b in a)c.hasOwnProperty.call(a, b) && c.push(b);
            return c
        }), a.fn.triggerNative = function (a) {
            var b, c = this[0];
            c.dispatchEvent ? ("function" == typeof Event ? b = new Event(a, {bubbles: !0}) : (b = document.createEvent("Event"), b.initEvent(a, !0, !1)), c.dispatchEvent(b)) : (c.fireEvent && (b = document.createEventObject(), b.eventType = a, c.fireEvent("on" + a, b)), this.trigger(a))
        }, a.expr[":"].icontains = function (b, c, d) {
            var e = a(b), f = (e.data("tokens") || e.text()).toUpperCase();
            return f.includes(d[3].toUpperCase())
        }, a.expr[":"].ibegins = function (b, c, d) {
            var e = a(b), f = (e.data("tokens") || e.text()).toUpperCase();
            return f.startsWith(d[3].toUpperCase())
        }, a.expr[":"].aicontains = function (b, c, d) {
            var e = a(b), f = (e.data("tokens") || e.data("normalizedText") || e.text()).toUpperCase();
            return f.includes(d[3].toUpperCase())
        }, a.expr[":"].aibegins = function (b, c, d) {
            var e = a(b), f = (e.data("tokens") || e.data("normalizedText") || e.text()).toUpperCase();
            return f.startsWith(d[3].toUpperCase())
        };
        var e = function (b, c, d) {
            d && (d.stopPropagation(), d.preventDefault()), this.$element = a(b), this.$newElement = null, this.$button = null, this.$menu = null, this.$lis = null, this.options = c, null === this.options.title && (this.options.title = this.$element.attr("title")), this.val = e.prototype.val, this.render = e.prototype.render, this.refresh = e.prototype.refresh, this.setStyle = e.prototype.setStyle, this.selectAll = e.prototype.selectAll, this.deselectAll = e.prototype.deselectAll, this.destroy = e.prototype.destroy, this.remove = e.prototype.remove, this.show = e.prototype.show, this.hide = e.prototype.hide, this.init()
        };
        e.VERSION = "1.9.3", e.DEFAULTS = {
            noneSelectedText: "Nothing selected",
            noneResultsText: "No results matched {0}",
            countSelectedText: function (a, b) {
                return 1 == a ? "{0} item selected" : "{0} items selected"
            },
            maxOptionsText: function (a, b) {
                return [1 == a ? "Limit reached ({n} item max)" : "Limit reached ({n} items max)", 1 == b ? "Group limit reached ({n} item max)" : "Group limit reached ({n} items max)"]
            },
            selectAllText: "Select All",
            deselectAllText: "Deselect All",
            doneButton: !1,
            doneButtonText: "Close",
            multipleSeparator: ", ",
            styleBase: "btn",
            style: "btn-default",
            size: "auto",
            title: null,
            selectedTextFormat: "values",
            width: !1,
            container: !1,
            hideDisabled: !1,
            showSubtext: !1,
            showIcon: !0,
            showContent: !0,
            dropupAuto: !0,
            header: !1,
            liveSearch: !1,
            liveSearchPlaceholder: null,
            liveSearchNormalize: !1,
            liveSearchStyle: "contains",
            actionsBox: !1,
            iconBase: "glyphicon",
            tickIcon: "glyphicon-ok",
            template: {caret: '<span class="caret"></span>'},
            maxOptions: !1,
            mobile: !1,
            selectOnTab: !1,
            dropdownAlignRight: !1
        }, e.prototype = {
            constructor: e, init: function () {
                var b = this, c = this.$element.attr("id");
                this.liObj = {}, this.multiple = this.$element.prop("multiple"), this.autofocus = this.$element.prop("autofocus"), this.$newElement = this.createView(), this.$element.after(this.$newElement).appendTo(this.$newElement), this.$button = this.$newElement.children("button"), this.$menu = this.$newElement.children(".dropdown-menu"), this.$menuInner = this.$menu.children(".inner"), this.$searchbox = this.$menu.find("input"), this.options.dropdownAlignRight && this.$menu.addClass("dropdown-menu-right"), "undefined" != typeof c && (this.$button.attr("data-id", c), a('label[for="' + c + '"]').click(function (a) {
                    a.preventDefault(), b.$button.focus()
                })), this.checkDisabled(), this.clickListener(), this.options.liveSearch && this.liveSearchListener(), this.render(), this.setStyle(), this.setWidth(), this.options.container && this.selectPosition(), this.$menu.data("this", this), this.$newElement.data("this", this), this.options.mobile && this.mobile(), this.$newElement.on({
                    "hide.bs.dropdown": function (a) {
                        b.$element.trigger("hide.bs.select", a)
                    }, "hidden.bs.dropdown": function (a) {
                        b.$element.trigger("hidden.bs.select", a)
                    }, "show.bs.dropdown": function (a) {
                        b.$element.trigger("show.bs.select", a)
                    }, "shown.bs.dropdown": function (a) {
                        b.$element.trigger("shown.bs.select", a)
                    }
                }), b.$element[0].hasAttribute("required") && this.$element.on("invalid", function () {
                    b.$button.addClass("bs-invalid").focus(), b.$element.on({
                        "focus.bs.select": function () {
                            b.$button.focus(), b.$element.off("focus.bs.select")
                        }, "shown.bs.select": function () {
                            b.$element.val(b.$element.val()).off("shown.bs.select")
                        }, "rendered.bs.select": function () {
                            this.validity.valid && b.$button.removeClass("bs-invalid"), b.$element.off("rendered.bs.select")
                        }
                    })
                }), setTimeout(function () {
                    b.$element.trigger("loaded.bs.select")
                })
            }, createDropdown: function () {
                var b = this.multiple ? " show-tick" : "",
                    d = this.$element.parent().hasClass("input-group") ? " input-group-btn" : "",
                    e = this.autofocus ? " autofocus" : "",
                    f = this.options.header ? '<div class="popover-title"><button type="button" class="close" aria-hidden="true">&times;</button>' + this.options.header + "</div>" : "",
                    g = this.options.liveSearch ? '<div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off"' + (null === this.options.liveSearchPlaceholder ? "" : ' placeholder="' + c(this.options.liveSearchPlaceholder) + '"') + "></div>" : "",
                    h = this.multiple && this.options.actionsBox ? '<div class="bs-actionsbox"><div class="btn-group btn-group-sm btn-block"><button type="button" class="actions-btn bs-select-all btn btn-default">' + this.options.selectAllText + '</button><button type="button" class="actions-btn bs-deselect-all btn btn-default">' + this.options.deselectAllText + "</button></div></div>" : "",
                    i = this.multiple && this.options.doneButton ? '<div class="bs-donebutton"><div class="btn-group btn-block"><button type="button" class="btn btn-sm btn-default">' + this.options.doneButtonText + "</button></div></div>" : "",
                    j = '<div class="btn-group bootstrap-select' + b + d + '"><button type="button" class="' + this.options.styleBase + ' dropdown-toggle" data-toggle="dropdown"' + e + '><span class="filter-option pull-left"></span>&nbsp;<span class="bs-caret">' + this.options.template.caret + '</span></button><div class="dropdown-menu open">' + f + g + h + '<ul class="dropdown-menu inner" role="menu"></ul>' + i + "</div></div>";
                return a(j)
            }, createView: function () {
                var a = this.createDropdown(), b = this.createLi();
                return a.find("ul")[0].innerHTML = b, a
            }, reloadLi: function () {
                this.destroyLi();
                var a = this.createLi();
                this.$menuInner[0].innerHTML = a
            }, destroyLi: function () {
                this.$menu.find("li").remove()
            }, createLi: function () {
                var d = this, e = [], f = 0, g = document.createElement("option"), h = -1, i = function (a, b, c, d) {
                    return "<li" + ("undefined" != typeof c & "" !== c ? ' class="' + c + '"' : "") + ("undefined" != typeof b & null !== b ? ' data-original-index="' + b + '"' : "") + ("undefined" != typeof d & null !== d ? 'data-optgroup="' + d + '"' : "") + ">" + a + "</li>"
                }, j = function (a, e, f, g) {
                    return '<a tabindex="0"' + ("undefined" != typeof e ? ' class="' + e + '"' : "") + ("undefined" != typeof f ? ' style="' + f + '"' : "") + (d.options.liveSearchNormalize ? ' data-normalized-text="' + b(c(a)) + '"' : "") + ("undefined" != typeof g || null !== g ? ' data-tokens="' + g + '"' : "") + ">" + a + '<span class="' + d.options.iconBase + " " + d.options.tickIcon + ' check-mark"></span></a>'
                };
                if (this.options.title && !this.multiple && (h--, !this.$element.find(".bs-title-option").length)) {
                    var k = this.$element[0];
                    g.className = "bs-title-option", g.appendChild(document.createTextNode(this.options.title)), g.value = "", k.insertBefore(g, k.firstChild), void 0 === a(k.options[k.selectedIndex]).attr("selected") && (g.selected = !0)
                }
                return this.$element.find("option").each(function (b) {
                    var c = a(this);
                    if (h++, !c.hasClass("bs-title-option")) {
                        var g = this.className || "", k = this.style.cssText,
                            l = c.data("content") ? c.data("content") : c.html(),
                            m = c.data("tokens") ? c.data("tokens") : null,
                            n = "undefined" != typeof c.data("subtext") ? '<small class="text-muted">' + c.data("subtext") + "</small>" : "",
                            o = "undefined" != typeof c.data("icon") ? '<span class="' + d.options.iconBase + " " + c.data("icon") + '"></span> ' : "",
                            p = this.disabled || "OPTGROUP" === this.parentNode.tagName && this.parentNode.disabled;
                        if ("" !== o && p && (o = "<span>" + o + "</span>"), d.options.hideDisabled && p)return void h--;
                        if (c.data("content") || (l = o + '<span class="text">' + l + n + "</span>"), "OPTGROUP" === this.parentNode.tagName && c.data("divider") !== !0) {
                            var q = " " + this.parentNode.className || "";
                            if (0 === c.index()) {
                                f += 1;
                                var r = this.parentNode.label,
                                    s = "undefined" != typeof c.parent().data("subtext") ? '<small class="text-muted">' + c.parent().data("subtext") + "</small>" : "",
                                    t = c.parent().data("icon") ? '<span class="' + d.options.iconBase + " " + c.parent().data("icon") + '"></span> ' : "";
                                r = t + '<span class="text">' + r + s + "</span>", 0 !== b && e.length > 0 && (h++, e.push(i("", null, "divider", f + "div"))), h++, e.push(i(r, null, "dropdown-header" + q, f))
                            }
                            e.push(i(j(l, "opt " + g + q, k, m), b, "", f))
                        } else c.data("divider") === !0 ? e.push(i("", b, "divider")) : c.data("hidden") === !0 ? e.push(i(j(l, g, k, m), b, "hidden is-hidden")) : (this.previousElementSibling && "OPTGROUP" === this.previousElementSibling.tagName && (h++, e.push(i("", null, "divider", f + "div"))), e.push(i(j(l, g, k, m), b)));
                        d.liObj[b] = h
                    }
                }), this.multiple || 0 !== this.$element.find("option:selected").length || this.options.title || this.$element.find("option").eq(0).prop("selected", !0).attr("selected", "selected"), e.join("")
            }, findLis: function () {
                return null == this.$lis && (this.$lis = this.$menu.find("li")), this.$lis
            }, render: function (b) {
                var c, d = this;
                b !== !1 && this.$element.find("option").each(function (a) {
                    var b = d.findLis().eq(d.liObj[a]);
                    d.setDisabled(a, this.disabled || "OPTGROUP" === this.parentNode.tagName && this.parentNode.disabled, b), d.setSelected(a, this.selected, b)
                }), this.tabIndex();
                var e = this.$element.find("option").map(function () {
                    if (this.selected) {
                        if (d.options.hideDisabled && (this.disabled || "OPTGROUP" === this.parentNode.tagName && this.parentNode.disabled))return;
                        var b, c = a(this),
                            e = c.data("icon") && d.options.showIcon ? '<i class="' + d.options.iconBase + " " + c.data("icon") + '"></i> ' : "";
                        return b = d.options.showSubtext && c.data("subtext") && !d.multiple ? ' <small class="text-muted">' + c.data("subtext") + "</small>" : "", "undefined" != typeof c.attr("title") ? c.attr("title") : c.data("content") && d.options.showContent ? c.data("content") : e + c.html() + b
                    }
                }).toArray(), f = this.multiple ? e.join(this.options.multipleSeparator) : e[0];
                if (this.multiple && this.options.selectedTextFormat.indexOf("count") > -1) {
                    var g = this.options.selectedTextFormat.split(">");
                    if (g.length > 1 && e.length > g[1] || 1 == g.length && e.length >= 2) {
                        c = this.options.hideDisabled ? ", [disabled]" : "";
                        var h = this.$element.find("option").not('[data-divider="true"], [data-hidden="true"]' + c).length,
                            i = "function" == typeof this.options.countSelectedText ? this.options.countSelectedText(e.length, h) : this.options.countSelectedText;
                        f = i.replace("{0}", e.length.toString()).replace("{1}", h.toString())
                    }
                }
                void 0 == this.options.title && (this.options.title = this.$element.attr("title")), "static" == this.options.selectedTextFormat && (f = this.options.title), f || (f = "undefined" != typeof this.options.title ? this.options.title : this.options.noneSelectedText), this.$button.attr("title", a.trim(f.replace(/<[^>]*>?/g, ""))), this.$button.children(".filter-option").html(f), this.$element.trigger("rendered.bs.select")
            }, setStyle: function (a, b) {
                this.$element.attr("class") && this.$newElement.addClass(this.$element.attr("class").replace(/selectpicker|mobile-device|bs-select-hidden|validate\[.*\]/gi, ""));
                var c = a ? a : this.options.style;
                "add" == b ? this.$button.addClass(c) : "remove" == b ? this.$button.removeClass(c) : (this.$button.removeClass(this.options.style), this.$button.addClass(c))
            }, liHeight: function (b) {
                if (b || this.options.size !== !1 && !this.sizeInfo) {
                    var c = document.createElement("div"), d = document.createElement("div"),
                        e = document.createElement("ul"), f = document.createElement("li"),
                        g = document.createElement("li"), h = document.createElement("a"),
                        i = document.createElement("span"),
                        j = this.options.header && this.$menu.find(".popover-title").length > 0 ? this.$menu.find(".popover-title")[0].cloneNode(!0) : null,
                        k = this.options.liveSearch ? document.createElement("div") : null,
                        l = this.options.actionsBox && this.multiple && this.$menu.find(".bs-actionsbox").length > 0 ? this.$menu.find(".bs-actionsbox")[0].cloneNode(!0) : null,
                        m = this.options.doneButton && this.multiple && this.$menu.find(".bs-donebutton").length > 0 ? this.$menu.find(".bs-donebutton")[0].cloneNode(!0) : null;
                    if (i.className = "text", c.className = this.$menu[0].parentNode.className + " open", d.className = "dropdown-menu open", e.className = "dropdown-menu inner", f.className = "divider", i.appendChild(document.createTextNode("Inner text")), h.appendChild(i), g.appendChild(h), e.appendChild(g), e.appendChild(f), j && d.appendChild(j), k) {
                        var n = document.createElement("span");
                        k.className = "bs-searchbox", n.className = "form-control", k.appendChild(n), d.appendChild(k)
                    }
                    l && d.appendChild(l), d.appendChild(e), m && d.appendChild(m), c.appendChild(d), document.body.appendChild(c);
                    var o = h.offsetHeight, p = j ? j.offsetHeight : 0, q = k ? k.offsetHeight : 0,
                        r = l ? l.offsetHeight : 0, s = m ? m.offsetHeight : 0, t = a(f).outerHeight(!0),
                        u = "function" == typeof getComputedStyle ? getComputedStyle(d) : !1, v = u ? null : a(d),
                        w = parseInt(u ? u.paddingTop : v.css("paddingTop")) + parseInt(u ? u.paddingBottom : v.css("paddingBottom")) + parseInt(u ? u.borderTopWidth : v.css("borderTopWidth")) + parseInt(u ? u.borderBottomWidth : v.css("borderBottomWidth")),
                        x = w + parseInt(u ? u.marginTop : v.css("marginTop")) + parseInt(u ? u.marginBottom : v.css("marginBottom")) + 2;
                    document.body.removeChild(c), this.sizeInfo = {
                        liHeight: o,
                        headerHeight: p,
                        searchHeight: q,
                        actionsHeight: r,
                        doneButtonHeight: s,
                        dividerHeight: t,
                        menuPadding: w,
                        menuExtras: x
                    }
                }
            }, setSize: function () {
                if (this.findLis(), this.liHeight(), this.options.header && this.$menu.css("padding-top", 0), this.options.size !== !1) {
                    var b, c, d, e, f = this, g = this.$menu, h = this.$menuInner, i = a(window),
                        j = this.$newElement[0].offsetHeight, k = this.sizeInfo.liHeight,
                        l = this.sizeInfo.headerHeight, m = this.sizeInfo.searchHeight, n = this.sizeInfo.actionsHeight,
                        o = this.sizeInfo.doneButtonHeight, p = this.sizeInfo.dividerHeight,
                        q = this.sizeInfo.menuPadding, r = this.sizeInfo.menuExtras,
                        s = this.options.hideDisabled ? ".disabled" : "", t = function () {
                            d = f.$newElement.offset().top - i.scrollTop(), e = i.height() - d - j
                        };
                    if (t(), "auto" === this.options.size) {
                        var u = function () {
                            var i, j = function (b, c) {
                                    return function (d) {
                                        return c ? d.classList ? d.classList.contains(b) : a(d).hasClass(b) : !(d.classList ? d.classList.contains(b) : a(d).hasClass(b))
                                    }
                                }, p = f.$menuInner[0].getElementsByTagName("li"),
                                s = Array.prototype.filter ? Array.prototype.filter.call(p, j("hidden", !1)) : f.$lis.not(".hidden"),
                                u = Array.prototype.filter ? Array.prototype.filter.call(s, j("dropdown-header", !0)) : s.filter(".dropdown-header");
                            t(), b = e - r, f.options.container ? (g.data("height") || g.data("height", g.height()), c = g.data("height")) : c = g.height(), f.options.dropupAuto && f.$newElement.toggleClass("dropup", d > e && c > b - r), f.$newElement.hasClass("dropup") && (b = d - r), i = s.length + u.length > 3 ? 3 * k + r - 2 : 0, g.css({
                                "max-height": b + "px",
                                overflow: "hidden",
                                "min-height": i + l + m + n + o + "px"
                            }), h.css({
                                "max-height": b - l - m - n - o - q + "px",
                                "overflow-y": "auto",
                                "min-height": Math.max(i - q, 0) + "px"
                            })
                        };
                        u(), this.$searchbox.off("input.getSize propertychange.getSize").on("input.getSize propertychange.getSize", u), i.off("resize.getSize scroll.getSize").on("resize.getSize scroll.getSize", u)
                    } else if (this.options.size && "auto" != this.options.size && this.$lis.not(s).length > this.options.size) {
                        var v = this.$lis.not(".divider").not(s).children().slice(0, this.options.size).last().parent().index(),
                            w = this.$lis.slice(0, v + 1).filter(".divider").length;
                        b = k * this.options.size + w * p + q, f.options.container ? (g.data("height") || g.data("height", g.height()), c = g.data("height")) : c = g.height(), f.options.dropupAuto && this.$newElement.toggleClass("dropup", d > e && c > b - r), g.css({
                            "max-height": b + l + m + n + o + "px",
                            overflow: "hidden",
                            "min-height": ""
                        }), h.css({"max-height": b - q + "px", "overflow-y": "auto", "min-height": ""})
                    }
                }
            }, setWidth: function () {
                if ("auto" === this.options.width) {
                    this.$menu.css("min-width", "0");
                    var a = this.$menu.parent().clone().appendTo("body"),
                        b = this.options.container ? this.$newElement.clone().appendTo("body") : a,
                        c = a.children(".dropdown-menu").outerWidth(),
                        d = b.css("width", "auto").children("button").outerWidth();
                    a.remove(), b.remove(), this.$newElement.css("width", Math.max(c, d) + "px")
                } else"fit" === this.options.width ? (this.$menu.css("min-width", ""), this.$newElement.css("width", "").addClass("fit-width")) : this.options.width ? (this.$menu.css("min-width", ""), this.$newElement.css("width", this.options.width)) : (this.$menu.css("min-width", ""), this.$newElement.css("width", ""));
                this.$newElement.hasClass("fit-width") && "fit" !== this.options.width && this.$newElement.removeClass("fit-width")
            }, selectPosition: function () {
                this.$bsContainer = a('<div class="bs-container" />');
                var b, c, d = this, e = function (a) {
                    d.$bsContainer.addClass(a.attr("class").replace(/form-control|fit-width/gi, "")).toggleClass("dropup", a.hasClass("dropup")), b = a.offset(), c = a.hasClass("dropup") ? 0 : a[0].offsetHeight, d.$bsContainer.css({
                        top: b.top + c,
                        left: b.left,
                        width: a[0].offsetWidth
                    })
                };
                this.$button.on("click", function () {
                    var b = a(this);
                    d.isDisabled() || (e(d.$newElement), d.$bsContainer.appendTo(d.options.container).toggleClass("open", !b.hasClass("open")).append(d.$menu))
                }), a(window).on("resize scroll", function () {
                    e(d.$newElement)
                }), this.$element.on("hide.bs.select", function () {
                    d.$menu.data("height", d.$menu.height()), d.$bsContainer.detach()
                })
            }, setSelected: function (a, b, c) {
                c || (c = this.findLis().eq(this.liObj[a])), c.toggleClass("selected", b)
            }, setDisabled: function (a, b, c) {
                c || (c = this.findLis().eq(this.liObj[a])), b ? c.addClass("disabled").children("a").attr("href", "#").attr("tabindex", -1) : c.removeClass("disabled").children("a").removeAttr("href").attr("tabindex", 0)
            }, isDisabled: function () {
                return this.$element[0].disabled
            }, checkDisabled: function () {
                var a = this;
                this.isDisabled() ? (this.$newElement.addClass("disabled"), this.$button.addClass("disabled").attr("tabindex", -1)) : (this.$button.hasClass("disabled") && (this.$newElement.removeClass("disabled"), this.$button.removeClass("disabled")), -1 != this.$button.attr("tabindex") || this.$element.data("tabindex") || this.$button.removeAttr("tabindex")), this.$button.click(function () {
                    return !a.isDisabled()
                })
            }, tabIndex: function () {
                this.$element.data("tabindex") !== this.$element.attr("tabindex") && -98 !== this.$element.attr("tabindex") && "-98" !== this.$element.attr("tabindex") && (this.$element.data("tabindex", this.$element.attr("tabindex")), this.$button.attr("tabindex", this.$element.data("tabindex"))), this.$element.attr("tabindex", -98)
            }, clickListener: function () {
                var b = this, c = a(document);
                this.$newElement.on("touchstart.dropdown", ".dropdown-menu", function (a) {
                    a.stopPropagation()
                }), c.data("spaceSelect", !1), this.$button.on("keyup", function (a) {
                    /(32)/.test(a.keyCode.toString(10)) && c.data("spaceSelect") && (a.preventDefault(), c.data("spaceSelect", !1))
                }), this.$button.on("click", function () {
                    b.setSize(), b.$element.on("shown.bs.select", function () {
                        if (b.options.liveSearch || b.multiple) {
                            if (!b.multiple) {
                                var a = b.liObj[b.$element[0].selectedIndex];
                                if ("number" != typeof a || b.options.size === !1)return;
                                var c = b.$lis.eq(a)[0].offsetTop - b.$menuInner[0].offsetTop;
                                c = c - b.$menuInner[0].offsetHeight / 2 + b.sizeInfo.liHeight / 2, b.$menuInner[0].scrollTop = c
                            }
                        } else b.$menuInner.find(".selected a").focus()
                    })
                }), this.$menuInner.on("click", "li a", function (c) {
                    var d = a(this), e = d.parent().data("originalIndex"), f = b.$element.val(),
                        g = b.$element.prop("selectedIndex");
                    if (b.multiple && c.stopPropagation(), c.preventDefault(), !b.isDisabled() && !d.parent().hasClass("disabled")) {
                        var h = b.$element.find("option"), i = h.eq(e), j = i.prop("selected"),
                            k = i.parent("optgroup"), l = b.options.maxOptions, m = k.data("maxOptions") || !1;
                        if (b.multiple) {
                            if (i.prop("selected", !j), b.setSelected(e, !j), d.blur(), l !== !1 || m !== !1) {
                                var n = l < h.filter(":selected").length, o = m < k.find("option:selected").length;
                                if (l && n || m && o)if (l && 1 == l) h.prop("selected", !1), i.prop("selected", !0), b.$menuInner.find(".selected").removeClass("selected"), b.setSelected(e, !0); else if (m && 1 == m) {
                                    k.find("option:selected").prop("selected", !1), i.prop("selected", !0);
                                    var p = d.parent().data("optgroup");
                                    b.$menuInner.find('[data-optgroup="' + p + '"]').removeClass("selected"), b.setSelected(e, !0)
                                } else {
                                    var q = "function" == typeof b.options.maxOptionsText ? b.options.maxOptionsText(l, m) : b.options.maxOptionsText,
                                        r = q[0].replace("{n}", l), s = q[1].replace("{n}", m),
                                        t = a('<div class="notify"></div>');
                                    q[2] && (r = r.replace("{var}", q[2][l > 1 ? 0 : 1]), s = s.replace("{var}", q[2][m > 1 ? 0 : 1])), i.prop("selected", !1), b.$menu.append(t), l && n && (t.append(a("<div>" + r + "</div>")), b.$element.trigger("maxReached.bs.select")), m && o && (t.append(a("<div>" + s + "</div>")), b.$element.trigger("maxReachedGrp.bs.select")), setTimeout(function () {
                                        b.setSelected(e, !1)
                                    }, 10), t.delay(750).fadeOut(300, function () {
                                        a(this).remove()
                                    })
                                }
                            }
                        } else h.prop("selected", !1), i.prop("selected", !0), b.$menuInner.find(".selected").removeClass("selected"), b.setSelected(e, !0);
                        b.multiple ? b.options.liveSearch && b.$searchbox.focus() : b.$button.focus(), (f != b.$element.val() && b.multiple || g != b.$element.prop("selectedIndex") && !b.multiple) && (b.$element.triggerNative("change"), b.$element.trigger("changed.bs.select", [e, i.prop("selected"), j]))
                    }
                }), this.$menu.on("click", "li.disabled a, .popover-title, .popover-title :not(.close)", function (c) {
                    c.currentTarget == this && (c.preventDefault(), c.stopPropagation(), b.options.liveSearch && !a(c.target).hasClass("close") ? b.$searchbox.focus() : b.$button.focus())
                }), this.$menuInner.on("click", ".divider, .dropdown-header", function (a) {
                    a.preventDefault(), a.stopPropagation(), b.options.liveSearch ? b.$searchbox.focus() : b.$button.focus()
                }), this.$menu.on("click", ".popover-title .close", function () {
                    b.$button.click()
                }), this.$searchbox.on("click", function (a) {
                    a.stopPropagation()
                }), this.$menu.on("click", ".actions-btn", function (c) {
                    b.options.liveSearch ? b.$searchbox.focus() : b.$button.focus(), c.preventDefault(), c.stopPropagation(), a(this).hasClass("bs-select-all") ? b.selectAll() : b.deselectAll(), b.$element.triggerNative("change")
                }), this.$element.change(function () {
                    b.render(!1)
                })
            }, liveSearchListener: function () {
                var d = this, e = a('<li class="no-results"></li>');
                this.$button.on("click.dropdown.data-api touchstart.dropdown.data-api", function () {
                    d.$menuInner.find(".active").removeClass("active"), d.$searchbox.val() && (d.$searchbox.val(""), d.$lis.not(".is-hidden").removeClass("hidden"), e.parent().length && e.remove()), d.multiple || d.$menuInner.find(".selected").addClass("active"), setTimeout(function () {
                        d.$searchbox.focus()
                    }, 10)
                }), this.$searchbox.on("click.dropdown.data-api focus.dropdown.data-api touchend.dropdown.data-api", function (a) {
                    a.stopPropagation()
                }), this.$searchbox.on("input propertychange", function () {
                    if (d.$searchbox.val()) {
                        var f = d.$lis.not(".is-hidden").removeClass("hidden").children("a");
                        f = d.options.liveSearchNormalize ? f.not(":a" + d._searchStyle() + '("' + b(d.$searchbox.val()) + '")') : f.not(":" + d._searchStyle() + '("' + d.$searchbox.val() + '")'), f.parent().addClass("hidden"), d.$lis.filter(".dropdown-header").each(function () {
                            var b = a(this), c = b.data("optgroup");
                            0 === d.$lis.filter("[data-optgroup=" + c + "]").not(b).not(".hidden").length && (b.addClass("hidden"), d.$lis.filter("[data-optgroup=" + c + "div]").addClass("hidden"))
                        });
                        var g = d.$lis.not(".hidden");
                        g.each(function (b) {
                            var c = a(this);
                            c.hasClass("divider") && (c.index() === g.first().index() || c.index() === g.last().index() || g.eq(b + 1).hasClass("divider")) && c.addClass("hidden")
                        }), d.$lis.not(".hidden, .no-results").length ? e.parent().length && e.remove() : (e.parent().length && e.remove(), e.html(d.options.noneResultsText.replace("{0}", '"' + c(d.$searchbox.val()) + '"')).show(), d.$menuInner.append(e))
                    } else d.$lis.not(".is-hidden").removeClass("hidden"), e.parent().length && e.remove();
                    d.$lis.filter(".active").removeClass("active"), d.$searchbox.val() && d.$lis.not(".hidden, .divider, .dropdown-header").eq(0).addClass("active").children("a").focus(), a(this).focus()
                })
            }, _searchStyle: function () {
                var a = {begins: "ibegins", startsWith: "ibegins"};
                return a[this.options.liveSearchStyle] || "icontains"
            }, val: function (a) {
                return "undefined" != typeof a ? (this.$element.val(a), this.render(), this.$element) : this.$element.val()
            }, changeAll: function (b) {
                "undefined" == typeof b && (b = !0), this.findLis();
                for (var c = this.$element.find("option"), d = this.$lis.not(".divider, .dropdown-header, .disabled, .hidden").toggleClass("selected", b), e = d.length, f = [], g = 0; e > g; g++) {
                    var h = d[g].getAttribute("data-original-index");
                    f[f.length] = c.eq(h)[0]
                }
                a(f).prop("selected", b), this.render(!1)
            }, selectAll: function () {
                return this.changeAll(!0)
            }, deselectAll: function () {
                return this.changeAll(!1)
            }, keydown: function (c) {
                var d, e, f, g, h, i, j, k, l, m = a(this), n = m.is("input") ? m.parent().parent() : m.parent(),
                    o = n.data("this"), p = ":not(.disabled, .hidden, .dropdown-header, .divider)", q = {
                        32: " ",
                        48: "0",
                        49: "1",
                        50: "2",
                        51: "3",
                        52: "4",
                        53: "5",
                        54: "6",
                        55: "7",
                        56: "8",
                        57: "9",
                        59: ";",
                        65: "a",
                        66: "b",
                        67: "c",
                        68: "d",
                        69: "e",
                        70: "f",
                        71: "g",
                        72: "h",
                        73: "i",
                        74: "j",
                        75: "k",
                        76: "l",
                        77: "m",
                        78: "n",
                        79: "o",
                        80: "p",
                        81: "q",
                        82: "r",
                        83: "s",
                        84: "t",
                        85: "u",
                        86: "v",
                        87: "w",
                        88: "x",
                        89: "y",
                        90: "z",
                        96: "0",
                        97: "1",
                        98: "2",
                        99: "3",
                        100: "4",
                        101: "5",
                        102: "6",
                        103: "7",
                        104: "8",
                        105: "9"
                    };
                if (o.options.liveSearch && (n = m.parent().parent()), o.options.container && (n = o.$menu), d = a("[role=menu] li", n), l = o.$newElement.hasClass("open"), !l && (c.keyCode >= 48 && c.keyCode <= 57 || c.keyCode >= 96 && c.keyCode <= 105 || c.keyCode >= 65 && c.keyCode <= 90) && (o.options.container ? o.$button.trigger("click") : (o.setSize(), o.$menu.parent().addClass("open"), l = !0), o.$searchbox.focus()), o.options.liveSearch && (/(^9$|27)/.test(c.keyCode.toString(10)) && l && 0 === o.$menu.find(".active").length && (c.preventDefault(), o.$menu.parent().removeClass("open"), o.options.container && o.$newElement.removeClass("open"), o.$button.focus()), d = a("[role=menu] li" + p, n), m.val() || /(38|40)/.test(c.keyCode.toString(10)) || 0 === d.filter(".active").length && (d = o.$menuInner.find("li"), d = o.options.liveSearchNormalize ? d.filter(":a" + o._searchStyle() + "(" + b(q[c.keyCode]) + ")") : d.filter(":" + o._searchStyle() + "(" + q[c.keyCode] + ")"))), d.length) {
                    if (/(38|40)/.test(c.keyCode.toString(10))) e = d.index(d.find("a").filter(":focus").parent()), g = d.filter(p).first().index(), h = d.filter(p).last().index(), f = d.eq(e).nextAll(p).eq(0).index(), i = d.eq(e).prevAll(p).eq(0).index(), j = d.eq(f).prevAll(p).eq(0).index(), o.options.liveSearch && (d.each(function (b) {
                        a(this).hasClass("disabled") || a(this).data("index", b)
                    }), e = d.index(d.filter(".active")), g = d.first().data("index"), h = d.last().data("index"), f = d.eq(e).nextAll().eq(0).data("index"), i = d.eq(e).prevAll().eq(0).data("index"), j = d.eq(f).prevAll().eq(0).data("index")), k = m.data("prevIndex"), 38 == c.keyCode ? (o.options.liveSearch && e--, e != j && e > i && (e = i), g > e && (e = g), e == k && (e = h)) : 40 == c.keyCode && (o.options.liveSearch && e++, -1 == e && (e = 0), e != j && f > e && (e = f), e > h && (e = h), e == k && (e = g)), m.data("prevIndex", e), o.options.liveSearch ? (c.preventDefault(), m.hasClass("dropdown-toggle") || (d.removeClass("active").eq(e).addClass("active").children("a").focus(), m.focus())) : d.eq(e).children("a").focus(); else if (!m.is("input")) {
                        var r, s, t = [];
                        d.each(function () {
                            a(this).hasClass("disabled") || a.trim(a(this).children("a").text().toLowerCase()).substring(0, 1) == q[c.keyCode] && t.push(a(this).index())
                        }), r = a(document).data("keycount"), r++, a(document).data("keycount", r), s = a.trim(a(":focus").text().toLowerCase()).substring(0, 1), s != q[c.keyCode] ? (r = 1, a(document).data("keycount", r)) : r >= t.length && (a(document).data("keycount", 0), r > t.length && (r = 1)), d.eq(t[r - 1]).children("a").focus()
                    }
                    if ((/(13|32)/.test(c.keyCode.toString(10)) || /(^9$)/.test(c.keyCode.toString(10)) && o.options.selectOnTab) && l) {
                        if (/(32)/.test(c.keyCode.toString(10)) || c.preventDefault(), o.options.liveSearch) /(32)/.test(c.keyCode.toString(10)) || (o.$menuInner.find(".active a").click(), m.focus()); else {
                            var u = a(":focus");
                            u.click(), u.focus(), c.preventDefault(), a(document).data("spaceSelect", !0)
                        }
                        a(document).data("keycount", 0)
                    }
                    (/(^9$|27)/.test(c.keyCode.toString(10)) && l && (o.multiple || o.options.liveSearch) || /(27)/.test(c.keyCode.toString(10)) && !l) && (o.$menu.parent().removeClass("open"), o.options.container && o.$newElement.removeClass("open"), o.$button.focus())
                }
            }, mobile: function () {
                this.$element.addClass("mobile-device")
            }, refresh: function () {
                this.$lis = null, this.liObj = {}, this.reloadLi(), this.render(), this.checkDisabled(), this.liHeight(!0), this.setStyle(), this.setWidth(), this.$lis && this.$searchbox.trigger("propertychange"), this.$element.trigger("refreshed.bs.select")
            }, hide: function () {
                this.$newElement.hide()
            }, show: function () {
                this.$newElement.show()
            }, remove: function () {
                this.$newElement.remove(), this.$element.remove()
            }, destroy: function () {
                this.$newElement.remove(), this.$bsContainer ? this.$bsContainer.remove() : this.$menu.remove(), this.$element.off(".bs.select").removeData("selectpicker").removeClass("bs-select-hidden selectpicker")
            }
        };
        var f = a.fn.selectpicker;
        a.fn.selectpicker = d, a.fn.selectpicker.Constructor = e, a.fn.selectpicker.noConflict = function () {
            return a.fn.selectpicker = f, this
        }, a(document).data("keycount", 0).on("keydown.bs.select", '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="menu"], .bs-searchbox input', e.prototype.keydown).on("focusin.modal", '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="menu"], .bs-searchbox input', function (a) {
            a.stopPropagation()
        }), a(window).on("load.bs.select.data-api", function () {
            a(".selectpicker").each(function () {
                var b = a(this);
                d.call(b, b.data())
            })
        })
    }(a)
});
//# sourceMappingURL=bootstrap-select.js.map
